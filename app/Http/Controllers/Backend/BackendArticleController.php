<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendArticleController extends Controller
{
    // Variable to the directory contains a view
    protected $folder = 'backend.article.';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all articles
        $articles = Article::with('user')->paginate(request('length') ? request('length') : 5);

        // get articles owned by User
        $own_articles = Article::where('user_id', Auth::id())
                                ->get();
        
        $viewdata = [
            'articles' => $articles,
            'own_articles' => $own_articles
        ];

        return view($this->folder . 'index', $viewdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $viewdata = [
            'categories' => $categories
        ];

        // redict to create new form
        return view($this->folder . 'create', $viewdata);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        if (isset($request->categories)) {
            if (count($request->categories) > 3) {
                return redirect()->route('backend_article.create')
                            ->withErrors(['categories' => "Max 3 categories"])
                            ->withInput($request->all());
            }
        }

        if ($request->tags != '') {
            if (preg_match('/^[0-9A-Za-z ,]*$/', $request->tags)) {
                $input = $request->tags;
                $input = trim($input);
                $input = trim($input, ',');
                $input = preg_replace('/,+/', ',', $input);
                $input = preg_replace('/, +/', ',', $input);
                $input = preg_replace('/ +,/', ',', $input);
                $tags = explode(',', $input);
            } else {
                return redirect()->route('backend_article.create')
                        ->withErrors(['tags' => "The input contains only numbers, letters and comma"])
                        ->withInput($request->all());
            }
        }
        
        // Request validated
        $article = Article::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);
        if (isset($request->categories)) {
            $article->categories()->attach($request->categories);
        }
        if (isset($tags)) {
            foreach ($tags as $tag_name) {
                $tag = Tag::firstOrCreate(['name' => $tag_name]);
                $article->tags()->attach($tag);
            }
        }

        return redirect()->route('backend_article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // check admin have permission to edit article ?
        // only admin create article so can edit it

        // get data and redict to edit form if have permission
        $article = Article::findOrFail($id);
        $own_categories = Category::join('article_category', 'categories.id', '=', 'article_category.category_id')
                                ->join('articles', 'articles.id', '=', 'article_category.article_id')
                                ->select('categories.*')
                                ->where([
                                    ['articles.id', $id]
                                ])
                                ->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = $article->tags()->get()->map(function($tag) {
            return $tag->name;
        })->implode(',');

        if($article->user_id === Auth::id()) {
            $viewdata = [
                'article' => $article,
                'own_categories' => $own_categories,
                'categories' => $categories,
                'tags' => $tags
            ];
    
            return view($this->folder . 'edit', $viewdata);
        }
        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, $id)
    {
        if (isset($request->categories)) {
            if (count($request->categories) > 3) {
                return redirect()->route('backend_article.edit', $id)
                            ->withErrors(['categories' => "Max 3 categories"])
                            ->withInput($request->all());
            }
        }

        if ($request->tags != '') {
            if (preg_match('/^[0-9A-Za-z ,]*$/', $request->tags)) {
                $input = $request->tags;
                $input = trim($input);
                $input = trim($input, ',');
                $input = preg_replace('/,+/', ',', $input);
                $input = preg_replace('/, +/', ',', $input);
                $input = preg_replace('/ +,/', ',', $input);
                $tags = explode(',', $input);
            } else {
                return redirect()->route('backend_article.edit', $id)
                        ->withErrors(['tags' => "The input contains only numbers, letters and comma"])
                        ->withInput($request->all());
            }
        }

        //
        
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        // Detach all old relationships
        $article->categories()->detach();
        foreach ($article->tags as $tag) {
            $article->tags()->detach($tag->id);
            Tag::where('id', $tag->id)
                ->forceDelete();
        }

        // update new relationships
        if (isset($request->categories)) {
            $article->categories()->attach($request->categories);
        }
        if (isset($tags)) {
            foreach ($tags as $tag_name) {
                $tag = Tag::firstOrCreate(['name' => $tag_name]);
                $article->tags()->attach($tag);
            }
        }
        
        return redirect()->route('backend_article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::findOrFail($id);
        
        // Detach all relationships
        $article->categories()->detach();
        $article->tags()->detach();
        $article->forceDelete();
        Comment::where('article_id', $article->id)
                ->forceDelete();

        return redirect()->route('backend_article.index');
    }
}

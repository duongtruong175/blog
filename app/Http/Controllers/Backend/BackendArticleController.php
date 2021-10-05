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

        $viewdata = [
            'articles' => $articles
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
        $categories = Category::all();
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
        if ($request->tags != '') {
            $input = $request->tags;
            $input = trim($input);
            $input = trim($input, ',');
            $input = preg_replace('/, +/', ',', $input);
            $input = preg_replace('/ +,/', ',', $input);
            $input = preg_replace('/,+/', ',', $input);
            $tags = explode(',', $input);
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
        if ($request->hasFile('image_url')) {
            $file_name = 'image_article_' . $article->id;
            $ext = $request->file('image_url')->getClientOriginalExtension();
            $article->addMediaFromRequest('image_url')
                ->usingName($file_name)
                ->usingFileName($file_name . '.' . $ext)
                ->toMediaCollection('images_url');
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
        // get data and redict to edit form if have permission
        $article = Article::with(['categories', 'tags'])->findOrFail($id);
        $own_categories = Category::join('article_category', 'categories.id', '=', 'article_category.category_id')
            ->join('articles', 'articles.id', '=', 'article_category.article_id')
            ->select('categories.*')
            ->where([
                ['articles.id', $id]
            ])
            ->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = $article->tags->map(function ($tag) {
            return $tag->name;
        })->implode(',');

        $viewdata = [
            'article' => $article,
            'own_categories' => $own_categories,
            'categories' => $categories,
            'tags' => $tags
        ];

        return view($this->folder . 'edit', $viewdata);
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
        if ($request->tags != '') {
            $input = $request->tags;
            $input = trim($input);
            $input = trim($input, ',');
            $input = preg_replace('/, +/', ',', $input);
            $input = preg_replace('/ +,/', ',', $input);
            $input = preg_replace('/,+/', ',', $input);
            $new_tags_name = explode(',', $input);
        } else {
            $new_tags_name = array();
        }

        // request validated
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        // Detach all old relationships and update new relationships
        $article->categories()->detach();
        if (isset($request->categories)) {
            $article->categories()->attach($request->categories);
        }

        $equal_tags = array();
        foreach ($article->tags as $tag) {
            if (!in_array($tag->name, $new_tags_name)) {
                $article->tags()->detach($tag->id);
                $tag = Tag::withCount('articles')
                    ->where('id', $tag->id)
                    ->first();
                if (!empty($tag) && $tag->articles_count == 0) {
                    $tag->forceDelete();
                }
            } else {
                $equal_tags[] = $tag->name;
            }
        }
        foreach ($new_tags_name as $tag_name) {
            if (!in_array($tag_name, $equal_tags)) {
                $tag = Tag::firstOrCreate(['name' => $tag_name]);
                $article->tags()->attach($tag);
            }
        }

        if ($request->hasFile('image_url')) {
            $file_name = 'image_article_' . $article->id;
            $ext = $request->file('image_url')->getClientOriginalExtension();
            $article->clearMediaCollection('images_url');
            $article->addMediaFromRequest('image_url')
                ->usingName($file_name)
                ->usingFileName($file_name . '.' . $ext)
                ->toMediaCollection('images_url');
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

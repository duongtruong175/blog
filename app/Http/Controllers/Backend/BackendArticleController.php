<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
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
        $articles = Article::with('user')->get();

        // get articles owned by User
        $own_articles = array();
        foreach($articles as $article) {
            if(Auth::id() === $article->user_id) {
                array_push($own_articles, $article);
            }
        }
        
        $viewdata = [
            'articles' => $articles,
            'own_articles' => $own_articles,
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
        // redict to create new form
        return view($this->folder . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        // Validate errors (StoreArticleRequest validated)
        $article = Article::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

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

        if($article->user_id === Auth::id()) {
            $viewdata = [
                'article' => $article
            ];
    
            return view($this->folder . 'edit', $viewdata);
        }
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
        //
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;

        $article->save();
        
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
        
        $article->delete();

        return redirect()->route('backend_article.index');
    }
}

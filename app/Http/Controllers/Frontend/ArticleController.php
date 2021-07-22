<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    // Variable to the directory contains a view
    protected $folder = 'frontend.article.';
    
    /**
     * Display articles interface
     */
    public function index()
    {
        // Get list of articles
        $articles = Article::all();

        $viewdata = [
            'articles' => $articles
        ];

        return view($this->folder . 'index', $viewdata);
    }

    /**
     * Display detail article
     */
    public function show($id)
    {
        // get article id = $id
        // $article = Article::findOrFail($id);

        // $viewdata = [
        //     'article' => $article
        // ];

        // return view($this->folder . 'detail', $viewdata);
        return view($this->folder . 'detail');
    }
}

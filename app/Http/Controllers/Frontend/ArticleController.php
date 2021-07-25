<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;

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
        $articles = Article::with(['user', 'categories', 'tags', 'comments'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(5);
        $categories = Category::all();
        $top_tags = Tag::all();

        $viewdata = [
            'articles' => $articles,
            'categories' => $categories,
            'top_tags' => $top_tags
        ];
        
        return view($this->folder . 'index', $viewdata);
    }

    /**
     * Display detail article
     */
    public function show($id)
    {
        //get article id = $id and get all comments of article
        $article = Article::with(['user', 'categories', 'tags'])->findOrFail($id);
        $comments = Comment::where('article_id', $article->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        $viewdata = [
            'article' => $article,
            'comments' => $comments
        ];

        return view($this->folder . 'detail', $viewdata);
    }
}

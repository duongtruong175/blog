<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

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
                            ->when(request('category_id'), function($query) {
                                return $query->whereHas('categories', function($q) {
                                    return $q->where('id', request('category_id'));
                                });
                            })
                            ->when(request('tag_id'), function($query) {
                                return $query->whereHas('tags', function($q) {
                                    return $q->where('id', request('tag_id'));
                                });
                            })
                            ->when(request('keyword'), function($query) {
                                return $query->where('title', 'like', '%' . request('keyword') . '%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate(5);
        $categories = Category::all();
        $results_raw = DB::select('SELECT tag_id FROM article_tag GROUP BY tag_id ORDER BY COUNT(tag_id) DESC LIMIT 5');
        $tags_id = array();
        foreach ($results_raw as $result_raw) {
            array_push($tags_id, $result_raw->tag_id);
        }
        $top_tags = Tag::whereIn('id', $tags_id)
                        ->get();

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

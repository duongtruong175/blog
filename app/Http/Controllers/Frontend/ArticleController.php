<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    // Biến trỏ đến thư mục chứa các view
    protected $folder = 'frontend.article.';
    
    /**
     * Hiển thị trang blog
     */
    public function index()
    {
        // Lấy danh sách tất cả
        $articles = Article::all();

        $viewdata = [
            'articles' => $articles
        ];

        return view($this->folder . 'index', $viewdata);
    }

    /**
     * Hiển thị chi tiết một bài
     */
    public function show($id)
    {
        // Lấy ra bài có id = $id
        $article = Article::findOrFail($id);

        $viewdata = [
            'article' => $article
        ];

        return view($this->folder . 'detail', $viewdata);
    }
}

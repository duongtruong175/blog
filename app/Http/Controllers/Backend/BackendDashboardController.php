<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;

class BackendDashboardController extends Controller
{
    // Variable to the directory contains a view
    protected $folder = 'backend.dashboard.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display dashboard page: contain data statistics
        $total_articles = Article::count();
        $total_categories = Category::count();
        $total_comments = Comment::count();
        $total_roles = Role::count();
        $total_tags = Tag::count();
        $total_users = User::count();

        $view_data = [
            'total_articles' => $total_articles,
            'total_categories' => $total_categories,
            'total_comments' => $total_comments,
            'total_roles' => $total_roles,
            'total_tags' => $total_tags,
            'total_users' => $total_users
        ];

        return view($this->folder . 'index', $view_data);
    }
}

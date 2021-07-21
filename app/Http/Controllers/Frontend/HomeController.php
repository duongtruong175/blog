<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $folder = 'frontend.home.';
    /**
     * Display home page
     */
    public function index()
    {
        // Hiển thị trang chủ
        return view($this->folder . 'index');
    }

    /**
     * Display about page
     */
    public function about()
    {
        // Hiển thị trang about
        return view($this->folder . 'about');
    }
}

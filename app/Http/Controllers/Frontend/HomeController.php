<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $folder = 'frontend.home.';
    /**
     * Display home page
     */
    public function index()
    {
        //
        return view($this->folder . 'index');
    }

    /**
     * Display about page
     */
    public function about()
    {
        //
        return view($this->folder . 'about');
    }
}

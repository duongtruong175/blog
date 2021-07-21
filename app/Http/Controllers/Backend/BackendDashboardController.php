<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class BackendDashboardController extends Controller
{
    protected $folder = 'backend.dashboard.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Hiển thị trang tổng quan, tổng hợp các thông số theo biểu đồ
        
        return view($this->folder . 'index');
    }
}

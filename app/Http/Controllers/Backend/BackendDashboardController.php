<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class BackendDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Hien thi thong tin tong quan
        return view('backend.dashboard.index');
    }
}

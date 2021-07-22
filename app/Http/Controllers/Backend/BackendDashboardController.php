<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

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
        return view($this->folder . 'index');
    }
}

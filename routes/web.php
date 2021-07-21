<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| auth.php: chứa các route cho các chức năng xác thực
| frontend.php: chứa các route giao diện người dùng (trang chủ home ở đây)
| backend.php: chứa các route giao diện người quản trị
|
*/

require __DIR__.'/auth.php';

// Frontend
require __DIR__.'/frontend.php';

// Backend
require __DIR__.'/backend.php';
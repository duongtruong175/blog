<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/contact/create');
});

Route::get('/contact/create', function () {
    return view('contact.create');
});

Route::post('/contact', function (Request $request) {
    return view('contact.view',
    [
        'name' => $request->input('name'),
        'address' => $request->input('address'),
        'email' => $request->input('email'),
        'content' => $request->input('content')
    ]);
});

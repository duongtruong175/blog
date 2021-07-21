<?php

use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Chứa các routes của phần frontend sẽ sử dụng
|
*/

Route::get('/', [HomeController::class, 'index'])
            ->name('home');

Route::get('/about', [HomeController::class, 'about'])
            ->name('about');

// Article
Route::prefix('articles')->group(function() {
    Route::get('/', [ArticleController::class, 'index'])
                    ->name('articles.index');
    Route::get('/{id}', [ArticleController::class, 'show'])
                    ->name('articles.show');
});

Route::group(['middleware' => 'auth'], function() {
    // Comment
    Route::post('/comments', [CommentController::class, 'store'])
                    ->name('comment.store');
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Contacts
    Route::prefix('contacts')->group(function() {
        Route::get('/', [ContactController::class, 'index'])
                    ->name('contacts.index');
        Route::get('/create', [ContactController::class, 'create'])
                        ->name('contacts.create');
        Route::post('/', [ContactController::class, 'store'])
                        ->name('contacts.store');
        Route::get('/{id}', [ContactController::class, 'show'])
                        ->name('contacts.show');
        Route::get('/{id}/edit', [ContactController::class, 'edit'])
                        ->name('contacts.edit');
        Route::delete('/{id}', [ContactController::class, 'destroy'])
                        ->name('contacts.destroy');
    });
});
<?php

use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LocalizationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Contain routes of user interface
|
*/

Route::get('/', [HomeController::class, 'index'])
            ->name('home');

Route::get('/about', [HomeController::class, 'about'])
            ->name('about');

// Route change Language
Route::get('/locale/{locale}', [LocalizationController::class, 'changeLocale'])
            ->name('locale');

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
});

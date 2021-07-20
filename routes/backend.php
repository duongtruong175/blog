<?php

use App\Http\Controllers\Backend\BackendArticleController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendCommentController;
use App\Http\Controllers\Backend\BackendDashboardController;
use App\Http\Controllers\Backend\BackendHomeController;
use App\Http\Controllers\Backend\BackendRoleController;
use App\Http\Controllers\Backend\BackendTagController;
use App\Http\Controllers\Backend\BackendUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Chứa các routes của phần backend sẽ sử dụng
| middleware lọc người có quyền admin mới vào được tiếp
| prefix -> đường dẫn: /admin/...
|
*/

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
    // Home
    Route::get('', BackendHomeController::class)
                    ->name('backend.home');

    // Dashboard
    Route::get('/dashboard', [BackendDashboardController::class, 'index'])
                    ->name('backend_dashboard.index');
    
    // User
    Route::prefix('users')->group(function() {
        Route::get('', [BackendUserController::class, 'index'])
                    ->name('backend_user.index');
        Route::get('/create', [BackendUserController::class, 'create'])
                        ->name('backend_user.create');
        Route::post('', [BackendUserController::class, 'store'])
                        ->name('backend_user.store');
        Route::get('/{id}', [BackendUserController::class, 'show'])
                        ->name('backend_user.show');
        Route::get('/{id}/edit', [BackendUserController::class, 'edit'])
                        ->name('backend_user.edit');
        Route::put('/{id}', [BackendUserController::class, 'update'])
                        ->name('backend_user.update');
        Route::delete('/{id}', [BackendUserController::class, 'destroy'])
                        ->name('backend_user.destroy');
    });

    // Role
    Route::prefix('roles')->group(function() {
        Route::get('', [BackendRoleController::class, 'index'])
                    ->name('backend_role.index');
        Route::get('/create', [BackendRoleController::class, 'create'])
                        ->name('backend_role.create');
        Route::post('', [BackendRoleController::class, 'store'])
                        ->name('backend_role.store');
        Route::get('/{id}', [BackendRoleController::class, 'show'])
                        ->name('backend_role.show');
        Route::get('/{id}/edit', [BackendRoleController::class, 'edit'])
                        ->name('backend_role.edit');
        Route::put('/{id}', [BackendRoleController::class, 'update'])
                        ->name('backend_role.update');
        Route::delete('/{id}', [BackendRoleController::class, 'destroy'])
                        ->name('backend_role.destroy');
    });
    
    // Article
    Route::prefix('articles')->group(function() {
        Route::get('', [BackendArticleController::class, 'index'])
                        ->name('backend_article.index');
        Route::get('/create', [BackendArticleController::class, 'create'])
                        ->name('backend_article.create');
        Route::post('', [BackendArticleController::class, 'store'])
                        ->name('backend_article.store');
        Route::get('/{id}', [BackendArticleController::class, 'show'])
                        ->name('backend_article.show');
        Route::get('/{id}/edit', [BackendArticleController::class, 'edit'])
                        ->name('backend_article.edit');
        Route::put('/{id}', [BackendArticleController::class, 'update'])
                        ->name('backend_article.update');
        Route::delete('/{id}', [BackendArticleController::class, 'destroy'])
                        ->name('backend_article.destroy');
    });

    // Category
    Route::prefix('categories')->group(function() {
        Route::get('', [BackendCategoryController::class, 'index'])
                        ->name('backend_category.index');
        Route::get('/create', [BackendCategoryController::class, 'create'])
                        ->name('backend_category.create');
        Route::post('', [BackendCategoryController::class, 'store'])
                        ->name('backend_category.store');
        Route::get('/{id}', [BackendCategoryController::class, 'show'])
                        ->name('backend_category.show');
        Route::get('/{id}/edit', [BackendCategoryController::class, 'edit'])
                        ->name('backend_category.edit');
        Route::put('/{id}', [BackendCategoryController::class, 'update'])
                        ->name('backend_category.update');
        Route::delete('/{id}', [BackendCategoryController::class, 'destroy'])
                        ->name('backend_category.destroy');
    });
    
    // Tag
    Route::prefix('tags')->group(function() {
        Route::get('', [BackendTagController::class, 'index'])
                        ->name('backend_tag.index');
        Route::get('/create', [BackendTagController::class, 'create'])
                        ->name('backend_tag.create');
        Route::post('', [BackendTagController::class, 'store'])
                        ->name('backend_tag.store');
        Route::get('/{id}', [BackendTagController::class, 'show'])
                        ->name('backend_tag.show');
        Route::get('/{id}/edit', [BackendTagController::class, 'edit'])
                        ->name('backend_tag.edit');
        Route::put('/{id}', [BackendTagController::class, 'update'])
                        ->name('backend_tag.update');
        Route::delete('/{id}', [BackendTagController::class, 'destroy'])
                        ->name('backend_tag.destroy');
    });

    // Comment
    Route::prefix('comments')->group(function() {
        Route::get('', [BackendCommentController::class, 'index'])
                        ->name('backend_comment.index');
        Route::get('/create', [BackendCommentController::class, 'create'])
                        ->name('backend_comment.create');
        Route::post('', [BackendCommentController::class, 'store'])
                        ->name('backend_comment.store');
        Route::get('/{id}', [BackendCommentController::class, 'show'])
                        ->name('backend_comment.show');
        Route::get('/{id}/edit', [BackendCommentController::class, 'edit'])
                        ->name('backend_comment.edit');
        Route::put('/{id}', [BackendCommentController::class, 'update'])
                        ->name('backend_comment.update');
        Route::delete('/{id}', [BackendCommentController::class, 'destroy'])
                        ->name('backend_comment.destroy');
    });
});
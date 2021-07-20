<?php

use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Chứa các routes của phần frontend sẽ sử dụng
|
*/

Route::group(['middleware' => 'auth'], function() {
    // Contacts
    Route::prefix('contacts')->group(function() {
        Route::get('', [ContactController::class, 'index'])
                    ->name('contacts.index');
        Route::get('/create', [ContactController::class, 'create'])
                        ->name('contacts.create');
        Route::post('', [ContactController::class, 'store'])
                        ->name('contacts.store');
        Route::get('/{id}', [ContactController::class, 'show'])
                        ->name('contacts.show');
        Route::get('/{id}/edit', [ContactController::class, 'edit'])
                        ->name('contacts.edit');
        Route::delete('/{id}', [ContactController::class, 'destroy'])
                        ->name('contacts.destroy');
    });
});
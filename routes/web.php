<?php

use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Frontend
// Contacts
Route::get('/contacts', [ContactController::class, 'index'])
                ->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])
                ->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])
                ->name('contacts.store');
Route::get('/contacts/{id}', [ContactController::class, 'show'])
                ->name('contacts.show');
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])
                ->name('contacts.edit');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])
                ->name('contacts.destroy');
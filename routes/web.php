<?php

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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Blogs Resources
    // Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index']);
    // Route::get('/blogs/create', [App\Http\Controllers\BlogController::class, 'create']);
    // Route::post('/blogs', [App\Http\Controllers\BlogController::class, 'store']);
    // Route::get('/blogs/{id}', [App\Http\Controllers\BlogController::class, 'show']);
    // Route::get('/blogs/{id}/edit', [App\Http\Controllers\BlogController::class, 'edit']);
    // Route::put('/blogs/{id}', [App\Http\Controllers\BlogController::class, 'update']);
    // Route::delete('/blogs/{id}', [App\Http\Controllers\BlogController::class, 'destroy']);

    Route::resource('blogs', App\Http\Controllers\BlogController::class);
});

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index']);
    // Route::get('/blog/create', [App\Http\Controllers\BlogController::class, 'create']);
    // Route::get('/blog/edit', [App\Http\Controllers\BlogController::class, 'edit']);

    Route::resource('blog', App\Http\Controllers\BlogController::class);

});

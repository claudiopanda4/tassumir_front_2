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
Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth:web1'], function () {
    Route::get('/', function () {
        return view('feed.index');
    })->middleware('auth:web1');
    //Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('home');
});
Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('account.home');
Route::get('/sair', [App\Http\Controllers\AuthController::class, 'logout'])->name('account.logout');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('account.login.form');
Route::post('/requestlogin', [App\Http\Controllers\AuthController::class, 'login'])->name('account.login.enter');

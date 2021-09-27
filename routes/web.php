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
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/', function () {
        return view('feed.index');
    })->middleware('auth');
});


/*Route::get('/', function () {
    return view('feed.index');
});
Route::prefix('feed')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('feed.index');
});*/
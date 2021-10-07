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
Route::get('/profile/', [App\Http\Controllers\PerfilController::class, 'index'])->name('account.profile');
Route::get('/couple_page/', [App\Http\Controllers\PaginaCasalController::class, 'index'])->name('couple.page');
Route::get('/couple_page/edit', [App\Http\Controllers\PaginaCasalController::class, 'edit_couple'])->name('edit_couple.page');
Route::get('/couple_page/delete_page', [App\Http\Controllers\PaginaCasalController::class, 'delete_couple_page'])->name('delete_couple.page');
Route::get('/page_definition', [App\Http\Controllers\PageDefinition::class, 'index'])->name('page_definition.page');
Route::get('/help_support', [App\Http\Controllers\HelpSupport::class, 'index'])->name('help_support.page');
Route::get('/notificacoes', [App\Http\Controllers\notificatioController::class, 'index'])->name('notifications.page');

Route::get('/sair', [App\Http\Controllers\AuthController::class, 'logout'])->name('account.logout');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('account.login.form');
Route::post('/requestlogin', [App\Http\Controllers\AuthController::class, 'login'])->name('account.login.enter');

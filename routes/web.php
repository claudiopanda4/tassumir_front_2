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
    Route::get('/like', [App\Http\Controllers\AuthController::class, 'like'])->name('like');
    Route::get('/seguir', [App\Http\Controllers\AuthController::class, 'seguir'])->name('seguir');
    Route::get('/comentar', [App\Http\Controllers\AuthController::class, 'comentar'])->name('comentar');
    Route::post('/Pedido_relac/', [App\Http\Controllers\PerfilController::class, 'Pedido_relac'])->name('Pedido_relac');
    Route::get('/profile/', [App\Http\Controllers\PerfilController::class, 'index'])->name('account.profile');
    Route::post('/update/', [App\Http\Controllers\PerfilController::class, 'update'])->name('account.update');
    Route::get('/profile/{id}', [App\Http\Controllers\PerfilController::class, 'perfil_das_contas'])->name('account1.profile');
    Route::get('/profile.edit/{perfil}', [App\Http\Controllers\PerfilController::class, 'edit'])->name('account.profile.edit');
    Route::get('/couple_page/', [App\Http\Controllers\PaginaCasalController::class, 'index'])->name('couple.page');
    Route::post('/couple_post/', [App\Http\Controllers\PaginaCasalController::class, 'store_post'])->name('post_couple.page');
    Route::get('/couple_page/{id}', [App\Http\Controllers\PaginaCasalController::class, 'paginas'])->name('couple.page1');
    Route::get('/couple_page/edit', [App\Http\Controllers\PaginaCasalController::class, 'edit_couple'])->name('edit_couple.page');
    Route::get('/couple_page/delete_page', [App\Http\Controllers\PaginaCasalController::class, 'delete_couple_page'])->name('delete_couple.page');
    Route::get('/page_definition', [App\Http\Controllers\PageDefinition::class, 'index'])->name('page_definition.page');
    Route::get('/help_support', [App\Http\Controllers\HelpSupport::class, 'index'])->name('help_support.page');

    Route::get('/pesquisa', [App\Http\Controllers\searchController::class, 'index'])->name('allSearch.page');
    Route::get('/pesquisa/peoples', [App\Http\Controllers\searchController::class, 'peoplesSearch'])->name('peoplesSearch.page');
    Route::get('/pesquisa/peoples1/{id}', [App\Http\Controllers\searchController::class, 'peoplesSearch1'])->name('peoplesSearch1.page');
    Route::get('/pessoapesquisa', [\App\Http\Controllers\searchController::class, 'pessoapesquisa'])->name('pessoa.pesquisa');
    Route::get('/paginapesquisa', [App\Http\Controllers\searchController::class, 'paginapesquisa'])->name('pagina.pesquisa');
    Route::get('/postpesquisa', [App\Http\Controllers\searchController::class, 'postpesquisa'])->name('post.pesquisa');
    Route::get('/pesquisa/pages', [App\Http\Controllers\searchController::class, 'pagesSearch'])->name('pagesSearch.page');
    Route::get('/pesquisa/pages1/{id}', [App\Http\Controllers\searchController::class, 'pagesSearch1'])->name('pagesSearch1.page');
    Route::get('/pesquisa/publications', [App\Http\Controllers\searchController::class, 'publicationsSearch'])->name('publicationsSearch.page');
    Route::get('/pesquisa/publications1/{id}', [App\Http\Controllers\searchController::class, 'publicationsSearch1'])->name('publicationsSearch1.page');
    Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('account.home.feed');

    //Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('home');
});
Route::get('/sair', [App\Http\Controllers\AuthController::class, 'logout'])->name('account.logout');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('account.login.form');
Route::get('/registrar', [App\Http\Controllers\AuthController::class, 'registrarUser'])->name('account.register.form');
Route::get('registrar/completRegister', [App\Http\Controllers\AuthController::class, 'registrarUserComplete'])->name('account.registerComplete.form');
Route::get('/recuperarSenha', [App\Http\Controllers\AuthController::class, 'recuperarSenha'])->name('account.code.form');
Route::get('/recuperarSenha/code', [App\Http\Controllers\AuthController::class, 'codigoRecebido'])->name('code.received.form');
Route::get('/recuperarSenha/code/saveNew', [App\Http\Controllers\AuthController::class, 'newCode'])->name('validate.newCode.form');
Route::get('/completRegister', [App\Http\Controllers\AuthController::class, 'registrarUserComplete'])->name('account.registerComplete.form');
/* inicio teste */
Route::post('/Info', [App\Http\Controllers\AuthController::class, 'sendtoOtherForm'])->name('account.teste.form');

Route::post('/newAccount', [App\Http\Controllers\AuthController::class, 'joinAndSave'])->name('account.enter.form');
/* fim teste*/
Route::post('/requestlogin', [App\Http\Controllers\AuthController::class, 'login'])->name('account.login.enter');
Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('account.home');

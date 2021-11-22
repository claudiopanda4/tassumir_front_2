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
    Route::get('/comment_reac', [App\Http\Controllers\AuthController::class, 'comment_reac'])->name('comment_reac');
    Route::get('/tipos', [App\Http\Controllers\AuthController::class, 'tipos'])->name('tipos');
    Route::get('/reject_relationship', [App\Http\Controllers\PaginaCasalController::class, 'reject_relationship'])->name('reject_relationship');
    Route::get('/tconfirm', [App\Http\Controllers\PaginaCasalController::class, 'tconfirm'])->name('tconfirm');
    Route::get('/seguir', [App\Http\Controllers\AuthController::class, 'seguir'])->name('seguir');
    Route::get('/oque_estao_falando', [App\Http\Controllers\AuthController::class, 'oque_estao_falando'])->name('oque_estao_falando');
    Route::get('/delete_post', [App\Http\Controllers\AuthController::class, 'delete_post'])->name('delete_post');
    Route::get('/ocultar_post', [App\Http\Controllers\AuthController::class, 'ocultar_post'])->name('ocultar_post');
    Route::get('/post_index/{id}', [App\Http\Controllers\AuthController::class, 'post_index'])->name('post_index');
    Route::get('/savepost', [App\Http\Controllers\AuthController::class, 'savepost'])->name('savepost');
    Route::get('/comentar', [App\Http\Controllers\AuthController::class, 'comentar'])->name('comentar');
    Route::post('/Pedido_relac/', [App\Http\Controllers\PerfilController::class, 'Pedido_relac'])->name('Pedido_relac');
    Route::get('/profile/', [App\Http\Controllers\PerfilController::class, 'index'])->name('account.profile');
    Route::post('/profile/picture/', [App\Http\Controllers\PerfilController::class, 'add_picture'])->name('account.profile.pic');

    Route::post('/update/', [App\Http\Controllers\PerfilController::class, 'update'])->name('account.update');
    Route::get('/profileC/{id}', [App\Http\Controllers\PerfilController::class, 'perfil_das_contas'])->name('account1.profile');
    Route::get('/profile/{perfil}', [App\Http\Controllers\PerfilController::class, 'edit'])->name('account.profile.edit');


    Route::get('/couple_page/', [App\Http\Controllers\PaginaCasalController::class, 'index'])->name('couple.page');
    Route::get('/my_pages/', [App\Http\Controllers\PaginaCasalController::class, 'my_pages'])->name('couple.page.mine');
    Route::get('/posts/{uuid}', [App\Http\Controllers\PaginaCasalController::class, 'post'])->name('couple.page.post');
    Route::post('/couple_post/', [App\Http\Controllers\PaginaCasalController::class, 'store_post'])->name('post_couple.page');
    Route::get('/request_relationship/', [App\Http\Controllers\PaginaCasalController::class, 'request_relationship'])->name('relationship.page');
    Route::get('/request_relationship1/{id}', [App\Http\Controllers\PaginaCasalController::class, 'request_relationship1'])->name('relationship.page1');
    Route::post('/conf_PR/', [App\Http\Controllers\PaginaCasalController::class, 'conf_PR'])->name('conf_PR');
    Route::post('/Outra_pessoa/', [App\Http\Controllers\PaginaCasalController::class, 'Outra_pessoa'])->name('Outra_pessoa');
    Route::get('/couple_page/{id}', [App\Http\Controllers\PaginaCasalController::class, 'paginas'])->name('couple.page1');

    Route::get('/couple_page_show/{id}', [App\Http\Controllers\PaginaCasalController::class, 'paginas'])->name('couple_page.show');

    Route::get('/couple_page/edit', [App\Http\Controllers\PaginaCasalController::class, 'edit_couple'])->name('edit_couple.page');
    Route::get('/couple_page/delete_page', [App\Http\Controllers\PaginaCasalController::class, 'delete_couple_page'])->name('delete_couple.page');
    Route::get('/page_definition', [App\Http\Controllers\PageDefinition::class, 'index'])->name('page_definition.page');
    Route::get('/help_support', [App\Http\Controllers\HelpSupport::class, 'index'])->name('help_support.page');

    Route::get('/pesquisa', [App\Http\Controllers\searchController::class, 'index'])->name('allSearch.page');
    Route::get('/pesquisa/peoples', [App\Http\Controllers\searchController::class, 'peoplesSearch'])->name('peoplesSearch.page');
    Route::get('/pesquisa/peoples1/{id}', [App\Http\Controllers\searchController::class, 'peoplesSearch1'])->name('peoplesSearch1.page');
    
    Route::get('/pessoapesquisa', [\App\Http\Controllers\searchController::class, 'pessoapesquisa'])->name('pessoa.pesquisa');

    Route::get('/peoplepesquisa', [\App\Http\Controllers\searchController::class, 'peoplepesquisa'])->name('people.pesquisa');

    Route::get('/paginapesquisa', [App\Http\Controllers\searchController::class, 'paginapesquisa'])->name('pagina.pesquisa');
    Route::get('/postpesquisa', [App\Http\Controllers\searchController::class, 'postpesquisa'])->name('post.pesquisa');
    Route::get('/pesquisa/pages', [App\Http\Controllers\searchController::class, 'pagesSearch'])->name('pagesSearch.page');
    Route::get('/pesquisa/pages1/{id}', [App\Http\Controllers\searchController::class, 'pagesSearch1'])->name('pagesSearch1.page');
    Route::get('/pesquisa/publications', [App\Http\Controllers\searchController::class, 'publicationsSearch'])->name('publicationsSearch.page');
    Route::get('/pesquisa/publications1/{id}', [App\Http\Controllers\searchController::class, 'publicationsSearch1'])->name('publicationsSearch1.page');
    Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('account.home.feed');
    Route::get('/seguir/page', [App\Http\Controllers\SeguidorController::class, 'store'])->name('seguir.seguindo');
    Route::get('nao/seguir', [App\Http\Controllers\SeguidorController::class, 'destroy'])->name('nao.seguir.seguindo');


    Route::get('/direct/', [App\Http\Controllers\MessageController::class, 'index'])->name('message.index');
    Route::get('/send/', [App\Http\Controllers\MessageController::class, 'store'])->name('message.send');
    Route::get('/show/', [App\Http\Controllers\MessageController::class, 'show'])->name('message.show');
    Route::get('/mostrar/{uuid_remetente}/{uuid_destino}', [App\Http\Controllers\MessageController::class, 'mostrar_sms'])->name('message.mostrar');
    Route::get('/pesquisar/destinatario', [App\Http\Controllers\MessageController::class, 'pesquisar_destinatario'])->name('people.send.message');

    //Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('home');
});
Route::get('/sair', [App\Http\Controllers\AuthController::class, 'logout'])->name('account.logout');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('account.login.form');
Route::get('/registrar', [App\Http\Controllers\AuthController::class, 'registrarUser'])->name('account.register.form');
Route::get('registrar/completRegister', [App\Http\Controllers\AuthController::class, 'registrarUserComplete'])->name('account.registerComplete.form');
Route::get('/recuperarSenha', [App\Http\Controllers\AuthController::class, 'recuperarSenha'])->name('account.code.form');
Route::get('/recuperarSenha/code', [App\Http\Controllers\AuthController::class, 'codigoRecebido'])->name('code.received.form');
Route::get('/recuperarSenha/code/saveNew', [App\Http\Controllers\AuthController::class, 'newCode'])->name('validate.newCode.form');

Route::post('/recuperarSenha/code/saveNew', [App\Http\Controllers\AuthController::class, 'updatePassword'])->name('account.newPasswordSave');

Route::get('/completRegister', [App\Http\Controllers\AuthController::class, 'registrarUserComplete'])->name('account.registerComplete.form');

//posts
Route::get('/view/', [App\Http\Controllers\PostController::class, 'view_post'])->name('post.view.save');
Route::get('/getvideo/', [App\Http\Controllers\PostController::class, 'get_video'])->name('post.video.get');
Route::get('/getposts/', [App\Http\Controllers\PostController::class, 'index'])->name('post.get');
//endposts


Route::get('/confirmarCodigo', [App\Http\Controllers\AuthController::class, 'codigoRecebidoRegisto'])->name('account.codeConfirmation.form');

Route::post('/Info', [App\Http\Controllers\AuthController::class, 'sendtoOtherForm'])->name('account.teste.form');

Route::post('/newAccount', [App\Http\Controllers\AuthController::class, 'joinAndSave'])->name('account.enter.form');

Route::post('/verificarCodigo', [App\Http\Controllers\AuthController::class, 'verifyCodeSent'])->name('account.verifyCode.enter');

Route::get('/verificarCodigo', [App\Http\Controllers\AuthController::class, 'verifyCodeSent'])->name('account.verifyCode.enter');

Route::post('/verificarCodigo/Again', [App\Http\Controllers\AuthController::class, 'verifyAgainCodeSent'])->name('account.verifyAgainCode.enter');


Route::post('/gerarNovamente', [App\Http\Controllers\AuthController::class, 'generateAgain'])->name('account.generateAgain.enter');

Route::post('/requestlogin', [App\Http\Controllers\AuthController::class, 'login'])->name('account.login.enter');

/* here */
Route::post('/sendTo',[App\Http\Controllers\AuthController::class, 'sendPhoneEmailRecover'])->name('account.sendToPhoneEmail');

Route::post('/codeVerification',[App\Http\Controllers\AuthController::class, 'verifyToRecoverPass'])->name('account.verifyToRecoverPass');


Route::post('/newPassword',[App\Http\Controllers\AuthController::class, 'updatePassword'])->name('account.newPasswordSave');


Route::post('/newPassword',[App\Http\Controllers\AuthController::class, 'updatePassword2'])->name('account.newPasswordSave2');

/* end here */

Route::get('/allNotifications', [App\Http\Controllers\AuthController::class, 'seeAllNotifications'])->name('account.all.notifications');
Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('account.home');

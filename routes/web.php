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
    Route::get('/user_data', [App\Http\Controllers\AuthController::class, 'user_data'])->name('account.data');
    Route::get('/tip_of_relac_you', [App\Http\Controllers\AuthController::class, 'tip_of_relac_you'])->name('tip_of_relac_you');
    Route::get('/state_civil_and_descrition', [App\Http\Controllers\AuthController::class, 'state_civil_and_descrition'])->name('state_civil_and_descrition');
    Route::get('/post/like', [App\Http\Controllers\AuthController::class, 'like_final'])->name('like');
    Route::get('/post/index/comment', [App\Http\Controllers\AuthController::class, 'comentar_final'])->name('comentar.index');
    Route::get('/profile/maritalstatus', [App\Http\Controllers\PerfilController::class, 'marital_status'])->name('profile.marital.status');
    Route::get('/return/id', [App\Http\Controllers\AuthController::class, 'ident'])->name('like');
    Route::get('/qtd_savesqtd_saves', [App\Http\Controllers\AuthController::class, 'qtd_saves'])->name('qtd_saves');
    Route::get('/qtd_pages_seg', [App\Http\Controllers\AuthController::class, 'qtd_pages_seg'])->name('qtd_pages_seg');
    Route::get('/qtd_like', [App\Http\Controllers\AuthController::class, 'qtd_like'])->name('lqtd_like');
    //Route::get('/like', [App\Http\Controllers\AuthController::class, 'like'])->name('like');
    Route::get('/like_unlike', [App\Http\Controllers\AuthController::class, 'like_unlike'])->name('like_unlike');
    Route::get('/alert', [App\Http\Controllers\AuthController::class, 'alert'])->name('error.alert');
    Route::get('/definitions', [App\Http\Controllers\AuthController::class, 'alert'])->name('error.definitions');
    Route::get('/help', [App\Http\Controllers\AuthController::class, 'alert'])->name('error.help');
    Route::get('/Earn_money', [App\Http\Controllers\AuthController::class, 'alert'])->name('error.Earn_money');
    Route::get('/comment_reac', [App\Http\Controllers\AuthController::class, 'comment_reac'])->name('comment_reac');
    Route::get('/tipos', [App\Http\Controllers\AuthController::class, 'tipos'])->name('tipos');
    Route::get('/profile/data', [App\Http\Controllers\PerfilController::class, 'data_profile'])->name('profile.data');
    Route::get('/profile/relationship/request', [App\Http\Controllers\PerfilController::class, 'relationship_request'])->name('profile.relationship.request');
    Route::get('/app/notifications/numbers', [App\Http\Controllers\PerfilController::class, 'notificacoes_number'])->name('app.notifications.numbers');
    Route::get('/updatenot', [App\Http\Controllers\AuthController::class, 'updatenot'])->name('updatenot');
    Route::get('/reject_relationship', [App\Http\Controllers\PaginaCasalController::class, 'reject_relationship'])->name('reject_relationship');
    Route::get('/relationship/cancel/{uuid}', [App\Http\Controllers\PaginaCasalController::class, 'cancel_request_relationship'])->name('cancel.request.relationship');
    Route::get('/tconfirm', [App\Http\Controllers\PaginaCasalController::class, 'tconfirm'])->name('tconfirm');
    Route::get('/relationship/confirm/{uuid}', [App\Http\Controllers\PaginaCasalController::class, 'relationship_accept'])->name('relationship.accept');
    Route::get('/seguir', [App\Http\Controllers\AuthController::class, 'seguir'])->name('seguir');
    Route::get('/oque_estao_falando', [App\Http\Controllouplcers\AuthController::class, 'oque_estao_falando'])->name('oque_estao_falando');
    Route::get('/delete_post', [App\Http\Controllers\AuthController::class, 'delete_post'])->name('delete_post');
    Route::get('/pegar_mais_post', [App\Http\Controllers\AuthController::class, 'pegar_mais_post'])->name('pegar_mais_post');
    Route::get('/ocultar_post', [App\Http\Controllers\AuthController::class, 'ocultar_post'])->name('ocultar_post');
    /*novas rotas perfil*/
    Route::get('/get_nine_videos_perfil', [App\Http\Controllers\PerfilController::class, 'get_nine_videos_perfil'])->name('get_nine_videos_perfil');
    Route::get('/get_nine_images_perfil', [App\Http\Controllers\PerfilController::class, 'get_nine_images_perfil'])->name('get_nine_images_perfil');
    Route::get('/get_nine_text_perfil', [App\Http\Controllers\PerfilController::class, 'get_nine_text_perfil'])->name('get_nine_text_perfil');

    /*fim novas rotas perfil*/

    /*novas rotas pages*/
    Route::get('/page/posts/numbers/{uuid}', [App\Http\Controllers\PaginaCasalController::class, 'qtd_de_publicacoes'])->name('couple.qtd_de_publicacoes');
    Route::get('/dados_page/', [App\Http\Controllers\PaginaCasalController::class, 'dados_page'])->name('couple.dados_page');
    Route::get('/page/posts/followers/', [App\Http\Controllers\PaginaCasalController::class, 'qtd_de_seguidores'])->name('couple.qtd_de_seguidores');
    Route::get('/page/following/ami', [App\Http\Controllers\PaginaCasalController::class, 'ami_following'])->name('couple.qtd_de_seguidores');
    Route::get('/get_follow_me/', [App\Http\Controllers\PaginaCasalController::class, 'get_follow_me'])->name('couple.get_follow_me');
    Route::get('/page/posts/reactions/', [App\Http\Controllers\PaginaCasalController::class, 'qtd_de_likes_page'])->name('couple.qtd_de_likes_page');
    Route::get('/get_nine_text_page/', [App\Http\Controllers\PaginaCasalController::class, 'get_nine_text_page'])->name('couple.get_nine_text_page');
    Route::get('/get_nine_images_page/', [App\Http\Controllers\PaginaCasalController::class, 'get_nine_images_page'])->name('couple.get_nine_images_page');
    Route::get('/couple_page/page/content/videos/', [App\Http\Controllers\PaginaCasalController::class, 'get_nine_videos_page'])->name('page.couple.videos');
    /*fim novas rotas pages*/

    /*novas rotas tassumirvideo*/
    Route::get('/tassumirvideos_final/{id}', [App\Http\Controllers\PostController::class, 'tassumirvideos_final'])->name('post.tassumir.video_final');
    /*fim das novas rotas tassumirvideo*/
    Route::get('/post_index/{id}', [App\Http\Controllers\AuthController::class, 'post_index'])->name('post_index');

    /* siene */
    Route::get('/get_only_post/', [App\Http\Controllers\AuthController::class, 'get_only_post'])->name('get_post');


    Route::get('/get_only_comments/', [App\Http\Controllers\AuthController::class, 'get_only_comments'])->name('get_comments');
    /* end siene  */

    Route::get('/verify_not', [App\Http\Controllers\AuthController::class, 'verify_not'])->name('verify_not');
    Route::get('/savepost', [App\Http\Controllers\AuthController::class, 'savepost'])->name('savepost');
    Route::get('/comentar', [App\Http\Controllers\AuthController::class, 'comentar'])->name('comentar');
    Route::post('/Pedido_relac/', [App\Http\Controllers\PerfilController::class, 'Pedido_relac'])->name('Pedido_relac');
    Route::post('/engagement/proposal/', [App\Http\Controllers\PerfilController::class, 'engagement_proposal'])->name('engagement.proposal');
    Route::get('/profile/', [App\Http\Controllers\PerfilController::class, 'index'])->name('account.profile');
    Route::post('/profile/picture/', [App\Http\Controllers\PerfilController::class, 'add_picture'])->name('account.profile.pic');

    Route::post('/update/', [App\Http\Controllers\PerfilController::class, 'update'])->name('account.update');
    Route::get('/profile/{id}', [App\Http\Controllers\PerfilController::class, 'index_visit'])->name('account1.profile');
    Route::get('/profile/edit/{perfil}', [App\Http\Controllers\PerfilController::class, 'edit'])->name('account.profile.edit');
    Route::get('/page/description/{uuid}', [App\Http\Controllers\PaginaCasalController::class, 'description_page'])->name('page.description');

    Route::get('/paginas_que_sigo/{id}', [App\Http\Controllers\PaginaCasalController::class, 'paginas_que_sigo'])->name('paginas_que_sigo.page');
    Route::get('/who_follows_me/{id}', [App\Http\Controllers\PaginaCasalController::class, 'who_follows_me'])->name('who_follows_me.page');

    Route::post('/page_update/', [App\Http\Controllers\PaginaCasalController::class, 'page_update'])->name('page_update');
    Route::get('/couple_page/{uuid}', [App\Http\Controllers\PaginaCasalController::class, 'index'])->name('couple.page');
    Route::get('/my_pages/', [App\Http\Controllers\PaginaCasalController::class, 'my_pages'])->name('couple.page.mine');
    Route::get('/posts/{uuid}', [App\Http\Controllers\PaginaCasalController::class, 'post'])->name('couple.page.post');
    Route::post('/couple_post/', [App\Http\Controllers\PaginaCasalController::class, 'store_post'])->name('post_couple.page');
    Route::post('/undo_page_deletion/', [App\Http\Controllers\PaginaCasalController::class, 'undo_page_deletion'])->name('undo_page_deletion.page');
    Route::post('/ask_for_annulment/', [App\Http\Controllers\PaginaCasalController::class, 'ask_for_annulment'])->name('ask_for_annulment.page');
    Route::get('/request_relationship/', [App\Http\Controllers\PaginaCasalController::class, 'request_relationship'])->name('relationship.page');
    Route::get('/request_relationship1/{id}', [App\Http\Controllers\PaginaCasalController::class, 'request_relationship1'])->name('relationship.page1');
    Route::post('/conf_PR/', [App\Http\Controllers\PaginaCasalController::class, 'conf_PR'])->name('conf_PR');
    Route::post('/relationship/accept/', [App\Http\Controllers\PaginaCasalController::class, 'accepted_relationship'])->name('relationship.accept');
    Route::post('/Outra_pessoa/', [App\Http\Controllers\PaginaCasalController::class, 'Outra_pessoa'])->name('Outra_pessoa');
    Route::get('/couple_page/{id}', [App\Http\Controllers\PaginaCasalController::class, 'paginas'])->name('couple.page1');

    Route::get('/couple_page_show/{id}', [App\Http\Controllers\PaginaCasalController::class, 'paginas'])->name('couple_page.show');

    Route::get('/couple_page/edit', [App\Http\Controllers\PaginaCasalController::class, 'edit_couple'])->name('edit_couple.page');
    Route::get('/couple_page/delete_page/{id}', [App\Http\Controllers\PaginaCasalController::class, 'delete_couple_page'])->name('delete_couple.page');
    Route::get('/page_definition', [App\Http\Controllers\PageDefinition::class, 'index'])->name('page_definition.page');
    Route::get('/help_support', [App\Http\Controllers\HelpSupport::class, 'index'])->name('help_support.page');

    Route::get('/pesquisa/', [App\Http\Controllers\searchController::class, 'index1'])->name('allSearch1.page');
    Route::get('/pesquisa/pages/', [App\Http\Controllers\searchController::class, 'pagesSearch1']);
    Route::get('/pesquisa/publications/', [App\Http\Controllers\searchController::class, 'publicationsSearch1']);
    Route::get('/pesquisa/peoples/', [App\Http\Controllers\searchController::class, 'peoplesSearch1']);
    Route::get('/pesquisa/{id}', [App\Http\Controllers\searchController::class, 'index'])->name('allSearch.page');
    Route::get('/pesquisa/pages/{id}', [App\Http\Controllers\searchController::class, 'pagesSearch'])->name('pagesSearch.page');
    Route::get('/pesquisa/publications/{id}', [App\Http\Controllers\searchController::class, 'publicationsSearch'])->name('publicationsSearch.page');
    Route::get('/pesquisa/peoples/{id}', [App\Http\Controllers\searchController::class, 'peoplesSearch'])->name('peoplesSearch.page');

    Route::get('/pessoapesquisa', [\App\Http\Controllers\searchController::class, 'pessoapesquisa'])->name('pessoa.pesquisa');

    Route::get('/peoplepesquisa', [\App\Http\Controllers\searchController::class, 'peoplepesquisa'])->name('people.pesquisa');

    Route::get('/allpeoplepesquisa', [\App\Http\Controllers\searchController::class, 'allpagepesquisa'])->name('allpage.pesquisa');

    Route::get('/paginapesquisa', [App\Http\Controllers\searchController::class, 'paginapesquisa'])->name('pagina.pesquisa');
    Route::get('/postpesquisa', [App\Http\Controllers\searchController::class, 'postpesquisa'])->name('post.pesquisa');
    Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('account.home.feed');
    Route::get('/pegar_ultimocomment', [App\Http\Controllers\AuthController::class, 'pegar_ultimocomment'])->name('pegar_ultimocomment');

    /*Rotas para requisições Ajax*/
    Route::get('/page/follow', [App\Http\Controllers\SeguidorController::class, 'follow'])->name('page.follow');
    Route::get('/page/spouse', [App\Http\Controllers\SeguidorController::class, 'spouse'])->name('page.spouse');
    Route::get('/page/spouses/name', [App\Http\Controllers\PaginaCasalController::class, 'spouse_names'])->name('page.spouse.name');
    Route::get('/relationship/paymment/', [App\Http\Controllers\PaginaCasalController::class, 'get_relationship'])->name('relationship.paymment');
    Route::get('/relationship/type', [App\Http\Controllers\AuthController::class, 'relationship_type'])->name('relationship.type');
    Route::get('/home/index', [App\Http\Controllers\AuthController::class, 'home'])->name('home.index');
    Route::get('/page/following', [App\Http\Controllers\AuthController::class, 'paginasqueSigo'])->name('page.que.sigo');
    Route::get('/page/following/index', [App\Http\Controllers\AuthController::class, 'paginasquenaoSigoIndex'])->name('page.para.index');
    Route::get('/page/no_following', [App\Http\Controllers\AuthController::class, 'paginasquenaoSigo'])->name('page.que.nao.sigo');
    Route::get('/home/destaques', [App\Http\Controllers\AuthController::class, 'destaques'])->name('home.destaque');
    Route::get('/home/posts', [App\Http\Controllers\PageController::class, 'post_final1'])->name('home.posts');
    Route::get('/relationship/user/search', [App\Http\Controllers\PerfilController::class, 'search_assumir'])->name('/relationship.user.search');
    Route::get('/home/posts_page_no_follow', [App\Http\Controllers\PageController::class, 'post_final2'])->name('home.posts.no_follow');
    Route::get('/relationship/requests', [App\Http\Controllers\PerfilController::class, 'relationship_requests'])->name('relationship.requests');
    Route::get('/relationship/requests/pedinte', [App\Http\Controllers\PerfilController::class, 'relationship_requests_pedinte'])->name('relationship.requests.pedinte');
    /*Fim rotas para Ajax*/

    Route::get('/seguir/page', [App\Http\Controllers\SeguidorController::class, 'store'])->name('seguir.seguindo');
    Route::get('nao/seguir', [App\Http\Controllers\SeguidorController::class, 'destroy'])->name('nao.seguir.seguindo');
    Route::get('/direct/', [App\Http\Controllers\MessageController::class, 'index'])->name('message.index');
    Route::get('/send/', [App\Http\Controllers\MessageController::class, 'store'])->name('message.send');
    Route::get('/show/', [App\Http\Controllers\MessageController::class, 'show'])->name('message.show');
    Route::get('/message/antigas', [App\Http\Controllers\MessageController::class, 'last_sms'])->name('message.antigas');
    Route::get('/message/novas', [App\Http\Controllers\MessageController::class, 'first_sms'])->name('message.novas');
    Route::get('/post/index/save', [App\Http\Controllers\PostController::class, 'toSave'])->name('post.index.save');
    Route::get('/post/comment/reaction', [App\Http\Controllers\PostController::class, 'comment_reac_final'])->name('post.index.comment.reaction');
    Route::get('/mostrar/{uuid_remetente}/{uuid_destino}', [App\Http\Controllers\MessageController::class, 'mostrar_sms'])->name('message.mostrar');
    Route::get('/pesquisar/destinatario', [App\Http\Controllers\MessageController::class, 'pesquisar_destinatario'])->name('people.send.message');
});
Route::get('/sair', [App\Http\Controllers\AuthController::class, 'logout'])->name('account.logout');

/* inicio get e post login*/
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('account.login.form');
Route::get('/login/redirect', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/requestlogin', [App\Http\Controllers\AuthController::class, 'login'])->name('account.login.enter');


/*end get e post login*/

/* registrar */
Route::get('/registrar', [App\Http\Controllers\AuthController::class, 'registrarUser'])->name('account.register.form');

Route::get('/buscar/pais', [App\Http\Controllers\PaisController::class, 'index'])->name('buscar.pais');
Route::post('/newAccount', [App\Http\Controllers\AuthController::class, 'joinAndSave'])->name('account.save');
Route::post('/dontReceived', [App\Http\Controllers\AuthController::class, 'didnotReceived'])->name('account.again.sendCode');

    Route::get('/Register',[App\Http\Controllers\AuthController::class, 'firstForm'])->name('first.form');

    Route::post('/InsertRegister',[App\Http\Controllers\AuthController::class, 'firstFormInsert'])->name('first.form.insert');
    Route::get('/notFound',[App\Http\Controllers\AuthController::class, 'NotFound'])->name('first.not.found');

Route::get('/email', [App\Http\Controllers\AuthController::class, 'testandoEmail'])->name('email.test');
Route::get('/recuperarSenha', [App\Http\Controllers\AuthController::class, 'recuperarSenha'])->name('account.code.form');
Route::get('/recuperarSenha/code', [App\Http\Controllers\AuthController::class, 'codigoRecebido'])->name('code.received.form');
Route::get('/recuperarSenha/code/saveNew', [App\Http\Controllers\AuthController::class, 'newCode'])->name('validate.newCode.form');

Route::post('/recuperarSenha/code/saveNew', [App\Http\Controllers\AuthController::class, 'updatePassword'])->name('account.newPasswordSave');


//posts
Route::get('/ten_comments', [App\Http\Controllers\PageController::class, 'ten_comments'])->name('ten_comments');
Route::get('/view', [App\Http\Controllers\PostController::class, 'view_post'])->name('post.view.save');
Route::get('/edit_option', [App\Http\Controllers\PostController::class, 'edit_option'])->name('edit_option');
Route::post('/edit_post', [App\Http\Controllers\PostController::class, 'edit_post'])->name('edit_post');
Route::get('/getvideo/', [App\Http\Controllers\PostController::class, 'get_video'])->name('post.video.get');
Route::get('/tassumirvideo/{id}', [App\Http\Controllers\PostController::class, 'tassumirvideos'])->name('post.tassumir.video');
Route::get('/getposts/', [App\Http\Controllers\PostController::class, 'index'])->name('post.get');
Route::get('/getposts/destaques/{limit}', [App\Http\Controllers\PostController::class, 'destaques'])->name('post.get.destaques');
//endposts

//
Route::get('/getfollow/', [App\Http\Controllers\PageController::class, 'index'])->name('following.get');
Route::get('/editpage/{id}', [App\Http\Controllers\PageController::class, 'show'])->name('page.edit.get');
Route::get('/couple_page/delete_page_view/{id}', [App\Http\Controllers\PageController::class, 'view_delete_couple_page'])->name('delete_couple.page_view');

//


//api
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/api/login', [App\Http\Controllers\AuthController::class, 'login_return'])->name('api.login.get');
});
//end-api

Route::get('/confirmarCodigo', [App\Http\Controllers\AuthController::class, 'codigoRecebidoRegisto'])->name('account.codeConfirmation.form');

Route::post('/verificarCodigo', [App\Http\Controllers\AuthController::class, 'verifyCodeSent'])->name('account.verifyCode.enter');

//Route::get('/verificarCodigo', [App\Http\Controllers\AuthController::class, 'verifyCodeSent'])->name('account.verifyCode.enter');

Route::post('/verificarCodigo/Again', [App\Http\Controllers\AuthController::class, 'verifyAgainCodeSent'])->name('account.verifyAgainCode.enter');


Route::post('/gerarNovamente', [App\Http\Controllers\AuthController::class, 'generateAgain'])->name('account.generateAgain.enter');

/* here */
Route::post('/sendTo',[App\Http\Controllers\AuthController::class, 'sendPhoneEmailRecover'])->name('account.sendToPhoneEmail');
Route::post('/codeVerification',[App\Http\Controllers\AuthController::class, 'verifyToRecoverPass'])->name('account.verifyToRecoverPass');
Route::post('/newPassword',[App\Http\Controllers\AuthController::class, 'updatePassword'])->name('account.newPasswordSave');
Route::post('/newPassword',[App\Http\Controllers\AuthController::class, 'updatePassword2'])->name('account.newPasswordSave2');
/* end here */
    Route::post('/newAccount', [App\Http\Controllers\AuthController::class, 'joinAndSave'])->name('account.save');
Route::get('/allNotifications', [App\Http\Controllers\AuthController::class, 'seeAllNotifications'])->name('account.all.notifications');
Route::get('/delete/page/{id}', [App\Http\Controllers\PaginaCasalController::class, 'delete_page'])->name('account.delete.page');
Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('account.home');
/*init termo view*/
    Route::get('index/termo_politica',[App\Http\Controllers\HelpSupport::class, 'index_termo'])->name('term.home');
    Route::get('termos',[App\Http\Controllers\HelpSupport::class, 'call_terms'])->name('termos');

    Route::get('privacidade',[App\Http\Controllers\HelpSupport::class, 'call_privacy'])->name('privacidade');
    Route::get('comerciais',[App\Http\Controllers\HelpSupport::class, 'call_term_service'])->name('comercio');
    Route::get('comunidade',[App\Http\Controllers\HelpSupport::class, 'comunidade'])->name('comunidade');
    Route::get('publicidade',[App\Http\Controllers\HelpSupport::class, 'publicidade'])->name('publicidade');
/*end termo view*/

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Tassumir') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/load.js') }}" defer></script>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="{{ asset('js/jquery/jquery-3.5.1/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uicons/css/uicons-regular-rounded.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uicons-straight/css/uicons-regular-straight.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checked.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width-width, initial-scale=1,0">
    <meta http-equiv="UA-X-Compatible" content="ie=edge">
</head>

<body class="container-main">
    <div class="body-pop-up content-full-scroll">
        <header class="header-main header-main-component clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><!--<i class="fas fa-link fa-24"></i>--><h1>tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden" style="margin-left:48px;">
                    <div class="input-search">
                        <label for="search-lg-home"><i class="fas fa-search fa-16 fa-search-main"></i></label>
                        <input type="search" name="" placeholder="O que está procurando?" class="input-text" id="search-lg-home-id">
                    </div>
                    <input type="checkbox" name="" class="invisible" id="search-lg-home">
                    <div class="container-search-home">
                        <div class="input-search">
                            <i class="fas fa-search fa-16 fa-search-main"></i>
                            <input type="search" name="table_search" placeholder="O que está procurando?" class="input-text" id="table_search">
                        </div>
                        <div class="search-id-container">
                          <div name="pessoa">
                        	</div>
                        	<div name="page">
                            </div>
                        </div>
                        <div class="change-look mb-5" name="ver_td" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">
                        </div>
                    </div>
                </li>
            </ul>
            <nav class="menu-header ">
                <li class="l-5 mobile-header-icon" style="z-index:2;" id="notification-header-icon-container">
                    <div class="hidden-click-any-container last-component-n clearfix-n " id="notification-header-icon">
                        <label for="more-option-notify" class="hidden-click-any-container fa-option-mobile-hide"><i class="hidden-click-any-container fi-rs-bell f-footer fa-24 fa-option notify-icon" size="7"></i>
                            <div class="number-notification circle invisible-component">
                                <span class="center"></span>
                            </div>
                        </label>
                        <a href="" class="hidden-click-any-container fa-option-mobile-lg-hide notify-icon">
                            <i class="hidden-click-any-container fi-rs-bell f-footer fi- fa-24 fa-option" size="7"></i>
                            <div class="number-notification invisible-component circle">
                                <span class="center"></span>
                            </div>
                        </a>
                        <input type="checkbox" name="" id="more-option-notify" class="hidden">
                        <ul class="noti-card-first clearfix br-10">
                            <li class="hidden-click-any-container mb-4" style="display: flex;justify-content: flex-start;align-content: flex-start;">
                                <span style="color:#efefef;">Actividades</span>
                            </li>                                          
                            <li class="hidden-click-any-container noti-flex mt-2">
                                <div class="hidden-click-any-container noti-div-subtitle">
                                    <h4 class="noti-subtitle">Antigas</h4>
                            <li class="hidden-click-any-container change-look noti-flex-info" id="not-3" name="not-3">
                                <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                                    <img class="hidden-click-any-container circle img-24 center invisible-component">
                                </div>                                       
                                <div class="hidden-click-any-container noti-div-name">
                                    <a href="" id="Notificacao|3" class="mudar_estado_not">
                                        <span class="hidden-click-any-container noti-span"></span>
                                   </a>
                                   <div class="hidden-click-any-container noti-hour ml-2">
                                        <a href=""><span class=""></span></a>
                                    </div>
                                </div>
                                <div class="not-new">
                                </div>
                            </li>
                            <li class="hidden-click-any-container change-look" style="display: flex;justify-content:center; align-items: center; width: 300px; padding:8px;">
                                <a href=""><span class="mt-2" style="font-size:13px;color: #fff;"> Ver todos </span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="user-tassumir clearfix l-5">
                    <a href="{{route('account.profile')}}">
                        <div class="l-5 user-account-container-img">
                            <img class="img-full invisible-component center" id="user-account-container-img-id">
                        </div>
                    </a>
                    <a href="" class="l-5"><h1 class="user-account"></h1></a>
                </li>
            </nav>
    </header>
    <input type="hidden" id="host" value="{{route('account.data')}}" name="">
    <div class="header-main-component" id="header-height-component"></div>
    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix">
                <li class="li-component-aside" id="route_feed"><i class="fas fa-rss fa-20 fa-icon-aside-left"></i><a href="{{route('account.home.feed')}}">Feed de Notícias</a></li>
                <li class="li-component-aside text-ellips invisible-component" id="route_account"><i class="far fa-user-circle fa-20 fa-icon-aside-left"></i><a class="text-ellips" href="{{route('account.profile')}}" id="complete_name_id"></a></li>
                <!--<li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Criar Relacionamento</a></li>
                <li class="li-component-aside"><i class="fas fa-book-open fa-20 fa-icon-aside-left"></i><a href="">Página de Casal</a></li>-->
                <li class="li-component-aside invisible-component" id="route_page"><i class="fas fa-paperclip fa-20 fa-icon-aside-left"></i><a href="">Minhas Páginas</a></li>
                <li class="li-component-aside" id="route_save"><i class="far fa-bookmark fa-20 fa-icon-aside-left"></i><a href="">Guardados</a></li>
                <li class="li-component-aside invisible-component" id="route_couples_i_follow"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Casais que eu sigo</a></li>
                <li class="li-component-aside" id="Earn_money"><i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i><a href="">Ganhar Dinheiro</a></li>
                <li class="li-component-aside" id="route_Videos"><i class="far fa-play-circle fa-20 fa-icon-aside-left"></i><a href="">Tassumir Vídeos</a></li>
            </ul>
        </nav>
        <nav class="last-nav">
            <ul>
                <li class="li-component-aside" id="definitions"><i class="fas fa-cog fa-20 fa-icon-aside-left"></i><a href="">Definições</a></li>
                <li class="li-component-aside" id="help"><i class="far fa-question-circle fa-20 fa-icon-aside-left"></i><a href="">Ajuda e Suporte</a></li>
                <!--<li class="li-component-aside"><i class="fas fa-sign-out-alt fa-20 fa-icon-aside-left"></i><a href="">Sair</a></li>-->
            </ul>
        </nav>
    </aside>
    @if($page_current != 'working' && $page_current != 'delete_page')
    <aside class="aside aside-right" style="z-index:1;">
        <header>
            <h1>Registo de Relacionamento</h1>
        </header>
        <nav>
            <header>
                <h1>Páginas que eu sigo</h1>
            </header>
        </nav>
        <nav class="last-nav">
            <header>
                <h1>Sugestões para Você</h1>
            </header>
            <?php $key = 0; while($key < 40){ ?>
                <li  id="li-component-sugest-{{$key}}" <?php if ($key < 2) {echo "class='li-component-aside-right clearfix'";} else {echo  "class='li-component-aside-right clearfix invisible-component'";}?>>
                    <div class="page-cover circle l-5">
                        <a href="" id="a-suggest-id-aside-{{$key}}">
                            <img class="img-full circle invisible-component" id="page-cover-suggest-id-{{$key}}">
                        </a>
                    </div>
                    <a id="a-suggest-id-aside-name-{{$key}}"><h1 class="l-5 name-page text-ellips" id="page-name-suggest-id-{{$key}}"></h1></a>
                    <h2 class="l-5 text-ellips" id="page-followers-suggest-id-{{$key}}">seguidores</h2>
                    <a href="" class="seguir seguir-{{$key}}" id="follwing-{{$key}}">seguir</a>
                </li>
            <?php $key++; } ?>
            <footer class="clearfix invisible-component">
                <a href="" class="r-5">Ver Todas</a>
            </footer>
        </nav>
    </aside>
    @endif
    <main class="main-container">
        @yield('content');
    </main>
    <div class="menu-footer">

    </div>
    <footer class="menu-footer menu-footer-main">
        <ul>
            <a href="{{route('account.home.feed')}}">
                <li>
                    <!--<i class="fi-rr-home fa-20 f-footer"></i>-->
                    <img src="{{asset('/css/uicons/home.png')}}" class="center img-26">
                </li>
            </a>
            <a href="{{route('account.all.notifications')}}">
                <li class="li-footer-menu">
                    <!--<i class="fi-rs-bell fa-20 f-footer"></i>-->
                    <img src="{{asset('/css/uicons/notification.png')}}" class="center img-26">
                    <!--<h1 class="descript">Notificações</h1>-->
                    <div class="number-notification circle invisible-component">
                        <span class="center"></span>
                    </div>
                </li>
            </a>
            <a href="{{route('post.tassumir.video', 'ma')}}">
                <li>
                    <!--<i class="fi-rr-play fa-20 f-footer"></i>-->
                    <img src="{{asset('/css/uicons/add.png')}}" class="center img-32">
                </li>
            </a>
            <a href="{{route('post.tassumir.video', 'ma')}}">
                <li>
                    <!--<i class="fi-rr-play fa-20 f-footer"></i>-->
                    <img src="{{asset('/css/uicons/tv_show.png')}}" class="center img-26">
                </li>
            </a>
            <a href="{{route('allSearch1.page')}}">
                <li class="li-footer-menu">
                    <!--<i class="fi-rr-search fa-20 f-footer"></i>-->
                    <img src="{{asset('/css/uicons/search.png')}}" class="center img-26">
                </li>
            </a>
        </ul>
    </footer>
    </div>
</body>
<input type="checkbox" name="" id="delete-page-target" class="invisible">
<div class="pop-up" id="delete-page-container">
    <div class="pop-up-component full-component-mobile center" id="pop-up-component-create-post" style="">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Confirmação</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
       <!-- <form enctype="multipart/form-data">-->
            <div class="header-height"></div>
            <div class="clearfix content-details-post" style="margin-top: 15px; margin-bottom: 10px;">
                <h1 class="alert-accept" style="text-align: center;">Tem certeza que deseja eliminar a sua página?</h1>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin: 0px auto 10px;">
                <div class="" id="cover-done" style=" background-color: red;">
                  <a href="{{route('delete_couple.page', 0)}}" class="mr-2">
                    <button type="button" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Eliminar</button>
                 </a>
                </div>
            </div>
            <!--<div class="clearfix l-5" id="" style="width: 98%; margin: 0px auto 10px;">
                <div class="btn-alert" id="" style=" background-color: #3490dc;">
                    <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Cancelar</button>
                </div>
            </div>-->
        <!-- </form> -->
    </div>
</div>
@if($page_current == "page")
<?php if (true): ?>
<form action="{{ route('post_couple.page') }}" method="POST" enctype="multipart/form-data">
@csrf
@if(sizeof($page_content)>0)
<input type="hidden" name="page_u" value="{{ $page_content[0]->uuid }}">
@endif
<input type="checkbox" name="" id="add-post-target" class="invisible">
<div class="pop-up" id="add-post-container">
    <div class="pop-up-component full-component-mobile center" id="pop-up-component-create-post" style="">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Criar Publicação</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
       <!-- <form enctype="multipart/form-data">-->
            <div class="header-height"></div>
            <div class="clearfix content-details-post" style="margin-top: 15px; margin-bottom: 10px;">
                <div class="first-component clearfix l-5">
                </div>
                <div class="textarea-container l-5" style="width:100%;">
                    <textarea name="message" placeholder="O que deseja que as pessoas saibam?"></textarea>
                </div>
                <div class="l-5" style="width: 100%;">
                    <div class="preview-image" id="preview-image-id">

                    </div>
                </div>
                <script type="text/javascript">
                    document.addEventListener('DOMContentLoaded', function(){
                        let input = document.getElementById('testeVid');
                        input.addEventListener('change', function () {
                            const reader = new FileReader();
                            reader.onload = function () {
                                const img = new Image();
                                img.src = reader.result;
                                img.classList.add('img-full');
                                document.getElementById('preview-image-id').append(img);
                            }
                            document.getElementById('preview-image-id').style.display = 'block';
                            reader.readAsDataURL(input.files[0]);
                        });
                        $('.add-file-element').click(function(){
                            input.click();
                        });
                    });
                </script>
                <nav class="add-file l-5 clearfix" style="margin-bottom: 0;">
                    <ul style="width: 160px;" class="r-5">
                        <!--<label for="target-profile-cover-post">-->
                            <li class="circle add-file-element" id="target-profile-cover-post-id">
                                <i class="far fa-images fa-20 center"></i>
                            </li>
                        <!--</label>-->
                        <!--<label for="target-profile-cover-post">-->
                            <li class="circle add-file-element">
                                <i class="far fa-play-circle fa-20 center"></i>
                            </li>
                        <!--</label>-->
                    </ul>
                </nav>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin: 0px auto 10px;">
                <div class="" id="cover-done">
                    <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px; width: 100%;">Publicar</button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>
<input type="checkbox" name="" id="target-profile-cover-post" class="invisible">
<div class="pop-up" id="cover-profile-post">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1 class="">Adicionar Imagem</h1>
            <h1 class="invisible">Adicionar Video</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover-post">
                    <div class="cancel-box div-img" id="cancel-box-add-file-post">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <input class="file" type="file" name="imgOrVideo" id="testeVid" style="width: 250px; margin-left: 10px; color: #fff;" onchange="checkDuration(this)" >
                <input type="hidden" name="longVideo" id="putInfo" value="">
                <video style="display: none;" id="vidAnalyzer">
                  <source src="" type="">
                </video>
            </div>
        </div>
        <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
            <label for="target-profile-cover-post" class="label-full">
                <div class="cover-done checker" id="cover-done-post">
                    <h2 id="concluir_file" style="padding: 10px; font-size: 14px; width: 100%;">Concluido</h2>
                </div>
            </label>
        </div>
    </div>
</div>
</form>
<input type="checkbox" name="" id="target-profile-cover-page" class="invisible">
<div class="pop-up" id="cover-profile-page">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Adicionar Foto da Página</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <form action="{{ route('account.profile.pic') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <?php if (sizeof($page_content)): ?>
                        <input type="hidden" name="uuidPage" value="{{$page_content[0]->uuid}}">
                    <?php endif ?>
                    <input class="file" type="file" name="pagePicture" style="width: 250px; margin-left: 10px; color: #fff;" required>
                    <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                        <div class="cover-done" id="cover-done">
                            <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px; width: 100%;">Concluido</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
@endif
<?php if (true): ?>
<input type="checkbox" name="" id="target-profile-cover" class="invisible">
<div class="pop-up" id="cover-profile">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Adicionar Foto de Perfil</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <form action="{{ route('account.profile.pic') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="file" type="file" name="profilePicture" style="width: 250px; margin-left: 10px; color: #fff;" required>
                    <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                        <div class="cover-done" id="cover-done">
                            <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 8px; font-size: 14px; width: 100%;">Concluido</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="target-proof" class="invisible">
<div class="pop-up" id="cover-proof">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 280px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1 class="">Enviar Comprovativo</h1>
            <div class="container-pop-up-component-header">
                <label for="target-proof">
                    <div class="cancel-box div-img" id="cancel-box-add-file-post">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <p class="alert-proof">O comprovativo pode ser uma imagem de depósito ou um arquivo pdf. Aguardará a confirmação. Após verifivação, será enviada uma NOTIFICAÇÃO</p>
            <form action="{{ route('account.profile.pic') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <input class="file" type="file" name="imgOrVideo" id="imgOrVideo" style="width: 250px; margin-left: 10px; color: #fff;">
                  <input type="hidden" name="Comprovativo" id="Comprovativo">
                  <input type="hidden" name="notificacao" id="notificacao">

                <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                    <label for="target-profile-cover-post" class="label-full">
                        <div class="cover-done" id="">
                          <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px; width: 100%;">Concluido</button>
                          <button type="button" name="button">aaaaa</button>
                        </div>
                    </label>
                </div>
            </form>
    </div>
</div>
</div>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="target-invited-relationship" class="invisible">
<div class="pop-up" id="invited-relationship">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 320px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Pedido de Relacionamento</h1>
            <div class="container-pop-up-component-header">
                <label for="target-invited-relationship">
                    <div class="cancel-box div-img" id="target-invited-relationship-id">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px; overflow-y: auto;">
            <div class="">
                <form enctype="multipart/form-data" action="{{ route('Pedido_relac') }}" method="POST">
                  @csrf
                    <label for="relationship-type-target">
                        <div class="relationship-type">
                            <i class="fas fa-sliders-h"></i>
                            <h1 id="relationship-selected-type">Tipo de Relacionamento</h1>
                        </div>
                    </label>
                    <input type="checkbox" name="" id="relationship-type-target" class="invisible">
                    <div class="relationship-type-all" id="relationship-type-container" name="relationship-type-container">
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $(document).click(function(e){
                                //console.log(e.target.className);
                                if(e.target.className == 'relationship-type-component'){
                                    $('#relationship-selected-type').text(e.target.id.split('-')[0]);
                                    $('#relationship-type-selected').val(e.target.id.split('-')[1]);
                                }
                            });
                        });
                    </script>
                    </div>

                    <div class="justify-content-start marriage-proposal" style="margin-bottom: 10px;">
                        <span class="text-white">Qual o nome da Página de casal gostaria de usar? (Pode ser editado...).</span>
                    </div>
                    <div class="form-group marriage-proposal">
                        <input type="text" class="input-text-default input-full" name="name_page" type="text" placeholder="Nome da Página do Casal">
                    </div>
                    <input type="hidden" name="conta_pedida" value="" id="conta_pedida">
                    <input type="hidden" name="tipo_relac"  id="relationship-type-selected">
                    <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                        <div class="cover-done" id="cover-done-marriage">
                          <button type="submit" name="button" style="padding: 10px; font-size: 14px; width: 100%" >
                            Concluido
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="options-invited-pop-up" class="invisible">
<div class="pop-up" id="invited-relationship-response">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 320px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Pedido de Relacionamento</h1>
            <div class="container-pop-up-component-header">
                <label for="target-invited-relationship">
                    <div class="cancel-box div-img" id="target-invited-relationship-id">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px; overflow-y: auto;">
            <div>
                <p class="alert-accept" id="textr">  </p>
            </div>
            <div>
                <label class="terms-use-alert" for="">Ler termos e responsabilidades sobre Noivado</label>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                <div class="cover-done" id="cover-done-marriage">
                  <form class="needs-validation" action="{{ route('conf_PR') }}" method="POST" novalidate>
                  @csrf

                    <button type="submit" name="button" style="padding: 10px; font-size: 14px;" >
                        Sim, Aceito
                    </button>
                    <input type="hidden" name="accept_relacd" id="accept_relacd">
                    <input type="hidden" name="id_notification" id="id_notification">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="options-edit-pop-up" class="invisible">
<div class="pop-up" id="edit-pop-up">
    <div class="pop-up-component full-component-mobile center" style="position: absolute;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Editar Publicação</h1>
            <div class="container-pop-up-component-header">
                <label for="target-invited-relationship">
                    <div class="cancel-box div-img" id="target-invited-relationship-id">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div class="clearfix content-details-post" style="margin-top: 5px; margin-bottom: 5px;">
                <div class="first-component clearfix l-5">
                    <div class="page-cover circle l-5" name="foto_edit">
                    </div>
                    <div class="page-identify l-5 clearfix">
                        <h1 class="text-ellips" id="name_page_edit_post" name="name_page_edit_post"></h1>
                    </div>
                </div>
                <form action="{{ route('edit_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="pass_post_uuid" id="pass_post_uuid" >
                <div class="textarea-container l-5" style="width:100%;">
                    <textarea name="message" id="message"></textarea>
                </div>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin: 0px auto 10px;">
                <div class="" id="cover-done">
                    <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Editar</button>
                </div>
                </form>
            </div>
    </div>
</div>
<div class="pop-up" id="cover-page-post">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1 class="">Adicionar Imagem</h1>
            <h1 class="invisible">Adicionar Video</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover-post">
                    <div class="cancel-box div-img" id="cancel-box-add-file-post">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <input class="file" type="file" name="imgOrVideo" id="testeVid" style="width: 250px; margin-left: 10px; color: #fff;">
                <video style="display: none;" id="vidAnalyzer">
                  <source src="" type="">
                </video>
            </div>
        </div>
        <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
            <label for="target-profile-cover-post" class="label-full">
                <div class="cover-done checker" id="cover-done-post">
                    <h2 id="concluir_file" style="padding: 10px; font-size: 14px; width: 100%;">Concluido</h2>
                </div>
            </label>
        </div>
    </div>
</div>
<?php endif ?>
<script type="text/javascript">
    $(document).click(function (e) {
         let className = e.target.className;
         if (className.indexOf('comment-user-container-react') > 0) {e.preventDefault();}
    });
    $(document).ready(function () {
        //alert($('main').scrollTop());
        $(window).scroll(function() {
           if($(window).scrollTop() + $(window).height() == $(document).height()) {
               //alert("bottom!");
           }
           //alert("bot");
        });
        $('.like-a').click(function (e) {
          /*e.preventDefault();
          let id = e.target.id.split('|');
          if(id[0] == "on"){
            gostar(id[1]);
            let new_id = "off|" + id[1] + "|i";
            document.getElementById("on|" + id[1] + "|i").setAttribute('id', new_id);
            document.getElementById("off|" + id[1] + "|i").classList.remove('fas');
            document.getElementById("off|" + id[1] + "|i").classList.remove('liked');
            document.getElementById("off|" + id[1] + "|i").classList.add('far');
          } else if(id[0] == "off") {
            gostar(id[1]);
            let new_id = "on|" + id[1] + "|i";
            document.getElementById("off|" + id[1] + "|i").setAttribute('id', new_id);
            document.getElementById("on|" + id[1] + "|i").classList.add('fas');
            document.getElementById("on|" + id[1] + "|i").classList.add('liked');
            document.getElementById("on|" + id[1] + "|i").classList.remove('far');
          }*/
      });

      $('.comment-like-a').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('|');
          if(id[0] == "on"){
            comment_reac(id[1]);
            let new_id = "off|" + id[1] + "|i";
            document.getElementById("on|" + id[1] + "|i").setAttribute('id', new_id);
            document.getElementById("off|" + id[1] + "|i").classList.remove('fas');
            document.getElementById("off|" + id[1] + "|i").classList.remove('liked');
            document.getElementById("off|" + id[1] + "|i").classList.add('far');
          } else if(id[0] == "off") {
            comment_reac(id[1]);
            let new_id = "on|" + id[1] + "|i";
            document.getElementById("off|" + id[1] + "|i").setAttribute('id', new_id);
            document.getElementById("on|" + id[1] + "|i").classList.add('fas');
            document.getElementById("on|" + id[1] + "|i").classList.add('liked');
            document.getElementById("on|" + id[1] + "|i").classList.remove('far');
          }
      });


      function tipos(){

        $.ajax({
          url: "{{ route('tipos')}}",
          type: 'get',
          dataType: 'json',
          success:function(response){
            var tipo = '';
            var a = 0;
            //console.log(response);
            $('.relationship-type-all').empty();
            $.each(response, function(key, value){
              if(a == 0){
              tipo += '<div class="relationship-type-all" id="relationship-type-container">'
            }
              tipo += ' <label for="relationship-type-target">'
              tipo +=        '<h2 id="' + value.tipo_relacionamento + '-' + value.tipo_relacionamento_id + '" class="relationship-type-component">' + value.tipo_relacionamento + '</h2>'
              tipo +=   ' </label>'
              tipo +=  '</div>'

             a++;
            })
            $('div[name=relationship-type-container]').append(tipo);
            }
          });

      }

      function add_view(data) {
          $.ajax({
              url: "{{route('post.view.save')}}",
              type: 'get',
              data: {'data': data},
              dataType: 'json',
              success: function(response){
                  //console.log(response);
              }
          });
      }

      /*function home_index(){
        $.ajax({
          url: "{{route('account.home.feed')}}",
          type: 'get',
          dataType: 'json',
          data: { init: $('#last_post').val(), checked: true, dest_init: $('#last_post_dest').val() },
          success:function(response){
                //console.log('last_post ' + $('#last_post').val() + ' last_post_dest ' + $('#last_post_dest').val());
                //console.log('yes');
                //console.log(response);
            }
          });
      }*/

      function tela_confirm(id1, id2){

        $.ajax({
          url: "{{ route('tconfirm')}}",
          type: 'get',
          data: {'id1': id1},
          dataType: 'json',
          success:function(response){
            //console.log(response);
            $("#textr").text(response);
            $("#accept_relacd").val(id1);
            $("#id_notification").val(id2);
            }
          });

      }

      $('.seguir-a').click(function (e) {
          e.preventDefault();
          /*let id = e.target.id;
          let id1= id.split('-')[1];
          let id2= id.split('-')[2];*/

            //seguir(id1, id2);

      });

      $('.send_proof').click(function (e) {
          let id = e.target.id;
          let id1= id.split('|')[0];
          let id2= id.split('|')[1];


          $("#Comprovativo").val(id1);
          $("#notificacao").val(id2);


      });



      $('.accept_relationship').click(function (e) {
          let id = e.target.id;
          let id1= id.split('|')[0];
          let id2= id.split('|')[1];
          let id3= id.split('|')[2];
          //alert(id3);
          $.ajax({
            url: "{{ route('verify_not')}}",
            type: 'get',
            data: {'id': id1},
            dataType: 'json',
            success:function(response){
              //alert(response.length);
              //console.log(response);
              if(response.length>0){
                tela_confirm(id1, id2);
              }else {
              //  alert(id3);
                  var route1 = "{{route('account1.profile', 1) }}"
                  url_array1 = route1.split('/');
                  url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + id3;
                  window.location.href =url_link1;
              }
              }
            });


      });

      $('.mudar_estado_not').click(function (e) {
          let id = e.currentTarget.id;
          let id1= id.split('|')[1];
          $.ajax({
            url: "{{ route('updatenot')}}",
            type: 'get',
            data: {'id1': id1},
            dataType: 'json',
            success:function(response){
              //console.log(response);
              }
            });
      });

      $('.reject_relationship').click(function (e) {

          let id = e.target.id;
          let id1= id.split('|')[1];
          let id2= id.split('|')[2];
          $.ajax({
            url: "{{ route('reject_relationship')}}",
            type: 'get',
            data: {'id1': id1, 'id2': id2},
            dataType: 'json',
            success:function(response){
              //console.log(response);
        //     $('li[name='id']').empty();
            //  $('div[name='+id2+']').empty();
              $('#not-'+id2).remove();
            //  $('#not-'+id2).hide();

              }
            });
      });

      $('.comentar-aa').click(function (e) {
          e.preventDefault();
          let id = e.target.id;
          let coment = $('#comentario-' + id).val();
          $("#comentario-" + id).val('');
          if(coment != ''){
         comentar(id, coment);
         $.ajax({
           url: "{{ route('pegar_ultimocomment')}}",
           type: 'get',
           data: {'id': id},
           dataType: 'json',
           success:function(response){
             //console.log(response);
             let src = '{{asset("storage/img/users/") }}';
             let src1 = '{{ asset("storage/img/page/") }}';
             var route10 = "{{route('couple.page1', 1) }}"
             url_array10 = route10.split('/');
             url_link10 = url_array10[0] + "/" + url_array10[1] + "/" + url_array10[2] + "/"+ url_array10[3] +  "/" + response.uuid;
             var route1 = "{{route('account1.profile', 1) }}"
             url_array1 = route1.split('/');
             url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + response.uuid;
             var nome = '';
             nome +='<div class="comment-users" id="comment-users-'+response.post_id+'">'
             nome +='<div class="comment-user-container" >'
             nome +='<div class="user-identify-comment">'
             if( response.foto_ver ==1 ){
               nome +='<a href='+url_link1+'>'
               if( !(response.foto_conta == null) ){
             nome +='<div class="profille-img">'
             nome +='  <img  class="img-full circle" src=' + src + '/' + response.foto_conta + '>'
             nome +='</div>'
                }else{
                  nome +='<div class="profille-img">'
                  nome +='<i class="fas fa-user center" style="font-size: 15px; color: #ccc;"></i>'
                  nome +='</div>'
                }
                nome +='</a>'
                nome +='<div class="comment-user-comment">'
                nome +='<a href='+url_link1+'>'
              } else{
                nome +='<a href='+url_link10+'>'
                if( !(response.foto_conta == null) ){
              nome +='<div class="profille-img">'
              nome +='  <img  class="img-full circle" src=' + src1 + '/' + response.foto_conta + '>'
              nome +='</div>'
                 }else{
                   nome +='<div class="profille-img">'
                   nome +='<img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}">'
                   nome +='</div>'
                 }
                 nome +='</a>'
                 nome +='<div class="comment-user-comment">'
                 nome +='<a href='+url_link10+'>'
               }

             nome +='<h1 class="user">'+response.nome_comment+'</h1>'
             nome +='</a>'
             nome +='<p class="">'+response.comment+'</p>'
             nome +='</div></div></div>'
             nome +=' <div class="comment-user-container comment-user-container-react">'
             nome +='<a href="" class="comment-like-a" id="on|'+response.comment_id+'">'
             if(response.comment_S_N > 0){
              nome +='<i class="fas fa-heart fa-12 liked" id="on|'+response.comment_id+'|i"></i>'
            }else {
              nome +='<i class="fas fa-heart fa-12 unliked" id="off|'+response.comment_id+'|i"></i>'
            }
             nome +='</div>'
             nome +='</div>'
             /*nome +=''
'*/

             	$('div[name=div_pai_commnet]').prepend(nome);


             }
           });


        }
      });

      $('.edit-option').click(function(evt){
        let id = evt.target.id;
        let id1= id.split('|')[1];

        $.ajax({
          url: "{{ route('edit_option')}}",
          type: 'get',
          data: {'id1': id1},
          dataType: 'json',
          success:function(response){
            let src1 = '{{ asset("storage/img/page/") }}';
            var nome = '';
            if( !(response.foto_page == null) ){
             nome +='  <img  class="img-full circle" src=' + src1 + '/' + response.foto_page + '>'
             }else{
               nome +='<img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}">'
             }

            //console.log(response);
            $('div[name=foto_edit]').append(nome);
            $("#name_page_edit_post").text(response.nome_pag);
           $("#message").val(response.post);
          $("#pass_post_uuid").val(id1);
            }
          });


            evt.preventDefault();
            $('#edit-pop-up').css({
                zIndex: 1000,
                opacity : 1
            });
      });
      $('.video-post-video').click(function(e){
        let id = e.target.id;
        //let state_video = document.getElementById(id).play();
        console.log($('.video-post-video'));
        if (document.getElementById(id).paused) {
            document.getElementById(id).play();
            document.getElementById('play_button_' + id.split('_')[1]).classList.add('invisible');
        } else {
            document.getElementById('play_button_' + id.split('_')[1]).classList.remove('invisible');
            document.getElementById(id).pause();
        }
        $('#current-video-id').val('video_' + id);
      });
      $('#edit-page-cover-profile').click(function(evt){
            evt.preventDefault();
            $('#cover-page-post').css({
                zIndex: 1000,
                opacity : 1
            });
      });
      $('.comentar-a').click(function (e) {
          
      });
      $('.accept').click(function(e) {
          e.preventDefault();
      });
      $('.savepost').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('-');
          guardar(id[1]);

      });
      $('.delete_post').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('-');
          delete_post(id[1]);

      });
      $('.ocultar_post').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('-');
          ocultar_post(id[1]);

      });

      $('.relationship-type-component').click(function(e){
            alert(e.target.id.split('-')[3]);
            $('#relationship-type-selected').val(e.target.id.split('-')[3]);
      });
      $('#genre-id').val($("input[name='genre']:checked").val());
      $('.genre-class').click(function(){
          $('#genre-id').val($("input[name='genre']:checked").val());
      });
        $('.cancel-box').click(function(){
            $('.pop-up').css({
                opacity: 0,
                zIndex: -1
            });
        });
        $('.add-edit-profile').click(function(){
            $('#cover-profile').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('.add-post').click(function(){
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('.add-file-element').click(function(){
            /*$('#cover-profile-post').css({
                opacity: 1,
                zIndex: 1001
            });*/
        });
        $('#cancel-box-add-file-post').click(function(){
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('#cover-done-post').click(function(){
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('#target-invited-relationship-id').click(function(){
            $('#invited-relationship').css({});
        });

        $('#concluir_file').click(function() {
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
        });
        $('.follwing-btn-pop-up').click(function(){
          tipos();
            $('#invited-relationship').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('.comment-send-post').click(function(e){
            e.preventDefault();
            let id = e.target.id;
            let id_final = id.split('-')[1];
            $('#comment-send-' + id_final).css({
                display : 'block',
            });
        });

        $('.checker').click(function(e) {

          var video = $('#testeVid').val();
          ////console.log(video.duration);

        });


        $('.seguir').click(function(e){
            e.preventDefault();
            var valor_pagina_id = e.target.id;
            var valor_idconta = $('#conta_id').val();
            if (($('.nao_sigo').eq(2).attr("id")) == null) {
                if ($('#id_last_suggest').val() != 0) {
                    var id_last_page = $('#id_last_suggest').val();
                }else{
                    var id_last_page = 0;
                }
            }else{
               var id_last_page = $('.nao_sigo').eq(2).attr("id").split('-')[3];
            }

             $.ajax({
                url: "{{route('seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': valor_idconta, 'seguida': valor_pagina_id, 'last_page': id_last_page},
                dataType: 'json',
                success: function(response){
                    $('#li-component-sugest-' + valor_pagina_id).remove();
                    $('#li-component-suggest-' + valor_pagina_id).remove();
                    $('.seguir-' + valor_pagina_id).hide();
                    if (response.page != 'Vazio') {
                  $.each(response.page, function(key, value){
                    $('#id_last_suggest').val(value.page_id);
                    if (value.foto == null) {
                        let src = "{{asset('storage/img/page/unnamed.jpg')}}";
                  $('#pagenaoseguida').append("<li class='li-component-aside-right clearfix sigo' id='seguida-"+value.page_id+"'><div class='page-cover circle l-5'><img class='img-full circle' src="+src+"></div><h1 class='l-5 name-page text-ellips'>"+value.nome+"</h1><h2 class='l-5 text-ellips'>"+response.seguidores+" seguidores</h2><a href='' class='nao_seguir' onclick='seguir(event)' id=a-"+value.page_id+">seguir</a><input type='hidden' id='npage_id' value="+value.page_id+" name=''></li>");
                    }else{
                        let src = "{{asset('storage/img/page/')}}" + "/" + value.foto;
                        $('#pagenaoseguida').append("<li class='li-component-aside-right clearfix sigo' id='seguida-"+value.page_id+"'><div class='page-cover circle l-5'><img class='img-full circle' src="+src+"></div><h1 class='l-5 name-page text-ellips'>"+value.nome+"</h1><h2 class='l-5 text-ellips'>"+response.seguidores+" seguidores</h2><a href='' class='nao_seguir' onclick='seguir(event)' id=a-"+value.page_id+">seguir</a><input type='hidden' id='npage_id' value="+value.page_id+" name=''></li>");
                    }
                    });
                }
                }
              });
        })

        $('.nao_seguir').click(function(e){
            e.preventDefault();
            var valor_seguida = e.target.id.split('-')[1];
             var valor_seguindo = $('#seguindo').val()
             if (($('.sigo').eq(2).attr("id")) == null) {
                if ($('#id_last_segida').val() != 0) {
                    var id_last_page = $('#id_last_segida').val();
                }else{
                    var id_last_page = 0;
                }
            }else{
               var id_last_page = $('.sigo').eq(2).attr("id").split('-')[1];
            }
             var npage_id = $('#npage_id').val();
             $('#seguida-' + valor_seguida).remove();
             $.ajax({
                url: "{{route('nao.seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': valor_seguindo, 'seguida': valor_seguida, 'last_page': id_last_page},
                dataType: 'json',
                success: function(response){
                  $('.seguir-' + npage_id).show();
                   if (response.page != 'Vazio') {
                  $.each(response.page, function(key, value){
                    $('#id_last_segida').val(value.page_id);
                    if (value.foto == null) {
                        let src = "{{asset('storage/img/page/unnamed.jpg')}}";
                  $('#pageseguida').append("<li class='li-component-aside-right clearfix sigo' id='seguida-"+value.page_id+"'><div class='page-cover circle l-5'><img class='img-full circle' src="+src+"></div><h1 class='l-5 name-page text-ellips'>"+value.nome+"</h1><h2 class='l-5 text-ellips'>"+response.seguidores+" seguidores</h2><a href='' class='nao_seguir' onclick='naoseguir(event)' id=a-"+value.page_id+">não seguir</a><input type='hidden' id='npage_id' value="+value.page_id+" name=''></li>");
                    }else{
                        let src = "{{asset('storage/img/page/')}}" + "/" + value.foto;
                        $('#pageseguida').append("<li class='li-component-aside-right clearfix sigo' id='seguida-"+value.page_id+"'><div class='page-cover circle l-5'><img class='img-full circle' src="+src+"></div><h1 class='l-5 name-page text-ellips'>"+value.nome+"</h1><h2 class='l-5 text-ellips'>"+response.seguidores+" seguidores</h2><a href='' class='nao_seguir' onclick='naoseguir(event)' id=a-"+value.page_id+">não seguir</a><input type='hidden' id='npage_id' value="+value.page_id+" name=''></li>");
                    }
                    });
                }
                }
              });

        });


        /*function getVideo(post, id){
            let storage_video, video, type_file, source;
            $.ajax({
                url: "{{route('post.video.get')}}",
                type: 'get',
                data: {'data': post},
                dataType: 'json',
                success: function(response){
                    //////console.log('Respondeu...');
                    //////console.log(response);
                    video = response.video;
                    type_file = response.type_file;
                    storage_video = "{{asset('storage/video/page/') . '/'}}" + video;
                    ////console.log(storage_video);
                    source = document.createElement('source');
                    source.setAttribute('src', storage_video);
                    source.setAttribute('type', type_file);
                    source.setAttribute('autoload', 'true');
                    document.getElementById('video_' + id).setAttribute('src', storage_video);
                    document.getElementById('video_' + id).setAttribute('autoload', 'true');
                    document.getElementById('video_' + id).append(source);
                    $('#has-video-' + id).val('ok');
                }
            });
        }*/


        $('.play_button').click(function(e){
            let id = e.target.id.split('_')[2];
        });
        $('#search-lg-home-id').on('keyup',function(){
            let variavel= $('#search-lg-home-id').val();
            $('#table_search').val(variavel);
            let v= 1;
            if (variavel!='') {
              searchP(variavel, v);
            }else {
              $('div[name=pessoa]').empty();
              $('div[name=page]').empty();
              $('div[name=ver_td]').empty();

            }
          });
        $('#table_search').on('keyup',function(){
            let variavel= $('#table_search').val();
            $('#search-lg-home-id').val(variavel);
            let v= 1;
            if (variavel!='') {
              searchP(variavel, v);
            }else {
              $('div[name=pessoa]').empty();
              $('div[name=page]').empty();
              $('div[name=ver_td]').empty();

            }
        })

function searchP(variavel, v){
  var s1=0;
  var s2=1;
  var s3;
$.ajax({
  url: "{{ route('pessoa.pesquisa')}}",
  type: 'get',
  data: {'dados': variavel, 'v':v},
  dataType: 'json',
  success:function(response){
    var nome = '';
    var contador = 1;
    ////console.log(response.valor);
    s1 =response.valor.length;
      $.each(response.valor, function(key, value){
        let src = '{{asset("storage/img/users/")}}';
        if (value.estado_conta_id == 1) {
          if (contador == 1) {
            nome += '<li class="search-title">'
            nome += '<span style="color:#fff;" class="mt-2">Pessoas</span>'
            nome += '<ul class="card-flex">'
            nome += '</li>'

          }
          nome += '<li class="change-look search-info">'
          if (value.foto != null) {
            nome += '<div class="page-cover circle "><img class=" circle img-40" src= ' + src + '/' + value.foto + '></div>'
          }else {
            nome += '<div class=" page-cover circle "><i class="fas fa-user center" style="font-size: 15px; color: #ccc;"></i></div>'
          }
          nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
          var route1 = "{{route('account1.profile', 1) }}"
          url_array1 = route1.split('/');
          url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.uuid;
          nome += '<a href='+url_link1+' <span class="profile-name-1">'+value.nome+' '+value.apelido+'</span>'
          nome += '<a href='+url_link1+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
          nome += '</div></div></li><div class="couple-separator"></div>'
          if (contador == response.valor.length) {
            nome += '</ul>'
          }

            $('div[name=pessoa]').empty();
            $('div[name=pessoa]').append(nome);
            contador++;
          }
        })
        let route_temp = "{{route('allSearch.page', 0)}}";
        let route_temp1 = route_temp.split('/');
        let route = route_temp1[0] + "/" + route_temp1[1] + "/" + route_temp1[2] + "/"+ route_temp1[3] + "/"+ variavel;
        var vertd = '<a href='+route+'><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>';
        $('div[name=ver_td]').empty();
        $('div[name=ver_td]').append(vertd);
    }
});


$.ajax({
  url: "{{ route('pagina.pesquisa')}}",
  type: 'get',
  data: {'dados': variavel , 'v':v},
  dataType: 'json',
  success:function(response){
    let src1 = '{{ asset("storage/img/page/") }}';
    var nome = '';
    var contador = 1;
    ////console.log(response.valor);
    s2 =response.valor.length;
      $.each(response.valor, function(key, value){
        if (value.estado_pagina_id==1) {

          if (contador == 1) {
            nome += '<li class="change-look search-info">'
            nome += '<span style="color:#fff;" class="mt-2">Páginas</span>'
            nome += '<ul class="card-flex">'
            nome += '</li>'
          }
          nome += '<li class="change-look search-info">'
          if (value.foto != null) {
            nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src=' + src1 + '/' + value.foto + '></div>'
          }else {
            nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>'
          }
          nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
          var route10 = "{{route('couple.page1', 1) }}"
          url_array10 = route10.split('/');
          url_link10 = url_array10[0] + "/" + url_array10[1] + "/" + url_array10[2] + "/"+ url_array10[3] +  "/" + value.uuid;
          nome +='<a href='+url_link10+'>'
          nome += '<span class="profile-name-1">'+value.nome+'</span>'
          nome +='</a>'
          nome += '<a href='+url_link10+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
          nome += '</div></div></li><div class="couple-separator"></div>'
          if (contador == response.valor.length) {
            nome += '</ul>'
          }
           $('div[name=page]').empty();
            $('div[name=page]').append(nome);
            contador++;
          }
        })
        let route_temp = "{{route('allSearch.page', 0)}}";
        let route_temp1 = route_temp.split('/');
        let route = route_temp1[0] + "/" + route_temp1[1] + "/" + route_temp1[2] + "/"+ route_temp1[3] + "/"+ variavel;
        var vertd = '<a href='+route+'><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>';
        $('div[name=ver_td]').empty();
        $('div[name=ver_td]').append(vertd);
    }
});

  s3=s1+s2;
 if (s3 == 0) {
  nome = '<div style="color: white;" class="ml-2 mt-2">Sem resultados</div>';
  $('div[name=page]').empty();
  $('div[name=page]').append(nome);
}
}

        $('#search-lg-home-id').focus(function(){
            $('.container-search-home').css({
                display: 'block',
            });
            $('#search-lg-home-id-container').focus();
        });
        $(document).click(function(e){
            let className = e.target.className.split(' ');
            if(className[0] == "container-search-home" ||
                className[0] == "input-search" ||
                className[0] == "search-lg" ||
                className[0] == "search-id-container" ||
                className[0] == "fa-search" ||
                className[0] == "change-look" ||
                className[0] == "input-search" ||
                className[0] == "input-search"){
                $('.container-search-home').css({
                    display: 'block',
                });
            } else {
                $('.container-search-home').css({
                    display: 'none',
                });
            }
            //console.log(className[0]);
            if (className[0] != "noti-card-first" ||
                className[0] != "hidden-click-any-container" ||
                className[0] != "fa-option-mobile-hide" ||
                className[0] != "fa-option-mobile-hide" ||
                className[0] != "fa-option-mobile-hide") {
                /*$('.noti-card-first').css({
                   display: 'none',
                });*/
            }else {
                $('#more-option-notify').css({

                });
            }
            //console.log(className[0]);
        });

        $('.play_button').click(function(e){
            let id = e.target.id.split('_')[2];
            let video = $('#video_' + id).offset();
            if (document.getElementById('video_' + id).paused) {
                document.getElementById('video_' + id).play();
                document.getElementById(e.target.id).classList.add('invisible');
            } else {
                document.getElementById('video_' + id).pause();
                document.getElementById(e.target.id).classList.remove('invisible');
            }
            $('#current-video-id').val('video_' + id);
        });


});






/* SIENE CODING  */

if (document.getElementById('#putInfo')) {
  function checkDuration(file_control) {

    let fileType = file_control.files[0].type;

    if ( check_for_file_type(fileType) ) {

      window.URL = window.URL || window.webkitURL;
      var video = document.createElement('video');
      video.preload = 'metadata';

      video.onloadedmetadata = function () {
          window.URL.revokeObjectURL(video.src);
          let minutes = Math.floor((video.duration) / 60);

          if (minutes > 1) {
            var certificar = document.querySelector('#putInfo').value = 'long_video_duration';
            var esvaziar = document.querySelector('#testeVid').value = null;
            alert('video muito longo, troca: ' + esvaziar);
          }
      }
      video.src = URL.createObjectURL(file_control.files[0]);
    }

  }


  function check_for_file_type(fileType) {

    return fileType == 'video/mp4' || fileType == 'video/avi' || fileType =='video/ogg' || fileType =='video/mkv' || fileType =='video/3gp' || fileType =='video/wmv' || fileType =='video/flv';
  }
}



/* END SIENE CODING  */

</script>
</html>

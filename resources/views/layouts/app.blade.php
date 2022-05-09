<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Tassumir') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/load.js') }}" defer></script>
    <script src="{{ asset('js/components.js') }}" defer></script>

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
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="UA-X-Compatible" content="ie=edge">
</head>

<body class="container-main">
    <input type="hidden" id="loaded-component" value="none">
    <div class="body-pop-up content-full-scroll">
        <header class="header-main header-main-component clearfix" id="header-main-container">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a <?php if ($page_current == 'home_index'){ echo "class='logo-home'";}?> href="{{route('account.home')}}"><!--<i class="fas fa-link fa-24"></i>--><h1>tass<span class="title-final">umir</span></h1></a>
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
                        <label for="more-option-notify" class="hidden-click-any-container fa-option-mobile-hide"><!--<i class="hidden-click-any-container fi-rs-bell f-footer fa-24 fa-option notify-icon" size="7"></i>-->
                            <img src="{{asset('/css/uicons/notification.png')}}" class="center img-28">
                            <!--<div class="number-notification invisible-component br-10" id="number-notification-component-footer">
                                <div class="" id="number-notification-id-footer"></div>
                            </div>-->
                        </label>
                        <a href="" class="hidden-click-any-container fa-option-mobile-lg-hide notify-icon">
                            <!--<i class="hidden-click-any-container fi-rs-bell f-footer fi- fa-24 fa-option" size="7"></i>-->
                            <img src="{{asset('/css/uicons/notification.png')}}" class="center img-26">
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
                <input type="hidden" id="ident-key" name="">
                <li class="poupar-data l-5 invisible-component" id="poupar-data-id"></li>
                <li class="user-tassumir clearfix l-5">
                    <a class="go-profile" href="{{route('account.profile')}}">
                        <div class="l-5 user-account-container-img">
                            <img class="img-full invisible-component center" id="user-account-container-img-id">
                        </div>
                    </a>
                    <a href="" class="l-5"><h1 class="user-account"></h1></a>
                </li>
                <!--<li class="tassumir-logo-icon clearfix l-5">
                    <a class="" href="{{route('account.profile')}}">
                        <div class="l-5 user-account-container-img">
                            <img class="img-full center" src="{{asset('css/uicons/tassumir.jpeg')}}" id="tt-logo-container-img-id">
                        </div>
                    </a>
                </li>-->
            </nav>
    </header>
    <?php $page = isset($_SERVER['PATH_INFO'])? explode('/', $_SERVER['PATH_INFO'])[1]: ''; if ($page == 'profile' || $page == 'couple_page' || $page == 'post_index'): ?>
        <input type="hidden" id="control-component-page-profile" value="1">
        <header class="header-main header-main-component clearfix" style="z-index: 1002; top: 0; background: #000000c4;" id="header-main-container-page-profile">
            <ul class="ul-left clearfix">
                <li class="l-5 clearfix component-back-container">
                    <img class="img-20 icon-back-container" src="{{asset('css/uicons/back_component.png')}}">
                </li>
                <li class="title l-5 title-container">
                    <div id="title-header-component">
                        <?php if ($page == 'couple_page'): ?>
                            {{$dados[0]->nome}}
                        <?php else: ?>
                            <?php if ($page == 'post_index'): ?>
                            <?php else: ?>
                                {{$nome_completo}}
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                    <div class="statistics-component-page-profile" id="title-header-component-statistics">
                        <?php if ($page == 'couple_page'): ?>
                            0 seguidores
                        <?php elseif($page == 'profile'): ?>
                            0 curtidas
                        <?php endif ?>
                    </div>
                    
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
                <input type="hidden" id="ident-key" name="">
                <li class="poupar-data l-5 invisible-component" id="poupar-data-id"></li>
                <!--<li class="user-tassumir clearfix l-5">
                    <a href="{{route('account.profile')}}">
                        <div class="l-5 icon-container">
                            <img class="img-24 center" id="user-account-container-img-id" src="{{asset('/css/uicons/notification.png')}}">
                        </div>
                    </a>
                    <a href="" class="l-5"><h1 class="user-account"></h1></a>
                </li>-->
                <!--<li class="tassumir-logo-icon clearfix l-5">
                    <a class="" href="{{route('account.profile')}}">
                        <div class="l-5 user-account-container-img">
                            <img class="img-full center" src="{{asset('css/uicons/tassumir.jpeg')}}" id="tt-logo-container-img-id">
                        </div>
                    </a>
                </li>-->
            </nav>
    </header>  
    <?php endif ?>
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
                <li class="li-component-aside" id="route_couples_i_follow"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Casais que eu sigo</a></li>
                <li class="li-component-aside" id="route_save"><i class="far fa-bookmark fa-20 fa-icon-aside-left"></i><a href="">Guardados</a></li>
                <li class="li-component-aside invisible-component" id="route_couples_i_follow"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Casais que eu sigo</a></li>
                <li class="li-component-aside" id="Earn_money"><i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i><a href="">Ganhar Dinheiro</a></li>
                <li class="li-component-aside" id="route_Videos"><i class="far fa-play-circle fa-20 fa-icon-aside-left"></i><a href="{{route('post.tassumir.video','ma')}}">Tassumir Vídeos</a></li>
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
        @yield('content')
    </main>
    <div class="menu-footer">

    </div>
    <footer class="menu-footer menu-footer-main">
        <ul>
            <?php if ($page_current == 'home_index'): ?>
                <a id="home-icon-footer-a" class="logo-home" href="{{route('account.home.feed')}}">
                    <li>
                        <!--<i class="fi-rr-home fa-20 f-footer"></i>-->
                        <img id="home-icon-footer" src="{{asset('/css/uicons/home.png')}}" class="center img-26 logo-home">
                    </li>
                </a>
            <?php else: ?>
                <a id="home-icon-footer-a" href="{{route('account.home.feed')}}">
                    <li>
                        <!--<i class="fi-rr-home fa-20 f-footer"></i>-->
                        <img id="home-icon-footer" src="{{asset('/css/uicons/home.png')}}" class="center img-26">
                    </li>
                </a>                
            <?php endif ?>
            <a href="{{route('account.all.notifications')}}">
                <li class="li-footer-menu">
                    <!--<i class="fi-rs-bell fa-20 f-footer"></i>-->
                    <img id="notify-icon-footer" src="{{asset('/css/uicons/notification.png')}}" class="center img-26">
                    <!--<h1 class="descript">Notificações</h1>-->
                    <div class="number-notification invisible-component br-10" id="number-notification-component-footer">
                        <div class="" id="number-notification-id-footer"></div>
                    </div>
                </li>
            </a>
            <input type="hidden" id="page_denied">
            <label>
                <li id="add-post-target-pop-up">
                    <!--<i class="fi-rr-play fa-20 f-footer"></i>-->
                    <img id="target-alert-post-denied-id" src="{{asset('/css/uicons/add.png')}}" class="center img-32">
                </li>
            </label>
            <a href="{{route('post.tassumir.video', 'ma')}}">
                <li>
                    <!--<i class="fi-rr-play fa-20 f-footer"></i>-->
                    <img src="{{asset('/css/uicons/tv_show.png')}}" class="center img-26">
                </li>
            </a>
            <a class="search-icon-footer-a" href="{{route('allSearch1.page')}}">
                <li class="li-footer-menu">
                    <!--<i class="fi-rr-search fa-20 f-footer"></i>-->
                    <img id="search-icon-footer" src="{{asset('/css/uicons/search.png')}}" class="center img-26">
                </li>
            </a>
        </ul>
    </footer>
    </div>
</body>
<input type="checkbox" name="" id="target-profile-cover-full" class="invisible">
<div class="pop-up" id="cover-profile-full-container" style="background-color: #000;">
    <label for="target-profile-cover-full" id="target-profile-cover-full-ident">
        <div class="cancel-box-component div-img" style="background: transparent;">
            <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
        </div>
    </label>
    <div class="pop-up-component full-component-mobile center profile-cover-pop-up">
        <div>
            <div class="">
                <img id="profile-cover-full">
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="" id="target-single-page-component" class="invisible">
<div class="pop-up" id="single-page-container" style="background-color: #000;">
    <ul class="clearfix header-component-single-page">
        <label class="target-single-page-component" for="target-single-page-component">
            <li class="l-5 clearfix">
                <img class="img-20 icon-back-container icon-back-container-label" src="{{asset('css/uicons/back_component.png')}}">
            </li>            
        </label>
        <li class="title l-5 title-container">
            <div id="title-header-component" class="title-header-component-details">
                Comentários     
            </div>
            <div class="statistics-component-page-profile">
                        
            </div>
        </li>
    </ul>
    <div class="component-single-page" id="single-page-container-body">
    </div>
</div>
<input type="checkbox" name="" id="target-alert-make-tassumir" class="invisible">
<div class="pop-up" id="alert-make-money-tassumir">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; max-height: 90%; height: auto; margin: auto;">
        <div>
            <p class="p-alert">Para poder ganhar dinheiro com o tassumir (ou seja, o correspondente a 1 U$D por cada mil visualizações nos seus vídeos, ou por cada 500 reacções nos seus textos e imagens, caso não goste de aparecer), você precisa ter assumido o seu relacionamento na plataforma. Porquê? <br><br>Porque só é permitido publicar conteúdos no TASSUMIR, quem tem uma página e só pode ter uma página quem assumiu alguém dentro da PLATAFORMA.</p>
        </div>
        <div class="clearfix component-button-alert-tassumir">
            <label for="target-alert-make-tassumir" class="">
                <h1 class="button-pop-up l-5 button-pop-up-reject-close">Fechar</h1>
            </label>
            <label for="target-alert-make-tassumir" class="alert-make-money-tassumir-c" id="assumir-now">
                <h1 class="l-5 button-pop-up button-pop-up-assumir assumir-now-pop-up">Assumir agora</h1>
            </label>
        </div>
    </div>
</div>
<input type="checkbox" name="" id="choose-type-relationship" class="invisible">
<div class="pop-up" id="relationship-assumir-type-container">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: auto; max-width: 300px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height" style=" max-width: 298px;">
            <h1>Tipos de Relacionamentos</h1>
            <div class="container-pop-up-component-header">
                <label for="choose-type-relationship">
                    <div class="cancel-box-component div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px; max-height: 250px; overflow-y: auto;">
            <div class="" id="tipo_relac_id">
                
            </div>
            <input type="hidden" id="checked-load" value="0">
        </div>
    </div>
</div>
<input type="checkbox" id="target-alert-tassumir">
<div class="pop-up" id="relationship-container-invited">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: auto; max-height: 90%; min-height: 220px; max-width: 300px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height" style="max-width: 295px;">
            <h1>Assumir o Relacionamento</h1>
            <div class="container-pop-up-component-header">
                <label for="target-alert-tassumir">
                    <div class="cancel-box-component div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px; border-radius: 8px;">
            <div class="">
                <div class="form-group marriage-proposal" style="width: 95%;" id="search-container-user-assumir">
                    <h1 class="target-identi-label">Nome da pessoa que deseja assumir</h1>
                    <input type="text" class="input-text-default input-full" id="search-person-assumir" type="text" placeholder="Nome da pessoa que deseja assumir" style="border-radius: 7px; padding: 6px;">
                </div>
                <div class="result-search" style="max-height: 295px; overflow-y: auto;">
                    <?php $key = 0; while($key < 5){ ?>
                        <div id="a-result-search-{{$key}}" class="invisible-component">
                            <div class="result-search-component clearfix">
                                <div class="cover-result-search-component inline-perc-1 circle" id="cover-result-search-component-{{$key}}">
                                    <img id="cover-result-search-component-img-{{$key}}" class="img-26 center" src="{{asset('css/uicons/user.png')}}">
                                </div>
                                <div class="text-component inline-perc-1" style="margin-top: 10px;">
                                    <h1 class="text-component-text" id="name-search-data-{{$key}}"></h1>
                                </div>
                                <a class="button-component inline-perc-1-r" id="assumir-item-{{$key}}" style="margin-top: 10px;">
                                    <h1 id="assumir-item-text-{{$key}}" class="text-button-component button-assumir assumir-relationship-user" style="font-size: 8px; text-transform: uppercase; min-width: 60px; text-align: center; font-weight: bolder;">Assumir</h1>                                   
                                </a>
                            </div>                        
                        </div>
                    <?php $key++; } ?>
                </div>
                <div>
                    <div id="selected-user-assumir" class="invisible-component">
                        <div class="result-search-component clearfix" style="margin: auto; width: 85%;">
                            <div class="cover-result-search-component inline-perc-1 circle">
                                <img class="img-26 center" src="{{asset('css/uicons/user.png')}}">
                            </div>
                            <div class="text-component inline-perc-1" style="margin-top: 10px;">
                                <h1 class="text-component-text" id="name-search-data-selected"></h1>
                            </div>
                            <a class="button-component inline-perc-1-r" id="assumir-relationship-user-desfazer" style="margin-top: 10px;">
                                <h1 id="assumir-item-text-selected" class="text-button-component button-assumir" style="font-size: 8px; text-transform: uppercase; min-width: 60px; text-align: center; font-weight: bolder;">desfazer</h1>                                   
                            </a>
                        </div>                        
                    </div>
                    <div id="selected-relationship-assumir" class="invisible-component">
                        <div class="result-search-component clearfix" style="margin: auto; width: 85%;">
                            <div class="text-component inline-perc-1" style="margin-top: 10px; margin-left: 20px;">
                                <h1 class="text-component-text" id="type-data-selected"></h1>
                            </div>
                            <label for="choose-type-relationship" class="button-component inline-perc-1-r" style="margin-top: 10px; display: block;">
                                <h1 id="assumir-item-type-relationship-selected" class="text-button-component button-assumir" style="font-size: 8px; text-transform: uppercase; min-width: 60px; text-align: center; font-weight: bolder;">mudar</h1>                                   
                            </label>
                        </div> 
                        <div>
                            <h1 class="alert-message">O valor a pagar para que o seu <span id="type-relationship-choosed">namoro</span> seja registrado e começar a ganhar dinheiro com os seus conteúdos é de <span id="price-type-relationship"></span></h1>
                        </div>                       
                    </div>
                </div>
                <div id="choose-type-relationship-id" class=" invisible-component clearfix l-5" style="width: 98%; margin-top: 10px; margin-bottom: 10px;">
                    <div class="cover-done" style="border-radius: 8px; min-width: 200px;">
                        <label for="choose-type-relationship" id="choose-type-relationship-id" style="outline: none; border: none; background: transparent; color: white; padding: 8px; font-size: 11px; width: 100%; border-radius: 5px; margin-bottom: 0;">Escolher o tipo de Relacionamento</label>
                    </div>
                </div>
                <div id="name-page-container" class=" invisible-component form-group marriage-proposal" style="width: 95%;">
                    <h1 class="target-identi-label">Nome que deseja dar na sua página, caso seja aceite... (Pode ser editada depois)</h1>
                    <input type="text" class="input-text-default input-full" id="name-page-text-choosed" type="text" placeholder="Nome da página,caso seja aceite..." style="border-radius: 7px; padding: 6px;">
                </div>
                <form action="{{route('engagement.proposal')}}" method="POST" enctype="multipart/form-data" id="done-btn-assumir">
                    @csrf
                    <div class="clearfix l-5" style="width: 98%; min-width: 200px; margin-top: 10px; margin-bottom: 10px;">
                        <div class="cover-done invisible-component" id="assumir-now-relationship" style="border-radius: 4px; width: 98%;">
                            <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 8px; font-size: 12px; width: 100%; border-radius: 5px;">Assumir o Relacionamento agora</button>
                        </div>
                    </div>
                    <input type="hidden" name="conta_pedida" id="uuid_user_assumir">
                    <input type="hidden" name="tipo_relac" id="relationship-type-tassumir">
                    <input type="hidden" name="name_page" id="name-invited-page-home">
                    <input type="hidden" id="">
                </form>
            </div>
        </div>
    </div>
</div>
<input type="checkbox" name="" id="target-alert-post-denied" class="invisible">
<div class="pop-up" id="alert-denied-post">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 250px; overflow: hidden;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1 class="" id="header-title-alert">Publicar um POST</h1>
            <div class="container-pop-up-component-header">
                <label for="target-alert-post-denied">
                    <div class="cancel-box-component div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
            <p style="color: #fff; font-size: 13px; padding: 10px;" id="alert-description" >Só é permitido fazer um post quem tem assumido um relacionamento no Tassumir. Assuma agora mesmo o seu relacionamento, se torne um criador de conteúdo e ganhe dinheiro com seus posts.</p>
            <label for="target-alert-post-denied" class="label-full">
                <div class="cover-done checker target-relationship-alert-assumir-menu-footer" id="cover-done-post">
                    <h2 class="target-relationship-alert-assumir-menu-footer" style="padding: 10px; font-size: 11px; width: 100%;">Assumir Meu relacionamento</h2>
                </div>
            </label>
        </div>
    </div>
</div>
<input type="checkbox" name="" id="target-alert-info" class="invisible">
<div class="pop-up" id="target-alert-info-container">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: auto; overflow: hidden; max-height: 90%; margin: auto;">
        <!--<header class="pop-up-component-header pop-up-component-header-default header-height">
            <div class="container-pop-up-component-header">
                <label for="target-alert-info">
                    <div class="cancel-box-component div-img">
                        <i class="fas fa-times fa-14 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>-->
        <div class="clearfix l-5 alert-description-class" id="alert-description" style="width: 98%; padding: 5px; margin-top: 10px;">
            <p class="alert-description-class" style="color: #fff; font-size: 14px;">Actualmente, o TASSUMIR, é a rede social que mehor paga, por cada mil visualizações em vídeo ou por cada 500 reacções em texto ou imagens, podendo ser mais rentável do que plataformas como o Youtube, Facebook e Instagram em países como Angola<br><br>
                <span class="alert-description-class" style="text-transform: uppercase; font-size: 12px;">Mas como Ganhar com os seus conteúdos?<span id="elips-p">...</span></span><br><span style="color: #3490dc; font-weight: bolder; font-size: 14px;" id="alert-description-see-more" class="alert-description-class"> ver mais</span><br><span id="more-content-alert" class="invisible-component alert-description-class">Você precisa criar conteúdos em vídeos que sejam atrativos e que tem a ver com algum assunto interessante para relacionamentos. Quando o teu vídeo atingir até 1.000 visualizações, você começará a ganhar o equivalente a 1 U$D, ou seja, se tiverem 10 mil visualizações, você ganhará 10 U$D. E se eu não gosto de vídeos e escrevo textos?<br><br>
            Você poderá ganhar por cada 500 reacções na sua publicação.</span></p>
            <label for="target-alert-info" class="label-full">
                <div class="cover-done checker" id="cover-done-post">
                    <h2 id="concluir_file_ok" style="padding: 10px; font-size: 11px; width: 100%;">Fechar</h2>
                </div>
            </label>
            <input type="hidden" id="checked-load-all" value="0">
        </div>
    </div>
</div>
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
<?php endif ?>
@endif
<?php if (true): ?>
<input type="checkbox" name="" id="target-profile-cover" class="invisible">
<div class="pop-up" id="cover-profile">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: auto; margin: auto;">
        <!--<header class="pop-up-component-header pop-up-component-header-default header-height" id="add-cover-profile">
            <h1>Adicionar foto de perfil</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box-component div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height" id="header-height-component-add-cover"></div>-->
        <div id="foto-view" class="invisible-component">
            <img id="foto-view-component" class="img-full">
            <div class="cancel-box-component div-img" id="cancel-box-component-change">
                <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
            </div>
        </div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="clearfix">
                <form action="{{ route('account.profile.pic') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="file invisible-component" type="file" id="file-id-profile" name="profilePicture" style="width: 250px; margin-left: 10px; color: #fff;" required>
                    <div class="cover-done-profile-cover-choose" id="cover-done-profile-cover-choose-container">
                        <button type="button" id="cover-done-profile-cover-choose-id">Carregar foto</button>
                    </div>
                    <div class="clearfix l-5" id="" style="width: 65%; margin: auto; float: inherit;">
                        <div class="cover-done cover-done-profile-post l-5" id="close-cover-post">
                            <button type="button" class="cover-done-profile-cover" id="close-cover-post-button">Cancelar</button>
                        </div>
                        <div class="cover-done cover-done-profile-post l-5">
                            <button type="submit" class="cover-done-profile-cover">Concluido</button>
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
                  <input type="hidden" id="proof-file-send" name="Comprovativo" id="Comprovativo">
                  <input type="hidden" name="notificacao" id="notificacao">

                <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                    <label for="target-profile-cover-post" class="label-full">
                        <div class="cover-done" id="">
                          <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px; width: 100%;">Concluido</button>
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
                    <div class="cancel-box-component div-img" id="target-invited-relationship-id">
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
<input type="checkbox" name="" id="target-loading-app" class="invisible">
<div class="pop-up pop-up-option" id="container-loading-app">
    <img class="center" src="{{asset('css/uicons/loading.gif')}}" id="loader_icon_app" style="display: block;">
    <h1 class="center" id="loader_app_text">Guardando...</h1>
</div>
<?php if (true): ?>
<input type="checkbox" name="" id="target-option-post" class="invisible">
<div class="pop-up pop-up-option" id="option-post-full-container">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; max-height: 90%; height: auto; width: 280px;">
        <div>
            <div class="">
                <ul class="clearfix more-option-post" id="more-option-post-{{$key}}">
                    <li class="edit-option-component invisible-component" id="edit-option-component-id">
                        <a href="" class="edit-option" id="edit-option-edit-component"></a>
                    </li>
                    <!--<li>
                        <a href="" class="edit-option options-special" id="edit-option">Não seguir</a>
                    </li>-->
                    <li class="invisible-component" id="delete-option-component">
                        <a href="" class="delete_post options-special" id="delete-option-component-id"></a>
                    </li>
                    <li class="hidden-post">
                        <a href="" class="delete_post options-special hidden-post" id="hidden-post-component">Ocultar publicação</a>
                    </li>
                    <!--<li>
                        <a href="">Denunciar</a>
                    </li>-->
                    <li>
                        <a href="">Copiar link</a>
                    </li>
                    <label for="target-option-post" id="target-option-post-ident">
                        <li id="cancel-options">
                            Cancelar
                        </li>
                    </label>
                </ul>
                <input type="hidden" id="selected-option-post">
            </div>
        </div>
    </div>
</div>    
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="options-invited-pop-up" class="invisible">
<div class="pop-up" id="invited-relationship-response">
    <div class="pop-up-component full-component-mobile center mobile-300" style="position: absolute; height: 320px;">
        <!--<header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Pedido de Relacionamento</h1>
            <div class="container-pop-up-component-header">
                <label for="target-invited-relationship">
                    <div class="cancel-box div-img" id="target-invited-relationship-id">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>-->
        <div style="margin-top: 15px; margin-bottom: 10px; overflow-y: auto;">
            <div>
                <div id="load_accpet">
                    <img class="img-30 center" src="{{asset('css/uicons/aguarde1.gif')}}">
                </div>
                <p class="alert-accept" id="textr">  </p>
            </div>
            <div>
                <label class="terms-use-alert" for="">Ler termos e responsabilidades sobre RELACIONAMENTOS</label>
            </div>
            <div class="clearfix">
                <div class="clearfix l-5" id="cover-done-component-accept">
                    <div class="cover-done" id="cover-done-marriage">
                      <form class="needs-validation" id="accept_form" method="POST" novalidate>
                      @csrf
                        <button class="relationship-accept-pop-up-button" id="relationship-confirm-pop-up-button" type="submit" name="button">
                            Sim, Aceito
                        </button>
                        <input type="hidden" name="accept_relacd" id="accept_relacd">
                        <input type="hidden" name="uuid_accept" id="accept_relacd_ident">
                        <input type="hidden" name="id_notification" id="id_notification">
                    </form>
                    </div>
                </div>
                <label for="options-invited-pop-up">
                    <h1 class="close-pop-up-btn l-5">Fechar</h1>
                </label>                
            </div>

        </div>
    </div>
</div>
<?php endif ?>

<input type="checkbox" name="" id="search-pop-up-check" class="invisible">
<div class="pop-up" id="search-pop-up">
    <header class="clearfix">
        <label for="search-pop-up-check">
            <div class="l-5 icon-component-line-input">
                <img class="img-20" src="{{asset('css/uicons/back_component.png')}}">
            </div>            
        </label>
        <div class="l-5 component-input-search-container">
            <input class="input-search input-text" id="search-tass-item" type="search" placeholder="o que procura?" name="">
        </div>
        <div class="l-5 icon-component-line-input">
            <img class="img-20" src="{{asset('css/uicons/search_component.png')}}">
        </div>
        <div>
        </div>
    </header>
    <div class="search-container-general">
        <input type="hidden" id="component_numbers">
        <input type="hidden" id="component-read-search">
        <input type="hidden" id="component-read-search-page">
        <div class="">
            <h1 class="title-component invisible-component" id="people-search">Pessoas</h1>
            <div id="container-search-container">     
            </div>  
        </div>
        <div>
            <h1 class="title-component invisible-component" id="page-search">Páginas</h1>
            <div id="container-search-container-page">     
            </div>              
        </div>
    </div>
</div>
<?php if (true): ?>
<input type="checkbox" name="" id="options-edit-pop-up" class="invisible">
<div class="pop-up" id="edit-pop-up">
    <div class="pop-up-component full-component-mobile center" style="position: absolute;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Editar Publicação</h1>
            <div class="container-pop-up-component-header">
                <label for="options-edit-pop-up">
                    <div class="cancel-box-component div-img" id="target-invited-relationship-id-close">
                        <i class="fas fa-times fa-16 center target-invited-relationship-close" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div class="clearfix content-details-post" style="margin-top: 5px; margin-bottom: 5px;">
                <div class="first-component clearfix l-5">
                    <div class="page-cover circle l-5" id="foto-edit_id" name="foto_edit">
                    </div>
                    <div class="page-identify l-5 clearfix">
                        <h1 class="text-ellips" id="name_page_edit_post" name="name_page_edit_post"></h1>
                    </div>
                </div>
                <!--<form action="{{ route('edit_post') }}" method="POST" enctype="multipart/form-data">
                @csrf-->
                <input type="hidden" name="pass_post_uuid" id="pass_post_uuid" >
                <div class="textarea-container l-5" style="width:100%;">
                    <textarea name="message" id="message"></textarea>
                </div>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin: 0px auto 10px;">
                <div class="cover-done-edit" id="cover-done">
                    <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Editar</button>
                </div>
                <!--</form>-->
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

      $('.video-post-video').click(function(e){
        /*let id = e.target.id.split('_')[1];
        if (document.getElementById('video_' + id).paused) {
            //document.getElementById('video_' + id).play();
            document.getElementById('play_button_' + id).classList.add('invisible');
        } else {
            document.getElementById('play_button_' + id).classList.remove('invisible');
            document.getElementById('video_' + id).pause();
        }*/
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
            /*$('.pop-up').css({
                opacity: 0,
                zIndex: -1
            });*/
        });
        $('.add-edit-profile').click(function(){
            /*$('#cover-profile').css({
                opacity: 1,
                zIndex: 1000
            });*/
        });
        $('.add-post').click(function(){
            /*$('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });*/
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
            /*$('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });*/
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
            /*let id = e.target.id.split('_')[2];
            if (document.getElementById('video_' + id).paused) {
                //document.getElementById('video_' + id).play();
                document.getElementById('play_button_' + id).classList.add('invisible');
            } else {
                document.getElementById('video_' + id).pause();
                document.getElementById('play_button_' + id).classList.remove('invisible');
            }*/
           
        });


});






/* SIENE CODING  */

if (document.getElementById('#putInfo')) {
  function checkDuration(file_control) {
    alert('hello world');
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

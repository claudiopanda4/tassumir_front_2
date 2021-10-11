<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Tassumir') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script scr="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checked.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width-width, initial-scale=1,0">
    <meta http-equiv="UA-X-Compatible" content="ie=edge">
</head>

<body class="container-main">
    <header class="header-main header-main-component clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><i class="fas fa-link fa-24"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden">
                    <div class="input-search">
                        <i class="fas fa-search fa-16 fa-search-main"></i>
                        <input type="search" name="" placeholder="O que está procurando?" class="input-text" >
                    </div>
                </li>
            </ul>
            <nav class="menu-header">

                <ul class="clearfix ">
                    <li class="l-5 mobile-header-icon">
                        <a href=""><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon" style="z-index:2;">
                        <div class="last-component-n clearfix-n " >

                            <label for="more-option-notify">
                                <i class="far fa-bell fa-24 fa-option" size="7"></i>
                            </label>
                            <input type="checkbox" name="" id="more-option-notify" class="hidden">
                            <ul class="clearfix more-option-post-n card-flex">
                                <li class="mb-4" style="display: flex;justify-content: flex-start;align-content: flex-start;">

                                    <span style="color:#efefef;">Actividades</span>
                                </li>


                                <li style="display: flex;justify-content: flex-start;align-content: flex-start;">

                                    <span style="color:#fff;">Hoje</span>
                                </li>

                                <li class="change-look" style="display: flex;justify-content:flex-start;width: 300px;padding:8px;">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2" style="font-size:12pt;color: #fff;" >Delton Agostinho, gostou </span>
                                </li>


                                <li class="change-look"style="display: flex;justify-content: flex-start;width: 300px;
                                padding:8px;">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2" style="font-size:12pt;color: #fff;" >João Nunes comentou: Ola </span>
                                </li>

                                <li style="display: flex;justify-content: flex-start;align-content: flex-start;">

                                    <span style="color:#fff;">Ontem</span>
                                </li>

                                <li class="change-look" style="display: flex;justify-content: flex-start;width: 300px;padding:8px;">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2" style="font-size:12pt;color: #fff;" >Delton Agostinho, gostou </span>
                                </li>


                                <li class="change-look" style="display: flex;justify-content: flex-start;width: 300px;padding:8px;">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2" style="font-size:12pt;color: #fff;" >João Nunes comentou:Ola </span>
                                </li>
                                 <li class="change-look mb-5" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">


                                    <a href=""><span class="mt-2" style="font-size:12pt;color: #fff;" > Ver todos </span></a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="l-5 mobile-hidden">
                        <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                    </li>
                    <li class="user-tassumir clearfix l-5">
                        <a href="{{route('account.profile')}}"><img class="l-5" src='{{asset("storage/img/users/anselmoralph.jpg")}}'></a>
                        <a href="{{route('account.profile')}}" class="l-5"><h1 class="user-account" >{{$account_name[0]->nome}}</h1></a>
                    </li>
                </ul>
            </nav>
    </header>
    <div class="header-main-component"></div>



    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix">
                <li class="li-component-aside li-component-aside-active"><i class="fas fa-rss fa-20 fa-icon-aside-left"></i><a href="{{route('account.home')}}">Feed de Notícias</a></li>
                <li class="li-component-aside"><i class="far fa-user-circle fa-20 fa-icon-aside-left"></i><a href="{{route('account.profile')}}">{{$account_name[0]->nome}} {{$account_name[0]->apelido}}</a></li>
                <!--<li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Criar Relacionamento</a></li>
                <li class="li-component-aside"><i class="fas fa-book-open fa-20 fa-icon-aside-left"></i><a href="">Página de Casal</a></li>-->
                <li class="li-component-aside"><i class="fas fa-book-open fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Página de Casal</a></li>
            </ul>
        </nav>
        <nav class="last-nav">
            <ul>
                <li class="li-component-aside"><i class="fas fa-cog fa-20 fa-icon-aside-left"></i><a href="{{route('page_definition.page')}}">Definições</a></li>
                <li class="li-component-aside"><i class="far fa-question-circle fa-20 fa-icon-aside-left"></i><a href="{{route('help_support.page')}}">Ajuda e Suporte</a></li>
                <li class="li-component-aside"><i class="far fa-question-circle fa-20 fa-icon-aside-left"></i><a href="{{route('account.logout')}}">Sair</a></li>
            </ul>
        </nav>
    </aside>
    <aside class="aside aside-right" style="z-index:1;">
        <nav>
            <header>
                <h1>Páginas que eu sigo</h1>
            </header>
            <ul class="">
                <?php
                $follow_page = [
                    [
                        "name" => "Famosos em Relacionamentos",
                        "seguir" => "seguir",
                        "cover" => "t30_13_1092985.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                    [
                        "name" => "Yola Araújo & Bass",
                        "seguir" => "não seguir",
                        "cover" => "79818663_.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                    [
                        "name" => "Conselheiro Amoroso",
                        "seguir" => "não seguir",
                        "cover" => "wedding_rings.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                ];
                foreach ($follow_page as $key_ => $value): ?>
                    <li class="li-component-aside-right clearfix">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src=<?php echo "../storage/img/page/".$follow_page[$key_]["cover"]; ?>>
                        </div>
                        <h1 class="l-5 name-page text-ellips">{{ $follow_page[$key_]["name"] }}</h1>
                        <h2 class="l-5 text-ellips">{{ $follow_page[$key_]["n_seguidores"] }} seguidores</h2>
                        <a href="">{{ $follow_page[$key_]["seguir"] }}</a>
                    </li>
                <?php endforeach ?>
            </ul>
            <footer class="clearfix">
                <a href="" class="r-5">Ver Todas</a>
            </footer>
        </nav>
        <nav class="last-nav">
            <header>
                <h1>Sugestões para Você</h1>
            </header>
            <ul class="">
                <?php
                $follow_page = [
                    [
                        "name" => "Famosos em Relacionamentos",
                        "seguir" => "seguir",
                        "cover" => "t30_13_1092985.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                    [
                        "name" => "Yola Araújo & Bass",
                        "seguir" => "não seguir",
                        "cover" => "79818663_.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                    [
                        "name" => "Conselheiro Amoroso",
                        "seguir" => "não seguir",
                        "cover" => "wedding_rings.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                ];
                foreach ($follow_page as $key_ => $value): ?>
                    <li class="li-component-aside-right clearfix">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src=<?php echo "../storage/img/page/".$follow_page[$key_]["cover"]; ?>>
                        </div>
                        <h1 class="l-5 name-page text-ellips">{{ $follow_page[$key_]["name"] }}</h1>
                        <h2 class="l-5 text-ellips">{{ $follow_page[$key_]["n_seguidores"] }} seguidores</h2>
                        <a href="">{{ $follow_page[$key_]["seguir"] }}</a>
                    </li>
                <?php endforeach ?>
            </ul>
            <footer class="clearfix">
                <a href="" class="r-5">Ver Todas</a>
            </footer>
        </nav>
    </aside>
    <main class="main">
        @yield('content');
    </main>
</body>
<?php if (true): ?>
<input type="checkbox" name="" id="target-profile-cover" class="invisible">
<div class="pop-up" id="cover-profile">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Adicione Capa da Oferta</h1>
            <div class="container-pop-up-component-header">
                <div class="cancel-box div-img">
                    <i class="fas fa-times fa-16 center" style="color: #000;"></i>
                </div>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <form enctype="multipart/form-data">
                    <input class="file" type="file" name="" style="width: 240px; margin-left: 10px;">
                </form>
            </div>
        </div>
        <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
            <div class="" id="cover-done">
                <h2 style="padding: 10px; font-size: 14px;">Concluido</h2>
            </div>
        </div>
    </div>
</div> 
<?php endif ?>
</html>

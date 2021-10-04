<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Tassumir') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width-width, initial-scale=1,0">
    <meta http-equiv="UA-X-Compatible" content="ie=edge">
</head>

<body class="container-main">
    <header class="header-main header-main-component clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href=""><i class="fas fa-link fa-24"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden">
                    <div class="input-search">
                        <i class="fas fa-search fa-16 fa-search-main"></i>
                        <input type="search" name="" placeholder="O que está procurando?" class="input-text">
                    </div>
                </li>
            </ul>
            <nav class="menu-header">
                <ul class="clearfix">
                    <li class="l-5 mobile-header-icon">
                        <a href=""><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon">
                        <a href=""><i class="far fa-bell fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-hidden">
                        <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                    </li>
                    <li class="user-tassumir clearfix l-5">
                        <img class="l-5" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                        <a href="" class="l-5"><h1 class="user-account">Delton</h1></a>
                    </li>
                </ul>
            </nav>
    </header>
    <div class="header-main-component"></div>
    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix">
                <li class="li-component-aside li-component-aside-active"><i class="fas fa-rss fa-20 fa-icon-aside-left"></i><a href="">Feed de Notícias</a></li>
                <li class="li-component-aside"><i class="far fa-user-circle fa-20 fa-icon-aside-left"></i><a href="{{route('account.profile')}}">Delton Agostinho</a></li>
                <li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Criar Relacionamento</a></li>
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
    <aside class="aside aside-right">
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
</html>
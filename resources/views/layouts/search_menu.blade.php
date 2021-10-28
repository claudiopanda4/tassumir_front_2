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
<div class="body-pop-up content-full-scroll">
  <header class="header-main-n header-main-component-n clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><i class="fas fa-link fa-24"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden">
                    <div class="input-search">
                        <i class="fas fa-search fa-16 fa-search-main"></i>
                        <input type="search" id="table_search" name="table_search" placeholder="O que está procurando?" class="input-text" >
                    </div>
                </li>
            </ul>
            <nav class="menu-header">
                <ul class="clearfix ">
                    <li class="l-5 mobile-header-icon">
                        <a href=""><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon  ">
                        <div class="last-component-n clearfix-n ">
                            <label for="more-option-notify">
                                <i class="far fa-bell fa-24 fa-option" size="7"></i>
                            </label>
                            <input type="checkbox" name="" id="more-option-notify" class="hidden">
                            <ul class="clearfix more-option-post-n card-flex">
                                <li class="mb-4 couple-list-search" >

                                    <span class="couple-list-span-head">Actividades</span>
                                </li>


                                <li class="couple-list-search">

                                    <span class="couple-list-span-head">Hoje</span>
                                </li>

                                <li class="change-look couple-list-search2" >

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2 couple-list-span">Delton Agostinho, gostou </span>
                                </li>


                                <li class="change-look couple-list-search2">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2 couple-list-span"  >João Nunes comentou: Ola </span>
                                </li>

                                <li class="couple-list-search">

                                    <span class="couple-list-span-head">Ontem</span>
                                </li>

                                <li class="change-look couple-list-search2" >

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2 couple-list-span">Delton Agostinho, gostou </span>
                                </li>


                                <li class="change-look couple-list-search2" >

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2 couple-list-span">João Nunes comentou:Ola </span>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="l-5 mobile-hidden">
                        <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                    </li>
                    <li class="user-tassumir clearfix l-5">
                        <a href="{{route('account.profile')}}"><img class="l-5" src='{{asset("storage/img/users/anselmoralph.jpg")}}'></a>
                        <a href="{{route('account.profile')}}" class="l-5"><h1 class="user-account" >Delton</h1></a>
                    </li>
                </ul>
            </nav>
    </header>
  <div class="header-main-component-n "></div>
    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix card-flex">
                <li class=" couple-search-li-aside-left mt-3">

                  <span style="color:#efefef;">Resultados da Pesquisa</span>
                </li>

        <div class="couple-separator">

        </div>
                <li class="mb-2 mt-2 couple-search-li-aside-left">

                    <span class="couple-seach-span">Filtros</span>
                </li>
                <li class="li-component-aside li-component-aside-active"><a href="{{route('allSearch.page')}}">Tudo</a></li>
                <li class="li-component-aside"><a href="{{route('peoplesSearch.page')}}">Pessoas</a></li>

                <li class="li-component-aside"><a href="{{route('pagesSearch.page')}}">Páginas</a></li>

                <li class="li-component-aside"><a href="{{route('publicationsSearch.page')}}">Publicações</a></li>
            </ul>
        </nav>

    </aside>



    <main>
        @yield('content');
    </main>
</div>
</body>
</html>

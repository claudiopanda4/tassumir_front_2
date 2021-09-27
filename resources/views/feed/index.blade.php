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
                <li class="li-component-aside"><i class="far fa-user-circle fa-20 fa-icon-aside-left"></i><a href="">Delton Agostinho</a></li>
                <li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Criar Relacionamento</a></li>
                <li class="li-component-aside"><i class="fas fa-book-open fa-20 fa-icon-aside-left"></i><a href="">Página de Casal</a></li>
            </ul>
        </nav>
        <nav class="last-nav">
            <ul>
                <li class="li-component-aside"><i class="fas fa-cog fa-20 fa-icon-aside-left"></i><a href="">Definições</a></li>
                <li class="li-component-aside"><i class="far fa-question-circle fa-20 fa-icon-aside-left"></i><a href="">Ajuda e Suporte</a></li>
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
        <header class="card br-10 stories stories-about-talking">
            <header>
                <h1>O que estão falando...</h1>
            </header>
            <nav>
                <ul class="clearfix">
                    <?php 
                    $about_talking = [
                        [],[],[],[],
                    ];
                    foreach ($about_talking as $key => $value): ?>
                        <li class="li-component-stories l-5">
                            <a href="">
                                <div class="identify-cover circle">
                                    <img class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                                </div>
                                <img class="img-back-stories" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                <div class="headline">
                                    <h2>Yola Araújo oferece presente de 1 ano de...</h2>
                                </div>
                            </a>
                        </li>
                    <?php endforeach ?>
                    <div class="see-all-stories circle">
                        <a href="">
                            <i class="fas fa-arrow-right fa-16 center"></i>
                        </a>
                    </div>
                </ul>
            </nav>
        </header>
        <?php 
        $posts_feed = [
            [
                "type" => "img",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "video",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "img",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "video",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "none",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "img",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "img",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "video",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "none",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
        ];
        foreach ($posts_feed as $key => $value): ?>
            <?php if ($key == 2): ?>
                <section class="suggest-slide">
                    <header>
                        <h1>Sugestões pra você</h1>
                    </header>
                    <nav class="clearfix">
                        <ul class="clearfix">
                            <?php 
                            $suggest_page = [
                                [],[],[],[],[],[],[],
                            ];
                            foreach ($suggest_page as $key => $value): ?>
                                <li class="li-component-suggest clearfix l-5">
                                    <div class="clearfix sugest_component_div">
                                        <div class="sugest_component circle clearfix">
                                            <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                        </div>
                                    </div>
                                    <h1 class="name-suggest text-ellips">Criticando casais</h1>
                                    <a href="" class=""><div>seguir</div></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </nav>
                </section>
            <?php endif ?>
            <div class="card br-10">
                <div class="post">
                    <header class="clearfix">
                        <div class="first-component clearfix l-5">
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                            <div class="page-identify r-5 clearfix">
                                <h1 class="text-ellips">Famosos em Relacionamentos</h1>
                                <div class="info-post clearfix">
                                    <span class="time-posted">50 min</span>
                                    <a href="" class="r-5 follow_page_post">seguir</a>
                                </div>
                            </div>
                        </div>
                        <div class="last-component clearfix r-5">
                            <label for="more-option-0">
                                <i class="fas fa-ellipsis-v fa-12 fa-option"></i>
                            </label>
                            <input type="checkbox" name="" id="more-option-0" class="hidden">
                            <ul class="clearfix more-option-post">
                                <li>
                                    <a href="">Editar</a>
                                </li>
                                <li>
                                    <a href="">Ocultar Publicação</a>
                                </li>
                                <li>
                                    <a href="">Apagar Publicação</a>
                                </li>
                                <li>
                                    <a href="">Denunciar</a>
                                </li>
                                <li>
                                    <a href="">Copiar Link</a>
                                </li>
                            </ul>
                        </div>
                    </header>
                    <div class="card-post">
                        <div class="">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                            <?php if ($posts_feed[$key]["type"] == "img"): ?>
                            <div class="post-cover">
                                <img class="img-full" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                            <?php elseif ($posts_feed[$key]["type"] == "video"): ?>
                            <div class="video-post">
                                <video controls>
                                    <source src="{{asset('storage/video/page/12345678.mp4')}}" type="video/mp4">
                                    <source src="{{asset('storage/video/page/12345678.ogg')}}" type="video/ogg">
                                    <source src="{{asset('storage/video/page/12345678.webcam')}}" type="video/webcam">
                                    Your browser does not support the video tag.
                                </video>
                            </div>       
                            <?php endif ?>
                        </div>
                    </div>
                    <nav class="row interaction-numbers">
                        <ul class="clearfix">
                            <li>
                                <a href="">10 reacções</a>
                            </li>
                            <li>
                                <a href="">10 comentários</a>
                            </li>
                        </ul>
                    </nav>
                    <nav class="row clearfix interaction-user">
                        <ul class="row clearfix">
                            <li class="l-5">
                                <div class="content-button">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                        <h2>Gosto</h2>
                                    </a>
                                </div>
                            </li>
                            <li class="l-5">
                                <div class="content-button">
                                    <a href="">
                                        <i class="far fa-comment-alt"></i>
                                        <h2>Comentar</h2>
                                    </a>
                                </div>
                            </li>
                            <li class="r-5">
                                <div class="content-button">
                                    <a href="">
                                        <i class="fas fa-share"></i>
                                        <h2>Partilhar</h2>
                                    </a>
                                </div>
                            </li>  
                        </ul>
                    </nav>
                    <div class="comment-send clearfix">
                        <div class="img-user-comment l-5">
                            <img class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                        </div>
                        <div class="input-text comment-send-text l-5 clearfix">
                            <input type="text" name="" placeholder="O que você tem a dizer?">
                            <div class="r-5 icon-img-comment">
                                <a href="">
                                    <i class="far fa-images fa-20 fa-img-comment"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </main>
</body>
</html>
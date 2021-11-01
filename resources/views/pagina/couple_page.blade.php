@extends('layouts.app')

@section('content')	
<div class="main" id="main-container-profile">
    <div class="card br-10 card-flex card-page">
        <div class="clearfix">
            <div class="img-profile-page-container clearfix l-5">
                @if($page_content[0]->foto)
                    <div class="img-profile-page circle l-5">
                        <img src="{{asset('storage/img/page/') . '/' . $page_content[0]->foto}}" class="img-full circle">
                    </div>
                @else
                    <div class="img-profile-page circle l-5">
                        <img src="{{asset('storage/img/page/unnamed.jpg')}}" class="img-full circle">
                    </div>
                @endif
                <label for="target-profile-cover-page">
                    <div class="add-edit-profile circle">
                        <i class="fas fa-plus center" style="font-size: 10px;"></i>
                    </div>
                </label>
            </div>
            <div class="statistics-profile-page l-5 clearfix">
                <div class="statistics-profile-page-identify">
                    <h1>{{ $page_content[0]->nome }}</h1>
                    <h2>@<span></span>{{ $page_content[0]->nome }} </h2>
                </div>
                @if($isUserHost)
                    <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-container-lg-1">
                        <div class="statistics-profile-page-component l-5">
                            @if ($publicacoes > 1)
                            <h1>{{ $publicacoes }}</h1>
                            <h2>Publicações</h2>
                            @else
                            <h1>{{ $publicacoes }}</h1>
                            <h2>Publicação</h2>
                            @endif
                        </div>
                        <?php if (false): ?>
                        <div class="statistics-profile-page-component l-5 invisible">
                            <h1>123</h1>
                            <h2>A Seguir</h2>
                        </div>
                        <?php endif ?>
                        <div class="statistics-profile-page-component l-5">
                            <h1>{{ $seguidores }}</h1>
                            <h2>Seguindo</h2>
                        </div>
                    </div>
                @else
                    <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-container-lg">
                        <div class="statistics-profile-page-component l-5">
                            @if ($publicacoes > 1)
                            <h1>{{ $publicacoes }}</h1>
                            <h2>Publicações</h2>
                            @else
                            <h1>{{ $publicacoes }}</h1>
                            <h2>Publicação</h2>
                            @endif
                        </div>
                        <?php if (false): ?>
                        <div class="statistics-profile-page-component l-5 invisible">
                            <h1>123</h1>
                            <h2>A Seguir</h2>
                        </div>
                        <?php endif ?>
                        <div class="statistics-profile-page-component l-5">
                            <h1>{{ $seguidores }}</h1>
                            <h2>Seguindo</h2>
                        </div>
                    </div>
                    <div class="follwing-btn-container">
                        <button type="submit" class="follwing-btn">
                            Seguir
                        </button>
                    </div>
                @endif
            </div>
            <div class="edit-page-container">
                <button type="submit" class="follwing-btn" id="edit-page">
                    Editar Página
                </button>
            </div>
        </div>
        <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-mobile">
            <div class="statistics-profile-page-component l-5">
               @if ($publicacoes > 1)
               <h1>{{ $publicacoes }}</h1>
               <h2>Publicações</h2>
               @else
               <h1>{{ $publicacoes }}</h1>
               <h2>Publicação</h2>
               @endif
            </div>
            @if (false)
            <div class="statistics-profile-page-component l-5">
                <h1>123</h1>
                <h2>A Seguir</h2>
            </div>
            @endif
            <div class="statistics-profile-page-component l-5">
                <h1>{{ $seguidores }}</h1>
                <h2>Seguindo</h2>
            </div>
        </div>
        <div class="edit-page-container-mobile">
            <button type="submit" class="follwing-btn">
                Editar Página
            </button>
        </div>
        <div class="clearfix">
            <div class="description-couple">
                <p> {{ $page_content[0]->descricao }} </p>
            </div>
        </div>
        <label for="add-post-target" class="add-post-label">
            <div class="add-post circle">
                <i class="fas fa-plus fas-16 center"></i>
            </div>
        </label>
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
        ];?>
        <section class="suggest-slide suggest-slide-page">
            <header>
                <h1>Sugestões de Páginas pra Você</h1>
            </header>
            <nav class="clearfix">
                <ul class="clearfix">
                @forelse($dadosPage as $Paginas)
                        <?php $conta_page = 0;
                                   $verifica1 = 'A';
                                   $verifica = 'B';
                                   $seguidors = 0;
                                   $tamanho = 0;
                                   ?>
                                    <?php
                                        foreach ($dadosSeguida as  $val){
                                            if ($val->id == $Paginas->page_id) {
                                                $seguidors += 1;

                                            }
                                        }
                                    ?>
                                @forelse($dadosSeguida as $Seguida)
                                    <?php $tamanho = sizeof($dadosSeguida);?>
                                    <?php if ($Paginas->page_id == $Seguida->id) : ?>
                                        <?php if ($dadosSeguindo[0]['identificador_id_seguindo'] == $Seguida->identificador_id_seguindo) : ?>
                                            <?php $verifica1 = $Paginas->nome;?>
                                        <?php else: ?>
                                            <?php $verifica = $Paginas->nome;?>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <?php $conta_page += 1;?>
                                    <?php endif ?>
                                @empty
                                @endforelse                                
                                <?php if (($verifica1 != $verifica)  ) : ?>
                        <?php if (($verifica != 'B')  ) : ?>
                        <li class="li-component-suggest clearfix l-5" id="li-component-suggest-{{$Paginas->page_id}}">
                                    <div class="clearfix sugest_component_div">
                                        @if( !($Paginas->foto_page == null) )
                                            <div class="sugest_component circle clearfix">
                                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $Paginas->foto_page }}">
                                            </div>
                                        @else
                                            <div class="sugest_component circle clearfix">
                                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                            </div>
                                        @endif
                                    </div>
                                    <h1 class="name-suggest text-ellips">{{ $Paginas->nome }}</h1>
                                    <a href="" class="follow-suggest" ><div id="{{ $Paginas->page_id }}">seguir</div></a>
                                    <input type="hidden" id="conta_id" value="{{ $account_name[0]->conta_id }}" name="">
                                </li>
                            <?php endif ?>

                    <?php else: ?>

                    <?php endif ?>
                    <?php if (($conta_page == $tamanho)  ) : ?>
                        <li class="li-component-suggest clearfix l-5" id="li-component-suggest-{{$Paginas->page_id}}">
                                    <div class="clearfix sugest_component_div">
                                        @if( !($Paginas->foto_page == null) )
                                            <div class="sugest_component circle clearfix">
                                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $Paginas->foto_page }}">
                                            </div>
                                        @else
                                            <div class="sugest_component circle clearfix">
                                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                            </div>
                                        @endif
                                    </div>
                                    <h1 class="name-suggest text-ellips">{{ $Paginas->nome }}</h1>
                                    <a href="" class="follow-suggest" ><div id="{{ $Paginas->page_id }}">seguir</div></a>
                                    <input type="hidden" id="conta_id" value="{{ $account_name[0]->conta_id }}" name="">
                                </li>

                    <?php else: ?>

                    <?php endif ?>
                             @empty
                                <li class="li-component-aside-right clearfix">
                                <h1 class="l-5 name-page text-ellips">Nenhuma Página Encontrada</h1>
                                </li>
                            @endforelse
                </ul>
            </nav>
        </section>
        <div class="card br-10 card-page" id="card-profile-option">
            <nav class="option-profile-menu">
                <ul class="">
                    <li><a href="?post-container-post=images"><i class="far fa-images fas-32 center icon-hover-option-profile" style="font-size: 32px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=video"><i class="far fa-play-circle center icon-hover-option-profile" style="font-size: 32px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=post"><i class="fas fa-newspaper center icon-hover-option-profile" style="font-size: 32px;"></i><h1 class="menu-option-profile"></h1></a></li>
                </ul>
            </nav>
            <?php 
                $posts = [
                    [],[],[],
                    [],[],[],
                    [],[],[],
                    [],[],[],
                ];
            ?>
            <?php if (isset($_GET['post-container-post'])): ?>
                <?php if ($_GET['post-container-post'] == 'post'): ?>
                <div class="post-img-container-page post-page-container">
                    <?php foreach ($posts as $key => $value): ?>
                    
                    <?php endforeach ?>
                </div>
                <?php endif ?>
                <?php if ($_GET['post-container-post'] == 'video'): ?>
                <div class="post-video-container-page post-page-container">
                    <?php foreach ($posts as $key => $value): ?>
                    <div class="img-post">
                        <video> 
                            <source src="{{asset('storage/video/page/gilmariovemba - 7022207987552931078.mp4')}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <?php endforeach ?>
                </div>
                <?php endif ?>
                <?php if ($_GET['post-container-post'] == 'images'): ?>
                <div class="post-img-container-page post-page-container">
                    <?php foreach ($posts as $key => $value): ?>
                    <div class="img-post">
                        <img src="{{asset('storage/img/page/unnamed.jpg')}}" class="img-full">
                    </div>
                    <?php endforeach ?>
                </div>
                <?php endif ?>
            <?php else: ?>
            <div class="post-img-container-page post-page-container">
                <?php foreach ($posts as $key => $value): ?>
                <div class="img-post">
                    <img src="{{asset('storage/img/page/unnamed.jpg')}}" class="img-full">
                </div>
                <?php endforeach ?>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>
@stop

@extends('layouts.app')

@section('content')	
<div class="main" id="main-container-profile">
    <div class="card br-10 card-flex card-page">
        <div class="clearfix">
            <div class="img-profile-page-container clearfix l-5">
                <div class="img-profile-page circle l-5">
                    <img src="{{asset('storage/img/page/unnamed.jpg')}}" class="img-full circle">
                </div>
            </div>
            <div class="statistics-profile-page l-5 clearfix">
                <div class="statistics-profile-page-identify">
                    <h1>Delton e Ana</h1>
                    <h2>@deltonana</h2>
                </div>
                <div class="follwing-btn-container">
                    <button type="submit" class="follwing-btn">
                        Seguir
                    </button>
                </div>
                <div class="statistics-profile-page-component-container clearfix">
                    <div class="statistics-profile-page-component l-5">
                        <h1>123</h1>
                        <h2>Publicações</h2>
                    </div>
                    <div class="statistics-profile-page-component l-5">
                        <h1>123</h1>
                        <h2>A Seguir</h2>
                    </div>
                    <div class="statistics-profile-page-component l-5">
                        <h1>123</h1>
                        <h2>Seguindo</h2>
                    </div>
                </div>
                
            </div>
            <div class="edit-page-container">
                <button type="submit" class="follwing-btn" id="edit-page">
                    Editar Página
                </button>
            </div>
        </div>
        <div class="clearfix">
            <div class="description-couple">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
                </p>
            </div>
        </div>
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
                        <a href="" class="follow-suggest"><div>seguir</div></a>
                    </li>
                <?php endforeach ?>
                </ul>
            </nav>
        </section>
    </div>
</div>
@stop

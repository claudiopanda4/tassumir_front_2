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

                @if($checkUserStatus)
                @if ($hasUserManyPages):
                    <label for="target-profile-cover-page">
                        <div class="add-edit-profile circle">
                            <i class="fas fa-plus center" style="font-size: 10px;"></i>
                        </div>
                    </label>
                @endif
                @endif
            </div>
            <div class="statistics-profile-page l-5 clearfix">
                <div class="statistics-profile-page-identify">
                    <h1>{{ $page_content[0]->nome }}</h1>
                    <h2 class="lg-invisible-user-name">@<span></span>{{ $page_content[0]->nome }} </h2>
                </div>
                @if($isUserHost)
                    <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-container-lg-1">
                        <div class="statistics-profile-page-component l-5">
                            @if ($publicacoes > 1)
                            <h1>{{ $publicacoes }}</h1>
                            <h2 class="text-ellips">Publicações</h2>
                            @else
                            <h1>{{ $publicacoes }}</h1>
                            <h2 class="text-ellips">Publicação</h2>
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
                            <h2 class="text-ellips">Seguindo</h2>
                        </div>
                        <div class="statistics-profile-page-component l-5">
                            <h1>{{ $seguidores }}</h1>
                            <h2 class="text-ellips">Curtidas</h2>
                        </div>
                    </div>
                @else
                    <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-container-lg">
                        <div class="statistics-profile-page-component l-5">
                            @if ($publicacoes > 1)
                            <h1>{{ $publicacoes }}</h1>
                            <h2 class="text-ellips">Publicações</h2>
                            @else
                            <h1>{{ $publicacoes }}</h1>
                            <h2 class="text-ellips">Publicação</h2>
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
                            <h2 class="text-ellips">Seguindo</h2>
                        </div>
                        <div class="statistics-profile-page-component l-5">
                            <h1>{{ $seguidores }}</h1>
                            <h2 class="text-ellips">Curtidas</h2>
                        </div>
                    </div>
                    <div class="follwing-btn-container">
                        <button type="submit" class="follwing-btn">
                            Seguir
                        </button>
                    </div>
                @endif
            </div>
            <?php if (false): ?>
            <div class="edit-page-container">
                <button type="submit" class="follwing-btn" id="edit-page">
                    Editar Página
                </button>
            </div>
            <?php endif ?>
            
        </div>
        <?php if (false): ?>
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
        <?php endif ?>
        <div class="clearfix">
            <div class="description-couple">
                <h2 class="mobile-user-name">@<span></span><?php echo strtolower($page_content[0]->nome); ?></h2>
                <h2><span>Hugo Paulo</span> & <span>Jeremias Dembi</span></h2>
            </div>
            <div class="description-couple">
                <p> {{ $page_content[0]->descricao }} </p>
            </div>
        </div>
        @if($checkUserStatus)
        <?php if (!$hasUserManyPages): ?>
        <div class="edit-page-container-mobile">
            <button type="submit" class="follwing-btn">
                Editar Página
            </button>
        </div>    
        <?php endif ?>
        @endif
        @if($checkUserStatus)
        <label for="add-post-target" class="add-post-label">
            <div class="add-post circle">
                <i class="fas fa-plus fas-16 center"></i>
            </div>
        </label>
        @endif
        <section class="suggest-slide suggest-slide-page">
            <header>
                <h1>Sugestões de Páginas pra Você</h1>
            </header>
            <nav class="clearfix">
                <ul class="clearfix">
                <?php //foreach ($suggest_page as $key => $value): ?>
                @for($i = 0; $i < count($sugerir); $i++)
                    <li class="li-component-suggest clearfix l-5">
                        <div class="clearfix sugest_component_div">
                            @if($sugerir[$i]->foto != null)
                                <div class="sugest_component circle clearfix">
                                    <img class="img-full circle" src="{{asset('storage/img/page/' . $sugerir[$i]->foto)}}">
                                </div>
                            @else
                                <div class="sugest_component circle clearfix">
                                    <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                </div>
                            @endif
                        </div>
                        <h1 class="name-suggest text-ellips">{{ $sugerir[$i]->nome }}</h1>
                        <a href="" class="follow-suggest"><div>seguir</div></a>
                    </li>
                @endfor
                <?php //endforeach ?>

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
                    
                    @for($i = 0; $i < count($allPosts); $i++)
                        @if(isset($allPosts[$i]['postVideos']))
                            <div class="img-post">
                                <video> 
                                    <source src="{{asset('storage/video/page/' . $allPosts[$i]['postVideos'])}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
                    @endfor
                </div>
                <?php endif ?>

                <?php if ($_GET['post-container-post'] == 'images'): ?>
                    <div class="post-img-container-page post-page-container">

                        @for($i = 0; $i < count($allPosts); $i++)
                            @if(isset($allPosts[$i]['postImages']))
                                <div class="img-post">
                                    <img src="{{asset('storage/img/page/' . $allPosts[$i]['postImages'])}}" class="img-full">
                                </div>
                            @endif
                        @endfor

                    </div>
                <?php endif ?>

            <?php else: ?>
                <div class="post-img-container-page post-page-container">

                        @for($i = 0; $i < count($allPosts); $i++)
                            @if(isset($allPosts[$i]['postImages']))
                                <div class="img-post">
                                    <img src="{{asset('storage/img/page/' . $allPosts[$i]['postImages'])}}" class="img-full">
                                </div>
                            @endif
                        @endfor

                    </div>
            <?php endif ?>
        </div>
    </div>
</div>
@stop

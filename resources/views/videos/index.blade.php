@extends('layouts.app_tassumir_video')

@section('content')
<div class="main">
<header class="card more-following" id="card-more-following">
    <ul>
        <li>

        </li>
    </ul>
</header>
<div>
    <nav class="nav-video-option">
        <ul>
            <a href="">
                <li>Mais Assistidos</li>
            </a>
            <a href="">
                <li>Mais Curtidos</li>
            </a>
            <a href="">
                <li>Mais Recentes</li>
            </a>
            <a href="">
                <li>Guardados</li>
            </a>
        </ul>
    </nav>
    <div class="video-container-component">
        <div>
            <?php 
            $videos = [[],[]];
            foreach ($videos as $key => $value): ?>
            <div class="video-container clearfix">
                <div class="identify-video mb-video-lg clearfix" id="mb-video-lg-none">
                    <div class="header-img-post-video circle l-5">
                        <img class="img-full circle" src="{{asset('storage/img/page/1634227999_c8b1a0d8f9218b0a57828b71eb6909bd.jpg')}}">
                    </div>
                    <a href=""><h1 class="l-5">Siene e Brain</h1></a>
                    <div class="last-component clearfix r-5">
                            <label for=<?php echo "more-option-0"; ?>>
                                <i class="fas fa-ellipsis-h fa-14 fa-option"></i>
                            </label>
                            <input type="checkbox" name="" id=<?php echo "more-option-"; ?> class="hidden">
                            <ul class="clearfix more-option-post">
                                <li>
                                    <a href="">Editar</a>
                                </li>
                                <li>
                                    <a href="" class="ocultar_post" id="">Ocultar Publicação</a>
                                </li>
                                <li>
                                    <a href="" class="delete_post" id="">Apagar Publicação</a>
                                </li>
                                <li>
                                    <a href="">Denunciar</a>
                                </li>
                                <li>
                                    <a href="">Copiar Link</a>
                                </li>
                            </ul>
                        </div>
                </div>
                <div class="text-video-container" id="text-video-container-mobile">
                    <p>Olá amigos, tudo bem...</p>
                </div>
                <div class="l-5 tv-video-cont">
                    <video class="center" controls autoplay src="{{asset('storage/video/page/1638350765_f3f75e8dcf710b46e0db5e85e0dd5cba.mp4')}}">
                        <source src="{{asset('storage/video/page/1638350765_f3f75e8dcf710b46e0db5e85e0dd5cba.mp4')}}" type="type/mp4">
                    </video>
                </div>
                <div class="l-5" id="mb-video-lg-display">
                    <div class="identify-video mb-video-lg clearfix">
                        <div class="header-img-post-video circle l-5">
                            <img class="img-full circle" src="{{asset('storage/img/page/1634227999_c8b1a0d8f9218b0a57828b71eb6909bd.jpg')}}">
                        </div>
                        <a href=""><h1 class="l-5">Siene e Brain</h1></a>
                        <div class="last-component clearfix r-5">
                            <label for=<?php echo "more-option-0"; ?>>
                                <i class="fas fa-ellipsis-h fa-14 fa-option"></i>
                            </label>
                            <input type="checkbox" name="" id=<?php echo "more-option-"; ?> class="hidden">
                            <ul class="clearfix more-option-post">
                                <li>
                                    <a href="">Editar</a>
                                </li>
                                <li>
                                    <a href="" class="ocultar_post" id="">Ocultar Publicação</a>
                                </li>
                                <li>
                                    <a href="" class="delete_post" id="">Apagar Publicação</a>
                                </li>
                                <li>
                                    <a href="">Denunciar</a>
                                </li>
                                <li>
                                    <a href="">Copiar Link</a>
                                </li>
                            </ul>
                        </div>
                    </div>   
                    <div class="content-video-tass">
                        <div>
                            <div class="text-video-container" id="text-video-container-lg">
                                <p>Olá amigos, tudo bem...</p>
                            </div>    
                            <div class="comment-users-tass">
                                <div class="comment-users" id="comment-users-2">
                                    <div class="comment-user-container">
                                      <div class="user-identify-comment">
                                        <div class="profille-img">
                                          <img class="img-full circle" src="http://127.0.0.1:8000/storage/img/page/1638350696_eca3047fb51be219ecd3cb5691558b72.jpg">
                                        </div>
                                        <div class="comment-user-comment">
                                            <h1 class="user">Famosos em Relacionamentos</h1>
                                            <p class="">OLá</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="comment-user-container comment-user-container-react">
                                        <a href="" class="comment-like-a" id="on|1">
                                            <i class="fas fa-heart fa-12 unliked" id="off|1|i"></i>
                                            </a>
                                    </div>
                                    <a href="" class="comment-like-a" id="on|1"></a>
                                </div>
                            </div>
                        </div>
                        <nav class="row interaction-numbers">
                            <ul class="">
                                <li>
                                    <i class="fas fa-heart fa-16" style="display: inline-flex; margin-right: 5px; color: red;"></i><a href="" id="likes-qtd-8d9c28df-cc82-4741-a2ec-cf830b9e3d7c">1 reacções</a>
                                </li>
                                <li>
                                    <?php $uuid = 'f44de45f-332c-40bd-aa1a-ac74b3cf1dbc'; ?>
                                    <a href="{{route('post_index', $uuid)}}?time_video=1.23" id="comment-qtd-1">0 comentários</a>
                                </li>
                            </ul>
                        </nav>
                        <nav class="row clearfix interaction-user">
                            <ul class="row clearfix ul-interaction-user">
                                <li class="l-5">
                                    <div class="content-button">
                                        <a href="" class="like-a" id="on|8d9c28df-cc82-4741-a2ec-cf830b9e3d7c">
                                                                                <i class="far fa-heart center fa-16 unliked" id="off|8d9c28df-cc82-4741-a2ec-cf830b9e3d7c|i"></i>
                                            <h2 id="off|8d9c28df-cc82-4741-a2ec-cf830b9e3d7c|h2">Like</h2>
                                                                            </a>
                                    </div>
                                </li>
                                <li class="l-5">
                                    <div class="content-button comment-send-post" id="comment-1">
                                        <a href="" id="comment_a-1">
                                            <i class="far fa-comment-alt center fa-16" id="comment_i-1"></i>
                                            <h2>Comentar</h2>
                                        </a>
                                    </div>
                                </li>
                                <li class="r-5">
                                    <div class="content-button">
                                        <a href="">
                                            <i class="far fa-share-square fa-16"></i>
                                            <h2>Partilhar</h2>
                                        </a>
                                    </div>
                                </li>
                                                        <li class="r-5" id="savepost-1">
                                    <div class="content-button">
                                        <a href="" class="savepost" id="savepost-1">
                                            <i class="far fa-bookmark center fa-16" id="savepost-1"></i>
                                            <h2 id="savepost-1">Guardar</h2>
                                        </a>
                                    </div>
                                </li>
                                                      </ul>
                        </nav>
                        <div class="comment-send clearfix" id="comment-send-1">
                            <div class="img-user-comment l-5">
                                <img class="img-full circle" src="http://127.0.0.1:8000/storage/img/users/1638350961_55d3cdb3eb265700cf0dbd4b1d782125.jpg">
                            </div>
                            <div class="input-text comment-send-text l-5 clearfix">
                                <input type="text" class="" name="comentario" id="comentario-1" placeholder="O que você tem a dizer?">
                                <div class="r-5 ">
                                    <a href="" class="comentar-a" id="1">
                                        <i class="far fa-paper-plane fa-20 fa-img-comment" id="1"></i>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                </div>
            </div>    
            <?php endforeach ?>
            
        </div>    
    </div>
    
</div>
@stop

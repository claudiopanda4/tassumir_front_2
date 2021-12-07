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
                <div class="text-video-container">
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
                            <div class="text-video-container">
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

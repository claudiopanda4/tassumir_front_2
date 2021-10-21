@extends('layouts.app')

@section('content')
<div class="main">
    <div class="card br-10">
            <div class="post">
                <header class="clearfix">
                    <div class="first-component clearfix l-5">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src="http://127.0.0.1:8000/storage/img/page/unnamed.jpg">
                        </div>
                        <div class="page-identify l-5 clearfix">
                            <a href="http://127.0.0.1:8000/couple_page/3e55d378-305f-403d-b996-ae3dac4f754b"><h1 class="text-ellips">Destacados</h1></a>
                            <div class="info-post clearfix">
                                <span class="time-posted l-5">50 min</span><div id="seguir"></div>
                            </div>
                        </div>
                    </div>
                    <div class="last-component clearfix r-5">
                        <label for="more-option-1">
                            <i class="fas fa-ellipsis-h fa-15 fa-option"></i>
                        </label>
                        <input type="checkbox" name="" id="more-option-1" class="hidden">
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
                        <p>Vocês já ouviram o que aconteceu com o Nerú?</p>
                                                <div class="post-cover">
                            <img class="img-full" src="http://127.0.0.1:8000/storage/img/page/1634633171_f20194499b45f7c700ac866d83206616.jpg">
                        </div>
                                          </div>
                </div>
                <nav class="row interaction-numbers">
                    <ul class="">
                        <li>
                            <i class="fas fa-heart fa-16" style="display: inline-flex; margin-right: 5px; color: red;"></i><a href="" id="likes-qtd-2">1 reacções</a>
                        </li>
                        <li>
                            <a href="" id="comment-qtd-2">0 comentários</a>
                        </li>
                                            </ul>
                </nav>
                <nav class="row clearfix interaction-user">
                    <ul class="row clearfix ul-interaction-user">
                        <li class="l-5">
                            <div class="content-button">
                                                                <a href="" class="like-a" id="off-2">
                                      <i class="far fa-heart center fa-16" id="off-2-i"></i>
                                      <h2 id="off-2-h2">Like</h2>
                                  </a>
                                                              </div>
                        </li>
                        <li class="l-5">
                            <div class="content-button comment-send-post" id="comment-2">
                                <a href="" id="comment_a-2">
                                    <i class="far fa-comment-alt center fa-16" id="comment_i-2"></i>
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
                        <li class="r-5">
                            <div class="content-button">
                                <a href="">
                                    <i class="far fa-bookmark center fa-16"></i>
                                    <h2>Guardar</h2>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="comment-send clearfix" id="comment-send-2">
                    <div class="img-user-comment l-5">
                        <img class="img-full circle" src="http://127.0.0.1:8000/storage/img/users/anselmoralph.jpg">
                    </div>
                    <div class="input-text comment-send-text l-5 clearfix">
                        <input type="text" class="" name="comentario" id="comentario-2" placeholder="O que você tem a dizer?">
                        <div class="r-5 ">
                            <a href="" class="comentar-a" id="2">
                                <i class="far fa-paper-plane fa-20 fa-img-comment" id="2"></i>
                            </a>
                        </div>
                        <div class="r-5 " id="">
                            <a href="">
                                <i class="far fa-images fa-20 fa-img-comment"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="comment-users comment-users-own" id="comment-users-own-2">
                    <div class="comment-user-container">
                        <div class="user-identify-comment">
                            <div class="profille-img">
                                <img class="img-full circle" src="http://127.0.0.1:8000/storage/img/users/anselmoralph.jpg">
                            </div>
                        </div>
                        <div class="comment-user-comment">
                            <p class="text-ellips" id="comment-own-2">Amo muito esse casal</p>
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react">
                        <i class="far fa-heart fa-12"></i>
                    </div>
                </div>
                <div class="comment-users">
                    <div class="comment-user-container">
                        <div class="user-identify-comment">
                            <div class="profille-img">
                                <img class="img-full circle" src="http://127.0.0.1:8000/storage/img/users/anselmoralph.jpg">
                            </div>
                            <h2 class="text-ellips">Domingos</h2>
                        </div>
                        <div class="comment-user-comment">
                            <p class="text-ellips">Amo muito esse casal</p>
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react">
                        <i class="far fa-heart fa-12"></i>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
</div>
@stop
@extends('layouts.app')

@section('content')
<div class="main">
    <input type="hidden" id="comment_index" value=<?php echo md5("1"); ?>>
    <input type="hidden" id="loaded-initial-comments" value="none">
    <div class="card br-10" id="card-post-id-index">
        <div id="m_post_{{$ident_page}}" class='card br-10 post-video'>
            <div class="post post-view post-video" id="post_view_{{$ident_page}}">
                <header class="header-post-page clearfix">
                    <div class="first-component clearfix l-5">
                        <div class="page-cover circle l-5">
                            <?php if ($post->page_cover == null): ?>
                                <img class="img-full circle" src="{{asset('css/uicons/page_icon.jpg')}}" id="page-cover-post_{{$ident_page}}">
                            <?php else: ?>
                                <img class="img-full circle" src="{{asset('storage/img/page/') . '/' . $post->page_cover}}" id="page-cover-post_{{$ident_page}}">
                            <?php endif ?>
                            
                        </div>   
                        <?php if (false): ?>
                            <div class="distinctiv distinctiv-">
                                <h1 class="center">2c</h1>
                            </div>
                        <?php elseif (false): ?>
                            <div class="distinctiv distinctiv-casamento-igreja">
                                <h1 class="center">ci</h1>
                            </div>
                        <?php elseif (false): ?>
                            <div class="distinctiv distinctiv-namoro">
                                <h1 class="center">na</h1>
                            </div>
                        <?php elseif (false): ?>
                            <div class="distinctiv distinctiv-apresentado">
                                <h1 class="center">ap</h1>
                            </div>
                        <?php elseif (false): ?>
                            <div class="distinctiv distinctiv-pedido">
                                <h1 class="center">p</h1>
                            </div>
                        <?php endif ?>
                        <input type="hidden" id="post_comment-qtd" value="0">
                        <input type="hidden" id="post_comment-verify" value="1">
                        <div class="page-identify l-5 clearfix">
                            <a href="{{$post->page_uuid}}" id="a-page-name-post_{{$ident_page}}"><h1 class="text-ellips" id="page-name-post_{{$ident_page}}">{{$post->page_name}}</h1></a>
                            <div class="info-post clearfix">
                                <span class="time-posted l-5" id="time-posted_{{$ident_page}}">{{$post->data}}</span>
                                <div class="follow-propriets seguir-a_{{$ident_page}}" id="seguir-1_{{$ident_page}}">
                                    <div class="load-icon-react invisible-component center" id="loader-id-icon-post_{{$ident_page}}">
                                        <img class="img-full" src="{{asset('css/uicons/aguarde.gif')}}">
                                    </div>
                                    <span class="seguir-span_{{$ident_page}}" id="seguir-span_{{$ident_page}}"><a href="" class="seguir-a r-5" id="seguir-a_{{$ident_page}}"></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="target-option-post" class="target-options" id="target-option-post_{{$ident_page}}">
                        <i class="fas fa-ellipsis-h fa-14 fa-option" id="target-option-post-i_{{$ident_page}}"></i>
                    </label>
                </header>
                <input type="hidden" id="ident-post-page" value='{{$ident_page}}'>
                <div class="card-post">
                    <div class="">
                        <p class="" id="p-post_{{$ident_page}}">{{$post->descricao}}</p>
                        <?php if ($post->formato_id == 1): ?>
                            <div class="video-post post-video" id="video-post_{{$ident_page}}">
                                <!--<img class="loader_button center" src="{{asset('css/uicons/aguarde.gif')}}" id="loader_button_{{$ident_page}}">
                                <img class="loader_icon center" src="{{asset('css/uicons/loading.gif')}}" id="loader_icon_{{$ident_page}}">-->
                                <video preload="metadata" src="{{asset('storage/video/page/') . '/' . $post->file}}" class="video-post-video" id="video_{{$ident_page}}" autoplay controls>
                                    <source id="video-post-link_{{$ident_page}}" src="{{asset('storage/video/page/') . '/' . $post->file}}">
                                    Your browser does not support the video tag.
                                </video>
                                <input type="hidden" name="" value="post_view_" id="watch-video_{{$ident_page}}">
                                <input type="hidden" name="" id="vid_{{$ident_page}}">
                                <input type="hidden" name="" id="vid-load_{{$ident_page}}">
                                <input type="hidden" name="" id="has-video_{{$ident_page}}">
                                <input type="hidden" name="" id="video-post-time_{{$ident_page}}">
                                <input type="hidden" name="" id="video-post-time-all_{{$ident_page}}">
                                <input type="hidden" name="" id="cover-post-load_{{$ident_page}}">
                            </div>
                        <?php elseif ($post->formato_id == 2): ?>
                            <div class="post-cover post-cover-imgless post-cover-post-index post-cover-post-index-post" id="post-cover-post-index_{{$ident_page}}">
                                <img class="img-full" src="{{asset('storage/img/page/') . '/' . $post->file}}" id="cover-post-index_{{$ident_page}}">
                            </div>                        
                        <?php endif ?>
                    </div>
                </div>
                <nav class="row interaction-numbers">
                    <ul class="interaction-numbers_{{$ident_page}}">
                        <li>
                            <a href="" id="likes-qtd_{{$ident_page}}">reacções</a>
                        </li>
                        <li>
                            <a class="comment-single-page-link" href="" id="comment-post_{{$ident_page}}">comentários</a>
                        </li>
                    </ul>
                </nav>
                <nav class="row clearfix interaction-user">
                    <ul class="row clearfix ul-interaction-user">
                        <li class="l-5">
                            <div class="content-button">
                                <div class="load-icon-react invisible-component center" id="loader-id-icon_{{$ident_page}}">
                                    <img class="img-full" src="{{asset('css/uicons/aguarde1.gif')}}">
                                </div>
                                <a href="" class="like-a" id="reaction-id-a_{{$ident_page}}">
                                    <i class="far fa-heart center fa-16 unliked" id="off-id-i_{{$ident_page}}"></i>
                                    <h2 id="reaction-id-text-">Like</h2>
                                </a>
                            </div>
                        </li>
                        <li class="l-5">
                            <div class="content-button comment-send-post" id="comment_{{$ident_page}}">
                                <a href="" id="comment_a_{{$ident_page}}">
                                    <i class="far fa-comment-alt center fa-16" id="comment_i_{{$ident_page}}"></i>
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
                        <li class="r-5" id="savepost_{{$ident_page}}">
                            <div class="content-button">
                                <a href="" class="save-post" id="savepost-a_{{$ident_page}}">
                                    <i class="far fa-bookmark center fa-16" id="savepost-i_{{$ident_page}}"></i>
                                    <h2 id="savepost_{{$ident_page}}">Guardar</h2>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="comment-send clearfix" id="comment-send_{{$ident_page}}">
                    <div class="img-user-comment l-5 circle">
                        <img class="img-24 center circle invisible-component" src="" id="comment-send-profile_{{$ident_page}}">
                    </div>
                    <div class="input-text comment-send-text l-5 clearfix">
                        <input type="text" class="" name="comentario" id="comentario_{{$ident_page}}" placeholder="O que você tem a dizer?">
                        <div class="r-5 ">
                            <a href="" class="comentar-a" id="comentario-a_{{$ident_page}}">
                                <i class="fas fa-paper-plane fa-20 fa-img-comment" id="comentario-i_{{$ident_page}}"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="comment-users comment-users-own" id="comment-users-own_{{$ident_page}}">
                    <div class="comment-user-container">
                        <div class="user-identify-comment user-identify-comment-feed">
                          <div class="profille-img">
                            <img id="comment-user-profile_{{$ident_page}}" class="img-full circle invisible" src="">
                          </div>
                        </div>
                        <div class="comment-user-comment comment-user-comment-feed">
                            <p class="text-ellips" id="comment-own_{{$ident_page}}"></p>
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react" name="novo-comment">

                    </div>
                </div>

                  <div class="comment-users comment-users-own-send invisible-component clearfix" id="comment-users_{{$ident_page}}">

                    <div class="comment-user-container l-5">
                        <div class="user-identify-comment user-identify-comment-feed l-5">
                            <div class="profille-img">
                                <img class="img-full circle invisible" id="user-identify-comment-feed_{{$ident_page}}">
                            </div>
                            <h2 class="text-ellips"></h2>
                        </div>
                        <div class="comment-user-comment comment-user-comment-feed l-5">
                            <p class="" id="comment-user-comment-feed_{{$ident_page}}"></p>
                        </div>
                        <div class="loader_button" id="loader_button_comment_{{$ident_page}}">
                            <img style="width: 30px;" class=" center" src="{{asset('css/uicons/loading.gif')}}">
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react r-5">
                        <a href="" class="comment-a-react" id="comment-like-a_{{$ident_page}}">
                            <i class="far fa-heart fa-12 unliked" id="comment-like-i_{{$ident_page}}"></i>
                        </a>
                    </div>
                </div>
                <input type="hidden" id="id_click" value="none;0" name="">
            </div>
        </div> 
        <?php $key = 0; while($key < 150){ ?>
            <div class="comment-users comment-blade invisible-component" id="comment-users-{{$key}}">
                <div class="comment-user-container">
                    <div class="user-identify-comment">
                        <a href="" id="link-profile-commenter">
                            <div class="profille-img">
                                <img class="img-full circle" id="profille-img-commenter-{{$key}}" src="">
                            </div>
                        </a>
                        <div class="comment-user-comment">
                            <a href="" id="link-ident-commenter-{{$key}}">
                                <h1 class="user" id="user-commenter-{{$key}}"></h1>
                            </a>
                            <p class="" id="description-comment-{{$key}}"></p>
                        </div>
                    </div>
                </div>
                <div class="comment-user-container comment-user-container-react">
                    <a href="" class="comment-like-a comment-a-react" id="comentario-reaction-post-{{$key}}">
                        <i class="far fa-heart fa-12 unliked" id="reaction-id-comment-user-{{$key}}"></i>
                    </a>
                    <div class="reaction-comment-user-qtd" id="reaction-id-comment-user-qtd-{{$key}}">
                        
                    </div>
                </div>
            </div>
        <?php $key++; } ?>
    </div>
</div>
<script type="text/javascript">
    let description = $('#p-post_' + $('#ident-post-page').val()).text(), text;
    text = "";
    console.log(description);
    for (var i = 0; i <= description.length - 1; i++) {
        if (description[i] == '\n') {
            text = text + '\n' + description[i];    
        } else {
            text = text + '' + description[i];
        }
    }
    console.log(text);
    $('#p-post_' + $('#ident-post-page').val()).text(text);
</script>
@stop

@extends('layouts.app')

@section('content')
<div class="main" id="main-home" name="main-home">
<header class="card more-following" id="card-more-following">
    <ul>
        <li>

        </li>
      </ul>
</header>
<header class="card br-10 stories stories-about-talking" id="stories-card">
            <header class="header-stories">
                <h1>O que está a pipocar...</h1>
            </header>
            <input type="hidden" id="home-page-checked" value=<?php echo md5("OKAY_HOME") ?>>
            <input type="hidden" id="post_loading" value=''>
            <input type="hidden" id="restart" value='on'>
            <input type="hidden" id="posts-following" value="0">
            <input type="hidden" id="loading-finished" value="1">
            <input type="hidden" id="loading-finished-video" value="none">
            <nav>
                <ul class="clearfix">
                    <?php $i = 0; while ($i < 20) { ?>
                    <div class="container-li-dest l-5">
                        <li class="li-component-stories l-5" id="li-component-stories-{{$i}}">
                            <a href="" id="a-stories-dest-{{$i}}">
                                <div class="identify-cover circle">
                                    <img class="img-full circle invisible" id="li-component-stories-img-profile-{{$i}}">
                                </div>
                                <img class="img-back-stories center invisible" id="li-component-stories-img-back-{{$i}}"> 
                                <div  id="li-component-stories-cover-video-container-{{$i}}">
                                   <img  id="li-component-stories-cover-video-{{$i}}" class="img-full circle foto-page-video invisible-component"> 
                                </div>
                                <div class="headline">
                                    <h2 class="center" id="headline-stories-{{$i}}"></h2>
                                </div>
                            </a>
                        </li>
                        <h1 class="text-ellips name-page-dest l-5" id="name-page-dest-{{$i}}" style="font-size: 10px;"></h1>
                    </div>
                    <?php $i++; } ?>
                </ul>
            </nav>
        </header>
        <input type="hidden" id="posts" name="" value="0">
        <div class="refresh-profile-photo clearfix component-card invisible-component" id="relationship-requests">
            <div class="profile-photo-container alert-component-card l-5">
                <img class="img-30 center" src="{{asset('css/uicons/fire_in_my_heart.png')}}">
            </div>
            <div class="content-profile-photo l-5">
                <h1>Tens pedidos de <span style="font-weight: bolder;">RELACIONAMENTOS</span> por responder. Aceite ou rejeite</h1>
                <a href="">
                    <div class="button-default-tassumir">
                        <h3 class="button-default-tassumir-text" style="margin-top: 0; font-weight: bolder;">Ver Pedidos</h3>
                    </div>
                </a>
            </div>
        </div>
    <div class="" id="div_father_post" name="div_father_post">
        <?php $key = 0; while($key < 78){ ?>
        <?php if ($key == 1): ?>
            <div class="refresh-profile-photo clearfix invisible-component" id="refresh-profile-photo-id">
                <div class="profile-photo-container l-5">
                    <img class="img-28 center" src="{{asset('css/uicons/about_tips.png')}}">
                </div>
                <div class="content-profile-photo l-5">
                    <h1>Ajude as pessoas a conhecerem mais você. Adicione uma foto de perfil</h1>
                    <label for="target-profile-cover" id="profile-cover-alert-no-img">
                        <div class="options-profile-btn options-profile-btn-center profile-item-center" id="options-profile-btn-profile">
                            <h3 class="edit-profile-mobile center" style="margin-top: 0;">Actualizar foto de Perfil</h3>
                        </div>
                    </label>
                </div>
            </div>            
        <?php endif ?>
        <?php if ($key == 0 || $key == 2 || $key == 9): ?>
            <div class="refresh-profile-photo clearfix invisible-component alert-info-about-us" id="alert-info-about-us-{{$key}}">
                <div class="profile-photo-container l-5">
                    <img class="img-28 center" src="{{asset('css/uicons/info_tassumir.png')}}">
                </div>
                <div class="content-profile-photo l-5">
                    <h1 id="content-p-{{$key}}">No Tassumir você regista o seu relacionamento publicamente, ganha dinheiro, segurança e aumenta a fidelidade no casal. Assuma agora o seu relacionamento e comece a ganhar.</h1>
                    <label <?php if ($key == 0 || $key == 9){echo 'for="target-alert-tassumir"';}else{echo 'for="target-alert-info"';} ?> id="target-alert-tassumir-{{$key}}" class="profile-alert-tassumir">
                        <div class="options-profile-btn options-profile-btn-center profile-item-center options-alert-btn-feed" id="options-profile-btn-couple">
                            <h3 class="edit-profile-mobile center" style="margin-top: 0;" id="btn-alert-info-{{$key}}">Assumir Agora o Relacionamento</h3>
                        </div>
                    </label>
                </div>
            </div>            
        <?php endif ?>
        <?php if ($key == 3 || $key == 25): ?>
                <section class="suggest-slide invisible-component" id="sugest_index_{{$key}}">
                    <header>
                        <h1>Sugestões pra você</h1>
                    </header>
                    <nav class="clearfix">
                        <ul class="clearfix"> 
                        <?php $key_ = 0; while ($key_ < 8) {?>
                                <li class="li-component-suggest clearfix l-5 sugest_page" id="li-component-suggest-index-{{$key_}}">
                                    <div class="clearfix sugest_component_div" id="sugestcomponentdiv_{{$key}}">
                                        <div class="sugest_component circle clearfix">
                                            <img class="img-full circle" id="cover-suggest-index-page-{{$key_}}">
                                        </div>
                                    </div>
                                    <div class="load-icon-react invisible-component center" id="loader-id-icon-post-index-{{$key}}">
                                        <img class="img-full" src="{{asset('css/uicons/aguarde.gif')}}">
                                    </div>
                                    <a href="" id="a-name-suggest-index-page-{{$key_}}"><h1 class="name-suggest text-ellips" id="name-suggest-index-page-{{$key_}}"></h1></a>
                                    <a href="" class="seguir-a seguir_index"><div id="seguir-index_{{$key_}}">seguir</div></a>
                                    <input type="hidden" id="link_page_{{$key_}}">
                                </li>
                        <?php $key_++; } ?>
                        </ul>
                    </nav>
                </section>
        <?php endif ?>
            <div id="m_post-{{$key}}" <?php if ($key >= 144 && $key < 146) {echo "class='card br-10 post-video'";} else {echo "class='card br-10 post-video invisible-post'";}
             ?>>
            <div class="post post-view post-video" id="post_view_{{$key}}">
                <header class="clearfix">
                    <div class="first-component clearfix l-5">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle invisible-component" id="page-cover-post-{{$key}}">
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
                        <div class="page-identify l-5 clearfix">
                            <a href="" id="a-page-name-post-{{$key}}"><h1 class="text-ellips" id="page-name-post-{{$key}}"></h1></a>
                            <div class="info-post clearfix">
                                <span class="time-posted l-5" id="time-posted-{{$key}}"></span>
                                <div class="follow-propriets seguir-a-{{$key}}" id="seguir-1-{{$key}}">
                                    <div class="load-icon-react invisible-component center" id="loader-id-icon-post-{{$key}}">
                                        <img class="img-full" src="{{asset('css/uicons/aguarde.gif')}}">
                                    </div>
                                    <span class="seguir-span-{{$key}}" id="seguir-span-{{$key}}"><a href="" class="seguir-a r-5" id="seguir-a-{{$key}}"></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="target-option-post" class="target-options" id="target-option-post-{{$key}}">
                        <i class="fas fa-ellipsis-h fa-14 fa-option" id="target-option-post-i-{{$key}}"></i>
                    </label>
                </header>
                <div class="card-post">
                    <div class="">
                        <p class="invisible-component" id="p-post-{{$key}}"></p>
                        <input type="hidden" id="p-post-more-{{$key}}" name="">
                        <div class="post-cover post-cover-imgless post-cover-post-index" id="post-cover-post-index-{{$key}}">
                            <img class="img-full invisible-component" id="cover-post-index-{{$key}}">
                        </div>
                        <div class="video-post post-video invisible-component" id="video-post-{{$key}}">
                            <img class="play_button center invisible-component" src="{{asset('css/uicons/play_button.png')}}" id="play_button_{{$key}}">
                            <!--<img class="loader_button center" src="{{asset('css/uicons/aguarde.gif')}}" id="loader_button_{{$key}}">-->
                            <!--<img class="loader_button center invisible-component" src="{{asset('css/uicons/aguarde.gif')}}" id="loader_button_{{$key}}">-->
                            <img class="loader_icon center" src="{{asset('css/uicons/loading_blue.gif')}}" id="loader_icon_{{$key}}">
                            <video preload="metadata" class="video-post-video invisible-component" id="video_{{$key}}" loop>
                                <source id="video-post-link-{{$key}}">
                                Your browser does not support the video tag.
                            </video>
                            <div class="video-post-video-cover-container" id="video-post-video-cover-container-{{$key}}">
                                <img src="" class="video-post-video" id="thumb_{{$key}}">
                            </div>
                            <input type="hidden" name="" value="post_view_" id="watch-video-{{$key}}">
                            <input type="hidden" name="" id="vid-{{$key}}">
                            <input type="hidden" name="" id="vid-load-{{$key}}">
                            <input type="hidden" name="" id="vid-cover-load-{{$key}}">
                            <input type="hidden" name="" id="has-video-{{$key}}">
                            <input type="hidden" name="" id="video-post-time-{{$key}}">
                            <input type="hidden" name="" id="video-post-time-all-{{$key}}">
                            <input type="hidden" name="" id="cover-post-load-{{$key}}">
                            <input type="hidden" name="" id="insert-video-{{$key}}">
                            <input type="hidden" name="" id="video-just-clicked-{{$key}}" value="none">
                        </div>
                    </div>
                </div>
                <nav class="row interaction-numbers">
                    <ul class="interaction-numbers-{{$key}}">
                        <li>
                            <a href="" id="likes-qtd-{{$key}}">reacções</a>
                        </li>
                        <li>
                            <a class="comment-single-page-link comment_tv-post" href="" id="comment_-post-{{$key}}">comentários</a>
                        </li>
                    </ul>
                </nav>
                <nav class="row clearfix interaction-user">
                    <ul class="row clearfix ul-interaction-user">
                        <li class="l-5">
                            <div class="content-button">
                                <div class="load-icon-react invisible-component center" id="loader-id-icon-{{$key}}">
                                    <img class="img-full" src="{{asset('css/uicons/aguarde1.gif')}}">
                                </div>
                                <a href="" class="like-a" id="reaction-id-a-{{$key}}">
                                    <i class="far fa-heart center fa-16 unliked" id="off-id-i-{{$key}}"></i>
                                    <h2 id="reaction-id-text-">Like</h2>
                                </a>
                            </div>
                        </li>
                        <li class="l-5">
                            <div class="content-button comment-send-post" id="comment-{{$key}}">
                                <a href="" id="comment_a-{{$key}}">
                                    <i class="far fa-comment-alt center fa-16" id="comment_i-{{$key}}"></i>
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
                        <li class="r-5" id="savepost-{{$key}}">
                            <div class="content-button">
                                <a href="" class="save-post" id="savepost-a-{{$key}}">
                                    <i class="far fa-bookmark center fa-16" id="savepost-i-{{$key}}"></i>
                                    <h2 id="savepost-{{$key}}">Guardar</h2>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="comment-send clearfix" id="comment-send-{{$key}}">
                    <div class="img-user-comment l-5 circle">
                        <img class="img-24 center circle" id="comment-send-profile-{{$key}}">
                    </div>
                    <div class="input-text comment-send-text l-5 clearfix">
                        <input type="text" class="" name="comentario" id="comentario-{{$key}}" placeholder="O que você tem a dizer?">
                        <div class="r-5 ">
                            <a href="" class="comentar-a" id="comentario-a-{{$key}}">
                                <i class="fas fa-paper-plane fa-20 fa-img-comment" id="comentario-i-{{$key}}"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="comment-users comment-users-own" id="comment-users-own-{{$key}}">
                    <div class="comment-user-container">
                        <div class="user-identify-comment user-identify-comment-feed">
                          <div class="profille-img">
                            <img id="comment-user-profile-{{$key}}" class="img-full circle invisible" src="">
                          </div>
                        </div>
                        <div class="comment-user-comment comment-user-comment-feed">
                            <p class="text-ellips" id="comment-own-{{$key}}"></p>
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react" name="novo-comment">

                    </div>
                </div>

                  <div class="comment-users comment-users-own-send invisible-component clearfix" id="comment-users-{{$key}}">

                    <div class="comment-user-container l-5">
                        <div class="user-identify-comment user-identify-comment-feed l-5">
                            <div class="profille-img">
                                <img class="img-full circle invisible" id="user-identify-comment-feed-{{$key}}">
                            </div>
                            <h2 class="text-ellips"></h2>
                        </div>
                        <div class="comment-user-comment comment-user-comment-feed l-5">
                            <p class="" id="comment-user-comment-feed-{{$key}}"></p>
                        </div>
                        <div class="loader_button" id="loader_button_comment_{{$key}}">
                            <img style="width: 30px;" class=" center" src="{{asset('css/uicons/loading.gif')}}">
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react r-5">
                        <a href="" class="comment-a-react" id="comment-like-a-{{$key}}">
                            <i class="far fa-heart fa-12 unliked" id="comment-like-i-{{$key}}"></i>
                        </a>
                    </div>
                </div>
                <input type="hidden" id="id_click" value="none;0" name="">
            </div>
        </div>            
        <?php $key++;} ?>
        <script type="text/javascript">
            $(document).click(function(e){
                let id_full = e.target.id;
                let id = id_full.split('|');
                let className = e.target.className;
                if (className.indexOf('savepost-more') > 0) {
                    e.preventDefault();
                }
                if (className.indexOf('comment-post-more') > 0) {
                    e.preventDefault();
                    let id_final = e.target.id.split('-')[1];
                    $('#comment-send-' + id_final).css({
                        'display' : 'block',
                    });
                }
                if (className.indexOf('like-a-more') > 0) {
                    e.preventDefault();
                }
                if (className.indexOf('comment-send-done-icon') > 0) {
                    e.preventDefault();
                }
                if (className.indexOf('comment-like-a') > 0) {
                    e.preventDefault();
                }
            });
        </script>
        <input type="hidden" id="current-video-id" name="">
        <script type="text/javascript">

        //let route = "{{route('account.data')}}"; 
            function reaction_comment(e) {
                let id_full = e.target.id;
                let id = id_full.split('_')[1];
                alert(id);
            }
            function like_ajax(t){
                //console.log(t);
                let id_full = t.id;
                let id = id_full.split('_')[1];
                if (id_full.split('_')[0] == 'on') {
                    id_full = id_full.split('_')[1];
                } else {
                    id_full = id_full.split('_')[1];
                }

                like(id, id_full)
            }

            function play(element){
                let id = element.id.split('_')[1];
                let id_button = 'playbutton_' + id;
                if (document.getElementById('video_' + id).paused) {
                    document.getElementById('video_' + id).play();
                    document.getElementById(id_button).classList.add('invisible');
                } else {
                    document.getElementById('video_' + id).pause();
                    document.getElementById(id_button).classList.remove('invisible');
                }
                $('#current-video-id').val('video_' + id);
            }
            function play_video(element){
                play(element);
            }

            function like(id, id_full){
                        $.ajax({
                          url: "{{ route('like_unlike')}}",
                          type: 'get',
                          data: {'id': id, 'id_full' : id_full},
                           dataType: 'json',
                           success:function(response){
                           //console.log(response);

                            $.each(response.remove, function(key, value){
                                //console.log(response.id + ' remove ' + value);
                                document.getElementById(id_full).classList.remove(value);
                            });
                            $.each(response.add, function(key, value){
                                //console.log(response.id + ' add ' + value);
                               document.getElementById(id_full).classList.add(value);
                            });
                            let react = 'reacções';
                            if (response.reactions < 2) {
                                react = 'reacção';
                            }

                            console.log('likes-qtd-' + id);
                            document.getElementById('likes-qtd-' + id).innerText = response.reactions + ' ' + react;
                          }
                        });
                }
            function com(element){
                let id = element.id;
                let c = document.getElementById('comentario-' + id).value;

                if(c != ''){
                    $("#comment-own-" + id).text(c);
                  $("#comment-users-own-" + id).css({
                    display: "flex",
                  });
                  $("#comment-users-" + id).hide();
                  $("#comentario-" + id).val('');
                    comment(id, c);
                }
            }
            function comment(id, c){
                //alert('COMENT ' + c);
                let comment_qtd = $("#comment-qtd-" + id).text().split(' ')[0];
                $.ajax({
                  url: "{{route('comentar')}}",
                  type: 'get',
                  data: {'id': id, 'comment': c},
                   dataType: 'json',
                   success:function(response){

                   var nome = '';
                   comment_qtd = parseInt(comment_qtd) + 1;
                   $("#comment-qtd-" + id).text((comment_qtd) + " comentários")
                        nome +=     '<a href="" class="comment-like-a" onclick = reaction_comment(this) id="on|'+response[0]['comment_id']+'">'
                        if(response[0]['comment_S_N'] > 0){
                          nome +=            ' <i class="fas fa-heart fa-12 unliked" id="on|'+response[0]['comment_id']+'|i"></i>'
                        }else{
                          nome +=             '<i class="far fa-heart fa-12 unliked" id="off|'+response[0]['comment_id']+'|i"></i>'
                        }
                        let new_comment = 'novo-comment-' + id;
                        //console.log(new_comment);
                        $('#' + new_comment).append(nome);

                  }
                });
              }
      </script>
      </div>
       <div class="reload-component" id="reload-component" name="reload-component"><img class="center" src="{{asset('css/uicons/aguarde1.gif')}}"></div>
        <div class="control" id="control-1">

        </div>
        <div>
        </div>
</div>

<input type="checkbox" checked name="" id="target-loading-app-load" class="invisible">
<div class="pop-up pop-up-option pop-up-loading-component" id="container-loading-app-load">
    <img class="center" src="{{asset('css/uicons/loading_blue.gif')}}" id="loader_icon_app" style="display: block; display: block; width: 130px; height: auto;">
    <img class="center" src="{{asset('css/uicons/tassumir.jpeg')}}" id="loader_icon_app" style="display: block; top: 40%; width: 70px; height: auto;">
    <h1 class="center" id="" style="top: 80%;">from</h1>
    <h1 class="center" id="loader_app_text" style="top: 84%;">Be Able</h1>
</div>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.reload-component').css({
                'display' : 'block',
                'width' : '100%',
                'height' : '100px',
            });

            function gostar(id){
            $.ajax({
              url: "{{ route('like')}}",
              type: 'get',
              data: {'id': id},
               dataType: 'json',
               success:function(response){
               let likes_qtd = $("#likes-qtd-" + id).text().split(' ')[0];
               if (response == 1) {
                 likes_qtd = parseInt(likes_qtd) + 1;
                 $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
               } else if (response == 2) {
                 likes_qtd = parseInt(likes_qtd) - 1;
                 if (likes_qtd >= 0) {
                   $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
                 }
               }
              }
            });
          }

        });
      </script>
<script>

function gostar(id){

    $.ajax({
      url: "{{ route('like')}}",
      type: 'get',
      data: {'id': id},
       dataType: 'json',
       success:function(response){
       let likes_qtd = $("#likes-qtd-" + id).text().split(' ')[0];
       if (response == 1) {
         likes_qtd = parseInt(likes_qtd) + 1;
         $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
       } else if (response == 2) {
         likes_qtd = parseInt(likes_qtd) - 1;
         if (likes_qtd >= 0) {
           $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
         }
       }
      }
    });
  }

  function comment_reac(id){
      $.ajax({
        url: "{{ route('comment_reac')}}",
        type: 'get',
        data: {'id': id},
         dataType: 'json',
         success:function(response){
           //console.log(response);
         /*let likes_qtd = $("#likes-qtd-" + id).text().split(' ')[0];
         if (response == 1) {
           likes_qtd = parseInt(likes_qtd) + 1;
           $("#likes-qtd-" + id).text((likes_qtd) + "


           ");
         } else if (response == 2) {
           likes_qtd = parseInt(likes_qtd) - 1;
           if (likes_qtd >= 0) {
             $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
           }
         }*/
         if (true) {}
        }
      });
    }

  function seguir(id, id2){

     $.ajax({
        url: "{{route('seguir')}}",
        type: 'get',
        data: {'id': id},
         dataType: 'json',
         success:function(response){
         //console.log(response);
         $('.seguir-' + id).hide();
         $('#li-component-suggest-' + id).remove();
         $('#li-component-sugest-' + id).remove();
        }
      });
    }

    function comentar(id, c){
    let comment_qtd = $("#comment-qtd-" + id).text().split(' ')[0];
        $.ajax({
          url: "{{route('comentar')}}",
          type: 'get',
          data: {'id': id, 'comment': c},
           dataType: 'json',
           success:function(response){

           //console.log(response);
           var nome = '';
           comment_qtd = parseInt(comment_qtd) + 1;
           $("#comment-qtd-" + id).text((comment_qtd) + " comentários")


           nome +=     '<div name="comment-like">'
           nome +=     '<a href="" class="comment-like-a" onclick = reaction_comment(this) id="on|'+response[0]['comment_id']+'">'
                if(response[0]['comment_S_N'] > 0){
                  nome +=            ' <i class="fas fa-heart fa-12 liked" id="on|'+response[0]['comment_id']+'|i"></i>'
                }else{
                  nome +=             '<i class="far fa-heart fa-12 unliked" id="off|'+response[0]['comment_id']+'|i"></i>'
                }
                nome +=     '</a>'
                nome +=     '</div>'
                    $('div[name=comment-like]').remove();
                    $('div[name=novo-comment]').append(nome);

          }
        });
      }

      function guardar(id){

         $.ajax({
            url: "{{route('savepost')}}",
            type: 'get',
            data: {'id': id},
             dataType: 'json',
             success:function(response){
             //console.log(response);
             $("#savepost-" + id).hide();

            }
          });
        }

        function delete_post(id){

           $.ajax({
              url: "{{route('delete_post')}}",
              type: 'get',
              data: {'id': id},
               dataType: 'json',
               success:function(response){
               //console.log(response);
               $("#m_post-" + id).hide();

              }
            });
          }

          function ocultar_post(id){

             $.ajax({
                url: "{{route('ocultar_post')}}",
                type: 'get',
                data: {'id': id},
                 dataType: 'json',
                 success:function(response){
                 //console.log(response);
                 $("#m_post-" + valor_pagina_id).hide();

                }
              });
            }


                    let contar = 0;

                    setInterval(function(e){
                        let control_ = $('#control-1').offset();
                        if(control_){
                            if (control_.top <= $(document).height()) {
                            }
                        }
                        /*if ($('#current-video-id').val() != '') {
                            let id_video = $('#current-video-id').val().split('_');
                            //alert(id_video);
                            let size_id_video = id_video.length;
                            let id_video_final = id_video[size_id_video - 1];
                            if (document.getElementById('video_' + id_video_final).paused) {
                                if (document.getElementById('play_button_' + id_video_final)) {
                                    document.getElementById('play_button_' + id_video_final).classList.remove('invisible');
                                } else if (document.getElementById('playbutton_' + id_video_final)) {
                                    document.getElementById('playbutton_' + id_video_final).classList.remove('invisible');
                                }

                            }
                            /*let state_ = $("#video_" + id_video_final)[0].paused != true &&
                                !$("#video_" + id_video_final)[0].seeking &&
                                 $("#video_" + id_video_final)[0].currentTime > 0 &&
                                 $("#video_" + id_video_final)[0].readyState >= $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA;
                            console.log(id_video_final + ' ' + state_);
                            console.log('paused ' + $("#video_" + id_video_final)[0].paused);
                            console.log('.HAVE_FUTURE_DATA ' + $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA);
                            console.log('readyState ' + $("#video_" + id_video_final)[0].readyState);
                            console.log('seeking ' + $("#video_" + id_video_final)[0].seeking);
                            console.log('currentTime ' + $("#video_" + id_video_final)[0].currentTime);
                            if ($("#video_" + id_video_final)[0].paused != true &&
                                !$("#video_" + id_video_final)[0].seeking &&
                                 $("#video_" + id_video_final)[0].currentTime > 0 &&
                                 $("#video_" + id_video_final)[0].readyState >= $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA) {
                                    $("#loader_icon_" + id_video_final).addClass('invisible-component');
                            } else {
                                if ($("#video_" + id_video_final)[0].readyState <= $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA){
                                    $("#loader_icon_" + id_video_final).removeClass('invisible-component');
                                }
                            }
                        }*/

                        let margin_stories = $('.main-container').offset();
                        let margin_s = $('.main').offset();
                        //console.log('margin_s ' + margin_s.top);
                        let height_ = parseInt($('.main').height());
                        //console.log('height_margin_s ' + height_);
                        let height = parseInt($('.main-container').height());
                        //console.log('height_margin_stories ' + height);
                        //console.log('bottom ' + (height + margin_stories.top));
                        let height_stories = $('#stories-card').height();
                        let control = 0;
                        window_width = window.innerWidth;
                        window_width = window.innerWidth;
                        $(document).scroll(function() {
                           if($(window).scrollTop() + $(window).height() == $(document).height()) {
                               //alert("bottom!");
                           }
                           //console.log('oii123iii');
                        });
                        //console.log('oii12');
                        if (window.innerWidth < 800) {

                        }
                        let video_post1 = document.getElementsByClassName('video-post-video');

                        //console.log('video ' + video_post1[0].id);
                        let id;
                        let video_post = $('.video-post-video');
                        let getvideo = document.getElementsByClassName('getvideo');
                        //console.log('control');
                        //console.log(getvideo);
                        let currentTime;
                        let duration;
                        let watched_video;
                        //console.log(video_post1);
                        let video_post_time;
                        let storage_video;
                        for (var i = 0; i <= getvideo.length - 1; i++) {
                            id = getvideo[i].id.split('_')[2];
                            if (document.getElementById('video_' + id)) {
                                offset_video = $('#video_' + id).offset();
                                video_post_time = $('#video-post-time-' + id);
                                if (document.getElementById('video_' + id).src == '') {
                                    //$("#loader_button_" + id).removeClass('invisible-component');
                                } else {
                                    if ($('#vid-load_' + id).val() == 'ready') {
                                    }
                                }
                                if(offset_video.top < 490 && offset_video.top > -200){
                                    if ($('#has-video_' + id).val() != "ok") {
                                    } else {
                                        $('#video-post-time-all-' + id).val(document.getElementById('video_' + id).duration / 2);
                                        if (!(document.getElementById('video_' + id).paused) /*&& $('#has-video-' + id).val() == 'ok'*/) {
                                            currentTime = document.getElementById('video_' + id).currentTime;
                                            duration = document.getElementById('video_' + id).duration;
                                            $('#video-post-time-' + id).val(currentTime);
                                            //console.log('currentTime de video_' + id + ' = ' + $('#video-post-time-' + id).val());
                                            if (currentTime >= (duration / 2)) {
                                                watched_video = $('#watch-video-' + id).val();
                                                //console.log('entrou no video watch-video ' + watched_video);
                                                //add_view(watched_video);
                                            }
                                            document.getElementById('play_button_' + id).classList.add('invisible');
                                            //$("#loader_button_" + id).hide();
                                        } else {
                                            //console.log('state ' + document.getElementById('video_' + id).readyState);
                                            //console.log('state ' + document.getElementById('video_' + id).src);
                                            /*if (document.getElementById('video_' + id).readyState < 4) {
                                                $("#loader_button_" + id).addClass('invisible-component');
                                            } else {
                                                $("#loader_button_" + id).removeClass('invisible-component');
                                            }*/
                                            //console.log('id_video ' + id);
                                            document.getElementById('play_button_' + id).classList.remove('invisible');
                                            document.getElementById('video_' + id).pause();
                                            if (document.getElementById('video_' + id).readyState == 4) {
                                                //document.getElementById('video_' + id).play();
                                                //document.getElementById('play_button_' + id).classList.add('invisible');
                                            }
                                        }
                                    }

                                } else {
                                    document.getElementById('video_' + id).pause();
                                    //document.getElementById('play_button_' + id).classList.remove('invisible');
                                    //document.getElementById('play_button_' + id).src = '{{asset("storage/icons/pause.png")}}';
                                }
                            }

                        }
                        let offset_post;
                        let post_view = document.getElementsByClassName('post-view');
                        //console.log(post_view);
                        for (var i = 0; i <= post_view.length - 1; i++) {
                            let id = post_view[i].id;
                            //console.log('id post ' + id);
                            offset_post = $('#' + id).offset();
                            if(offset_post.top < 120 && offset_post.top > -100){
                                ////console.log($('#format-' + id.split('_')[2]).val());
                                if ($('#format-' + id.split('_')[2]).val() != 1) {
                                    //add_view(post_view[i].id);
                                }
                            } else {

                            }
                        }
                        document.get
                    }, 1000);
                    function getVideo(post, id){
                        
                    }


/*siene coding*/

function playAndPause() {

  const allVideos = document.querySelectorAll('.playOrPause');

  let options = {
    root: null,
    rootMargin: '0px',
    threshold: 1.0
  };

  let callback = (entries, observer) => {
    entries.forEach(entrada => {
      if (entrada.target.className == 'video-post-video playOrPause') {
        if (entrada.isIntersecting) {
          entrada.target.play();
          //console.log()
        } else {
          entrada.target.pause();
        }
      } else {
        //console.log('erro');
      }
    });
  };

  let observer = new IntersectionObserver(callback, options);
  allVideos.forEach(video => { observer.observe(video); });
}

this.playAndPause();

/*end siene coding*/



</script>
@stop

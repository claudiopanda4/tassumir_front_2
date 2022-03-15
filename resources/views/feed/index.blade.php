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
            <header>
                <h1>O que está a pipocar...</h1>
            </header>
            <nav>
                <ul class="clearfix">
                    <?php $i = 0; while ($i < 21) { ?>
                    <li class="li-component-stories l-5" id="li-component-stories-{{$i}}">
                        <a href="">
                            <div class="identify-cover circle">
                                <img class="img-full circle invisible" id="li-component-stories-img-profile-{{$i}}">
                            </div>
                            <img class="img-back-stories center invisible" id="li-component-stories-img-back-{{$i}}">
                            <video controls class="video-post-dest invisible" id="li-component-stories-video-post-{{$i}}">
                                <source src="" type="video/mp4">
                            </video> 
                            <div  id="li-component-stories-cover-video-{{$i}}">
                               <img class="img-full circle foto-page-video invisible-component"> 
                            </div>
                            <div class="headline">
                                <h2 class="center" id="headline-stories-{{$i}}"></h2>
                            </div>
                        </a>
                    </li>
                    <?php $i++; } ?>
                </ul>
            </nav>
        </header>
        <div class="refresh-profile-photo clearfix" id="refresh-profile-photo-id">
            <div class="profile-photo-container l-5">
                <img class="img-full" src="{{asset('storage/img/page/unnamed.jpg')}}">
            </div>
            <div class="content-profile-photo l-5">
                <h1>O Tassumir ajuda casais a assumirem-se publicamente e também ajuda casais a partilharem habilidades pessoais, que podem promover</h1>
            </div>
            <label for="target-profile-cover" id="profile-cover-alert-no-img">
                <div class="options-profile-btn options-profile-btn-center profile-item-center" id="options-profile-btn-profile">
                    <h3 class="edit-profile-mobile" style="margin-top: 0;">Assumir Relacionamento</h3>
                </div>
            </label>
        </div>
        <div class="refresh-profile-photo clearfix" id="refresh-profile-photo-id">
            <div class="profile-photo-container l-5">
                <img class="img-full" src="{{asset('storage/img/page/unnamed.jpg')}}">
            </div>
            <div class="content-profile-photo l-5">
                <h1>Ajude as pessoas a conhecerem mais você. Adicione uma foto de perfil</h1>
            </div>
            <label for="target-profile-cover" id="profile-cover-alert-no-img">
                <div class="options-profile-btn options-profile-btn-center profile-item-center" id="options-profile-btn-profile">
                    <h3 class="edit-profile-mobile" style="margin-top: 0;">Actualizar foto de Perfil</h3>
                </div>
            </label>
        </div>
    <div class="" id="div_father_post" name="div_father_post">
        <?php $key = 0; while($key < 240){ ?>
            <div id="m_post-25" <?php if ($key < 1) {echo "class='card br-10 post-video'";} else {echo "class='card br-10 post-video invisible-post'";}
             ?>>
            <div class="post post-view post-video" id="post_view_">
                <input type="hidden" name="" value="1" id="format-">
                <header class="clearfix">
                    <div class="first-component clearfix l-5">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle invisible">
                        </div>   
                        <div class="page-identify l-5 clearfix">
                            <a href=""><h1 class="text-ellips"></h1></a>
                            <div class="info-post clearfix">
                                <span class="time-posted l-5"></span><div id="seguir-1-25"><span class="seguir-1"><a href="" class="seguir-a r-5" id="seguir-1-25"></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="last-component clearfix r-5">
                        <label for="more-option-1">
                            <i class="fas fa-ellipsis-h fa-14 fa-option"></i>
                        </label>
                        <input type="checkbox" name="" id="more-option-1" class="hidden">
                        <ul class="clearfix more-option-post">
                                                      <li>
                                <a href="" class="edit-option" id="edit-option|ca504ca7-0475-4dd3-936d-56b5d05b612b">Editar</a>
                            </li>
                            <li>
                                <a href="" class="delete_post" id="delete_post-25">Apagar Publicação</a>
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
                        <div class="video-post post-video" id="video-post-">
                            <img class="play_button center invisible" src="{{asset('storage/icons/play_button.png')}}" id="play_button_25">
                            <img class="loader_button center invisible" src="{{asset('storage/icons/aguarde.gif')}}" id="loader_button_25">
                            <img class="loader_icon center invisible" src="{{asset('css/uicons/loading.gif')}}" id="loader_icon_25">
                            <video class="video-post-video" id="video_25">
                                <source src="" class="" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <input type="hidden" name="" value="post_view_" id="watch-video-25">
                            <input type="hidden" name="" value="" id="vid-25">
                            <input type="hidden" name="" id="has-video-25">
                            <input type="hidden" name="" id="video-post-time-25">
                            <input type="hidden" name="" id="video-post-time-all-25">
                        </div>
                    </div>
                </div>
                <nav class="row interaction-numbers">
                    <ul class="">
                        <li>
                            <a href="" id="likes-qtd-">reacções</a>
                        </li>
                        <li>
                            <a href="">comentários</a>
                        </li>
                    </ul>
                </nav>
                <nav class="row clearfix interaction-user">
                    <ul class="row clearfix ul-interaction-user">
                        <li class="l-5">
                            <div class="content-button">
                                <a href="" class="like-a" id="on|">
                                    <i class="far fa-heart center fa-16 unliked" id="off||i"></i>
                                    <h2 id="off||h2">Like</h2>
                                </a>
                            </div>
                        </li>
                        <li class="l-5">
                            <div class="content-button comment-send-post" id="comment-25">
                                <a href="" id="comment_a-25">
                                    <i class="far fa-comment-alt center fa-16" id="comment_i-25"></i>
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
                        <li class="r-5" id="savepost-25">
                            <div class="content-button">
                                <a href="" class="savepost" id="savepost-25">
                                    <i class="far fa-bookmark center fa-16" id="savepost-25"></i>
                                    <h2 id="savepost-25">Guardar</h2>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="comment-send clearfix" id="comment-send-25">
                    <div class="img-user-comment l-5">
                        <img class="img-full circle invisible">
                    </div>
                    <div class="input-text comment-send-text l-5 clearfix">
                        <input type="text" class="" name="comentario" id="comentario-25" placeholder="O que você tem a dizer?">
                        <div class="r-5 ">
                            <a href="" class="comentar-a" id="25">
                                <i class="far fa-paper-plane fa-20 fa-img-comment" id="25"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="comment-users comment-users-own" id="comment-users-own-25">
                    <div class="comment-user-container">
                        <div class="user-identify-comment user-identify-comment-feed">
                          <div class="profille-img">
                            <img class="img-full circle invisible" src="">
                          </div>
                        </div>
                        <div class="comment-user-comment comment-user-comment-feed">
                            <p class="text-ellips" id="comment-own-25"></p>
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react" name="novo-comment">

                    </div>
                </div>

                  <div class="comment-users" id="comment-users-25">
                    <div class="comment-user-container">
                        <div class="user-identify-comment user-identify-comment-feed">
                            <div class="profille-img">
                                <img class="img-full circle invisible" src="">
                            </div>
                            <h2 class="text-ellips"></h2>
                        </div>
                        <div class="comment-user-comment comment-user-comment-feed">
                            <p class="text-ellips"></p>
                        </div>
                    </div>
                      <div class="comment-user-container comment-user-container-react">
                        <a href="" class="comment-like-a" onclick="reaction_comment(this)" id="on|29">
                            <i class="far fa-heart fa-12 unliked" id="off|29|i"></i>
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
        <?php if ($key == 3 || $key == 7): ?>
                <section class="suggest-slide">
                    <header>
                        <h1>Sugestões pra você</h1>
                    </header>
                    <nav class="clearfix">
                        <ul id="sugest_index" class="clearfix"> 
                            <li class="li-component-suggest clearfix l-5 sugest_page">
                                <div class="clearfix sugest_component_div">
                                    <div class="sugest_component circle clearfix">
                                        <img class="img-full circle">
                                    </div>
                                </div>
                                <h1 class="name-suggest text-ellips"></h1>
                                <a href="" class="seguir_index" ><div id="">seguir</div></a>
                                <input type="hidden" id="conta_id" value="" name="">
                                <input type="hidden" name="" value="0" id="last_page">
                            </li>
                        </ul>
                    </nav>
                </section>
        <?php endif ?>
        <input type="hidden" id="current-video-id" name="">
        <input type="hidden" id="host" value="{{route('account.data')}}" name="">
        <script type="text/javascript">

        //let route = "{{route('account.data')}}"; 
            function reaction_comment(e) {
                let id_full = e.target.id;
                let id = id_full.split('|')[1];
                alert(id);
            }
            function like_ajax(t){
                console.log(t);
                let id_full = t.id;
                let id = id_full.split('|')[1];
                if (id_full.split('|')[0] == 'on') {
                    id_full = id_full.split('|')[1];
                } else {
                    id_full = id_full.split('|')[1];
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
                           console.log(response);

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
                   console.log(response);
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
                        console.log(new_comment);
                        $('#' + new_comment).append(nome);

                  }
                });
              }
      </script>
      </div>
       <div class="reload-component" id="reload-component" name="reload-component"><img class="center" src="{{asset('storage/icons/aguarde1.gif')}}"></div>
        <div class="control" id="control-1">

        </div>
        <div>
        </div>
</div>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.reload-component').css({
                'display' : 'block',
                'width' : '100%',
                'height' : '100px',
            });
            /*document.getElementById('refresh-profile-photo-id').style.display = 'block';
            document.getElementById('refresh-profile-photo-id').style.width = 100 + '%';
            document.getElementById('refresh-profile-photo-id').style.height = 100 + 'px';*/

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
           $("#likes-qtd-" + id).text((likes_qtd) + " reacções");
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

    $(document).ready(function () {
        $(".loader_icon").hide();
      document.getElementById("route_feed").classList.add('li-component-aside-active');

            $('.seguir_index').click(function(e){
            e.preventDefault();
            var valor_pagina_id = e.target.id;
            var valor_idconta = $('#conta_id').val();
            var an = $('.seguir_index').text();

            if (($('.sugest_page').eq(9).attr("id")) == null) {
                if (($('#last_page').val()) != 0) {
                    var id_last_page = $('#last_page').val();
                }else{
                    var id_last_page = 0;
                }
            }else{
               var id_last_page = $('.sugest_page').eq(9).attr("id").split('-')[3];
            }            //$('#' + valor_pagina_id).empty();
            $.ajax({
                url: "{{route('seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': valor_idconta, 'seguida': valor_pagina_id, 'last_page': id_last_page},
                dataType: 'json',
                success: function(response){
                  //console.log(response);
                  $('#li-component-suggest-' + valor_pagina_id).remove();
                  $('#li-component-suggest-' + valor_pagina_id).remove();
                  $('#li-component-sugest-' + valor_pagina_id).remove();
                  $('.seguir-' + valor_pagina_id).hide();
                  if (response.page != 'Vazio') {
                  $.each(response.page, function(key, value){
                    $('#last_page').val(value.page_id);
                    let url_link = "{{ route('couple.page1', 0) }}";
                        url_array = url_link.split('/');
                        url_link = url_array[0] + "/" + url_array[1] + "/" + url_array[2] + "/" + url_array[3] + "/" + value.uuid;
                    if (value.foto != null) {                        
                    let src = "{{asset('storage/img/page/')}}" + "/" + value.foto;
                        $('#sugest_index').append("<li class='li-component-suggest clearfix l-5' id='li-component-suggest-'"+value.page_id+"><div class='clearfix sugest_component_div'><div class='sugest_component circle clearfix'><a href="+url_link+"><img class='img-full circle' src="+src+"></a></div></div><a href="+url_link+"><h1 class='name-suggest text-ellips'>"+value.nome+"</h1></a><a href='' class='seguir_index' ><div id="+value.page_id+">seguir</div></a><input type='hidden' id='conta_id' value="+response.id_user+" name=''></li>");
                    }else{
                        let src = "{{asset('storage/img/page/unnamed.jpg')}}";
                        $('#sugest_index').append("<li class='li-component-suggest clearfix l-5' id='li-component-suggest-'"+value.page_id+"><div class='clearfix sugest_component_div'><div class='sugest_component circle clearfix'><a href="+url_link+"><img class='img-full circle' src="+src+"></a></div></div><a href="+url_link+"><h1 class='name-suggest text-ellips'>"+value.nome+"</h1></a><a href='' class='seguir_index' ><div id="+value.page_id+">seguir</div></a><input type='hidden' id='conta_id' value="+response.id_user+" name=''></li>");
                    }
                });
                }
                }
              });
             });
            });

          /*  function home_index(){
              $.ajax({
                url: "{{route('account.home.feed')}}",
                type: 'get',
                dataType: 'json',
                data: { init: $('#last_post').val(), checked: true, dest_init: $('#last_post_dest').val() },
                success:function(response){
                      console.log('last_post ' + $('#last_post').val() + ' last_post_dest ' + $('#last_post_dest').val());
                      console.log('yes');
                      console.log(response);
                  }
                });
            }*/

            function add_view(data) {
                $.ajax({
                    url: "{{route('post.view.save')}}",
                    type: 'get',
                    data: {'data': data},
                    dataType: 'json',
                    success: function(response){
                        //console.log(response);
                    }
                });
            }

                    let contar = 0;

                    setInterval(function(e){
                        let control_ = $('#control-1').offset();
                        //control_ = $(document).height() - control_;
                        //$(window).scrollTop() + $(window).height() == $(document).height();
                        //console.log('scrollTop + ' + $(window).scrollTop() + ' heightWindow + ' + $(window).height() + ' = ' + $(document).height() + ' top_control ' + control_.top);
                        if(control_){
                            //console.log(control_.top + " " + $(document).height());
                            if (control_.top <= $(document).height()) {
                                //alert('carregar');
                                //alert('oi');
                          //--DShome_index();
                                //---DS console.log('last_post_id ' + $('#last_post').val());
                            }
                        }
                        if ($('#current-video-id').val() != '') {
                            let id_video = $('#current-video-id').val().split('_');
                            let size_id_video = id_video.length;
                            let id_video_final = id_video[size_id_video - 1];
                            if (document.getElementById('video_' + id_video_final).paused) {
                                if (document.getElementById('play_button_' + id_video_final)) {
                                    document.getElementById('play_button_' + id_video_final).classList.remove('invisible');    
                                } else if (document.getElementById('playbutton_' + id_video_final)) {
                                    document.getElementById('playbutton_' + id_video_final).classList.remove('invisible');
                                }
                                
                            }
                            console.log('paused ' + $("#video_" + id_video_final)[0].paused);
                            console.log('.HAVE_FUTURE_DATA ' + $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA);
                            console.log('readyState ' + $("#video_" + id_video_final)[0].readyState);
                            console.log('seeking ' + $("#video_" + id_video_final)[0].seeking);
                            console.log('currentTime ' + $("#video_" + id_video_final)[0].currentTime);
                            if ($("#video_" + id_video_final)[0].paused != true && 
                                !$("#video_" + id_video_final)[0].seeking &&
                                 $("#video_" + id_video_final)[0].currentTime > 0 && 
                                 $("#video_" + id_video_final)[0].readyState >= $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA) {
                                    $("#loader_icon_" + id_video_final).hide();
                            } else {
                                if ($("#video_" + id_video_final)[0].readyState <= $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA){
                                    $("#loader_icon_" + id_video_final).show();
                                } 
                            }
                        }

                        let margin_stories = $('.main-container').offset();
                        let margin_s = $('.main').offset();
                        //console.log('margin_s ' + margin_s.top);
                        let height_ = parseInt($('.main').height());
                        //console.log('height_margin_s ' + height_);
                        let height = parseInt($('.main-container').height());
                        //console.log('height_margin_stories ' + height);
                        //console.log('bottom ' + (height + margin_stories.top));
                        let height_stories = $('#stories-card').height();
                        //console.log('height ' + height);
                        //console.log('height stories ' + height_stories);
                        //console.log(margin_stories.top);
                        //console.log('subt. ' + ((height - 400) + margin_stories.top));
                        let control = 0;
                        if (contar==0) {


                        if ((height - 400) + margin_stories.top  <= 450) {
                            control++;

                            //alert(contar);
                              contar++;
                                let load = '';
                                load += '<div class="reload-component" id="reload-component-1"><img class="center" src="{{asset("storage/icons/aguarde1.gif")}}"></div>'
                                $('div[name=load]').append(load);

                            $.ajax({
                               url: "{{route('pegar_mais_post')}}",
                               type: 'get',
                               dataType: 'json',
                               success: function(response){
                                 $('.reload-component').remove();
                                 //console.log(response);
                                 if (response.length > 0) {
                                 $.each(response, function(key, value){

                                   let src = '{{asset("storage/img/users/") }}';
                                   let src1 = '{{ asset("storage/img/page/") }}';
                                   var route10 = "{{route('couple.page1', 1) }}"
                                   url_array10 = route10.split('/');
                                   url_link10 = url_array10[0] + "/" + url_array10[1] + "/" + url_array10[2] + "/"+ url_array10[3] +  "/" + value.post_uuid;

                                   var route1 = "{{route('post_index', 1) }}"
                                   url_array1 = route1.split('/');
                                   url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.post_uuid;

                                   var nome = '';

                                   nome +='<div class="card br-10" id="m_post-'+value.post_id+'">'
                                   nome +='<div class="post post-view" id="post_view_'+value.post_uuid+'_'+value.conta_logada_uuid+'">'
                                   nome +='<input type="hidden" name="" value="'+value.formato+'" id="format-'+value.post_uuid+'">'
                                   nome +='<header class="clearfix">'
                                   nome +='<div class="first-component clearfix l-5">'
                                   if( !(value.foto_page == null) ){
                                       nome += '<div class="page-cover page-cover-comment circle l-5">'
                                       nome += '<img  class="img-full circle" src=' + src1 + '/' + value.foto_page + '> </div>'

                                   }else{
                                       nome += '<div class="page-cover page-cover-comment circle l-5">'
                                       nome +='<img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"> </div>'
                                   }
                                   nome +='<div class="page-identify l-5 clearfix">'
                                   nome +='<a href='+url_link10+'><h1 class="text-ellips">'+value.nome_pag+'</h1></a>'
                                   nome +='<div class="info-post clearfix">'
                                   nome +='<span class="time-posted l-5">'+value.post_data+'  as '+value.post_hora+'</span><div id="seguir-'+value.page_id+'-'+value.post_id+'">'
                                   if (value.seguir_S_N == 0) {
                                     nome +='<span class="seguir-'+value.page_id+'"><a href="" class="seguir-a r-5"  id="seguir-'+value.page_id+'-'+value.post_id+'">seguir</a></span>'
                                   }
                                   nome +='</div></div></div></div>'
                                   nome +='<div class="last-component clearfix r-5">'
                                   nome +='<label for= "more-option-'+value.post_id+'";>'
                                   nome +='<i class="fas fa-ellipsis-h fa-14 fa-option"></i></label>'
                                   nome +='<input type="checkbox" name="" id="more-option-'+value.post_id+'" class="hidden">'
                                   nome +=' <ul class="clearfix more-option-post">'
                                   if (value.dono_da_pag == 1) {
                                     nome +='<li><a href="" class="edit-option" id="edit-option|'+value.post_uuid+'">Editar</a></li>'
                                   }
                                   if (value.dono_da_pag != 1) {
                                     nome +='<li><a href="" class="ocultar_post" id="ocultar_post-'+value.post_id+'">Ocultar Publicação</a></li>'
                                   }
                                   if (value.dono_da_pag == 1) {
                                     nome +='<li><a href="" class="delete_post" id="delete_post-'+value.post_id+'">Apagar Publicação</a></li>'
                                   }
                                   nome +='<li><a href="">Denunciar</a></li><li><a href="">Copiar Link</a></li></ul></div></header>'
                                   nome +='<div class="card-post"><div class="">'
                                   if (value.post == "" || value.post == null
                                   || value.post == " " || value.post == "null") {
                                   }else {
                                     nome +='<p>'+value.post+'</p>'
                                   }
                                   if (value.formato == 2) {
                                     nome +='<div class="post-cover post-cover-home"> <img  class="img-full" src=' + src1 + '/' + value.file + '> </div>'
                                   }else if (value.formato == 1) {
                                     nome +='<div class="video-post" id="videopost-'+value.post_id+'} onclick = play(this)"> <img class="play_button center" onclick = play_video(this) src="{{asset("storage/icons/play_button.png")}}" id="playbutton_'+value.post_id+'"> <img class="loader_button center" src="{{asset("storage/icons/aguarde.gif")}}" id="loader_button_'+value.post_id+'"> <video class="video-post-video" id="video_'+value.post_id+'" onclick = play_video(this)><source src="{{asset("storage/video/page/")}}/'+value.file+'" type="video/mp4">Your browser does not support the video tag.</video>'
                                     nome +='<input type="hidden" name="" value="post_view_'+value.post_uuid+'_'+value.conta_logada_uuid+'" id="watch-video-'+value.post_id+'"> <input type="hidden" name="" value="'+value.post_uuid+'" id="vid-'+value.post_id+'"> <input type="hidden" name="" id="has-video-'+value.post_id+'"> <input type="hidden" name="" id="video-post-time-'+value.post_id+'}"> <input type="hidden" name="" id="video-post-time-all-'+value.post_id+'"></div></div></div>'
                                   }
                                   nome +=' <nav class="row interaction-numbers"><ul class=""><li> <a href="" id="likes-qtd-'+value.post_uuid+'">'+value.qtd_likes+' reacções</a></li>'
                                   nome +='<li><a href='+url_link1+' id="comment-qtd-'+value.post_id+'">'+value.qtd_comment+' comentários</a></li>'
                                   if (false) {
                                     nome +='<li><a href="">0 partilhas</a></li>'
                                   }
                                   nome +=' </ul></nav><nav class="row clearfix interaction-user"><ul class="row clearfix ul-interaction-user"><li class="l-5"><div class="content-button">'
                                   nome +='<a href="" class="like-a-more" onclick = like_ajax(this) id="on|'+value.post_uuid+'">'
                                   if (value.reagir_S_N  > 0) {
                                     nome +='<i class="fas fa-heart center fa-16 liked like-a-more" id="'+value.post_uuid+'"></i> <h2 id="on|'+value.post_uuid+'|h2">Like</h2>'
                                   }else {
                                     nome +='<i class="far fa-heart center fa-16 unliked like-a-more" id="'+value.post_uuid+'"></i> <h2 id="on|'+value.post_uuid+'|h2">Like</h2>'
                                   }
                                   nome +=' </a></div></li><li class="l-5"><div class="content-button comment-send-post" id="comment-'+value.post_id+'"><a href="" id="comment_a-'+value.post_id+'"><i class="far fa-comment-alt center fa-16 comment-post-more" id="comment_i-'+value.post_id+'"></i><h2>Comentar</h2></a></div></li>'
                                   nome +='<li class="r-5"><div class="content-button"><a href=""><i class="far fa-share-square fa-16"></i><h2>Partilhar</h2></a></div></li>'
                                   if (value.guardado ==0) {
                                     nome +=' <li class="r-5" id="savepost-'+value.post_id+'"><div class="content-button"><a href="" class="savepost" id="savepost-'+value.post_id+'"><i class="far fa-bookmark center fa-16 savepost-more" id="savepost-'+value.post_id+'"></i><h2 id="savepost-'+value.post_id+'">Guardar</h2></a></div></li>'
                                   }
                                   nome +='</ul></nav><div class="comment-send clearfix"  id="comment-send-'+value.post_id+'">'
                                   if (value.conta_logada_foto != null) {
                                     nome +='<div class="img-user-comment l-5"><img  class="img-full circle" src=' + src + '/' + value.conta_logada_foto + '></div>'
                                   }else {
                                     nome +='<div class="img-user-comment l-5"><i class="fas fa-user center" style="font-size: 20px; color: #ccc;"></i></div>'
                                   }
                                   nome +='<div class="input-text comment-send-text l-5 clearfix"><input type="text" class="" name="comentario" id="comentario-'+value.post_id+'" placeholder="O que você tem a dizer?">'
                                   nome +='<div class="r-5 "><a href="" class="comentar-a" id="'+value.post_id+'"><i class="far fa-paper-plane fa-20 fa-img-comment comment-send-done-icon" id="'+value.post_id+'" onclick = com(this)></i></a></div>'
                                   if (false) {
                                     nome +='<div class="r-5 " id=""><a href=""><i class="far fa-images fa-20 fa-img-comment"></i></a></div'
                                   }
                                   nome +='</div></div><div class="comment-users comment-users-own" id="comment-users-own-'+value.post_id+'"><div class="comment-user-container"><div class="user-identify-comment user-identify-comment-feed">'
                                   if (value.dono_da_pag == 0) {
                                     if (value.conta_logada_foto != null) {
                                       nome +='<div class="img-user-comment l-5"><img  class="img-full circle" src=' + src + '/' + value.conta_logada_foto + '></div>'
                                     }else {
                                       nome +='<div class="img-user-comment l-5"><i class="fas fa-user center" style="font-size: 20px; color: #ccc;"></i></div>'

                                     }
                                   }else {
                                     if( !(value.foto_page == null) ){
                                         nome += '<div class="page-cover page-cover-comment circle l-5">'
                                         nome += '<img  class="img-full circle" src=' + src1 + '/' + value.foto_page + '> </div>'

                                     }else{
                                         nome += '<div class="page-cover page-cover-comment circle l-5">'
                                         nome +='<img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"> </div>'
                                     }
                                   }
                                   nome +='</div><div class="comment-user-comment comment-user-comment-feed"><p class="text-ellips" id="comment-own-'+value.post_id+'"></p></div></div><div class="comment-user-container comment-user-container-react" id="novo-comment-' + value.post_id + '"></div></div>'
                                   if (value.qtd_comment>0) {
                                     nome +='<div class="comment-users" id="comment-users-'+value.post_id+'"><div class="comment-user-container" ><div class="user-identify-comment user-identify-comment-feed">'
                                     if (value.foto_ver==1) {
                                       if (value.foto_conta != null) {
                                         nome +='<div class="profille-img"><img  class="img-full circle" src=' + src + '/' + value.foto_conta + '></div>'
                                       }else {
                                         nome +='<div class="profille-img"><i class="fas fa-user center fa-16" style="color: #ccc;"></i></div>'
                                       }
                                     }else if (value.foto_ver==2) {
                                       if (value.foto_conta != null) {
                                         nome +='<div class="profille-img"><img  class="img-full circle" src=' + src1 + '/' + value.foto_conta + '></div>'
                                       }else {
                                         nome +='<div class="profille-img"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>'
                                       }
                                     }
                                     nome +='<h2 class="text-ellips">'+value.nome_comment+'</h2></div><div class="comment-user-comment comment-user-comment-feed"><p class="text-ellips">'+value.comment+'</p></div> </div><div class="comment-user-container comment-user-container-react"><a href="" class="comment-like-a" onclick = reaction_comment(this) id="on|'+value.comment_id+'">'
                                     nome +=''
                                     if (value.comment_S_N>0) {
                                       nome +='<i class="fas fa-heart fa-12 liked" id="on|'+value.comment_id+'|i"></i>'
                                     }else {
                                       nome +=' <i class="far fa-heart fa-12 unliked" id="'+value.comment_id+'"></i>'
                                     }
                                     nome +='</a></div></div>'
                                   }

                                   nome +='<di></di></di></div>'

                                   $('div[name=div_father_post]').append(nome);
                                   contar = 0;

                               });
                                $('div[name=div_father_post]').append(load);
                               }}
                             });


                        }
                        }
                        //console.log('janela width ' + window.innerWidth);
                        window_width = window.innerWidth;
                        //console.log('scroll log: ' + $('.main').scrollTop());
                        //console.log('janela width ' + window.innerWidth);
                        window_width = window.innerWidth;
                        //console.log('scroll log: ' + $('.main').scrollTop());
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
                        //console.log(video_post1);

                        //console.log('video ' + video_post1[0].id);
                        let id;
                        let video_post = $('.video-');
                        let currentTime;
                        let duration;
                        let watched_video;
                        //console.log(video_post1);
                        let video_post_time;
                        let storage_video;
                        for (var i = 0; i <= video_post1.length - 1; i++) {
                            /*if ($('#has-video-' + id).val() != "ok") {
                                console.log('entrou');
                                getVideo($('#vid-' + id).val(), id);
                            }*/
                            id = video_post1[i].id.split('_')[1];
                            //console.log(video_post1[i].id);
                            //console.log(id);
                            if ($('#video_' + id)) {
                                offset_video = $('#video_' + id).offset();
                                //console.log('offset video ' + offset_video.top);
                                video_post_time = $('#video-post-time-' + id);
                                if(offset_video.top < 190 && offset_video.top > -300){
                                    //console.log('hasvideo ' + id + ' ' + $('#has-video-' + id).val());
                                    if ($('#has-video-' + id).val() != "ok") {
                                        //console.log('entrou + id ' + id);
                                        //getVideo($('#vid-' + id).val(), id);
                                    }else{
                                        ////console.log('não entrou');
                                        $('#video-post-time-all-' + id).val(document.getElementById('video_' + id).duration / 2);
                                        if (!(document.getElementById('video_' + id).paused) /*&& $('#has-video-' + id).val() == 'ok'*/) {
                                            currentTime = document.getElementById('video_' + id).currentTime;
                                            duration = document.getElementById('video_' + id).duration;
                                            $('#video-post-time-' + id).val(currentTime);
                                            //console.log('currentTime de video_' + id + ' = ' + $('#video-post-time-' + id).val());
                                            if (currentTime >= (duration / 2)) {
                                                watched_video = $('#watch-video-' + id).val();
                                                //console.log('entrou no video watch-video ' + watched_video);
                                                add_view(watched_video);
                                            }
                                            document.getElementById('play_button_' + id).classList.remove('invisible');
                                        } else {
                                            document.getElementById('play_button_' + id).classList.add('invisible');
                                            if (document.getElementById('video_' + id).readyState == 4) {
                                                //document.getElementById('video_' + id).play();
                                                //document.getElementById('play_button_' + id).classList.add('invisible');
                                            }
                                        }
                                    }

                                } else {
                                    //document.getElementById('video_' + id).pause();
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
                                    add_view(post_view[i].id);
                                }
                            } else {

                            }
                        }
                        document.get
                    }, 2000);
                    function getVideo(post, id){
                        let storage_video, video, type_file, source;
                        //document.getElementById('video_' + id).setAttribute('src', storage_video);
                        document.getElementById('video_' + id).setAttribute('autoload', 'true');
                        $('#has-video-' + id).val('ok');
                        /*$.ajax({
                            url: "{{route('post.video.get')}}",
                            type: 'get',
                            data: {'data': post},
                            dataType: 'json',
                            success: function(response){
                                //////console.log('Respondeu...');
                                //////console.log(response);
                                video = response.video;
                                type_file = response.type_file;
                                storage_video = "{{asset('storage/video/page/') . '/'}}" + video;
                                ////console.log(storage_video);
                                source = document.createElement('source');
                                source.setAttribute('src', storage_video);
                                source.setAttribute('type', type_file);
                                source.setAttribute('autoload', 'true');
                                document.getElementById('video_' + id).setAttribute('src', storage_video);
                                document.getElementById('video_' + id).setAttribute('autoload', 'true');
                                document.getElementById('video_' + id).append(source);
                                $('#has-video-' + id).val('ok');
                            }
                        });*/
                    }

</script>
@stop

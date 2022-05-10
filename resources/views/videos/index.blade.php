@extends('layouts.app_tassumir_video')

@section('content')
<div class="main" style="margin-bottom: 0;">
<header class="card more-following" id="card-more-following">
    <ul>
        <li>

        </li>
    </ul>
</header>
<div class="main-component-main-tv" id="main-component-main-tv-id">
    <nav class="nav-video-option" id="nav-video-option-id">
        <ul>
            <a href="{{route('post.tassumir.video','ma')}}">
                <li>Mais Assistidos</li>
            </a>
            <a href="{{route('post.tassumir.video','mc')}}">
                <li>Mais Curtidos</li>
            </a>
            <a href="{{route('post.tassumir.video','mr')}}">
                <li>Mais Recentes</li>
            </a>
            <!--<a href="{{route('post.tassumir.video','mg')}}">
                <li>Guardados</li>
            </a>-->
        </ul>
    </nav>
    <input type="hidden" id="last-component-id-tv" value="0">
    <input type="hidden" id="last-post-id-tv" value="0">
    <input type="hidden" id="loaded-post-id-tv" value="0">
    <input type="hidden" id="loaded-video-play-tv" value="none">
    <input type="hidden" id="margin-video-play-tv" value="0">
    <input type="hidden" id="margin-video-play-x-y" value="down">
    <input type="hidden" id="current-time-video-tv-clicked" value="0">
    <input type="hidden" id="video-tv-clicked-now" value="0"> 
    
    <div class="main-container-video" id="main-container-video-component">
        <?php $key = 0; while ($key < 70) { ?>
        <div class="video-tv-container clearfix invisible-component" id="video-tv-container_{{$key}}">
            <div class="thumbnail-video video-component-tv l-5">
                <img class="img-32 center play_button_tv" id="play-button-tv_{{$key}}" src="{{asset('css/uicons/play_button.png')}}">
                <img class="thumb-video" id="thumb-video-tv_{{$key}}">
            </div>
            <video class="video-component-tv video_component-video l-5 invisible-component height-minim-video-tv" id="video-component-video_{{$key}}" src="" controls>
                
            </video>
            <input type="hidden" id="video-tv-source_{{$key}}">
            <input type="hidden" id="video-tv-clicked_{{$key}}" value="0"> 
            <input type="hidden" id="view-tv-save_{{$key}}" value="0"> 
            <!--<input type="hidden" id="current-time-video-tv-clicked_{{$key}}" value="0">-->
            <nav class="l-5 nav-tv">
                <a href="" class="like-a">
                    <li class="li-tv-icon circle">
                        <img class="img-26 center" id="reaction-id-comment-user-{{$key}}" src="{{asset('css/uicons/love_tv.png')}}">
                    </li>
                    <h1 class="text-li-tv-icon" id="text-li-tv-icon-like-{{$key}}"></h1>
                </a>
                <a class="comment_tv-post" href="">
                    <li class="li-tv-icon circle comment_tv-post">
                        <img class="img-26 center comment_tv-post" id="comment-tv-post-{{$key}}" src="{{asset('css/uicons/comment_tv.png')}}">
                    </li>
                    <h1 class="text-li-tv-icon" id="text-li-tv-icon-comment-{{$key}}"></h1>
                </a>
                <a href="">
                    <li class="li-tv-icon circle">
                        <img class="img-26 center" src="{{asset('css/uicons/share_tv.png')}}">
                    </li>
                    <h1 class="text-li-tv-icon text-li-tv-icon-description">PARTILHAR</h1>
                </a>
                <a href="">
                    <li class="li-tv-icon circle">
                        <img class="img-26 center" src="{{asset('css/uicons/bookmark_tv.png')}}">
                    </li>
                    <h1 class="text-li-tv-icon text-li-tv-icon-description">GUARDAR</h1>
                </a>
            </nav>           
        </div>
        <?php $key++; } ?>

    </div>
</div>
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
           console.log(response);
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
           console.log(response);
           var nome = '';
           comment_qtd = parseInt(comment_qtd) + 1;
           $("#comment-qtd-" + id).text((comment_qtd) + " comentários")
                nome +=     '<a href="" class="comment-like-a" id="on|'+response[0]['comment_id']+'">'
                if(response[0]['comment_S_N'] > 0){
                  nome +=            ' <i class="fas fa-heart fa-12 liked" id="on|'+response[0]['comment_id']+'|i"></i>'
                }else{
                  nome +=             '<i class="fas fa-heart fa-12 unliked" id="off|'+response[0]['comment_id']+'|i"></i>'
                }
                    $('div[name=novo-comment]').append(nome);

          }
        });
      }

    function comment(id, c){
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
                nome +=     '<a href="" class="comment-like-a" id="on|'+response[0]['comment_id']+'">'
                if(response[0]['comment_S_N'] > 0){
                  nome +=            ' <i class="fas fa-heart fa-12 liked" id="on|'+response[0]['comment_id']+'|i"></i>'
                }else{
                  nome +=             '<i class="fas fa-heart fa-12 unliked" id="off|'+response[0]['comment_id']+'|i"></i>'
                }
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
             console.log(response);
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
               console.log(response);
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
                 console.log(response);
                 $("#m_post-" + valor_pagina_id).hide();

                }
              });
            }

</script>

@stop

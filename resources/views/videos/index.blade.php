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
    <div>
        <div class="video-tv-container clearfix">
            <div class="thumbnail-video video-component-tv l-5">
                <img class="img-32 center play_button_tv" id="play-button-tv_1" src="{{asset('css/uicons/play_button.png')}}">
                <img class="thumb-video" src="{{asset('storage/img/thumbs/1650719375_499c39a36b4c4215d87cd591c5c3301e.jpeg')}}" id="thumb-video-tv_1">
            </div>
            <video class="video-component-tv video_component-video l-5 invisible-component" id="video-component-video_1" src="" controls>
                
            </video>
            <input type="hidden" id="video-tv-source_1" value="{{asset('storage/video/page/1650719375_499c39a36b4c4215d87cd591c5c3301e.mp4')}}">
            <input type="hidden" id="video-tv-clicked_1" value="0"> 
            <nav class="l-5 nav-tv">
                <a href="">
                    <li class="li-tv-icon circle">
                        <img class="img-26 center" src="{{asset('css/uicons/love_tv.png')}}">
                    </li>
                    <h1 class="text-li-tv-icon">111</h1>
                </a>
                <a href="">
                    <li class="li-tv-icon circle">
                        <img class="img-26 center" src="{{asset('css/uicons/comment_tv.png')}}">
                    </li>
                    <h1 class="text-li-tv-icon">111</h1>
                </a>
                <a href="">
                    <li class="li-tv-icon circle">
                        <img class="img-26 center" src="{{asset('css/uicons/share_tv.png')}}">
                    </li>
                    <h1 class="text-li-tv-icon">111</h1>
                </a>
                <a href="">
                    <li class="li-tv-icon circle">
                        <img class="img-26 center" src="{{asset('css/uicons/bookmark_tv.png')}}">
                    </li>
                    <h1 class="text-li-tv-icon">111</h1>
                </a>
            </nav>           
        </div>

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

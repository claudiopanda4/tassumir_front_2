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
            foreach ($dados as $key => $value): ?>
            <div class="video-container clearfix">
                <div class="identify-video mb-video-lg clearfix" id="mb-video-lg-none">
                    <div class="header-img-post-video circle l-5">
                      @if( !($dados[$key]['foto_page'] == null) )

                              <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $dados[$key]['foto_page'] }}">
                      @else
                              <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                      @endif
                                        </div>
                                        <a href="{{route('couple.page1', $dados[$key]['page_uuid']) }}"><h1 class="text-ellips">{{$dados[$key]['nome_pag']}}</h1></a>
                    <div class="last-component clearfix r-5">
                            <label for=<?php echo "more-option-0"; ?>>
                                <i class="fas fa-ellipsis-h fa-14 fa-option"></i>
                            </label>
                            <input type="checkbox" name="" id=<?php echo "more-option-"; ?> class="hidden">
                            <ul class="clearfix more-option-post">
                              <?php if ($dados[$key]['dono_da_pag?'] == 1): ?>
                                <li>
                                    <a href="">Editar</a>
                                </li>
                                <?php endif ?>
                                <?php if ($dados[$key]['dono_da_pag?'] != 1): ?>
                                <li>
                                    <a href="" class="ocultar_post" id="ocultar_post-{{$dados[$key]['post_id']}}">Ocultar Publicação</a>
                                </li>
                                <?php endif ?>
                                <?php if ($dados[$key]['dono_da_pag?'] == 1): ?>
                                <li>
                                    <a href="" class="delete_post" id="delete_post-{{$dados[$key]['post_id']}}">Apagar Publicação</a>
                                </li>
                                <?php endif ?>
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
                  @if($dados[$key]['post'] == "" || $dados[$key]['post'] == null
                  || $dados[$key]['post'] == " " || $dados[$key]['post'] == "null")
                      <p class="untext"></p>
                  @else
                      <p>{{$dados[$key]['post']}}</p>
                  @endif                </div>
                <div class="l-5 tv-video-cont">
                    <video class="center" controls src="{{asset('storage/video/page/'). '/' . $dados[$key]['file']}}">
                      <img class="play_button center" src="{{asset('storage/icons/play_button.png')}}" id=<?php echo "play_button_".$key ?>>
                      <img class="loader_button center" src="{{asset('storage/icons/aguarde.gif')}}" id=<?php echo "loader_button_".$key ?>>

                        <!--<source src="{{asset('storage/video/page/1638350765_f3f75e8dcf710b46e0db5e85e0dd5cba.mp4')}}" type="type/mp4">-->
                    </video>
                </div>
                <div class="l-5" id="mb-video-lg-display">
                    <div class="identify-video mb-video-lg clearfix">
                        <div class="header-img-post-video circle l-5">
                          @if( !($dados[$key]['foto_page'] == null) )
                                  <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $dados[$key]['foto_page'] }}">
                          @else
                                  <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                          @endif
                                                </div>
                          <a href="{{route('couple.page1', $dados[$key]['page_uuid']) }}"><h1 class="text-ellips">{{$dados[$key]['nome_pag']}}</h1></a>
                        <div class="last-component clearfix r-5">
                            <label for=<?php echo "more-option-0"; ?>>
                                <i class="fas fa-ellipsis-h fa-14 fa-option"></i>
                            </label>
                            <input type="checkbox" name="" id=<?php echo "more-option-"; ?> class="hidden">
                            <ul class="clearfix more-option-post">
                              <?php if ($dados[$key]['dono_da_pag?'] == 1): ?>
                                <li>
                                    <a href="">Editar</a>
                                </li>
                                <?php endif ?>
                                <?php if ($dados[$key]['dono_da_pag?'] != 1): ?>
                                <li>
                                    <a href="" class="ocultar_post" id="ocultar_post-{{$dados[$key]['post_id']}}">Ocultar Publicação</a>
                                </li>
                                <?php endif ?>
                                <?php if ($dados[$key]['dono_da_pag?'] == 1): ?>
                                <li>
                                    <a href="" class="delete_post" id="delete_post-{{$dados[$key]['post_id']}}">Apagar Publicação</a>
                                </li>
                                <?php endif ?>
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
                              @if($dados[$key]['post'] == "" || $dados[$key]['post'] == null
                              || $dados[$key]['post'] == " " || $dados[$key]['post'] == "null")
                                  <p class="untext"></p>
                              @else
                                  <p>{{$dados[$key]['post']}}</p>
                              @endif
                                                        </div>
                  <?php if ($dados[$key]['qtd_comment']>0): ?>
                            <div class="comment-users-tass">
                                <div class="comment-users" id="comment-users-2">
                                    <div class="comment-user-container">
                                      <div class="user-identify-comment">
                                        @if( $dados[$key]['foto_ver']==1 )
                                          @if( !($dados[$key]['foto_conta'] == null) )
                                          <div class="profille-img">
                                              <img  class="img-full circle" src="{{ asset('storage/img/users') . '/' . $dados[$key]['foto_conta'] }}">
                                          </div>
                                          @else
                                          <div class="profille-img">
                                                <i class="fas fa-user center" style="font-size: 20px; color: #ccc;"></i>
                                          </div>
                                      @endif
                                    @elseif( $dados[$key]['foto_ver']==2 )
                                      @if( !($dados[$key]['foto_conta'] == null) )
                                        <div class="profille-img">
                                          <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $dados[$key]['foto_conta'] }}">
                                        </div>
                                      @else
                                        <div class="profille-img">
                                          <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                        </div>
                                        @endif
                                    @endif
                                        <div class="comment-user-comment">
                                            <h1 class="user">{{$dados[$key]['nome_comment']}}</h1>
                                            <p class="">{{$dados[$key]['comment']}}</p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="comment-user-container comment-user-container-react">
                                      <a href="" class="comment-like-a" id="on|{{$dados[$key]['comment_id']}}">
                                          @if($dados[$key]['comment_S/N'] > 0)
                                              <i class="fas fa-heart fa-12 liked" id="on|{{$dados[$key]['comment_id']}}|i"></i>
                                          @else
                                              <i class="fas fa-heart fa-12 unliked" id="off|{{$dados[$key]['comment_id']}}|i"></i>
                                          @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                          <?php else: ?>
                            <div class="comment-users-tass">
                                <div class="comment-users" id="comment-users-2">
                                    <div class="comment-user-container">
                                      <div class="user-identify-comment">
                                        <div class="comment-user-comment">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="comment-user-container comment-user-container-react">
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>
                        <nav class="row interaction-numbers">
                            <ul class="">
                                <li>
                                  <i class="fas fa-heart fa-16" style="display: inline-flex; margin-right: 5px; color: red;"></i><a href="" id="likes-qtd-{{$dados[$key]['post_uuid']}}">{{$dados[$key]['qtd_likes']}} reacções</a>
                                </li>
                                <li>
                                    <a href="{{route('post_index', $dados[$key]['post_uuid'])}}" id="comment-qtd-{{$dados[$key]['post_id']}}">{{$dados[$key]['qtd_comment']}} comentários</a>
                                </li>
                            </ul>
                        </nav>
                        <nav class="row clearfix interaction-user">
                            <ul class="row clearfix ul-interaction-user">
                                <li class="l-5">
                                    <div class="content-button">
                                      <a href="" class="like-a" id="on|{{$dados[$key]['post_uuid']}}">
                                          @if($dados[$key]['reagir_S/N'] > 0)
                                          <i class="fas fa-heart center fa-16 liked" id="on|{{$dados[$key]['post_uuid']}}|i"></i>
                                          <h2 id="on|{{$dados[$key]['post_uuid']}}|h2">Like</h2>
                                          @else
                                          <i class="far fa-heart center fa-16 unliked" id="off|{{$dados[$key]['post_uuid']}}|i"></i>
                                          <h2 id="off|{{$dados[$key]['post_uuid']}}|h2">Like</h2>
                                          @endif
                                      </a>
                                    </div>
                                </li>
                                <li class="l-5">
                                  <div class="content-button comment-send-post" id="comment-{{$dados[$key]['post_id']}}">
                                      <a href="{{route('post_index', $dados[$key]['post_uuid'])}}" id="comment_a-{{$dados[$key]['post_id']}}">
                                          <i class="far fa-comment-alt center fa-16" id="comment_i-{{$dados[$key]['post_id']}}"></i>
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
                                <?php if ($dados[$key]['guardado?']==0): ?>
                                <li class="r-5" id="savepost-{{$dados[$key]['post_id']}}">
                                    <div class="content-button">
                                        <a href="" class="savepost" id="savepost-{{$dados[$key]['post_id']}}">
                                            <i class="far fa-bookmark center fa-16" id="savepost-{{$dados[$key]['post_id']}}"></i>
                                            <h2 id="savepost-{{$dados[$key]['post_id']}}">Guardar</h2>
                                        </a>
                                    </div>
                                </li>
                                  <?php endif ?>
                                                                                      </ul>
                        </nav>
                        <div class="comment-send clearfix" id="comment-send-1">
                          @if( !($conta_logada[0]->foto == null) )
                            <div class="img-user-comment l-5">
                                <img class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_logada[0]->foto }}">
                            </div>
                            @else
                            <div class="img-user-comment l-5">
                                <i class="fas fa-user center" style="font-size: 20px; color: #ccc;"></i>
                            </div>
                              @endif
                            <div class="input-text comment-send-text l-5 clearfix">
                              <input type="text" class="" name="comentario" id="comentario-{{$dados[$key]['post_id']}}" placeholder="O que você tem a dizer?">
                              <div class="r-5 ">
                                  <a href="" class="comentar-a" id="{{$dados[$key]['post_id']}}">
                                      <i class="far fa-paper-plane fa-20 fa-img-comment" id="{{$dados[$key]['post_id']}}"></i>
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
                if(response[0]['comment_S/N'] > 0){
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

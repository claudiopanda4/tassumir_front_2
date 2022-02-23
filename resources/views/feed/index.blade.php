@extends('layouts.app')

@section('content')
<div class="main" id="main-home">
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
                  @for ($i=0; $i< sizeof($what_are_talking); $i++)
                    @if($i < 5)
                        <li class="li-component-stories l-5">
                            <a href="{{route('post_index', $what_are_talking[$i]['post_uuid'])}}">
                                <div class="identify-cover circle">
                                @if( !($what_are_talking[$i]['foto_page'] == null) )
                                    <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $what_are_talking[$i]['foto_page'] }}">
                                @else
                                    <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                @endif
                                </div>
                                <?php if ( $what_are_talking[$i]['formato'] == 2 ): ?>
                                    <img class="img-back-stories center" src="{{asset('storage/img/page/') . '/' . $what_are_talking[$i]['file']}}">
                              <?php elseif ($what_are_talking[$i]['formato'] == 1): ?>
                                    <video controls>
                                        <source src="{{asset('storage/video/page/') . '/' . $what_are_talking[$i]['file']}}" type="video/mp4">
                                        <source src="{{asset('storage/video/page/') . '/' . $what_are_talking[$i]['file']}}" type="video/webcam">
                                    </video>
                                <?php else: ?>
                                <img class="img-back-stories center" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                <?php endif ?>
                                <div class="headline">
                                    <h2 class="center">{{$what_are_talking[$i]['post']}}</h2>
                                </div>
                            </a>
                        </li>
                    @endif
                    @endfor
                    <div class="see-all-stories circle">
                        <a href="">
                            <i class="fas fa-arrow-right fa-16 center"></i>
                        </a>
                    </div>
                </ul>
            </nav>
        </header>
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
<?php foreach ($dados as $key => $value): ?>
  <?php if ($dados[$key]['estado_post'] == 1): ?>
    <?php //dd($conta_logada[0]->uuid); ?>
        <div class="card br-10" id="m_post-{{$dados[$key]['post_id']}}">
            <div class="post post-view" id="post_view_{{$dados[$key]['post_uuid']}}_{{$conta_logada[0]->uuid}}">
                <input type="hidden" name="" value="{{$dados[$key]['formato']}}" id="format-{{$dados[$key]['post_uuid']}}">
                <header class="clearfix">
                    <div class="first-component clearfix l-5">
                        @if( !($dados[$key]['foto_page'] == null) )
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $dados[$key]['foto_page'] }}">
                            </div>
                        @else
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                        @endif
                        <div class="page-identify l-5 clearfix">
                            <a href="{{route('couple.page1', $dados[$key]['page_uuid']) }}"><h1 class="text-ellips">{{$dados[$key]['nome_pag']}}</h1></a>
                            <div class="info-post clearfix">
                                <span class="time-posted l-5">{{$dados[$key]['post_data']}}  as {{$dados[$key]['post_hora']}}</span><div id="seguir-{{$dados[$key]['page_id']}}-{{$dados[$key]['post_id']}}"><?php if ($dados[$key]['seguir_S_N'] == 0): ?>
                                  <span class="seguir-{{$dados[$key]['page_id']}}"><a href="" class="seguir-a r-5"  id="seguir-{{$dados[$key]['page_id']}}-{{$dados[$key]['post_id']}}">seguir</a></span>
                                <?php endif ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="last-component clearfix r-5">
                        <label for=<?php echo "more-option-".$key; ?>>
                            <i class="fas fa-ellipsis-h fa-14 fa-option"></i>
                        </label>
                        <input type="checkbox" name="" id=<?php echo "more-option-".$key; ?> class="hidden">
                        <ul class="clearfix more-option-post">
                          <?php if ($dados[$key]['dono_da_pag'] == 1): ?>
                            <li>
                                <a href="" class="edit-option" id="edit-option|{{$dados[$key]['post_uuid']}}">Editar</a>
                            </li>
                            <?php endif ?>
                            <?php if ($dados[$key]['dono_da_pag'] != 1): ?>
                            <li>
                                <a href="" class="ocultar_post" id="ocultar_post-{{$dados[$key]['post_id']}}">Ocultar Publicação</a>
                            </li>
                            <?php endif ?>
                            <?php if ($dados[$key]['dono_da_pag'] == 1): ?>
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
                </header>
                <div class="card-post">
                    <div class="">
                        @if(strlen($dados[$key]['post']) > 0)
                            <p>{{$dados[0]['post']}}</p>
                        @endif
                        <?php if ( $dados[$key]['formato'] == 2 ): ?>
                        <div class="post-cover post-cover-home">
                            <img class="img-full" src="{{asset('storage/img/page/') . '/' . $dados[$key]['file']}}">
                        </div>
                      <?php elseif ($dados[$key]['formato'] == 1): ?>
                        <div class="video-post" id="video-post-{{$dados[$key]['post_uuid']}}">
                            <img class="play_button center" src="{{asset('storage/icons/play_button.png')}}" id=<?php echo "play_button_".$key ?>>
                            <img class="loader_button center" src="{{asset('storage/icons/aguarde.gif')}}" id=<?php echo "loader_button_".$key ?>>
                            <video class="video-post-video" id="video_{{$key}}">

                                Your browser does not support the video tag.
                            </video>
                            <input type="hidden" name="" value="post_view_{{$dados[$key]['post_uuid']}}_{{$conta_logada[0]->uuid}}" id="watch-video-{{$key}}">
                            <input type="hidden" name="" value="{{$dados[$key]['post_uuid']}}" id="vid-{{$key}}">
                            <input type="hidden" name="" id="has-video-{{$key}}">
                            <input type="hidden" name="" id="video-post-time-{{$key}}">
                            <input type="hidden" name="" id="video-post-time-all-{{$key}}">
                        </div>
                        <?php endif ?>
                    </div>
                </div>
                <nav class="row interaction-numbers">
                    <ul class="">
                        <li>
                            <i class="fas fa-heart fa-16" style="display: inline-flex; margin-right: 5px; color: red;"></i><a href="" id="likes-qtd-{{$dados[$key]['post_uuid']}}">{{$dados[$key]['qtd_likes']}} reacções</a>
                        </li>
                        <li>
                            <a href="{{route('post_index', $dados[$key]['post_uuid'])}}" id="comment-qtd-{{$dados[$key]['post_id']}}">{{$dados[$key]['qtd_comment']}} comentários</a>
                        </li>
                        <?php if (false): ?>
                        <li>
                            <a href="">0 partilhas</a>
                        </li>
                        <?php endif ?>
                    </ul>
                </nav>
                <nav class="row clearfix interaction-user">
                    <ul class="row clearfix ul-interaction-user">
                        <li class="l-5">
                            <div class="content-button">
                                <a href="" class="like-a" id="on|{{$dados[$key]['post_uuid']}}">
                                    @if($dados[$key]['reagir_S_N'] > 0)
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
                                <a href="" id="comment_a-{{$dados[$key]['post_id']}}">
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
                        <?php if ($dados[$key]['guardado']==0): ?>
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
                <div class="comment-send clearfix"  id="comment-send-{{$dados[$key]['post_id']}}">
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
                        <?php if (false): ?>
                        <div class="r-5 " id="">
                            <a href="">
                                <i class="far fa-images fa-20 fa-img-comment"></i>
                            </a>
                        </div>
                        <?php endif ?>

                    </div>
                </div>
                <div class="comment-users comment-users-own" id="comment-users-own-{{$dados[$key]['post_id']}}">
                    <div class="comment-user-container">
                        <div class="user-identify-comment user-identify-comment-feed">
                          @if( $dados[$key]['dono_da_pag']==0 )
                            @if( !($conta_logada[0]->foto == null) )
                            <div class="profille-img">
                                <img  class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_logada[0]->foto }}">
                            </div>
                            @else
                            <div class="profille-img">
                                  <i class="fas fa-user center" style="font-size: 20px; color: #ccc;"></i>
                            </div>
                        @endif
                      @elseif( $dados[$key]['dono_da_pag']==1 )
                        @if( !($dados[$key]['foto_page'] == null) )
                          <div class="profille-img">
                            <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $dados[$key]['foto_page'] }}">
                          </div>
                        @else
                          <div class="profille-img">
                            <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                          </div>
                          @endif
                      @endif
                        </div>
                        <div class="comment-user-comment comment-user-comment-feed">
                            <p class="text-ellips" id="comment-own-{{$dados[$key]['post_id']}}"></p>
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react" name="novo-comment">

                    </div>
                </div>
                
        <?php if ($dados[$key]['qtd_comment']>0): ?>
          <div class="comment-users" id="comment-users-{{$dados[$key]['post_id']}}">
                    <div class="comment-user-container" >
                        <div class="user-identify-comment user-identify-comment-feed">
                          @if( $dados[$key]['foto_ver']==1 )
                            @if( !($dados[$key]['foto_conta'] == null) )
                            <div class="profille-img">
                                <img  class="img-full circle" src="{{ asset('storage/img/users') . '/' . $dados[$key]['foto_conta'] }}">
                            </div>
                            @else
                            <div class="profille-img">
                                  <i class="fas fa-user center fa-16" style="color: #ccc;"></i>
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
                            <h2 class="text-ellips">{{$dados[$key]['nome_comment']}}</h2>
                        </div>
                        <div class="comment-user-comment comment-user-comment-feed">
                            <p class="text-ellips">{{$dados[$key]['comment']}}</p>
                        </div>
                    </div>
                      <div class="comment-user-container comment-user-container-react">
                        <a href="" class="comment-like-a" id="on|{{$dados[$key]['comment_id']}}">
                            @if($dados[$key]['comment_S_N'] > 0)
                                <i class="fas fa-heart fa-12 liked" id="on|{{$dados[$key]['comment_id']}}|i"></i>
                            @else
                                <i class="far fa-heart fa-12 unliked" id="off|{{$dados[$key]['comment_id']}}|i"></i>
                            @endif
                          </a>
                      </div>
                </div>
                <script type="text/javascript">
                    document.addEventListener('DOMContentLoaded', function(){
                        document.addEventListener('click', function() {
                            alert('oi');
                        });
                    });
                </script>
              <?php endif ?>
                <div>

                </div>
            </div>
        </div>
        <?php //dd($last_post_dest.' '.$last_post_id); ?>
      <?php endif ?>
        <?php if ($key == 3 || $key == 7): ?>
                <section class="suggest-slide">
                    <header>
                        <h1>Sugestões pra você</h1>
                    </header>
                    <nav class="clearfix">
                        <ul id="sugest_index" class="clearfix">
                @forelse($paginasNaoSeguidas as $Paginas)
                <?php $conta_page = 0;
                 $verifica1 = 'A';
                 $verifica = 'B';
                 $seguidors = 0;
                 $tamanho = 0;
                 ?>
                <?php
                foreach ($dadosSeguida as  $val){
                        if ($val->id == $Paginas->page_id) {
                            $seguidors += 1;

                        }
                    }
                ?>

                        <li class="li-component-suggest clearfix l-5 sugest_page" id="li-component-suggest-{{$Paginas->page_id}}">
                                    <div class="clearfix sugest_component_div">
                                        @if( !($Paginas->foto == null) )
                                            <div class="sugest_component circle clearfix">
                                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $Paginas->foto }}">
                                            </div>
                                        @else
                                            <div class="sugest_component circle clearfix">
                                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                            </div>
                                        @endif
                                    </div>
                                    <h1 class="name-suggest text-ellips">{{ $Paginas->nome }}</h1>
                                    <a href="" class="seguir_index" ><div id="{{ $Paginas->page_id }}">seguir</div></a>
                                    <input type="hidden" id="conta_id" value="{{ $account_name[0]->conta_id }}" name="">
                                   <input type="hidden" name="" value="0" id="last_page">
                                </li>
                                @empty

                                @endforelse
                        </ul>
                    </nav>
                </section>
            <?php endif ?>
        <?php endforeach ?>
        <div class="reload-component" id="reload-component-1">
            <img class="center" src="{{asset('storage/icons/aguarde1.gif')}}">
        </div>
      </div>
        <div class="control" id="control-1">

        </div>
        <div>
            <!--<form action="{{route('account.home')}}" method="get">
                @if(sizeof($dados) > 0)
                    <div class="btn-see-more" id="btn-see-more-id">
                        <button type="submit" id="see-more-button" name="">
                            Ver Mais
                        </button>
                    </div>
                <input type="hidden" id="" name="checked" value='true'>
                @else
                    <div class="home-no-post">
                        <h1>Sem Publicações novas pra si</h1>
                    </div>
                    <div class="btn-see-more" id="btn-see-more-id">
                        <button type="submit" id="see-more-button" name="">
                            Voltar
                        </button>
                    </div>
                @endif
            </form>

            @if(sizeof($dados) > 0)
                <div class="btn-see-more" id="btn-see-more-id">
                  <a href="{{route('account.home.feed')}}">
                    <button type="submit" id="see-more-button" name="">
                        Ver Mais
                    </button>
                    </a>
                </div>
            @else
                <div class="home-no-post">
                    <h1>Sem Publicações novas pra si</h1>
                </div>
                <div class="btn-see-more" id="btn-see-more-id">
                  <a href="{{route('account.home.feed')}}">
                    <button type="button" id="see-more-button" name="">
                        Voltar
                    </button>
                    </a>
                </div>
            @endif-->
        </div>
</div>

        <script type="text/javascript">
        $(document).ready(function(){
            $('.like-a').click(function (e) {
                e.preventDefault();
                let id = e.target.id.split('|');
                  if(id[0] == "on"){
                    gostar(id[1]);
                    let new_id = "off|" + id[1] + "|i";
                    document.getElementById("on|" + id[1] + "|i").setAttribute('id', new_id);
                    document.getElementById("off|" + id[1] + "|i").classList.remove('fas');
                    document.getElementById("off|" + id[1] + "|i").classList.remove('liked');
                    document.getElementById("off|" + id[1] + "|i").classList.add('far');
                  } else if(id[0] == "off") {
                    gostar(id[1]);
                    let new_id = "on|" + id[1] + "|i";
                    document.getElementById("off|" + id[1] + "|i").setAttribute('id', new_id);
                    document.getElementById("on|" + id[1] + "|i").classList.add('fas');
                    document.getElementById("on|" + id[1] + "|i").classList.add('liked');
                    document.getElementById("on|" + id[1] + "|i").classList.remove('far');
                  }
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

  function seguir(id, id2){

     $.ajax({
        url: "{{route('seguir')}}",
        type: 'get',
        data: {'id': id},
         dataType: 'json',
         success:function(response){
         console.log(response);
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
                nome +=     '</a>'

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

    $(document).ready(function () {
      document.getElementById("route_feed").classList.add('li-component-aside-active');

            $('.seguir_index').click(function(e){
            e.preventDefault();
            var valor_pagina_id = e.target.id;
            var valor_idconta = $('#conta_id').val();
            var an = $('.seguir_index').text();

            if (($('.sugest_page').eq(2).attr("id")) == null) {
                if (($('#last_page').val()) != 0) {
                    var id_last_page = $('#last_page').val();
                }else{
                    var id_last_page = 0;
                }
            }else{
               var id_last_page = $('.sugest_page').eq(2).attr("id").split('-')[3];
            }            //$('#' + valor_pagina_id).empty();
            alert('valor_pagina_id: '+valor_pagina_id+'valor_idconta: '+valor_idconta+'last_page: '+id_last_page);
             $.ajax({
                url: "{{route('seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': valor_idconta, 'seguida': valor_pagina_id, 'last_page': id_last_page},
                dataType: 'json',
                success: function(response){
                  console.log(response);
                  $('#li-component-suggest-' + valor_pagina_id).remove();
                  $('#li-component-suggest-' + valor_pagina_id).remove();
                  $('#li-component-sugest-' + valor_pagina_id).remove();
                  $('.seguir-' + valor_pagina_id).hide();
                  if (response.page != 'Vazio') {
                  $.each(response.page, function(key, value){
                    $('#last_page').val(value.page_id);
                    if (value.foto != null) {
                    let src = "{{asset('storage/img/users/')}}" + "/" + value.foto;
                        $('#sugest_index').append("<li class='li-component-suggest clearfix l-5' id='li-component-suggest-'"+value.page_id+"><div class='clearfix sugest_component_div'><div class='sugest_component circle clearfix'><img class='img-full circle' src="+src+"></div></div><h1 class='name-suggest text-ellips'>"+value.nome+"</h1><a href='' class='seguir_index' ><div id="+value.page_id+">seguir</div></a><input type='hidden' id='conta_id' value="+response.id_user+" name=''></li>");
                    }else{
                        let src = "{{asset('storage/img/page/unnamed.jpg')}}";
                        $('#sugest_index').append("<li class='li-component-suggest clearfix l-5' id='li-component-suggest-'"+value.page_id+"><div class='clearfix sugest_component_div'><div class='sugest_component circle clearfix'><img class='img-full circle' src="+src+"></div></div><h1 class='name-suggest text-ellips'>"+value.nome+"</h1><a href='' class='seguir_index' ><div id="+value.page_id+">seguir</div></a><input type='hidden' id='conta_id' value="+response.id_user+" name=''></li>");
                    }
                });
                }
                }
              });
             });
            });

            function home_index(){
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
            }

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
                            console.log(control_.top + " " + $(document).height());
                            if (control_.top <= $(document).height()) {
                                //alert('carregar');
                                //alert('oi');
                          home_index();
                                //---DS console.log('last_post_id ' + $('#last_post').val());
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

                            alert(contar);
                              contar++;

                            $.ajax({
                               url: "{{route('pegar_mais_post')}}",
                               type: 'get',
                               dataType: 'json',
                               success: function(response){
                                 console.log(response);
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
                                       nome += '<div class="page-cover circle l-5">'
                                       nome += '<img  class="img-full circle" src=' + src1 + '/' + value.foto_page + '> </div>'

                                   }else{
                                       nome += '<div class="page-cover circle l-5">'
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
                                   nome +='<label for= "more-option-'+key+'";>'
                                   nome +='<i class="fas fa-ellipsis-h fa-14 fa-option"></i></label>'
                                   nome +='<input type="checkbox" name="" id="more-option-'+key+'" class="hidden">'
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
                                     nome +='<p class="untext"></p>'
                                   }else {
                                     nome +='<p>'+value.post+'</p>'
                                   }
                                   if (value.formato == 2) {
                                     nome +='<div class="post-cover post-cover-home"> <img  class="img-full circle" src=' + src1 + '/' + value.file + '> </div>'
                                   }else if (value.formato == 1) {
                                     nome +='<div class="video-post" id="video-post-'+value.post_uuid+'}"> <img class="play_button center" src="{{asset("storage/icons/play_button.png")}}" id="play_button_'+key+'"> <img class="loader_button center" src="{{asset("storage/icons/aguarde.gif")}}" id="loader_button_'+key+'"> <video class="video-post-video" id="video_'+key+'"> Your browser does not support the video tag.</video>'
                                     nome +='<input type="hidden" name="" value="post_view_'+value.post_uuid+'_'+value.conta_logada_uuid+'" id="watch-video-'+key+'"> <input type="hidden" name="" value="'+value.post_uuid+'" id="vid-'+key+'"> <input type="hidden" name="" id="has-video-'+key+'"> <input type="hidden" name="" id="video-post-time-'+key+'}"> <input type="hidden" name="" id="video-post-time-all-'+key+'"></div></div></div>'
                                   }
                                   nome +=' <nav class="row interaction-numbers"><ul class=""><li> <i class="fas fa-heart fa-16" style="display: inline-flex; margin-right: 5px; color: red;"></i><a href="" id="likes-qtd-'+value.post_uuid+'">'+value.qtd_likes+' reacções</a></li>'
                                   nome +='<li><a href='+url_link1+' id="comment-qtd-'+value.post_id+'">'+value.qtd_comment+' comentários</a></li>'
                                   if (false) {
                                     nome +='<li><a href="">0 partilhas</a></li>'
                                   }
                                   nome +=' </ul></nav><nav class="row clearfix interaction-user"><ul class="row clearfix ul-interaction-user"><li class="l-5"><div class="content-button">'
                                   nome +='<a href="" class="like-a" id="on|'+value.post_uuid+'">'
                                   if (value.reagir_S_N  > 0) {
                                     nome +='<i class="fas fa-heart center fa-16 liked" id="on|'+value.post_uuid+'|i"></i> <h2 id="on|'+value.post_uuid+'|h2">Like</h2>'
                                   }else {
                                     nome +='<i class="far fa-heart center fa-16 unliked" id="off|'+value.post_uuid+'|i"></i> <h2 id="off|'+value.post_uuid+'|h2">Like</h2>'
                                   }
                                   nome +=' </a></div></li><li class="l-5"><div class="content-button comment-send-post" id="comment-'+value.post_id+'"><a href="" id="comment_a-'+value.post_id+'"><i class="far fa-comment-alt center fa-16" id="comment_i-'+value.post_id+'"></i><h2>Comentar</h2></a></div></li>'
                                   nome +='<li class="r-5"><div class="content-button"><a href=""><i class="far fa-share-square fa-16"></i><h2>Partilhar</h2></a></div></li>'
                                   if (value.guardado ==0) {
                                     nome +=' <li class="r-5" id="savepost-'+value.post_id+'"><div class="content-button"><a href="" class="savepost" id="savepost-'+value.post_id+'"><i class="far fa-bookmark center fa-16" id="savepost-'+value.post_id+'"></i><h2 id="savepost-'+value.post_id+'">Guardar</h2></a></div></li>'
                                   }
                                   nome +='</ul></nav><div class="comment-send clearfix"  id="comment-send-'+value.post_id+'">'
                                   if (value.conta_logada_foto != null) {
                                     nome +='<div class="img-user-comment l-5"><img  class="img-full circle" src=' + src + '/' + value.conta_logada_foto + '></div>'
                                   }else {
                                     nome +='<div class="img-user-comment l-5"><i class="fas fa-user center" style="font-size: 20px; color: #ccc;"></i></div>'
                                   }
                                   nome +='<div class="input-text comment-send-text l-5 clearfix"><input type="text" class="" name="comentario" id="comentario-'+value.post_id+'" placeholder="O que você tem a dizer?">'
                                   nome +='<div class="r-5 "><a href="" class="comentar-a" id="'+value.post_id+'"><i class="far fa-paper-plane fa-20 fa-img-comment" id="'+value.post_id+'"></i></a></div>'
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
                                         nome += '<div class="page-cover circle l-5">'
                                         nome += '<img  class="img-full circle" src=' + src1 + '/' + value.foto_page + '> </div>'

                                     }else{
                                         nome += '<div class="page-cover circle l-5">'
                                         nome +='<img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"> </div>'
                                     }
                                   }
                                   nome +='</div><div class="comment-user-comment comment-user-comment-feed"><p class="text-ellips" id="comment-own-'+value.post_id+'"></p></div></div><div class="comment-user-container comment-user-container-react" name="novo-comment"></div></div>'
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
                                     nome +='<h2 class="text-ellips">'+value.nome_comment+'</h2></div><div class="comment-user-comment comment-user-comment-feed"><p class="text-ellips">'+value.comment+'</p></div> </div><div class="comment-user-container comment-user-container-react"><a href="" class="comment-like-a" id="on|'+value.comment_id+'">'
                                     nome +=''
                                     if (value.comment_S_N>0) {
                                       nome +='<i class="fas fa-heart fa-12 liked" id="on|'+value.comment_id+'|i"></i>'
                                     }else {
                                       nome +=' <i class="far fa-heart fa-12 unliked" id="off|'+value.comment_id+'|i"></i>'
                                     }
                                     nome +='</a></div></div>'
                                   }

                                   nome +='<di></di></di></div>'

                                   $('div[name=div_father_post]').append(nome);
                                   contar = 0;
                               })
                               }}
                             });


                        }
                        }
                        //console.log('janela width ' + window.innerWidth);
                        window_width = window.innerWidth;
                        //console.log('scroll log: ' + $('.main').scrollTop());
                        console.log('janela width ' + window.innerWidth);
                        window_width = window.innerWidth;
                        console.log('scroll log: ' + $('.main').scrollTop());
                        $(document).scroll(function() {
                           if($(window).scrollTop() + $(window).height() == $(document).height()) {
                               alert("bottom!");
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

                            if ($('#video_' + id)) {
                                offset_video = $('#video_' + id).offset();
                                //console.log('offset video ' + offset_video.top);
                                video_post_time = $('#video-post-time-' + id);
                                if(offset_video.top < 190 && offset_video.top > -300){
                                    //console.log('hasvideo ' + id + ' ' + $('#has-video-' + id).val());
                                    if ($('#has-video-' + id).val() != "ok") {
                                        //console.log('entrou');
                                        getVideo($('#vid-' + id).val(), id);
                                    }else{
                                        ////console.log('não entrou');
                                        $('#video-post-time-all-' + id).val(document.getElementById('video_' + id).duration / 2);
                                        if (!(document.getElementById('video_' + id).paused) && $('#has-video-' + id).val() == 'ok') {
                                            currentTime = document.getElementById('video_' + id).currentTime;
                                            duration = document.getElementById('video_' + id).duration;
                                            $('#video-post-time-' + id).val(currentTime);
                                            //console.log('currentTime de video_' + id + ' = ' + $('#video-post-time-' + id).val());
                                            if (currentTime >= (duration / 2)) {
                                                watched_video = $('#watch-video-' + id).val();
                                                //console.log('entrou no video watch-video ' + watched_video);
                                                add_view(watched_video);
                                            }
                                        } else {
                                            if (document.getElementById('video_' + id).readyState == 4) {
                                                document.getElementById('video_' + id).play();
                                                document.getElementById('play_button_' + id).classList.add('invisible');
                                            }
                                        }
                                    }

                                } else {
                                    document.getElementById('video_' + id).pause();
                                    document.getElementById('play_button_' + id).classList.remove('invisible');
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
                    }, 100);

</script>
@stop

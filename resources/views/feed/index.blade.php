@extends('layouts.app')

@section('content')
<div class="main">
<header class="card more-following" id="card-more-following">
    <ul>
        <li>

        </li>
    </ul>
</header>
<header class="card br-10 stories stories-about-talking" id="stories-card">
            <header>
                <h1>O que estão bombando...</h1>
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
                                <span class="time-posted l-5">50 min</span><div id="seguir-{{$dados[$key]['page_id']}}-{{$dados[$key]['post_id']}}"><?php if ($dados[$key]['seguir_S/N'] == 0): ?>
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
                          <?php if ($dados[$key]['dono_da_pag?'] == 1): ?>
                            <li>
                                <a href="" class="edit-option" id="edit-option-{{$dados[$key]['post_id']}}">Editar</a>
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
                </header>
                <div class="card-post">
                    <div class="">
                        @if($dados[$key]['post'] == "" || $dados[$key]['post'] == null
                        || $dados[$key]['post'] == " " || $dados[$key]['post'] == "null")
                            <p class="untext"></p>
                        @else
                            <p>{{$dados[$key]['post']}}</p>
                        @endif
                        <?php if ( $dados[$key]['formato'] == 2 ): ?>
                        <div class="post-cover">
                            <img class="img-full" src="https://images2.imgbox.com/e1/fc/BIrBWbBS_o.png">
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
                          @if( $dados[$key]['dono_da_pag?']==0 )
                            @if( !($conta_logada[0]->foto == null) )
                            <div class="profille-img">
                                <img  class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_logada[0]->foto }}">
                            </div>
                            @else
                            <div class="profille-img">
                                  <i class="fas fa-user center" style="font-size: 20px; color: #ccc;"></i>
                            </div>
                        @endif
                      @elseif( $dados[$key]['dono_da_pag?']==1 )
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
                            <p class="text-ellips" id="comment-own-{{$dados[$key]['post_id']}}">Amo muito esse casal</p>
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
                            @if($dados[$key]['comment_S/N'] > 0)
                                <i class="fas fa-heart fa-12 liked" id="on|{{$dados[$key]['comment_id']}}|i"></i>
                            @else
                                <i class="far fa-heart fa-12 unliked" id="off|{{$dados[$key]['comment_id']}}|i"></i>
                            @endif
                          </a>
                      </div>
                </div>
              <?php endif ?>
                <div>

                </div>
            </div>
        </div>
        <input type="hidden" id="last_post" value=<?php echo $last_post_id; ?>>
        <input type="hidden" id="last_post_dest" value=<?php echo $last_post_dest; ?>>
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
        <div class="control" id="control-1">
            
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

    $(document).ready(function () {
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

</script>
@stop

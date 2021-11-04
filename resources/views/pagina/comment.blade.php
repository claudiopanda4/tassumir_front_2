@extends('layouts.app')

@section('content')
<div class="main">
    <div class="card br-10">
            <div class="post">
                <header class="clearfix">
                    <div class="first-component clearfix l-5">
                      @if( !($dados[0]['foto_page'] == null) )
                          <div class="page-cover circle l-5">
                              <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $dados[0]['foto_page'] }}">
                          </div>
                      @else
                          <div class="page-cover circle l-5">
                              <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                          </div>
                      @endif
                        <div class="page-identify l-5 clearfix">
                            <a href="{{route('couple.page1', $dados[0]['page_uuid']) }}"><h1 class="">{{$dados[0]['nome_pag']}}</h1></a>
                            <div class="info-post clearfix">
                                <span class="time-posted l-5">50 min</span><div id="seguir"><?php if ($dados[0]['seguir_S/N'] == 0): ?>
                                  <a href="" class="seguir-a r-5" id="{{$dados[0]['page_id']}}">seguir</a>
                                <?php endif; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="last-component clearfix r-5">
                        <label for="more-option-1">
                            <i class="fas fa-ellipsis-h fa-15 fa-option"></i>
                        </label>
                        <input type="checkbox" name="" id="more-option-1" class="hidden">
                        <ul class="clearfix more-option-post">
                          <?php if ($dados[0]['dono_da_pag?'] == 1): ?>
                            <li>
                                <a href="">Editar</a>
                            </li>
                            <?php endif; ?>
                            <?php if ($dados[0]['dono_da_pag?'] != 1): ?>
                            <li>
                                <a href="" class="ocultar_post" id="ocultar_post-{{$dados[0]['post_id']}}">Ocultar Publicação</a>
                            </li>
                            <?php endif; ?>
                            <?php if ($dados[0]['dono_da_pag?'] == 1): ?>
                            <li>
                                <a href="" class="delete_post" id="delete_post-{{$dados[0]['post_id']}}">Apagar Publicação</a>
                            </li>
                            <?php endif; ?>
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
                        <p>{{$dados[0]['post']}}</p>
                        <?php if ( $dados[0]['formato'] == 2 ): ?>
                        <div class="post-cover">
                            <img class="img-full" src="{{asset('storage/img/page/') . '/' . $dados[0]['file']}}">
                        </div>
                      <?php elseif ($dados[0]['formato'] == 1): ?>
                        <div class="video-post">
                            <video controls
                                <source src="{{asset('storage/video/page/') . '/' . $dados[0]['file']}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <?php endif ?>
                                          </div>
                </div>
                <nav class="row interaction-numbers">
                    <ul class="">
                      <li>
                          <i class="fas fa-heart fa-16" style="display: inline-flex; margin-right: 5px; color: red;"></i><a href="" id="likes-qtd-{{$dados[0]['post_id']}}">{{$dados[0]['qtd_likes']}} reacções</a>
                      </li>
                      <li>
                          <a href="" id="comment-qtd-{{$dados[0]['post_id']}}">{{$dados[0]['qtd_comment']}} comentários</a>
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
                              <?php if ($dados[0]['reagir_S/N'] == 0): ?>
                                <a href="" class="like-a" id="on-{{$dados[0]['post_id']}}">
                                    <i class="far fa-heart center fa-16" id="on-{{$dados[0]['post_id']}}-i"></i>
                                    <h2 id="on-{{$dados[0]['post_id']}}-h2">Like</h2>
                                </a>
                                <?php else: ?>
                                  <a href="" class="like-a" id="off-{{$dados[0]['post_id']}}">
                                      <i class="fas fa-heart center fa-16" id="off-{{$dados[0]['post_id']}}-i"></i>
                                      <h2 id="off-{{$dados[0]['post_id']}}-h2">Like</h2>
                                  </a>
                                  <?php endif; ?>
                            </div>
                        </li>
                        <li class="l-5">
                          <div class="content-button comment-send-post" id="comment-{{$dados[0]['post_id']}}">
                              <a href="" id="comment_a-{{$dados[0]['post_id']}}">
                                  <i class="far fa-comment-alt center fa-16" id="comment_i-{{$dados[0]['post_id']}}"></i>
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
                        <?php if ($dados[0]['guardado?']==0): ?>
                        <li class="r-5" id="savepost-{{$dados[0]['post_id']}}">
                            <div class="content-button">
                                <a href="" class="savepost" id="savepost-{{$dados[0]['post_id']}}">
                                    <i class="far fa-bookmark center fa-16" id="savepost-{{$dados[0]['post_id']}}"></i>
                                    <h2 id="savepost-{{$dados[0]['post_id']}}">Guardar</h2>
                                </a>
                            </div>
                        </li>
                          <?php endif; ?>
                    </ul>
                </nav>
                <div class="comment-send clearfix"  id="comment-send-{{$dados[0]['post_id']}}">
                  @if( !($conta_logada[0]->foto == null) )
                    <div class="img-user-comment l-5">
                        <img class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_logada[0]->foto }}">
                    </div>
                    @else
                    <div class="img-user-comment l-5">
                        <i class="fas fa-user center" style="font-size: 50px; color: #ccc;"></i>
                    </div>
                      @endif
                    <div class="input-text comment-send-text l-5 clearfix">
                        <input type="text" class="" name="comentario" id="comentario-{{$dados[0]['post_id']}}" placeholder="O que você tem a dizer?">
                        <div class="r-5 ">
                            <a href="" class="comentar-a" id="{{$dados[0]['post_id']}}">
                                <i class="far fa-paper-plane fa-20 fa-img-comment" id="{{$dados[0]['post_id']}}"></i>
                            </a>
                        </div>
                        <div class="r-5 " id="">
                            <a href="">
                                <i class="far fa-images fa-20 fa-img-comment"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="comment-users comment-users-own" id="comment-users-own-{{$dados[0]['post_id']}}">
                    <div class="comment-user-container">
                        <div class="user-identify-comment">
                          @if( $dados[0]['dono_da_pag?']==0 )
                            @if( !($conta_logada[0]->foto == null) )
                            <div class="profille-img">
                                <img  class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_logada[0]->foto }}">
                            </div>
                            @else
                            <div class="profille-img">
                                  <i class="fas fa-user center" style="font-size: 20px; color: #ccc;"></i>
                            </div>
                        @endif
                      @elseif( $dados[0]['dono_da_pag?']==1 )
                        @if( !($dados[0]['foto_page'] == null) )
                          <div class="profille-img">
                            <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $dados[0]['foto_page'] }}">
                          </div>
                        @else
                          <div class="profille-img">
                            <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                          </div>
                          @endif
                      @endif
                        </div>
                        <div class="comment-user-comment">
                            <h1></h1>
                            <p class="" id="comment-own-{{$dados[0]['post_id']}}">Amo muito esse casal</p>
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react">
                        <i class="far fa-heart fa-12"></i>
                    </div>
                </div>
                <?php if ($dados[0]['qtd_comment']>0): ?>
                  <?php foreach ($comment as $key => $value): ?>


                  <div class="comment-users" id="comment-users-{{$dados[0]['post_id']}}">
                            <div class="comment-user-container" >
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
                                    <h1 class="user">Claudio Panda</h1>
                                    <p class="">{{$value->comment}}</p>
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
                              </div>
                        </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                <div>

                </div>
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
  function seguir(id){

     $.ajax({
        url: "{{route('seguir')}}",
        type: 'get',
        data: {'id': id},
         dataType: 'json',
         success:function(response){
         console.log(response);
         $('#seguir').hide();

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
           comment_qtd = parseInt(comment_qtd) + 1;
           $("#comment-qtd-" + id).text((comment_qtd) + " comentários");
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


                }
              });
            }
</script>
@stop

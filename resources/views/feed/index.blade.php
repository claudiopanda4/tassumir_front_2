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
                <h1>O que estão falando...</h1>
            </header>
            <nav>
                <ul class="clearfix">
                    <?php
                    $about_talking = [
                        [],[],[],[],[],
                    ];
                    foreach ($about_talking as $key => $value): ?>
                        <li class="li-component-stories l-5">
                            <a href="">
                                <div class="identify-cover circle">
                                    <img class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                                </div>
                                <img class="img-back-stories center" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                <div class="headline">
                                    <h2 class="center">Yola Araújo oferece presente de 1 ano de...</h2>
                                </div>
                            </a>
                        </li>
                    <?php endforeach ?>
                    <div class="see-all-stories circle">
                        <a href="">
                            <i class="fas fa-arrow-right fa-16 center"></i>
                        </a>
                    </div>
                </ul>
            </nav>
        </header>
        <?php
      /*  $posts_feed = [
            [
                "type" => "img",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "video",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "img",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "video",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "none",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "img",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "img",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "video",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
            [
                "type" => "none",
                "page" => "Famosos em Relacionamentos",
                "time" => "50 min",
                "link" => "",
                "text-post" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
            ],
        ];*/
        foreach ($dados as $key => $value): ?>

        <?php endforeach ?>
<?php foreach ($dados as $key => $value): ?>
  <?php if ($dados[$key]['estado_post']==1): ?>
        <div class="card br-10" id="m_post-{{$dados[$key]['post_id']}}">
            <div class="post">
                <header class="clearfix">
                    <div class="first-component clearfix l-5">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                        </div>
                        <div class="page-identify l-5 clearfix">
                            <a href="{{route('couple.page1', $dados[$key]['page_uuid']) }}"><h1 class="text-ellips">{{$dados[$key]['nome_pag']}}</h1></a>
                            <div class="info-post clearfix">
                                <span class="time-posted l-5">50 min</span><div id="seguir"><?php if ($dados[$key]['seguir_S/N'] == 0): ?>
                                  <a href="" class="seguir-a r-5" id="{{$dados[$key]['page_id']}}">seguir</a>
                                <?php endif; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="last-component clearfix r-5">
                        <label for=<?php echo "more-option-".$key; ?>>
                            <i class="fas fa-ellipsis-h fa-15 fa-option"></i>
                        </label>
                        <input type="checkbox" name="" id=<?php echo "more-option-".$key; ?> class="hidden">
                        <ul class="clearfix more-option-post">
                          <?php if ($dados[$key]['dono_da_pag?'] == 1): ?>
                            <li>
                                <a href="">Editar</a>
                            </li>
                            <?php endif; ?>
                            <?php if ($dados[$key]['dono_da_pag?'] != 1): ?>
                            <li>
                                <a href="" class="ocultar_post" id="ocultar_post-{{$dados[$key]['post_id']}}">Ocultar Publicação</a>
                            </li>
                            <?php endif; ?>
                            <?php if ($dados[$key]['dono_da_pag?'] == 1): ?>
                            <li>
                                <a href="" class="delete_post" id="delete_post-{{$dados[$key]['post_id']}}">Apagar Publicação</a>
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
                        <p>{{$dados[$key]['post']}}</p>
                        <?php if ( $dados[$key]['formato'] == 2 ): ?>
                        <div class="post-cover">
                            <img class="img-full" src="{{asset('storage/img/page/') . '/' . $dados[$key]['file']}}">
                        </div>
                      <?php elseif ($dados[$key]['formato'] == 1): ?>
                        <div class="video-post">
                            <video controls
                                <source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
                <nav class="row interaction-numbers">
                    <ul class="">
                        <li>
                            <i class="fas fa-heart fa-16" style="display: inline-flex; margin-right: 5px; color: red;"></i><a href="" id="likes-qtd-{{$dados[$key]['post_id']}}">{{$dados[$key]['qtd_likes']}} reacções</a>
                        </li>
                        <li>
                            <a href="" id="comment-qtd-{{$dados[$key]['post_id']}}">{{$dados[$key]['qtd_comment']}} comentários</a>
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
                              <?php if ($dados[$key]['reagir_S/N'] == 0): ?>
                                <a href="" class="like-a" id="on-{{$dados[$key]['post_id']}}">
                                    <i class="far fa-heart center fa-16" id="on-{{$dados[$key]['post_id']}}-i"></i>
                                    <h2 id="on-{{$dados[$key]['post_id']}}-h2">Like</h2>
                                </a>
                                <?php else: ?>
                                  <a href="" class="like-a" id="off-{{$dados[$key]['post_id']}}">
                                      <i class="far fa-heart center fa-16" id="off-{{$dados[$key]['post_id']}}-i"></i>
                                      <h2 id="off-{{$dados[$key]['post_id']}}-h2">Like</h2>
                                  </a>
                                  <?php endif; ?>
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
                          <?php endif; ?>
                    </ul>
                </nav>
                <div class="comment-send clearfix"  id="comment-send-{{$dados[$key]['post_id']}}">
                    <div class="img-user-comment l-5">
                        <img class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                    </div>
                    <div class="input-text comment-send-text l-5 clearfix">
                        <input type="text" class="" name="comentario" id="comentario-{{$dados[$key]['post_id']}}" placeholder="O que você tem a dizer?">
                        <div class="r-5 ">
                            <a href="" class="comentar-a" id="{{$dados[$key]['post_id']}}">
                                <i class="far fa-paper-plane fa-20 fa-img-comment" id="{{$dados[$key]['post_id']}}"></i>
                            </a>
                        </div>
                        <div class="r-5 " id="">
                            <a href="">
                                <i class="far fa-images fa-20 fa-img-comment"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="comment-users comment-users-own" id="comment-users-own-{{$dados[$key]['post_id']}}">
                    <div class="comment-user-container">
                        <div class="user-identify-comment">
                            <div class="profille-img">
                                <img  class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                            </div>
                        </div>
                        <div class="comment-user-comment">
                            <p class="text-ellips" id="comment-own-{{$dados[$key]['post_id']}}">Amo muito esse casal</p>
                        </div>
                    </div>
                    <div class="comment-user-container comment-user-container-react">
                        <i class="far fa-heart fa-12"></i>
                    </div>
                </div>
        <?php if ($dados[$key]['qtd_comment']>0): ?>
          <div class="comment-users" id="comment-users-{{$dados[$key]['post_id']}}">
                    <div class="comment-user-container" >
                        <div class="user-identify-comment">
                            <div class="profille-img">
                                <img  class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                            </div>
                            <h2 class="text-ellips">{{$dados[$key]['nome_comment']}}</h2>
                        </div>
                        <div class="comment-user-comment">
                            <p class="text-ellips">{{$dados[$key]['comment']}}</p>
                        </div>
                    </div>
                      <div class="comment-user-container comment-user-container-react">
                        <a href="" class="comments_like" id="on-{{$dados[$key]['comment_id']}}">
                          <i class="far fa-heart fa-12" id="on-{{$dados[$key]['comment_id']}}"></i>
                      </div>
                </div>
              <?php endif; ?>
                <div>

                </div>
            </div>
        </div>
      <?php endif; ?>
        <?php if ($key == 2): ?>
                <section class="suggest-slide">
                    <header>
                        <h1>Sugestões pra você</h1>
                    </header>
                    <nav class="clearfix">
                        <ul class="clearfix">
                            <?php
                            $suggest_page = [
                                [],[],[],[],[],[],[],
                            ];
                            foreach ($suggest_page as $key => $value): ?>
                                <li class="li-component-suggest clearfix l-5">
                                    <div class="clearfix sugest_component_div">
                                        <div class="sugest_component circle clearfix">
                                            <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                        </div>
                                    </div>
                                    <h1 class="name-suggest text-ellips">Criticando casais</h1>
                                    <a href="" class=""><div>seguir</div></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </nav>
                </section>
            <?php endif ?>
        <?php endforeach ?>
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
                 $("#m_post-" + id).hide();

                }
              });
            }
</script>
@stop

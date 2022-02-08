@extends('layouts.app')

@section('content')
<div class="main" id="main-container-profile">
    <div class="card br-10 card-flex card-page">
        <div class="clearfix page-card-header">
            <div class="img-profile-page-container clearfix l-5">
                @if($page_content[0]->foto)
                    <div class="img-profile-page circle l-5">
                        <img src="{{asset('storage/img/page/') . '/' . $page_content[0]->foto}}" class="img-full circle">
                    </div>
                @else
                    <div class="img-profile-page circle l-5">
                        <img src="{{asset('storage/img/page/unnamed.jpg')}}" class="img-full circle">
                    </div>
                @endif

                @if($v==1)
                    <label for="target-profile-cover-page">
                        <div class="add-edit-profile circle">
                            <i class="fas fa-plus center" style="font-size: 10px;"></i>
                        </div>
                    </label>
                @endif
            </div>
            <div class="statistics-profile-page l-5 clearfix">
                <div class="statistics-profile-page-identify">
                    <h1>{{ $page_content[0]->nome }}</h1>
                    <h2 class="lg-invisible-user-name">@<span></span>{{ $page_content[0]->nome }} </h2>
                </div>
                @if($isUserHost)
                    <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-container-lg-1">
                        <div class="statistics-profile-page-component l-5">
                            @if ($publicacoes > 1)
                            <h1>{{ $publicacoes }}</h1>
                            <h2 class="text-ellips">Publicações</h2>
                            @else
                            <h1>{{ $publicacoes }}</h1>
                            <h2 class="text-ellips">Publicação</h2>
                            @endif
                        </div>
                        <?php if (false): ?>
                        <div class="statistics-profile-page-component l-5 invisible">
                            <h1>123</h1>
                            <h2>A Seguir</h2>
                        </div>
                        <?php endif ?>
                        <div class="statistics-profile-page-component l-5">
                            <h1>{{ $seguidores }}</h1>
                            @if ($seguidores > 1)
                                <h2 class="text-ellips">Seguidores</h2>
                            @else
                                <h2 class="text-ellips">Seguidor</h2>
                            @endif

                        </div>
                        <div class="statistics-profile-page-component l-5">
                            <h1>{{ $seguidores }}</h1>
                            <h2 class="text-ellips">Curtidas</h2>
                        </div>
                    </div>
                @else
                    <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-container-lg">
                        <div class="statistics-profile-page-component l-5">
                            @if ($publicacoes > 1)
                            <h1>{{ $publicacoes }}</h1>
                            <h2 class="text-ellips">Publicações</h2>
                            @else
                            <h1>{{ $publicacoes }}</h1>
                            <h2 class="text-ellips">Publicação</h2>
                            @endif
                        </div>
                        <?php if (false): ?>
                        <div class="statistics-profile-page-component l-5 invisible">
                            <h1>123</h1>
                            <h2>A Seguir</h2>
                        </div>
                        <?php endif ?>
                        <div class="statistics-profile-page-component l-5">
                            <h1>{{ $seguidores }}</h1>
                            <h2 class="text-ellips">Seguindo</h2>
                        </div>
                        <div class="statistics-profile-page-component l-5">
                            <h1>{{ $seguidores }}</h1>
                            <h2 class="text-ellips">Curtidas</h2>
                        </div>
                    </div>
                    <div class="follwing-btn-container">
                        <?php $contador = 0;
                              $sgda = 0;
                              $sgdo = 0;
                         ?>
                        @forelse($conta_seguinte as $Seguida)
                        <?php  if (($page_content[0]->page_id == $Seguida)) : ?>
                         <?php $sgda = $page_content[0]->page_id;?>
                         <?php $sgdo = $account_name[0]->conta_id;?>
                        <?php $contador = 1;?>
                        <?php endif ?>
                        @empty
                        @endforelse
                        <?php if ($contador == 1): ?>
                        <button type="submit" class="follwing-btn" id="btn_nao_seguir">
                            Não Seguir
                        </button>
                        <?php else : ?>
                        <button type="submit" class="follwing-btn" id="btn_seguir">
                            Seguir
                        </button>
                        <?php endif ?>
                        <input type="hidden" id="seguinte" value="{{ $account_name[0]->conta_id }}" name="">
                        <input type="hidden" id="seguida_page" value="{{ $page_content[0]->page_id }}" name="">
                        <input type="hidden" id="sgdo" value="{{ $sgdo }}" name="">
                        <input type="hidden" id="sgda" value="{{ $sgda }}" name="">
                    </div>
                @endif
            </div>
            <?php if (true): ?>
                <a href="{{route('page.edit.get', $page_content[0]->uuid)}}">
                    @csrf
                    <div class="edit-page-container">
                        <button type="submit" class="follwing-btn" id="edit-page">
                            Editar
                        </button>
                    </div>
                </a>
            <?php endif ?>

        </div>
        <?php if (false): ?>
            <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-mobile">
                <div class="statistics-profile-page-component l-5">
                   @if ($publicacoes > 1)
                   <h1>{{ $publicacoes }}</h1>
                   <h2>Publicações</h2>
                   @else
                   <h1>{{ $publicacoes }}</h1>
                   <h2>Publicação</h2>
                   @endif
                </div>
                @if (false)
                <div class="statistics-profile-page-component l-5">
                    <h1>123</h1>
                    <h2>A Seguir</h2>
                </div>
                @endif
                <div class="statistics-profile-page-component l-5">
                    <h1>{{ $seguidores }}</h1>
                    <h2>Seguindo</h2>
                </div>
            </div>
        <?php endif ?>
        <div class="clearfix page-card-header">

            <div class="description-couple">
                <h2 class="mobile-user-name">@<span></span>
                    <?php echo strtolower($page_content[0]->nome); ?>
                </h2>

                <h2><span>{{ $casalPageName }}</h2>
            </div>
            <div class="description-couple">
                <p> {{ $page_content[0]->descricao }} </p>
            </div>
        </div>
        @if($v == 1)
        <?php if (true): ?>
            <form action="{{route('page.edit.get', $page_content[0]->page_id)}}" method="get">
                <div class="edit-page-container-mobile">
                    <button type="submit" class="follwing-btn">
                        Editar
                    </button>
                </div>
            </form>
        <?php endif ?>
        @endif
        @if($v == 1)
        <label for="add-post-target" class="add-post-label">
            <div class="add-post circle">
                <i class="far fa-edit fas-20 center" style="font-size: 20px;"></i>
            </div>
        </label>
        @endif
        <section class="suggest-slide suggest-slide-page">
            <header>
                <h1>Sugestões de Páginas pra Você</h1>
            </header>
            <nav class="clearfix">
                <ul id="sugest_couple" class="clearfix">
                            @forelse($paginasNaoSeguidas as $Paginas)
                                <?php $conta_page = 0;
                                    $seguidors = 0;
                                        foreach ($dadosSeguida as  $val){
                                            if ($val->id == $Paginas->page_id) {
                                                $seguidors += 1;

                                            }
                                        }
                                    ?>
                                @if( $Paginas->page_id != $page_content[0]->page_id)
                                <li class="li-component-suggest clearfix l-5 nao_sigo" id="li-component_suggest-{{$Paginas->page_id}}">
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
                                    <a href="" class="seguir_couple" ><div id="{{ $Paginas->page_id }}">seguir</div></a>
                                    <input type="hidden" id="conta_id" value="{{ $account_name[0]->conta_id }}" name="">
                                </li>
                                @endif
                                @empty
                                <li class="li-component-aside-right clearfix">
                                <h1 class="l-5 name-page text-ellips">Nenhuma Página Encontrada</h1>
                                </li>
                            @endforelse
                </ul>
            </nav>
        </section>
        <div class="card br-10 card-page" id="card-profile-option">
            <nav class="option-profile-menu">
                <ul class="">
                    <li><a href="?post-container-post=images"><i class="far fa-images fas-32 center icon-hover-option-profile" style="font-size: 24px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=video"><i class="far fa-play-circle center icon-hover-option-profile" style="font-size: 24px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=post"><i class="fas fa-newspaper center icon-hover-option-profile" style="font-size: 24px;"></i><h1 class="menu-option-profile"></h1></a></li>
                </ul>
            </nav>
            <?php
                $posts = [
                    [],[],[],
                    [],[],[],
                    [],[],[],
                    [],[],[],
                ];
            ?>
            <?php if (isset($_GET['post-container-post'])): ?>
                <?php if ($_GET['post-container-post'] == 'post'): ?>
                <div class="post-img-container-page post-page-container">
                    <?php foreach ($posts as $key => $value): ?>

                    <?php endforeach ?>
                </div>
                <?php endif ?>
                <?php if ($_GET['post-container-post'] == 'video'): ?>
                <div class="post-video-container-page post-page-container">

                    @for($i = 0; $i < count($allPosts); $i++)
                        @if(isset($allPosts[$i]['postVideos']))
                        <a href="">
                            <div class="img-post">
                                <video>
                                    <source src="{{asset('storage/video/page/' . $allPosts[$i]['postVideos'])}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </a>
                        @endif
                    @endfor
                </div>
                <?php endif ?>

                <?php if ($_GET['post-container-post'] == 'images'): ?>
                    <div class="post-img-container-page post-page-container">

                        @for($i = 0; $i < count($allPosts); $i++)
                            @if(isset($allPosts[$i]['postImages']))
                            <a href="">
                                <div class="img-post">
                                    <img src="{{asset('storage/img/page/' . $allPosts[$i]['postImages'])}}" class="img-full">
                                </div>
                            </a>
                            @endif
                        @endfor

                    </div>
                <?php endif ?>

            <?php else: ?>
                <div class="post-img-container-page post-page-container">

                        @for($i = 0; $i < count($allPosts); $i++)
                            @if(isset($allPosts[$i]['postImages']))
                            <a href="">
                                <div class="img-post">
                                    <img src="{{asset('storage/img/page/' . $allPosts[$i]['postImages'])}}" class="img-full">
                                </div>
                            </a>
                            @endif
                        @endfor

                    </div>
            <?php endif ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
            $('.seguir_couple').click(function(e){
            e.preventDefault();
            var valor_pagina_id = e.target.id;
            alert(valor_pagina_id);
            var valor_idconta = $('#conta_id').val();
            var an = $('.seguir_index').text();
            
            var id_last_page = $('.nao_sigo').eq(2).attr("id").split('-')[3];;
            //$('#' + valor_pagina_id).empty();
            $('#li-component-suggest-' + valor_pagina_id).remove();
             $.ajax({
                url: "{{route('seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': valor_idconta, 'seguida': valor_pagina_id, 'last_page': id_last_page},
                dataType: 'json',
                success: function(response){
                  console.log(response);
                  $('#li-component_suggest-' + valor_pagina_id).remove();
                  $('#li-component-suggest-' + valor_pagina_id).remove();
                  $('#li-component-sugest-' + valor_pagina_id).remove();
                  $('.seguir-' + valor_pagina_id).hide();
                  if (response.page != 'Vazio') {
                  $.each(response.page, function(key, value){
                    if (value.foto != null) {
                    let src = "{{asset('storage/img/users/')}}" + "/" + value.foto;
                        $('#sugest_couple').append("<li class='li-component-suggest clearfix l-5' id='li-component-suggest-'"+value.page_id+"><div class='clearfix sugest_component_div'><div class='sugest_component circle clearfix'><img class='img-full circle' src="+src+"></div></div><h1 class='name-suggest text-ellips'>"+value.nome+"</h1><a href='' class='seguir_index' ><div id="+value.page_id+">seguir</div></a><input type='hidden' id='conta_id' value="+response.id_user+" name=></li>");
                    }else{
                        let src = "{{asset('storage/img/page/unnamed.jpg')}}";
                        $('#sugest_couple').append("<li class='li-component-suggest clearfix l-5' id='li-component-suggest-'"+value.page_id+"><div class='clearfix sugest_component_div'><div class='sugest_component circle clearfix'><img class='img-full circle' src="+src+"></div></div><h1 class='name-suggest text-ellips'>"+value.nome+"</h1><a href='' class='seguir_index' ><div id="+value.page_id+">seguir</div></a><input type='hidden' id='conta_id' value="+response.id_user+" name=></li>");
                    }
                });
                }
                }
              });
             });

            $('#btn_seguir').click(function(){
            var valor_pagina_id = $('#seguida_page').val();
            var valor_idconta = $('#seguinte').val();

            $('#li-component-suggest-' + valor_pagina_id).remove();
             $.ajax({
                url: "{{route('seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': valor_idconta, 'seguida': valor_pagina_id},
                dataType: 'json',
                success: function(response){
                  console.log(response);
                  $('#li-component_suggest-' + valor_pagina_id).remove();
                  $('#li-component-suggest-' + valor_pagina_id).remove();
                  $('#li-component-sugest-' + valor_pagina_id).remove();
                  $('.seguir-' + valor_pagina_id).hide();
                  $('#btn_seguir').remove();
                }
              });
             });

            $('#btn_nao_seguir').click(function(){
                alert('Clicaste aqui');
            var seguida = $('#sgda').val();
            var seguindo = $('#sgdo').val();
             $.ajax({
                url: "{{route('nao.seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': seguindo, 'seguida': seguida},
                dataType: 'json',
                success: function(response){
                  console.log(response);
                  $('#seguida-' + seguida).remove();
                  $('#btn_nao_seguir').remove();
                }
              });
             });
        document.getElementById("route_page").classList.add('li-component-aside-active');
                alert('Abriu o Documento');

        
            });
</script>
@stop

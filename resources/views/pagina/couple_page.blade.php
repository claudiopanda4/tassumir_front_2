@extends('layouts.app')

@section('content')
<div class="main" id="main-container-profile">
    <input type="hidden" id="page_couple" value=<?php echo md5('OK'); ?>>
    <div class="card br-10 card-flex card-page">
        <div class="clearfix page-card-header">
            <div class="img-profile-page-container clearfix l-5">
                <div class="img-profile-page circle l-5">
                    <img src="{{asset('storage/img/page/unnamed.jpg')}}" class="img-full circle">
                </div>
                <label for="target-profile-cover-page" id="add-cover">
                    <div class="add-edit-profile circle">
                        <i class="fas fa-plus center" style="font-size: 10px;"></i>
                    </div>
                </label>
            </div>
            <div class="statistics-profile-page l-5 clearfix">
                <div class="statistics-profile-page-identify">
                    <h1>Destacados</h1>
                    <h2 class="lg-invisible-user-name">@<span></span>destacados</h2>
                </div>
                <div class="statistics-profile-page-component-container clearfix" id="statistics-profile-page-component-container-lg-1">
                    <div class="statistics-profile-page-component l-5">
                        <h1>0</h1>
                        <h2 class="text-ellips">Publicações</h2>
                    </div>
                    <div class="statistics-profile-page-component l-5">
                        <h1>0</h1>
                        <h2 class="text-ellips">Seguidores</h2>
                    </div>
                    <div class="statistics-profile-page-component l-5">
                        <h1>0</h1>
                        <h2 class="text-ellips">Curtidas</h2>
                    </div>
                </div>
                <div class="clearfix">
                    <a href="" id="a-btn-flw-edt">
                        <div id="btn_follwing" class="follwing-btn-container l-5">
                            <button type="submit" class="follwing-btn" id="btn_seguir">
                                Seguir
                            </button>
                        </div>                    
                    </a>
                    <div class="l-5 options-profile-btn more-options-profile-bt">
                        <label for="more-option-target-profile" class="target-options-profile">
                            <div class="">
                                <div class="more-options-profile-btn">
                                    <div class="more-options-component"><i class="fas fa-caret-down center" style="font-size: 18px;"></i></div>
                                </div>
                            </div>
                        </label>
                    </div>                    
                </div>

            </div>
        </div>
        <div class="clearfix page-card-header">

            <div class="description-couple">
                <h2 class="mobile-user-name">@<span></span>
                    <?php echo strtolower('destacados'); ?>
                </h2>

                <h2><span>Destacados</h2>
            </div>
            <div class="description-couple">
                <p> Para os destaques da semana </p>
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
        <section class="suggest-slide invisible-component" id="sugest_index_page">
            <header>
                <h1>Sugestões pra você</h1>
            </header>
            <nav class="clearfix">
                <ul class="clearfix"> 
                <?php $key_ = 0; while ($key_ < 8) {?>
                    <li class="li-component-suggest clearfix l-5 sugest_page" id="li-component-suggest-{{$key_}}">
                        <div class="clearfix sugest_component_div" id="sugestcomponentdiv_{{$key_}}">
                            <div class="sugest_component circle clearfix">
                                <img class="img-full circle" id="cover-suggest-index-page-{{$key_}}">
                            </div>
                        </div>
                        <a href="" id="a-name-suggest-index-page-{{$key_}}"><h1 class="name-suggest text-ellips" id="name-suggest-index-page-{{$key_}}"></h1></a>
                        <a href="" class="seguir_index"><div id="{{$key_}}">seguir</div></a>
                        <input type="hidden" id="link_page_{{$key_}}">
                    </li>
                <?php $key_++; } ?>
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
            <?php if (isset($_GET['post-container-post'])): ?>
                <?php if ($_GET['post-container-post'] == 'video'): ?>
                <div class="post-video-container-page post-page-container">
                    <a href="">
                        <div class="img-post">
                            <video>
                                <source src="" type="video/mp4">
                            </video>
                        </div>
                    </a>
                </div>
                <?php endif ?>

                <?php if ($_GET['post-container-post'] == 'images'): ?>
                    <div class="post-img-container-page post-page-container">
                        <a href="">
                            <div class="img-post">
                                <img src="" class="img-full">
                            </div>
                        </a>
                    </div>
                <?php endif ?>
            <?php else: ?>
                <?php $key = 0; while($key < 200){ ?>
                    <div class="post-img-container-page post-page-container invisible-component">
                        <a href="">
                            <div class="img-post">
                                <img src="" class="img-full">
                            </div>
                        </a>
                    </div>
                    <div class="post-video-container-page post-page-container invisible-component">
                        <a href="">
                            <div class="img-post">
                                <video>
                                    <source type="video/mp4">
                                </video>
                            </div>
                        </a>
                    </div>
                <?php $key++; } ?>
            <?php endif ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
            $('.seguir_couple').click(function(e){
            e.preventDefault();
            var valor_pagina_id = e.target.id;
            
            var valor_idconta = $('#conta_id').val();
            var an = $('.seguir_index').text();

            if ($('.nao_sigo').eq(9).attr("id").split('-')[2] != null) {
                var id_last_page = $('.nao_sigo').eq(3).attr("id").split('-')[2];
            }else{
                if ($('.nao_sigo').eq(8).attr("id").split('-')[2] != null) {

                }else{
                    var id_last_page = 0;
                }
            }            //$('#' + valor_pagina_id).empty();
            


            //var id_last_page = $('.nao_sigo').eq(2).attr("id").split('-')[3];;
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
                    let url_link = "{{ route('couple.page1', 0) }}";
                    console.log(url_link);
                        url_array = url_link.split('/');
                        url_link = url_array[0] + "/" + url_array[1] + "/" + url_array[2] + "/" + url_array[3] + "/" + value.uuid;
                    if (value.foto != null) {
                    let src = "{{asset('storage/img/page/')}}" + "/" + value.foto;
                        $('#sugest_couple').append("<li class='li-component-suggest clearfix l-5' id='li-component-suggest-'"+value.page_id+"><div class='clearfix sugest_component_div'><div class='sugest_component circle clearfix'><a href="+url_link+"><img class='img-full circle' src="+src+"></a></div></div><a href="+url_link+"><h1 class='name-suggest text-ellips'>"+value.nome+"</h1></a><a href='' class='seguir_index' ><div id="+value.page_id+">seguir</div></a><input type='hidden' id='conta_id' value="+response.id_user+" name=></li>");
                    }else{
                        let src = "{{asset('storage/img/page/unnamed.jpg')}}";
                        $('#sugest_couple').append("<li class='li-component-suggest clearfix l-5' id='li-component-suggest-'"+value.page_id+"><div class='clearfix sugest_component_div'><div class='sugest_component circle clearfix'><a href="+url_link+"><img class='img-full circle' src="+src+"></a></div></div><a href="+url_link+"><h1 class='name-suggest text-ellips'>"+value.nome+"</h1></a><a href='' class='seguir_index' ><div id="+value.page_id+">seguir</div></a><input type='hidden' id='conta_id' value="+response.id_user+" name=></li>");
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
                  var sgd = $('#qtd_seguidores').text();
                  var qtdsgd = Number(sgd);
                  var novo_qtdsgd = qtdsgd + 1;
                  $('#qtd_seguidores').text(novo_qtdsgd);
                }
              });
             });

            $('#btn_nao_seguir').click(function(){
                
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
                  var sgd = $('#qtd_seguidores').text();
                  var qtdsgd = Number(sgd);
                  var novo_qtdsgd = qtdsgd - 1;
                  $('#qtd_seguidores').text(novo_qtdsgd);
                  }
              });
             });
        document.getElementById("route_page").classList.add('li-component-aside-active');

                

                //alert('Abriu o Documento');



            });
</script>
@stop

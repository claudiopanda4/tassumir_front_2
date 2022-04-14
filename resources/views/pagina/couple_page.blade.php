@extends('layouts.app')

@section('content')
<div class="main" id="main-container-page">
    <input type="hidden" id="page_couple" value=<?php echo md5('OK'); ?>>
    <div class="card br-10 card-flex card-page">
        <div class="clearfix page-card-header">
            <div class="img-profile-page-container clearfix l-5">
                <div class="img-profile-page circle l-5">
                    @if($dados[0]->foto != null)
                       <img src="{{asset('storage/img/page/') . '/' . $dados[0]->foto}}" class="img-full circle has-img-profile" id="img-profile-component"> 
                    @else
                        <img src="{{asset('css/uicons/page_icon.jpg')}}" class="img-full circle">
                    @endif
                </div>
                <label for="target-profile-cover-page" class="invisible-component" id="add-cover">
                    <div class="add-edit-profile circle">
                        <i class="fas fa-plus center" style="font-size: 10px;"></i>
                    </div>
                </label>
            </div>
            <div class="l-5" id="statistics-profile-page-main">
                
                <div class="statistics-profile-page l-5 clearfix">
                    <div class="statistics-profile-page-identify">
                        <h1>{{$dados[0]->nome}}</h1>
                        <!--<h2 class="lg-invisible-user-name">@<span></span>destacados</h2>-->
                    </div>
                </div>
                <div class="clearfix l-5 data-statistics">
                    <a href="">
                        <!--class="line-header-couple"-->
                        <div class="statistics-profile-page-component l-5">
                            <h1 id="qtd-followers">0</h1>
                            <h2 class="text-ellips">Seguidores</h2>
                        </div>                
                    </a>
                    <div class="statistics-profile-page-component l-5">
                        <h1 id="qtd-posts">0</h1>
                        <h2 class="text-ellips">Publicações</h2>
                    </div>
                    <div class="statistics-profile-page-component l-5">
                        <h1 id="qtd-reactions">0</h1>
                        <h2 class="text-ellips">Curtidas</h2>
                    </div>                    
                </div>   
                <div class="clearfix l-5" id="button-options-page">
                        <a href="" id="a-btn-flw-edt">
                            <div id="btn_follwing_container" class="follwing-btn-container l-5">
                                <button type="submit" class="follwing-btn" id="btn_seguir">
                                    
                                </button>
                            </div>                    
                        </a>
                        <div class="l-5 options-profile-btn more-options-profile-bt">
                            <label for="more-option-target-profile" class="target-options-profile">
                                <div class="">
                                    <div class="more-options-profile-btn">
                                        <div class="more-options-component"><img class="center img-24" id="more-option-btn-profile" src="{{asset('css/uicons/caret-down.png')}}"></div>
                                    </div>
                                </div>
                            </label>
                        </div>  
                        <div class="l-5 options-profile-btn more-options-profile-bt">
                            <label for="more-option-target-profile" class="target-options-profile">
                                <div class="">
                                    <div class="more-options-profile-btn">
                                        <div class="more-options-component"><img class="invisible-component center img-24" id="more-option-btn-page"></div>
                                    </div>
                                </div>
                            </label>
                        </div>                    
                    </div>             
            </div>

        </div>

            </div>
        </div>
        <!--<div>
            <div class="clearfix l-5 data-statistics">
                <a href="">
                    <div class="statistics-profile-page-component l-5">
                        <h1>0</h1>
                        <h2 class="text-ellips">Seguidores</h2>
                    </div>                
                </a>
                <div class="statistics-profile-page-component l-5">
                    <h1>0</h1>
                    <h2 class="text-ellips">Publicações</h2>
                </div>
                <div class="statistics-profile-page-component l-5">
                    <h1>0</h1>
                    <h2 class="text-ellips">Curtidas</h2>
                </div>                    
            </div>
        </div>-->
        <!--<div class="statistics-profile-page-identify">
            <h1>{{$dados[0]->nome}}</h1>
            <h2 class="lg-invisible-user-name">@<span></span>destacados</h2>
        </div>-->
        <div class="clearfix page-card-header" id="more-description-page">

            <!--<div class="description-couple">
                <h2 class="mobile-user-name">@<span></span>
                    <?php echo strtolower('destacados'); ?>
                </h2>
            </div>-->
            <div class="description-couple" id="p-description-couple-all-container">
                <p id="p-description-couple-all"><span id="part-text"></span><span class="invisible-component" id="text-ellips-description">...</span><a id="see-more-description"href="" class="invisible-component"><span class="">Ver Mais</span></a><span id="more-text-description" class="invisible-component"></span></p>
            </div>
            <div class="clearfix invisible-component" style="padding-left: 20px;" id="spouses-component">
                <a href="" class="l-5" id="spouse-masc"></a>
                <span class="l-5 spouse-item">e</span>
                <a href="" class="l-5" id="spouse-fem"></a>
                <span class="l-5 spouse-item" id="relationship-type-spouse"></span>
            </div>
        </div>
        <div id="mobile-options-page">
                <div class="clearfix" id="button-options-page">
                        <a href="" id="a-btn-flw-edt">
                            <div id="btn_follwing" class="follwing-btn-container l-5">
                                <button type="submit" class="follwing-btn" id="btn_seguir">
                                    
                                </button>
                            </div>                    
                        </a>
                        <div class="l-5 options-profile-btn more-options-profile-bt">
                            <label for="more-option-target-profile" class="target-options-profile">
                                <div class="">
                                    <div class="more-options-profile-btn">
                                        <div class="more-options-component"><img class="center img-24" id="more-option-btn-profile" src="{{asset('css/uicons/caret-down.png')}}"></div>
                                    </div>
                                </div>
                            </label>
                        </div>  
                        <div class="l-5 options-profile-btn more-options-profile-bt">
                            <label for="more-option-target-profile" class="target-options-profile">
                                <div class="">
                                    <div class="more-options-profile-btn">
                                        <div class="more-options-component"><img class="center img-24" id="more-option-btn-profile" src="{{asset('css/uicons/add_post.png')}}"></div>
                                    </div>
                                </div>
                            </label>
                        </div>                    
                    </div>             
        </div>

        <label for="add-post-target" class="add-post-label invisible-component" id="add-post-label-ident">
            <div class="add-post circle">
                <i class="far fa-edit fas-20 center" style="font-size: 20px;"></i>
            </div>
        </label>
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
        <div class="br-10 card-page" id="card-profile-option">
            <nav class="option-profile-menu">
                <ul class="" id="ul-profile">
                    <li class="posts-content-filter" id="cover-posts-component">
                        <a href="?post-container-post=images">
                            <h1 class="menu-option-profile"></h1>
                            <img class="center img-26" id="img-profile-icon-profile" src="{{asset('css/uicons/images.png')}}">
                        </a>
                    </li>
                    <li class="posts-content-filter" id="video-posts-component">
                        <a href="?post-container-post=video">
                            <h1 class="menu-option-profile">        
                            </h1>
                            <img class="center img-26" id="video-profile-icon-profile" src="{{asset('css/uicons/video_profile_liked.png')}}">
                        </a>
                    </li>
                    <li class="posts-content-filter" id="text-posts-component">
                        <a href="?post-container-post=post">
                            <h1 class="menu-option-profile"></h1>
                            <img class="center img-26" id="text-profile-icon-profile" src="{{asset('css/uicons/text.png')}}">
                        </a>
                    </li>
                </ul>
            </nav>
            <div>
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
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="page_ident" name="page_u" value="{{ $dados[0]->uuid }}">
<input type="checkbox" name="" id="add-post-target" class="invisible">
<div class="pop-up" id="add-post-container">
    <div class="pop-up-component full-component-mobile center" id="pop-up-component-create-post" style="">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Criar Publicação</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
       <!-- <form enctype="multipart/form-data">-->
            <div class="header-height"></div>
            <div class="clearfix content-details-post" style="margin-top: 15px; margin-bottom: 10px;">
                <div class="first-component clearfix l-5">
                </div>
                <div class="textarea-container l-5" style="width:100%;">
                    <textarea name="message" placeholder="O que deseja que as pessoas saibam?"></textarea>
                </div>
                <div class="l-5" style="width: 100%;">
                    <div class="preview-image" id="preview-image-id">

                    </div>
                </div>
                <script type="text/javascript">
                    document.addEventListener('DOMContentLoaded', function(){
                        let input = document.getElementById('testeVid');
                        input.addEventListener('change', function () {
                            const reader = new FileReader();
                            reader.onload = function () {
                                const img = new Image();
                                img.src = reader.result;
                                img.classList.add('img-full');
                                document.getElementById('preview-image-id').append(img);
                            }
                            document.getElementById('preview-image-id').style.display = 'block';
                            reader.readAsDataURL(input.files[0]);
                        });
                        $('.add-file-element').click(function(){
                            input.click();
                        });
                    });
                </script>
                <nav class="add-file l-5 clearfix" style="margin-bottom: 0;">
                    <ul style="width: 160px;" class="r-5">
                        <!--<label for="target-profile-cover-post">-->
                            <li class="circle add-file-element" id="target-profile-cover-post-id">
                                <i class="far fa-images fa-20 center"></i>
                            </li>
                        <!--</label>-->
                        <!--<label for="target-profile-cover-post">-->
                            <li class="circle add-file-element">
                                <i class="far fa-play-circle fa-20 center"></i>
                            </li>
                        <!--</label>-->
                    </ul>
                </nav>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin: 0px auto 10px;">
                <div class="" id="cover-done">
                    <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px; width: 100%;">Publicar</button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>
<input type="checkbox" name="" id="target-profile-cover-page" class="invisible">
<div class="pop-up" id="cover-profile-page">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Adicionar Foto da Página</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <form action="{{ route('account.profile.pic') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="uuidPage" value="{{$dados[0]->uuid}}">
                    <input class="file" type="file" name="pagePicture" style="width: 250px; margin-left: 10px; color: #fff;" required>
                    <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                        <div class="cover-done" id="cover-done">
                            <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px; width: 100%;">Concluido</button>

                        </div>
                    </div>
                </form>
            </div>
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

            if ($('.nao_sigo').eq(7).attr("id").split('-')[2] != null) {
                var id_last_page = $('.nao_sigo').eq(3).attr("id").split('-')[2];
            }else{
                if ($('.nao_sigo').eq(6).attr("id").split('-')[2] != null) {

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

        document.getElementById("route_page").classList.add('li-component-aside-active');



                //alert('Abriu o Documento');



            });
</script>
@stop

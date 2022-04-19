@extends('layouts.app')

@section('content')
<div class="main" id="main-profile">
    <input type="hidden" id="profile-container-id" value=<?php echo md5('OK'); ?>>
    <div class="refresh-profile-photo clearfix component-card invisible-component" id="relationship-requests-payment">
        <div class="profile-photo-container alert-component-card l-5">
            <img class="img-30 center" src="{{asset('css/uicons/flag.png')}}">
        </div>
        <div class="content-profile-photo l-5">
            <h1>O Pagamento que você fez para que o seu <span style="font-weight: bolder;">RELACIONAMENTO</span> com <span id="name-requested"></span> seja registrado, está processando. Aguarde até 24 para a confirmação</h1>
        </div>
    </div>
    <div class="refresh-profile-photo clearfix component-card invisible-component" id="relationship-requests">
            <div class="profile-photo-container alert-component-card l-5">
                <img class="img-30 center" src="{{asset('css/uicons/fire_in_my_heart.png')}}">
            </div>
            <div class="content-profile-photo l-5">
                <h1>Tens pedidos de <span style="font-weight: bolder;">RELACIONAMENTOS</span> por responder. Aceite ou rejeite</h1>
                <a href="">
                    <div class="button-default-tassumir">
                        <h3 class="button-default-tassumir-text" style="margin-top: 0; font-weight: bolder;">Ver Pedidos</h3>
                    </div>
                </a>
            </div>
        </div>
    <input type="hidden" id="control-state-posts" value="0">
    <input type="hidden" id="control-type-state-posts-checked" value="0">
    <header class="card br-10 card-flex profile-card" id="profile-card-header">
        <div id="img-profile-container" class="circle">
            @if ($foto != null)
                <img class="img-profile has-img-profile img-full circle invisible-component" src="{{asset('storage/img/users') . '/' . $foto}}" id="img-profile-component"> 
            @else:
                <img class="img-profile img-full circle invisible-component" src="{{asset('css/uicons/user.png')}}" id="img-profile-component">                            
            @endif

            <label for="target-profile-cover">
                <div class="add-edit-profile circle invisible-component" id="add-edit-profile-owner">
                    <i class="fas fa-plus center" style="font-size: 10px;"></i>
                </div>
            </label>
        </div>
        <input type="hidden" id="ident-profile-id" value="{{$uuid}}" name="">
        <input type="hidden" id="ident-genre" value="{{$genero}}" name="">
        <div class="" id="card-ident">
            <div id="ident-profile">
                <h1 class="profile-name" id="profille-name">{{$nome_completo}}</h1>
                <div class="invite-icon circle">
                    <a href=""><i class="fas fa-user-plus fa-16 center" style="font-size: 14px;"></i></a>
                </div>
            </div>
            <ul class="profile-follow profile-item-center">
                <li class="statistics-profile">
                    <!--<a href="">-->
                        <h2 class="text-profile-statistics-number" id="data-profile-0"></h2>
                        <h2 class="text-profile-statistics">Seguindo</h2>
                    <!--</a>-->
                </li>
                <li class="statistics-profile">
                    <h2 class="text-profile-statistics-number" id="data-profile-1"> </h2>
                    <h2 class="text-profile-statistics">Curtidas</h2>
                </li>
                <li class="statistics-profile">
                    <h2 class="text-profile-statistics-number" id="data-profile-2"> </h2>
                    <h2 class="text-profile-statistics">Guardados</h2>
                </li>
            </ul>
            <div id="option-profile-no-own">
                <div class="clearfix" id="options-profile-mobile-user-log">
                        <div class="options-profile-btn options-profile-btn-center profile-item-center options-profile-btn l-5" id="options-profile-btn-edit-profile">
                            <a class="target-relationship-assumir" id="btn-profile-redirect" href=""><h3 class="edit-profile-mobile center" id="option-btn-profile"></h3></a>
                        </div>
                        <div class="options-profile-btn options-profile-btn-center profile-item-center options-profile-btn l-5 profile-options-button profile-options-accept invisible-component" id="profile-options-button-1">
                            <a class="" id="btn-profile-redirect-1" href=""><h3 class="edit-profile-mobile center" id="btn-request-profile"></h3></a>
                        </div>
                        <div class="options-profile-btn options-profile-btn-center profile-item-center options-profile-btn l-5 profile-options-button invisible-component" id="profile-options-button-2">
                            <a class="" id="btn-profile-redirect-2" href=""><h3 class="edit-profile-mobile center" id="button-request-profile"></h3></a>
                        </div>
                        <div class="l-5 options-profile-btn more-options-profile-bt">
                            <label for="more-option-target-profile" class="target-options-profile">
                                <div class="">
                                    <div class="more-options-profile-btn">
                                        <div class="more-options-component">
                                            <!--<i class="fas fa-caret-down center" style="font-size: 18px;"></i>-->
                                            <img class="center img-20" src="{{asset('css/uicons/caret-down.png')}}">
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="l-5 options-profile-btn more-options-profile-bt">
                            <label for="more-option-target" class="target-options-profile">
                                <div class="">
                                    <div class="more-options-profile-btn">
                                        <div class="more-options-component center">
                                            <!--<i class="far fa-bookmark center icon-hover-option-profile" style="font-size: 14px;"></i>-->
                                            <img class="center img-26 invisible" id="more-option-btn-profile" src="">
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                </div>
                <div class="inform-profile" id="inform-profile-detail-couple">
                    <h3 id="civil-state"><span id="relationship-selected-type-profile"></span><a id="spouse-profile" href="" class="a-link-detail-profile"></a></h3>
                </div>
                <div class="inform-profile" id="inform-profile-detail-description">
                    <p class="description-couple" style="width: 100%;">
                        <span id="description-prof-">{{$descricao}}</span><a href="" id="see-more-description-profile" class="a-link-detail-profile invisible">ver mais</a></p>
                        <input type="hidden" id="description-all" name="">
                </div>
            </div>
    </header>
<div class="card br-10 card-page" id="card-profile-option">
            <nav class="option-profile-menu">
                <ul class="" id="ul-profile">
                    <li class="posts-content-filter" id="cover-posts-component">
                        <a href="?post-container-post=images">
                            <!--<i class="far fa-images fas-32 center icon-hover-option-profile " style="font-size: 22px;"></i>-->
                            <h1 class="menu-option-profile"></h1>
                            <img class="center img-26" id="img-profile-icon-profile" src="{{asset('css/uicons/images.png')}}">
                        </a>
                    </li>
                    <li class="posts-content-filter" id="video-posts-component">
                        <a href="?post-container-post=video">
                            <!--<i class="far fa-play-circle center icon-hover-option-profile" style="font-size: 22px;"></i>-->
                            <h1 class="menu-option-profile">        
                            </h1>
                            <img class="center img-26" id="video-profile-icon-profile" src="{{asset('css/uicons/video_liked.png')}}">
                        </a>
                    </li>
                    <li class="posts-content-filter" id="text-posts-component">
                        <a href="?post-container-post=post">
                            <!--<i class="fas fa-newspaper center icon-hover-option-profile" style="font-size: 22px;"></i>-->
                            <h1 class="menu-option-profile"></h1>
                            <img class="center img-26" id="text-profile-icon-profile" src="{{asset('css/uicons/text.png')}}">
                        </a>
                    </li>
                    <!--<li><a href="?post-container-post=saved"><i class="far fa-bookmark center icon-hover-option-profile" style="font-size: 18px;"></i><h1 class="menu-option-profile"></h1></a></li>-->
                </ul>
            </nav>
            
            <div class="post-video-container-page post-page-container clearfix">
                <?php $ver = 1; $key = 0; while ($key < 126) {?>
                    <a href="" id=<?php echo 'a-post-component-'.$key; ?>>
                        <video preload="metadata" <?php if (($ver % 3) == 0){echo "class='img-post-video-component img-post img-post-video-component-fl video-post-profile invisible-component'";}else{echo "class='img-post-video-component img-post video-post-profile invisible-component'";} ?> id="video-post-page-{{$key}}">
                            <source src="" type="video/mp4"> 
                            <div class="clearfix content-video-some-details">
                                <img class="l-5 img-20" style="" src="{{asset('css/uicons/video_liked.png')}}">
                                <h1 class="l-5" style="font-size: 9px; text-transform: uppercase; color: #fff;">115</h1>
                            </div>           
                        </video>
                    </a>
                    <a href="" id="a-post-component-cover-{{$key}}">
                        <div <?php if (($ver % 3) == 0){echo "class='img-post img-post-video-component img-post-video-component-fl img-cover-video-component invisible-component'";}else{echo "class='img-post img-post-video-component img-cover-video-component invisible-component'";} ?> id="img-post-page-{{$key}}">
                            <img class="" src="" id="img-post-page-container-{{$key}}">
                        </div>                          
                    </a>
                    <input type="hidden" id="cover-loaded-profile-read" value="0">
                    <input type="hidden" id="text-loaded-profile-read" value="0">
                    <input type="hidden" id="video-loaded-profile-read" value="0">
                    <input type="hidden" id="component-loaded-profile-read" value="0">
                <?php $key++; $ver++; } ?>
            </div>
</div>
</div>
<input type="checkbox" name="" id="more-option-target-profile" class="invisible">
<div class="pop-up" id="more-option-profile-component">
    <div class="pop-up-component full-component-mobile" id="more-option-profile-component-pop-up" style="">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Mais Informações</h1>
            <div class="container-pop-up-component-header">
                <label for="more-option-target-profile">
                    <div class="cancel-box-component div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <input type="hidden" id="uuid_has_relationship" name="">
        <div class="clearfix content-more" style="margin-top: 0px; margin-bottom: 10px;">
            <nav>
                <ul class="" id="more-option-target-profile-details">
                    <li class="li-component-aside">
                        <i class="fas fa-sign-out-alt fa-20 fa-icon-aside-left"></i>
                        <a href="{{route('account.logout')}}">Terminar Sessão</a>
                    </li>
                    <li class="li-component-aside">
                        <i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i>
                        <a href="" class="a-more-option-profile">Meus Ganhos</a>
                    </li>
                    <li class="li-component-aside">
                        <i class="fas fa-rss fa-20 fa-icon-aside-left"></i>
                        <a href="" class="a-more-option-profile">Actualizações do Tassumir</a>
                    </li>
                    <li class="li-component-aside">
                        <i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i>
                        <a href="" class="a-more-option-profile">Dicas Para Ganhar Mais</a>
                    </li>
                    <li class="li-component-aside">
                        <i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i>
                        <a href="" class="a-more-option-profile">Explorar Melhor o Tassumir</a>
                    </li>
                </ul>
                <ul class="" id="more-option-visit-profile-details">
                    <li class="li-component-aside more-info-about-profile">
                        <h1>Estado</h1>
                        <h2>Solteiro</h2>
                    </li>
                    <li class="li-component-aside more-info-about-profile">
                        <h1>Idade</h1>
                        <h2>24 anos</h2>
                    </li>
                    <li class="li-component-aside more-info-about-profile">
                        <h1>Vive em</h1>
                        <h2>Sem Endereço Actual</h2>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
      var select_li = window.location.href.split('=');
      if (select_li[select_li.length - 1] == 'saved') {
        document.getElementById("route_save").classList.add('li-component-aside-active');
      } else {
        document.getElementById("route_account").classList.add('li-component-aside-active');
      }
    });
</script>
@stop
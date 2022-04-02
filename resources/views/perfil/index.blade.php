@extends('layouts.app')

@section('content')
<div class="main" id="main-profile">
    <input type="hidden" id="profile-container-id" value=<?php echo md5('OK'); ?>>
    <header class="card br-10 card-flex">
        <div id="img-profile-container" class="circle">
            <img class="img-profile img-full circle invisible-component" id="img-profile-component">
            <label for="target-profile-cover">
                <div class="add-edit-profile circle">
                    <i class="fas fa-plus center" style="font-size: 10px;"></i>
                </div>
            </label>
        </div>
        <div class="" id="card-ident">
            <div id="ident-profile">
                <h1 class="profile-name" id="profille-name"></h1>
                <div class="invite-icon circle">
                    <a href=""><i class="fas fa-user-plus fa-16 center" style="font-size: 14px;"></i></a>
                </div>
            </div>
            <ul class="profile-follow profile-item-center">
                <li class="statistics-profile">
                  <a href=""><h2 style="justify-content: center; font-weight: bolder; font-size: 14px; width: 100%; margin-bottom: 0;" id="data-profile-0"></h2></a>
                    <a href="" style="margin-top: -5px;  text-align: center;"><h2 style="justify-content: center; font-size: 11.5px; text-align: center;">Seguindo</h2></a>
                </li>
                <li class="statistics-profile">
                    <h2 style="justify-content: center; font-weight: bolder; font-size: 14px;" id="data-profile-1"> </h2>
                    <h2 style="justify-content: center; font-size: 11.5px;">Curtiu</h2>
                </li>
                <li class="statistics-profile">
                    <h2 style="justify-content: center; font-weight: bolder; font-size: 14px;" id="data-profile-2"> </h2>
                    <h2 style="justify-content: center; font-size: 11.5px;">Guardados</h2>
                </li>
            </ul>
            <div id="option-profile-no-own">
                <div class="clearfix" id="options-profile-mobile-user-log">
                        <div class="options-profile-btn options-profile-btn-center profile-item-center options-profile-btn l-5" id="options-profile-btn-edit-profile">
                            <a id="btn-profile-redirect" href=""><h3 class="edit-profile-mobile center" id="option-btn-profile"></h3></a>
                        </div>
                        <div class="l-5 options-profile-btn more-options-profile-bt">
                            <label for="more-option-target-profile" class="target-options-profile">
                                <div class="">
                                    <div class="more-options-profile-btn">
                                        <div class="more-options-component">
                                            <!--<i class="fas fa-caret-down center" style="font-size: 18px;"></i>-->
                                            <img class="center img-26" src="{{asset('css/uicons/caret-down.png')}}">
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
                                            <img class="center img-26" src="{{asset('css/uicons/bookmark.png')}}">
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                </div>
                <div class="inform-profile">
                    <h3 id="civil-state"><span id="relationship-selected-type-profile"></span><a id="spouse-profile" href="" class="a-link-detail-profile"></a></h3>
                </div>
                <div class="inform-profile">
                    <p class="description-couple" style="width: 100%;">
                        <span id="description-prof-">{{$descricao}}</span><a href="" id="see-more-description-profile" class="a-link-detail-profile invisible">ver mais</a></p>
                        <input type="hidden" id="description-all" name="">
                </div>
            </div>
    </header>
<div class="card br-10 card-page" id="card-profile-option">
            <nav class="option-profile-menu">
                <ul class="" id="ul-profile">
                    <li>
                        <a href="?post-container-post=images">
                            <!--<i class="far fa-images fas-32 center icon-hover-option-profile " style="font-size: 22px;"></i>-->
                            <h1 class="menu-option-profile"></h1>
                            <img class="center img-26" src="{{asset('css/uicons/images.png')}}">
                        </a>
                    </li>
                    <li>
                        <a href="?post-container-post=video">
                            <!--<i class="far fa-play-circle center icon-hover-option-profile" style="font-size: 22px;"></i>-->
                            <h1 class="menu-option-profile">        
                            </h1>
                            <img class="center img-26" src="{{asset('css/uicons/video_liked.png')}}">
                        </a>
                    </li>
                    <li>
                        <a href="?post-container-post=post">
                            <!--<i class="fas fa-newspaper center icon-hover-option-profile" style="font-size: 22px;"></i>-->
                            <h1 class="menu-option-profile"></h1>
                            <img class="center img-26" src="{{asset('css/uicons/text.png')}}">
                        </a>
                    </li>
                    <!--<li><a href="?post-container-post=saved"><i class="far fa-bookmark center icon-hover-option-profile" style="font-size: 18px;"></i><h1 class="menu-option-profile"></h1></a></li>-->
                </ul>
            </nav>
            <div class="post-video-container-page post-page-container">
                <?php $key = 0; while ($key < 100) {?>
                    <video class="invisible-component" id="video-post-page-{{$key}}">
                        <source type="video/mp4">            
                    </video>
                    <div class="img-post invisible-component" id="img-post-page-{{$key}}">
                        <img class="img-full" id="img-post-page-container-{{$key}}">
                    </div>                    
                <?php $key++; } ?>
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
        <div class="clearfix content-more" style="margin-top: 0px; margin-bottom: 10px;">
            <nav>
                <ul class="">
                    <li class="li-component-aside">
                        <i class="fas fa-sign-out-alt fa-20 fa-icon-aside-left"></i>
                        <a href="{{route('account.logout')}}">Terminar Sessão</a>
                    </li>
                    <li class="li-component-aside">
                        <i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i>
                        <a href="">Meus Ganhos</a>
                    </li>
                    <li class="li-component-aside">
                        <i class="fas fa-rss fa-20 fa-icon-aside-left"></i>
                        <a href="">Actualizações do Tassumir</a>
                    </li>
                    <li class="li-component-aside">
                        <i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i>
                        <a href="">Dicas Para Ganhar Mais</a>
                    </li>
                    <li class="li-component-aside">
                        <i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i>
                        <a href="">Explorar Melhor o Tassumir</a>
                    </li>
                </ul>
                <ul class="">
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
  var select_li =window.location.href.split('=');
  if (select_li[select_li.length - 1] == 'saved') {
    document.getElementById("route_save").classList.add('li-component-aside-active');
  }else {
    document.getElementById("route_account").classList.add('li-component-aside-active');
  }
});
</script>
@stop

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Tassumir') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="{{ asset('js/jquery/jquery-3.5.1/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checked.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width-width, initial-scale=1,0">
    <meta http-equiv="UA-X-Compatible" content="ie=edge">
</head>

<body class="container-main">
    <div class="body-pop-up content-full-scroll">
        <header class="header-main header-main-component clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><i class="fas fa-link fa-24"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden">
                    <div class="input-search">
                        <label for="search-lg-home"><i class="fas fa-search fa-16 fa-search-main"></i></label>
                        <input type="search" name="" placeholder="O que está procurando?" class="input-text" id="search-lg-home-id">
                    </div>
                    <input type="checkbox" name="" class="invisible" id="search-lg-home">
                    <div class="container-search-home">
                        <div class="input-search">
                            <i class="fas fa-search fa-16 fa-search-main"></i>
                            <input type="search" name="table_search" placeholder="O que está procurando?" class="input-text" id="table_search">
                        </div>
                        <div class="search-id-container">
                          <div name="pessoa">
                            </div>
                            <div name="page">
                            </div>
                        </div>
                        <div class="change-look mb-5" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">
                            <a href="{{route('allSearch.page')}}"><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>
                        </div>
                    </div>
                </li>
            </ul>
            <nav class="menu-header ">
                <?php $controller = 0; ?>
                <ul class="clearfix ">
                    <li class="l-5 mobile-header-icon">
                        <a href="{{route('allSearch.page')}}"><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon" style="z-index:2;">
                        <div class="hidden-click-any-container last-component-n clearfix-n " >
                            <label for="more-option-notify" class="hidden-click-any-container fa-option-mobile-hide"><i class="hidden-click-any-container far fa-bell fa-24 fa-option notify-icon" size="7"></i>
                                @if($notificacoes_count > 0)
                                <div class="number-notification circle">
                                    <span class="center">{{$notificacoes_count}}</span>
                                </div>
                                @endif
                            </label>
                            <a href="{{route('account.all.notifications')}}" class="hidden-click-any-container fa-option-mobile-lg-hide notify-icon">
                                <i class="hidden-click-any-container far fa-bell fa-24 fa-option" size="7"></i>
                                @if($notificacoes_count > 0)
                                <div class="number-notification circle">
                                    <span class="center">{{$notificacoes_count}}</span>
                                </div>
                                @endif
                            </a>
                            <input type="checkbox" name="" id="more-option-notify" class="hidden">
                            <ul class="noti-card-first clearfix br-10">
                                <li class="hidden-click-any-container mb-4" style="display: flex;justify-content: flex-start;align-content: flex-start;">
                                    <span style="color:#efefef;">Actividades</span>
                                </li>


                                <li class="hidden-click-any-container noti-flex mt-2">

                                    <div class="hidden-click-any-container noti-div-subtitle">
                                        <h4 class="noti-subtitle">Hoje</h4>
                                    </div>
                                </li>
                            <!--<li class="hidden-click-any-container send-invited-relationship clearfix">
                                <div class="hidden-click-any-container user-identify-img circle l-5">
                                    <img src="{{asset('storage/img/users/anselmoralph.jpg')}}" class="img-full circle">
                                </div>
                                <div class="hidden-click-any-container details-invited l-5">
                                    <span class="hidden-click-any-container description-invited">
                                        <a href="">Hugo Paulo</a> enviou um Pedido de Relacionamento para VOCÊ
                                    </span>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <label class="hidden-click-any-container l-5" for="options-invited-pop-up">
                                            <div class="hidden-click-any-container label-invited">
                                                <h2 class="accept">Aceitar</h2>
                                                <h2>Aceitar</h2>
                                            </div>
                                        </label>
                                        <a href="" class="hidden-click-any-container l-5 denied">Rejeitar</a>
                                    </div>
                                </div>
                            </li>
                            <li class="hidden-click-any-container send-invited-relationship clearfix">
                                <div class="hidden-click-any-container user-identify-img circle l-5">
                                    <img src="{{asset('storage/img/users/anselmoralph.jpg')}}" class="img-full circle">
                                </div>
                                <div class="hidden-click-any-container details-invited l-5">
                                    <span class="hidden-click-any-container description-invited">
                                        <a href="">Hugo Paulo</a> Respondeu a sua Solicitação de Registo de compromisso
                                    </span>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a>
                                    </div>
                                </div>
                            </li>-->

                            @for($i=sizeof($notificacoes); $i > 0 ; $i--)
                                <li class="hidden-click-any-container change-look noti-flex-info" id="not-{{$notificacoes[$i- 1]['id1']}}" name="not-{{$notificacoes[$i- 1]['id1']}}">
                                  <?php if ($notificacoes[$i- 1]['v']== 1): ?>
                                    <?php if ($notificacoes[$i- 1]['foto']!= null): ?>

                                    <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                                         <img class="circle img-40" src="{{ asset('storage/img/users') . '/' . $notificacoes[$i- 1]['foto'] }}">
                                    </div>
                                    <?php else: ?>
                                      <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                                           <img class="hidden-click-any-container circle img-24 center" src='{{asset("storage/icons/user_.png")}}'>
                                      </div>
                                      <?php endif ?>
                                    <?php elseif ($notificacoes[$i- 1]['v']== 2): ?>
                                      <?php if ($notificacoes[$i- 1]['foto']!= null): ?>

                                      <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                                           <img class="hidden-click-any-container circle img-24 center" src='{{asset("storage/icons/user_.png")}}'>
                                      </div>
                                      <?php else: ?>
                                        <div class="hidden-click-any-container ml-2 novi-div-image circlel-5 ">
                                             <img class="circle img-24 center" src='{{asset("storage/icons/user_.png")}}'>
                                        </div>
                                        <?php endif ?>

                                    <?php endif ?>

                                    <div class="hidden-click-any-container noti-div-name">
                                   @if($notificacoes[$i- 1]['tipo'] == 1)
                                   <a href="{{route('post_index', $notificacoes[$i- 1]['link'])}}" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}" class="mudar_estado_not" >
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   </a>
                                   @elseif($notificacoes[$i- 1]['tipo'] == 2)
                                   <a href="{{route('post_index', $notificacoes[$i- 1]['link'])}}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   </a>
                                   @elseif($notificacoes[$i- 1]['tipo'] == 3)
                                   <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   </a>
                                   @elseif($notificacoes[$i- 1]['tipo'] == 4 || $notificacoes[$i- 1]['tipo'] == 7)
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   @elseif($notificacoes[$i- 1]['tipo'] == 5)
                                   <a href="{{route('couple.page1', $notificacoes[$i- 1]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   </a>
                                   @elseif($notificacoes[$i- 1]['tipo'] == 6)
                                   <a href="{{route('post_index', $notificacoes[$i- 1]['link'])}}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   </a>
                                   @elseif($notificacoes[$i- 1]['tipo'] == 8)
                                   <a href="{{route('couple.page1', $notificacoes[$i- 1]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   </a>
                                   @elseif($notificacoes[$i- 1]['tipo'] == 9)
                                   <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   </a>
                                   @elseif($notificacoes[$i- 1]['tipo'] == 10)
                                   <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                   </a>
                                   @endif
                                    <div class="hidden-click-any-container noti-hour ml-2">
                                        <a href=""><span class="">há um dia</span></a>
                                    </div>
                                    @if($notificacoes[$i- 1]['tipo'] == 4)
                                    <?php $controller++; ?>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <label class="hidden-click-any-container l-5" for="options-invited-pop-up">
                                            <div class="hidden-click-any-container label-invited" id="">
                                                <h2 class="accept_relationship" id="{{$notificacoes[$i- 1]['id']}}|{{$notificacoes[$i- 1]['id1']}}">Aceitar</h2>
                                            </div>
                                        </label>
                                        <div class="reject_relationship" id="R|{{$notificacoes[$i- 1]['id']}}|{{$notificacoes[$i- 1]['id1']}}">
                                        <a href="" class="hidden-click-any-container l-5 denied " id="R|{{$notificacoes[$i- 1]['id']}}|{{$notificacoes[$i- 1]['id1']}}">Rejeitar</a>
                                    </div>
                                  </div>
                                    @elseif($notificacoes[$i- 1]['tipo'] == 7)
                                    <?php $controller++; ?>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <!--<a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a>-->
                                        <a  href="{{route('relationship.page1', $notificacoes[$i- 1]['id']) }}" class="ver_mais" id="VR|{{$notificacoes[$i- 1]['id1']}}">Ver Resposta</a>
                                    </div>
                                    @endif
                                   </div>

                                </li>
                              @endfor

                                 <li class="hidden-click-any-container change-look" style="display: flex;justify-content:center; align-items: center; width: 300px; padding:8px;">
                                    <a href="{{route('account.all.notifications')}}"><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--<li class="l-5 mobile-hidden">
                        <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                    </li>-->s
                    <li class="user-tassumir clearfix l-5">
                        @if ($profile_picture == null || $profile_picture == "null" || $profile_picture == NULL || $profile_picture == "NULL" || $profile_picture == "" || $profile_picture == " ")
                            <a href="{{route('account.profile')}}"><i class="far fa-user-circle fa-24 l-5" id="imgless"></i></a>
                        @else
                            <a href="{{route('account.profile')}}"><img class="l-5" src="{{asset('storage/img/users') . '/' . $profile_picture}}"></a>
                        @endif
                        <a href="{{route('account.profile')}}" class="l-5"><h1 class="user-account" >{{$conta_logada[0]->nome}}</h1></a>
                    </li>
                </ul>
            </nav>
    </header>
    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix">
                <li class="li-component-aside li-component-aside-active"><i class="fas fa-rss fa-20 fa-icon-aside-left"></i><a href="{{route('account.home')}}">Mais Assistidos</a></li>
                <li class="li-component-aside"><i class="far fa-bookmark fa-20 fa-icon-aside-left"></i><a href="{{route('account.profile')}}?post-container-post=saved">Mais Curtidos</a></li>
                <li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Mais Recentes</a></li>
                <li class="li-component-aside"><i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Mais Comentados</a></li>
                <li class="li-component-aside"><i class="far fa-play-circle fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Videos Guardados</a></li>
            </ul>
        </nav>
    </aside>
    <div class="header-main-component"></div>
    <main class="main-container">
        @yield('content');
    </main>
    </div>
</body>
<form action="{{ route('post_couple.page') }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" name="page_u" value="{{ $page_content[0]->uuid }}">
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
                    @if($page_content[0]->foto)
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src="{{asset('storage/img/page/' . $page_content[0]->foto)}}">
                        </div>
                    @else
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                        </div>
                    @endif
                    <div class="page-identify l-5 clearfix">
                        <h1 class="text-ellips">{{ $page_content[0]->nome }}</h1>
                    </div>
                </div>
                <div class="textarea-container l-5" style="width:100%;">
                    <textarea name="message" placeholder="O que deseja que as pessoas saibam?"></textarea>
                </div>
                <nav class="add-file l-5 clearfix" style="margin-bottom: 0;">
                    <ul style="width: 160px;" class="r-5">
                        <label for="target-profile-cover-post">
                            <li class="circle add-file-element">
                                <i class="far fa-images fa-20 center"></i>
                            </li>
                        </label>
                        <label for="target-profile-cover-post">
                            <li class="circle add-file-element">
                                <i class="far fa-play-circle fa-20 center"></i>
                            </li>
                        </label>
                    </ul>
                </nav>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin: 0px auto 10px;">
                <div class="" id="cover-done">
                    <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Publicar</button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>
<script type="text/javascript">
</script>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Tassumir') }}</title>

    <!-- Scripts -->
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
  <header class="header-main-n header-main-component-n clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><i class="fas fa-link fa-24"></i><h1 class="">Tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden">
                    <div class="input-search">
                        <i class="fas fa-search fa-16 fa-search-main"></i>
                        <input type="search" id="table_search" name="table_search" placeholder="O que está procurando?" class="input-text" >
                    </div>
                </li>
            </ul>
            <nav class="menu-header ">
                <ul class="clearfix ">
                    <li class="l-5 mobile-header-icon">
                        <a href="{{route('allSearch.page')}}"><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon" style="z-index:2;">
                        <div class="last-component-n clearfix-n " >
                            <label for="more-option-notify" class="fa-option-mobile-hide">
                              @if($notificacoes_count > 0)
                              <div class="number-notification circle">
                                  <span class="center">{{$notificacoes_count}}</span>
                              </div>
                              @endif
                                <i class="fa fa-bell fa-24 fa-option" size="7"></i>
                            </label>
                            <a href="{{route('account.all.notifications')}}" class="fa-option-mobile-lg-hide">
                                <i class="far fa-bell fa-24 fa-option" size="7"></i>
                            </a>
                            <input type="checkbox" name="" id="more-option-notify" class="hidden">
                            <ul class="clearfix noti-card-first  br-10">
                                <li class="mb-4" style="display: flex;justify-content: flex-start;align-content: flex-start;">

                                    <span style="color:#efefef;">Actividades</span>
                                </li>


                                <li class="noti-flex mt-2">

                                    <div class="noti-div-subtitle">
                                        <h4 class="noti-subtitle">Hoje</h4>
                                    </div>
                                </li>

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
                                       <a href="{{route('relationship.page1', $notificacoes[$i- 1]['id']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                        <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                       </a>
                                       @elseif($notificacoes[$i- 1]['tipo'] == 11)
                                       <a href="{{route('account.delete.page', $notificacoes[$i- 1]['id1']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                        <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                       </a>
                                       @elseif($notificacoes[$i- 1]['tipo'] == 12)
                                       <a href="{{route('account.delete.page', $notificacoes[$i- 1]['id1']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                        <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                       </a>
                                       @elseif($notificacoes[$i- 1]['tipo'] == 13)
                                       <a href="{{route('couple.page1', $notificacoes[$i- 1]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                        <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                       </a>
                                       @else
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
                                       @if($notificacoes[$i- 1]['state_notification']== 2)
                                           <div class="not-new">

                                           </div>
                                       @endif
                                    </li>
                                  @endfor


                                 <li class="change-look mb-5" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">
                                    <a href="{{route('account.all.notifications')}}"><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--<li class="l-5 mobile-hidden">
                        <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                    </li>-->
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
  <div class="header-main-component-n "></div>
    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix card-flex">
                <li class=" couple-search-li-aside-left mt-3">

                  <span style="color:#efefef;">Resultados da Pesquisa</span>
                </li>

        <div class="couple-separator">

        </div>
                <li class="mb-2 mt-2 couple-search-li-aside-left">

                    <span class="couple-seach-span">Filtros</span>
                </li>
                <li class="li-component-aside li-component-aside-active"><a href="{{route('allSearch.page')}}">Tudo</a></li>
                <li class="li-component-aside"><a href="{{route('peoplesSearch.page')}}">Pessoas</a></li>

                <li class="li-component-aside"><a href="{{route('pagesSearch.page')}}">Páginas</a></li>

                <li class="li-component-aside"><a href="{{route('publicationsSearch.page')}}">Publicações</a></li>
            </ul>
        </nav>

    </aside>



    <main>
        @yield('content');
    </main>
</div>
</body>
</html>

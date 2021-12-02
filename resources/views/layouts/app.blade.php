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
    <div class="header-main-component"></div>
    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix">
                <li class="li-component-aside li-component-aside-active"><i class="fas fa-rss fa-20 fa-icon-aside-left"></i><a href="{{route('account.home')}}">Feed de Notícias</a></li>
                <li class="li-component-aside text-ellips"><i class="far fa-user-circle fa-20 fa-icon-aside-left"></i><a class="text-ellips" href="{{route('account.profile')}}">{{$conta_logada[0]->nome}} {{$conta_logada[0]->apelido}}</a></li>
                <!--<li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Criar Relacionamento</a></li>
                <li class="li-component-aside"><i class="fas fa-book-open fa-20 fa-icon-aside-left"></i><a href="">Página de Casal</a></li>-->
                @if($checkUserStatus)
                    @if(!$hasUserManyPages)
                        <li class="li-component-aside"><i class= "fas fa-paperclip fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Página de Casal</a></li>
                    @else
                        <li class="li-component-aside"><i class= "fas fa-paperclip fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page.mine')}}">Minhas Páginas</a></li>
                    @endif
                @endif
                <li class="li-component-aside"><i class="far fa-bookmark fa-20 fa-icon-aside-left"></i><a href="{{route('account.profile')}}?post-container-post=saved">Guardados</a></li>
                <li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Casais que eu sigo</a></li>
                <li class="li-component-aside"><i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Ganhar Dinheiro</a></li>
                <li class="li-component-aside"><i class="far fa-play-circle fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Tassumir Vídeos</a></li>
            </ul>
        </nav>
        <nav class="last-nav">
            <ul>
                <li class="li-component-aside"><i class="fas fa-cog fa-20 fa-icon-aside-left"></i><a href="{{route('page_definition.page')}}">Definições</a></li>
                <li class="li-component-aside"><i class="far fa-question-circle fa-20 fa-icon-aside-left"></i><a href="{{route('help_support.page')}}">Ajuda e Suporte</a></li>
                <li class="li-component-aside"><i class="fas fa-sign-out-alt fa-20 fa-icon-aside-left"></i><a href="{{route('account.logout')}}">Sair</a></li>
            </ul>
        </nav>
    </aside>
    <aside class="aside aside-right" style="z-index:1;">
        <?php if ($controller > 0): ?>
        <header>
            <h1>Registo de Relacionamento</h1>
        </header>
        <?php endif ?>
        @for($i=sizeof($notificacoes); $i > 0 ; $i--)
                                <li class="hidden-click-any-container change-look noti-flex-info noti-info-aside" >
                                  <?php if ($notificacoes[$i- 1]['tipo'] == 4 || $notificacoes[$i- 1]['tipo'] == 7): ?>
                                    <?php if ($notificacoes[$i- 1]['foto']!= null): ?>
                                    <div class="hidden-click-any-container ml-2 novi-div-image circle">
                                         <img class="circle img-40" src="{{ asset('storage/img/users') . '/' . $notificacoes[$i- 1]['foto'] }}">
                                    </div>
                                    <?php else: ?>
                                      <div class="hidden-click-any-container ml-2 novi-div-image circle">
                                           <img class="hidden-click-any-container l-5 circle img-24" src='{{asset("storage/icons/user_.png")}}'>
                                      </div>
                                      <?php endif ?>
                                      <div class="hidden-click-any-container noti-div-name">

                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>

                                    <div class="hidden-click-any-container noti-hour ml-2">
                                        <a href=""><span class="">há um dia</span></a>
                                    </div>
                                    @if($notificacoes[$i- 1]['tipo'] == 4)
                                    $controller++;
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
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <!--<a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a>-->
                                        <a  href="{{route('relationship.page1', $notificacoes[$i- 1]['id']) }}" class="ver_mais" id="VR|{{$notificacoes[$i- 1]['id1']}}">Ver Resposta</a>
                                    </div>
                                    @endif
                                   </div>
                                    <?php endif ?>
                                </li>

                              @endfor
        <nav>
            <header>
                <h1>Páginas que eu sigo</h1>
            </header>
            <ul class="">
                <?php if ($dadosSeguindo[0]['id'] ==  $conta_logada[0]->conta_id): ?>
                @forelse($dadosPage as $Paginas)
                <?php
                $seguidors = 0;
                foreach ($dadosSeguida as  $val){
                        if ($val->id == $Paginas->page_id) {
                            $seguidors += 1;
                        }
                    }
                ?>

                    @forelse($dadosSeguida as $Seguida)
                        <?php if ((($dadosSeguindo[0]['identificador_id_seguindo'] ==  $Seguida->identificador_id_seguindo) && ($Seguida->id == $Paginas->page_id))) : ?>
                        <li class="li-component-aside-right clearfix" id="seguida-{{$Seguida->identificador_id_seguida}}">
                        @if( !($Paginas->foto == null) )
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $Paginas->foto }}">
                            </div>
                        @else
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                        @endif
                            <h1 class="l-5 name-page text-ellips">{{ $Paginas->nome }}</h1>
                            <h2 class="l-5 text-ellips">{{ $seguidors }} seguidores</h2>

                            <a href="" class="nao_seguir">não seguir</a>
                            <input type="hidden" id="seguida" value="{{ $Seguida->identificador_id_seguida }}" name="">

                            <input type="hidden" id="seguindo" value="{{ $Seguida->identificador_id_seguindo }}" name="">

                            <input type="hidden" id="npage_id" value="{{ $account_name[0]->conta_id }}" name="">
                           <?php
                           /*echo " <a href=". route('nao.seguir.seguindo', ['seguida' => $Seguida->identificador_id_seguida, 'seguindo' =>$Seguida->identificador_id_seguindo]). ">não seguir</a>";*/?>
                        </li>
                        <?php endif ?>
                    @empty
                    @endforelse
                @empty
                <li class="li-component-aside-right clearfix">
                <h1 class="l-5 name-page text-ellips">Nenhuma Página Encontrada</h1>
                </li>
                @endforelse
            <?php else: ?>
                <li class="li-component-aside-right clearfix">
                <h1 class="l-5 name-page text-ellips">Nenhuma Página Seguida</h1>
                </li>
            <?php endif ?>
            </ul>
            <footer class="clearfix">
                <a href="" class="r-5">Ver Todas</a>
            </footer>
        </nav>
        <nav class="last-nav">
            <header>
                <h1>Sugestões para Você</h1>
            </header>
            <ul class="segest">

             @forelse($dadosPage as $Paginas)
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
                @forelse($dadosSeguida as $Seguida)
               <?php $tamanho = sizeof($dadosSeguida);?>
                <?php if ($Paginas->page_id == $Seguida->id) : ?>
                        <?php if ($dadosSeguindo[0]['identificador_id_seguindo'] == $Seguida->identificador_id_seguindo) : ?>
                                <?php $verifica1 = $Paginas->nome;?>
                            <?php else: ?>
                                <?php $verifica = $Paginas->nome;?>
                            <?php endif ?>
                 <?php else: ?>
                      <?php $conta_page += 1;?>
                <?php endif ?>
                    @empty
                    @endforelse
                    <?php if (($verifica1 != $verifica)  ) : ?>
                        <?php if (($verifica != 'B')  ) : ?>
                        <li class="li-component-aside-right clearfix" id="li-component-sugest-{{$Paginas->page_id}}">
                        @if( !($Paginas->foto == null) )
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $Paginas->foto }}">
                            </div>
                        @else
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                        @endif
                        <h1 class="l-5 name-page text-ellips">{{ $Paginas->nome }}</h1>
                        <h2 class="l-5 text-ellips">{{ $seguidors }} seguidores</h2>

                       <a href="" class="seguir" id="{{ $Paginas->page_id }}">seguir</a>

                       <input type="hidden" id="conta_id" value="{{ $account_name[0]->conta_id }}" name="">

                      <?php /* echo"
                        <a href=". route('seguir.seguindo', ['seguida' => $Paginas->page_id, 'seguindo' =>$account_name[0]->conta_id]). ">seguir</a>";
                                */?>

                            </li>



                            <?php endif ?>

                    <?php else: ?>

                    <?php endif ?>
                    <?php if (($conta_page == $tamanho)  ) : ?>
                        <li class="li-component-aside-right clearfix" id="li-component-sugest-{{$Paginas->page_id}}">
                        @if( !($Paginas->foto == null) )
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $Paginas->foto }}">
                            </div>
                        @else
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                        @endif
                        <h1 class="l-5 name-page text-ellips">{{ $Paginas->nome }}</h1>
                        <h2 class="l-5 text-ellips">{{ $seguidors }} seguidores</h2>


                        <a href="" class="seguir" id="{{ $Paginas->page_id }}">seguir</a>
                        <input type="hidden" id="conta_id" value="{{ $account_name[0]->conta_id }}" name="">
                      <?php /* echo"
                        <a href=". route('seguir.seguindo', ['seguida' => $Paginas->page_id, 'seguindo' =>$account_name[0]->conta_id]). ">seguir</a>";
                                */?>

                            </li>

                      <?php else: ?>

                    <?php endif ?>
                @empty
                <li class="li-component-aside-right clearfix">
                <h1 class="l-5 name-page text-ellips">Nenhuma Página Encontrada</h1>
                </li>
                @endforelse
            </ul>
            <footer class="clearfix">
                <a href="" class="r-5">Ver Todas</a>
            </footer>
        </nav>
    </aside>
    <main class="main-container">
        @yield('content');
    </main>
    </div>
</body>
@if($page_current == "page")
<?php if (true): ?>
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
<input type="checkbox" name="" id="target-profile-cover-post" class="invisible">
<div class="pop-up" id="cover-profile-post">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1 class="">Adicione Imagem</h1>
            <h1 class="invisible">Adicione Video</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover-post">
                    <div class="cancel-box div-img" id="cancel-box-add-file-post">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <input class="file" type="file" name="imgOrVideo" id="testeVid" style="width: 250px; margin-left: 10px; color: #fff;">
                <video style="display: none;" id="vidAnalyzer">
                  <source src="" type="">
                </video>
            </div>
        </div>
        <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
            <label for="target-profile-cover-post" class="label-full">
                <div class="cover-done checker" id="cover-done-post">
                    <h2 id="concluir_file" style="padding: 10px; font-size: 14px;">Concluido</h2>
                </div>
            </label>
        </div>
    </div>
</div>
</form>
<input type="checkbox" name="" id="target-profile-cover-page" class="invisible">
<div class="pop-up" id="cover-profile-page">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Adicione Foto da Página</h1>
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
                    <?php if (sizeof($page_content)): ?>
                        <input type="hidden" name="uuidPage" value="{{$page_content[0]->uuid}}">
                    <?php endif ?>
                    <input class="file" type="file" name="pagePicture" style="width: 250px; margin-left: 10px; color: #fff;" required>
                    <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                        <div class="cover-done" id="cover-done">
                            <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Concluido</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
@endif
<?php if (true): ?>
<input type="checkbox" name="" id="target-profile-cover" class="invisible">
<div class="pop-up" id="cover-profile">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Adicione Foto de Perfil</h1>
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
                    <input class="file" type="file" name="profilePicture" style="width: 250px; margin-left: 10px; color: #fff;" required>
                    <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                        <div class="cover-done" id="cover-done">
                            <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Concluido</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="target-proof" class="invisible">
<div class="pop-up" id="cover-proof">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 280px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1 class="">Enviar Comprovativo</h1>
            <div class="container-pop-up-component-header">
                <label for="target-proof">
                    <div class="cancel-box div-img" id="cancel-box-add-file-post">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <p class="alert-proof">O comprovativo pode ser uma imagem de depósito ou um arquivo pdf. Aguardará a confirmação. Após verifivação, será enviada uma NOTIFICAÇÃO</p>
            <form action="{{ route('account.profile.pic') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <input class="file" type="file" name="imgOrVideo" id="imgOrVideo" style="width: 250px; margin-left: 10px; color: #fff;">
                  <input type="hidden" name="Comprovativo" id="Comprovativo">
                  <input type="hidden" name="notificacao" id="notificacao">

                <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                    <label for="target-profile-cover-post" class="label-full">
                        <div class="cover-done" id="cover-done-post">
                          <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Concluido</button>
                        </div>
                    </label>
                </div>
            </form>
    </div>
</div>
</div>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="target-invited-relationship" class="invisible">
<div class="pop-up" id="invited-relationship">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 320px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Pedido de Relacionamento</h1>
            <div class="container-pop-up-component-header">
                <label for="target-invited-relationship">
                    <div class="cancel-box div-img" id="target-invited-relationship-id">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px; overflow-y: auto;">
            <div class="">
                <form enctype="multipart/form-data" action="{{ route('Pedido_relac') }}" method="POST">
                  @csrf
                    <label for="relationship-type-target">
                        <div class="relationship-type">
                            <i class="fas fa-sliders-h"></i>
                            <h1 id="relationship-selected-type">Tipo de Relacionamento</h1>
                        </div>
                    </label>
                    <input type="checkbox" name="" id="relationship-type-target" class="invisible">
                    <div class="relationship-type-all" id="relationship-type-container" name="relationship-type-container">
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $(document).click(function(e){
                                //console.log(e.target.className);
                                if(e.target.className == 'relationship-type-component'){
                                    $('#relationship-selected-type').text(e.target.id.split('-')[0]);
                                    $('#relationship-type-selected').val(e.target.id.split('-')[1]);
                                }
                            });
                        });
                    </script>
                    </div>

                    <div class="justify-content-start marriage-proposal" style="margin-bottom: 10px;">
                        <span class="text-white">Caso seja aceite, qual nome da Página de casal, gostaria de usar? (Pode ser editado...).</span>
                    </div>
                    <div class="form-group marriage-proposal">
                        <input type="text" class="input-text-default input-full" name="name_page" type="text" placeholder="Nome da Página do Casal">
                    </div>
                    <input type="hidden" name="conta_pedida" value="{{$account_name[0]->uuid}}" id="conta_pedida">
                    <input type="hidden" name="tipo_relac"  id="relationship-type-selected">
                    <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                        <div class="cover-done" id="cover-done-marriage">
                          <button type="submit" name="button" style="padding: 10px; font-size: 14px;" >
                            Concluido
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="options-invited-pop-up" class="invisible">
<div class="pop-up" id="invited-relationship-response">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 320px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Pedido de Relacionamento</h1>
            <div class="container-pop-up-component-header">
                <label for="target-invited-relationship">
                    <div class="cancel-box div-img" id="target-invited-relationship-id">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px; overflow-y: auto;">
            <div>
                <p class="alert-accept" id="textr">  </p>
            </div>
            <div>
                <label class="terms-use-alert" for="">Ler termos e responsabilidades sobre Noivado</label>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                <div class="cover-done" id="cover-done-marriage">
                  <form class="needs-validation" action="{{ route('conf_PR') }}" method="POST" novalidate>
                  @csrf

                    <button type="submit" name="button" style="padding: 10px; font-size: 14px;" >
                        Sim, Aceito
                    </button>
                    <input type="hidden" name="accept_relacd" id="accept_relacd">
                    <input type="hidden" name="id_notification" id="id_notification">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<script type="text/javascript">
    $(document).ready(function () {
      $('.like-a').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('|');
          if(id[0] == "on"){
            gostar(id[1]);
            let new_id = "off|" + id[1] + "|i";
            document.getElementById("on|" + id[1] + "|i").setAttribute('id', new_id);
            document.getElementById("off|" + id[1] + "|i").classList.remove('fas');
            document.getElementById("off|" + id[1] + "|i").classList.remove('liked');
            document.getElementById("off|" + id[1] + "|i").classList.add('far');
          } else if(id[0] == "off") {
            gostar(id[1]);
            let new_id = "on|" + id[1] + "|i";
            document.getElementById("off|" + id[1] + "|i").setAttribute('id', new_id);
            document.getElementById("on|" + id[1] + "|i").classList.add('fas');
            document.getElementById("on|" + id[1] + "|i").classList.add('liked');
            document.getElementById("on|" + id[1] + "|i").classList.remove('far');
          }
      });

      $('.comment-like-a').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('|');
          if(id[0] == "on"){
            comment_reac(id[1]);
            let new_id = "off|" + id[1] + "|i";
            document.getElementById("on|" + id[1] + "|i").setAttribute('id', new_id);
            document.getElementById("off|" + id[1] + "|i").classList.remove('fas');
            document.getElementById("off|" + id[1] + "|i").classList.remove('liked');
            document.getElementById("off|" + id[1] + "|i").classList.add('far');
          } else if(id[0] == "off") {
            comment_reac(id[1]);
            let new_id = "on|" + id[1] + "|i";
            document.getElementById("off|" + id[1] + "|i").setAttribute('id', new_id);
            document.getElementById("on|" + id[1] + "|i").classList.add('fas');
            document.getElementById("on|" + id[1] + "|i").classList.add('liked');
            document.getElementById("on|" + id[1] + "|i").classList.remove('far');
          }
      });


      function tipos(){

        $.ajax({
          url: "{{ route('tipos')}}",
          type: 'get',
          dataType: 'json',
          success:function(response){
            var tipo = '';
            var a = 0;
            console.log(response);
            $('.relationship-type-all').empty();
            $.each(response, function(key, value){
              if(a == 0){
              tipo += '<div class="relationship-type-all" id="relationship-type-container">'
            }
              tipo += ' <label for="relationship-type-target">'
              tipo +=        '<h2 id="' + value.tipo_relacionamento + '-' + value.tipo_relacionamento_id + '" class="relationship-type-component">' + value.tipo_relacionamento + '</h2>'
              tipo +=   ' </label>'
              tipo +=  '</div>'

             a++;
            })
            $('div[name=relationship-type-container]').append(tipo);
            }
          });

      }





      function tela_confirm(id1, id2){

        $.ajax({
          url: "{{ route('tconfirm')}}",
          type: 'get',
          data: {'id1': id1},
          dataType: 'json',
          success:function(response){
            console.log(response);
            $("#textr").text(response);
            $("#accept_relacd").val(id1);
            $("#id_notification").val(id2);
            }
          });

      }

      $('.seguir-a').click(function (e) {
          e.preventDefault();
          let id = e.target.id;
          let id1= id.split('-')[1];
          let id2= id.split('-')[2];

            seguir(id1, id2);

      });

      $('.send_proof').click(function (e) {
          let id = e.target.id;
          let id1= id.split('|')[0];
          let id2= id.split('|')[1];


          $("#Comprovativo").val(id1);
          $("#notificacao").val(id2);


      });

      $('.accept_relationship').click(function (e) {
          let id = e.target.id;
          let id1= id.split('|')[0];
          let id2= id.split('|')[1];


            tela_confirm(id1, id2);

      });

      $('.mudar_estado_not').click(function (e) {
          let id = e.currentTarget.id;
          let id1= id.split('|')[1];
          $.ajax({
            url: "{{ route('updatenot')}}",
            type: 'get',
            data: {'id1': id1},
            dataType: 'json',
            success:function(response){
              console.log(response);
              }
            });
      });

      $('.reject_relationship').click(function (e) {

          let id = e.target.id;
          let id1= id.split('|')[1];
          let id2= id.split('|')[2];
          $.ajax({
            url: "{{ route('reject_relationship')}}",
            type: 'get',
            data: {'id1': id1, 'id2': id2},
            dataType: 'json',
            success:function(response){
              console.log(response);
        //     $('li[name='id']').empty();
            //  $('div[name='+id2+']').empty();
              $('#not-'+id2).remove();
            //  $('#not-'+id2).hide();

              }
            });
      });




      $('.comentar-a').click(function (e) {
          e.preventDefault();
          let id = e.target.id;
          let coment = $('#comentario-' + id).val();
          //alert(coment);
          if(coment != ''){
            $("#comment-own-" + id).text(coment);
          $("#comment-users-own-" + id).css({
            display: "flex",
          });
          $("#comment-users-" + id).hide();
          $("#comentario-" + id).val('');
          comentar(id, coment);
        }
      });
      $('.accept').click(function(e) {
          e.preventDefault();
      });
      $('.savepost').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('-');
          guardar(id[1]);

      });
      $('.delete_post').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('-');
          delete_post(id[1]);

      });
      $('.ocultar_post').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('-');
          ocultar_post(id[1]);

      });

      $('.relationship-type-component').click(function(e){
            alert(e.target.id.split('-')[3]);
            $('#relationship-type-selected').val(e.target.id.split('-')[3]);
      });
      $('#genre-id').val($("input[name='genre']:checked").val());
      $('.genre-class').click(function(){
          $('#genre-id').val($("input[name='genre']:checked").val());
      });
        $('.cancel-box').click(function(){
            $('.pop-up').css({
                opacity: 0,
                zIndex: -1
            });
        });
        $('.add-edit-profile').click(function(){
            $('#cover-profile').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('.add-post').click(function(){
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('.add-file-element').click(function(){
            $('#cover-profile-post').css({
                opacity: 1,
                zIndex: 1001
            });
        });
        $('#cancel-box-add-file-post').click(function(){
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('#cover-done-post').click(function(){
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('#target-invited-relationship-id').click(function(){
            $('#invited-relationship').css({});
        });

        $('#concluir_file').click(function() {
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
        });
        $('.follwing-btn-pop-up').click(function(){
          tipos();
            $('#invited-relationship').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('.comment-send-post').click(function(e){
            e.preventDefault();
            let id = e.target.id;
            let id_final = id.split('-')[1];
            $('#comment-send-' + id_final).css({
                display : 'block',
            });
        });

        $('.checker').click(function(e) {

          var video = $('#testeVid').val();
          console.log(video.duration);

        });


        $('.seguir').click(function(e){
            e.preventDefault();
            var valor_pagina_id = e.target.id;
             var valor_idconta = $('#conta_id').val();
             $('#li-component-sugest-' + valor_pagina_id).remove();
             $('#li-component-suggest-' + valor_pagina_id).remove();
             $('.seguir-' + valor_pagina_id).hide();
             $.ajax({
                url: "{{route('seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': valor_idconta, 'seguida': valor_pagina_id},
                dataType: 'json',
                success: function(response){
                  console.log(response);
                }
              });

        })
        $('.nao_seguir').click(function(e){
            e.preventDefault();
            var valor_seguida = $('#seguida').val();
             var valor_seguindo = $('#seguindo').val()
             var npage_id = $('#npage_id').val();
             $('#seguida-' + valor_seguida).remove();
             $.ajax({
                url: "{{route('nao.seguir.seguindo')}}",
                type: 'get',
                data: {'seguindo': valor_seguindo, 'seguida': valor_seguida},
                dataType: 'json',
                success: function(response){
                  console.log(response);
                  $('.seguir-' + npage_id).show();
                }
              });

        });

        setInterval(function(e){
            let margin_stories = $('.main-container').offset();
            //console.log('margin_stories ' + margin_stories.top);
            let height = parseInt($('.main-container').height());
            let height_stories = $('#stories-card').height();
            //console.log('height ' + height);
            //console.log('height stories ' + height_stories);
            //console.log(margin_stories.top);
            //console.log('subt. ' + ((height - 400) + margin_stories.top));
            let control = 0;
            if ((height - 400) + margin_stories.top  <= 450) {
                control++;
                if(control == 3){

                }
            }

            let video_post1 = document.getElementsByClassName('video-post-video');
            //console.log(video_post1);

            //console.log('video ' + video_post1[0].id);
            let id;
            let video_post = $('.video-');
            let currentTime;
            let duration;
            let watched_video;
            //console.log(video_post1);
            let video_post_time;
            let storage_video;
            for (var i = 0; i <= video_post1.length - 1; i++) {
                /*if ($('#has-video-' + id).val() != "ok") {
                    console.log('entrou');
                    getVideo($('#vid-' + id).val(), id);
                }*/
                id = video_post1[i].id.split('_')[1];

                if ($('#video_' + id)) {
                    offset_video = $('#video_' + id).offset();
                    //console.log('offset video ' + offset_video.top);
                    video_post_time = $('#video-post-time-' + id);
                    if(offset_video.top < 190 && offset_video.top > -300){
                        console.log('hasvideo ' + id + ' ' + $('#has-video-' + id).val());
                        if ($('#has-video-' + id).val() != "ok") {
                            console.log('entrou');
                            getVideo($('#vid-' + id).val(), id);
                        }else{
                            console.log('não entrou');
                            $('#video-post-time-all-' + id).val(document.getElementById('video_' + id).duration / 2);
                            if (!(document.getElementById('video_' + id).paused) && $('#has-video-' + id).val() == 'ok') {
                                currentTime = document.getElementById('video_' + id).currentTime;
                                duration = document.getElementById('video_' + id).duration;
                                $('#video-post-time-' + id).val(currentTime);
                                //console.log('currentTime de video_' + id + ' = ' + $('#video-post-time-' + id).val());
                                if (currentTime >= (duration / 2)) {
                                    watched_video = $('#watch-video-' + id).val();
                                    //console.log('entrou no video watch-video ' + watched_video);
                                    add_view(watched_video);
                                }
                            } else {
                                if (document.getElementById('video_' + id).readyState == 4) {
                                    document.getElementById('video_' + id).play();
                                    document.getElementById('play_button_' + id).classList.add('invisible');
                                }
                            }
                        }

                    } else {
                        document.getElementById('video_' + id).pause();
                        document.getElementById('play_button_' + id).classList.remove('invisible');
                        //document.getElementById('play_button_' + id).src = '{{asset("storage/icons/pause.png")}}';
                    }
                }

            }
            let offset_post;
            let post_view = document.getElementsByClassName('post-view');
            //console.log(post_view);
            for (var i = 0; i <= post_view.length - 1; i++) {
                let id = post_view[i].id;
                //console.log('id post ' + id);
                offset_post = $('#' + id).offset();
                if(offset_post.top < 120 && offset_post.top > -100){
                    console.log($('#format-' + id.split('_')[2]).val());
                    if ($('#format-' + id.split('_')[2]).val() != 1) {
                        add_view(post_view[i].id);
                    }
                } else {

                }
            }
            document.get
        }, 100);

        function getVideo(post, id){
            let storage_video, video, type_file, source;
            $.ajax({
                url: "{{route('post.video.get')}}",
                type: 'get',
                data: {'data': post},
                dataType: 'json',
                success: function(response){
                    console.log('Respondeu...');
                    console.log(response);
                    video = response.video;
                    type_file = response.type_file;
                    storage_video = "{{asset('storage/video/page/') . '/'}}" + video;
                    console.log(storage_video);
                    source = document.createElement('source');
                    source.setAttribute('src', storage_video);
                    source.setAttribute('type', type_file);
                    source.setAttribute('autoload', 'true');
                    document.getElementById('video_' + id).setAttribute('src', storage_video);
                    document.getElementById('video_' + id).setAttribute('autoload', 'true');
                    document.getElementById('video_' + id).append(source);
                    $('#has-video-' + id).val('ok');
                }
            });
        }

        function add_view(data) {
            $.ajax({
                url: "{{route('post.view.save')}}",
                type: 'get',
                data: {'data': data},
                dataType: 'json',
                success: function(response){
                    console.log(response);
                }
            });
        }
        $('.play_button').click(function(e){
            let id = e.target.id.split('_')[2];
        });
        $('#search-lg-home-id').on('keyup',function(){
  let variavel= $('#search-lg-home-id').val();
  $('#table_search').val(variavel);
  let v= 1;
  if (variavel!='') {
    searchP(variavel, v);
  }else {
    $('div[name=pessoa]').empty();
    $('div[name=page]').empty();
  }
});

function searchP(variavel, v){
  var s1=0;
  var s2=1;
  var s3;
$.ajax({
  url: "{{ route('pessoa.pesquisa')}}",
  type: 'get',
  data: {'dados': variavel, 'v':v},
  dataType: 'json',
  success:function(response){
    var nome = '';
    var contador = 1;
    console.log(response.valor);
    s1 =response.valor.length;
      $.each(response.valor, function(key, value){
        let src = '{{asset("storage/img/users/")}}';
        if (value.estado_conta_id == 1) {
          if (contador == 1) {
            nome += '<li class="search-title">'
            nome += '<span style="color:#fff;" class="mt-2">Pessoas</span>'
            nome += '<ul class="card-flex">'
            nome += '</li>'

          }
          nome += '<li class="change-look search-info">'
          if (value.foto != null) {
            nome += '<div class="page-cover circle "><img class=" circle img-40" src= ' + src + '/' + value.foto + '></div>'
          }else {
            nome += '<div class=" page-cover circle "><i class="fas fa-user center" style="font-size: 15px; color: #ccc;"></i></div>'
          }
          nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
          var route1 = "{{route('account1.profile', 1) }}"
          url_array1 = route1.split('/');
          url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.uuid;
          nome += '<a href='+url_link1+' <span class="profile-name-1">'+value.nome+' '+value.apelido+'</span>'
          nome += '<a href='+url_link1+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
          nome += '</div></div></li><div class="couple-separator"></div>'
          if (contador == response.valor.length) {
            nome += '</ul>'
          }

            $('div[name=pessoa]').empty();
            $('div[name=pessoa]').append(nome);
            contador++;
          }
        })
    }


});
$.ajax({
  url: "{{ route('pagina.pesquisa')}}",
  type: 'get',
  data: {'dados': variavel , 'v':v},
  dataType: 'json',
  success:function(response){
    let src1 = '{{ asset("storage/img/page/") }}';
    var nome = '';
    var contador = 1;
    console.log(response.valor);
    s2 =response.valor.length;
      $.each(response.valor, function(key, value){
        if (value.estado_pagina_id==1) {

          if (contador == 1) {
            nome += '<li class="change-look search-info">'
            nome += '<span style="color:#fff;" class="mt-2">Páginas</span>'
            nome += '<ul class="card-flex">'
            nome += '</li>'
          }
          nome += '<li class="change-look search-info">'
          if (value.foto != null) {
            nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src=' + src1 + '/' + value.foto + '></div>'
          }else {
            nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>'
          }
          nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
          var route10 = "{{route('couple.page1', 1) }}"
          url_array10 = route10.split('/');
          url_link10 = url_array10[0] + "/" + url_array10[1] + "/" + url_array10[2] + "/"+ url_array10[3] +  "/" + value.uuid;
          nome +='<a href='+url_link10+'>'
          nome += '<span class="profile-name-1">'+value.nome+'</span>'
          nome +='</a>'
          nome += '<a href='+url_link10+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
          nome += '</div></div></li><div class="couple-separator"></div>'
          if (contador == response.valor.length) {
            nome += '</ul>'
          }
           $('div[name=page]').empty();
            $('div[name=page]').append(nome);
            contador++;
          }
        })

    }
});

  s3=s1+s2;
 if (s3 == 0) {
  nome = '<div style="color: white;" class="ml-2 mt-2">Sem resultados</div>';
  $('div[name=page]').empty();
  $('div[name=page]').append(nome);
}
}

        $('#search-lg-home-id').focus(function(){
            $('.container-search-home').css({
                display: 'block',
            });
            $('#search-lg-home-id-container').focus();
        });
        $(document).click(function(e){
            let className = e.target.className.split(' ');
            if(className[0] == "container-search-home" ||
                className[0] == "input-search" ||
                className[0] == "search-lg" ||
                className[0] == "search-id-container" ||
                className[0] == "fa-search" ||
                className[0] == "change-look" ||
                className[0] == "input-search" ||
                className[0] == "input-search"){
                $('.container-search-home').css({
                    display: 'block',
                });
            } else {
                $('.container-search-home').css({
                    display: 'none',
                });
            }
            console.log(className[0]);
            if (className[0] != "noti-card-first" ||
                className[0] != "hidden-click-any-container" ||
                className[0] != "fa-option-mobile-hide" ||
                className[0] != "fa-option-mobile-hide" ||
                className[0] != "fa-option-mobile-hide") {
                /*$('.noti-card-first').css({
                   display: 'none',
                });*/
            }else {
                $('#more-option-notify').css({

                });
            }
            //console.log(className[0]);
        });
        $('.play_button').click(function(e){
            let id = e.target.id.split('_')[2];
            let video = $('#video_' + id).offset();
            console.log('margem top ' + video.top)
            if (true) {
                $('#video_' + id).get(0).play();
            } else {
                $('#video_' + id).get(0).pause();
            }
        });


});



  const trigger = document.querySelector('#cover-done-post');
  trigger.addEventListener('click', function(e) {
    const vid = document.querySelector('#testeVid');
    const vid_container = document.querySelector('#vidAnalyzer > source');
    for (var i = 0; i < vid.files.length; i++) {
      console.log(vid.files[i].type);
      vid_container.src = "video.mp4";
      //vid_container
      console.log(vid_container.src);
    }
    e.preventDefault();
  });
  //console.log(vid);



</script>
</html>

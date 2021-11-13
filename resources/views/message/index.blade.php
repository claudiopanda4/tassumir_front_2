@extends('layouts.app_message')
@section('header')
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
                            <input type="search" name="" placeholder="O que está procurando?" class="input-text" id="search-lg-home-id-container">
                        </div>
                        <div class="search-id-container">
                            
                        </div>
                        <div class="change-look mb-5" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">
                            <a href="{{route('account.all.notifications')}}"><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>
                        </div>
                    </div>
                </li>
            </ul>
            <nav class="menu-header ">
                <ul class="clearfix ">
                    <li class="l-5 mobile-header-icon">
                        <a href="{{route('allSearch.page')}}"><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon" style="z-index:2;">
                        <div class="hidden-click-any-container last-component-n clearfix-n " >
                            <label for="more-option-notify" class="hidden-click-any-container fa-option-mobile-hide">
                                <i class="hidden-click-any-container far fa-bell fa-24 fa-option" size="7"></i>
                            </label>
                            <a href="{{route('account.all.notifications')}}" class="hidden-click-any-container fa-option-mobile-lg-hide">
                                <i class="hidden-click-any-container far fa-bell fa-24 fa-option" size="7"></i>
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
                            <li class="hidden-click-any-container send-invited-relationship clearfix">
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
                                                <!--<h2 class="accept">Aceitar</h2>-->
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
                            </li>
                              <?php foreach ($notificacoes as $key => $value): ?>
                                @if($key < 3)
                                <li class="hidden-click-any-container change-look noti-flex-info" >
                                  <?php if ($notificacoes[$key]['v']== 1): ?>
                                    <?php if ($notificacoes[$key]['foto']!= null): ?>

                                    <div class="hidden-click-any-container ml-2 novi-div-image">
                                         <img class="l-5 circle img-40" src="{{ asset('storage/img/users') . '/' . $notificacoes[$key]['foto'] }}">
                                    </div>
                                    <?php else: ?>
                                      <div class="hidden-click-any-container ml-2 novi-div-image">

                                           <img class="hidden-click-any-container l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>


                                      </div>
                                      <?php endif; ?>
                                    <?php elseif ($notificacoes[$key]['v']== 2): ?>
                                      <?php if ($notificacoes[$key]['foto']!= null): ?>

                                      <div class="hidden-click-any-container ml-2 novi-div-image">

                                           <img class="hidden-click-any-container l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>


                                      </div>
                                      <?php else: ?>
                                        <div class="hidden-click-any-container ml-2 novi-div-image">

                                             <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>


                                        </div>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <div class="hidden-click-any-container noti-div-name">

                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$key]['notificacao']}}</span>

                                    <div class="hidden-click-any-container noti-hour ml-2">
                                        <a href=""><span class="">há um dia</span></a>
                                    </div>

                                   </div>

                                </li>
                                @endif
                                
                              <?php endforeach; ?>

                                 <li class="hidden-click-any-container change-look mb-5" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">
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
@stop
@section('content')
<div class="main clearfix" id="main-direct">
    <aside class="chat l-5">
        <div class="search-container-chat">
            <div class="input-search">
                <i class="fas fa-search fa-16 fa-search-main"></i>
                <input type="search" name="" placeholder="Quem você está procurando?" class="input-text" id="search-lg-home-id-container">
            </div>
        </div>
        <nav class="nav-menu-chat">
            <ul>
                <?php $users = [
                    [],[],[],[],[],[],[],[],
                ]; 

                foreach ($users as $key => $value):?>
                <li class="clearfix">
                    <a href="">
                        <div class="container-img circle l-5">
                            <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="circle img-full">
                        </div>
                        <div class="nav-menu-chat-component-user l-5">
                            <h1>{{$conta_logada[0]->nome}}</h1>
                        </div>    
                    </a>
                </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </aside>
    <div class="container-message l-5">
        <header class="clearfix">
            <a href="">
                <div class="container-img circle l-5">
                    <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="circle img-full">
                </div>
                <div class="nav-menu-chat-component-user l-5">
                    <h1>{{$conta_logada[0]->nome}}</h1>
                </div>    
            </a>
        </header>
        <div class="body-message clearfix">
            @forelse($message_user as $allMessage)
            <?php if ($user_logado[0]->identificador_id == $allMessage->id_identificador_a): ?>
                <div class="own-user l-5">
                  <div class="clearfix">
                      <div class="container-img circle l-5">
                        <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="circle img-full">
                    </div>
                    <div class="message-body l-5">
                        <div>
                            <p>{{$allMessage->message}}</p>
                        </div>
                    </div>
                  </div>  
                </div>        
            <?php endif ?>
            <?php if ($user_logado[0]->identificador_id == $allMessage->id_identificador_b): ?>
                <div class="other-user r-5">
                    <div class="clearfix">
                      <div class="container-img circle l-5">
                        <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="circle img-full">
                    </div>
                    <div class="message-body l-5">
                        <div>
                            <p>{{$allMessage->message}}</p>
                        </div>
                    </div>
                  </div> 
                </div>        
            <?php endif ?>
        @empty
        <div class="message-body l-5">
                        <div>
                            <p>Comece a Conersa, Mande uma mensagem!</p>
                        </div>
                    </div>
        @endforelse
        </div>
        <div class="comment-send clearfix" id="comment-send-1">
            <div class="img-user-comment l-5">
                <img class="img-full circle" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
            </div>
            <div class="input-text comment-send-text l-5 clearfix">
                <input type="text" class="" name="comentario" id="comentario-1" placeholder="O que você tem a dizer?">
                <div class="r-5 ">
                    <a href="" class="comentar-a" id="1">
                        <i class="far fa-paper-plane fa-20 fa-img-comment" id="1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@extends('layouts.app')

@section('content')
<div class="main" style="margin-bottom: 15px;">
    <div class="card br-10 " style="height:auto; margin: 15px auto 25px;">
    <header class="noti-flex-1">
            <div class="noti-div-title">
             <h3 class="noti-title">Notificações</h3>
            </div>

            <div class="noti-div-elipsis">
            <i class="fas fa-ellipsis-h fa-18 fa-option "></i>
            </div>
    </header>

    <div class="noti-flex mt-2">
        <div class="noti-div-subtitle">
            <h4 class="noti-subtitle">Novas</h4>
        </div>
    </div>
      <!--  <div class="send-invited-relationship clearfix">
            <div class="user-identify-img circle l-5">
                <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="img-full circle">
            </div>
            <div class="details-invited l-5">
                <span class="description-invited">
                    <a href="">Hugo Paulo</a> enviou um Pedido de Relacionamento para VOCÊ
                </span>
                <div class="options-invited clearfix">
                    <label class="l-5" for="options-invited-pop-up">
                        <div class="label-invited">
                            <!-<h2 class="accept">Aceitar</h2>->
                            <h2>Aceitar</h2>
                        </div>
                    </label>
                    <a href="" class="l-5 denied">Rejeitar</a>
                </div>
            </div>
        </div>
        <div class="send-invited-relationship clearfix">
            <div class="user-identify-img circle l-5">
                <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="img-full circle">
            </div>
            <div class="details-invited l-5">
                <span class="description-invited">
                    <a href="">Hugo Paulo</a> Respondeu a sua Solicitação de Registo de compromisso
                </span>
                <div class="options-invited clearfix">
                    <a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a>
                </div>
            </div>
        </div>-->
        @for($i=sizeof($notificacoes); $i > 0 ; $i--)
        @if($notificacoes[$i- 1]['estado']!= 3)
    <div class="noti-flex-info mt-2" id="{{$notificacoes[$i- 1]['id1']}}" name="{{$notificacoes[$i- 1]['id1']}}">
        <div class="ml-2 novi-div-image">

             <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>


        </div>
        <div class="noti-div-name">

            <span class="noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
            <div class="noti-hour">
                <a href=""><span class="">há um dia</span></a>
            </div>
            @if($notificacoes[$i- 1]['tipo'] == 4)
            <div class="options-invited clearfix">
                <label class="l-5" for="options-invited-pop-up">
                    <div class="hidden-click-any-container label-invited" id="{{$notificacoes[$i- 1]['id']}}">
                        <!--<h2 class="accept">Aceitar</h2>-->
                        <h2 class="accept_relationship" id="{{$notificacoes[$i- 1]['id']}}">Aceitar</h2>
                    </div>
                </label>
                <div class="reject_relationship" id="{{$notificacoes[$i- 1]['id']}}">
                <a href="" class="l-5 denied">Rejeitar</a>
                </div>
            </div>
            @elseif($notificacoes[$i- 1]['tipo'] == 7)
            <div class="options-invited clearfix">
                <!--   <a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a> -->
                               <a href="{{route('relationship.page1',$notificacoes[$i- 1]['id'])}}">Ver Resposta</a>
            </div>
            @endif
        </div>

    </div>
   @endif
  @endfor


</div>
</div>
@stop

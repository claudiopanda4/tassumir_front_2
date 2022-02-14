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
        @for($i=0; $i < sizeof($notificacoes) ; $i++)
          @if($notificacoes[$i]['barra_data']==1)

          <li class="hidden-click-any-container noti-flex mt-2">

              <div class="hidden-click-any-container noti-div-subtitle">
                  <h4 class="noti-subtitle">Hoje</h4>
              </div>
          </li>
            @elseif($notificacoes[$i]['barra_data']==2)

            <li class="hidden-click-any-container noti-flex mt-2">

                <div class="hidden-click-any-container noti-div-subtitle">
                    <h4 class="noti-subtitle">Antigas</h4>
                </div>
            </li>
          @endif
            <li class="hidden-click-any-container change-look noti-flex-info" id="not-{{$notificacoes[$i]['id1']}}" name="not-{{$notificacoes[$i]['id1']}}">
              <?php if ($notificacoes[$i]['v']== 1): ?>
                <?php if ($notificacoes[$i]['foto']!= null): ?>

                <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                     <img class="circle img-40" src="{{ asset('storage/img/users') . '/' . $notificacoes[$i]['foto'] }}">
                </div>
                <?php else: ?>
                  <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                       <img class="hidden-click-any-container circle img-24 center" src='{{asset("storage/icons/user_.png")}}'>
                  </div>
                  <?php endif ?>
                <?php elseif ($notificacoes[$i]['v']== 2): ?>
                  <?php if ($notificacoes[$i]['foto']!= null): ?>

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
               @if($notificacoes[$i]['tipo'] == 1)
               <a href="{{route('post_index', $notificacoes[$i]['link'])}}" id="Notificacao|{{$notificacoes[$i]['id1']}}" class="mudar_estado_not" >
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 2)
               <a href="{{route('post_index', $notificacoes[$i]['link'])}}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 3)
               <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 4 || $notificacoes[$i]['tipo'] == 7)
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               @elseif($notificacoes[$i]['tipo'] == 5)
               <a href="{{route('couple.page1', $notificacoes[$i]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 6)
               <a href="{{route('post_index', $notificacoes[$i]['link'])}}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 8)
               <a href="{{route('couple.page1', $notificacoes[$i]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 9)
               <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 10)
               <a href="{{route('relationship.page1', $notificacoes[$i]['id']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 11)
               <a href="{{route('account.delete.page', $notificacoes[$i]['id1']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 12)
               <a href="{{route('account.delete.page', $notificacoes[$i]['id1']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @elseif($notificacoes[$i]['tipo'] == 13)
               <a href="{{route('couple.page1', $notificacoes[$i]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @else
               <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i]['id1']}}">
                <span class="hidden-click-any-container noti-span">{{$notificacoes[$i]['notificacao']}}</span>
               </a>
               @endif
                <div class="hidden-click-any-container noti-hour ml-2">
                    <a href=""><span class="">{{$notificacoes[$i]['data_creat']}} as {{$notificacoes[$i]['hora_creat']}}</span></a>
                </div>
                @if($notificacoes[$i]['tipo'] == 4)
                <div class="hidden-click-any-container options-invited clearfix">
                    <label class="hidden-click-any-container l-5" for="options-invited-pop-up">
                        <div class="hidden-click-any-container label-invited" id="">
                            <h2 class="accept_relationship" id="{{$notificacoes[$i]['id']}}|{{$notificacoes[$i]['id1']}}">Aceitar</h2>
                        </div>
                    </label>
                    <div class="reject_relationship" id="R|{{$notificacoes[$i]['id']}}|{{$notificacoes[$i]['id1']}}">
                    <a href="" class="hidden-click-any-container l-5 denied " id="R|{{$notificacoes[$i]['id']}}|{{$notificacoes[$i]['id1']}}">Rejeitar</a>
                </div>
              </div>
                @elseif($notificacoes[$i]['tipo'] == 7)
                <div class="hidden-click-any-container options-invited clearfix">
                    <!--<a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a>-->
                    <a  href="{{route('relationship.page1', $notificacoes[$i]['id']) }}" class="ver_mais" id="VR|{{$notificacoes[$i]['id1']}}">Ver Resposta</a>
                </div>
                @endif
               </div>
               @if($notificacoes[$i]['state_notification']== 2)
                   <div class="not-new">
                   </div>
               @endif
            </li>
          @endfor


</div>
</div>
@stop

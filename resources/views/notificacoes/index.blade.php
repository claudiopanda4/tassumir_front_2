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
        <?php foreach ($notificacoes as $key => $value): ?>
    <div class="noti-flex-info mt-2">

        <div class="ml-2 novi-div-image">

             <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>


        </div>
        <div class="noti-div-name">

            <span class="noti-span">{{$notificacoes[$key]['notificacao']}}</span>
            <div class="noti-hour">
                <a href=""><span class="">há um dia</span></a>
            </div>
        </div>

    </div>

  <?php endforeach; ?>


</div>
</div>
@stop

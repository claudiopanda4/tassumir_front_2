@extends('layouts.app')

@section('content')

<div class="card br-10 " style="height:380px;">

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

    <div class="noti-flex-info mt-2">
        
        <div class="ml-2 novi-div-image">

             <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
             
            
        </div>
        <div class="noti-div-name">
            
            <span class="noti-span">Delton Agostinho, gostou a foto do casal Panda </span>
            <div class="noti-hour">
                <a href=""><span class="">há um dia</span></a>
            </div>
        </div>

    </div>

    <div class="noti-flex-info mt-2">
        
        <div class="ml-2 novi-div-image">

             <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
             
            
        </div>
        <div class="noti-div-name">
            
            <span class="noti-span">Delton Agostinho, comentou a foto de Hugo Paulo  </span>
            <div class="noti-hour">
                <a href=""><span class="">há 20min</span></a>
            </div>
        </div>

        <!--<div class=" mt-1 novi-div-others-options" style="">
            
            <i class="fas fa-ellipsis-h fa-18 fa-option "></i>
        </div>-->

    </div>
    <div class="noti-flex mt-2">

        <div class="noti-div-subtitle">
            <h4 class="noti-subtitle">Anteriores</h4>
        </div>
        
    </div>

    <div class="noti-flex-info">
        
        <div class="ml-2 novi-div-image">

             <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
             
            
        </div>
        <div class="noti-div-name ">
            
            <span class="noti-span">Delton Agostinho, fez-te um pedido de relacionamento </span>
            <div class="noti-hour">
                <a href=""><span class="">há um dia</span></a>
            </div>
            <div class="noti-hour-1 mt-2">
                <a href="" class="noti-btn-aceitar"><span class="">Aceitar</span></a>
                <a href="" class="noti-btn-rejeitar"><span class="">Rejeitar</span></a>
            </div>
        </div>


    </div>

    
</div>

@stop
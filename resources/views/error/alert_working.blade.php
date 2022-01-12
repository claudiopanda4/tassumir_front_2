@extends('layouts.app')

@section('content')
<div class="main" id="main-container-profile">
    <div class="card br-10 card-flex">
        <div class="message-for-user">
            <i class="hidden-click-any-container fas fa-exclamation-triangle fa-24 notify-icon l-5" id="message-for-user-icon"></i>
            <div class="message-for-user-component l-5">
                <h1>O Tassumir está a trabalhar para trazer essa funcionalidade até você...</h1>
                <h1>{{ $conta_logada[0]->nome }}, esperamos que entenda e por favor aguarde...</h1>
                <h1>Enquanto isso, aproveite as funcionalidades já disponíveis no Tassumir</h1>
                <a href="{{route('account.home')}}">Voltar</a>
            </div>
            
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

    });
</script>
@stop

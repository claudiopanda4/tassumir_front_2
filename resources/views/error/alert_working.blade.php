@extends('layouts.app')

@section('content')
<div class="main" id="main-container-profile">
    <div class="card br-10 card-flex">
        <div class="message-for-user">
            <div class="icon-container-alert l-5">
                <i class="hidden-click-any-container fas fa-exclamation-triangle fa-20 notify-icon center" id="message-for-user-icon"></i>
            </div>
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
      var select_li =window.location.href.split('/');
        document.getElementById(select_li[select_li.length - 1]).classList.add('li-component-aside-active');


    });
</script>
@stop

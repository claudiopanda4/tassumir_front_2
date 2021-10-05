@extends('layouts.app')

@section('content')
<header class="card br-10 stories stories-about-talking">
            
</header>
<div class="card br-10">
    <div class="post-created">
        <img class="circle" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
        <textarea placeholder="O que você está pensando"></textarea>
        <nav class="clearfix">
            <ul class="clearfix">
                <button class="button-post br-5">Publicar</button>
            </ul>
            <ul class="clearfix last-menu">
                <li class="l-5">
                    <a href=""><i class="fas fa-video fa-16 fa-icon-roxo center"></i></a>
                </li>
                <li class="l-5">
                    <a href=""><i class="fas fa-images fa-16 fa-icon-roxo center"></i></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@stop
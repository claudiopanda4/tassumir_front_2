@extends('layouts.app')

@section('content')
<div class="main" id="my-pages">
    <header class="card br-10 stories stories-about-talking">
                
    </header>
    <div class="card br-10">
        <nav>
            <h1 class="title">Minhas Páginas</h1>
            <ul>
                <?php 
                $my_pages = [
                    [],[],[]
                ]; 
                foreach ($my_pages as $key => $value): ?>
                <li class="li-component-aside-right clearfix li-my-page">
                    <div class="page-cover circle l-5">
                        <img class="img-full circle" src="../storage/img/page/t30_13_1092985.jpg">
                    </div>
                    <a href=""><h1 class="l-5 name-page text-ellips">Famosos em Relacionamentos</h1></a>
                    <h2 class="l-5 text-ellips">120 mil seguidores</h2>
                    <a href="" class="l-5">seguir</a>
                </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </div>    
</div>
@stop
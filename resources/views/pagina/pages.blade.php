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
                    $key = 0;
                ?>
                @foreach($allUserPages as $key => $page)
                    <li class="li-component-aside-right clearfix li-my-page">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src="../storage/img/page/t30_13_1092985.jpg">
                        </div>

                        <a href="{{route('couple.page_u', $page[$key]['page_uuid']) }}"><h1 class="l-5 name-page text-ellips"> {{ $page[$key]['page_name'] }} </h1></a>
                        @if($page[$key]['seguidores'] > 1)
                            <h2 class="l-5 text-ellips"> {{ $page[$key]['seguidores'] }} seguidores</h2>

                        <a href="{{ route('couple.page1', $page_content[$key]->uuid) }}"><h1 class="l-5 name-page text-ellips"> {{ $page['page_name'] }} </h1></a>
                        @if($page['seguidores'] > 1)
                            <h2 class="l-5 text-ellips"> {{ $page['seguidores'] }} seguidores</h2>

                        @else
                            <h2 class="l-5 text-ellips"> {{ $page[$key]['seguidores'] }} seguidor</h2>
                        @endif
                        <!-- <a href="" class="l-5">seguir</a> -->
                    </li>
                    <?php $key++; ?>
                @endforeach
            </ul>
        </nav>
    </div>    
</div>
@stop
@extends('layouts.app')

@section('content')
<div class="main" id="my-pages">
    <header class="card br-10 stories stories-about-talking">
                
    </header>
    <div class="card br-10">
        <nav>
            <h1 class="title">Minhas Páginas</h1>
            <ul>

                @foreach($allUserPages as $key => $page)
                    <li class="li-component-aside-right clearfix li-my-page">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $page_content[0]->foto }}">
                            <img class="img-full circle" src="../storage/img/page/t30_13_1092985.jpg">
                        </div>
                        <a href="{{route('couple.page1', $page['page_uuid']) }}"><h1 class="l-5 name-page text-ellips"> {{ $page['page_name'] }} </h1></a>
                        @if($page['seguidores'] > 1)
                            <h2 class="l-5 text-ellips"> {{ $page['seguidores'] }} seguidores</h2>
                        @else
                            <h2 class="l-5 text-ellips"> {{ $page['seguidores'] }} seguidor</h2>
                        @endif
                        <!-- <a href="" class="l-5">seguir</a> -->
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>    
</div>
@stop
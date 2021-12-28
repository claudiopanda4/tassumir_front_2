@extends('layouts.app')

@section('content')
<div class="main" id="my-pages">
    <header class="card br-10 stories stories-about-talking">

    </header>
    <div class="card br-10">
        <nav>
          @if($v[0]['id'] == $conta_logada[0]->conta_id)
            <h1 class="title">Casais que eu sigo</h1>
            @else
            <h1 class="title">Casais que sigue</h1>
            @endif
            <ul>
             @if(sizeof($PS)>0)
                @foreach($PS as $key => $page)

                    <li class="li-component-aside-right clearfix li-my-page">
                        @if(!($page['foto'] == null) )
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $page['foto'] }}">
                            </div>
                        @else
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                        @endif
                        <a href="{{ route('couple.page1', $page['uuid']) }}"><h1 class="l-5 name-page text-ellips"> {{ $page['nome'] }} </h1></a>

                        @if($page['qtdseg'] > 1)
                            <h2 class="l-5 text-ellips"> {{ $page['qtdseg'] }} seguidores</h2>
                        @else
                            <h2 class="l-5 text-ellips"> {{ $page['qtdseg'] }} seguidor</h2>
                        @endif
                        <!-- <a href="" class="l-5">seguir</a> -->
                    </li>
                @endforeach
                @endif
 
            </ul>
        </nav>
    </div>
</div>
@stop

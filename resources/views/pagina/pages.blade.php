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
                        @if(!($page_content[$key]->foto == null) && ($page['page_uuid'] == $page_content[$key]->uuid) ))
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $page_content[$key]->foto }}">
                            </div>
                        @else
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                        @endif
                        <a href="{{ route('couple.page1', $page['page_uuid']) }}"><h1 class="l-5 name-page text-ellips"> {{ $page['page_name'] }} </h1></a>

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
<script type="text/javascript">
$(document).ready(function () {
  document.getElementById("route_page").classList.add('li-component-aside-active');
});
</script>
@stop

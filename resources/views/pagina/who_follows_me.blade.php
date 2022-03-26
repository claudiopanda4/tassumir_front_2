@extends('layouts.app')

@section('content')
<div class="main" id="my-pages">
    <header class="card br-10 stories stories-about-talking">

    </header>
    <div class="card br-10">
        <nav>
            <h1 class="title">Pessoas que me seguem</h1>
            <ul>
             @if(sizeof($who_follows_me)>0)
                @foreach($who_follows_me as $key)

                    <li class="li-component-aside-right clearfix li-my-page">
                        @if(!($key->foto == null) )
                            <div class="page-cover circle l-5">
                              <img class="img-profile img-full circle" src="{{asset('storage/img/users') . '/' . $key->foto}}" >
                            </div>
                        @else
                            <div class="page-cover circle l-5">
                              <i class="fas fa-user center" style="font-size: 50px; color: #ccc;"></i>
                            </div>
                        @endif
                        <a href="{{ route('account1.profile', $key->uuid) }}"><h1 class="l-5 name-page text-ellips"> {{$key->nome}} {{$key->apelido}} </h1></a>

                    </li>
                @endforeach
                @endif

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

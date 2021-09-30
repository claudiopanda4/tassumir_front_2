@extends('layouts.app')

@section('content')
<header class="card br-10 card-flex">
    <div id="img-profile-container" class="circle">
        <img class="img-profile img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
    </div>
    <div class="" id="card-ident">
        <div id="ident-profile">
            <h1 class="profile-name">Delton Agostinho Neto</h1>
            <div class="invite-icon circle">
                <a href=""><i class="fas fa-user-plus fa-16 center"></i></a>
            </div>
        </div>
        <ul>
            <li class="statistics-profile">
                <h2>65 A Seguir</h2>
            </li>
        </ul>
        <div class="inform-profile">
            <h3>Namorado de <span>Ana Joyce</span></h3>
        </div>
        <div class="inform-profile">
            <p>Estou trabalhando nisso...</p>
        </div>
    </div>   
</header>
<div class="card br-10">
    <div>
        <div class="img-profile-user-married">
            <img src="">
        </div>
        <div>
            <h1>Página do Casal</h1>
            <ul>
                <li>20 seguidores</li>
                <li>50 publicações</li>
            </ul>
            <a href=""><i class="fas fa-user-plus fa-24"></i><h1>Ver</h1></a>
        </div>
        <div class="img-profile-user-married">
            <img src="">
        </div>
    </div>
</div>
<div class="card br-10">
    <nav>
        <ul>
            <li><a href=""><i class="fas fa-user-plus fa-24"></i><h1>Guardados</h1></a></li>
            <li><a href=""><i class="fas fa-user-plus fa-24"></i><h1>Pedidos</h1></a></li>
        </ul>
    </nav>
    <div class="saved-container">
        
    </div>
    <div class="invited-container">
        
    </div>
</div>
@stop
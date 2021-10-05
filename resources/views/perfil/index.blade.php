@extends('layouts.app')

@section('content')
<header class="card br-10 card-flex">
    <div id="img-profile-container" class="circle">
        <img class="img-profile img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
        <a href="">
            <div class="add-edit-profile circle">
                <i class="fas fa-plus center" style="font-size: 10px;"></i>
            </div>
        </a>
    </div>
    <div class="" id="card-ident">
        <div id="ident-profile">
            <h1 class="profile-name">Delton Agostinho Neto</h1>
            <div class="invite-icon circle">
                <a href=""><i class="fas fa-user-plus fa-16 center" style="font-size: 14px;"></i></a>
            </div>
        </div>
        <ul class="profile-follow">
            <li class="statistics-profile">
                <h2>65 A Seguir</h2>
                <a href=""><h3 class="edit-profile">Editar Perfil</h3></a>
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
    <div id="" class="page-married">
        <div class="img-profile-user-married">
            <img class="img-profile img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
            <div>
                <h3 class="text-ellips">Delton Agostinho</h2>
            </div>
        </div>
        <div class="identify-statist-profile-page">
            <h1 style="margin-top: 15px;">Página do Casal</h1>
            <ul>
                <li class="text-ellips">20 seguidores</li>
                <li class="text-ellips">50 publicações</li>
            </ul>
            <a href="">
                <div class="see-page-container">
                    <i class="fas fa-eye fa-16"></i><h1 id="see-page">Ver</h1>
                </div>
            </a>
        </div>
        <div class="img-profile-user-married">
            <img class="img-profile img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
            <div>
                <h3 class="text-ellips">Ana Joyce</h3>
            </div>
        </div>
    </div>
</div>
<div class="card br-10">
    <nav class="option-profile-menu">
        <ul class="">
            <li><a href=""><i class="fas fa-bookmark fa-14"></i><h1 class="menu-option-profile">Guardados</h1></a></li>
            <?php if (false): ?>
                <li><a href=""><i class="fas fa-ring fa-14"></i><h1 class="menu-option-profile">Pedidos</h1></a></li>
            <?php endif ?>
            <li><a href=""><i class="fas fa-eye fa-14"></i><h1 class="menu-option-profile">Seguindo</h1></a></li>
            <li><a href=""><i class="fas fa-heart fa-14"></i><h1 class="menu-option-profile">Curtindo</h1></a></li>
        </ul>
    </nav>
    <div class="saved-container">
        
    </div>
    <div class="invited-container">
        
    </div>
</div>
<div>
    <a href="">
        <div class="container-logout">
            <a href="{{route('account.logout')}}"><h1 class="btn-a-default">Terminar Secção</h1></a>
        </div>
    </a>
</div>
@stop
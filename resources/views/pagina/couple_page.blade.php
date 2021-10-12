@extends('layouts.app')

@section('content')	
<div class="main" id="main-container-profile">
    <div class="card br-10 card-flex card-page">
        <div class="clearfix">
            <div class="img-profile-page-container clearfix l-5">
                <div class="img-profile-page circle l-5">
                    <img src="{{asset('storage/img/page/unnamed.jpg')}}" class="img-full circle">
                </div>
            </div>
            <div class="statistics-profile-page l-5 clearfix">
                <div class="statistics-profile-page-identify">
                    <h1>Delton e Ana</h1>
                    <h2>@deltonana</h2>
                </div>
                <div class="follwing-btn-container">
                    <button type="submit" class="follwing-btn">
                        Seguir
                    </button>
                </div>
                <div class="statistics-profile-page-component-container clearfix">
                    <div class="statistics-profile-page-component l-5">
                        <h1>123</h1>
                        <h2>Publicações</h2>
                    </div>
                    <div class="statistics-profile-page-component l-5">
                        <h1>123</h1>
                        <h2>A Seguir</h2>
                    </div>
                    <div class="statistics-profile-page-component l-5">
                        <h1>123</h1>
                        <h2>Seguindo</h2>
                    </div>
                </div>
                
            </div>
            <div class="edit-page-container">
                <button type="submit" class="follwing-btn" id="edit-page">
                    Editar Página
                </button>
            </div>
        </div>
        <div class="clearfix">
            <div class="description-couple">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
                </p>
            </div>
        </div>
    </div>
</div>
@stop

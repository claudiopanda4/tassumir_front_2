<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Tassumir') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="{{ asset('js/jquery/jquery-3.5.1/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checked.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width-width, initial-scale=1,0">
    <meta http-equiv="UA-X-Compatible" content="ie=edge">
</head>

<body class="container-main">
    <div class="body-pop-up content-full-scroll">
        <header class="header-main header-main-component clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><i class="fas fa-link fa-24"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden">
                    <div class="input-search">
                        <i class="fas fa-search fa-16 fa-search-main"></i>
                        <input type="search" name="" placeholder="O que está procurando?" class="input-text" >
                    </div>
                </li>
            </ul>
            <nav class="menu-header">

                <ul class="clearfix ">
                    <li class="l-5 mobile-header-icon">
                        <a href=""><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon" style="z-index:2;">
                        <div class="last-component-n clearfix-n " >

                            <label for="more-option-notify">
                                <i class="far fa-bell fa-24 fa-option" size="7"></i>
                            </label>
                            <input type="checkbox" name="" id="more-option-notify" class="hidden">
                            <ul class="clearfix more-option-post-n card-flex">
                                <li class="mb-4" style="display: flex;justify-content: flex-start;align-content: flex-start;">

                                    <span style="color:#efefef;">Actividades</span>
                                </li>


                                <li style="display: flex;justify-content: flex-start;align-content: flex-start;">

                                    <span style="color:#fff;">Hoje</span>
                                </li>

                                <li class="change-look" style="display: flex;justify-content:flex-start;width: 300px;padding:8px;">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2" style="font-size:12pt;color: #fff;" >Delton Agostinho, gostou </span>
                                </li>


                                <li class="change-look"style="display: flex;justify-content: flex-start;width: 300px;
                                padding:8px;">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2" style="font-size:12pt;color: #fff;" >João Nunes comentou: Ola </span>
                                </li>

                                <li style="display: flex;justify-content: flex-start;align-content: flex-start;">

                                    <span style="color:#fff;">Ontem</span>
                                </li>

                                <li class="change-look" style="display: flex;justify-content: flex-start;width: 300px;padding:8px;">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2" style="font-size:12pt;color: #fff;" >Delton Agostinho, gostou </span>
                                </li>


                                <li class="change-look" style="display: flex;justify-content: flex-start;width: 300px;padding:8px;">

                                    <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
                                    <span class="mt-2" style="font-size:12pt;color: #fff;" >João Nunes comentou:Ola </span>
                                </li>
                                 <li class="change-look mb-5" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">


                                    <a href=""><span class="mt-2" style="font-size:12pt;color: #fff;" > Ver todos </span></a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="l-5 mobile-hidden">
                        <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                    </li>
                    <li class="user-tassumir clearfix l-5">
                        <a href="{{route('account.profile')}}"><img class="l-5 border-grad" src='{{asset("storage/img/users/$profile_picture")}}'></a>
                        <a href="{{route('account.profile')}}" class="l-5"><h1 class="user-account" >{{$account_name[0]->nome}}</h1></a>
                    </li>
                </ul>
            </nav>
    </header>
    <div class="header-main-component"></div>



    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix">
                <li class="li-component-aside li-component-aside-active"><i class="fas fa-rss fa-20 fa-icon-aside-left"></i><a href="{{route('account.home')}}">Feed de Notícias</a></li>
                <li class="li-component-aside"><i class="far fa-user-circle fa-20 fa-icon-aside-left"></i><a href="{{route('account.profile')}}">{{$account_name[0]->nome}} {{$account_name[0]->apelido}}</a></li>
                <!--<li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="">Criar Relacionamento</a></li>
                <li class="li-component-aside"><i class="fas fa-book-open fa-20 fa-icon-aside-left"></i><a href="">Página de Casal</a></li>-->
                @if($checkUserStatus)
                    <li class="li-component-aside"><i class= "fas fa-paperclip fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Página de Casal</a></li>
                @endif
                <li class="li-component-aside"><i class="far fa-bookmark fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Guardados</a></li>
                <li class="li-component-aside"><i class="fas fa-link fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Casais que eu sigo</a></li>
                <li class="li-component-aside"><i class="fas fa-dollar-sign fa-20 fa-icon-aside-left"></i><a href="{{route('couple.page')}}">Ganhar Dinheiro</a></li>
            </ul>
        </nav>
        <nav class="last-nav">
            <ul>
                <li class="li-component-aside"><i class="fas fa-cog fa-20 fa-icon-aside-left"></i><a href="{{route('page_definition.page')}}">Definições</a></li>
                <li class="li-component-aside"><i class="far fa-question-circle fa-20 fa-icon-aside-left"></i><a href="{{route('help_support.page')}}">Ajuda e Suporte</a></li>
                <li class="li-component-aside"><i class="fas fa-sign-out-alt fa-20 fa-icon-aside-left"></i><a href="{{route('account.logout')}}">Sair</a></li>
            </ul>
        </nav>
    </aside>
    <aside class="aside aside-right" style="z-index:1;">
        <nav>
            <header>
                <h1>Páginas que eu sigo</h1>
            </header>
            <ul class="">
                <?php
                $follow_page = [
                    [
                        "name" => "Famosos em Relacionamentos",
                        "seguir" => "seguir",
                        "cover" => "t30_13_1092985.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                    [
                        "name" => "Yola Araújo & Bass",
                        "seguir" => "não seguir",
                        "cover" => "79818663_.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                    [
                        "name" => "Conselheiro Amoroso",
                        "seguir" => "não seguir",
                        "cover" => "wedding_rings.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                ];
                foreach ($follow_page as $key_ => $value): ?>
                    <li class="li-component-aside-right clearfix">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src=<?php echo "../storage/img/page/".$follow_page[$key_]["cover"]; ?>>
                        </div>
                        <h1 class="l-5 name-page text-ellips">{{ $follow_page[$key_]["name"] }}</h1>
                        <h2 class="l-5 text-ellips">{{ $follow_page[$key_]["n_seguidores"] }} seguidores</h2>
                        <a href="">{{ $follow_page[$key_]["seguir"] }}</a>
                    </li>
                <?php endforeach ?>
            </ul>
            <footer class="clearfix">
                <a href="" class="r-5">Ver Todas</a>
            </footer>
        </nav>
        <nav class="last-nav">
            <header>
                <h1>Sugestões para Você</h1>
            </header>
            <ul class="">
                <?php
                $follow_page = [
                    [
                        "name" => "Famosos em Relacionamentos",
                        "seguir" => "seguir",
                        "cover" => "t30_13_1092985.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                    [
                        "name" => "Yola Araújo & Bass",
                        "seguir" => "não seguir",
                        "cover" => "79818663_.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                    [
                        "name" => "Conselheiro Amoroso",
                        "seguir" => "não seguir",
                        "cover" => "wedding_rings.jpg",
                        "n_seguidores" => "120 mil",
                    ],
                ];
                foreach ($follow_page as $key_ => $value): ?>
                    <li class="li-component-aside-right clearfix">
                        <div class="page-cover circle l-5">
                            <img class="img-full circle" src=<?php echo "../storage/img/page/".$follow_page[$key_]["cover"]; ?>>
                        </div>
                        <h1 class="l-5 name-page text-ellips">{{ $follow_page[$key_]["name"] }}</h1>
                        <h2 class="l-5 text-ellips">{{ $follow_page[$key_]["n_seguidores"] }} seguidores</h2>
                        <a href="">{{ $follow_page[$key_]["seguir"] }}</a>
                    </li>
                <?php endforeach ?>
            </ul>
            <footer class="clearfix">
                <a href="" class="r-5">Ver Todas</a>
            </footer>
        </nav>
    </aside>
    <main class="main-container">
        @yield('content');
    </main>
    </div>
</body>
<?php if (true): ?>
<form action="{{ route('post_couple.page') }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="checkbox" name="" id="add-post-target" class="invisible">
<div class="pop-up" id="add-post-container">
    <div class="pop-up-component full-component-mobile center" id="pop-up-component-create-post" style="">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Criar Publicação</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
       <!-- <form enctype="multipart/form-data">-->
            <div class="header-height"></div>
            <div class="clearfix content-details-post" style="margin-top: 15px; margin-bottom: 10px;">
                <div class="first-component clearfix l-5">
                    <div class="page-cover circle l-5">
                        <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                    </div>
                    <div class="page-identify l-5 clearfix">
                        <h1 class="text-ellips">Famosos em Relacionamentos</h1>
                    </div>
                </div>
                <div class="textarea-container l-5" style="width:100%;">
                    <textarea name="message" placeholder="O que deseja que as pessoas saibam?"></textarea>
                </div>
                <nav class="add-file l-5 clearfix" style="margin-bottom: 0;">
                    <ul style="width: 160px;" class="r-5">
                        <label for="target-profile-cover-post">
                            <li class="circle add-file-element">
                                <i class="far fa-images fa-20 center"></i>
                            </li>
                        </label>
                        <label for="target-profile-cover-post">
                            <li class="circle add-file-element">
                                <i class="far fa-play-circle fa-20 center"></i>
                            </li>
                        </label>
                    </ul>
                </nav>
            </div>
            <div class="clearfix l-5" id="" style="width: 98%; margin: 0px auto 10px;">
                <div class="" id="cover-done">
                    <button type="submit" style="outline: none; border: none; background: transparent; color: white; padding: 10px; font-size: 14px;">Concluido</button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>
<input type="checkbox" name="" id="target-profile-cover-post" class="invisible">
<div class="pop-up" id="cover-profile-post">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1 class="">Adicione Imagem</h1>
            <h1 class="invisible">Adicione Video</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover-post">
                    <div class="cancel-box div-img" id="cancel-box-add-file-post">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <input class="file" type="file" name="imgOrVideo" style="width: 250px; margin-left: 10px; color: #fff;">
            </div>
        </div>
        <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
            <label for="target-profile-cover-post" class="label-full">
                <div class="cover-done" id="cover-done-post">
                    <h2 id="concluir_file" style="padding: 10px; font-size: 14px;">Concluido</h2>
                </div>
            </label>
        </div>
    </div>
</div>

</form>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="target-profile-cover" class="invisible">
<div class="pop-up" id="cover-profile">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 190px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Adicione Foto de Perfil</h1>
            <div class="container-pop-up-component-header">
                <label for="target-profile-cover">
                    <div class="cancel-box div-img">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px;">
            <div class="">
                <form enctype="multipart/form-data">
                    <input class="file" type="file" name="" style="width: 250px; margin-left: 10px; color: #fff;">
                </form>
            </div>
        </div>
        <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
            <div class="cover-done" id="cover-done">
                <h2 style="padding: 10px; font-size: 14px;">Concluido</h2>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (true): ?>
<input type="checkbox" name="" id="target-invited-relationship" class="invisible">
<div class="pop-up" id="invited-relationship">
    <div class="pop-up-component full-component-mobile center" style="position: absolute; height: 320px;">
        <header class="pop-up-component-header pop-up-component-header-default header-height">
            <h1>Pedido de Relacionamento</h1>
            <div class="container-pop-up-component-header">
                <label for="target-invited-relationship">
                    <div class="cancel-box div-img" id="target-invited-relationship-id">
                        <i class="fas fa-times fa-16 center" style="color: #fff;"></i>
                    </div>
                </label>
            </div>
        </header>
        <div class="header-height"></div>
        <div style="margin-top: 15px; margin-bottom: 10px; overflow-y: auto;">
            <div class="">
                <form enctype="multipart/form-data" action="{{ route('Pedido_relac') }}" method="POST">
                  @csrf
                    <label for="relationship-type-target">
                        <div class="relationship-type">
                            <i class="fas fa-sliders-h"></i>
                            <h1 id="relationship-selected-type">Tipo de Relacionamento</h1>
                        </div>
                    </label>
                    <input type="checkbox" name="" id="relationship-type-target" class="invisible">
                    <div class="relationship-type-all" id="relationship-type-container">
                        <label for="relationship-type-target">
                            <h2 id="relationship-type-all-1" class="relationship-type-component">Namoro</h2>
                        </label>
                        <label for="relationship-type-target">
                            <h2 id="relationship-type-all-1" class="relationship-type-component">Noivado</h2>
                        </label>
                        <label for="relationship-type-target">
                            <h2 id="relationship-type-all-1" class="relationship-type-component">Casamento</h2>
                        </label>
                    </div>
                    <div class="justify-content-start marriage-proposal" style="margin-bottom: 10px;">
                        <span class="text-white">Caso seja aceite, qual nome da Página de casal, gostaria de usar? (Pode ser editado...).</span>
                    </div>
                    <div class="form-group marriage-proposal">
                        <input type="text" class="input-text-default input-full" name="name_page" type="text" placeholder="Nome da Página do Casal">
                    </div>
                    <input type="hidden" name="conta_pedida" value="{{$account_name[0]->uuid}}" id="relationship-type-selected">
                    <div class="clearfix l-5" id="" style="width: 98%; margin-top: 10px;">
                        <div class="cover-done" id="cover-done-marriage">
                          <button type="submit" name="button" style="padding: 10px; font-size: 14px;" >
                            Concluido
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (true): ?>

<?php endif ?>
<script type="text/javascript">
    $(document).ready(function () {
      $('.like-a').click(function (e) {
          e.preventDefault();
          let id = e.target.id.split('-');
          if(id[0] == "on"){
            gostar(id[1]);
            let new_id = "off-" + id[1] + "-i";
            document.getElementById("on-" + id[1] + "-i").setAttribute('id', new_id);
          } else if(id[0] == "off") {
              gostar(id[1]);
              let new_id = "on-" + id[1] + "-i";
              document.getElementById("off-" + id[1] + "-i").setAttribute('id', new_id);
          }
      });

      $('.seguir-a').click(function (e) {
          e.preventDefault();
          let id = e.target.id;
            seguir(id);

      });

      $('.comentar-a').click(function (e) {
          e.preventDefault();
          let id = e.target.id;
            comentar(id);

      });

      $('.relationship-type-component').click(function(e){
            $('#relationship-selected-type').text($('#' + e.target.id).text());
            $('#relationship-type-selected').val(e.target.id.split('-')[3]);
      });
      $('#genre-id').val($("input[name='genre']:checked").val());
      $('.genre-class').click(function(){
          $('#genre-id').val($("input[name='genre']:checked").val());
      });
        $('.cancel-box').click(function(){
            $('.pop-up').css({
                opacity: 0,
                zIndex: -1
            });
        });
        $('.add-edit-profile').click(function(){
            $('#cover-profile').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('.add-post').click(function(){
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('.add-file-element').click(function(){
            $('#cover-profile-post').css({
                opacity: 1,
                zIndex: 1001
            });
        });
        $('#cancel-box-add-file-post').click(function(){
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('#cover-done-post').click(function(){
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
            $('#add-post-container').css({
                opacity: 1,
                zIndex: 1000
            });
        });
        $('#target-invited-relationship-id').click(function(){
            $('#invited-relationship').css({});
        });

        $('#concluir_file').click(function() {
            $('#cover-profile-post').css({
                opacity: 0,
                zIndex: -1
            });
        });
        $('.follwing-btn-pop-up').click(function(){
            $('#invited-relationship').css({
                opacity: 1,
                zIndex: 1000
            });
        });
    });

</script>
</html>

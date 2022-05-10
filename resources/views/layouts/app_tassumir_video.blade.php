<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Tassumir') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <script src="{{ asset('js/components.js') }}" defer></script>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="{{ asset('js/jquery/jquery-3.5.1/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uicons/css/uicons-regular-rounded.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uicons-straight/css/uicons-regular-straight.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checked.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width-width, initial-scale=1,0">
    <meta http-equiv="UA-X-Compatible" content="ie=edge">
</head>

<body class="container-main" id="container-main-tv">
    <div class="body-pop-up content-full-scroll">
    <input type="hidden" id="loaded-component" value="none">
    <header class="header-main header-main-component clearfix" id="header-main-component-1-tv">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home.feed')}}"><!--<i class="fas fa-link fa-24"></i>--><h1>tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden" style="margin-left:48px;">
                    <div class="input-search">
                        <label for="search-lg-home"><i class="fas fa-search fa-16 fa-search-main"></i></label>
                        <input type="search" name="" placeholder="O que está procurando?" class="input-text" id="search-lg-home-id">
                    </div>
                    <input type="checkbox" name="" class="invisible" id="search-lg-home">
                    <div class="container-search-home">
                        <div class="input-search">
                            <i class="fas fa-search fa-16 fa-search-main"></i>
                            <input type="search" name="table_search" placeholder="O que está procurando?" class="input-text" id="table_search">
                        </div>
                        <div class="search-id-container">
                          <div name="pessoa">
                            </div>
                            <div name="page">
                            </div>
                        </div>
                        <div class="change-look mb-5" name="ver_td" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">
                        </div>
                    </div>
                </li>
            </ul>
            <nav class="menu-header ">
                <li class="l-5 mobile-header-icon" style="z-index:2;" id="notification-header-icon-container">
                    <div class="hidden-click-any-container last-component-n clearfix-n " id="notification-header-icon">
                        <label for="more-option-notify" class="hidden-click-any-container fa-option-mobile-hide">
                            <img src="" class="center img-28">
                        </label>
                        <a href="" class="hidden-click-any-container fa-option-mobile-lg-hide notify-icon">
                            <img src="" class="center img-26">
                            <div class="number-notification invisible-component circle">
                                <span class="center"></span>
                            </div>
                        </a>
                        <input type="checkbox" name="" id="more-option-notify" class="hidden">
                        <ul class="noti-card-first clearfix br-10">
                            <li class="hidden-click-any-container mb-4" style="display: flex;justify-content: flex-start;align-content: flex-start;">
                                <span style="color:#efefef;">Actividades</span>
                            </li>                                          
                            <li class="hidden-click-any-container noti-flex mt-2">
                                <div class="hidden-click-any-container noti-div-subtitle">
                                    <h4 class="noti-subtitle">Antigas</h4>
                                </div>
                            </li>
                            <li class="hidden-click-any-container change-look noti-flex-info" id="not-3" name="not-3">
                                <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                                    <img class="hidden-click-any-container circle img-24 center invisible-component">
                                </div>                                       
                                <div class="hidden-click-any-container noti-div-name">
                                    <a href="" id="Notificacao|3" class="mudar_estado_not">
                                        <span class="hidden-click-any-container noti-span"></span>
                                   </a>
                                   <div class="hidden-click-any-container noti-hour ml-2">
                                        <a href=""><span class=""></span></a>
                                    </div>
                                </div>
                                <div class="not-new">
                                </div>
                            </li>
                            <li class="hidden-click-any-container change-look" style="display: flex;justify-content:center; align-items: center; width: 300px; padding:8px;">
                                <a href=""><span class="mt-2" style="font-size:13px;color: #fff;"> Ver todos </span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <input type="hidden" id="ident-key" name="">
                <li class="poupar-data l-5 alert-assumir-make-money-now invisible-component" id="poupar-data-id"></li>
                <li class="user-tassumir clearfix l-5">
                    <a href="{{route('account.profile')}}">
                        <div class="l-5 user-account-container-img" id="user-account-container-img-container">
                            <img class="img-full center invisible-component" id="user-account-container-img-id">
                        </div>
                    </a>
                    <a href="" class="l-5"><h1 class="user-account"></h1></a>
                </li>
            </nav>
    </header>
    <aside class="aside aside-left">
        <nav>
            <ul class="clearfix">
                <li class="li-component-aside" id="ma"><i class="fas fa-eye fa-20 fa-icon-aside-left"></i><a href="{{route('post.tassumir.video','ma')}}">Mais Assistidos</a></li>
              <!--  <li class="li-component-aside"><i class="far fa-heart fa-20 fa-icon-aside-left"></i><a href="{{route('account.profile')}}?post-container-post=saved">Mais Curtidos</a></li> -->
                <li class="li-component-aside" id="mc"><i class="far fa-heart fa-20 fa-icon-aside-left"></i><a href="{{route('post.tassumir.video','mc')}}">Mais Curtidos</a></li>
                <li class="li-component-aside" id="mr"><i class="fas fa-rss fa-20 fa-icon-aside-left"></i><a href="{{route('post.tassumir.video','mr')}}">Mais Recentes</a></li>
                <li class="li-component-aside" id="mco"><i class="far fa-comment fa-20 fa-icon-aside-left"></i><a href="{{route('post.tassumir.video','mco')}}">Mais Comentados</a></li>
                <li class="li-component-aside" id="mg"><i class="far fa-bookmark fa-20 fa-icon-aside-left"></i><a href="{{route('post.tassumir.video','mg')}}">Videos Guardados</a></li>
            </ul>
        </nav>
    </aside>
    <div class="header-main-component" id="header-main-component-2-tv"></div>
    <main class="main-container" id="main-container-video">
        @yield('content')
    </main>
    </div>
</body>

<script type="text/javascript">
$(document).ready(function () {
  var select_li =window.location.href.split('/');
  document.getElementById(select_li[select_li.length - 1]).classList.add('li-component-aside-active');


  $('.like-a').click(function (e) {
      e.preventDefault();
      let id = e.target.id.split('|');
      if(id[0] == "on"){
        gostar(id[1]);
        let new_id = "off|" + id[1] + "|i";
        document.getElementById("on|" + id[1] + "|i").setAttribute('id', new_id);
        document.getElementById("off|" + id[1] + "|i").classList.remove('fas');
        document.getElementById("off|" + id[1] + "|i").classList.remove('liked');
        document.getElementById("off|" + id[1] + "|i").classList.add('far');
      } else if(id[0] == "off") {
        gostar(id[1]);
        let new_id = "on|" + id[1] + "|i";
        document.getElementById("off|" + id[1] + "|i").setAttribute('id', new_id);
        document.getElementById("on|" + id[1] + "|i").classList.add('fas');
        document.getElementById("on|" + id[1] + "|i").classList.add('liked');
        document.getElementById("on|" + id[1] + "|i").classList.remove('far');
      }
  });

  $('.comment-like-a').click(function (e) {
      e.preventDefault();
      let id = e.target.id.split('|');
      if(id[0] == "on"){
        comment_reac(id[1]);
        let new_id = "off|" + id[1] + "|i";
        document.getElementById("on|" + id[1] + "|i").setAttribute('id', new_id);
        document.getElementById("off|" + id[1] + "|i").classList.remove('fas');
        document.getElementById("off|" + id[1] + "|i").classList.remove('liked');
        document.getElementById("off|" + id[1] + "|i").classList.add('far');
      } else if(id[0] == "off") {
        comment_reac(id[1]);
        let new_id = "on|" + id[1] + "|i";
        document.getElementById("off|" + id[1] + "|i").setAttribute('id', new_id);
        document.getElementById("on|" + id[1] + "|i").classList.add('fas');
        document.getElementById("on|" + id[1] + "|i").classList.add('liked');
        document.getElementById("on|" + id[1] + "|i").classList.remove('far');
      }
  });
  $('.savepost').click(function (e) {
      e.preventDefault();
      let id = e.target.id.split('-');
      guardar(id[1]);

  });
  $('.comentar-a').click(function (e) {
      e.preventDefault();
      let id = e.target.id;
      let coment = $('#comentario-' + id).val();
      //alert(coment);
      if(coment != ''){
        $("#comment-own-" + id).text(coment);
      $("#comment-users-own-" + id).css({
        display: "flex",
      });
      $("#comment-users-" + id).hide();
      $("#comentario-" + id).val('');
      comentar(id, coment);
    }
      $('#search-lg-home-id').on('keyup',function(){
          let variavel= $('#search-lg-home-id').val();
          $('#table_search').val(variavel);
          let v= 1;
          if (variavel!='') {
            searchP(variavel, v);
          }else {
            $('div[name=pessoa]').empty();
            $('div[name=page]').empty();
            $('div[name=ver_td]').empty();

          }
        });

      function searchP(variavel, v){
      var s1=0;
      var s2=1;
      var s3;
      $.ajax({
      url: "{{ route('pessoa.pesquisa')}}",
      type: 'get',
      data: {'dados': variavel, 'v':v},
      dataType: 'json',
      success:function(response){
      var nome = '';
      var contador = 1;
      //console.log(response.valor);
      s1 =response.valor.length;
      $.each(response.valor, function(key, value){
      let src = '{{asset("storage/img/users/")}}';
      if (value.estado_conta_id == 1) {
        if (contador == 1) {
          nome += '<li class="search-title">'
          nome += '<span style="color:#fff;" class="mt-2">Pessoas</span>'
          nome += '<ul class="card-flex">'
          nome += '</li>'

        }
        nome += '<li class="change-look search-info">'
        if (value.foto != null) {
          nome += '<div class="page-cover circle "><img class=" circle img-40" src= ' + src + '/' + value.foto + '></div>'
        }else {
          nome += '<div class=" page-cover circle "><i class="fas fa-user center" style="font-size: 15px; color: #ccc;"></i></div>'
        }
        nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
        var route1 = "{{route('account1.profile', 1) }}"
        url_array1 = route1.split('/');
        url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.uuid;
        nome += '<a href='+url_link1+' <span class="profile-name-1">'+value.nome+' '+value.apelido+'</span>'
        nome += '<a href='+url_link1+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
        nome += '</div></div></li><div class="couple-separator"></div>'
        if (contador == response.valor.length) {
          nome += '</ul>'
        }

          $('div[name=pessoa]').empty();
          $('div[name=pessoa]').append(nome);
          contador++;
        }
      })
      let route_temp = "{{route('allSearch.page', 0)}}";
      let route_temp1 = route_temp.split('/');
      let route = route_temp1[0] + "/" + route_temp1[1] + "/" + route_temp1[2] + "/"+ route_temp1[3] + "/"+ variavel;
      var vertd = '<a href='+route+'><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>';
      $('div[name=ver_td]').empty();
      $('div[name=ver_td]').append(vertd);
      }
      });


      $.ajax({
      url: "{{ route('pagina.pesquisa')}}",
      type: 'get',
      data: {'dados': variavel , 'v':v},
      dataType: 'json',
      success:function(response){
      let src1 = '{{ asset("storage/img/page/") }}';
      var nome = '';
      var contador = 1;
      //console.log(response.valor);
      s2 =response.valor.length;
      $.each(response.valor, function(key, value){
      if (value.estado_pagina_id==1) {

        if (contador == 1) {
          nome += '<li class="change-look search-info">'
          nome += '<span style="color:#fff;" class="mt-2">Páginas</span>'
          nome += '<ul class="card-flex">'
          nome += '</li>'
        }
        nome += '<li class="change-look search-info">'
        if (value.foto != null) {
          nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src=' + src1 + '/' + value.foto + '></div>'
        }else {
          nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>'
        }
        nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
        var route10 = "{{route('couple.page1', 1) }}"
        url_array10 = route10.split('/');
        url_link10 = url_array10[0] + "/" + url_array10[1] + "/" + url_array10[2] + "/"+ url_array10[3] +  "/" + value.uuid;
        nome +='<a href='+url_link10+'>'
        nome += '<span class="profile-name-1">'+value.nome+'</span>'
        nome +='</a>'
        nome += '<a href='+url_link10+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
        nome += '</div></div></li><div class="couple-separator"></div>'
        if (contador == response.valor.length) {
          nome += '</ul>'
        }
         $('div[name=page]').empty();
          $('div[name=page]').append(nome);
          contador++;
        }
      })
      let route_temp = "{{route('allSearch.page', 0)}}";
      let route_temp1 = route_temp.split('/');
      let route = route_temp1[0] + "/" + route_temp1[1] + "/" + route_temp1[2] + "/"+ route_temp1[3] + "/"+ variavel;
      var vertd = '<a href='+route+'><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>';
      $('div[name=ver_td]').empty();
      $('div[name=ver_td]').append(vertd);
      }
      });

      s3=s1+s2;
      if (s3 == 0) {
      nome = '<div style="color: white;" class="ml-2 mt-2">Sem resultados</div>';
      $('div[name=page]').empty();
      $('div[name=page]').append(nome);
      }
      }

      $('#search-lg-home-id').focus(function(){
          $('.container-search-home').css({
              display: 'block',
          });
          $('#search-lg-home-id-container').focus();
      });
});
});
</script>
</html>

<input type="checkbox" name="" id="target-single-page-component" class="invisible">
<div class="pop-up" id="single-page-container">
    <ul class="clearfix header-component-single-page">
        <label class="target-single-page-component" for="target-single-page-component">
            <li class="l-5 clearfix">
                <img class="img-20 icon-back-container icon-back-container-label" src="{{asset('css/uicons/back_component.png')}}">
            </li>            
        </label>
        <li class="title l-5 title-container">
            <div id="title-header-component" class="title-header-component-details">
                Comentários     
            </div>
            <div class="statistics-component-page-profile">
                        
            </div>
        </li>
    </ul>
    <div id="single-page-container-body-container">
        <div class="component-single-page" id="single-page-container-body">
        </div>
    </div>
</div>
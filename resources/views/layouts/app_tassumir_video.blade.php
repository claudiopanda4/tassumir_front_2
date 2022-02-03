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

<body class="container-main" id="container-main-tv">
    <div class="body-pop-up content-full-scroll">
        <header class="header-main header-main-component clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><i class="fas fa-link fa-24"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden">
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
                <?php $controller = 0; ?>
                <ul class="clearfix ">
                    <li class="l-5 mobile-header-icon">
                        <a href="{{route('allSearch1.page')}}"><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon" style="z-index:2;">
                        <div class="hidden-click-any-container last-component-n clearfix-n " >
                            <label for="more-option-notify" class="hidden-click-any-container fa-option-mobile-hide"><i class="hidden-click-any-container far fa-bell fa-24 fa-option notify-icon" size="7"></i>
                                @if($notificacoes_count > 0)
                                <div class="number-notification circle">
                                    <span class="center">{{$notificacoes_count}}</span>
                                </div>
                                @endif
                            </label>
                            <a href="{{route('account.all.notifications')}}" class="hidden-click-any-container fa-option-mobile-lg-hide notify-icon">
                                <i class="hidden-click-any-container far fa-bell fa-24 fa-option" size="7"></i>
                                @if($notificacoes_count > 0)
                                <div class="number-notification circle">
                                    <span class="center">{{$notificacoes_count}}</span>
                                </div>
                                @endif
                            </a>
                            <input type="checkbox" name="" id="more-option-notify" class="hidden">
                            <ul class="noti-card-first clearfix br-10">
                                <li class="hidden-click-any-container mb-4" style="display: flex;justify-content: flex-start;align-content: flex-start;">
                                    <span style="color:#efefef;">Actividades</span>
                                </li>


                                <li class="hidden-click-any-container noti-flex mt-2">

                                    <div class="hidden-click-any-container noti-div-subtitle">
                                        <h4 class="noti-subtitle">Hoje</h4>
                                    </div>
                                </li>
                            <!--<li class="hidden-click-any-container send-invited-relationship clearfix">
                                <div class="hidden-click-any-container user-identify-img circle l-5">
                                    <img src="{{asset('storage/img/users/anselmoralph.jpg')}}" class="img-full circle">
                                </div>
                                <div class="hidden-click-any-container details-invited l-5">
                                    <span class="hidden-click-any-container description-invited">
                                        <a href="">Hugo Paulo</a> enviou um Pedido de Relacionamento para VOCÊ
                                    </span>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <label class="hidden-click-any-container l-5" for="options-invited-pop-up">
                                            <div class="hidden-click-any-container label-invited">
                                                <h2 class="accept">Aceitar</h2>
                                                <h2>Aceitar</h2>
                                            </div>
                                        </label>
                                        <a href="" class="hidden-click-any-container l-5 denied">Rejeitar</a>
                                    </div>
                                </div>
                            </li>
                            <li class="hidden-click-any-container send-invited-relationship clearfix">
                                <div class="hidden-click-any-container user-identify-img circle l-5">
                                    <img src="{{asset('storage/img/users/anselmoralph.jpg')}}" class="img-full circle">
                                </div>
                                <div class="hidden-click-any-container details-invited l-5">
                                    <span class="hidden-click-any-container description-invited">
                                        <a href="">Hugo Paulo</a> Respondeu a sua Solicitação de Registo de compromisso
                                    </span>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a>
                                    </div>
                                </div>
                            </li>-->

                            @for($i=sizeof($notificacoes); $i > 0 ; $i--)
                                <li class="hidden-click-any-container change-look noti-flex-info" id="not-{{$notificacoes[$i- 1]['id1']}}" name="not-{{$notificacoes[$i- 1]['id1']}}">
                                  <?php if ($notificacoes[$i- 1]['v']== 1): ?>
                                    <?php if ($notificacoes[$i- 1]['foto']!= null): ?>

                                    <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                                         <img class="circle img-40" src="{{ asset('storage/img/users') . '/' . $notificacoes[$i- 1]['foto'] }}">
                                    </div>
                                    <?php else: ?>
                                      <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                                           <img class="hidden-click-any-container circle img-24 center" src='{{asset("storage/icons/user_.png")}}'>
                                      </div>
                                      <?php endif ?>
                                    <?php elseif ($notificacoes[$i- 1]['v']== 2): ?>
                                      <?php if ($notificacoes[$i- 1]['foto']!= null): ?>

                                      <div class="hidden-click-any-container ml-2 novi-div-image circle l-5">
                                           <img class="hidden-click-any-container circle img-24 center" src='{{asset("storage/icons/user_.png")}}'>
                                      </div>
                                      <?php else: ?>
                                        <div class="hidden-click-any-container ml-2 novi-div-image circlel-5 ">
                                             <img class="circle img-24 center" src='{{asset("storage/icons/user_.png")}}'>
                                        </div>
                                        <?php endif ?>

                                    <?php endif ?>

                                    <div class="hidden-click-any-container noti-div-name">
                                      @if($notificacoes[$i- 1]['tipo'] == 1)
                                      <a href="{{route('post_index', $notificacoes[$i- 1]['link'])}}" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}" class="mudar_estado_not" >
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 2)
                                      <a href="{{route('post_index', $notificacoes[$i- 1]['link'])}}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 3)
                                      <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 4 || $notificacoes[$i- 1]['tipo'] == 7)
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 5)
                                      <a href="{{route('couple.page1', $notificacoes[$i- 1]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 6)
                                      <a href="{{route('post_index', $notificacoes[$i- 1]['link'])}}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 8)
                                      <a href="{{route('couple.page1', $notificacoes[$i- 1]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 9)
                                      <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 10)
                                      <a href="{{route('relationship.page1', $notificacoes[$i- 1]['id']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 11)
                                      <a href="{{route('account.delete.page', $notificacoes[$i- 1]['id1']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 12)
                                      <a href="{{route('account.delete.page', $notificacoes[$i- 1]['id1']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @elseif($notificacoes[$i- 1]['tipo'] == 13)
                                      <a href="{{route('couple.page1', $notificacoes[$i- 1]['link']) }}" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @else
                                      <a href="" class="mudar_estado_not" id="Notificacao|{{$notificacoes[$i- 1]['id1']}}">
                                       <span class="hidden-click-any-container noti-span">{{$notificacoes[$i- 1]['notificacao']}}</span>
                                      </a>
                                      @endif
                                    <div class="hidden-click-any-container noti-hour ml-2">
                                        <a href=""><span class="">há um dia</span></a>
                                    </div>
                                    @if($notificacoes[$i- 1]['tipo'] == 4)
                                    <?php $controller++; ?>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <label class="hidden-click-any-container l-5" for="options-invited-pop-up">
                                            <div class="hidden-click-any-container label-invited" id="">
                                                <h2 class="accept_relationship" id="{{$notificacoes[$i- 1]['id']}}|{{$notificacoes[$i- 1]['id1']}}">Aceitar</h2>
                                            </div>
                                        </label>
                                        <div class="reject_relationship" id="R|{{$notificacoes[$i- 1]['id']}}|{{$notificacoes[$i- 1]['id1']}}">
                                        <a href="" class="hidden-click-any-container l-5 denied " id="R|{{$notificacoes[$i- 1]['id']}}|{{$notificacoes[$i- 1]['id1']}}">Rejeitar</a>
                                    </div>
                                  </div>
                                    @elseif($notificacoes[$i- 1]['tipo'] == 7)
                                    <?php $controller++; ?>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <!--<a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a>-->
                                        <a  href="{{route('relationship.page1', $notificacoes[$i- 1]['id']) }}" class="ver_mais" id="VR|{{$notificacoes[$i- 1]['id1']}}">Ver Resposta</a>
                                    </div>
                                    @endif
                                   </div>

                                </li>
                              @endfor

                                 <li class="hidden-click-any-container change-look" style="display: flex;justify-content:center; align-items: center; width: 300px; padding:8px;">
                                    <a href="{{route('account.all.notifications')}}"><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--<li class="l-5 mobile-hidden">
                        <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                    </li>-->s
                    <li class="user-tassumir clearfix l-5">
                        @if ($profile_picture == null || $profile_picture == "null" || $profile_picture == NULL || $profile_picture == "NULL" || $profile_picture == "" || $profile_picture == " ")
                            <a href="{{route('account.profile')}}"><i class="far fa-user-circle fa-24 l-5" id="imgless"></i></a>
                        @else
                            <a href="{{route('account.profile')}}"><img class="l-5" src="{{asset('storage/img/users') . '/' . $profile_picture}}"></a>
                        @endif
                        <a href="{{route('account.profile')}}" class="l-5"><h1 class="user-account" >{{$conta_logada[0]->nome}}</h1></a>
                    </li>
                </ul>
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
    <div class="header-main-component"></div>
    <main class="main-container">
        @yield('content');
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

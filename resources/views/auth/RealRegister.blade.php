<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Tassumir') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/parsley.min.js')}}"></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/media.css') }}" rel="stylesheet">
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
  <meta name="viewport" content="width=device-width-width, initial-scale=1,0">
  <meta http-equiv="UA-X-Compatible" content="ie=edge">
  <style>
    .form-section {
      padding-top: 10px;
      display: none;
    }

    .form-section.current {
      display: inherit;
    }

    .parsley-errors-list {
      margin: 2px 0 3px;
      padding: 0;
      list-style-type: none;
      color: red;
    }
    #nationality {
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      background: #242526;
      border: none;
      margin: 10px auto;
      color: #efefef;
    }
  </style>
</head>

<body id="body-reg">
  <div id="app-log-reg">
   
    <main class="main" id="main-register-container" style="">
      <div class="" id="main-reg">
        <header class="logo-form" id="title-login">
          <div class="title">
            <a href=""><i class="fas fa-link fa-32"></i>
              <h1>Tass<span class="title-final" style="color: #fd09fd;">umir</span></h1>
            </a>
          </div>
          <div class="row justify-content-center">
            <h3 class="text-white">Olá</h3>
          </div>
        </header>
        @include('flash')
        <div class="row justify-content-center" style="text-align: center; margin-bottom: 5px;">
          <span class="text-white">Seja Bem Vindo(a) a maior plataforma de relacionamento.</span>
        </div>

        <div class="row justify-content-center mb-2">
          <span class="text-white">Agora vamos conhecer-te</span>
        </div>
        <form action="{{route('account.save')}}" method="POST" class="tassumir-form needs-validation" novalidate id="my-form">
          @csrf

          <div class="form-section">
            <input type="text" class="input-text-default input-full input-login" name="nome" placeholder="Nome" id="nome-id" required />
            <span class="hidden" style="color:red;" id="erroNome"> Insira o teu  Nome</span>
            <input type="text" name="apelido" class="input-text-default input-full input-login" placeholder="Apelido" id="apelido-id" required />

            <div id=verify-dados>
              
            </div>
            <span class="hidden" style="color:red;" id="erroApelido"> Insira o teu Apelido</span>

            <input type="text" name="dat" class="input-text-default input-full input-login" id="dataNas" placeholder="Data de Nascimento" onfocus="(this.type='date')">

            <span class="hidden" style="color:red;" id="erroData"> Insira a Data de Nascimento</span>

            <div class="row" style="" id="genre-id-container">

              <div class="col-md-8" id="genre-id-component">

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Masculino" checked>
                  <label class="form-check-label text-white" for="exampleRadios1">
                    Masculino
                  </label>

                </div>

              </div>

              <div class="col-md-4" id="genre-id-component">

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Feminino">
                  <label class="form-check-label text-white" for="exampleRadios2">
                    Feminino
                  </label>
                </div>
              </div>


            </div>
          </div>


          <div class="form-section">

            <select name="nacionalidade" id="nationality" required>
              <option value="" class="option-nationality" disabled selected>País de Origem</option>
              @forelse($dadosPais as $pais)
              <option value="{{$pais->pais_id}}" class="option-nationality">{{$pais->nome}}</option>
              @empty
              <option>...</option>
              @endforelse
              
             
               
            </select>

            <div class="invalid-feedback">
              Insira a tua Nacionalidade
            </div>


            <div class="row mt-2">
              <div class="col-md-6">
                <select id="inputState" class="input-text-default input-full input-login" required>
                  <option selected value="">Opções de Contacto</option>
                  <option value="emailSele">Email</option>
                  <option value="telefSele">Telefone</option>
                </select>

                <div class="invalid-feedback">
                  Seleccione uma Opção
                </div>
              </div>

              <div class="col-md-6">

                <input type="email" class="input-text-default input-full input-login hidden input-emai-log" placeholder="Email" id="email" name="email">
               
                <span id="emailMsg"></span>
                <input type="text" class="input-text-default input-full input-login hidden input-emai-log" name="telefone" placeholder="Telefone" id="telefone" data-mask="000-000-000">

              </div>

            </div>

            <div id="password_login_id2">
              <input type="password" class="input-text-default input-full input-login" name="password" placeholder="Password" value="" id="password" required>

              <i class="fa fa-eye" id="eye"></i>
              <div class="invalid-feedback">
                Insira uma Palavra Passe
              </div>
            </div>
          </div>

          <div class="hugo-btn">
            <button type="button" id="login-enter" class="next">Seguinte</button>
            <button type="button" id="login-enter" class="recuar">Voltar</button>
            <button type="submit" id="login-enter">Criar Conta</button>
          </div>

          <div class="clearfix">

            <div id="forget-password" class="l-5">
              <a href="{{route('account.login.form')}}" class="hp-style">
                <h1>Já tenho uma conta</h1>
              </a>

            </div>


          </div>

        </form>
      </div>
    </main>
  </div>
</body>

</html>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script>

  var myForm = $("#my-form");
  myForm.submit(function(){
    myForm.submit(function(){
        return false;
    });
  });

  const pass = $("#password");
  $('#nome-id').on('keyup', function(e){
    let control = 0;
    let nome = $('#nome-id').val();
    let campos = nome.split(' ');
    if (campos.length >= 2) {
      nome = nome.replace(' ', '');
      control++;
      $('#nome-id').val(nome);
    }else{
      $('#v-f-d').remove();
    }
    if (control > 0 && $('#nome-id').focus()) {
      $("#verify-dados").html("<p class='text-danger' id='v-f-d'>Não se permite espaços</p>");
    }
  });
  $('#apelido-id').on('keyup', function(e){
    let control = 0;
    let apelido = $('#apelido-id').val();
    let campos = apelido.split(' ');
    if (campos.length >= 2) {
      apelido = apelido.replace(' ', '');
      control++;
      $('#apelido-id').val(apelido);
    }else{
      $('#v-f-d').remove();
    }
    if (control > 0 && $('#apelido-id').focus()) {
       $("#verify-dados").html("<p class='text-danger' id='v-f-d'>Não se permite espaços</p>");
    }
  });
  $("#eye").on('click', function() {

    if (pass.prop('type') == 'password') {

      $(this).addClass('fa fa-slash');
      pass.attr('type', 'text');
    } else {

      $(this).removeClass('fa fa-slash');
      pass.attr('type', 'password');
      $(this).addClass('fa fa-eye');
    }
  });
  $("#nacionalidade").bind('keydown', function(e) {

    var codTecla = e.which;
    var teclas = (codTecla > 64 && codTecla <= 90);
    var teclasAlter = (",8,32,46,37,38,39,40".indexOf("," + codTecla + ",") > -1);
    if (teclas || teclasAlter) {
      return true;
    } else {
      return false;
    }
  });
  $("#nome-id").bind('keydown', function(e) {

    var codTecla = e.which;
    var teclas = (codTecla > 64 && codTecla <= 90);
    var teclasAlter = (",8,32,46,37,38,39,40".indexOf("," + codTecla + ",") > -1);
    if (teclas || teclasAlter) {
      return true;
    } else {
      return false;
    }
  });
  $("#apelido-id").bind('keydown', function(e) {

    var codTecla = e.which;
    var teclas = (codTecla > 64 && codTecla <= 90);
    var teclasAlter = (",8,32,46,37,38,39,40".indexOf("," + codTecla + ",") > -1);
    if (teclas || teclasAlter) {
      return true;
    } else {
      return false;
    }
  });

  $("#email").keyup(function(){
    if(validateEmail()){
     // $("#email").css("border","2px solid green");

      $("#emailMsg").html("<p class='text-success'>Email Válido</p>");

    }else{
          //$("#email").css("border","2px solid red");
           $("#emailMsg").html("<p class='text-danger'>Email Inválido</p>");
    }

  });

  function validateEmail(){

    var email = $("#email").val();

    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if(reg.test(email)){
      return true;
    }else{
      return false;
    }
  }


  $(function() {

    var $sections = $('.form-section');


    function navigateTo(index) {

      $sections.removeClass('current').eq(index).addClass('current');

      $('.hugo-btn .recuar').toggle(index > 0);

      var atTheEnd = index >= $sections.length - 1;
      $('.hugo-btn .next').toggle(!atTheEnd);

      $('.hugo-btn [type=submit]').toggle(atTheEnd);

    }

    function curIndex() {

      return $sections.index($sections.filter('.current'));
    }

    $('.hugo-btn .recuar').click(function() {
      navigateTo(curIndex() - 1);
    });

    $('.hugo-btn .next').click(function() {

      let nome = $('#nome-id').val();
      let apelido = $('#apelido-id').val();
      let data_nas = $('#dataNas').val();

      if (nome && apelido && data_nas) {
        navigateTo(curIndex() + 1);
        $('#erroNome').fadeOut();
        $('#erroApelido').fadeOut();
        $('#erroData').fadeOut();
      } else {
        $('#erroNome').show();
        $('#erroApelido').show();
        $('#erroData').show();
      }

      /*$('.tassumir-form').parsley().whenValidated({
           group:'block-' + curIndex()
      }).done(function(){
           navigateTo(curIndex()+1);
      });*/
    });

    $sections.each(function(index, section) {
      $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });
    navigateTo(0);

    $("#inputState").change(function() {

      let type_info = $("#inputState option:selected").val();

      if (type_info == "emailSele") {

        $("#email").fadeIn();
        $("#telefone").hide();

      } else if (type_info == "telefSele") {

        $("#telefone").fadeIn();

        $("#email").hide();
        $("#emailMsg").hide();

      } else {

        $("#email").hide();
        $("#telefone").hide();
      }

    });

    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');

        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            } else {
              //teste();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();

  });

  /*
    $(document).ready(function(){
    var buscar_pais = 'Buscar';

    $.ajax({
        url: "{{route('buscar.pais')}}",
        type: 'get',
        data: {'bucar': buscar_pais},
        dataType: 'json',
          success: function(response){
            $.each(response.pais, function(key, value){
                  $('#nationality').append('<option value="'+value.pais_id+'" class="option-nationality" >'+value.nome+'</option>')
                })
                }
              });
    })*/
  
</script>
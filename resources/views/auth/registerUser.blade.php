<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

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
</head>
<body>
    <div id="app">
        <main class="main" id="main-login-container" style="background-color: var(--background-dark-main);">
            <div class="center" id="main-login">
                <header class="logo-form" id="title-login">
                    <div>
                        <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                    </div>

                    <div class="row justify-content-center">
                    	<h3 class="text-white">Olá</h3>
                    </div>

                </header>

                    <div class="row justify-content-center" style="text-align: center; margin-bottom: 5px;">
                        <span class="text-white">Seja Bem Vindo(a) a maior plataforma de relacionamento.</span>
                    </div>

                    <div class="row justify-content-center mb-2">
                        <span class="text-white">Agora vamos conhecer-te</span>
                    </div>

                <form action="{{route('account.teste.form')}}" method="POST" class="needs-validation" novalidate>
                    @csrf

                     <div class="form-group">
                        <input type="text" class="input-text-default input-full" name="nome" placeholder="Nome" id="nome" required>
                        <div class="invalid-feedback">
                            Insira o Nome
                      </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="apelido" class="input-text-default input-full" placeholder="Apelido" id="apelido" required>
                        <div class="invalid-feedback">
                            Insira o Apelido
                      </div>
                    </div>
                    <div class="row">

                    	<div class="col-md-8">
                    		
                    	<div class="form-check">
							  <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Masculino" checked>
							  <label class="form-check-label text-white" for="exampleRadios1">
							    Masculino
							  </label>
						</div>

                    	</div>

                    	<div class="col-md-4">
	                    		
	                    	<div class="form-check">
								  <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Feminino">
								  <label class="form-check-label text-white" for="exampleRadios2">
								    Feminino
								  </label>
							</div>
                    	</div>

                    </div>
                    <div class="form-group mt-2">

                        <input type="date" name="dat" class="input-text-default input-full" id="" placeholder="12/09/2002" required>
                        <div class="invalid-feedback">
                            Insira a Data
                      </div>

                    </div>
                    <button type="submit" id="login-enter">Seguinte</button>
                    <!--<a href="{{route('account.teste.form')}}" id="login-enter" type="button" class=""><span class="text-white">Seguinte</span></a>-->

                    <div class="clearfix">

                        <div id="forget-password" class="l-5">
                            <a href="{{route('account.login.form')}}" class="hp-style"><h1>Já tenho uma conta</h1></a>
                            
                        </div>
                       
                        
                    </div>

                </form>
            </div>
        </main>
    </div>
</body>
</html>
<script>
    
    $("#nome").bind('keydown', function(e) {

      var codTecla = e.which;
      var teclas = (codTecla > 64 && codTecla <= 90);
      var teclasAlter = (",8,32,46,37,38,39,40".indexOf("," + codTecla + ",") > -1);
      if (teclas || teclasAlter) {
        return true;
      } else {
        return false;
      }
    });
    $("#apelido").bind('keydown', function(e) {

      var codTecla = e.which;
      var teclas = (codTecla > 64 && codTecla <= 90);
      var teclasAlter = (",8,32,46,37,38,39,40".indexOf("," + codTecla + ",") > -1);
      if (teclas || teclasAlter) {
        return true;
      } else {
        return false;
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
</script>

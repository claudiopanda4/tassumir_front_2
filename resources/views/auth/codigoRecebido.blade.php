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
<body id="body-reg">
    <div id="app-log-reg">
        <main class="main" id="main-login-container">
            <div id="main-reg">
                <header class="logo-form mb-4" id="title-login">

                    <div>
                        <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                    </div>

                </header>


                <form action="{{route('account.verifyToRecoverPass')}}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="text" name="Id" value="{{$foundedId}}" class="hidden">
                    <div class="row">
                        <div class="col-md-8">
                            <span class="text-white">{{$codeToSend}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <input type="text" class="input-text-default input-full input-login" name="codeSend" placeholder="Escreva o código que recebeu" id="codeReceived">
                        <div class="invalid-feedback">
                            Insira o Código
                      </div>
                    </div>
                    

                    <button type="submit" id="login-enter" class="alerta">Validar código</button>
                </form>

                <div class="couple-separator mt-3"></div>
            </div>
        </main>
    </div>
</body>
</html>
<script>
    
    $("#codeReceived").bind('keydown', function(e) {

      var codTecla = e.which;
      var teclas = (codTecla >= 48 && codTecla <= 57);
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


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

        <main class="main" id="main-register-container">
            <div class="" id="main-reg">
                <header class="logo-form" id="title-login">
                    <div class="title">
                        <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final" style="color: #fd09fd;">umir</span></h1></a>
                    </div>
                    <div class="row justify-content-center">
                        <h3 class="text-white">Olá</h3>
                    </div>
                </header>

                @if($takeEmail!=null)

                <div class="row text-white justify-content-center">Enviamos um email para {{$takeEmail}} com o código de confirmação </div>

                @else

                <div class="row text-white justify-content-center">Enviamos uma msg para o número {{$takePhone}} com o código de confirmação </div>

                 @endif

                <form action="{{route('account.verifyCode.enter')}}" method="POST" class="needs-validation" novalidate>

                    @csrf
                        
                    <!-- inicio dados de cadastro-->

                    <input type="text" name="telefone" class="hidden" value="{{$takePhone}}">

                    <input type="password" name="password" class="hidden" value="{{$password}}">

                    <input type="text" name="email" class="hidden" value="{{$takeEmail}}">


                    <input type="text" name="receivedNome" class="hidden" value="{{$nome}}">

                    <input type="text" name="receivedApelido" class="hidden" value="{{$apelido}}">

                    <input type="text" name="receivedData_Nascimento" class="hidden" value="{{$data_nascimento}}">

                    <input type="text" name="receivedGenero" class="hidden" value="{{$genero}}">

                    <input type="text" name="receivedNacio" class="hidden" value="{{$nacionalidade}}">

                    <input type="password" name="receivedCode" class="hidden" value="{{$encryp_conf_cod}}">
                    <!-- fim dados de cadastro -->
                    <div class="form-group">
                        
                        <input type="text" class="input-text-default input-full input-login" name="codeSent" placeholder="Escreva o código que recebeu" id="codeReceived" required>
                        <div class="invalid-feedback">
                            Insira o Código
                      </div>

                    </div>
   
                 <button type="submit" id="login-enter" class="alerta">Validar código</button>
                  <div class="risk">
                        <h2 class="center">ou</h2>
                    </div>
                    
                </form>
                 <form action="{{ route('account.again.sendCode') }}" method="POST">
                                        @csrf
                        
                    <!-- inicio dados de cadastro-->

                    <input type="text" name="telefone" class="hidden" value="{{$takePhone}}">

                    <input type="password" name="password" class="hidden" value="{{$password}}">

                    <input type="text" name="email" class="hidden" value="{{$takeEmail}}">

                    <input type="text" name="receivedNome" class="hidden" value="{{$nome}}">

                    <input type="text" name="receivedApelido" class="hidden" value="{{$apelido}}">

                    <input type="text" name="receivedData_Nascimento" class="hidden" value="{{$data_nascimento}}">

                    <input type="text" name="sexo" class="hidden" value="{{$genero}}">

                    <input type="text" name="receivedNacio" class="hidden" value="{{$nacionalidade}}">

                    <input type="password" name="receivedCode" class="hidden" value="{{$encryp_conf_cod}}">
                    <!-- fim dados de cadastro -->
                    <button id="login-register" type="submit" class=""><span class="enter-login">Não Recebeste o código?</button>
                </form>

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


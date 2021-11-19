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
            <!--class="center" id="main-login"-->
            
            <div id="main-reg" >
                <header class="logo-form" id="title-login">

                    <div>
                        <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                    </div>

                </header>

                    <div class="row justify-content-start ml-2">
                        <span class="text-white">Insira o email ou número de telefone que usou na abertura da conta</span>
                        
                    </div>
                    <div class="row justify-content-start ml-2 mb-3">
                        <span class="text-white">Enviaremos os procedimentos para recuperar a sua conta</span>
                    </div>


                <form action="{{route('account.sendToPhoneEmail')}}" method="POST">
                    @csrf

                     <div class="form-group">

                        <select id="inputState" class="input-text-default input-full input-login">
                                <option selected>Choose...</option>
                                <option value="emailSele">Email</option>
                                <option value="telefSele">Telefone</option>
                        </select>

                    </div>

                    <div class="form-group">
                        
                        <input type="email" class="input-text-default input-full hidden input-login" name="emailName" placeholder="Email" id="email">
                    </div>

                    <div class="form-group">
                        
                        <input type="tel" class="input-text-default input-full hidden input-login" name="phoneNumber" type="text" placeholder="Telefone" id="telefone">
                    </div>

                    <button type="submit" id="login-enter" class="alerta">Enviar</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>

<script>

$(document).ready(function() {

    $("#inputState").change(function(){

        let type_info = $("#inputState option:selected").val();

        if (type_info == "emailSele") {

            $("#email").fadeIn();
            $("#telefone").hide();

        }else if(type_info == "telefSele"){

            $("#telefone").fadeIn();

             $("#email").hide();

        }else{

            $("#email").hide();
            $("#telefone").hide();
    }

    });

});
    
</script>

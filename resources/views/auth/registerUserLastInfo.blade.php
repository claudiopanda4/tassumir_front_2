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
        <main class="main" id="main-login-container">
            <div class="center" id="main-login">
                <header class="logo-form" id="title-login">
                    <div>
                        <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                    </div>

                    <div class="row justify-content-center">
                    	<span class="text-white">Só mais algumas informações</span>
                    </div>

                </header>

                    <div class="row justify-content-start ml-1">
                        <span class="text-white mb-2">Estamos concluindo o seu cadastro...</span>
                    </div>

                <form action="{{ route('account.login.enter') }}" method="POST">
                    @csrf

                     <div class="form-group">
                        <input type="text" class="input-text-default input-full" name="number_email_login" type="text" placeholder="Nacionalidade">
                    </div>
                    <div class="form-group">
                        <input type="text" name="password_login" class="input-text-default input-full" id="exampleInputPassword1" placeholder="Apelido">
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-6">
                            <select id="inputState" class="input-text-default input-full">
                                <option selected>Choose...</option>
                                <option value="emailSele">Email</option>
                                <option value="telefSele">Telefone</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            
                        <input type="email" class="input-text-default input-full" name="number_email_login" type="text" placeholder="Email" id="email">

                        <input type="tel" class="input-text-default input-full" name="number_email_login" type="text" placeholder="Telefone" id="telefone">

                        </div>
                         
                    </div>

                    <a href="" id="login-enter" type="submit" class=""><span class="text-white">Criar Conta</span></a>


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

            $("#email").show();
            $("#telefone").hide();

        }else if(type_info == "telefSele"){

            $("#telefone").show();

             $("#email").hide();

        }else{

        $("#email").hide();
        $("#telefone").hide();
    }

    });

    $("#email").hide();
    $("#telefone").hide();

});
    
</script>

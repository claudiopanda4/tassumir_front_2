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
<body id="body-login">
    <div id="app-log-reg" style="" class="clearfix">

        <main class="main" id="main-login-container">
            <div style="height: 1px;"></div>
            <header class="logo-form" id="logo-login-form-lg" style="margin-left: 10px;">
                <div class="title">
                    <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final" style="color: #fd09fd;">umir</span></h1></a>
                </div>
            </header>
            <div class="cover-login" id="cover-login-id">
                <img src='{{asset("storage/others/tassumir_aside.png")}}' class="img-full">
            </div>
            <div class="" id="main-login">
                <header class="logo-form" id="title-login">
                    <div class="title">
                        <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final" style="color: #fd09fd;">umir</span></h1></a>
                    </div>
                </header>
                <form action="{{ route('account.login.enter') }}" method="POST">
                    @csrf
                     <div class="form-group">
                        <label for="exampleInputPassword1">Número ou Email</label>
                        <input class="input-text-default input-full input-login" name="number_email_login" type="text" placeholder="email ou telefone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password_login" class="input-text-default input-full input-login" id="exampleInputPassword1" placeholder="password">
                    </div>
                    <button id="login-enter" type="submit" class=""><span class="enter-login">Ent</span>rar</button>
                    <div class="risk">
                        <h2 class="center">ou</h2>
                    </div>
                </form>
                <form action="{{ route('account.register.form') }}" method="GET">
                    <button id="login-register" type="submit" class=""><span class="enter-login">Criar uma Nova conta</button>
                </form>
                <div class="clearfix" style="padding: 10px;">
                    <span class="alert-login">Ao clicar em criar uma nova conta, você aceita o Contrato de Utilizador, a Política de Privacidade e a Política de Cookies do Tassumir</span><br>
                    <a href="" class="politic-privacy">Política de Privacidade e a Política de Cookies do Tassumir</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

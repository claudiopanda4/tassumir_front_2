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
<body>
    <div id="app">
        <main class="main" id="main-login-container">
            <div class="center" id="main-login">
                <header class="logo-form" id="title-login">
                    <div>
                        <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                    </div>
                </header>
                <form action="{{ route('account.login.enter') }}" method="POST">
                    @csrf
                     <div class="form-group">
                        <label for="exampleInputPassword1">Número ou Email</label>
                        <input class="input-text-default input-full" name="number_email_login" type="text" placeholder="email ou telefone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password_login" class="input-text-default input-full" id="exampleInputPassword1" placeholder="password">
                    </div>
                    <button id="login-enter" type="submit" class=""><span class="enter-login">Ent</span>rar</button>
                    <div class="clearfix">
                        <div id="forget-password" class="l-5">
                            <a href=""><h1>Esqueceu a senha</h1></a>
                        </div>
                        <div class="r-5" id="register-enter-container">
                            <a href="{{ route('account.register.form') }}"  id="register-enter" type="submit" class=""><span class="enter-login"></span>Registar</a>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>

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

                <div class="card"  >

                    <h1 style="padding:20px;text-align: center;justify-content: center;"><span style="color:white">Oo</span><span  style=" color: #800080;">ps!</span></h1>

                    <span style="color:white;padding: 20px;text-align: center;justify-content: center;">Ocorreu um erro!</span><br/>

                    <span style="color:white;text-align: center;justify-content: center;">Falha ao executar o processo, retroceda para página anterior!</span>

                <form action="{{ route('first.form') }}" method="GET" style="text-align:center;justify-content: center;padding: 8px;">

                    <button id="login-register" type="submit" style="width: 20%;" ><span class="enter-login" >Retroceder</button>
                </form>

                </div>


                <div class="couple-separator mt-3"></div>
            </div>
        </main>
    </div>
</body>
</html>
<script>

</script>


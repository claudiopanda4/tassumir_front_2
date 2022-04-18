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
                <div class="title clearfix">
                    <a href=""><img class="img-logo l-5" src="{{ asset('css/uicons/tassumir.jpeg') }}"><h1 class="l-5">ass<span class="title-final" style="color: #fd09fd;">umir</span></h1></a>
                </div>
            </header>
            <div class="cover-login" id="cover-login-id">
                <img src='https://images2.imgbox.com/e1/fc/BIrBWbBS_o.png' class="img-full">
            </div>
            <div class="" id="main-login">
                <header class="logo-form" id="title-login">
                    <div class="title clearfix">
                        <a href=""><img class="img-logo l-5" src="{{ asset('css/uicons/tassumir.jpeg') }}"><h1 class="l-5">ass<span class="title-final" style="color: #fd09fd;">umir</span></h1></a>
                    </div>
                </header>
                
         @include('flash')
                <form action="{{ route('account.login.enter') }}" method="POST" id="my-form">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Número ou Email</label>
                        <input class="input-text-default input-full input-login" name="numero_ou_email" type="text" placeholder="email ou telefone" >
                        @error('numero_ou_email')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="password_login_id">
                        <label for="exampleInputPassword1">Palavra Passe</label>
                        <input type="password" name="palavra_passe" class="input-text-default input-full input-login" id="exampleInputPassword1" placeholder="password" >
                        <i class="fa fa-eye" id="eye"></i>

                        @error('palavra_passe')

                            <span style="color: red;">{{$message}}</span>
                        @enderror

                    </div>
                    <button id="login-enter" type="submit" class=""><span class="enter-login">Ent</span>rar</button>
                    <div class="risk">
                        <h2 class="center">ou</h2>
                    </div>
                </form>
                
                <!--account.register.form-->
                <form action="{{ route('first.form') }}" method="GET">
                    <button id="login-register" type="submit" class=""><span class="enter-login">Criar uma Nova conta</button>
                </form>

                    <div class="clearfix">

                        <div id="forget-password" class="l-5">
                            <a href="{{route('account.code.form')}}" class="hp-style"><h1>Esqueceu a Senha?</h1></a>
                            
                        </div>
                    </div>
                <div class="clearfix" style="padding: 10px;">
                    <span class="alert-login">Ao clicar em criar uma nova conta, você aceita o Contrato de Utilizador, a Política de Privacidade e a Política de Cookies do Tassumir</span><br>
                    <a href="{{route('term.home')}}" class="politic-privacy">Política de Privacidade e a Política de Cookies do Tassumir</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<script>
    
    window.onload = function() {

        verify_the_browser();

    };

    function verify_the_browser(){

      let userAgent = navigator.userAgent;
         let browserName;
         if(userAgent.match(/chrome|chromium|crios/i)){

             browserName = "chrome";

             /*$("#browser-info").text(browserName).fadeIn();
              $("#browser-info").fadeOut(6000);*/

           }else if(userAgent.match(/firefox|fxios/i)){

             browserName = "firefox";

           }  else if(userAgent.match(/safari/i)){

             browserName = "safari";

           }else if(userAgent.match(/opr\//i)){

             browserName = "opera";

           } else if(userAgent.match(/edg/i)){

             browserName = "edge";

           }

           /*else if((userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) {
                return 'IE';//crap
            }*/
           else{

             $("#browser-info").text("Notamos que está a usar um Browser não compatível com o Tassumir, sugerimos o uso de outro Browser para ter a melhor experiência com a plataforma ").fadeIn();
              $("#browser-info").fadeOut(10000);
           }

    }
 var myForm = $("#my-form");
  myForm.submit(function(){
    myForm.submit(function(){
        return false;
    });
  });
    const password = $("#exampleInputPassword1");

    $("#eye").on('click',function(){

        if (password.prop('type') == 'password' ) {

                $(this).addClass('fa fa-slash');
                password.attr('type','text');
                

        }else{

            $(this).removeClass('fa fa-slash');
            password.attr('type','password');
            $(this).addClass('fa fa-eye');
        }




    });

</script>



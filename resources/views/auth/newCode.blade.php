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

                <form action="{{route('account.newPasswordSave')}}" method="POST" class="needs-validation" novalidate>
                    @csrf


                    <input type="text" name="theId" class="hidden" value="{{$takeId}}">

                    <div class="form-group" id="password_login_id2">
                        
                        <input type="password" class="input-text-default input-full input-login" name="password" placeholder="Escreva a nova senha" required id="password" minlength="6" onKeyUp="verify_password_strength();">

                        <i class="fa fa-eye" id="eye"></i>

                        <div class="invalid-feedback">
                            Insira a Password
                      </div>

                      <span id="senhaMsg"></span>
                      <!--<label id="labelt" class="hidden">Insira pelo menos 9 caracteres ou os seus dados não serão guardados</label>

                      <label id="labelAprovado" class="hidden">Password aceitável</label>-->
                    </div>

                    <div class="form-group" id="password_login_id2">
                        
                        <input type="password" class="input-text-default input-full input-login" name="confirmarPassword" placeholder="Repita a nova senha" required id="confirmarPassword">

                        <i class="fa fa-eye" id="eye2"></i>

                      <span id="senhaMsg_match">
                        <div class="invalid-feedback">
                            Confirme a Password
                      </div>

                      <!--<label id="labelC" class="hidden">As passswords não são iguais</label>-->
                    </div>


                    <button type="submit" id="login-enter" class="alerta">Guardar senha</button>
                </form>

                <div class="couple-separator mt-3"></div>
            </div>
        </main>
    </div>
</body>
</html>
<script>

  $('form').submit(function (event) {
    
        if ($(this).hasClass('submitted')) {
            event.preventDefault();
        }

        else {
            $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
            $(this).addClass('submitted');
        }
    });
    const pass = $("#password");

    const confP = $("#confirmarPassword");

    $("#eye").click(function(){

        if (pass.prop('type') == 'password') {

            $(this).addClass('fa fa-slash');
            pass.attr('type','text');

        }else{

            $(this).removeClass('fa fa-slash');
            pass.attr('type','password');
            $(this).addClass('fa fa-eye');
        }
    });

    $("#eye2").on('click',function(){


        if (confP.prop('type') == 'password') {

            $(this).addClass('fa fa-slash');

            confP.attr('type','text');

        }else{

            $(this).removeClass('fa fa-slash');
            confP.attr('type','password');
            $(this).addClass('fa fa-eye');
        }

    });

/*$("#password").on('keyup',function(){

        let passwordValue = $("#password").val();

        let passwordLenght = passwordValue.length;

        
        if (passwordLenght < 9) {

            $("#labelt").fadeIn().css({

                color:'red',
            });

            $("#labelAprovado").fadeOut(1000);
            /*setTimeout(()=>{

                    $("#labelt").fadeOut();

            },5000)

        }else if(passwordLenght >= 9){

            
                $("#password").css({

                    border:'1px solid green',
                });
                $("#labelAprovado").fadeIn()
                                   .css({
                                        
                                        color:'#efefef',
                                   })

                                   $("#labelt").fadeOut(1000);
            $("#labelt").fadeIn()
                .text("Password aceitável")
                .css({

                color:'#fff',
            });
            setTimeout(()=>{

                    $("#labelt").fadeOut();

            },5000)
        }

    });*/

  function verify_password_strength(){

    var numeros = /([0-9])/;
    var alfabeto = /([a-zA-Z])/;
    var char_especiais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

    if($('#password').val().length < 6){

     $('#senhaMsg').html("<span style='color:red'>Fraco, insira no mínimo 6 caracteres </span>");

     $(".alerta").prop('disabled', true).css({

              backgroundColor: "#9e9e9e"
      });

   }else{

    if($('#password').val().match(numeros) && $('#password').val().match(alfabeto) && $('#password').val().match(char_especiais)){ 


      $('#senhaMsg').html("<span style='color:green'><b>Forte</b></span>");


      $(".alerta").prop('disabled', false).css({
            backgroundColor: "#2196f3"
          });

    } else {

      $('#senhaMsg').html("<span style='color:orange'>Médio</span>");

      $(".alerta").prop('disabled', false).css({
              backgroundColor: "#2196f3"
          });
    }

   }

  }
    $("#confirmarPassword").on('keyup',function(){

        let password = $("#password").val();
        let passwordLenght =password.length;

        let confirmPassword = $("#confirmarPassword").val();
        let confirmPasswordLenght = confirmPassword.length;

        if(password === confirmPassword && passwordLenght === confirmPasswordLenght ){

            $("#senhaMsg_match").html("<span style='color:green'> As passswords são iguais </span>");

            $(".alerta").prop('disabled', false).css({
              backgroundColor: "#2196f3"
            });

        }else{

              $("#senhaMsg_match").html("<span style='color:red'> As passswords não são iguais </span>");

            $(".alerta").prop('disabled', true).css({

              backgroundColor: "#9e9e9e"

            });
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


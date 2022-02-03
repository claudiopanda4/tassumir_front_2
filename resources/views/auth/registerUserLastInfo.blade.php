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
        <main class="main clearfix" id="main-register-container">
            
            <div class="" id="main-reg">
                <header class="logo-form" id="title-login">
                    <div class="title">
                        <a href=""><i class="fas fa-link fa-32"></i><h1>Tass<span class="title-final" style="color: #fd09fd;">umir</span></h1></a>
                    </div>
                    <div class="row justify-content-center">
                        <span class="text-white">Só mais algumas informações</span>
                    </div>
                </header>
                    <div class="row justify-content-start ml-1">
                        <span class="text-white mb-2">Estamos concluindo o seu cadastro...</span>
                    </div>

                    <!--{{route('account.save')}}-->
                <form action="" method="POST" class="needs-validation" novalidate >


                    @csrf

                    <input type="text" name="nome1" class="hidden" value="{{$nome}}" >
                    <input type="text" name="apelido1" class="hidden" value="{{$apelido}}">
                    <input type="text" name="dataNasc1" class="hidden" value="{{$data}}">
                    <input type="text" name="sexo1" class="hidden" value="{{$sexo}}">

                     <div class="form-group">

                        <input type="text" class="input-text-default input-full input-login" name="nacionalidade" id="nacionalidade" placeholder="Nacionalidade" value="" required>
                        
                        
                        <div class="invalid-feedback">
                            Insira a Nacionalidade
                      </div>

                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <select id="inputState" class="input-text-default input-full input-login" required>
                                <option selected>Choose...</option>
                                <option value="emailSele">Email</option>
                                <option value="telefSele">Telefone</option>
                            </select>
                                
                            <div class="invalid-feedback">
                                Selecione uma Opção
                          </div>
                        </div>

                        <div class="col-md-6">
            
                        

                        <input type="email" class="input-text-default input-full input-login hidden input-emai-log" placeholder="Email" id="email" name="email">

                        <input type="text" class="input-text-default input-full input-login hidden input-emai-log" name="telefone" placeholder="Telefone" id="telefone" data-mask="000-000-000">

                        </div>
                         
                    </div>

                     <div class="form-group mt-2">

                        <input type="password" class="input-text-default input-full input-login" name="password"placeholder="Password" value=""  id="password" required>

                        <i class="fa fa-eye" id="eye"></i>
                        
                        <div class="invalid-feedback">
                            Insira a Password
                       </div>
                        
                      <label id="labelt" class="hidden">Insira pelo menos 9 caracteres ou os seus dados não serão guardados</label>

                      <label id="labelAprovado" class="hidden">Password aceitável</label>

                    </div>

                    <button type="submit" id="login-enter" class="alerta">Criar Conta</button>
                    
                </form>
            </div>
        </main>
    </div>
</body>
</html>

    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    
<script>

    const pass = $("#password");

    $("#eye").on('click',function(){

        if (pass.prop('type') == 'password') {

            $(this).addClass('fa fa-slash');
            pass.attr('type','text');
        }else{

            $(this).removeClass('fa fa-slash');
            pass.attr('type','password');
            $(this).addClass('fa fa-eye');
        }



    });

    $("#password").on('keyup',function(){

        let passwordValue = $("#password").val();

        let passwordLenght = passwordValue.length;

        if (passwordLenght < 9) {
            $("#password").css({

                    border:'1px solid red',
                });
            $("#labelt").fadeIn().css({

                color:'red',
            });

            $("#labelAprovado").fadeOut(1000);

            /*setTimeout(()=>{

                    $("#labelt").fadeOut();

            },2000)*/

        }else if(passwordLenght >= 9){

                $("#password").css({

                    border:'1px solid green',
                });
                $("#labelAprovado").fadeIn()
                                   .css({
                                        
                                        color:'#efefef',
                                   })

                                   $("#labelt").fadeOut(1000);
            /*$("#labelt").fadeIn()
                .text("Password aceitável")
                .css({

                color:'#efefef',
            });*/

            /*setTimeout(()=>{

                    $("#labelAprovado").fadeOut();

            },2000)*/
        }

    });

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

    $("#nacionalidade").bind('keydown', function(e) {

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
});
    
</script>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uicons/css/uicons-regular-rounded.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uicons-straight/css/uicons-regular-straight.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checked.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<title>Termos Tassumir</title>
</head>
<body  class="container-main-t">

	<div class="body-pop-up content-full-scroll-t">
		<header class="header-main header-main-component clearfix" >
			  <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><h1>tass<span class="title-final">umir</span></h1></a>
                </li>
            </ul>
		</header>
	
		<div class="main  main-t" style="margin-top:10%;text-align: justify;">
			
			<h3 class="the-font color-orange">Termos de Serviço</h3>
			<span class="span-text color-white" style="justify-content:flex-start;">
				
				O Tassumir é um conjunto de tecnologias e serviços desenvolvidas pela Be Able, lda para que as pessoas possam se conectar umas às outras, criar comunidades e expandir seus negócios. Estes Termos regem efectivamente o uso do Tassumir.
				
			</span>
			<span class="span-text color-white" style="justify-content:flex-start;">
				Não cobramos pelo acesso às consultas de informações no Tassumir. Em vez disso, cobramos no registo de relacionamentos conjugais e pessoas singulares ou colectivas também pagam para mostrarmos anúncios de seus produtos e serviços. Ao usar Tassumir, você concorda que podemos mostrar anúncios dessas pessoas.
			</span>

		<div class="main-div-termos">
				
				<div class="incoming-info">
					@for ($i=0; $i< sizeof($resultw); $i++)

						@if($i < 25)

						<span class="the-font color-orange" style="font-size:14pt;">{{$resultw[$i]['cabecalho']}}</span><br/>

						<span class="span-text color-white subtitulo" style="border-left: 4px solid #800080;margin-top: 15px;margin-bottom: 15px;padding: 5px;">{{$resultw[$i]['subtitulo']}}</span><br/>

						<span class="span-text color-white corpo"style="justify-content:flex-start">{{$resultw[$i]['corpo']}}</span><br/>

						@endif
						@endfor
				</div>
		
			</div>
		</div>

		</div>
		
	</div>

	<div>

		<img id="btn" src="{{ asset('css/uicons/ios-arrow-up-8-16.png') }}" class="btn-sroll-up">

	</div>
</body>
</html>
<script>
		$(document).ready(function(){
		
		$(window).scroll(function (){

			if($(this).scrollTop() > 200){

				$('#btn').fadeIn();

			}else{

				$('#btn').fadeOut();
			}

		});

 	$('#btn').on('click',function() {

 		$('html,body').animate({
 			scrollTop:0,
 		},1000);
 		 	
 	});
 	

 	});
</script>
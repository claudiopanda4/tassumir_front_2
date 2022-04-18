<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

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

	<div class="body-pop-up content-full-scroll-t" >
			<header class="header-main header-main-component clearfix" >
			  <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><h1>tass<span class="title-final">umir</span></h1></a>
                </li>
            </ul>
		</header>
		
		<!--<aside class="aside aside-left mt-2" >
			<nav>
				<ul class="clearfix" >
				<li class="li-component-aside">
					<i class="fas fa-arrow-down">
						
					</i><a href="#teste">
						<span class="span-text">Os Serviços que prestamos</span>
					</a>
				</li><li class="li-component-aside">
					<i class="fas fa-arrow-down"></i><a href="#teste">
						Financiamento
					</a>
				</li>
			</ul>	
			</nav>
		</aside>-->

		<div class="main" style="margin-top:10%;">
			
			<h3 class="the-font color-orange">Política de Dados</h3>
			<span class="span-text color-white" style="justify-content:flex-start;">
				
				Esta política descreve as informações que tratamos para suportar o Tassumirr e outras funcionalidades e produtos oferecidos pela Be Able, Lda.
				
			</span>
		

			<ul style="">
				@for ($i=0; $i< sizeof($resultw); $i++)

				@if($i < 25)

					<li>

						<span class="span-text color-orange" id="teste" >{{$resultw[$i]['cabecalho']}}</span><br/>

						<span class="span-text color-white" style="border-left: 4px solid #800080;padding: 5px;margin-top: 15px;margin-bottom: 15px;padding: 5px;margin-left: 5px">{{$resultw[$i]['subtitulo']}}</span><br/>
						<span class="span-text color-white"style="justify-content:flex-start">{{$resultw[$i]['corpo']}}</span>
					</li>


				@endif
				@endfor
				
			</ul>
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
 		 	//alert("oi");
 	});
 	

 	});
</script>
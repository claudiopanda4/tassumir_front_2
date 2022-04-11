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
	<title>Termos Tassumir</title>
</head>
<body  class="container-main">

	<div class="body-pop-up content-full-scroll">
		<header class="header-main header-main-component clearfix" >
			  <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><h1>tass<span class="title-final">umir</span></h1></a>
                </li>
            </ul>
		</header>
		
		<aside class="aside aside-left mt-2" >
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
		</aside>

		<div class="main" style="margin-top:10%;">
			
			<h3 class="the-font color-orange">Políticas de Publicidade</h3>
			<span class="span-text color-white" style="justify-content:flex-start;">
				
				As nossas Políticas de Publicidade fornecem orientações sobre os tipos de conteúdos de anúncios permitidos. Quando os anunciantes efectuam uma encomenda, cada anúncio é revisto face a estas políticas. 
				
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

</body>
</html>
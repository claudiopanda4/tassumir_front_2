   
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

   	<title>Termos e Politica</title>
   </head>
   <body class="container-main">
   		
<div class="body-pop-up content-full-scroll" >
	<header class="header-main header-main-component clearfix" >
			  <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><h1>tass<span class="title-final">umir</span></h1></a>
                </li>
            </ul>
		</header>

	<div class="row title-final span-text div-termos" style="margin-top:10%;">TERMOS E POLÍTICAS
	</div>
	<div class="row" style="margin-left: 20px;">
		<h3 class="the-font color-orange" >Tudo o que precisas de saber num único local.</h3>
	</div>
	<div class="row mt-5 div-como-func">

		<h2 class="the-font color-white ">COMO FUNCIONAMOS</h2>
	</div>

	<div class="div-main-1" >

		<div  class="div-main-info">

			<div class="div-1-infos">

				<a href="{{route('termos')}}" class="div-a">
				<h3 class="the-font color-orange">Termos de Serviço</h3>
				<span class="text-white span-text" style="font-size: 11pt;">Termos com os quais concordas <br/>quando utilizas o Tassumir</span>
				</a>

			</div>

			<div class="div-1-info">

				<a href="{{route('privacidade')}}" class="div-a">
				<h3  class="the-font color-orange">Politica de Dados</h3>
				<span class="text-white span-text" style="font-size: 11pt;">Informações que recebemos e<br/> como são utilizados</span>
				</a>

			</div>

			<div class="div-1-info">

				<a href="{{route('comunidade')}}" class="div-a">
				<h3 class="the-font color-orange">Padrões da Comunidade</h3>
				<span class="text-white span-text" style="font-size: 11pt;">O que não é permitido e <br/>como denunciar abusos</span>
				</a>

			</div>
	</div>		
	</div>
	<div class="row" style="margin-bottom:10%">

		<div class="col-md-7 div-line">

			<div class="div-1-info">

				<a href="{{route('comercio')}}" class="div-a">
				<h3  class="the-font color-orange">Termos Comerciais</h3>
				<span class="text-white span-text" style="font-size: 11pt;">Informações sobre acordos comerciais entre o Tassumir e seus Anunciantes</span>
				</a>

			</div>
				<div class="div-1-info">
				<a href="{{route('publicidade')}}" class="div-a">
				<h3  class="the-font color-orange">Politica de Publicidade</h3>
				<span class="text-white span-text" style="font-size: 11pt;">Informações sobre quais tipos de Publicidades são permitidas na Plataforma</span>
				</a>

			</div>
			<!--<div class="div-1-info">

				<a href="#" class="div-a">
				<h3 class="the-font color-orange">Politica de Eventos</h3>
				<span class="text-white span-text">Informações publicações</span>
				</a>

			</div>-->
		</div>
		<div class="col-md-4 text-white card-right-column" style="border-left: 2px solid #800080;">
			<span class="justify-content-start span-text text-white span-subtitle" >
				Seja bem vindo à Tássumir produto da Be Able, lda.</span><br/><br/>

					<span class="span-text text-white" style="font-size: 11pt;">

						O Tassumir é um conjunto de tecnologias e serviços desenvolvidas pela Be Able, lda para que as pessoas possam se conectar umas às outras, criar comunidades e expandir seus negócios. Estes Termos regem efectivamente o uso do Tassumir.

				</span>
		</div>
	</div>

	<div class="row ">
		
		<div class="col-md-4 card-termos" style="
    border-right: 2px solid #800080;">
				
					<span class="span-text text-white" style="font-size: 11pt;">
								
						Não cobramos pelo acesso às consultas de informações no Tássumir. Em vez disso, cobramos no registo de relacionamentos conjugais e pessoas singulares ou colectivas também pagam para mostrarmos anúncios de seus produtos e serviços. Ao usar Tássumir, você concorda que podemos mostrar anúncios dessas pessoas.
					</span>
				

		</div>

		<div class="col-md-4 ">
				<span class="span-text text-white" style="font-size: 11pt;">
				Não vendemos seus dados pessoais para anunciantes e não partilhamos informações de identificação pessoal (como nome, endereço de email ou outras informações de contacto) com os anunciantes, a menos que tenhamos sua permissão específica. Em vez disso, os anunciantes nos informam os tipos de público que desejam que vejam os anúncios, e nós mostramos esses anúncios para pessoas que podem estar interessadas. Oferecemos aos anunciantes relatórios numéricos sobre o desempenho dos anúncios para ajudá-los a entender como as pessoas estão interagindo com o conteúdo. 
			</span>
			
		</div>

		<div class="col-md-4 card-termos" style="border-left: 2px solid #800080;">
				<span class="span-text text-white" style="font-size: 11pt;">
				Nossa Política de Dados explica como colectamos e usamos seus dados pessoais para determinar alguns dos anúncios que serão exibidos e fornecer todos os outros serviços descritos abaixo. Você também pode ir para as suas Configurações a qualquer momento para analisar as escolhas de privacidade sobre como usamos seus dados.
			</span>
			
		</div>
	</div>

	<div >

		<img id="btn" src="{{ asset('css/uicons/caret-down.png') }}" style=" 
		  position: fixed;
		  bottom: 20px;
		  right: 30px;
		  z-index: 9999;
		  border: none;
		  outline: #800080;
		  background-color: #800080;
		  color: #800080;
		  cursor: pointer;
		  padding: 10px;
		  border-radius: 25px;
		  width: 48px;
		  height: 48px;
		 
" >

	</div>

	<footer class="mt-5 footer content-fluid" >
	 <div class="title clearfix" style="justify-content:center;align-items: center;text-align: center;">
                    <a href=""><img class="img-logo l-5" src="{{ asset('css/uicons/tassumir.jpeg') }}"><h1 class="l-5">ass<span class="title-final" style="color: #fd09fd;">umir</span></h1></a>
      </div>
	</footer>
</div>
   </body>
   </html>

 <script>

 	$('#btn').on('click',function() {

 		alert("teste");

 	  	let tm = $("body").scrollTop();

 	  	if(tm > 0){
 	  		alert("tamanho maior");
 	  	}else{
 	  		alert("menor");
 	  	}
 	

 	});
   	
</script>




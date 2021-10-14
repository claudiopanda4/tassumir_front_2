@extends('layouts.search_menu')

@section('content')



<div name="pessoa">

	</div>




 <div name="page">


           <!--<li class="change-look" style="display:flex;justify-content: space-between;align-content: space-between;" >

            <img class="l-5 circle img-40 " src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
             <span class="mt-2 " style="font-size:12pt;color: #fff; position: relative;" >João Nunes </span>
             <div class="mr-5">

             </div>
             <div class="mr-5">

             </div>
             <div class="mr-5">

             </div>
             <div class="mr-5">

             </div>
             <div class="mr-5">

             </div>

            <div class="invite-icon circle mt-1 " >
                <a href=""><i class="fas fa-user-plus fa-16 center" style="font-size: 14px;"></i></a>
            </div>
           </li>-->

</div>



 <div name="post">



</div>
								<script>

								$('#table_search').on('keyup',function(){
												let variavel= $('#table_search').val();
												let v= 1;
												if (variavel!='') {


//----------------------------------------------------------------------
										 	 $.ajax({


												 url: "{{ route('pessoa.pesquisa')}}",
												 type: 'get',
												 data: {'dados': variavel, 'v':v},
													dataType: 'json',
													success:function(response){
														 var nome = '';
														 var contador = 1;
	 												console.log(response.valor);


 													$.each(response.valor, function(key, value){
														if (value.estado_conta_id == 1) {
															if (contador == 1) {
																nome+='<div class="card-p ">'
															}
															nome += '<ul class="card-flex">'
															nome += '<li style="display:flex;justify-content: flex-start;align-content: flex-start;">'
															if (contador == 1) {
																nome += '<span style="color:#fff;" class="mt-2">Pessoas</span>'
                            	}
															nome += '</li>'
															nome += '<li class="change-look" style="display:flex;justify-content:space-around;align-content:center;">'
															nome += '<div class="mt-4"><img class="ml-5 circle img-40" src="{{asset("storage/img/users/anselmoralph.jpg")}}"></div>'
															nome += '<div class="mb-1 mr-2" id="card-ident"><div id="ident-profile" class="" >'
															nome += '<span class="profile-name">'+value.nome+' '+value.apelido+'</span>'
															nome += '<a href="" class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
															nome += '</div></div></li><div class="couple-separator"></div>'
															if (contador == 4) {
																var route = "{{route('peoplesSearch1.page', 1) }}"
                      					url_array = route.split('/');
                      					url_link = url_array[0] + "/" + url_array[1] + "/" + url_array[2] + "/"+ url_array[3] + "/"+ url_array[4] + "/" + variavel;
																nome += '<a href='+url_link+' class="mr-4"> ver mais</a>'
															}
															nome += '</ul>'
															if (contador == 4) {
																nome += '</div>'														}
                           	$('div[name=pessoa]').empty();
				 										$('div[name=pessoa]').append(nome);
														contador++;
													}
												})
											}
										});
//----------------------------------------------------------------------
												$.ajax({
													url: "{{ route('pagina.pesquisa')}}",
													type: 'get',
													data: {'dados': variavel , 'v':v},
	 												dataType: 'json',
	 											success:function(response){
													var nome = '';
													var contador = 1;
	 												console.log(response.valor);
													$.each(response.valor, function(key, value){
														if (value.estado_pagina_id==1) {
															if (contador == 1) {
																nome+='<div class="card-p mt-3">'
															}
															nome += '<ul class="card-flex">'
															nome += '<li style="display:flex;justify-content: flex-start;align-content: flex-start;">'
															if (contador == 1) {
																nome += '<span style="color:#fff;" class="mt-2">Páginas</span>'
															}
															nome += '</li>'
															nome += '<li class="change-look" style="display:flex;justify-content:space-around;align-content:center;">'
															nome += '<div class="mt-4"><img class="ml-5 circle img-40" src="{{asset("storage/img/users/anselmoralph.jpg")}}"></div>'
															nome += '<div class="mb-1 mr-2" id="card-ident"><div id="ident-profile" class="" >'
															nome += '<span class="profile-name">'+value.nome+'</span>'
															nome += '<a href="" class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
															nome += '</div></div></li><div class="couple-separator"></div>'
															if (contador == 4) {
																var route = "{{route('pagesSearch1.page', 1) }}"
                      					url_array = route.split('/');
                      					url_link = url_array[0] + "/" + url_array[1] + "/" + url_array[2] + "/"+ url_array[3] + "/"+ url_array[4] + "/" + variavel;
																nome += '<a href='+url_link+' class="mr-4"> ver mais</a>'
															}
															nome += '</ul>'
															if (contador == 4) {
																nome += '</div>'														}
													 		$('div[name=page]').empty();
															$('div[name=page]').append(nome);
															contador++;
													}
												})
												}
											});

//----------------------------------------------------------------------
									$.ajax({
										url: "{{ route('post.pesquisa')}}",
										type: 'get',
										data: {'dados': variavel , 'v':v},
										 dataType: 'json',
										 success:function(response){
											 var nome = '';
											 var contador = 1;
										 console.log(response.valor);
									$.each(response.valor, function(key, value){

										nome+='<div class="card-p mb-5">'
										nome+='<div class="post">'
										nome+='<header class="clearfix">'
										nome+='<div class="first-component clearfix l-5">'
										nome+='<div class="page-cover circle l-5">'
										nome+='<img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}">'
										nome+='</div>'
										nome+='<div class="page-identify r-5 clearfix">'
										nome+='<h1 class="text-ellips">'+value.nome_page+'</h1>'
										nome+='<div class="info-post clearfix">'
										nome+='<span class="time-posted">50 min</span>'
										nome+='</div>'
										nome+='</div>'
										nome+='</div>'
										nome+='</header>'
										nome+='<div class="card-post">'
										nome+='<div class="">'
										nome+='<p>'+value.post+'</p>'
										nome+='<div class="post-cover">'
										nome+='<img class="img-full" src="{{asset("storage/img/page/unnamed.jpg")}}">'
										nome+='</div>'
										nome+='</div>'
										nome+='</div>'
										nome+='</div>'
										nome += '<a href=""class="mr-4"> ver mais</a>'

										nome+='</div>'
									$('div[name=post]').empty();
									$('div[name=post]').append(nome);
								})
							}
						});
//----------------------------------------------------------------------
         } else {
					 		$('div[name=pessoa]').empty();
	            $('div[name=page]').empty();
							$('div[name=post]').empty();
         }
				});
								</script>



@stop

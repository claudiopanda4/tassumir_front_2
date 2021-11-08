@extends('layouts.search_menu')
@section('content')
<div class="main" id="main-search">
	<div>
	<div class="search-mobile">
        <div class="input-search">
            <i class="fas fa-search fa-16 fa-search-main"></i>
            <input type="search" id="table_search_mobile" name="table_search" placeholder="O que está procurando?" class="input-text">
        </div>
    </div>
</div>
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
</div>
								<script>

function search(variavel, v){
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
															let src = '{{asset("storage/img/users/") }}';
															console.log(src);
															if (value.estado_conta_id == 1) {
																if (contador == 1) {
																	nome+='<div class="card-p ">'
																}
																nome += '<ul class="card-flex">'
																nome += '<li class="search-title">'
																if (contador == 1) {
																	nome += '<span style="color:#fff;" class="mt-2">Pessoas</span>'
	                            	}
																nome += '</li>'
																nome += '<li class="change-look search-info">'
																if (value.foto != null) {
																	nome += '<div class="page-cover circle "><img class=" circle img-40" src= ' + src + '/' + value.foto + '></div>'
																}else {
																	nome += '<div class=" page-cover circle "><i class="fas fa-user center" style="font-size: 25px; color: #ccc;"></i></div>'
																}
																nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
																var route1 = "{{route('account1.profile', 1) }}"
																url_array1 = route1.split('/');
																url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.uuid;
																nome += '<a href='+url_link1+' <span class="profile-name-1">'+value.nome+' '+value.apelido+'</span>'
																nome += '<a href='+url_link1+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
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
														let src1 = '{{ asset("storage/img/page/") }}';
														var nome = '';
														var contador = 1;
		 												console.log(response.valor);
														$.each(response.valor, function(key, value){
															if (value.estado_pagina_id==1) {
																if (contador == 1) {
																	nome+='<div class="card-p mt-3">'
																}
																nome += '<ul class="card-flex">'
																nome += '<li class="search-title">'
																if (contador == 1) {
																	nome += '<span style="color:#fff;" class="mt-2">Páginas</span>'
																}
																nome += '</li>'
																nome += '<li class="change-look search-info">'
																if (value.foto != null) {
																	nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src=' + src1 + '/' + value.foto + '></div>'
																}else {
																	nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>'
																}
																nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
																nome += '<span class="profile-name-1">'+value.nome+'</span>'
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
												 let src1 = '{{ asset("storage/img/page/") }}';
												 let src2 = '{{ asset("storage/video/page/") }}';
												 let src3 = '{{ asset("storage/img/page/") }}';
												 var nome = '';
												 var contador = 1;
											 console.log(response.valor);
										$.each(response.valor, function(key, value){

											nome+='<div class="card-p mb-5">'
											nome+='<div class="post">'
											nome+='<header class="clearfix">'
											nome+='<div class="first-component clearfix l-5">'
											if (value.page_foto != null) {
												nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src=' + src1 + '/' + value.page_foto + '></div>'
											}else {
												nome += '<div class=" page-cover circle l-5"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>'
											}
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
											if (value.formato == 1) {
												nome+='<div class="post-cover">'
												nome+='<img class="img-full" src='+ src2 + '/' + value.post_foto +'>'
												nome+='</div>'
											}else if (value.formato == 2) {
												nome+='<div class="post-cover">'
												nome+='<img class="img-full" src='+ src3 + '/' + value.post_foto +'>'
												nome+='</div>'
											}
											nome+='</div>'
											nome+='</div>'
											nome+='</div>'
											if (contador == 4) {
												var route = "{{route('publicationsSearch1.page', 1) }}"
												url_array = route.split('/');
												url_link = url_array[0] + "/" + url_array[1] + "/" + url_array[2] + "/"+ url_array[3] + "/"+ url_array[4] + "/" + variavel;
												nome += '<a href='+url_link+' class="mr-4"> ver mais</a>'
											}
											nome+='</div>'

										$('div[name=post]').empty();
										$('div[name=post]').append(nome);
										contador++;
									})
								}
							});
}

								$('#table_search').on('keyup',function(){
												let variavel= $('#table_search').val();
												let v= 1;
												if (variavel!='') {
                        search(variavel, v);

         					} else {
					 					$('div[name=pessoa]').empty();
	            			$('div[name=page]').empty();
										$('div[name=post]').empty();
         					}
								});

								$('#table_search_mobile').on('keyup',function(){
												let variavel= $('#table_search_mobile').val();
												let v= 1;
												if (variavel!='') {
												search(variavel, v);

									} else {
										$('div[name=pessoa]').empty();
										$('div[name=page]').empty();
										$('div[name=post]').empty();
									}
								});
								</script>



@stop

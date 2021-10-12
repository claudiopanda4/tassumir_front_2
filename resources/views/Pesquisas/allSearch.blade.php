@extends('layouts.search_menu')

@section('content')

<div class="card-p ">

<div name="pessoa">
	<ul class="card-flex">
          <li class="allSearch-li">
          </li>


           <li class="change-look allSearch-li2">
			</li>
	</ul>
	</div>

</div>

<div class="card-p mt-3">
 <div name="page">
	<ul class="card-flex">


          <li class="allSearch-li">


          </li>

           
           <li class="change-look allSearch-li2">


		   </li>


	</ul>
</div>

</div>

 <div name="post">



</div>
		<script >

	$('#table_search').on('keyup',function(){	let variavel= $('#table_search').val();
//----------------------------------------------------------------------
$.ajax({									
	url: "{{ route('pessoa.pesquisa')}}",
	 type: 'get',	
	  data: {'dados': variavel},
	  		dataType: 'json',							success:function(response){
	 						console.log(response.valor);
 										$('div[name=pessoa]').empty();
 				$.each(response.valor, function(key, value){
 		$('div[name=pessoa]').append("<ul class='card-flex'><li class='allSearch-li'><span class='mt-2 couple-list-span-head'>Pessoas</span></li><li class='change-look allSearch-li2'><div class='mt-4'><img class='ml-5 circle img-40' src='{{asset('storage/img/users/anselmoralph.jpg')}}'></div><div class='mb-1 mr-2' id='card-ident'><div id='ident-profile' class='' ><span class='profile-name'>"+value.nome+" "+value.apelido+"</span><a href='' class='couple-invite-icon-one circle mr-4'><i class='fas fa-user-plus fa-16 center' style='font-size: 14pt;'></i></a></div></div></li><div class='couple-separator'></div></ul>");
												})
											}
										});
//----------------------------------------------------------------------
												$.ajax({
													url: "{{ route('pagina.pesquisa')}}",
													type: 'get',
													data: {'dados': variavel},
	 												dataType: 'json',
	 											success:function(response){
	 												console.log(response.valor);

	 											$('div[name=page]').empty();
													$.each(response.valor, function(key, value){
														$('div[name=page]').append("<ul class='card-flex'><li style='display:flex;justify-content: flex-start;align-content: flex-start;'><span style='color:#fff;' class='mt-2'>Páginas</span></li><li class='change-look' style='display:flex;justify-content:space-around;align-content:center;'><div class='mt-4'><img class='ml-5 circle img-40' src='{{asset('storage/img/users/anselmoralph.jpg')}}'></div><div class='mb-1 mr-2' id='card-ident'><div id='ident-profile' class='' ><span class='profile-name'>"+value.nome+" </span><a href='' class='couple-invite-icon-one circle mr-4'><i class='fas fa-user-plus fa-16 center' style='font-size: 14pt;'></i></a></div></div></li><div class='couple-separator'></div></ul>");
													})
												}
											});

//----------------------------------------------------------------------
									$.ajax({
										url: "{{ route('post.pesquisa')}}",
										type: 'get',
										data: {'dados': variavel},
										 dataType: 'json',
										 success:function(response){
										 console.log(response.valor);

										 $('div[name=post]').empty();
									$.each(response.valor, function(key, value){
									$('div[name=post]').append("<div class='card-p mb-5'><div class='post'><header class='clearfix'><div class='first-component clearfix l-5'><div class='page-cover circle l-5'><img class='img-full circle' src='{{asset('storage/img/page/unnamed.jpg')}}'></div><div class='page-identify r-5 clearfix'><h1 class='text-ellips'>"+value.nome_page+"</h1><div class='info-post clearfix'><span class='time-posted'>50 min</span></div></div></div></header><div class='card-post'><div class=''><p>"+value.post+"</p><div class='post-cover'><img class='img-full' src='{{asset('storage/img/page/unnamed.jpg')}}'></div></div></div><div></div>");
								})
							}
						});
//----------------------------------------------------------------------
				});
								</script>



@stop

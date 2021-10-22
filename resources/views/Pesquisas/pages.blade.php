

@extends('layouts.search_menu')

@section('content')
	<div name="page">
<input type="hidden" name="passa" id="passa" value="{{$val}}">
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
<script >

$(document).ready(function() {
		let passa= $('#passa').val();
  $('#table_search').val(passa);
	let v= 2;
					if (passa!='') {
								$.ajax({
									url: "{{ route('pagina.pesquisa')}}",
									type: 'get',
									data: {'dados': passa , 'v':v},
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
												nome += '<li class="search-title">'
												if (contador == 1) {
													nome += '<span style="color:#fff;" class="mt-2">Páginas</span>'
												}
												nome += '</li>'
												nome += '<li class="change-look search-info">'
												nome += '<div class="mt-4"><img class="ml-5 circle img-40" src="{{asset("storage/img/users/anselmoralph.jpg")}}"></div>'
												nome += '<div class="mb-1 mr-2" id="card-ident"><div id="ident-profile-1" class="" >'
												nome += '<span class="profile-name-1">'+value.nome+'</span>'
												nome += '<a href="" class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
												nome += '</div></div></li><div class="couple-separator"></div>'
												nome += '</ul>'
												if (contador == 10) {
													nome += '</div>'														}
													$('div[name=page]').empty();
													$('div[name=page]').append(nome);
													contador++;
											}
										})
										}
									});
								}
								else {
									$('div[name=page]').empty();
								}
});

//---------------------------- função principal-------------------------------------------
$('#table_search').on('keyup',function(){
				let variavel= $('#table_search').val();
				let v= 2;
				if (variavel!='') {
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
									nome += '<li class="search-title">'
									if (contador == 1) {
										nome += '<span style="color:#fff;" class="mt-2">Páginas</span>'
									}
									nome += '</li>'
									nome += '<li class="change-look search-info" style="display:flex;justify-content:space-around;align-content:center;">'
									nome += '<div class="mt-4"><img class="ml-5 circle img-40" src="{{asset("storage/img/users/anselmoralph.jpg")}}"></div>'
									nome += '<div class="mb-1 mr-2" id="card-ident"><div id="ident-profile-1" class="" >'
									nome += '<span class="profile-name-1">'+value.nome+'</span>'
									nome += '<a href="" class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
									nome += '</div></div></li><div class="couple-separator"></div>'
									nome += '</ul>'
									if (contador == 10) {
										nome += '</div>'														}
	 								$('div[name=page]').empty();
									$('div[name=page]').append(nome);
									contador++;
								}
							})
							}
					});
				}
				else {
					$('div[name=page]').empty();
				}
			});

</script>
@stop

@extends('layouts.search_menu')
@section('content')
<div class="main" id="main-search">
	<nav class="filter-main-search-mobile">
		<ul>
			<li>
				<div style="cursor: pointer; color: white;" class="nameclass">Solteiro(a)s</div>
			</li>
			<li>
				<div style="cursor: pointer; color: white;" class="nameclass">Casado(a)s</div>
			</li>
			<li>
				<div style="cursor: pointer; color: white;" class="nameclass">Namorados</div>
			</li>
			<li>
				<div style="cursor: pointer; color: white;" class="nameclass">Apresentados</div>
			</li>
			 
			<li>
				<div style="cursor: pointer; color: white;" class="nameclass">Vivendo Maritalmente</div>
			</li>
			<li>
				<div style="cursor: pointer; color: white;" class="nameclass">Páginas</div>
			</li>
		</ul>
	</nav>
	<div>
		<div class="search-mobile">
			<div class="input-search">
				<i class="fas fa-search fa-16 fa-search-main"></i>
				<input type="search" id="table_search_mobile" name="table_search" placeholder="O que está procurando?" class="input-text">
			</div>
		</div>
	</div>
	<input type="hidden" name="passa" id="passa" value="{{$val}}">
	<div name="pessoa">
	</div>
	<div name="page">

    </div>
    <div name="post">

    </div>
</div>
<script>
$(document).ready(function() {

	document.getElementById("route_all_select").classList.add('li-component-aside-active');


		let web= $('#passa').val();
		let mobile= $('#passa').val();
		$('#table_search').val(web);
		$('#table_search_mobile').val(mobile);
		let v= 1;
		if (web!='') {
			search(web, v);

	}else if (mobile!='') {
		search(mobile, v);

	} else {
		$('div[name=pessoa]').empty();
		$('div[name=page]').empty();
		$('div[name=post]').empty();
	}
	});





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
			if (response.valor.length > 0) {

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
							nome += '<div class=" page-cover circle "><i class="fas fa-user center" style="font-size: 15px; color: #ccc;"></i></div>'
						}
						nome += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >'
						var route1 = "{{route('account1.profile', 1) }}"
						url_array1 = route1.split('/');
						url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.uuid;

						nome += '<a href='+url_link1+'> <span class="profile-name-1">'+value.nome+' '+value.apelido+'</span>'
						nome += '<a href='+url_link1+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
						nome += '</div></div></li><div class="couple-separator"></div>'
						if (contador == 4) {
							var route = "{{route('peoplesSearch.page', 1) }}"
							url_array = route.split('/');
							url_link = url_array[0] + "/" + url_array[1] + "/" + url_array[2] + "/"+ url_array[3] + "/"+ url_array[4] + "/" + variavel;
							nome += '<a href='+url_link+' class="mr-4"> ver mais</a>'
						}
						nome += '</ul>'
						if (contador == 4) {
							nome += '</div>'
						}
							$('div[name=pessoa]').empty();
							$('div[name=pessoa]').append(nome);
							contador++;
						}
					})
			} else {
				nome = '<div style="color: white;" class="ml-2 mt-2">Sem resultados</div>';
				$('div[name=pessoa]').empty();
				$('div[name=pessoa]').append(nome);
			}
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
			if (response.valor.length > 0) {
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
						var route10 = "{{route('couple.page1', 1) }}"
						url_array10 = route10.split('/');
						url_link10 = url_array10[0] + "/" + url_array10[1] + "/" + url_array10[2] + "/"+ url_array10[3] +  "/" + value.uuid;
						nome +='<a href='+url_link10+'>'
						nome += '<span class="profile-name-1">'+value.nome+'</span>'
						nome +='</a>'
						nome += '<a href='+url_link10+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
						nome += '</div></div></li><div class="couple-separator"></div>'
						if (contador == 4) {
							var route = "{{route('pagesSearch.page', 1) }}"
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
			} else {
				nome = '<div style="color: white;" class="ml-2 mt-2">Sem resultados</div>';
				$('div[name=page]').empty();
				$('div[name=page]').append(nome);
			}

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
					var route = "{{route('publicationsSearch.page', 1) }}"
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

/* SIENE */
function expe(ccc, v){
	$.ajax({
		url: "{{ route('people.pesquisa') }}",
		type: 'get',
		dataType: 'json',
		data: {'data': ccc, 'val': v},
		success: function(res) {
			console.log(res);
			var content = '';
			var count = 1;
			let src = '{{ asset("storage/img/users/") }}';

			if (res.length > 0) {

				$.each(res, function(key, value) {
					//console.log(value);
					if (value.estado_conta_id == 1) {

						if (count == 1) {
							content+='<div class="card-p ">'
						}

						content += '<ul class="card-flex">'
						content += '<li class="search-title">'

						if (count == 1) {
							content += '<span style="color:#fff;" class="mt-2">Pessoas</span>'
						}
						content += '</li>'
						content += '<li class="change-look search-info">'

						if (value.foto != null) {
							content += '<div class="page-cover circle ">'
							content += '<img class=" circle img-40" src= ' + src + '/' + value.foto + '>'
							content +='</div>'
						}else {
							content += '<div class=" page-cover circle ">'
							content += '<i class="fas fa-user center" style="font-size: 15px; color: #ccc;"></i>'
							content += '</div>'
						}

						content += '<div class="mb-1 mr-2 profile-name-ident" id="">'
						content += '<div id="" class="" >'
						var route1 = "{{route('account1.profile', 1) }}"
						url_array1 = route1.split('/');
						url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.uuid;

						content += '<a href='+url_link1+' <span class="profile-name-1">'+value.nome+' '+value.apelido+'</span>'
						content += '<a href='+url_link1+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
						content += '</div></div></li><div class="couple-separator"></div>'
						if (count == 4) {
							var route = "{{route('peoplesSearch.page', 1) }}"
							url_array = route.split('/');
							url_link = url_array[0] + "/" + url_array[1] + "/" + url_array[2] + "/"+ url_array[3] + "/"+ url_array[4] + "/" + variavel;
							content += '<a href='+url_link+' class="mr-4"> ver mais</a>'
						}
						content += '</ul>'
						if (count == res.length) {
							content += '</div>'
						}
							$('div[name=pessoa]').empty();
							$('div[name=pessoa]').append(content);
							count++;
					}
				});
				// empty page div
				$('div[name=page]').empty();

			} else {

				content = '<div class="mt-4 card-p" style="color: white">';
				content += '<span class="mt-2 ml-2">Sem resultado</span>';
				content += '</div>';
				$('div[name=pessoa]').empty();
				$('div[name=pessoa]').append(content);

				// empty page div
				$('div[name=page]').empty();

			}
		}
	});
}

function expePg(ccc, v) {

	$.ajax({
		url: "{{ route('allpage.pesquisa')}}",
		type: 'get',
		data: {'data': ccc , 'v':v},
		dataType: 'json',
		success:function(result){

			let src1 = '{{ asset("storage/img/page/") }}';
			let src2 = '{{ asset("storage/video/page/") }}';
			let src3 = '{{ asset("storage/img/page/") }}';
			var content = '';
			var count = 1;

			//console.log(result);
			if (result.length > 0) {
				$.each(result, (key, value) => {

					if (value.estado_pagina_id==1) {

						if (count == 1) {
							content = '<div class="card-p mt-3">';
						}
						content += '<ul class="card-flex">';
						content += '<li class="search-title">';

						if (count == 1) {
							content += '<span style="color:#fff;" class="mt-2">Páginas</span>';
						}
						content += '</li>'
						content += '<li class="change-look search-info">';

						if (value.foto != null) {
							content += '<div class=" page-cover circle l-5"><img class="img-full circle" src=' + src1 + '/' + value.foto + '></div>';
						}else {
							content += '<div class=" page-cover circle l-5"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>';
						}
						content += '<div class="mb-1 mr-2 profile-name-ident" id=""><div id="" class="" >';

						// getting link
						var route10 = "{{route('couple.page1', 1) }}"
						url_array10 = route10.split('/');
						url_link10 = url_array10[0] + "/" + url_array10[1] + "/" + url_array10[2] + "/"+ url_array10[3] +  "/" + value.uuid;

						content +='<a href='+url_link10+'>'
						content += '<span class="profile-name-1">'+value.nome+'</span>'
						content +='</a>'
						content += '<a href='+url_link10+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
						content += '</div></div></li><div class="couple-separator"></div>'

						if (count == 4) {
							var route = "{{route('pagesSearch.page', 1) }}"
							url_array = route.split('/');
							url_link = url_array[0] + "/" + url_array[1] + "/" + url_array[2] + "/"+ url_array[3] + "/"+ url_array[4] + "/" + ccc;
							content += '<a href='+url_link+' class="mr-4"> ver mais</a>'

							console.log(url_link);
						}
						content += '</ul>'

						if (count == result.length) {
							content += '</div>'
						}
							$('div[name=pessoa]').empty();
							$('div[name=page]').empty();
							$('div[name=page]').append(content);
							count++;

					}
				})

			} else {
				content = '<div style="color: white;" class="ml-2 mt-2">Sem resultados</div>';
				$('div[name=page]').empty();
				$('div[name=page]').append(content);

				// empty page div
				$('div[name=pessoa]').empty();
			}

		}
	});
}

$('.nameclass').on('click', function() {
	let variavel = $('#table_search_mobile').val();
	let value = analyze_value($(this).text());

	if (variavel != ''){
		if (value === 'pag') {
			expePg(variavel, value);
		} else {
			expe(variavel, value);
		}
	} else {
		$('div[name=pessoa]').empty();
		$('div[name=page]').empty();
		$('div[name=post]').empty();
	}
	console.log(value);

});

function analyze_value(value) {
	var str_value = '';
	switch (value) {
		case 'Solteiro(a)s':
			str_value = 'sol';
			break;

		case 'Casado(a)s':
			str_value = 'cas';
			break;

		case 'Namorados':
			str_value = 'nam';
			break;

		case 'Apresentados':
			str_value = 'apr';
			break;

		case 'Páginas':
			str_value = 'pag';
			break;

		case 'Vivendo Maritalmente':
			str_value = 'vma';
			break;
	}
	return str_value;
}

/*END SIENE*/
</script>


@stop

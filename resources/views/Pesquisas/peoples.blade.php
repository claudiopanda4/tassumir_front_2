
@extends('layouts.search_menu')

@section('content')

<div name="pessoa">
<input type="hidden" name="passa" id="passa" value="{{$val}}">
</div>
<script >


$(document).ready(function() {
			let passa= $('#passa').val();
  		$('#table_search').val(passa);
			let v= 2;
			if (passa!='') {
 			$.ajax({
	 		url: "{{ route('pessoa.pesquisa')}}",
	 		type: 'get',
	 		data: {'dados': passa, 'v':v},
			dataType: 'json',
		success:function(response){
			let src = '{{asset("storage/img/users/") }}';
			 var nome = '';
			 var contador = 1;
			 console.log(response.valor.length);
			 $.each(response.valor, function(key, value){
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
					 nome += '<li class="change-look search-info" style="display:flex;justify-content:space-around;align-content:center;">'
					 if (value.foto != null) {
						 nome += '<div class="mt-4 page-cover circle "><img class=" circle img-40" src= ' + src + '/' + value.foto + '></div>'
					 }else {
						 nome += '<div class="mt-4 page-cover circle "><i class="fas fa-user " style="font-size: 25px; color: #ccc;"></i></div>'
					 }
					 nome += '<div class="mb-1 mr-2" id="card-ident"><div id="ident-profile-1" class="" >'
					 var route1 = "{{route('account1.profile', 1) }}"
					 url_array1 = route1.split('/');
					 url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.uuid;
					 nome += '<a href='+url_link1+' <span class="profile-name-1">'+value.nome+' '+value.apelido+'</span>'
					 nome += '<a href='+url_link1+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
					 nome += '</div></div></li><div class="couple-separator"></div>'
					 nome += '</ul>'
					 if (contador == 10) {
						 nome += '</div>'														}
				 $('div[name=pessoa]').empty();
				 $('div[name=pessoa]').append(nome);
				 contador++;
			 }
		 })
		}
	});

	} else {
			$('div[name=pessoa]').empty();
		}
});

//---------------------------- função principal-------------------------------------------
$('#table_search').on('keyup',function(){

					let variavel1= $('#table_search').val();
					let v= 2;
					if (variavel1!='') {

			 		$.ajax({
				 			url: "{{ route('pessoa.pesquisa')}}",
				 			type: 'get',
				 			data: {'dados': variavel1, 'v':v},
							dataType: 'json',
							success:function(response){
								let src = '{{asset("storage/img/users/") }}';
						 			var nome = '';
						 			var contador = 1;
									console.log(response.valor.length);


									$.each(response.valor, function(key, value){
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
												nome += '<div class="mt-4 page-cover circle "><img class=" circle img-40" src= ' + src + '/' + value.foto + '></div>'
											}else {
												nome += '<div class="mt-4 page-cover circle "><i class="fas fa-user " style="font-size: 25px; color: #ccc;"></i></div>'
											}
											nome += '<div class="mb-1 mr-2" id="card-ident"><div id="ident-profile-1" >'
											var route1 = "{{route('account1.profile', 1) }}"
											url_array1 = route1.split('/');
											url_link1 = url_array1[0] + "/" + url_array1[1] + "/" + url_array1[2] + "/"+ url_array1[3] +  "/" + value.uuid;
											nome += '<a href='+url_link1+' <span class="profile-name-1">'+value.nome+' '+value.apelido+'</span>'
											nome += '<a href='+url_link1+' class="couple-invite-icon-one circle mr-4"><i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i></a>'
											nome += '</div></div></li><div class="couple-separator"></div>'
											nome += '</ul>'
											if (contador == 10) {
												nome += '</div>'														}
										$('div[name=pessoa]').empty();
										$('div[name=pessoa]').append(nome);
										contador++;
									}
								})
			}
		});

} else {
$('div[name=pessoa]').empty();
}
});
</script>
@stop

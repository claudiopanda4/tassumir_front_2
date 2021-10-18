
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
			 var nome = '';
			 var contador = 1;
			 console.log(response.valor.length);
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
						 			var nome = '';
						 			var contador = 1;
									console.log(response.valor.length);


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

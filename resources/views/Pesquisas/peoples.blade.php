
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
<script >

$('#table_search').on('keyup',function(){
				let variavel= $('#table_search').val();
			 $.ajax({
				 url: "{{ route('pessoa.pesquisa')}}",
				 type: 'get',
				 data: {'dados': variavel},
					dataType: 'json',
					success:function(response){
					console.log(response.valor);

					$('div[name=pessoa]').empty();
					$.each(response.valor, function(key, value){
					$('div[name=pessoa]').append("<ul class='card-flex '><li class='allSearch-li'><span  class='mt-2 couple-list-span-head'>Pessoas</span></li><li class='change-look allSearch-li2'><div class='mt-4'><img class='ml-5 circle img-40' src='{{asset('storage/img/users/anselmoralph.jpg')}}'></div><div class='mb-1 mr-2' id='card-ident'><div id='ident-profile' class='' ><span class='profile-name'>"+value.nome+" "+value.apelido+"</span><a href='' class='couple-invite-icon-one circle mr-4'><i class='fas fa-user-plus fa-16 center' style='font-size: 14pt;'></i></a></div></div></li><div class='couple-separator'></div></ul>");
				})
			}
		});
});
</script>
@stop

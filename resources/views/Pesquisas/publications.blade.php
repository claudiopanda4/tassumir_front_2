@extends('layouts.search_menu')

@section('content')
<div name="post">



</div>
<script >

$('#table_search').on('keyup',function(){
				let variavel= $('#table_search').val();
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
});
</script>

@stop

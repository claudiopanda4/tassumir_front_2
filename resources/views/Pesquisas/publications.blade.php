@extends('layouts.search_menu')

@section('content')
<div class="main">
<div name="post">
	<input type="hidden" name="passa" id="passa" value="{{$val}}">
</div>
</div>
<script>

$(document).ready(function() {
		let passa= $('#passa').val();
  $('#table_search').val(passa);
	let v= 2;
	if (passa!='') {

		$.ajax({
			url: "{{ route('post.pesquisa')}}",
			type: 'get',
			data: {'dados': passa , 'v':v},
			dataType: 'json',
			success:function(response){
				let src1 = '{{ asset("storage/img/page/") }}';
				let src2 = '{{ asset("storage/video/page/") }}';
				let src3 = '{{ asset("storage/img/page/") }}';
 			var nome = '';
			console.log(response.valor);
			$.each(response.valor, function(key, value){

				nome+='<div class="card-p mb-5">'
				nome+='<div class="post">'
				nome+='<header class="clearfix">'
				nome+='<div class="first-component clearfix l-5">'
				if (value.page_foto != null) {
					nome += '<div class="mt-4 page-cover circle l-5"><img class="img-full circle" src=' + src1 + '/' + value.page_foto + '></div>'
				}else {
					nome += '<div class="mt-4 page-cover circle l-5"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>'
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
				nome+='</div>'

			$('div[name=post]').empty();
			$('div[name=post]').append(nome);
		})		}
	});
	}
	else {
		$('div[name=post]').empty();
	}
});

//---------------------------- função principal-------------------------------------------
$('#table_search').on('keyup',function(){
				let variavel= $('#table_search').val();
				let v= 2;
				if (variavel!='') {

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
		 console.log(response.valor);
		 $.each(response.valor, function(key, value){

			 nome+='<div class="card-p mb-5">'
			 nome+='<div class="post">'
			 nome+='<header class="clearfix">'
			 nome+='<div class="first-component clearfix l-5">'
			 if (value.page_foto != null) {
				 nome += '<div class="mt-4 page-cover circle l-5"><img class="img-full circle" src=' + src1 + '/' + value.page_foto + '></div>'
			 }else {
				 nome += '<div class="mt-4 page-cover circle l-5"><img class="img-full circle" src="{{asset("storage/img/page/unnamed.jpg")}}"></div>'
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
			 nome+='</div>'

		 $('div[name=post]').empty();
		 $('div[name=post]').append(nome);
	 })}
});
} else {
$('div[name=post]').empty();
}
});
</script>

@stop

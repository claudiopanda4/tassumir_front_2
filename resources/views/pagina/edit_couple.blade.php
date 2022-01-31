@extends('layouts.app')

@section('content')
<div class="main" id="main-container-profile" style="padding: 10px;">
<header class="card-flex">
			<h2 class="couple-title-edit">Editar pagina</h2>
</header>
<div class="card br-10 check" >
	 <div class="row" >
    	<!--<div class="col-md-4"></div>-->
    	<div class="col-md-3">
				@if($page[0]->foto)
				<div  class="couple-foto-edit circle l-5" id="img-cover-profile-page">
								<img src="{{asset('storage/img/page/') . '/' . $page[0]->foto}}" class="img-full circle">
						</div>
				@else
				<div  class="couple-foto-edit circle l-5" id="img-cover-profile-page">
								<img src="{{asset('storage/img/page/unnamed.jpg')}}" class="img-full circle">
						</div>
				@endif

    	</div>
    	<div class="col-md-6 mt-4">

	            <h1 class="profile-name">{{$page[0]->nome}}</h1>
	           <!-- <a href="" class="profile-name-edit" id="edit-page-cover-profile"><span>Alterar foto de perfil</span></a>-->

    	</div>
    </div>
  </div>


   <div class="card br-10 check" >

    	<div class="couple-info-inputs mt-2">
    		<p class="couple-name mt-2 ">Nome da pagina</p>
    		<input type="text" placeholder="Escreva o nome da pagina " class="couple-input-edit" name="" value="{{$page[0]->nome}}">

    	</div>

    	<div class="couple-info-inputs mt-2">
    		<p class="couple-name mt-2">Relacionamento </p>
    		<select class="couple-input-edit-select">
    			<option>Namoro</option>
    	    </select>
    	</div>

    	<div class="couple-info-inputs-btn" style="position: relative; height: 45px; margin-top: 10px; margin-bottom: 10px;">
	    	<p class="couple-name"></p>
	    	<div class="" style="position: relative; width: 140px; height: 100%; margin-bottom: 10px; margin-top: 10px;">
                <a href="">
                    <h3 class="edit-profile check-width edit-page-btn-alter" style="width: 100%;">Guadar alterações</h3>
                </a>
            </div>
    	</div>

    	<div class="couple-info-inputs-btn" style="position: relative; height: 45px;">
    		<p class="couple-name-p" style="font-size: 12px; width: 50%;">Eliminar ou desactivar página </p>
	    	  <div class="btn-container-delete-desact" style="width: 40%; height: 100%; position: relative;">
						<a href="{{route('delete_couple.page_view', $page[0]->uuid)}}">
                    <h3 class="edit-profile check-width edit-page-btn-alter" style="width:100%;">Eliminar</h3>
                </a>
            </div>
    	</div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  document.getElementById("route_page").classList.add('li-component-aside-active');
});
</script>
@stop

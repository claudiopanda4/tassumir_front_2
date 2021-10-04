@extends('layouts.app')

@section('content')
	<div class="couple-head-edit">

		<header class="card-flex">
			<h2 class="couple-title-edit">Editar pagina</h2>
		</header>


    <div class="row" >
    	<div class="col-md-4"></div>
    	<div class="col-md-3">
	    		
		    <div  class="couple-foto-edit circle l-5">
		        <img class="img-profile img-full circle" src="{{asset('thumb_IMG_1960_1024.jpg')}}">
		    </div>
    	</div>
    	<div class="col-md-5 mt-4">

	            <h1 class="profile-name">Delton & Ana</h1>
	            <a href="" class="profile-name-edit"><span>Alterar foto de perfil</span></a>
    		
    	</div>
    </div>

    <div class="couple-info">

    	<div class="couple-info-inputs">
    		<p class="couple-name mt-2">Nome da pagina</p>
    		<input type="text" placeholder="Escreva o nome da pagina " class="couple-input-edit" name="">
    	</div>

    	<div class="couple-info-inputs mt-2">
    		<p class="couple-name-p mt-2">Relacionamento </p>
    		<select class="couple-input-edit-select">
    			<option>Namoro</option>	
    	    </select>
    	</div>

    	<div class="couple-info-inputs mt-3">
    		<label class="couple-name mt-2"></label>
	    	<div class="couple-publish-btn-edit ">
	    		<a href="" >Guadar alterações </a>
	    	</div>

    	</div>

    	<div class="couple-info-inputs mt-3">
    		<p class="couple-name-p mt-2">Eliminar ou desactivar página </p>
    		
	    	<div class="couple-publish-btn-edit-2">
	    		<a href="{{route('delete_couple.page')}}" >Eliminar ou desactivar </a>
	    	</div>
    	</div>
       
    	
    </div>


		
	</div>
@stop
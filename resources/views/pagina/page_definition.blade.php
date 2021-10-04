@extends('layouts.app')

@section('content')

<div class="couple-head-del">
	<header class="card-flex">
		
			<h2 class="couple-title-edit-h">Definições de conta
			</h2>
	</header>
	<header class="card-flex">
			<h2 class="couple-title-edit">Desactivar ou eliminar a tua página do Tassumir</h2>
			<span>
				<h3 class="couple-title-edit-h3">Se queres fazer uma pausa do Tassumir, podes desactivar a tua conta. Se queres eliminar permanentemente a tua conta do Tassumir, informe-nos</h3>
			</span>
	</header>

	<div class="card-couple-del card-flex">
		
		<div class="couple-info-inputs mt-2">
    		<label class="couple-name mt-2">Escolher o motivo</label>
    		<select class="couple-input-edit-select-n">
    			<option>Namoro</option>	
    	    </select>


    	</div>
    	<div class="couple-info-inputs-3b mt-2">
    		<input type="checkbox" checked class="checkbox-style">
    		
    	
    		<label class="couple-name ml-2">Desativar página</label> 
      	</div>

      	<div class="couple-info-inputs-3b mt-1">
    		<label class="couple-name-p ml-4"> Esta ação pode ser temporária</label>     		
    		
      	</div>

      		<div class="couple-info-inputs-3b mt-1">
    		<p class="couple-name-p ml-4"> A tua página vai ser desativada, as tuas fotos vão ser removidas e a maioria das coisas que partilhaste. O motivo será apresentado a todos que tentarem aceder a tua página</p>
      	</div>


	</div>


	<div class="card-couple-del card-flex mt-3">
		
		<div class="couple-info-inputs mt-2">
    		<label class="couple-name mt-2">Escolher o motivo</label>
    		<select class="couple-input-edit-select-n">
    			<option>Namoro</option>	
    	    </select>
    	</div>

    	<div class="couple-info-inputs-3b mt-2">
    		
    		<input type="checkbox" checked class="checkbox-style">
    		<label class="couple-name ml-2">Eliminar página</label> 
      	</div>
      	<div class="couple-info-inputs-3b mt-1">
    		<label class="couple-name-p ml-4"> Esta ação é permanente</label>     		
    		
      	</div>

      		<div class="couple-info-inputs-3b mt-1">
    		<p class="couple-name-p ml-4"> Quando eliminas a tua página do Tassumir, não vais poder recuperar os conteúdos ou as informações que partilhaste. Esta ação leva 24h para ser efectuada</p>     		
    		
      	</div>

		
	</div>

     <div class="row mt-3">

     	<div class="col-md-6">
     		
     	</div>

     	<div class="col-md-2">
     		<button class="new-style-btn">Cancelar</button>
     	</div>
     		<div class="col-md-4">
     		<button class="new-style-btn-2">Confirmar</button>
     	</div>
     	
     </div>

	



@stop
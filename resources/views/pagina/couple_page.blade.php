@extends('layouts.app')

@section('content')

<div class="couple-head">
	
<div class=" card-flex">
    
		    <div  class="couple-foto-edit circle l-5">
		        <img class="img-profile img-full circle" src="{{asset('thumb_IMG_1960_1024.jpg')}}">
		    </div>
    <div class="" id="card-ident">
        <div id="ident-profile">
            <h1 class="profile-name">Delton & Ana</h1>
            <div class="edit-couple ">
                <a href="{{route('edit_couple.page')}}">Editar pagina</a>
            </div>
        </div>

        <div class="couple-publi-follower">
        	<h2 class="couple-name">65 Publicacoes</h2>
        	<h2 class="couple-name">65 Seguidores</h2>

        </div>
       
        <div class="couple-status">
            <h2 class="couple-actual-status">Namoro</h2>
        </div>
        
    </div>   
</div>

<div class="card-couple card-flex">

	 <div  class="couple-foto-small circle l-5">
        <img class="img-profile img-40 circle" src="{{asset('thumb_IMG_1960_1024.jpg')}}">
    </div>

    <div class="couple-input-text ">
    	<input type="text" name="" placeholder="Delton & Ana, o que estao pensando?" class="couple-input">
    </div>
    <div class="couple-separator"></div>

    <div class="couple-btn-space">

    	<div class="couple-publish-btn">
    		<a href="" >Publicar </a>
    	</div>

    	<div class="couple-free-space"></div>

    	<div class="couple-invite-icon-one circle ">
    		 <a href=""><i class="fas fa-user-plus fa-16 center "></i></a> 

    	</div>
    	<div class="couple-invite-icon circle">
    		<a href="" ><i class="fas fa-user fa-16 center"></i></a>
    	</div>
    </div>
</div>


    <div class="card-couple card-flex">
    	<div class="couple-history">
    		<h2 >Historia do Casal</h2>
    	</div>

    	<div class="couple-history">
    		<textarea placeholder="Escreva alguma coisa" class="couple-history-input"></textarea>
    	</div>

    	<div class="couple-separator">
    		<span class="couple-numbering-text">0/100</span>
    	</div>

    	<div class="couple-btn-space">

    	<div class="couple-publish-btn">
    		<a href="" >Editar </a>
    	</div>

    </div>
   </div>

<div class="card-flex-pub">
	<h2 class="couple-pub">Publicações</h2>
 </div>

   <div class="card-couple mb-5">
                <div class="post">
                    <header class="clearfix">
                        <div class="first-component clearfix l-5">
                            <div class="page-cover circle l-5">
                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                            <div class="page-identify r-5 clearfix">
                                <h1 class="text-ellips">Delton & Ana</h1>
                                <div class="info-post clearfix">
                                    <span class="time-posted">03/10/2021</span>
                                </div>
                            </div>
                        </div>
                        <div class="last-component clearfix r-5">
                            <label for="more-option-0">
                                <i class="fas fa-ellipsis-v fa-12 fa-option"></i>
                            </label>
                            <input type="checkbox" name="" id="more-option-0" class="hidden">
                            <ul class="clearfix more-option-post">
                                <li>
                                    <a href="">Editar</a>
                                </li>
                                <li>
                                    <a href="">Ocultar Publicação</a>
                                </li>
                                <li>
                                    <a href="">Apagar Publicação</a>
                                </li>
                                <li>
                                    <a href="">Denunciar</a>
                                </li>
                                <li>
                                    <a href="">Copiar Link</a>
                                </li>
                            </ul>
                        </div>
                    </header>
                    <div class="card-post">
                        <div class="">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                            <div class="post-cover">
                                <img class="img-full" src="{{asset('storage/img/page/unnamed.jpg')}}">
                            </div>
                        </div>
                    </div>
                    <nav class="row interaction-numbers">
                        <ul class="clearfix">
                            <li>
                                <a href="">10 reacções</a>
                            </li>
                            <li>
                                <a href="">10 comentários</a>
                            </li>
                        </ul>
                    </nav>
                    <nav class="row clearfix interaction-user">
                        <ul class="row clearfix">
                            <li class="l-5">
                                <div class="content-button">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                        <h2>Gosto</h2>
                                    </a>
                                </div>
                            </li>
                            
                            <li class="r-5">
                                <div class="content-button">
                                    <a href="">
                                        <i class="fas fa-share"></i>
                                        <h2>Partilhar</h2>
                                    </a>
                                </div>
                            </li>  
                        </ul>
                    </nav>
                    <div class="comment-send-couple clearfix ">
                        <div class="img-user-comment l-5">
                            <img class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                        </div>
                        <div class="input-text comment-send-text-couple l-5 clearfix">
                            <input type="text" name="" placeholder="O que você tem a dizer?" >
                            
                        </div>
                        <div class="r-5 icon-img-comment">
                                <a href="">
                                    <i class="far fa-images fa-20 fa-img-comment"></i>
                                </a>
                            </div>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>








</div>



@stop
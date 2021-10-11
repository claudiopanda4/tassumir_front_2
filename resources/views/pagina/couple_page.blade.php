@extends('layouts.app')

@section('content')


	
<div class="card br-10 card-flex">
    <!--<div id="img-profile-container" class="circle">
        <img class="img-profile img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
       
    </div>-->
    <div class="img-profile-user-married" style="padding:7px;">
            <img class="img-profile img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
           
    </div>
    
    <div class="" id="card-ident card">
        <div id="ident-profile" class="mr-5" style="padding-right:8px;">
            <h1 class="profile-name">Delton & Ana</h1>
            <div class="">
                <a href="{{route('edit_couple.page')}}">
                    <h3 class="edit-profile">Editar Perfil</h3>
                </a>
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

<div class="card-couple br-10 card-flex mt-3 card">

  <div class="comment-send clearfix">
                        <div class="img-user-comment l-5">
                            <img class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                        </div>
                        <div class="input-text comment-send-text l-5 clearfix">
                            <input type="text" name="" placeholder="Delton & Ana, o que estao pensando?">
                            
                        </div>
    </div>

    <div class="couple-separator"></div>


    <div class="mt-3" style="display:flex;justify-content:space-between;align-items:center ;">

        <a href="">
                    <h3 class="edit-profile">Publicar</h3>
        </a>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div class="ml-5"></div>
                <div class="ml-3"></div>
                <div class="ml-5"></div>
                <a href="" class="couple-invite-icon-one circle">
                    <i class="fas fa-user-plus fa-16 center " style="font-size:14pt;"></i>
                </a>
                <a href="" class="couple-invite-icon-one circle mr-4">
                    <i class="fas fa-user fa-16 center" style="font-size: 14pt;"></i>
                </a>
     </div>
</div>


    <div class="card-couple br mt-3 card-flex card">
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

    	<!--<div class="couple-publish-btn">
    		<a href="" >Editar </a>
    	</div>-->
           <div class=" mt-1">
                <a href="" >
                    <h3 class="edit-profile" >Editar</h3>
                </a>
        </div>

    </div>
   </div>

<div class="card-flex-pub">
	<h2 class="couple-pub">Publicações</h2>
 </div>

   <div class="card-couple mb-5 card">
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
                    <div class="comment-send clearfix">
                        <div class="img-user-comment l-5">
                            <img class="img-full circle" src="{{asset('storage/img/users/anselmoralph.jpg')}}">
                        </div>
                        <div class="input-text comment-send-text l-5 clearfix">
                            <input type="text" name="" placeholder="O que você tem a dizer?">
                            <div class="r-5 ">
                                <a href="">
                                    <i class="far fa-images fa-20 fa-img-comment"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        
                    </div>
                </div>
    </div>




@stop
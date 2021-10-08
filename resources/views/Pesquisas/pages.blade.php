

@extends('layouts.search_menu')

@section('content')
<div class="card-p mt-3">

	<ul class="card-flex">

          <li style="display:flex;justify-content: flex-start;align-content: flex-start;">
                                    
               <span style="color:#fff;" class="mt-2">Páginas</span>
          </li> 

           <!--<li class="change-look" style="display:flex;justify-content: space-between;align-content: space-between;" >

            <img class="l-5 circle img-40 " src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
             <span class="mt-2 " style="font-size:12pt;color: #fff; position: relative;" >João Nunes </span>
             <div class="mr-5">
             	
             </div>
             <div class="mr-5">
             	
             </div>
             <div class="mr-5">
             	
             </div>
             <div class="mr-5">
             	
             </div>
             <div class="mr-5">
             	
             </div>
      
            <div class="invite-icon circle mt-1 " >
                <a href=""><i class="fas fa-user-plus fa-16 center" style="font-size: 14px;"></i></a>
            </div>
           </li>-->
 
           <li class="change-look" style="display:flex;justify-content:space-around;align-content:center;" >

            <div class="mt-4">
              <img class="ml-5 circle img-40 " src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
           
            </div>
    
            <div class="mb-1 mr-2" id="card-ident">
                <div id="ident-profile" class="" >
                    <span class="profile-name">João Nunes</span>
                    <a href="" class="couple-invite-icon-one circle mr-4">
                            <i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i>
                    </a>
                </div>
                
            </div> 

          
           </li>
            <div class="couple-separator"></div>

            
           <li class="change-look" style="display:flex;justify-content:space-around;align-content:center;" >

            <div class="mt-4">
              <img class="ml-5 circle img-40 " src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
           
            </div>
    
            <div class="mb-1 mr-2" id="card-ident">
                <div id="ident-profile" class="" >
                    <span class="profile-name">João Nunes</span>
                    <a href="" class="couple-invite-icon-one circle mr-4">
                            <i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i>
                    </a>
                </div>
                
            </div> 

          
           </li>
            <div class="couple-separator">
           
        </div>
           
           <li class="change-look" style="display:flex;justify-content:space-around;align-content:center;" >

            <div class="mt-4">
              <img class="ml-5 circle img-40 " src='{{asset("storage/img/users/anselmoralph.jpg")}}'>
           
            </div>
    
            <div class="mb-1 mr-2" id="card-ident">
                <div id="ident-profile" class="" >
                    <span class="profile-name">João Nunes</span>
                    <a href="" class="couple-invite-icon-one circle mr-4">
                            <i class="fas fa-user-plus fa-16 center" style="font-size: 14pt;"></i>
                    </a>
                </div>
                
            </div> 

          
           </li>
            <div class="couple-separator">
           
             </div>

               
		
	</ul>
	
</div>
@stop
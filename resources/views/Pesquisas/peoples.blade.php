
@extends('layouts.search_menu')

@section('content')
<div class="card-p ">

	<ul class="card-flex">

          <li style="display:flex;justify-content: flex-start;align-content: flex-start;">
                                    
               <span style="color:#fff;" class="mt-2">Pessoas</span>
          </li> 

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
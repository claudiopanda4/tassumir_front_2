@extends('layouts.app_message')
@section('header')
<header class="header-main header-main-component clearfix">
            <ul class="ul-left clearfix">
                <li class="title clearfix">
                    <a href="{{route('account.home')}}"><i class="fas fa-link fa-24"></i><h1>Tass<span class="title-final">umir</span></h1></a>
                </li>
                <li class="search-lg mobile-hidden">
                    <div class="input-search">
                        <label for="search-lg-home"><i class="fas fa-search fa-16 fa-search-main"></i></label>
                        <input type="search" name="" placeholder="O que está procurando?" class="input-text" id="search-lg-home-id">
                    </div>
                    <input type="checkbox" name="" class="invisible" id="search-lg-home">
                    <div class="container-search-home">
                        <div class="input-search">
                            <i class="fas fa-search fa-16 fa-search-main"></i>
                            <input type="search" name="" placeholder="O que está procurando?" class="input-text" id="search-lg-home-id-container">
                        </div>
                        <div class="search-id-container">
                            
                        </div>
                        <div class="change-look mb-5" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">
                            <a href="{{route('account.all.notifications')}}"><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>
                        </div>
                    </div>
                </li>
            </ul>
            <nav class="menu-header ">
                <ul class="clearfix ">
                    <li class="l-5 mobile-header-icon">
                        <a href="{{route('allSearch.page')}}"><i class="fas fa-search fa-24" size="7"></i></a>
                    </li>
                    <li class="l-5 mobile-header-icon" style="z-index:2;">
                        <div class="hidden-click-any-container last-component-n clearfix-n " >
                            <label for="more-option-notify" class="hidden-click-any-container fa-option-mobile-hide">
                                <i class="hidden-click-any-container far fa-bell fa-24 fa-option" size="7"></i>
                            </label>
                            <a href="{{route('account.all.notifications')}}" class="hidden-click-any-container fa-option-mobile-lg-hide">
                                <i class="hidden-click-any-container far fa-bell fa-24 fa-option" size="7"></i>
                            </a>
                            <input type="checkbox" name="" id="more-option-notify" class="hidden">
                            <ul class="noti-card-first clearfix br-10">
                                <li class="hidden-click-any-container mb-4" style="display: flex;justify-content: flex-start;align-content: flex-start;">
                                    <span style="color:#efefef;">Actividades</span>
                                </li>


                                <li class="hidden-click-any-container noti-flex mt-2">

                                    <div class="hidden-click-any-container noti-div-subtitle">
                                        <h4 class="noti-subtitle">Hoje</h4>
                                    </div>
                                </li>
                            <li class="hidden-click-any-container send-invited-relationship clearfix">
                                <div class="hidden-click-any-container user-identify-img circle l-5">
                                    <img src="{{asset('storage/img/users/anselmoralph.jpg')}}" class="img-full circle">
                                </div>
                                <div class="hidden-click-any-container details-invited l-5">
                                    <span class="hidden-click-any-container description-invited">
                                        <a href="">Hugo Paulo</a> enviou um Pedido de Relacionamento para VOCÊ
                                    </span>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <label class="hidden-click-any-container l-5" for="options-invited-pop-up">
                                            <div class="hidden-click-any-container label-invited">
                                                <!--<h2 class="accept">Aceitar</h2>-->
                                                <h2>Aceitar</h2>
                                            </div>
                                        </label>
                                        <a href="" class="hidden-click-any-container l-5 denied">Rejeitar</a>
                                    </div>
                                </div>
                            </li>
                            <li class="hidden-click-any-container send-invited-relationship clearfix">
                                <div class="hidden-click-any-container user-identify-img circle l-5">
                                    <img src="{{asset('storage/img/users/anselmoralph.jpg')}}" class="img-full circle">
                                </div>
                                <div class="hidden-click-any-container details-invited l-5">
                                    <span class="hidden-click-any-container description-invited">
                                        <a href="">Hugo Paulo</a> Respondeu a sua Solicitação de Registo de compromisso
                                    </span>
                                    <div class="hidden-click-any-container options-invited clearfix">
                                        <a href="{{route('relationship.page')}}" class="l-5 denied">Ver Resposta</a>
                                    </div>
                                </div>
                            </li>
                              <?php foreach ($notificacoes as $key => $value): ?>
                                @if($key < 3)
                                <li class="hidden-click-any-container change-look noti-flex-info" >
                                  <?php if ($notificacoes[$key]['v']== 1): ?>
                                    <?php if ($notificacoes[$key]['foto']!= null): ?>

                                    <div class="hidden-click-any-container ml-2 novi-div-image">
                                         <img class="l-5 circle img-40" src="{{ asset('storage/img/users') . '/' . $notificacoes[$key]['foto'] }}">
                                    </div>
                                    <?php else: ?>
                                      <div class="hidden-click-any-container ml-2 novi-div-image">

                                           <img class="hidden-click-any-container l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>


                                      </div>
                                      <?php endif; ?>
                                    <?php elseif ($notificacoes[$key]['v']== 2): ?>
                                      <?php if ($notificacoes[$key]['foto']!= null): ?>

                                      <div class="hidden-click-any-container ml-2 novi-div-image">

                                           <img class="hidden-click-any-container l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>


                                      </div>
                                      <?php else: ?>
                                        <div class="hidden-click-any-container ml-2 novi-div-image">

                                             <img class="l-5 circle img-40" src='{{asset("storage/img/users/anselmoralph.jpg")}}'>


                                        </div>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <div class="hidden-click-any-container noti-div-name">

                                    <span class="hidden-click-any-container noti-span">{{$notificacoes[$key]['notificacao']}}</span>

                                    <div class="hidden-click-any-container noti-hour ml-2">
                                        <a href=""><span class="">há um dia</span></a>
                                    </div>

                                   </div>

                                </li>
                                @endif
                                
                              <?php endforeach; ?>

                                 <li class="hidden-click-any-container change-look mb-5" style="display: flex;justify-content:center;align-items: center;width: 300px;padding:8px;">
                                    <a href="{{route('account.all.notifications')}}"><span class="mt-2" style="font-size:13px;color: #fff;" > Ver todos </span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--<li class="l-5 mobile-hidden">
                        <a href=""><i class="fas fa-shield-alt fa-24"></i></a>
                    </li>-->s
                    <li class="user-tassumir clearfix l-5">
                        @if ($profile_picture == null || $profile_picture == "null" || $profile_picture == NULL || $profile_picture == "NULL" || $profile_picture == "" || $profile_picture == " ")
                            <a href="{{route('account.profile')}}"><i class="far fa-user-circle fa-24 l-5" id="imgless"></i></a>
                        @else
                            <a href="{{route('account.profile')}}"><img class="l-5" src="{{asset('storage/img/users') . '/' . $profile_picture}}"></a>
                        @endif
                        <a href="{{route('account.profile')}}" class="l-5"><h1 class="user-account" >{{$conta_logada[0]->nome}}</h1></a>
                    </li>
                </ul>
            </nav>
    </header>
@stop
@section('content')
<div class="main clearfix" id="main-direct">
    <aside class="chat l-5">
        <div class="search-container-chat">
            <div class="input-search">
                <i class="fas fa-search fa-16 fa-search-main"></i>
                <input type="search" name="" placeholder="Quem você está procurando?" class="input-text" id="campo_pesquisa">
                <input type="hidden" name="" value="{{$conta_logada[0]->conta_id}}" id="conta_log">
                 @if($conta_logada[0]->foto != null)
                <input type="hidden" name="" value="{{$conta_logada[0]->foto}}" id="valor_foto">
                @else
                <input type="hidden" name="" id="valor_foto" value="<i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i>">
                @endif
                <input type="hidden" name="" value="{{$user_logado[0]->identificador_id}}" id="remetente">
            </div>
        </div>
        <nav class="nav-menu-chat">
            <?php $print = 0; ?>
            <ul id="contactos_message">
                @forelse($contas as $pessoas)
                @if($pessoas->conta_id != $conta_logada[0]->conta_id)
                
                @forelse($message_contact as $contact)
                @if($contact->id == $pessoas->conta_id)
                    <?php $print = $contact->id ?>
                @endif
                @empty
                @endforelse
                @if($print == $pessoas->conta_id)                
                <li class="clearfix">                    
                    <a class="person_message" id="pers-{{$print}}" href="">
                        @if( !($pessoas->foto == null) )
                            <div class="container-img circle l-5" id="persdiv-{{$print}}">
                                <img class="img-full circle" src='{{ asset("storage/img/users") . "/" . $pessoas->foto }}' id="persim-{{$print}}">
                                <input type="hidden" name="" id="valor_foto-{{$pessoas->conta_id}}" value="{{$pessoas->foto}}">
                            </div>
                        @else
                            <div class="container-img circle l-5" id="persdiv-{{$print}}">
                                <i class="fas fa-user center" style="font-size: 30px; color: #ccc;" id="persicon-{{$print}}"></i>        
                            </div>
                        @endif
                        <div id="persdivname-{{$print}}" class="nav-menu-chat-component-user l-5">
                            <h1 class="nome_dest" id="namepers-{{$print}}">{{$pessoas->nome}}</h1>
                        </div>    
                    </a>
                </li>
                @endif
                @endif
                @empty
                @endforelse
            </ul>
            <script type="text/javascript">
                function carregar_sms(e){
                    e.preventDefault();
            let conta_destino = e.target.id.split('-')[1];            
            let remetente = $('#conta_log').val();
            let identificador_user = $('#remetente').val();
            let nome_conta_dest = $('#namepers-'+conta_destino).text();
            $('#user_logado').val(remetente);
            $('#destinatario').val(conta_destino); 
            alert(nome_conta_dest);
            $.ajax({
                url: "{{ route('message.show')}}",
                type: 'get',
                data: {'user_send': remetente, 'conta_send': conta_destino},
                dataType: 'json',
                success:function(response){
                  
                        let destinatario = response.destinatario;
                        let foto_user_logado = response.foto_rem;
                    $('#message_user_destino').empty();
                    $('#user_chat').empty();
                    $('#zona_foto').empty();
                    if (response.foto_des == null) {
                        $('#zona_foto').append("<i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i>");
                    }else{
                         let src = "{{asset('storage/img/users/')}}" + "/" + response.foto_des;
                        $('#zona_foto').append("<img src='"+src+"'  class='circle img-full'>");    
                    }
                    $('#user_chat').append("<h1>"+nome_conta_dest+"</h1>");
                    $('#message_user_dest').empty();
                    $.each(response.valor, function(key, value){
                        if ((value.id_identificador_a == identificador_user) && (value.id_identificador_b == destinatario)) {
                            if (response.foto_rem == null) {
                        $('#message_user_dest').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div>");
                        $('#message_user_destino').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div>");
                    }else{
                        let src = "{{asset('storage/img/users/')}}" + "/" + response.foto_rem;
                        $('#message_user_dest').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><img src='"+src+"'  class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                        $('#message_user_destino').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><img src='"+src+"'  class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                    }
                    }else {
                        if ((value.id_identificador_a == destinatario ) && (value.id_identificador_b == identificador_user)) {
                            if (response.foto_des == null) {
                                
                        $('#message_user_dest').append("<div  class='own-user l-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                        $('#message_user_destino').append("<div  class='own-user l-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                        }else{
                            let src = "{{asset('storage/img/users/')}}" + "/" + response.foto_des;
                            $('#message_user_dest').append("<div  class='own-user l-5'><div class='clearfix'><div class='container-img circle l-5'><img src='"+src+"'  class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                            $('#message_user_destino').append("<div  class='own-user l-5'><div class='clearfix'><div class='container-img circle l-5'><img src='"+src+"'  class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                        }
                      }  
                    }
                  });
                 }
               });
             }
            </script>
        </nav>
    </aside>
    <div class="container-message l-5">
        <header class="clearfix">
            <a href="">
                @if( isset($conta_destino)  )
                    @if ($conta_destino[0]->foto == null || $conta_destino[0]->foto == "null" || $conta_destino[0]->foto == NULL || $conta_destino[0]->foto == "NULL" || $conta_destino[0]->foto == "" || $conta_destino[0]->foto == " ")
                        <div class="container-img circle l-5">
                                <i class="fas fa-user center" style="font-size: 30px; color: #ccc;"></i>
                            </div>
                    @else
                          <div class="container-img circle l-5">
                        <img class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_destino[0]->foto}}">
                        </div>
                    @endif                
                <div class="nav-menu-chat-component-user l-5">
                    <h1>{{$conta_destino[0]->nome}}</h1>
                </div>  
                @else
                <div id="zona_foto" class="container-img circle l-5">
                        <i class="fas fa-user center" style="font-size: 30px; color: #ccc;"></i>
                    </div>
                <div id="user_chat" class="nav-menu-chat-component-user l-5">
                    <h1>Selecione o seu Amigo</h1>
                </div>
                @endif  
            </a>
        </header>
        @if(isset($message_text))            
        <div id="message_user_destino" class="body-message clearfix">
            
            @forelse($message_text as $mensagem)
                @if(($mensagem->id_identificador_a == $identificador_user[0]->identificador_id) && ($mensagem->id_identificador_b == $identificador_dest[0]->identificador_id))
                <div class="other-user r-5">
                    <div class="clearfix">
                      @if($conta_logada[0]->foto != null)
                        <div class="container-img circle l-5">
                        <img class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_logada[0]->foto}}">
                        </div>
                      @else
                        <div class="container-img circle l-5">
                        <i class="fas fa-user center" style="font-size: 30px; color: #ccc;"></i>  
                        </div>
                      @endif
                    <div class="message-body l-5">
                        <div>
                            <p>{{$mensagem->message}}</p>
                        </div>
                    </div>
                  </div> 
                </div>    
                @elseif(($mensagem->id_identificador_a == $identificador_dest[0]->identificador_id) && ($mensagem->id_identificador_b == $identificador_user[0]->identificador_id))
                <div class="own-user l-5">
                  <div class="clearfix">
                      @if($conta_destino[0]->foto != null)
                        <div class="container-img circle l-5">
                        <img class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_destino[0]->foto}}">
                        </div>
                      @else
                        <div class="container-img circle l-5">
                        <i class="fas fa-user center" style="font-size: 30px; color: #ccc;"></i>  
                        </div>
                      @endif
                    <div class="message-body l-5">
                        <div>
                            <p>{{$mensagem->message}}</p>
                        </div>
                    </div>
                  </div>  
                </div>
            @endif
            @empty
            @endforelse        
        </div> 
        <div class="comment-send clearfix" id="comment-send-1">
            @if($conta_logada[0]->foto != null)
            <div class="img-user-comment l-5">
                <img class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_logada[0]->foto}}">
            </div>
             @else
            <div class="img-user-comment l-5">
            <i class="fas fa-user center" style="font-size: 30px; color: #ccc;"></i>  
            </div>
            @endif
            <div class="input-text comment-send-text l-5 clearfix">
                <input type="text" class="" name="sms" id="message_send" placeholder="O que você tem a dizer?">
                <input type="hidden" name="" id="user_logado" value="{{$conta_logada[0]->conta_id}}">
                <input type="hidden" name="" id="destinatario" value="{{$conta_destino[0]->conta_id}}">
                <div class="r-5 ">
                    <a href="" class="comentar-a" id="enviar">
                        <i class="far fa-paper-plane fa-20 fa-img-comment" id="1"></i>
                    </a>
                </div>
            </div>
        </div>          
        @else
        <div id="message_user_dest" class="body-message clearfix">
         </div>  
         <div class="comment-send clearfix" id="comment-send-1">
            @if($conta_logada[0]->foto != null)
            <div class="img-user-comment l-5">
                <img class="img-full circle" src="{{ asset('storage/img/users') . '/' . $conta_logada[0]->foto}}">
            </div>
             @else
            <div class="img-user-comment l-5">
            <i class="fas fa-user center" style="font-size: 30px; color: #ccc;"></i>  
            </div>
            @endif
            <div class="input-text comment-send-text l-5 clearfix">
                <input type="text" class="" name="sms" id="message_send" placeholder="O que você tem a dizer?">
                <input type="hidden" name="" id="user_logado" value="">
                <input type="hidden" name="" id="destinatario" value="">
                <div class="r-5 ">
                    <a href="" class="comentar-a" id="enviar">
                        <i class="far fa-paper-plane fa-20 fa-img-comment" id="1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>         
        @endif
        
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#enviar').click(function(e){
            e.preventDefault();
            var message = $('#message_send').val();
            let user_send = $('#user_logado').val();
            let conta_send = $('#destinatario').val();
            $.ajax({
                url: "{{route('message.send')}}",
                type: 'get',
                data: {'user_send': user_send, 'conta_send': conta_send, 'message_send': message},
                dataType: 'json',
                success: function(response){
                  if (response.resultado == "Salvou") {
                    $('div:eq(4)').text('Angola');
                    $('#message_send').val("");
                    if (response.foto_reme == null) {

                    $('#message_user_dest').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+message+"</p></div></div></div>");
                    $('#message_user_destino').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+message+"</p></div></div></div>");
                }else{
                    
                    let src = "{{asset('storage/img/users/')}}" + "/" + response.foto_reme;
                    $('#message_user_destino').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><img src='" + src + "' class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+message+"</p></div></div></div>");
                    $('#message_user_dest').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><img src='" + src + "' class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+message+"</p></div></div></div>");
                }
                
                  }
                   
                }
              });

        });

        $('#sms_antiga').click(function(e){
            e.preventDefault();
            alert('Carregando mensagens anteriores');
        });

        $('.person_message').click(function(e){
            e.preventDefault();
            let conta_destino = e.target.id.split('-')[1];            
            let remetente = $('#conta_log').val();
            let identificador_user = $('#remetente').val();
            let nome_conta_dest = $('#namepers-'+conta_destino).text();
            $('#user_logado').val(remetente);
            $('#destinatario').val(conta_destino); 
                       
             $.ajax({
                url: "{{ route('message.show')}}",
                type: 'get',
                data: {'user_send': remetente, 'conta_send': conta_destino},
                dataType: 'json',
                success:function(response){
                        console.log(response.valor);
                        let destinatario = response.destinatario;
                        let foto_user_logado = response.foto_rem;
                    $('#message_user_destino').empty();
                    $('#user_chat').empty();
                    $('#zona_foto').empty();
                    if (response.foto_des == null) {
                        $('#zona_foto').append("<i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i>");
                    }else{
                         let src = "{{asset('storage/img/users/')}}" + "/" + response.foto_des;
                        $('#zona_foto').append("<img src='"+src+"'  class='circle img-full'>");    
                    }
                    $('#user_chat').append("<h1>"+nome_conta_dest+"</h1>");
                    $('#message_user_dest').empty();
                    $.each(response.valor, function(key, value){
                        if ((value.id_identificador_a == identificador_user) && (value.id_identificador_b == destinatario)) {
                            if (response.foto_rem == null) {
                        $('#message_user_dest').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div>");
                        $('#message_user_destino').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div>");
                    }else{
                        let src = "{{asset('storage/img/users/')}}" + "/" + response.foto_rem;
                        $('#message_user_dest').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><img src='"+src+"'  class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                        $('#message_user_destino').append("<div class='other-user r-5'><div class='clearfix'><div class='container-img circle l-5'><img src='"+src+"'  class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                    }
                    }else {
                        if ((value.id_identificador_a == destinatario ) && (value.id_identificador_b == identificador_user)) {
                            if (response.foto_des == null) {
                                
                        $('#message_user_dest').append("<div  class='own-user l-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                        $('#message_user_destino').append("<div  class='own-user l-5'><div class='clearfix'><div class='container-img circle l-5'><i class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                        }else{
                            let src = "{{asset('storage/img/users/')}}" + "/" + response.foto_des;
                            $('#message_user_dest').append("<div  class='own-user l-5'><div class='clearfix'><div class='container-img circle l-5'><img src='"+src+"'  class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                            $('#message_user_destino').append("<div  class='own-user l-5'><div class='clearfix'><div class='container-img circle l-5'><img src='"+src+"'  class='circle img-full'></div><div class='message-body l-5'><div><p class='corpo_mensagem'>"+value.message+"</p></div></div></div></div>");
                        }
                      }  
                    }
                  });
                 }
               });
             });

             /* CAMPO PESQUISAR */
          $('#campo_pesquisa').on('keyup',function(){
            if ($('#campo_pesquisa').val() != "") {
                  let valor_pesquisa= $('#campo_pesquisa').val();
                  let logado = $('#conta_log').val();
                $.ajax({
                url: "{{ route('people.send.message')}}",
                type: 'get',
                data: {'dados': valor_pesquisa},
                dataType: 'json',
                success:function(response){
                    $('#contactos_message').empty();
                    $.each(response.valor, function(key, value){
                        if (value.conta_id != logado) {
                        if (value.foto == null) {
                    $('#contactos_message').append("<li class='clearfix'><input type='hidden' class='destino' value="+value.conta_id+"><a id='pers-"+value.conta_id+"' onclick='carregar_sms(event)' class='person_message' href=''><div id='persdiv-"+value.conta_id+"' class='container-img circle l-5'><i id='persicon-"+value.conta_id+"' class='fas fa-user center' style='font-size: 30px; color: #ccc;'></i>  </div>< id='persdivname-"+value.conta_id+"' div class='nav-menu-chat-component-user l-5'><h1 id='namepers-"+value.conta_id+"' class='nome_dest'>"+value.nome+"</h1></div></a></li>");
                }else{
                    let src = "{{asset('storage/img/users/')}}" + "/" + value.foto;
                    $('#contactos_message').append("<li class='clearfix'><a id='pers-"+value.conta_id+"' onclick='carregar_sms(event)' class='person_message' href=''><div id='persdiv-"+value.conta_id+"' class='container-img circle l-5'><img src='"+src+"'  class='circle img-full' id='persim-"+value.conta_id+"'></div><div id='persdivname-"+value.conta_id+"' class='nav-menu-chat-component-user l-5'><h1 id='namepers-"+value.conta_id+"' class='nome_dest'>"+value.nome+"</h1></div></a></li>");
                }
                }              
                });    
                }
              });
            }
            });
          /* FIM CAMPO PESQUISAR */
    });
       
</script>
@stop

@extends('layouts.app')

@section('content')

<div class="main">
  <form class="" action="{{ route('account.update') }}" method="POST">
    @csrf

<div class="card br-10">
    @include('flash')
    <div class="label-input">
        <label>
            <span class="label-dark">Nome</span>
        </label>
        <div class="input input-container">
            <input type="text" name="nome" class="input-text" placeholder="o primeiro nome" id="nome-id" value="{{$account_name[0]->nome}}">
        </div>
    </div>
      
    <div class="label-input">
        <label>
            <span class="label-dark">Sobrenome</span>
        </label>
        <div class="input input-container">
            <input type="text" name="apelido" class="input-text" placeholder="o último nome" value="{{$account_name[0]->apelido}}" id="apelido-id">
        </div>

    </div>
    <div id=verify-dados style="display:flex; margin-left:20px;justify-content: flex-start;align-content: flex-start;">
              
      </div>

    <div class="label-input">
        <label>
            <span class="label-dark">Email</span>
        </label>
        <div class="input input-container">
            <input type="email" name="email" class="input-text" placeholder="example@gmail.com" value="{{$account_name[0]->email}}" id="email">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Biografia</span>
        </label>
        <div class="input input-container">
            <textarea name="bio" placeholder="O que tens a falar sobre si?" >{{$account_name[0]->descricao}}</textarea>
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Telefone</span>
        </label>
        <div class="input input-container">

            <input type="telefone" name="telefone" class="input-text-h input-login-h" placeholder="+244-" value="{{$account_name[0]->telefone}}" id="telefone" data-mask="000-000-000">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Gênero</span>
        </label>
        <div class="input input-container-radio">
            <label for="M-genre">M</label>
            <?php if ($account_name[0]->genero=='Masculino'): ?>
              <input type="radio" name="genre" id="M-genre" value="Masculino" class="genre-class" checked>
            <?php else: ?>
              <input type="radio" name="genre" class="genre-class" id="M-genre"  value="Masculino">
            <?php endif; ?>
        </div>
        <div class="input input-container-radio">
            <label for="F-genre">F</label>
            <?php if ($account_name[0]->genero=='Feminino'): ?>
            <input type="radio" name="genre" id="F-genre" class="genre-class" value="Feminino" checked>
            <?php else: ?>
            <input type="radio" name="genre" id="F-genre" class="genre-class"  value="Feminino">
            <?php endif; ?>
        </div>
        <input type="hidden" name="genre-choose" value="" id="genre-id">
    </div>

      
        <div class="form-group" id="password_login_id-h">
            <label>
                <span class="label-dark ml-2">Palavra Passe</span>
            </label>
              <input type="password" class="input-text-default input-full-h input-login-h" name="password" placeholder="Password" value="" id="password">
              <i class="fa fa-eye" id="eye"></i>
        </div>
 

    <div class="btn-container">
        <div class="card-btn mt-2">
            <button type="submit" class="btn">
                Guardar Alterações
            </button>
        </div>

    </div>
</div>
  </form>
</div>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script>

$(document).ready(function () {
  document.getElementById("route_account").classList.add('li-component-aside-active');
});

  const pass = $("#password");
 $("#eye").on('click', function() {

    if (pass.prop('type') == 'password') {

      $(this).addClass('fa fa-slash');
      pass.attr('type', 'text');
    } else {

      $(this).removeClass('fa fa-slash');
      pass.attr('type', 'password');
      $(this).addClass('fa fa-eye');
    }
  });
$('#nome-id').on('keyup', function(e){
    let control = 0;
    let nome = $('#nome-id').val();
    let campos = nome.split(' ');
    if (campos.length >= 2) {
      nome = nome.replace(' ', '');
      control++;
      $('#nome-id').val(nome);
    }else{
      $('#v-f-d').remove();
    }
    if (control > 0 && $('#nome-id').focus()) {
      $("#verify-dados").html("<p class='text-danger' id='v-f-d'>Não se permite espaços</p>");
    }
  });
  $('#apelido-id').on('keyup', function(e){
    let control = 0;
    let apelido = $('#apelido-id').val();
    let campos = apelido.split(' ');
    if (campos.length >= 2) {
      apelido = apelido.replace(' ', '');
      control++;
      $('#apelido-id').val(apelido);
    }else{
      $('#v-f-d').remove();
    }
    if (control > 0 && $('#apelido-id').focus()) {
       $("#verify-dados").html("<p class='text-danger' id='v-f-d'>Não se permite espaços</p>");
    }
  });
    $("#nome-id").bind('keydown', function(e) {

    var codTecla = e.which;
    var teclas = (codTecla > 64 && codTecla <= 90);
    var teclasAlter = (",8,32,46,37,38,39,40".indexOf("," + codTecla + ",") > -1);
    if (teclas || teclasAlter) {
      return true;
    } else {
      return false;
    }
  });
  $("#apelido-id").bind('keydown', function(e) {

    var codTecla = e.which;
    var teclas = (codTecla > 64 && codTecla <= 90);
    var teclasAlter = (",8,32,46,37,38,39,40".indexOf("," + codTecla + ",") > -1);
    if (teclas || teclasAlter) {
      return true;
    } else {
      return false;
    }
  });
   $("#email").keyup(function(){
    if(validateEmail()){
     
      $("#emailMsg").html("<p class='text-success'>Email Válido</p>");

    }else{
         
           $("#emailMsg").html("<p class='text-danger'>Email Inválido</p>");
    }

  });

  function validateEmail(){

    var email = $("#email").val();

    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if(reg.test(email)){
      return true;
    }else{
      return false;
    }
  }

</script>
@stop

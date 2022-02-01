@extends('layouts.app')

@section('content')
<div class="main">
  <form class="" action="{{ route('account.update') }}" method="POST">
    @csrf

<div class="card br-10">
    <div class="label-input">
        <label>
            <span class="label-dark">Nome</span>
        </label>
        <div class="input input-container">
            <input type="text" name="nome" class="input-text" placeholder="o primeiro nome" value="{{$account_name[0]->nome}}">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Sobrenome</span>
        </label>
        <div class="input input-container">
            <input type="text" name="apelido" class="input-text" placeholder="o último nome" value="{{$account_name[0]->apelido}} ">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Email</span>
        </label>
        <div class="input input-container">
            <input type="email" name="email" class="input-text" placeholder="example@gmail.com" value="{{$account_name[0]->email}} ">
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
            <input type="telefone" name="telefone" class="input-text" placeholder="+244-" value="{{$account_name[0]->telefone}} ">
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
    <div class="btn-container">
        <div class="card-btn">
            <button type="submit" class="btn">
                Guardar Alterações
            </button>
        </div>

    </div>
</div>
  </form>
</div>
<script type="text/javascript">

$(document).ready(function () {
  document.getElementById("route_account").classList.add('li-component-aside-active');
});

</script>
@stop

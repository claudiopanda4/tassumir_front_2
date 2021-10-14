@extends('layouts.app')

@section('content')
<div class="main" action="{{ route('account.update') }}" method="POST">
  @csrf
<div class="card br-10">
    <div class="label-input">
        <label>
            <span class="label-dark">Nome</span>
        </label>
        <div class="input input-container">
            <input type="text" name="" class="input-text" placeholder="o primeiro nome" value="{{$account_name[0]->nome}}">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Sobrenome</span>
        </label>
        <div class="input input-container">
            <input type="text" name="" class="input-text" placeholder="o último nome" value="{{$account_name[0]->apelido}} ">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Email</span>
        </label>
        <div class="input input-container">
            <input type="email" name="" class="input-text" placeholder="example@gmail.com" value="{{$account_name[0]->email}} ">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Biografia</span>
        </label>
        <div class="input input-container">
            <textarea placeholder="O que tens a falar sobre si?" >{{$account_name[0]->descricao}}</textarea>
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Telefone</span>
        </label>
        <div class="input input-container">
            <input type="email" name="" class="input-text" placeholder="+244-" value="{{$account_name[0]->telefone}} ">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Gênero</span>
        </label>
        <div class="input input-container-radio">
            <label for="M-genre">M</label>
            <?php if ($account_name[0]->genero=='M'): ?>
              <input type="radio" name="genre" id="M-genre" checked>
            <?php else: ?>
              <input type="radio" name="genre" id="M-genre">
            <?php endif; ?>
        </div>
        <div class="input input-container-radio">
            <label for="F-genre">F</label>
            <?php if ($account_name[0]->genero=='F'): ?>
            <input type="radio" name="genre" id="F-genre" checked>
            <?php else: ?>
            <input type="radio" name="genre" id="F-genre">
            <?php endif; ?>
        </div>
    </div>
    <div class="btn-container">
        <div class="card-btn">
            <button type="submit" class="btn btn-block btn-primary">
                Guardar Alterações
            </button>
        </div>

    </div>
</div>
</div>
@stop

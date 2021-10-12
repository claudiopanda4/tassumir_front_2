@extends('layouts.app')

@section('content')
<div class="main">
<div class="card br-10">
    <div class="label-input">
        <label>
            <span class="label-dark">Nome</span>
        </label>
        <div class="input input-container">
            <input type="text" name="" class="input-text" placeholder="o primeiro nome">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Sobrenome</span>
        </label>
        <div class="input input-container">
            <input type="text" name="" class="input-text" placeholder="o último nome">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Email</span>
        </label>
        <div class="input input-container">
            <input type="email" name="" class="input-text" placeholder="example@gmail.com">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Biografia</span>
        </label>
        <div class="input input-container">
            <textarea placeholder="O que tens a falar sobre si?"></textarea>
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Telefone</span>
        </label>
        <div class="input input-container">
            <input type="email" name="" class="input-text" placeholder="+244-">
        </div>
    </div>
    <div class="label-input">
        <label>
            <span class="label-dark">Gênero</span>
        </label>
        <div class="input input-container-radio">
            <label for="M-genre">M</label>
            <input type="radio" name="genre" id="M-genre">
        </div>
        <div class="input input-container-radio">
            <label for="F-genre">F</label>
            <input type="radio" name="genre" id="F-genre">
        </div>
    </div>
    <div class="btn-container">
        <div class="card-btn">
            <button type="submit" class="btn">
                Guardar Alterações
            </button>
        </div>
        
    </div>
</div>
</div>
@stop
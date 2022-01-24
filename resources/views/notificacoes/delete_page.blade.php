@extends('layouts.app')

@section('content')
<div class="main" style="margin-bottom: 15px;">
    <div class="card br-10 " style="height:auto; margin: 15px auto 25px;">
    <header class="noti-flex-1">
            <div class="noti-div-title">
                <h3 class="noti-title">Eliminação da Página</h3>
            </div>
            <div class="noti-div-elipsis">
            <i class="fas fa-ellipsis-h fa-18 fa-option "></i>
            </div>
    </header>
    @if($dados['verf']==1)
        <div>
            <div class="clearfix">
                <div class="icon-container-alert l-5">
                    <i class="fas fa-exclamation-triangle fa-20 center"></i>
                </div>
                <div class="p-description l-5">
                    <p>A sua página ( <span class="name-partner" id="partner">{{$dados['nome_pag']}}</span>) será eliminada dentro de 2 meses. Caso queira que isso não aconteça, clique no botão "Anular".</p>
                </div>
            </div>
            <div class="nav-button clearfix">
                <div class="button-container r-5">
                    <button class="cancel-delete">Anular</button>
                </div>
            </div>
        </div>
    @else
        <div>
            <div class="clearfix">
                <div class="icon-container-alert l-5">
                    <i class="fas fa-exclamation-triangle fa-20 center"></i>
                </div>
                <div class="p-description l-5">
                    <p>A sua página ( <span class="name-partner" id="partner">{{$dados['nome_pag']}}</span>) será eliminada dentro de 2 meses. Caso queira que isso não aconteça, peça para que a sua parceira elimine ou anule essa acção. Só <span class="name-partner" id="partner">{{$dados['quem_eliminou']}}</span> pode fazer isso porque foi ele quem quis eliminar o vosso relacionamento</p>
                </div>
            </div>
            <div class="nav-button clearfix">
                <div class="button-container r-5">
                    <button class="cancel-delete" style="background-color: #3490dc;">Pedir Anulação</button>
                </div>
            </div>
        </div>
    @endif
</div>
@stop

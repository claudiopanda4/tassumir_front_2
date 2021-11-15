@extends('layouts.app')

@section('content')
<div class="main" id="main-container-relationship">
    <div class="card">
        <div class="clearfix">
            <div class="clearfix couple-profile-container l-5">
                <div class="couple-profile-img couple-1 circle" id="">
                  <?php if ($account_name[0]->foto == null || $account_name[0]->foto == "null" || $account_name[0]->foto == NULL || $account_name[0]->foto == "NULL" || $account_name[0]->foto == "" || $account_name[0]->foto == " "): ?>
                        <i class="fas fa-user center" style="font-size: 30px; color: #ccc;"></i>
                    <?php else: ?>
                      <img class="img-profile img-full circle" src="{{asset('storage/img/users') . '/' . $account_name[0]->foto}}">
                    <?php endif ?>
                </div>
                <div class="couple-profile-img couple-2 circle" id="">
                <?php if ($pedido[0]['foto'] == null || $pedido[0]['foto'] == "null" || $pedido[0]['foto'] == NULL || $pedido[0]['foto'] == "NULL" || $pedido[0]['foto'] == "" || $pedido[0]['foto'] == " "): ?>
                      <i class="fas fa-user center" style="font-size: 30px; color: #ccc;"></i>
                    <?php else: ?>
                      <img class="img-profile img-full circle" src="{{asset('storage/img/users') . '/' . $pedido[0]['foto']}}">
                    <?php endif ?>
                </div>
            </div>
            <div class="l-5 info-invite-relationship">
                <p style="margin-top: 10px;">Sua solicitação para registar o seu <span>{{$pedido[0]['tipo']}}</span> foi aceite pelo {{$pedido[0]['nome']}}</p>
                <p>Para poder tornar público na rede social "tassumir" e assim criar a página do casal, você deve fazer o pagamento de <span>2.500 Kz</span> para a conta Tassumir e enviar o comprovativo para o Tassumir</p>
            </div>
            <div>
                <div class="options-invited clearfix">
                    <label class="l-5" for="target-proof">
                        <div class="label-invited">
                            <!--<h2 class="accept">Aceitar</h2>-->
                            <input type="hidden" name="not1" id="not1">
                            <h2 class="send_proof" id="{{$pedido[0]['pedido_relacionamento_id']}}">Enviar comprovativo</h2>
                        </div>
                    </label>
                    <a href="" class="l-5 denied">Pedir que o outro lado pague</a>
                </div>
            </div>
        </div>
        <!--<div class="clearfix couple-container">
            <div class="clearfix couple-profile-container l-5">
                <div class="couple-profile-img couple-1 circle" id="">
                    <?php if (true): ?>
                        <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="img-full circle">
                    <?php else: ?>

                    <?php endif ?>
                </div>
                <div class="couple-profile-img couple-2 circle" id="">
                    <?php if (true): ?>
                        <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="img-full circle">
                    <?php else: ?>

                    <?php endif ?>
                </div>
            </div>
            <div class="l-5 info-invite-relationship">
                <p style="margin-top: 10px;">Seu Registo de Noivado, foi aceite e registrado pela Plataforma. Parabéns</p>
            </div>
            <div>
                <div class="options-invited clearfix">
                    <a href="" class="l-5 denied">Ir à Página do casal</a>
                </div>
            </div>
        </div>
        <div class="clearfix couple-container">
            <div class="clearfix couple-profile-container l-5">
                <div class="couple-profile-img couple-1 circle" id="">
                    <?php if (true): ?>
                        <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="img-full circle">
                    <?php else: ?>

                    <?php endif ?>
                </div>
                <div class="couple-profile-img couple-2 circle" id="">
                    <?php if (true): ?>
                        <img src='{{asset("storage/img/users/anselmoralph.jpg")}}' class="img-full circle">
                    <?php else: ?>

                    <?php endif ?>
                </div>
            </div>
            <div class="l-5 info-invite-relationship">
                <p style="margin-top: 10px;">Infelizmente, o seu comprovativo de pagamento, não foi confirmado. Se acha que isto é um erro, solicite uma nova confirmação</p>
            </div>
            <div>
                <div class="options-invited clearfix">
                    <a href="" class="l-5 denied">Solicitar uma nova confirmação</a>
                </div>
            </div>
        </div>-->

    </div>
</div>
<script>
    $(document).ready(function () {

    });
</script>
@stop

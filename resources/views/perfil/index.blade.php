@extends('layouts.app')

@section('content')
<div class="main" id="main-profile">
    <header class="card br-10 card-flex">
        <div id="img-profile-container" class="circle">
            @if ($account_name[0]->foto == null || $account_name[0]->foto == "null" || $account_name[0]->foto == NULL || $account_name[0]->foto == "NULL" || $account_name[0]->foto == "" || $account_name[0]->foto == " ")
                <i class="fas fa-user center" style="font-size: 50px; color: #ccc;"></i>
            @else
                <img class="img-profile img-full circle" src="{{asset('storage/img/users') . '/' . $account_name[0]->foto}}">
            @endif;
            @if ($account_name[0]->uuid == $conta_logada[0]->uuid)
            <label for="target-profile-cover">
                <div class="add-edit-profile circle">
                    <i class="fas fa-plus center" style="font-size: 10px;"></i>
                </div>
            </label>
            @endif;
        </div>
        <div class="" id="card-ident">
            <div id="ident-profile">
                <h1 class="profile-name">{{$account_name[0]->nome}} {{$account_name[0]->apelido}}</h1>
                    <div class="invite-icon circle">
                        <a href=""><i class="fas fa-user-plus fa-16 center" style="font-size: 14px;"></i></a>
                    </div>
            </div>
            <ul class="profile-follow profile-item-center">
                <li class="statistics-profile">
                    <h2 style="justify-content: center; font-weight: bolder; font-size: 14px;">{{$perfil[0]['qtd_ps']}}</h2>
                    <h2 style="justify-content: center; font-size: 11.5px;">Seguindo</h2>
                    <?php if ($account_name[0]->uuid == $conta_logada[0]->uuid): ?>
                    <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile">Editar Perfil</h3></a>
                  <?php endif; ?>
                </li>
                <li class="statistics-profile">
                    <h2 style="justify-content: center; font-weight: bolder; font-size: 14px;">{{$perfil[0]['qtd_like']}}</h2>
                    <h2 style="justify-content: center; font-size: 11.5px;">Curtiu</h2>
                    <?php if ($account_name[0]->uuid == $conta_logada[0]->uuid): ?>
                    <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile">Editar Perfil</h3></a>
                  <?php endif; ?>
                </li>
                <li class="statistics-profile">
                    <h2 style="justify-content: center; font-weight: bolder; font-size: 14px;">{{$perfil[0]['qtd_guardados']}}</h2>
                    <h2 style="justify-content: center; font-size: 11.5px;">Guardados</h2>
                    <?php if ($account_name[0]->uuid == $conta_logada[0]->uuid): ?>
                    <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile">Editar Perfil</h3></a>
                  <?php endif; ?>
                </li>
            </ul>
            <div id="option-profile-no-own">
            <?php if ($account_name[0]->uuid != $conta_logada[0]->uuid ): ?>
            <div>
                <?php if ($account_name[0]->uuid != $conta_logada[0]->uuid && $perfil[0]['verificacao_page'] == 0 && $perfil[0]['verificacao_page1'] == 0  && $perfil[0]['verificacao_page2'] == 0 && $perfil[0]['verificacao_page3'] == 0  ): ?>

                    <?php if ($perfil[0]['verificacao_pedido'] == 1 ): ?>
                    <div class="follwing-btn-container options-profile-btn" style="margin: 5px auto 10px;">
                        <label for="target-invited-relationship" style="width: 100%;">
                            <div class="follwing-btn follwing-btn-pop-up" >
                                <h2>Pendente</h2>
                            </div>
                        </label>
                        <button class="btn-message">
                            <i class="fa-solid fa-message fa-24 fa-option center"></i>
                        </button>
                    </div>
                    <?php elseif ($perfil[0]['verificacao_pedido1'] == 1 ): ?>
                        <div class="follwing-btn-container options-profile-btn" style="margin: 5px auto 10px;">
                            <label for="target-invited-relationship" style="width: 100%;">
                                <div class="follwing-btn follwing-btn-pop-up" >
                                    <h2>Aceitar</h2>
                                </div>
                            </label>
                        </div>
                    <?php else: ?>
                    <div class="follwing-btn-container options-profile-btn" style="margin: 5px auto 10px;">
                        <label for="target-invited-relationship" style="width: 100%;">
                            <div class="follwing-btn follwing-btn-pop-up" >
                                <h2>Assumir</h2>
                            </div>
                        </label>
                        <form action="{{route('message.index')}}">
                            <button class="btn-message">
                                <i class="far fa-comment-dots fa-24 fa-option center"></i>
                            </button>
                        </form>

                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            </div>
            <?php if ($account_name[0]->uuid == $conta_logada[0]->uuid): ?>
                <div class="options-profile-btn options-profile-btn-center profile-item-center">
                    <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile-mobile">Editar Perfil</h3></a>
                </div>
                <div>
                    <a href="">
                        <div class="container-logout">
                            <a href="{{route('account.logout')}}"><h1 class="btn-a-default">Terminar Sessão</h1></a>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
                    <!--<?php //if ($account_name[0]->uuid == $conta_logada[0]->uuid): ?>
                    <div class="options-profile-btn options-profile-btn-center profile-item-center">
                        <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile-mobile">Editar Perfil</h3></a>
                    </div>
                    <div>
                        <a href="">
                            <div class="container-logout">
                                <a href="{{route('account.logout')}}"><h1 class="btn-a-default">Terminar Secção</h1></a>
                            </div>
                        </a>
                    </div>
                    <?php //endif; ?>-->
          @if( $perfil[0]['verificacao_relac'] == 1)
            <div class="inform-profile">
                <h3>{{$perfil[0]['relac']}}<span>{{$perfil[0]['relac1']}}</span></h3>
            </div>
            @endif
            <div class="inform-profile">
                <p>{{$account_name[0]->descricao}}</p>
            </div>
        </div>
    </header>
<div class="card br-10 card-page" id="card-profile-option">
            <nav class="option-profile-menu">
                <ul class="" id="ul-profile">
                    <li><a href="?post-container-post=images"><i class="far fa-images fas-32 center icon-hover-option-profile" style="font-size: 22px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=video"><i class="far fa-play-circle center icon-hover-option-profile" style="font-size: 22px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=post"><i class="fas fa-newspaper center icon-hover-option-profile" style="font-size: 22px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=saved"><i class="far fa-bookmark center icon-hover-option-profile" style="font-size: 18px;"></i><h1 class="menu-option-profile"></h1></a></li>
                </ul>
            </nav>

            <?php if (isset($_GET['post-container-post'])): ?>
                <?php if ($_GET['post-container-post'] == 'post'): ?>
                <div class="post-img-container-page post-page-container">
                    <?php foreach ($gostos as $key => $value): ?>
                      @if($value['formato']==3)
                        <div class="img-post">
                              <div class="post">
                                  <header class="clearfix">
                                      <div class="first-component clearfix l-5">
                                        @if( !($value['foto_page'] == null) )
                                            <div class="page-cover circle l-5">
                                                <img class="img-full circle" src="{{ asset('storage/img/page/') . '/' . $value['foto_page'] }}">
                                            </div>
                                        @else
                                            <div class="page-cover circle l-5">
                                                <img class="img-full circle" src="{{asset('storage/img/page/unnamed.jpg')}}">
                                            </div>
                                        @endif;
                                          <div class="page-identify l-5 clearfix">
                                              <a href="{{route('couple.page1', $value['page_uuid']) }}"><h1 class="">{{$value['nome_page']}}</h1></a>
                                              <div class="info-post clearfix">
                                                  <span class="time-posted l-5">50 min</span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="last-component clearfix r-5">
                                          <label for="more-option-1">
                                              <i class="fas fa-ellipsis-h fa-15 fa-option"></i>
                                          </label>
                                          <input type="checkbox" name="" id="more-option-1" class="hidden">
                                          <ul class="clearfix more-option-post">
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
                                          <p>{{$gostos[$key]['post']}}</p>
                                      </div>
                                  </div>
                      </div>
                    </div>
                   @endif;
                    <?php endforeach ?>
                </div>
                <?php endif; ?>
                <?php if ($_GET['post-container-post'] == 'video'): ?>
                <div class="post-video-container-page post-page-container">
                    <?php foreach ($gostos as $key => $value): ?>
                      <?php if ($gostos[$key]['formato']==1): ?>
                    <div class="img-post">
                        <video>
                            <source src="{{asset('storage/video/page/') . '/' . $gostos[$key]['file']}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                      <?php endif; ?>
                    <?php endforeach ?>
                </div>
                <?php endif; ?>
                <?php if ($_GET['post-container-post'] == 'images'): ?>
                <div class="post-img-container-page post-page-container">
                    <?php foreach ($gostos as $key => $value): ?>
                      <?php if ($gostos[$key]['formato']==2): ?>
                    <div class="img-post">
                        <img src="{{asset('storage/img/page/') . '/' . $gostos[$key]['file']}}" class="img-full">
                    </div>
                      <?php endif; ?>
                    <?php endforeach ?>
                </div>
                <?php endif; ?>
                <?php if ($_GET['post-container-post'] == 'saved'): ?>

                <?php endif; ?>
            <?php else: ?>
            <div class="post-img-container-page post-page-container">
                <?php foreach ($gostos as $key => $value): ?>
                  <?php if ($gostos[$key]['formato']==2): ?>
                <div class="img-post">
                    <img src="{{asset('storage/img/page/') . '/' . $gostos[$key]['file']}}" class="img-full">
                </div>
                  <?php endif; ?>
                <?php endforeach ?>
            </div>
            <?php endif; ?>
</div>
</div>
@stop

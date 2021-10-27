@extends('layouts.app')

@section('content')
<div class="main" id="main-profile">
    <header class="card br-10 card-flex">
    <div id="img-profile-container" class="circle">
        @if ($profile_picture == null || $profile_picture == "null" || $profile_picture == NULL || $profile_picture == "NULL" || $profile_picture == "" || $profile_picture == " ")
            <i class="fas fa-user center" style="font-size: 50px; color: #ccc;"></i>
        @else
            <img class="img-profile img-full circle" src="{{asset('storage/img/users') . '/' . $profile_picture}}">
        @endif
        <label for="target-profile-cover">
            <div class="add-edit-profile circle">
                <i class="fas fa-plus center" style="font-size: 10px;"></i>
            </div>
        </label>
    </div>
    <div class="" id="card-ident">
        <div id="ident-profile">
            <h1 class="profile-name">{{$account_name[0]->nome}} {{$account_name[0]->apelido}}</h1>
                <div class="invite-icon circle">
                    <a href=""><i class="fas fa-user-plus fa-16 center" style="font-size: 14px;"></i></a>
                </div>
        </div>
        <?php if (false): ?>
            <h1 class="profile-name">@_{{$account_name[0]->nome}}_{{$account_name[0]->apelido}}</h1>
        <?php endif ?>
            <div>
            <?php if ($account_name[0]->uuid != $conta_logada[0]->uuid ): ?>
            <div class="follwing-btn-container options-profile-btn" style="margin: 5px auto 10px;">
                <label for="target-invited-relationship" style="width: 100%;">
                    <div class="follwing-btn follwing-btn-pop-up" >
                        <h2>Assumir</h2>
                    </div>
                </label>
                <?php if (false): ?>
                    <label for="target-invited-relationship">
                        <button type="submit" class="follwing-btn follwing-btn-pop-up " id="btnteste">
                            Assumir
                        </button>
                    </label>
                <?php endif ?>
            </div>
            <?php endif; ?>
            <?php if ($account_name[0]->uuid == $conta_logada[0]->uuid): ?>

            <div class="options-profile-btn options-profile-btn-center profile-item-center">
                <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile-mobile">Editar Perfil</h3></a>
            </div>

                <div class="options-profile-btn">
                    <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile-mobile">Editar Perfil</h3></a>
                </div>
            <?php endif; ?>
        </div>
        <ul class="profile-follow profile-item-center">
            <li class="statistics-profile">
                <h2>Seguindo {{$perfil[0]['qtd_ps']}}</h2>
                <?php if ($account_name[0]->uuid == $conta_logada[0]->uuid): ?>
                <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile">Editar Perfil</h3></a>
              <?php endif; ?>
            </li>
            <li class="statistics-profile">
                <h2>Curtiu {{$perfil[0]['qtd_ps']}}</h2>
                <?php if ($account_name[0]->uuid == $conta_logada[0]->uuid): ?>
                <a href="{{route('account.profile.edit', $conta_logada[0]->uuid)}}"><h3 class="edit-profile">Editar Perfil</h3></a>
              <?php endif; ?>
            </li>
        </ul>
        <div class="inform-profile">
            <h3>Namorado de <span>Ana Joyce</span></h3>
        </div>
        <div class="inform-profile">
            <p>{{$account_name[0]->descricao}}</p>
        </div>
    </div>
</header>
<div class="card br-10 card-page" id="card-profile-option">
            <nav class="option-profile-menu">
                <ul class="" id="ul-profile">
                    <li><a href="?post-container-post=images"><i class="far fa-images fas-32 center icon-hover-option-profile" style="font-size: 32px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=video"><i class="far fa-play-circle center icon-hover-option-profile" style="font-size: 32px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=post"><i class="fas fa-newspaper center icon-hover-option-profile" style="font-size: 32px;"></i><h1 class="menu-option-profile"></h1></a></li>
                    <li><a href="?post-container-post=saved"><i class="far fa-bookmark center icon-hover-option-profile" style="font-size: 28px;"></i><h1 class="menu-option-profile"></h1></a></li>
                </ul>
            </nav>
            <?php
                $posts = [

                ];
            ?>
            <?php if (isset($_GET['post-container-post'])): ?>
                <?php if ($_GET['post-container-post'] == 'post'): ?>
                <div class="post-img-container-page post-page-container">
                    <?php foreach ($gostos as $key => $value): ?>
                      <div class="img-post">
                      <p><h5>  {{$gostos[$key]['post']}}   </h5></p>
                      </div>

                    <?php endforeach ?>
                </div>
                <?php endif ?>
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
                <?php endif ?>
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
                <?php endif ?>
                <?php if ($_GET['post-container-post'] == 'saved'): ?>

                <?php endif ?>
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
            <?php endif ?>
        </div>
<div>
    <a href="">
        <div class="container-logout">
            <a href="{{route('account.logout')}}"><h1 class="btn-a-default">Terminar Secção</h1></a>
        </div>
    </a>
</div>
</div>
@stop

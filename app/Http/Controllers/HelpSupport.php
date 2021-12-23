<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpSupport extends Controller
{
    public function index(){
      $controll = new AuthController();
       $dates = $controll->default_();
      $account_name = $dates['account_name'];
      $checkUserStatus = $dates['checkUserStatus'];
      $profile_picture = $dates['profile_picture'];
      $isUserHost = $dates['isUserHost'];
      $hasUserManyPages = $dates['hasUserManyPages'];
      $allUserPages = $dates['allUserPages'];
      $page_content = $dates['page_content'];
      $conta_logada = $dates['conta_logada'];
      $notificacoes = $dates['notificacoes'];
      $notificacoes_count = $dates['notificacoes_count'];
      $paginasSeguidas = $dates['paginasSeguidas'];
      $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
      $dadosSeguida = $dates['dadosSeguida'];
      $page_current = 'relationship_request';
        return view('pagina.help_support',compact('account_name','checkUserStatus','profile_picture','isUserHost','hasUserManyPages','allUserPages','conta_logada','page_content','notificacoes','notificacoes_count','paginasSeguidas','paginasNaoSeguidas','dadosSeguida','page_current'));
    }
}

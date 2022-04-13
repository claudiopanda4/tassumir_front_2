<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function index_termo(){

      return view('Termos_Politica.index_termo_politica');
    }

    public function call_terms(){


      $numero = 1;

      $resultw = array();
      $i=0;

      $result = DB::select('select t.cabecalho,t.subtitulo, t.corpo from termos_usos t where (tipo_de_termo = ?)', [$numero]);

        foreach($result as $info){

          $resultw[$i]['cabecalho'] = $info->cabecalho;
          $resultw[$i]['corpo'] = $info->corpo;
          $resultw[$i]['subtitulo'] = $info->subtitulo;

          $i++;
          
        }

        return view('Termos_Politica.termos',compact('resultw'));

    }

    public function call_privacy(){

       $numero = 2;

      $resultw = array();
      $i=0;

      $result = DB::select('select t.cabecalho,t.subtitulo, t.corpo from termos_usos t where (tipo_de_termo = ?)', [$numero]);

        foreach($result as $info){

          $resultw[$i]['cabecalho'] = $info->cabecalho;
          $resultw[$i]['corpo'] = $info->corpo;
          $resultw[$i]['subtitulo'] = $info->subtitulo;

          $i++;
          
        }

        return view('Termos_Politica.privacidade',compact('resultw'));
  
    }

      public function call_term_service(){

       $numero = 4;

      $resultw = array();
      $i=0;

      $result = DB::select('select t.cabecalho,t.subtitulo, t.corpo from termos_usos t where (tipo_de_termo = ?)', [$numero]);

        foreach($result as $info){

          $resultw[$i]['cabecalho'] = $info->cabecalho;
          $resultw[$i]['corpo'] = $info->corpo;
          $resultw[$i]['subtitulo'] = $info->subtitulo;

          $i++;
          
        }

        return view('Termos_Politica.termos_de_servico',compact('resultw'));
  
    }
    

      public function publicidade(){

       $numero = 3;

      $resultw = array();
      $i=0;

      $result = DB::select('select t.cabecalho,t.subtitulo, t.corpo from termos_usos t where (tipo_de_termo = ?)', [$numero]);

        foreach($result as $info){

          $resultw[$i]['cabecalho'] = $info->cabecalho;
          $resultw[$i]['corpo'] = $info->corpo;
          $resultw[$i]['subtitulo'] = $info->subtitulo;

          $i++;
          
        }

        return view('Termos_Politica.publicidade',compact('resultw'));
  
    }

      public function comunidade(){

       $numero = 5;

      $resultw = array();
      $i=0;

      $result = DB::select('select t.cabecalho,t.subtitulo, t.corpo from termos_usos t where (tipo_de_termo = ?)', [$numero]);

        foreach($result as $info){

          $resultw[$i]['cabecalho'] = $info->cabecalho;
          $resultw[$i]['corpo'] = $info->corpo;
          $resultw[$i]['subtitulo'] = $info->subtitulo;

          $i++;
          
        }

        return view('Termos_Politica.comunidade',compact('resultw'));
  
    }
}

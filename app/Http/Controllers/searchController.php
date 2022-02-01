<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{


public function index($val){
  $controll = new AuthController();
   $dates = $controll->default_();  $profile_picture = $dates['profile_picture'];
  $conta_logada = $dates['conta_logada'];
  $notificacoes = $dates['notificacoes'];
  $notificacoes_count = $dates['notificacoes_count'];


    return view('Pesquisas.allSearch',compact('val','notificacoes_count','notificacoes','conta_logada','profile_picture'));
}


public function index1(){
  $val='';
  $controll = new AuthController();
   $dates = $controll->default_();  $profile_picture = $dates['profile_picture'];
  $conta_logada = $dates['conta_logada'];
  $notificacoes = $dates['notificacoes'];
  $notificacoes_count = $dates['notificacoes_count'];


    return view('Pesquisas.allSearch',compact('val','notificacoes_count','notificacoes','conta_logada','profile_picture'));
}



  public function peoplesSearch($val){
    $controll = new AuthController();
     $dates = $controll->default_();    $profile_picture = $dates['profile_picture'];
    $conta_logada = $dates['conta_logada'];
    $notificacoes = $dates['notificacoes'];
    $notificacoes_count = $dates['notificacoes_count'];
        return view('Pesquisas.peoples', compact('val','notificacoes_count','notificacoes','conta_logada','profile_picture'));

    }

    public function peoplesSearch1(){
      $val='';
      $controll = new AuthController();
       $dates = $controll->default_();    $profile_picture = $dates['profile_picture'];
      $conta_logada = $dates['conta_logada'];
      $notificacoes = $dates['notificacoes'];
      $notificacoes_count = $dates['notificacoes_count'];
          return view('Pesquisas.peoples', compact('val','notificacoes_count','notificacoes','conta_logada','profile_picture'));

      }

  public function pagesSearch($val){
    $controll = new AuthController();
     $dates = $controll->default_();    $profile_picture = $dates['profile_picture'];
    $conta_logada = $dates['conta_logada'];
    $notificacoes = $dates['notificacoes'];
    $notificacoes_count = $dates['notificacoes_count'];
        return view('Pesquisas.pages', compact('val','notificacoes_count','notificacoes','conta_logada','profile_picture'));

    }

  public function publicationsSearch($val){
    $controll = new AuthController();
     $dates = $controll->default_();    $profile_picture = $dates['profile_picture'];
    $conta_logada = $dates['conta_logada'];
    $notificacoes = $dates['notificacoes'];
    $notificacoes_count = $dates['notificacoes_count'];
        return view('Pesquisas.publications', compact('val','notificacoes_count','notificacoes','conta_logada','profile_picture'));

    }

    public function pagesSearch1(){
      $val='';
      $controll = new AuthController();
       $dates = $controll->default_();    $profile_picture = $dates['profile_picture'];
      $conta_logada = $dates['conta_logada'];
      $notificacoes = $dates['notificacoes'];
      $notificacoes_count = $dates['notificacoes_count'];
          return view('Pesquisas.pages', compact('val','notificacoes_count','notificacoes','conta_logada','profile_picture'));

      }

    public function publicationsSearch1(){
      $val='';
      $controll = new AuthController();
       $dates = $controll->default_();    $profile_picture = $dates['profile_picture'];
      $conta_logada = $dates['conta_logada'];
      $notificacoes = $dates['notificacoes'];
      $notificacoes_count = $dates['notificacoes_count'];
          return view('Pesquisas.publications', compact('val','notificacoes_count','notificacoes','conta_logada','profile_picture'));

      }



    /* START SIENE COD */

    private static $ajaxErrorMsg = 'erro do ajax, verifica o código';

    public function allpagepesquisa(Request $r) {
      if ($r->ajax()) {
        $default = [];
        $index = 0;
       if ($r->v == 'pag') {
         $pages = DB::table('pages')->where('nome','like','%'.$r->data.'%')->where('estado_pagina_id', 1)->limit(4)->get();

         foreach ($pages as $valor) {
             $default[$index] = $valor;
             $index++;
         }
        return response()->json($default);
       } else {
        return response()->json(Self::$ajaxErrorMsg);
       }
      }
    }


    public function peoplepesquisa(Request $r)
    {
      try {
        if ($r->ajax()) {
          $default = [];
          $index = 0;

          if (Self::checkAjaxValueType($r->val) == 'espec') {

            if ($r->val == 'sol') {

                $conta = DB::table('contas')->where('nome', 'like', '%'.$r->data.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)
                ->orwhere('apelido', 'like', '%'.$r->data.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)->limit(4)->get();

                foreach ($conta as $valor) {
                  if ($valor->estado_civil_id == 1) { // 1 : por ser o id do est_civil solteiro na tabela conta
                    $default[$index] = $valor;
                    $index++;
                  }
                }

            } else if ($r->val == 'nam') {

                $conta = DB::table('contas')->where('nome', 'like', '%'.$r->data.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)
                ->orwhere('apelido', 'like', '%'.$r->data.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)->limit(4)->get();

                foreach ($conta as $valor) {
                  if ($valor->estado_civil_id == 2) { // 1 : por ser o id do est_civil namorando na tabela conta
                    $default[$index] = $valor;
                    $index++;
                  }
                }

            } else if ($r->val == 'cas') {

                $conta = DB::table('contas')->where('nome', 'like', '%'.$r->data.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)
                ->orwhere('apelido', 'like', '%'.$r->data.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)->limit(4)->get();

                foreach ($conta as $valor) {
                  if ($valor->estado_civil_id == 3) { // 1 : por ser o id do est_civil casal na tabela conta
                    $default[$index] = $valor;
                    $index++;
                  }
                }

            }
            return response()->json($default);

          } else {
            return response()->json(Self::$ajaxErrorMsg);
          }

        }
      } catch (Exception $ex) {
        dd($ex);
      }
    }


    private static function checkAjaxValueType($v)
    {
      return ($v == 'sol' || $v == 'cas' || $v == 'nam' || $v == 'pag' || $v == 'apr' || $v == 'vma') ? 'espec' : '';
    }

    private static function searchByEstado($r)
    {

    }

    /* END SIENE COD */

  public function pessoapesquisa(Request $request) {
        if($request->ajax()){


            if($request->v==1){
              $conta = DB::table('contas')->where('nome', 'like', '%'.$request->dados.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)
              ->orwhere('apelido', 'like', '%'.$request->dados.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)->limit(4)->get();
            }else {
              $conta = DB::table('contas')->where('nome', 'like', '%'.$request->dados.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)
              ->orwhere('apelido', 'like', '%'.$request->dados.'%')->where('tipo_contas_id','<>', 1)->where('estado_conta_id', 1)->limit(10)->get();
            }


            $data = $conta;
            if(count($data)>0){
              $output['valor']=$data;
              foreach ($data as $valorConta) {

              }

            }else{
              $output['valor']='Sem Resultado';
            }

            return response()->json($output);

        }
      }







  public function paginapesquisa(Request $request){

        if($request->ajax()){

          if($request->v==1){
              $data= DB::table('pages')->where('nome','like','%'.$request->dados.'%')->where('estado_pagina_id', 1)->limit(4)->get();
            }else {
              $data= DB::table('pages')->where('nome','like','%'.$request->dados.'%')->where('estado_pagina_id', 1)->limit(10)->get();
            }

            if(count($data)>0){
              $output['valor']=$data;
            }else{
              $output['valor']='Sem Resultado';
            }

         return response()->json($output);
        }


      }

  public function postpesquisa(Request $request){

      if($request->ajax()){
        if($request->v==1){
          $data1= DB::table('posts')->where('descricao','like','%'.$request->dados.'%')->where('estado_post_id', 1)->limit(4)
          ->get();
        }else {
          $data1= DB::table('posts')->where('descricao','like','%'.$request->dados.'%')->where('estado_post_id', 1)->limit(10)
          ->get();
          }


          for ($i=0; $i < sizeof($data1); $i++) {
            $data2=  DB::select('select * from pages where page_id = ?', [$data1[$i]->page_id]);
            $data[$i]['post_id']=$data1[$i]->post_id ;
            $data[$i]['post']=$data1[$i]->descricao ;
            $data[$i]['nome_page']=$data2[0]->nome ;
            $data[$i]['page_foto']=$data2[0]->foto ;
            $data[$i]['post_foto']=$data1[$i]->file ;
            $data[$i]['formato']=$data1[$i]->formato_id;

          }

          if(count($data)>0){
            $output['valor']=$data;
          }else{
            $output['valor']='Sem Resultado';
          }

          return response()->json($output);
        }

      }

}

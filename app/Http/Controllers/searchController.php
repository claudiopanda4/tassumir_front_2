<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


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

      /*pesquisa otimizada*/

      public function people_search_final(Request $request) {
        try {
          if($request->ajax()){
              $conta =[];

              if($request->v==1){
                $conta =  DB::select('select c.conta_id,c.uuid,c.nome,c.apelido,c.foto,c.genero,(select count(*) from pages as pg where pg.conta_id_a=c.conta_id and pg.tipo_page_id=1 || pg.conta_id_b=c.conta_id and pg.tipo_page_id=1)as verify_page from contas as c where  c.tipo_contas_id <> 1 and c.estado_conta_id = 1 and c.nome LIKE "%'.$request->dados.'%" || c.tipo_contas_id <> 1 and c.estado_conta_id = 1 and c.apelido LIKE "%'.$request->dados.'%" limit 4');
              }else {
                $conta =  DB::select('select c.conta_id,c.uuid,c.nome,c.apelido,c.foto,c.genero,(select count(*) from pages as pg where pg.conta_id_a=c.conta_id and pg.tipo_page_id=1 || pg.conta_id_b=c.conta_id and pg.tipo_page_id=1)as verify_page from contas as c where  c.tipo_contas_id <> 1 and c.estado_conta_id = 1 and c.nome LIKE "%'.$request->dados.'%" and conta_id > ?|| c.tipo_contas_id <> 1 and c.estado_conta_id = 1 and c.apelido LIKE "%'.$request->dados.'%" and conta_id > ? limit 10',[$request->id]);
              }

              return response()->json($conta);

          }
        } catch (\Exception $e) {

        }
          }

      public function page_search_final(Request $request){
          try {
            if($request->ajax()){
              $id = Auth::user()->conta_id;

              if($request->v==1){
                $pages= DB::select('select pg.nome,pg.uuid, pg.page_id, pg.foto,pg.descricao, (select count(*) from seguidors where identificador_id_seguida = (select identificador_id from identificadors where id=pg.page_id and tipo_identificador_id = 2) and identificador_id_seguindo = (select identificador_id from identificadors where id=? and tipo_identificador_id = 1)) as segui from pages as pg where pg.estado_pagina_id =1 and pg.nome like "%'.$request->dados.'%" || pg.estado_pagina_id =1 and pg.descricao like "%'.$request->dados.'%" limit 4',[$id]);
                }else {
                  $pages= DB::select('select pg.nome,pg.uuid, pg.page_id, pg.foto,pg.descricao, (select count(*) from seguidors where identificador_id_seguida = (select identificador_id from identificadors where id=pg.page_id and tipo_identificador_id = 2) and identificador_id_seguindo = (select identificador_id from identificadors where id=? and tipo_identificador_id = 1)) as segui from pages as pg where pg.estado_pagina_id =1 and pg.nome like "%'.$request->dados.'%" and page_id>? || pg.estado_pagina_id =1 and pg.descricao like "%'.$request->dados.'%" and page_id>? limit 10',[$id,$request->page_id]);
                }

             return response()->json($pages);
            }


        } catch (\Exception $e) {

        }


          }

      public function post_search_final(Request $request){
        try {

                    if($request->ajax()){
                      $id = Auth::user()->conta_id;
                      if($request->v==1){
                        $posts= DB::select('select p.post_id,p.uuid,p.descriscao,p.file,p.formato_id,p.created_at,pg.uuid as page_uuid, pg.nome,pg.foto,(select count(*) from seguidors where identificador_id_seguida = (select identificador_id from identificadors where id=pg.page_id and tipo_identificador_id = 2) and identificador_id_seguindo = (select identificador_id from identificadors where id=? and tipo_identificador_id = 1)) as segui from posts as p inner join pages as pg on p.page_id=pg.page_id where  pg.estado_pagina_id=1 and  p.estado_post_id = 1 and p.descricao like "%'.$request->dados.'%" ', [$id]);
                      }else {
                        $posts= DB::select('select p.post_id,p.uuid,p.descriscao,p.file,p.formato_id,p.created_at,pg.uuid as page_uuid, pg.nome,pg.foto,(select count(*) from seguidors where identificador_id_seguida = (select identificador_id from identificadors where id=pg.page_id and tipo_identificador_id = 2) and identificador_id_seguindo = (select identificador_id from identificadors where id=? and tipo_identificador_id = 1)) as segui from posts as p inner join pages as pg on p.page_id=pg.page_id where  pg.estado_pagina_id=1 and  p.estado_post_id = 1 and p.descricao like "%'.$request->dados.'%" and p.post_id>? ', [$id,$request->post_id]);
                        }

                        return response()->json($posts);
                      }

        } catch (\Exception $e) {

        }

          }

      /*fim da pesquisa otimizada*/
}

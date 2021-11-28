<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
public function default_(){
    $auth = new AuthController();
    $conta_logada = $auth->defaultDate();
    $profile_picture = AuthController::profile_picture($conta_logada[0]->conta_id);
    $notificacoes=array();
    $a=0;
    $nome=array();
    $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
    $notificacoes_aux=DB::select('select * from notifications where identificador_id_receptor = ?', [$aux1[0]->identificador_id]);
    if (sizeof($notificacoes_aux)>0) {
      foreach ($notificacoes_aux as $key) {
        if($key->id_state_notification!= 3){$aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_causador ]);
        if ($aux2[0]->tipo_identificador_id == 1) {
          $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
          $nome[0]= $conta[0]->nome ;
          $nome[0].= " ";
          $nome[0].= $conta[0]->apelido;
          $nome[1]= $conta[0]->foto;
          $nome[2] =1;
        }elseif ($aux2[0]->tipo_identificador_id == 2) {
          $page= DB::select('select * from pages where page_id = ?', [$aux2[0]->id]);
            $nome[0] =$page[0]->nome;
            $nome[1] =$page[0]->foto;
            $nome[2] =2;
        }
        switch ($key->id_action_notification) {
          case 1:
            $notificacoes[$a]['notificacao']=$nome[0] ;
            $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
            $notificacoes[$a]['tipo']=1;
            $notificacoes[$a]['id']=$key->identificador_id_destino;
            $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
            $post =  DB::select('select * from posts where post_id = ?', [$aux_link[0]->id]);
            $notificacoes[$a]['link']=$post[0]->uuid;
            break;
          case 2:
              $notificacoes[$a]['notificacao']=$nome[0];
              $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
              $notificacoes[$a]['tipo']=2;
              $notificacoes[$a]['id']=$key->identificador_id_destino;
              $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
              $post =  DB::select('select * from posts where post_id = ?', [$aux_link[0]->id]);
              $notificacoes[$a]['link']=$post[0]->uuid;
              break;
            case 3:
              $notificacoes[$a]['notificacao']=$nome[0];
              $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
              $notificacoes[$a]['tipo']=3;
              $notificacoes[$a]['id']=$key->identificador_id_destino;
                break;
              case 4:
              $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
            if (sizeof($aux)){  $tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
              if (sizeof($tipo)){  $tipos=DB::select('select * from tipo_relacionamentos where tipo_relacionamento_id = ?', [$tipo[0]->tipo_relacionamento_id]);
              $notificacoes[$a]['notificacao']=$nome[0];
              $notificacoes[$a]['notificacao'].=" quer assumir o vosso ";
              $notificacoes[$a]['notificacao'].=$tipos[0]->tipo_relacionamento;
              $notificacoes[$a]['tipo']=4;
              $notificacoes[$a]['id']=$tipo[0]->uuid;}
            }
                  break;
                case 5:
                $notificacoes[$a]['notificacao']=$nome[0];
                $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                $notificacoes[$a]['tipo']=5;
                $notificacoes[$a]['id']=$key->identificador_id_destino;
                $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                $page =  DB::select('select * from pages where page_id = ?',[$aux_link[0]->id]);
                $notificacoes[$a]['link']=$page[0]->uuid;
                    break;

                case 6:
                    $notificacoes[$a]['notificacao']=$nome[0];
                    $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                    $notificacoes[$a]['tipo']=5;
                    $notificacoes[$a]['id']=$key->identificador_id_destino;
                    $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                    $post =  DB::select('select * from posts where post_id = ?', [$aux_link[0]->id]);
                    $notificacoes[$a]['link']=$post[0]->uuid;
                        break;
               case 7:
               $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
               if (sizeof($aux)){$tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
               if (sizeof($tipo)){$notificacoes[$a]['notificacao']=$nome[0];
               $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
               $notificacoes[$a]['tipo']=7;
               $notificacoes[$a]['id']=$tipo[0]->uuid;}}
                        break;
            case 8:
                        $notificacoes[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                        $notificacoes[$a]['tipo']=8;
                        $notificacoes[$a]['id']=$key->identificador_id_destino;
                        $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                        $page =  DB::select('select * from pages where page_id = ?',[$aux_link[0]->id]);
                        $notificacoes[$a]['link']=$page[0]->uuid;
                            break;

          case 9:
                            $notificacoes[$a]['notificacao']=" o seu pedido de criação de pagina foi negado";
                            $notificacoes[$a]['tipo']=9;
                            $notificacoes[$a]['id']=$key->identificador_id_destino;
                                break;
       case 10:
                                                  $notificacoes[$a]['notificacao']=" o seu pedido de criação de pagina foi negado";
                                                  $notificacoes[$a]['tipo']=9;
                                                  $notificacoes[$a]['id']=$key->identificador_id_destino;
                                                      break;

                  case 5:
                  $notificacoes[$a]['notificacao']=$nome[0];
                  $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                  $notificacoes[$a]['tipo']=5;
                  $notificacoes[$a]['id']=$key->identificador_id_destino;
                  $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                  $page =  DB::select('select * from pages where page_id = ?',[$aux_link[0]->id]);
                  $notificacoes[$a]['link']=$page[0]->uuid;
                      break;
                  case 6:
                      $notificacoes[$a]['notificacao']=$nome[0];
                      $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                      $notificacoes[$a]['tipo']=5;
                      $notificacoes[$a]['id']=$key->identificador_id_destino;
                      $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                      $post =  DB::select('select * from posts where post_id = ?', [$aux_link[0]->id]);
                      $notificacoes[$a]['link']=$post[0]->uuid;
                          break;
                 case 7:
                 $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                 if (sizeof($aux)){$tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
                 if (sizeof($tipo)){$notificacoes[$a]['notificacao']=$nome[0];
                 $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                 $notificacoes[$a]['tipo']=7;
                 $notificacoes[$a]['id']=$tipo[0]->uuid;}}
                          break;
              case 8:
                          $notificacoes[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                          $notificacoes[$a]['tipo']=8;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                          $page =  DB::select('select * from pages where page_id = ?',[$aux_link[0]->id]);
                          $notificacoes[$a]['link']=$page[0]->uuid;
                              break;

            case 9:
            $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
            if (sizeof($aux)){$tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
            if (sizeof($tipo)){
            $notificacoes[$a]['notificacao']= "o seu pedido de criação de pagina foi negado";
            $notificacoes[$a]['tipo']=9;
            $notificacoes[$a]['id']=$tipo[0]->uuid;}}
                                  break;
         case 10:
         $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
         if (sizeof($aux)){$tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
         if (sizeof($tipo)){$notificacoes[$a]['notificacao']=$nome[0];
         $notificacoes[$a]['notificacao'].=" Pediu que você page";
         $notificacoes[$a]['tipo']=10;
         $notificacoes[$a]['id']=$tipo[0]->uuid;}}                                                        break;



        }
        $notificacoes[$a]['foto']=$nome[1];
        $notificacoes[$a]['v']=$nome[2];
        $notificacoes[$a]['id1']=$key->notification_id;

        $a++;
      }
    }
    }
    $dates = [
        "profile_picture" => $profile_picture,
        "conta_logada" => $conta_logada,
        "notificacoes" => $notificacoes,
    ];
    return $dates;
}

public function index(){
  $val='';
  $dates = $this->default_();
  $profile_picture = $dates['profile_picture'];
  $conta_logada = $dates['conta_logada'];
  $notificacoes = $dates['notificacoes'];

    return view('Pesquisas.allSearch',compact('val','notificacoes','conta_logada','profile_picture'));
}

public function index1($val){
  $dates = $this->default_();
  $profile_picture = $dates['profile_picture'];
  $conta_logada = $dates['conta_logada'];
  $notificacoes = $dates['notificacoes'];

    return view('Pesquisas.allSearch',compact('val','notificacoes','conta_logada','profile_picture'));
}

  public function peoplesSearch(){
       $val='';
       $dates = $this->default_();
       $profile_picture = $dates['profile_picture'];
       $conta_logada = $dates['conta_logada'];
       $notificacoes = $dates['notificacoes'];
        return view('Pesquisas.peoples',compact('val', 'notificacoes','conta_logada','profile_picture'));
    }

  public function pagesSearch(){
         $val='';
         $dates = $this->default_();
         $profile_picture = $dates['profile_picture'];
         $conta_logada = $dates['conta_logada'];
         $notificacoes = $dates['notificacoes'];
        return view('Pesquisas.pages',compact('val','notificacoes','conta_logada','profile_picture'));
    }

  public function publicationsSearch(){
         $val='';
         $dates = $this->default_();
         $profile_picture = $dates['profile_picture'];
         $conta_logada = $dates['conta_logada'];
         $notificacoes = $dates['notificacoes'];
        return view('Pesquisas.publications',compact('val','notificacoes','conta_logada','profile_picture'));
    }

  public function peoplesSearch1($val){
    $dates = $this->default_();
    $profile_picture = $dates['profile_picture'];
    $conta_logada = $dates['conta_logada'];
    $notificacoes = $dates['notificacoes'];
        return view('Pesquisas.peoples', compact('val','notificacoes','conta_logada','profile_picture'));
    }

  public function pagesSearch1($val){
    $dates = $this->default_();
    $profile_picture = $dates['profile_picture'];
    $conta_logada = $dates['conta_logada'];
    $notificacoes = $dates['notificacoes'];
        return view('Pesquisas.pages', compact('val','notificacoes','conta_logada','profile_picture'));
    }

  public function publicationsSearch1($val){
    $dates = $this->default_();
    $profile_picture = $dates['profile_picture'];
    $conta_logada = $dates['conta_logada'];
    $notificacoes = $dates['notificacoes'];
        return view('Pesquisas.publications', compact('val','notificacoes','conta_logada','profile_picture'));
    }



    /* START SIENE COD */

    private static $ajaxErrorMsg = 'erro do ajax, verifica o código';

    public function allpagepesquisa(Request $r) {
      if ($r->ajax()) {
        $default = [];
        $index = 0;
       if ($r->v == 'pag') {
         $pages = DB::table('pages')->where('nome','like','%'.$r->data.'%')->limit(4)->get();

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

                $conta = DB::table('contas')->where('nome', 'like', '%'.$r->data.'%')
                ->orwhere('apelido', 'like', '%'.$r->data.'%')->limit(4)->get();

                foreach ($conta as $valor) {
                  if ($valor->estado_civil_id == 1) { // 1 : por ser o id do est_civil solteiro na tabela conta
                    $default[$index] = $valor;
                    $index++;
                  }
                }

            } else if ($r->val == 'nam') {

                $conta = DB::table('contas')->where('nome', 'like', '%'.$r->data.'%')
                ->orwhere('apelido', 'like', '%'.$r->data.'%')->limit(4)->get();

                foreach ($conta as $valor) {
                  if ($valor->estado_civil_id == 2) { // 1 : por ser o id do est_civil namorando na tabela conta
                    $default[$index] = $valor;
                    $index++;
                  }
                }

            } else if ($r->val == 'cas') {

                $conta = DB::table('contas')->where('nome', 'like', '%'.$r->data.'%')
                ->orwhere('apelido', 'like', '%'.$r->data.'%')->limit(4)->get();

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
              $conta = DB::table('contas')->where('nome', 'like', '%'.$request->dados.'%')
              ->orwhere('apelido', 'like', '%'.$request->dados.'%')->limit(4)->get();
            }else {
              $conta = DB::table('contas')->where('nome', 'like', '%'.$request->dados.'%')
              ->orwhere('apelido', 'like', '%'.$request->dados.'%')->limit(10)->get();
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
              $data= DB::table('pages')->where('nome','like','%'.$request->dados.'%')->limit(4)->get();
            }else {
              $data= DB::table('pages')->where('nome','like','%'.$request->dados.'%')->limit(10)->get();
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
          $data1= DB::table('posts')->where('descricao','like','%'.$request->dados.'%')->limit(4)
          ->get();
        }else {
          $data1= DB::table('posts')->where('descricao','like','%'.$request->dados.'%')->limit(10)
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

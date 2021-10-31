<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function index(){
      $auth = new AuthController();
      $conta_logada = $auth->defaultDate();
//---------------------------------------------------------------------------
$profile_picture = AuthController::profile_picture($conta_logada[0]->conta_id);
//---------------------------------------------------------------------------
      $notificacoes=array();
      $a=0;
      $nome=array();
      $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
      $notificacoes_aux=DB::select('select * from notifications where identificador_id_destino = ?', [$aux1[0]->identificador_id]);
      if (sizeof($notificacoes_aux)>0) {
        foreach ($notificacoes_aux as $key) {
          $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_causador ]);
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
              break;
            case 2:
                $notificacoes[$a]['notificacao']=$nome[0];
                $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                break;
              case 3:
                $notificacoes[$a]['notificacao']=$nome[0];
                $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                  break;
                case 4:
                $notificacoes[$a]['notificacao']=$nome[0];
                $notificacoes[$a]['notificacao'].=" enviou-lhe um pedido";
                    break;
                  case 5:
                  $notificacoes[$a]['notificacao']=$nome[0];
                  $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                      break;

          }
          $notificacoes[$a]['foto']=$nome[1];
          $notificacoes[$a]['v']=$nome[2];
          $a++;
        }
      }

        return view('Pesquisas.allSearch',compact('notificacoes','conta_logada','profile_picture'));
    }

    public function peoplesSearch(){
         $val='';
          return view('Pesquisas.peoples',compact('val'));
      }
    public function pagesSearch(){
           $val='';
          return view('Pesquisas.pages',compact('val'));
      }
    public function publicationsSearch(){
           $val='';
          return view('Pesquisas.publications',compact('val'));
      }

    public function peoplesSearch1($val){

          return view('Pesquisas.peoples', compact('val'));
      }
    public function pagesSearch1($val){

          return view('Pesquisas.pages', compact('val'));
      }
    public function publicationsSearch1($val){

          return view('Pesquisas.publications', compact('val'));
      }

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

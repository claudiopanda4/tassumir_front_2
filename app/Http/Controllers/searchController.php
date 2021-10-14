<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function index(){

        return view('Pesquisas.allSearch');
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

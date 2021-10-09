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

        return view('Pesquisas.peoples');
    }
        public function pagesSearch(){

        return view('Pesquisas.pages');
    }
       public function publicationsSearch(){

        return view('Pesquisas.publications');
    }
    public function pessoapesquisa(Request $request) {

   if($request->ajax()){

            $conta = DB::table('contas')->where('nome', 'like', '%'.$request->dados.'%')
            ->orwhere('apelido', 'like', '%'.$request->dados.'%')->get();


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
        $data= DB::table('pages')->where('nome','like','%'.$request->dados.'%')->get();

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
       $data= DB::table('posts')->where('descricao','like','%'.$request->dados.'%')
       ->get();
    /*   $post_reactions = DB::table('post_reactions')
    ->select('post_id', DB::raw('count(post_reaction_id) as total'))
    ->groupBy('post_id')->orderBy('total','desc')
    ->get();
    $conta = DB::table('contas')
          ->join('estado_civils', 'estado_civils.estado_civil_id', '=', 'contas.estado_civil_id')   ->join('logins', 'logins.conta_id', '=', 'contas.conta_id')
          ->select('contas.*', 'estado_civils.estado_civil', 'logins.password', 'contas.conta_id')
          ->get();
          ->join('pages', 'pages.page_id', '=', 'posts.page_id')
          ->select('posts.*', 'pages.nome', 'posts.descricao')*/

       if(count($data)>0){
           $output['valor']=$data;
       }else{
         $output['valor']='Sem Resultado';
       }

       return response()->json($output);
   }

}

}

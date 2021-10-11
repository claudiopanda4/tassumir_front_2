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
       $data1= DB::table('posts')->where('descricao','like','%'.$request->dados.'%')
       ->get();
       $data2= DB::table('pages')->get();

       for ($i=0; $i < sizeof($data1); $i++) {
         for($j=0; $j < sizeof($data2); $j++){
         if ($data1[$i]->page_id==$data2[$j]->page_id) {
           $data[$i]['post_id']=$data1[$i]->post_id ;
           $data[$i]['post']=$data1[$i]->descricao ;
           $data[$i]['nome_page']=$data2[$j]->nome ;
         }
       }

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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pais;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
public function save_errors_on_database($function_name,$controller_name,$error_msg){


                DB::table('errors')->insert([
                    'uuid'=>\Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'nome_da_funcao'=>$function_name,
                    'nome_do_controller'=>$controller_name,
                    'descricao_do_erro'=> $error_msg,
                    
                ]);

    }
    public function index(Request $request)
    {
       // $error_handler = new searchController();

        try {
            if ($request->ajax()) {
            $dadosPais['pais'] = Pais::all();
            return response()->json($dadosPais);
            }
            
        } catch (\Exception $e) {
            
          $function_name = "post_search_final";
          $controller_name = "searchController";
          $error_msg = $e->getMessage();
          
        $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
            //$error_handler->save_errors_on_database($function_name, $controller_name,  $error_msg );
         
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

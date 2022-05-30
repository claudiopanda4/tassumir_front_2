<?php

namespace App\Http\Controllers;

use App\Models\Seguidor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;

class SeguidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function follow(Request $request)
    {
        DB::beginTransaction();
        try {
            $uuid = $request->uuid;
            $id = Auth::user()->conta_id;
            $identificadors = DB::select("select (select identificador_id from identificadors where id = pages.page_id and tipo_identificador_id = 2) as identificador_id_seguida, (select identificador_id from identificadors where id = ? and tipo_identificador_id = 1) as identificador_id_seguindo, (select count(*) from seguidors where seguidors.identificador_id_seguida = (select identificador_id from identificadors where id = pages.page_id and tipo_identificador_id = 2) and seguidors.identificador_id_seguindo = (select identificador_id from identificadors where id = ? and tipo_identificador_id = 1)) as seguir, (select identificador_id from identificadors where identificadors.id = (select conta_id_a from pages as p where uuid = pages.uuid) and tipo_identificador_id = 1) as identificador_id_receptor_1, (select identificador_id from identificadors where identificadors.id = (select conta_id_b from pages as p where uuid = pages.uuid) and tipo_identificador_id = 1) as identificador_id_receptor_2 from pages where uuid = ? LIMIT 1", [$id, $id, $uuid]);
            
            $identificador_id_seguida = $identificadors[0]->identificador_id_seguida;
            $identificador_id_seguindo = $identificadors[0]->identificador_id_seguindo;
            $identificador_id_receptor_1 = $identificadors[0]->identificador_id_receptor_1;
            $identificador_id_receptor_2 = $identificadors[0]->identificador_id_receptor_2;
            $seguir = $identificadors[0]->seguir;

            $auth = new AuthController();
            $id = 0;
            $notification = 0;
            if ($seguir == 0) {
                $id = DB::table('seguidors')->insertGetId([
                    'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'identificador_id_seguida' => $identificador_id_seguida,
                    'identificador_id_seguindo' =>  $identificador_id_seguindo,
                    'created_at'=> $auth->dat_create_update(),
                ]);
                $notification = DB::table('notifications')->insert([
                    [
                        'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'id_state_notification' => 2,
                        'id_action_notification' => 5,
                        'identificador_id_causador'=> $identificador_id_seguindo,
                        'identificador_id_destino'=> $identificador_id_seguida,
                        'identificador_id_receptor'=> $identificador_id_receptor_1,
                        'created_at'=> $auth->dat_create_update()
                    ],
                    [
                        'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'id_state_notification' => 2,
                        'id_action_notification' => 5,
                        'identificador_id_causador'=> $identificador_id_seguindo,
                        'identificador_id_destino'=> $identificador_id_seguida,
                        'identificador_id_receptor'=> $identificador_id_receptor_1,
                        'created_at'=> $auth->dat_create_update()
                    ],
                ]);
                $notification = DB::table('notifications')->insert([
                        'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'id_state_notification' => 2,
                        'id_action_notification' => 5,
                        'identificador_id_causador'=> $identificador_id_seguindo,
                        'identificador_id_destino'=> $identificador_id_seguida,
                        'identificador_id_receptor'=> $identificador_id_receptor_2,
                        'created_at'=> $auth->dat_create_update()
                ]);
            } else {
                DB::table('seguidors')->where([
                  ['identificador_id_seguida', '=', $identificador_id_seguida],
                  ['identificador_id_seguindo', '=', $identificador_id_seguindo]
              ])->delete();
                DB::table('notifications')->where([
                  ['identificador_id_causador', '=', $identificador_id_seguindo],
                  ['identificador_id_receptor', '=', $identificador_id_receptor_2],
                  ['id_state_notification', '=', 2],
                  ['id_action_notification', '=', 5],
              ])->delete();
                DB::table('notifications')->where([
                  ['identificador_id_causador', '=', $identificador_id_seguindo],
                  ['identificador_id_receptor', '=', $identificador_id_receptor_1],
                  ['id_state_notification', '=', 2],
                  ['id_action_notification', '=', 5],
              ])->delete();
                DB::commit(); 
                return response()->json([
                    'state' => true, 
                    'identificador_id_seguida' => $identificador_id_seguida, 
                    'identificador_id_seguindo' => $identificador_id_seguindo,
                    'identificador_id_receptor_2'=> $identificador_id_receptor_2,
                    'identificador_id_receptor_1'=> $identificador_id_receptor_1,
                    'id' => $id,
                    'notification' => $notification,
                    'text' => 'Seguir',
                ]);
            }
            
            DB::commit();  
            
            return json_encode([
                'identificador_id_seguida' => $identificador_id_seguida,
                'identificador_id_seguindo' => $identificador_id_seguindo,
                'identificador_id_receptor_1' => $identificador_id_receptor_1,
                'identificador_id_receptor_2' => $identificador_id_receptor_2,
                'uuid' => $uuid,
                //'sql' => $sql,
                'id' => $id,
                'notification' => $notification,
                'seguir' => $seguir,
                'text' => 'Não Seguir',
            ]);        
        } catch (Exception $e) {
            DB::beginTransaction();

                    $function_name = "follow";
                    $controller_name = "SeguidorController";
                    $error_msg = $e->getMessage();

                    $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }

    }
    public function save_errors_on_database($function_name,$controller_name,$error_msg){


                DB::table('errors')->insert([
                    'uuid'=>\Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'nome_da_funcao'=>$function_name,
                    'nome_do_controller'=>$controller_name,
                    'descricao_do_erro'=> $error_msg,
                    
                ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        try {
          $controll = new AuthController();


          if ($request->ajax()) {
            $identificador_seguida = DB::table('identificadors')->where([
                ['tipo_identificador_id', '=', 2],
                ['id', '=', $request->seguida],
                ])->get();
            $identificador_seguindo = DB::table('identificadors')->where([
                ['tipo_identificador_id', '=', 1],
                ['id', '=', $request->seguindo],
                ])->get();


            $incremento = 0;
            $cont = 0;
            $total = 0;
            $seguiu = DB::table('seguidors')->where('identificador_id_seguindo', $identificador_seguindo[0]->identificador_id)->get();
            foreach ($seguiu as $value) {
                if ($identificador_seguida[0]->identificador_id == $value->identificador_id_seguida) {
                $incremento += 1;
                }
            }
            if ($incremento < 1) {
                $seguidor = new Seguidor;
                $seguidor->identificador_id_seguindo = $identificador_seguindo[0]->identificador_id;
                $seguidor->identificador_id_seguida = $identificador_seguida[0]->identificador_id;
                $seguidor->save();

            $page = DB::table('pages')->where('page_id', $request->seguida)->get();

            if ($page[0]->conta_id_a != $request->seguindo) {
                $destino_a = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
            DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 5,
                  'identificador_id_causador'=> $identificador_seguindo[0]->identificador_id,
                  'identificador_id_destino'=> $identificador_seguida[0]->identificador_id,
                  'identificador_id_receptor'=> $destino_a[0]->identificador_id,
                  'created_at'=> $controll->dat_create_update(),

                  ]);

                }
              if ($page[0]->conta_id_b != $request->seguindo) {
                $destino_b = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
                DB::table('notifications')->insert([
                        'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'id_state_notification' => 2,
                        'id_action_notification' => 5,
                        'identificador_id_causador'=> $identificador_seguindo[0]->identificador_id,
                        'identificador_id_destino'=> $identificador_seguida[0]->identificador_id,
                        'identificador_id_receptor'=> $destino_b[0]->identificador_id,
                        'created_at'=> $controll->dat_create_update(),

                        ]);
                      }
                }
                $auth = new AuthController;
                $paginasNaoSeguidas = $auth->NaoSeguidas();
                foreach ($paginasNaoSeguidas as $key => $value) {
                    if ($value->page_id > $request->last_page) {
                        $pagePage[0] = $value;
                        $cont = $cont + 1;
                        break;
                    }
                }
                if ($cont = 1 && $request->last_page != 0) {
                    $page_identfy = DB::table('identificadors')->where([
                    ['tipo_identificador_id', 2],
                    ['id', '=', $pagePage[0]->page_id],
                    ])->get();
                    $newpage['page'] = $pagePage;
                    $seguidores = DB::table('seguidors')->get();
                    foreach ($seguidores as $valuesgd) {
                        if ($valuesgd->identificador_id_seguida == $page_identfy[0]->identificador_id) {
                        $total = $total + 1;
                        }
                    }
                    $newpage['seguidores'] = $total;
                    $newpage['id_user'] = $request->seguindo;
                 }else{
                    $newpage['page'] = 'Vazio';
                    $newpage['seguidores'] = 0;
                }


            return response()->json($newpage);
        }
        } catch (Exception $e) {

                    $function_name = "store";
                    $controller_name = "SeguidorController";
                    $error_msg = $e->getMessage();

                    $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }

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
    public function destroy(Request $request)
    {
        try{

        if ($request->ajax()) {
             $identificador_seguida = DB::table('identificadors')->where([
                ['tipo_identificador_id', 2],
                ['id', '=', $request->seguida],
            ])->get();
            $identificador_seguindo = DB::table('identificadors')->where([
                ['tipo_identificador_id', 1],
                ['id', '=', $request->seguindo],
            ])->get();
          DB::table('seguidors')->where([
                  ['identificador_id_seguida', '=', $identificador_seguida[0]->identificador_id],
                  ['identificador_id_seguindo', '=', $identificador_seguindo[0]->identificador_id],
              ])->delete();
          $cont = 0;
          $total = 0;

          $auth = new AuthController;
                $paginasSeguidas = $auth->paSeguidas();
                foreach ($paginasSeguidas as $key => $value) {
                    if ($value->page_id > $request->last_page) {
                        $pagePage[0] = $value;
                        $cont = $cont + 1;
                        break;
                    }
                }
                if ($cont = 1 && $request->last_page != 0) {
                    $page_identfy = DB::table('identificadors')->where([
                    ['tipo_identificador_id', 2],
                    ['id', '=', $pagePage[0]->page_id],
                    ])->get();
                    $newpage['page'] = $pagePage;
                    $seguidores = DB::table('seguidors')->get();
                    foreach ($seguidores as $valuesgd) {
                        if ($valuesgd->identificador_id_seguida == $page_identfy[0]->identificador_id) {
                        $total = $total + 1;
                        }
                    }
                    $newpage['seguidores'] = $total;
                    $newpage['id_user'] = $request->seguindo;
                }else{
                    $newpage['page'] = 'Vazio';
                    $newpage['seguidores'] = 0;
                }
         return response()->json($newpage);
            }
        }catch(\Exception $e){

                    $function_name = "destroy";
                    $controller_name = "SeguidorController";
                    $error_msg = $e->getMessage();

                    $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }

        }


}

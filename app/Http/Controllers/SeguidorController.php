<?php

namespace App\Http\Controllers;

use App\Models\Seguidor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        if ($request->ajax()) {
            $identificador_seguida = DB::table('identificadors')->where('id', $request->seguida)->get();
            $identificador_seguindo = DB::table('identificadors')->where('id', $request->seguindo)->get();
        
            foreach ($identificador_seguindo as $valueseguindo) {
                if ($valueseguindo->tipo_identificador_id == 1) {
                    $id_conta_seguindo = $valueseguindo->id;
                    $identi_id_seguindo = $valueseguindo->identificador_id;
                } 
            }
            foreach ($identificador_seguida as $valueseguida) {
                if ($valueseguida->tipo_identificador_id == 2) {
                    $id_page_seguida = $valueseguida->id;
                    $identi_id_seguida = $valueseguida->identificador_id;                
                }

            }
            
            $incremento = 0;
            $seguiu = DB::table('seguidors')->where('identificador_id_seguindo', $identi_id_seguindo)->get();
            foreach ($seguiu as $value) {
                if ($identi_id_seguida == $value->identificador_id_seguida) {
                $incremento += 1;
                }
            }
            if ($incremento < 1) {
                $seguidor = new Seguidor;
                $seguidor->identificador_id_seguindo = $identi_id_seguindo;
                $seguidor->identificador_id_seguida = $identi_id_seguida;
                $seguidor->save();
            
            $page = DB::table('pages')->where('page_id', $id_page_seguida)->get();
            
            if ($page[0]->conta_id_a != $id_conta_seguindo) {
                $destino_a = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
            DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 5,
                  'identificador_id_causador'=> $identi_id_seguindo,
                  'identificador_id_destino'=> $destino_a[0]->identificador_id,
                  ]);
                }
              if ($page[0]->conta_id_b != $id_conta_seguindo) {
                $destino_b = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
                DB::table('notifications')->insert([
                        'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'id_state_notification' => 2,
                        'id_action_notification' => 5,
                        'identificador_id_causador'=> $identi_id_seguindo,
                        'identificador_id_destino'=> $destino_b[0]->identificador_id,
                        ]);
                      }
                }
        
            return response()->json($destino_b);
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
        if ($request->ajax()) {
        $identificador_seguindo = DB::table('seguidors')->where('identificador_id_seguindo', $request->seguindo)->get();
         foreach ($identificador_seguindo as $value) {
            if ($value->identificador_id_seguida == $request->seguida) {
                $identi_id_seguindo = $value->seguidor_id;
            }
         }
          DB::table('seguidors')->where(['seguidor_id'=>$identi_id_seguindo])->delete();
         return response()->json('Deletou');
        }
        
    }
}
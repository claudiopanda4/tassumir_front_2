<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd($this->following(1, 1));
        $dadosPage = Page::all();
        return view('feed.index', compact('dadosPage'));
    }
    public function identificador_id($tipo_identficador, $id){
        $identificador_id = 0;
        //dd($tipo_identficador);
        if ($tipo_identficador == 2) {
            $identificador = DB::table('identificadors')
                ->where('tipo_identificador_id', $tipo_identficador)
                ->where('id', $id)
                ->first();
        } elseif ($tipo_identficador == 1) {
            $identificador = DB::table('identificadors')
                ->where('tipo_identificador_id', $tipo_identficador)
                ->where('id', $id)
                ->first();
        }
        return $identificador->identificador_id;
    }
    public function following($conta_id, $page_id){
        $identificador_seguindo = $this->identificador_id(1, $conta_id);
        $identificador_seguida = $this->identificador_id(2, $page_id);
        $seguidors = DB::select('select * from seguidors where identificador_id_seguida = ? and identificador_id_seguindo = ?', [$identificador_seguida, $identificador_seguindo]);
        $return = false;
        if (sizeof($seguidors) > 0) {
            $return = true;
        }
        return $return;
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

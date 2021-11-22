<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function view_post(Request $request)
    {
        DB::beginTransaction();
        try {
            /*DB::table('contas')
                ->where('conta_id', $account_name[0]->conta_id)
                ->update([
                  'nome' => $request->nome,
                  'apelido' => $request->apelido,
                  'genero' => $request->genre,
                  'descricao' => $request->bio,
                  'email' => $request->email,
                  'telefone' => $request->telefone

              ]);
            //$dadoSeguindo = DB::table('seguidors')->where('identificador_id_seguindo', $valor)->join('identificadors', 'seguidors.identificador_id_seguindo', '=', 'identificadors.identificador_id')
            //->select('seguidors.*', 'identificadors.id')
            //->get();*/
            $line = $request->data."";
            $data = explode('_', $line);
            $post_uuid = $data[2];
            $account_uuid = $data[3];
            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();

            $post = DB::select('select * from posts where uuid = ?', [$post_uuid]);
            $conta = DB::select('select * from contas where uuid = ?', [$account_uuid]);
            $view = DB::select('select * from views where post_id = ? AND conta_id = ?', [$post[0]->post_id, $conta[0]->conta_id]);
            //dd(sizeof($view));
            if (sizeof($view) <= 0) {
                $result = DB::insert('insert into views(uuid, post_id, ip_view, conta_id) values(?, ?, ?, ?)',
                [$uuid, $post[0]->post_id, "", $conta[0]->conta_id]);
            }
            //dd($result);
            DB::commit();
            return response()->json('salvou');
        } catch (Exception $e) {
            DB::rollback();
        }
        
        
    }
    public function view_video(Request $request)
    {
        $line = $request->data."";
        $data = explode('_', $line);
        $post_uuid = $data[2];
        $account_on_uuid = $data[3];
        return response()->json($data);
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

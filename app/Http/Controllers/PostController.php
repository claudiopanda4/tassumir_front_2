<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::beginTransaction();
        try {
            $account_id = Auth::id();
            $posts_return = array();
            $post_views = array();
            $post = array();
            $auxs = array();
            $i = 0;
            $iii = 0;
            $posts_return1 = array();
            $returns = array();
            $posts_count = DB::select('select post_id from posts');
            $counter = sizeof($posts_count);
            //dd(sizeof($posts_count));
            //dd($aux);
            $post = DB::select('select * from posts limit 1');
            $aux1 = $post[0]->post_id - 1;
            $post_views = DB::select('select * from views limit 1');
            $aux = $post_views[0]->view_id - 1;
            while (sizeof($posts_return) < 6 && $counter >=0) {
                $post_views = DB::select('select post_id, conta_id from views where conta_id = ? and view_id > ? limit 4', [$account_id, $aux]);
                //dd($post_views);
                $posts = DB::select('select * from posts where estado_post_id = ? and post_id > ? limit 4', [1, $aux1]);
                $ii = 0;
                $key_store;
                //dd($posts);
                //dd($post_views);
                $comparator = array();
                foreach ($posts as $key => $value) {
                    $cont = 0;
                    $size_post_views = sizeof($post_views);
                    foreach ($post_views as $key_1 => $value) {
                        $comparator[$ii] = $posts[$key]->post_id . " != " . $post_views[$key_1]->post_id; 
                        if ($posts[$key]->post_id != $post_views[$key_1]->post_id) {
                           $cont++;  
                        }
                        $comparator[$ii] = $comparator[$ii]." ".$cont; 
                        $ii++;
                    }
                    //dd($size_post_views." ".$cont);
                    if ($cont == $size_post_views) {
                        if (!(in_array($posts[$key], $posts_return))) {
                            $posts_return[$i] = $posts[$key];
                            $i++; 
                        }
                    }
                }
                //dd($comparator);
                //dd($counter);
                $auxs[$iii] = $aux.' '.$aux1.' size off '.sizeof($posts_return).' '.$counter;
                $aux = $aux + 4;   
                $aux1 = $aux1 + 4;     
                $counter--;
                $iii++;
            } 
            //dd($auxs);
            //dd($returns);
            dd($posts_return);
            $post = DB::select('select * from posts where estado_post_id = ?', [1]);
            //dd($post);
            DB::commit();
            return $return_video;
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function get_video(Request $request)
    {
        DB::beginTransaction();
        try {
            $post = DB::select('select * from posts where uuid = ?', [$request->data]);
            //dd($post);
            $video = $post[0]->file;
            //$path = {{asset('storage/video/page/')}};
            $type_file = 'video/'.explode('.', $video)[1];
            //dd($type_file);
            $return_video = [
                'video' => $video,
                'type_file' => $type_file,
            ];
            DB::commit();
            return $return_video;
        } catch (Exception $e) {
            DB::rollback();
        }
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

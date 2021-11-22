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
            $post_views;
            $i = 0;
            $post_views = DB::select('select * from views limit 1');
            $aux = $post_views[0]->view_id - 1;
            $posts_return1 = array();
            $returns = array();
            //dd($aux);
            while (sizeof($posts_return1) < 4) {
                $post_views = DB::select('select post_id, conta_id from views where conta_id <> ? and view_id > ? limit 10', [$account_id, $aux]);
                //dd($post_views);
                $post = DB::select('select * from posts limit 1');
                $aux1 = $post[0]->post_id - 1;
                $ii = 0;
                foreach ($post_views as $key => $value) {
                    //$post = DB::select('select * from posts where estado_post_id = ? and post_id <> ? and post_id > ? limit 10', [1, $post_views[$key]->post_id, $aux1]);
                    $post = DB::table('posts')
                            ->where('estado_post_id', '=', 1)
                            ->where('post_id', '=', $post_views[$key]->post_id)
                            ->where('post_id', '>', $aux1)
                            ->get();
                    dd($post);
                    //dd($post_views[$key]->post_id);
                    //dd($posts);
                    $returns[$key] = $post_views[$key]->post_id;
                    $posts_return[$i][$ii] = $post;
                    $ii++;
                }
                $aux = $aux + sizeof($post_views);
                $i++;
                $posts_return1 = [[],[],[],[],[],[]];
            } 
            
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
        /*<source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/mp4">
                                <source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/3gp">
                                <source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/avi">
                                <source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/mov">
                                <source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/webm">
                                <source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/mkv">
                                <source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/wmv">
                                <source src="{{asset('storage/video/page/') . '/' . $dados[$key]['file']}}" type="video/flv">*/
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

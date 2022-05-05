<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$posts = $this->posts();*/
        $ident_page = $request->id;
        $page_current = 'post_index';
        $post = DB::select('select uuid, (select uuid from pages where page_id = posts.page_id) as page_uuid, (select foto from pages where page_id = posts.page_id) as page_cover, (select nome from pages where page_id = posts.page_id) as page_name, file, descricao, created_at as data, formato_id from posts where uuid = ?', [$ident_page])[0];
        //dd($post);
        return view('pagina.index', compact('ident_page', 'page_current', 'post'));
    }

    public function img_comment(Request $request, $id) {
        $conta_id = Auth::user()->conta_id;
        $result = DB::select('select (select foto from contas where conta_id = ?) as foto_user, (select conta_id_a from pages where page_id = posts.page_id) as conta_id_a, (select conta_id_b from pages where page_id = posts.page_id) as conta_id_b, (select foto from pages where page_id = posts.page_id) as foto_page from posts where uuid = ?', [$conta_id, $id])[0];

        $foto = null;
        if ($result->foto_user) {
            $foto = '/storage/img/users/' . $result->foto_user;
        }
        $page_ower = false;
        if ($result->conta_id_a == $conta_id || $result->conta_id_b == $conta_id) {
            $foto = null;
            if ($result->foto_page) {
                $foto = '/storage/img/page/' . $result->foto_page;
            }
            $page_ower = true;
        }

        return response()->json(['foto' => $foto, 'state' => $page_ower]);
    }

    public function statistics(Request $request, $id){
        $conta_id = Auth::user()->conta_id;
        $post = DB::select('select (select count(*) from post_reactions where post_id = posts.post_id) as qtd_likes, (select count(*) from comments where post_id = posts.post_id) as qtd_comments, (select count(*) from post_reactions where identificador_id = (select identificador_id from identificadors where id = ? and tipo_identificador_id = 1) and post_id = posts.post_id) as liked from posts where uuid = ?', [$conta_id, $id])[0];
        $qtd_comment = $post->qtd_comments;
        $qtd_likes = $post->qtd_likes;
        $add = $post->liked >= 1 ? 'fas liked': 'far unliked';
        $remove = $post->liked < 1 ? 'fas liked': 'far unliked';
        return response()->json([
            'comment' => $qtd_comment,
            'likes' => $qtd_likes,
            'id' => $id,
            'add' => $add,
            'remove' => $remove,
        ]);
    }

    public function prototype_view(Request $request){
        $page_current = 'none';
        return view('pagina.prototype', compact('page_current'));
    }

    public function thumbnail($thumb, $file_name){
        try {
            $folderPath = "storage/img/thumbs/";
            $image_parts = explode(";base64,", $thumb);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . '' . $file_name . '.'.$image_type;

            file_put_contents($file, $image_base64);  

            return $file_name. '.'.$image_type;;
        } catch (Exception $e) {
            
        }

    }

    public function posts_no_follow(){

    }
    public function posts_no(){

    }
    public function view($post_id, $account_id){
        $post_views = DB::select('select post_id, conta_id from views where conta_id = ? AND post_id = ? limit 1', [$account_id, $post_id]);
        $return = sizeof($post_views) > 0 ? true : false;
        return $return;
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
            $video = $post[0]->file;
            $type_file = 'video/'.explode('.', $video)[1];
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

    public function reactions_post($post_id){
        $reactions_post = DB::select('select post_id from post_reactions where post_id = ?', [$post_id]);
        $size = sizeof($reactions_post);
        return $size;
    }

    public function tassumirvideos($id){
            $page_current = 'video_home';
            return view('videos.index', compact('page_current'));
        }

    public function tassumirvideos_final($id){
      $videos=[];
      //return response()->json($id);
      $conta_logada = Auth::user()->conta_id;
       switch ($id) {
         case 'ma':
           $videos=DB::select('select p.post_id, p.thumbnail, viram, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi,(select count(*) from views as v where v.post_id = p.post_id) as viram, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 order by  p.viram desc limit 3',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);
          break;
         case 'mg':
           $videos=DB::select('select p.post_id, p.thumbnail, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 and p.guardado=1 order by  p.post_id desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);

           break;
         case 'mc':
           $videos=DB::select('select p.post_id, p.thumbnail, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 order by  p.qtd_reacoes desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);

            break;
         case 'mr':
           $videos=DB::select('select p.post_id, p.thumbnail, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 order by  p.post_id desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);

             break;
         case 'mco':
           $videos=DB::select('select p.post_id, p.thumbnail, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 order by  p.qtd_comment desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);

              break;
        }

        return response()->json($videos);
      }

    public function edit_option(Request $request){
      $auth = new AuthController();
        $variavel= DB::table('posts')
              ->where('uuid', $request->id1)
              ->get();
              foreach ($variavel as $key) {
                $resposta=$auth->DadosPost($key);
              }

              return response()->json($resposta);
            }

        public function edit_post(Request $request){
            $controll = new AuthController();
            if ($request->message != NULL) {
                DB::table('posts')
                    ->where('uuid', $request->uuid)
                    ->update([
                    'descricao' => $request->message,
                    'updated_at' => $controll->dat_create_update()
                ]);
            }

            return response()->json(['saved' => true, 'description' => $request->message]);
        }

    public function destaques($limit, $init){
        $posts = DB::select('select * from posts where post_id > ? order by post_id desc limit ?', [$init, $limit]);
        $post_drafted = array();
        $aux;
        $reactions_posts = array();
        $destaques = array();
        $i = 0;
        $last_post_dest;
        while ($i < sizeof($posts)){
            if ($i == 0) {
                $last_post_dest = $posts[$i]->post_id;
            }
            $destaques[$i]['post_id'] = $posts[$i]->post_id;
            $destaques[$i]['reactions'] = $this->reactions_post($posts[$i]->post_id);
            $destaques[$i]['post'] = $posts[$i];
            $i++;
        }
        $i = 0;
        $numb_destaques = 0;
        while ($i < sizeof($destaques)) {
            $ii = $i + 1;
            while ($ii < sizeof($destaques) ) {
                if ($destaques[$i]['reactions'] < $destaques[$ii]['reactions']) {
                    $aux = $destaques[$ii];
                    $destaques[$ii] = $destaques[$i];
                    $destaques[$i] = $aux;
                }
                $ii++;
            }
            $i++;
        }
        //dd($destaques);
        return ['destaques'=> $destaques, 'last_post_dest' => $last_post_dest];
    }

    public function view_post(Request $request)
    {
        DB::beginTransaction();
        try {
            $controll = new AuthController();

            $post_uuid = $request->id;
            $conta_id = Auth::user()->conta_id;
            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();

            $post = DB::select('select * from posts where uuid = ?', [$post_uuid]);
            $view = DB::select('select * from views where post_id = ? AND conta_id = ?', [$post[0]->post_id, $conta_id]);
            $save_video = false;
            if (sizeof($view) < 1) {
              /**/
                $result = DB::insert('insert into views(uuid, post_id, ip_view, conta_id, state_views_id, created_at) values(?, ?, ?, ?, ?, ?)',
                [$uuid, $post[0]->post_id, "", $conta_id, 2, $controll->dat_create_update()]);
            } elseif ($request->video_add && $view[0]->state_views_id != 3) {
                if (sizeof($view) == 1) {
                    DB::table('views')
                        ->where('view_id', $view[0]->view_id)
                        ->update([
                          'state_views_id' => 3,
                          'updated_at' => $controll->dat_create_update()
                    ]);
                    $save_video = true;
                }
            }
            DB::commit();
            return json_encode([
                'save' => true,
                'save_video' => $save_video,
                'ident' => $request->id,
            ]);
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

    public function toSave(Request $request)
    {
        try {
            $uuid = $request->id;
            $conta_id = Auth::user()->conta_id;
            $data = DB::select("select id_post, saveds.conta_id from saveds right join (select post_id as id_post from posts where uuid = ?) as posts on saveds.post_id = posts.id_post", [$uuid]);
            $sql = "select post_id, saveds.conta_id from saveds right join (select post_id as id_post from posts where uuid = $uuid) as posts on saveds.post_id = posts.id_post AND saveds.conta_id = $conta_id";
            if ($data[0]->conta_id != null) {
                DB::table('saveds')
                ->where('conta_id', $conta_id)
                ->where('post_id', $data[0]->id_post)
                ->delete();
                return [
                    'message' => 'just save',
                    'state' => false,
                    'e' => false,
                    'add' => [
                        'far'
                    ],
                    'remove' => [
                        'fas'
                    ],
                    'sql' => $sql
                ];
            } else {
                $controll = new AuthController();
                $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
                $result = DB::insert('insert into saveds(uuid, post_id, conta_id, created_at) values(?, ?, ?, ?)',
                    [$uuid, $data[0]->id_post, $conta_id, $controll->dat_create_update()]);
                return [
                    'message' => 'saved',
                    'state' => true,
                    'e' => false,
                    'add' => [
                        'fas'
                    ],
                    'remove' => [
                        'far'
                    ],
                    'sql' => $sql
                ];
            }
        } catch (Exception $e) {
            return [
                'message' => 'saved',
                'state' => true,
                'e' => $e,
                'add' => [
                    'fas'
                ],
                'remove' => [
                    'far'
                ],
                'sql' => $sql
            ];
        }
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

    public function comment_reac_final(Request $request){
            $auth = new AuthController();
            $uuid = Auth::user()->uuid;
            $control=DB::select('select c.*, if(dono_page=1, page_idtf,conta_identify) as idtf,if(dono_page=0,(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = conta_identify),(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = page_idtf)) as ja_reagi,if(dono_page=0,(select r.reaction_comment_id from reactions_comments as r where r.comment_id = c.comment_id and r.identificador_id = conta_identify),(select r.reaction_comment_id from reactions_comments as r where r.comment_id = c.comment_id and r.identificador_id = page_idtf))as id_ja_reagi, if(c.identificador_id = page_idtf, 1, 0) page_dono_comment, if(tipo_identify=1, id_identify ,null) as dono_comment from (select (select identificadors.identificador_id from identificadors where identificadors.id = c.comment_id and identificadors.tipo_identificador_id = 4) as comment_identify,c.comment_id, c.identificador_id ,(select identificadors.identificador_id from identificadors where identificadors.id = pa.conta_id_a and identificadors.tipo_identificador_id = 1) as conta_ai_identify,(select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2) as page_idtf,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id= c.identificador_id) as tipo_identify,(select identificadors.id from identificadors where identificadors.identificador_id= c.identificador_id) as id_identify,(select identificadors.identificador_id from identificadors where identificadors.id = pa.conta_id_b and identificadors.tipo_identificador_id = 1) as conta_b_identify,(select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify,(select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_reactions,if (pa.conta_id_a = ? || pa.conta_id_b = ? , 1, 0) as dono_page, (select identificadors.identificador_id from identificadors where identificadors.id = c.post_id and identificadors.tipo_identificador_id = 3) as post_idtf from comments as c inner join pages as pa on pa.page_id=(select  p.page_id from posts as p where p.post_id= c.post_id) where c.uuid =?)as c', [Auth::user()->conta_id,Auth::user()->conta_id, Auth::user()->conta_id,$request->id]);
                  $resposta = 'falhou';
                  //dd($control);
                  if ($control[0]->ja_reagi == 0) {
                    DB::table('reactions_comments')->insert([
                      'comment_id' => $control[0]->comment_id,
                      'reaction_id' => 1,
                      'identificador_id' => $control[0]->idtf,
                      'created_at'=> $auth->dat_create_update(),

                    ]);

                    if($control[0]->dono_page==0 && $control[0]->page_dono_comment ==0 && $control[0]->id_identify!= Auth::user()->conta_id ){
                      DB::table('notifications')->insert([
                              'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                              'id_state_notification' => 2,
                              'id_action_notification' => 6,
                              'identificador_id_causador'=> $control[0]->idtf,
                              'identificador_id_destino'=> $control[0]->post_idtf,
                              'identificador_id_receptor'=> $control[0]->identificador_id,
                              'created_at'=> $auth->dat_create_update(),
                              ]);

                    }elseif ($control[0]->dono_page==0 && $control[0]->page_dono_comment ==1) {
                      DB::table('notifications')->insert([
                              'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                              'id_state_notification' => 2,
                              'id_action_notification' => 6,
                              'identificador_id_causador'=> $control[0]->idtf,
                              'identificador_id_destino'=> $control[0]->post_idtf,
                              'identificador_id_receptor'=> $control[0]->conta_a_identify,
                              'created_at'=> $auth->dat_create_update(),

                              ]);
                              DB::table('notifications')->insert([
                                      'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                                      'id_state_notification' => 2,
                                      'id_action_notification' => 6,
                                      'identificador_id_causador'=> $control[0]->idtf,
                                      'identificador_id_destino'=> $control[0]->post_idtf,
                                      'identificador_id_receptor'=> $control[0]->conta_b_identify,
                                      'created_at'=> $auth->dat_create_update(),

                                      ]);
                    }elseif ($control[0]->dono_page==1 && $control[0]->page_dono_comment ==0) {
                      DB::table('notifications')->insert([
                              'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                              'id_state_notification' => 2,
                              'id_action_notification' => 6,
                              'identificador_id_causador'=> $control[0]->idtf,
                              'identificador_id_destino'=> $control[0]->post_idtf,
                              'identificador_id_receptor'=> $control[0]->identificador_id,
                              'created_at'=> $auth->dat_create_update(),

                              ]);
                    }

                    $resposta = $control[0]->qtd_reactions + 1;

                  } else{
                    DB::table('reactions_comments')->where(['reaction_comment_id'=>$control[0]->id_ja_reagi])->delete();
                    $resposta= $control[0]->qtd_reactions - 1;
                  }
                  return response()->json([
                    'saved' => true,
                    'qtd_reactions' => $resposta,
                  ]);
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

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
    public function index()
    {
        $posts = $this->posts();
    }

    public function posts(Request $request) {

        $init = 0;
        $dest_init = 0;
        $checked = false;
        if ($request->checked) {
            $init = $request->init;
            $dest_init = $request->dest_init;
            if ($request->checked) {
                $checked = true;
            }
        }
        $user_id = Auth::user()->conta_id;
        $dados = [];
        $total_posts = 10;
        $i = 0;
        //dd($init);
        $new_posts = DB::select('select post_id from posts where post_id > ? order by post_id desc', [$init]);
        //dd($new_posts);
        if (sizeof($new_posts) > 0) {
            $posts_return = $this->get_posts($init, $checked, $user_id);
            $posts = $posts_return['posts_return'];
            $last_post_id = $posts_return['last_post'];
        } else {
            $posts = array();
            $last_post_id = $request->init;
        }

        $dados = array();
        if (sizeof($posts) < 10) {
            $posts_size = sizeof($posts);
            $total_posts = $total_posts - $posts_size;
            $i = 0;
            $new_posts = DB::select('select post_id from posts where post_id > ? order by post_id desc', [$dest_init]);
            if (sizeof($new_posts) > 0) {
                $destaques_return = $this->destaques($total_posts, $dest_init);
                $destaques = $destaques_return['destaques'];
                $last_post_dest = $destaques_return['last_post_dest'];
            } else {
                $destaques = array();
                $last_post_dest = $request->dest_init;
            }
            $destaques_size = sizeof($destaques);
            $key = 0;
            //dd($destaques);
            while ($posts_size > 0) {
                $dados[$i] = $posts[$key];
                $i++;
                $posts_size--;
                $key++;
            }
            $key = 0;
            while ($destaques_size > 0) {
                if (!in_array($destaques[$key]['post'], $dados)) {
                    $dados[$i] = $destaques[$key]['post'];
                    $i++;
                }
                $key++;
                $destaques_size--;
            }
        } else {
            $last_post_dest = 1;
        }
        //dd($dados);
        return [
                'dados' => $dados,
                'last_post_dest' => $last_post_dest,
                'last_post_id' => $last_post_id
        ];
    }
    public function get_posts ($init, $checked, $user_id) {
        DB::beginTransaction();
        try {
            $page_controller = new PageController();
            //$account_id = 1;
            $account_id = $user_id;
            $posts_return = array();
            $post_views = array();
            $page_follow = array();
            $post = array();
            $auxs = array();
            $i = 0;
            $iii = 0;
            $posts_return1 = array();
            $returns = array();
            $posts_count = DB::select('select post_id from posts');
            $counter = sizeof($posts_count);
            $check_status_posts = array();
            $control_posts = 0;
            $last_post = 0;
            if (sizeof($posts_count) > 0) {
                if ($checked) {
                    $aux1 = $init;
                    $aux = $init;
                } else {
                    $post = DB::select('select * from posts limit 1');
                    $aux1 = sizeof($post) > 0 ? $post[0]->post_id - 1 : 0;
                    $post_views = DB::select('select * from views limit 1');
                    $aux = sizeof($post_views) > 0 ? $post_views[0]->view_id - 1 : 0;
                }
                while ($control_posts < 2 && sizeof($posts_return) < 10) {
                    while ((sizeof($posts_return) < 10 && $counter >= 0))  {
                        $post_views = DB::select('select post_id, conta_id from views where conta_id = ? and view_id > ? order by post_id desc limit 4', [$account_id, $aux]);
                        $posts = DB::select('select * from posts where estado_post_id = ? and post_id > ? order by post_id desc limit 4', [1, $aux1]);
                        $ii = 0;
                        $key_store;
                        foreach ($posts as $key => $value) {
                            if ($key == 0) {
                                 $last_post = $posts[$key]->page_id;
                            }
                            $cont = 0;
                            $size_post_views = sizeof($post_views);
                            $result = $this->view($posts[$key]->post_id, $account_id);
                            if (!$result) {
                                if ($control_posts == 0) {
                                    if (!(in_array($posts[$key], $posts_return)) && $page_controller->following($account_id, $posts[$key]->page_id)) {
                                        $posts_return[$i] = $posts[$key];
                                        $i++;
                                    }
                                } elseif ($control_posts == 1) {
                                    if (!(in_array($posts[$key], $posts_return))) {
                                        $posts_return[$i] = $posts[$key];
                                        $i++;
                                    }
                                }
                            }
                        }
                        //$last_post = $posts[$key]->page_id;
                        $auxs[$iii] = $aux.' '.$aux1.' size off '.sizeof($posts_return).' '.$counter;
                        $aux = $aux + 4;
                        $aux1 = $aux1 + 4;
                        $counter--;
                        $iii++;
                    }
                    if (sizeof($posts_return) < 10 && $control_posts < 2) {
                        $counter = sizeof($posts_count);
                        $aux = 0;
                        $aux1 = 0;
                    }
                    $control_posts++;
                    //dd($posts_return);
                }
            }
            DB::commit();
            return ['posts_return' => $posts_return, 'last_post' => $last_post];
        } catch (Exception $e) {
            DB::rollback();
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
        $auth = new AuthController();
        $dates = $auth->default_();
        $account_name = $dates['account_name'];
        $checkUserStatus = $dates['checkUserStatus'];
        $profile_picture = $dates['profile_picture'];
        $isUserHost = $dates['isUserHost'];
        $hasUserManyPages = $dates['hasUserManyPages'];
        $allUserPages = $dates['allUserPages'];
        $page_content = $dates['page_content'];
        $conta_logada = $dates['conta_logada'];
        $notificacoes = $dates['notificacoes'];
        $paginasSeguidas = $dates['paginasSeguidas'];
        $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
        $dadosSeguida = $dates['dadosSeguida'];
        $notificacoes_count = $dates['notificacoes_count'];

       switch ($id) {
         case 'ma':
         $post1=DB::select('select * from posts where formato_id = ?', [1]);
         $post=array();
         for ($i=0; $i < 5 ; $i++) {
           $a=0;
           foreach ($post1 as $key) {
             $post_views= DB::select('select * from post_views where post_id = ?', [$key->post_id]);
             $soma= sizeof($post_views);
             $b=0;

               for ($j=0; $j <sizeof($post); $j++) {
                 if ($key->post_id == $post[$j]->post_id ){
                   $b=1;
                 }
               }
               if ($soma >= $a && $b!=1 && $key->estado_post_id == 1) {
                 $post[$i]= $key;

                 $a=$soma;
               }
             }
           }
          break;
        case 'mg':
        $post1=DB::select('select * from posts where formato_id = ?', [1]);
        $post=array();
        $a=0;
          foreach ($post1 as $key) {
            $guardado= DB::select('select * from saveds where post_id = ?', [$key->post_id]);
            if (sizeof($guardado)>0) {
              $post[$a]= $key;
              $a++;
          }

            }

           break;
        case 'mc':
        $post1=DB::select('select * from posts where formato_id = ? order by post_id desc', [1]);
        $post=array();
        for ($i=0; $i < 5 ; $i++) {
          $a=0;
          foreach ($post1 as $key) {
            $likes = DB::select('select * from post_reactions where post_id = ?', [$key->post_id]);
            $soma= sizeof($likes);
            $b=0;

              for ($j=0; $j <sizeof($post); $j++) {
                if ($key->post_id == $post[$j]->post_id ){
                  $b=1;
                }
              }
              if ($soma >= $a && $b!=1 && $key->estado_post_id == 1) {
                $post[$i]= $key;

                $a=$soma;
              }
            }
          }

            break;
        case 'mr':
        $post=DB::table('posts')->where('formato_id', '=', 1)->orderBy('post_id', 'desc')->get();

             break;
        case 'mco':
        $post1=DB::select('select * from posts where formato_id = ? order by post_id desc', [1]);
        $post=array();
        for ($i=0; $i < 5 ; $i++) {
          $a=0;
          foreach ($post1 as $key) {
            $comment = DB::select('select * from comments where post_id = ?', [$key->post_id]);
            $soma=sizeof($comment);
            $b=0;

              for ($j=0; $j <sizeof($post); $j++) {
                if ($key->post_id == $post[$j]->post_id ){
                  $b=1;
                }
              }
              if ($soma >= $a && $b!=1 && $key->estado_post_id == 1) {
                $post[$i]= $key;

                $a=$soma;
              }
            }
          }

              break;
}
        $a=0;
        $dados = array();
        foreach ($post as $key) {
          $dados[$a] = $auth->DadosPost($key);
          $a++;
        }

        return view('videos.index',compact('account_name','dados','checkUserStatus','profile_picture','isUserHost','hasUserManyPages','allUserPages','conta_logada','page_content','notificacoes','notificacoes_count','dadosSeguida'));
    }

    public function tassumirvideos_final($id){
      $videos=[];
       switch ($id) {
         case 'ma':
           $videos=DB::select('select p.post_id,viram, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi,(select count(*) from views as v where v.post_id = p.post_id) as viram, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 order by  p.viram desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);
          break;
         case 'mg':
           $videos=DB::select('select p.post_id, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 and p.guardado=1 order by  p.post_id desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);

           break;
         case 'mc':
           $videos=DB::select('select p.post_id, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 order by  p.qtd_reacoes desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);

            break;
         case 'mr':
           $videos=DB::select('select p.post_id, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 order by  p.post_id desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);

             break;
         case 'mco':
           $videos=DB::select('select p.post_id, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ?) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1 and p.formato_id=1) as p where p.vi = 0 and p.formato_id=1 order by  p.qtd_comment desc limit 6',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);

              break;
}


        return $videos;
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
              if ($request->message!= NULL) {
                DB::table('posts')
                      ->where('uuid', $request->pass_post_uuid)
                      ->update([
                        'descricao' => $request->message,
                        'updated_at' => $controll->dat_create_update()
              ]);}

                 return redirect()->route('account.home.feed');
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
            if (sizeof($view) == 0) {
              /**/
                $result = DB::insert('insert into views(uuid, post_id, ip_view, conta_id, state_views_id, created_at) values(?, ?, ?, ?, ?, ?)',
                [$uuid, $post[0]->post_id, "", $conta_id, 2, $controll->dat_create_update()]);
            }
            $save_video = false;
            if ($request->video_add) {
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

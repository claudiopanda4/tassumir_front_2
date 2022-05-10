<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        //$dadosPage = Page::all();
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

    public function PP($controller)
    {
      $post=[];
      $auth = new AuthController();
      $dates = $auth->default_();
      $conta_logada= $dates['conta_logada'];
      $conta_logada_identify = $dates['conta_logada_identify'];
      //posts de paginas q segue

      $p1=DB::select('select * from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ? ) as vi, (select count(*) from seguidors where 	identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) and identificador_id_seguindo = ?) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = ?) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select comment from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as last_comment,(select comment_id from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as id_last_comment,(select uuid from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as uuid_last_comment,(select identificador_id from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as identificadorc_last_comment, (select count(*) from reactions_comments where comment_id = id_last_comment) as qtd_reaction_unic_comment,(select count(*) from reactions_comments where comment_id = id_last_comment and identificador_id = ?) as comment_s_n, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id  order by rand()) as p where p.vi = 0 and p.segui = 1 and estado_pagina_id = 1   order by rand() limit 10',[$conta_logada[0]->conta_id, $conta_logada_identify[0]->identificador_id,$conta_logada_identify[0]->identificador_id,$conta_logada[0]->conta_id,$conta_logada_identify[0]->identificador_id,$conta_logada[0]->conta_id,$conta_logada[0]->conta_id]);

      /*select * from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = 1 ) as vi, (select count(*) from seguidors where 	identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) and identificador_id_seguindo = 9) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.conta_id_a, pa.conta_id_b, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = 9) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = 1) as guardado, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select comment from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as last_comment,(select comment_id from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as id_last_comment,(select uuid from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as uuid_last_comment,(select identificador_id from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as identificadorc_last_comment, (select count(*) from reactions_comments where comment_id = id_last_comment) as qtd_reaction_unic_comment,(select count(*) from reactions_comments where comment_id = id_last_comment and identificador_id = 9) as comment_s_n, if(pa.conta_id_a = 1 || pa.conta_id_b = 1, 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id  order by rand()) as p where p.vi = 0 and p.segui = 0 and estado_pagina_id = 1   order by rand() limit 10*/
        //dd($p1);


      // posts de paginas q ñ segue
      $limit = 12 - sizeof($p1);
      $p2=DB::select('select * from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ? ) as vi, (select count(*) from seguidors where 	identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) and identificador_id_seguindo = ?) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = ?) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select comment from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as last_comment,(select comment_id from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as id_last_comment,(select uuid from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as uuid_last_comment,(select identificador_id from comments cm where cm.post_id = p.post_id order by comment_id desc limit 1) as identificadorc_last_comment, (select count(*) from reactions_comments where comment_id = id_last_comment) as qtd_reaction_unic_comment,(select count(*) from reactions_comments where comment_id = id_last_comment and identificador_id = ?) as comment_s_n, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id  order by rand()) as p where p.vi = 0 and p.segui = 0 and estado_pagina_id = 1   order by rand() limit ?',[$conta_logada[0]->conta_id, $conta_logada_identify[0]->identificador_id,$conta_logada_identify[0]->identificador_id,$conta_logada[0]->conta_id,$conta_logada_identify[0]->identificador_id,$conta_logada[0]->conta_id,$conta_logada[0]->conta_id, $limit]);

      //dd($p2);

      //$p2=DB::select('select * from (select p.*,(select pg.estado_pagina_id from pages as pg where p.page_id = pg.page_id ) as estado_pagina_id, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ? ) as vi, (select count(*) from seguidors where 	identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) and identificador_id_seguindo = ?) as segui  from posts as p order by rand()) as p where p.vi = 0 and p.segui = 0  order by rand() limit ?',[$conta_logada[0]->conta_id, $conta_logada_identify[0]->identificador_id, $limit]);
      $post= array_merge($p1, $p2);
      shuffle($post);
     //dd($post);
      //caso ñ tenha posts
      if (sizeof($post)<=0 && $controller=0) {
        $post=[];
      }
      return $post;
    }

    public function post_final1(Request $request)
    {

      $conta_logada= Auth::user()->conta_id;
      //dd($conta_logada);
      //posts de paginas q segue
      $post=DB::select('select p.post_id, p.thumbnail, p.uuid, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ? ) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1  order by rand()) as p where p.vi = 0 and p.segui = 1  order by rand() limit 4',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada]);
      //dd($post);

      return json_encode($post);
    }

    public function post_final2(Request $request)
    {
      $conta_logada= Auth::user()->conta_id;
      // posts de paginas q ñ segue
      $limit = $request->limit;
      $post=DB::select('select p.post_id, p.uuid, p.thumbnail, p.descricao, p.page_id, p.formato_id, p.created_at,p.file,segui,dono_page,page_uuid,page_tipo_relacionamento_id,page_nome,page_foto,guardado,qtd_reacoes, qtd_comment,reagi,page_identify from (select p.*, (select count(*) from views as v where v.post_id = p.post_id and v.conta_id = ? ) as vi, (select identificadors.identificador_id from identificadors where identificadors.id = p.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify, (select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_identify) as segui, pa.uuid as page_uuid, pa.tipo_relacionamento_id as page_tipo_relacionamento_id, pa.estado_pagina_id as estado_pagina_id, pa.nome as page_nome, pa.foto as page_foto, (select count(*) from post_reactions pr where pr.post_id = p.post_id) as qtd_reacoes, (select count(*) from comments cm where cm.post_id = p.post_id) as qtd_comment,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_identify) as reagi, (select count(*) from saveds as g where g.post_id = p.post_id and g.conta_id = ?) as guardado, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p inner join pages pa on p.page_id =pa.page_id where p.estado_post_id = 1 and pa.estado_pagina_id = 1  order by rand()) as p where p.vi = 0 and p.segui = 0  order by rand() limit ?',[$conta_logada,$conta_logada,$conta_logada,$conta_logada,$conta_logada, $limit]);
      //dd($post);
      return json_encode($post);
    }

    public function best_comment($id)
    {
      $best_comment=DB::select('select c.comment_id, c.uuid, c.comment,qtd_comment_reactions, (select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = my_identify) as ja_comment_reactions , if(tipo_verify = 1, (select nome from contas where conta_id = conta_identify ), (select nome from pages where page_id = conta_identify ) ) as nome_comment, if(tipo_verify = 1, (select apelido from contas where conta_id = conta_identify ), null) as apelido_comment, if(tipo_verify = 1,(select foto from contas where conta_id = conta_identify ), (select foto from pages where page_id = conta_identify )) as foto_comment from (select c.*, (select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_comment_reactions, (select tipo_identificador_id from identificadors where  identificador_id = c.identificador_id) as tipo_verify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as my_identify, (select id from identificadors where  identificador_id = c.identificador_id) as conta_identify   from comments as c where c.post_id = ?) as c order by qtd_comment_reactions desc, c.comment_id desc limit 1',[Auth::user()->conta_id, $id]);

      return $best_comment;
    }

    public function bests_comments($id,$a)
    {

    if ($a==0) {
        $bests_comments=DB::select('select c.comment_id, c.uuid, c.comment,qtd_comment_reactions,(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = my_identify) as ja_comment_reactions , if(tipo_verify = 1, (select nome from contas where conta_id = conta_identify ), (select nome from pages where page_id = conta_identify ) ) as nome_comment, if(tipo_verify = 1, (select apelido from contas where conta_id = conta_identify ), null) as apelido_comment, if(tipo_verify = 1,(select foto from contas where conta_id = conta_identify ), (select foto from pages where page_id = conta_identify )) as foto_comment from (select c.*, (select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_comment_reactions, (select tipo_identificador_id from identificadors where  identificador_id = c.identificador_id) as tipo_verify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as my_identify, (select id from identificadors where  identificador_id = c.identificador_id) as conta_identify   from comments as c where c.post_id = ? and c.comment_id > ?) as c order by qtd_comment_reactions desc, c.comment_id desc limit 10',[Auth::user()->conta_id, $id,$a]);
    }else {
        $bests_comments=DB::select('select c.comment_id, c.uuid, c.comment,qtd_comment_reactions,(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = my_identify) as ja_comment_reactions , if(tipo_verify = 1, (select nome from contas where conta_id = conta_identify ), (select nome from pages where page_id = conta_identify ) ) as nome_comment, if(tipo_verify = 1, (select apelido from contas where conta_id = conta_identify ), null) as apelido_comment, if(tipo_verify = 1,(select foto from contas where conta_id = conta_identify ), (select foto from pages where page_id = conta_identify )) as foto_comment from (select c.*, (select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_comment_reactions, (select tipo_identificador_id from identificadors where  identificador_id = c.identificador_id) as tipo_verify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as my_identify, (select id from identificadors where  identificador_id = c.identificador_id) as conta_identify   from comments as c where c.post_id = ? and c.comment_id < ?) as c order by qtd_comment_reactions desc, c.comment_id desc limit 10',[Auth::user()->conta_id, $id, $a]);
    }

      return $best_comment;
    }


    public function comments_post (Request $request, $id){
        $a = $request->since;
        //return response()->json($_REQUEST);
        if ($a == 0) {
            $ten_comments=DB::select('select c.comment_id, c.uuid, c.comment,qtd_comment_reactions,tipo_verify,if(dono_page=1,(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = page_identify),(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = my_identify)) as ja_comment_reactions, if(tipo_verify = 1, (select uuid from contas where conta_id = conta_identify ), (select uuid from pages where page_id = conta_identify ) ) as uuid_dono_comment, if(tipo_verify = 1, (select nome from contas where conta_id = conta_identify ), (select nome from pages where page_id = conta_identify ) ) as nome_comment, if(tipo_verify = 1, (select apelido from contas where conta_id = conta_identify ), null) as apelido_comment, if(tipo_verify = 1,(select foto from contas where conta_id = conta_identify ), (select foto from pages where page_id = conta_identify )) as foto_comment from (select c.*, (select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_comment_reactions, (select tipo_identificador_id from identificadors where  identificador_id = c.identificador_id) as tipo_verify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as my_identify, (select identificadors.identificador_id from identificadors where identificadors.id = (select p.page_id from posts as p where p.post_id= c.post_id) and identificadors.tipo_identificador_id = 2) as page_identify, (select id from identificadors where  identificador_id = c.identificador_id) as conta_identify, if((select pg.conta_id_a from pages as pg where pg.page_id=(select p.page_id from posts as p where p.post_id= c.post_id)) = ?|| (select pg.conta_id_b from pages as pg where pg.page_id=(select p.page_id from posts as p where p.post_id= c.post_id)) = ? , 1, 0) as dono_page from comments as c where c.post_id = (select post_id from posts where uuid = ?) and c.comment_id > ?) as c order by c.comment_id desc limit 10',[Auth::user()->conta_id,Auth::user()->conta_id,Auth::user()->conta_id, $id,$a]);
        }else {
            $ten_comments=DB::select('select c.comment_id, c.uuid, c.comment,qtd_comment_reactions,tipo_verify,if(dono_page=1,(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = page_identify),(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = my_identify)) as ja_comment_reactions, if(tipo_verify = 1, (select uuid from contas where conta_id = conta_identify ), (select uuid from pages where page_id = conta_identify ) ) as uuid_dono_comment, if(tipo_verify = 1, (select nome from contas where conta_id = conta_identify ), (select nome from pages where page_id = conta_identify ) ) as nome_comment, if(tipo_verify = 1, (select apelido from contas where conta_id = conta_identify ), null) as apelido_comment, if(tipo_verify = 1,(select foto from contas where conta_id = conta_identify ), (select foto from pages where page_id = conta_identify )) as foto_comment from (select c.*, (select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_comment_reactions, (select tipo_identificador_id from identificadors where  identificador_id = c.identificador_id) as tipo_verify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as my_identify, (select identificadors.identificador_id from identificadors where identificadors.id = (select p.page_id from posts as p where p.post_id= c.post_id) and identificadors.tipo_identificador_id = 2) as page_identify, (select id from identificadors where  identificador_id = c.identificador_id) as conta_identify, if((select pg.conta_id_a from pages as pg where pg.page_id=(select p.page_id from posts as p where p.post_id= c.post_id)) = ?|| (select pg.conta_id_b from pages as pg where pg.page_id=(select p.page_id from posts as p where p.post_id= c.post_id)) = ? , 1, 0) as dono_page   from comments as c where c.post_id = (select post_id from posts where uuid = ?) and c.comment_id < ?) as c order by c.comment_id desc limit 10',[Auth::user()->conta_id,Auth::user()->conta_id,Auth::user()->conta_id, $id,$a]);
        }
        return response()->json($ten_comments);
    }

    public function get_posts($init, $aux_post, $pegar_posts, $verificacao){

      if ($init == 0) {
        $verificar_post= DB::select('select * from posts where estado_post_id = ? and post_id > ? order by post_id desc limit 1000', [1, $init]);
        if (sizeof($verificar_post)>0) {
          $init=$verificar_post[sizeof($verificar_post) - 1]->post_id;
          shuffle($verificar_post);
        }
      }else {
        $verificar_post= DB::select('select * from posts where estado_post_id = ? and post_id < ? order by post_id desc limit 1000', [1, $init]);;
        if (sizeof($verificar_post)>0) {
          $init=$verificar_post[sizeof($verificar_post) - 1]->post_id;
          shuffle($verificar_post);
        }
      }


        //dd($verificar_post);

      if (sizeof($verificar_post)>0) {
      //--------------------------------------------------------------------------------
      $pegar_posts= $this->verificar_post($verificar_post, $aux_post, $pegar_posts);
      $aux_post=sizeof($pegar_posts);
    // dd($pegar_posts);
      $init_post = DB::select('select * from posts limit 1');
      $init_post = $init_post[0]->post_id;
      //dd($init_post);
      if (sizeof($pegar_posts) < 10 && $init != $init_post) {
        $pegar_posts=$this->get_posts($init, $aux_post, $pegar_posts, $verificacao);
      }
       elseif (sizeof($pegar_posts) < 10 && $init == $init_post && $verificacao == 0) {
         $pegar_posts=$this->preencher_com_destacados($aux_post, $pegar_posts);
         return $pegar_posts;
      }
      elseif (sizeof($pegar_posts) == 10) {
        return $pegar_posts;
      }

      //--------------------------------------------------------------------------------
    }elseif (sizeof($verificar_post)==0 && sizeof($pegar_posts)==0){
                        //dd($pegar_posts);
      return $pegar_posts;

    }

  return $pegar_posts;
    }

    public function verificar_post($verificar_post, $aux_post, $pegar_posts)
    {
      $auth = new AuthController();
      $dates = $auth->default_();
      $conta_logada = $dates['conta_logada'];
      $conta_logada_identify = $dates['conta_logada_identify'];
      $v_pagina_seguida= DB::table('seguidors')->where('identificador_id_seguindo', $conta_logada_identify[0]->identificador_id)->limit(4)->get();
      $count=0;

                       if (sizeof($verificar_post) > 0){

                         foreach ($verificar_post as $key) {

                           $aux_post_views= $this->verificar_post_views($key->post_id, $conta_logada[0]->conta_id);

                           if (sizeof($v_pagina_seguida)>0) {
                           $aux_pagina_seguida= $this->verificar_post_pertence_pagina_seguida($key->page_id, $conta_logada_identify[0]->identificador_id);
                           if ($aux_post_views == 0 && $aux_pagina_seguida == 0 && $aux_post < 10) {
                             $pegar_posts[$aux_post]= $key;
                             $aux_post++;
                           }elseif ($aux_post_views == 0 && $aux_pagina_seguida == 1 && $aux_post >= 10 && $count<2) {
                               $pegar_posts[$aux_post]= $key;
                               $aux_post++;
                               $count++;
                           }
                         }else {

                           if ($aux_post_views == 0 && $aux_post < 10) {
                             $pegar_posts[$aux_post]= $key;
                             $aux_post++;
                           }
                         }
                         }
                       }

                       return $pegar_posts;
    }


    public function preencher_com_destacados($aux_post, $pegar_posts)
    {
      $auth = new AuthController();
      $destacados = $auth->Destacados();
      shuffle($destacados);

      if (sizeof($pegar_posts)>0) {
      for ($j=0; $j < sizeof($destacados); $j++) {
          for ($i=0; $i < sizeof($pegar_posts); $i++) {
              if ($pegar_posts[$i]->post_id != $destacados[$j]['post_id']) {
                $verificar_post= DB::select('select * from posts where post_id = ? ',[$destacados[$j]['post_id']]);
                $pegar_posts[$aux_post]= $verificar_post[0];
                $aux_post++;
                if (sizeof($pegar_posts)==10) {
                  $i = sizeof($pegar_posts);
                  $j = sizeof($destacados);
                }else {
                  $i = sizeof($pegar_posts);
                }
              }
            }
         }
       }else {
         for ($i=0; $i < sizeof($destacados); $i++) {
               $verificar_post= DB::select('select * from posts where post_id = ? ',[$destacados[$i]['post_id']]);
               $pegar_posts[$aux_post]= $verificar_post[0];
               $aux_post++;
               if (sizeof($pegar_posts)==10) {
                 $i = sizeof($destacados);
               }
             }
       }


                       return $pegar_posts;
    }


    public function verificar_post_views($id, $conta_logada)
    {
      $verificar_post_views=DB::select('select post_id from views where conta_id = ?', [$conta_logada]);
              $aux_post_views=0;
                       if (sizeof($verificar_post_views) > 0){
                         for ($i=sizeof($verificar_post_views) - 1; $i>=0; $i--) {
                           if ($id == $verificar_post_views[$i]->post_id) {
                             $aux_post_views=1;
                             $i=0;
                           }
                         }
                       }

                       return $aux_post_views;

    }

    public function verificar_post_pertence_pagina_seguida($id, $conta_logada_identify)
    {
      $verificar_post_pertence_pagina_seguida=DB::select('select identificador_id_seguida from seguidors where identificador_id_seguindo = ?', [$conta_logada_identify]);
      $aux_pagina_seguida=1;

                      if (sizeof($verificar_post_pertence_pagina_seguida)>0) {
                        for ($i=sizeof($verificar_post_pertence_pagina_seguida) - 1; $i>=0; $i--) {
                          $page_id = DB::select('select id from identificadors where identificador_id = ?', [$verificar_post_pertence_pagina_seguida[$i]->identificador_id_seguida]);
                          if ($id == $page_id[0]->id) {
                            $aux_pagina_seguida=0;
                            $i=0;
                          }
                        }
                      }

                      return $aux_pagina_seguida;

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
        $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
        $paginasSeguidas = $dates['paginasSeguidas'];
        $dadosSeguida = $dates['dadosSeguida'];
        $notificacoes_count = $dates['notificacoes_count'];

        //=========================================================
        $paginasSeguidas = $auth->paginasSeguidas();
        $paginasNaoSeguidas = $auth->paginasNaoSeguidas();
        $page_current = 'edit_couple';
        $conta_logada = $auth->defaultDate();
        $page=DB::select('select uuid,nome,foto,tipo_relacionamento_id from pages where uuid = ?', [$id]);


        return view('pagina.edit_couple', compact('account_name','page','notificacoes_count','notificacoes', 'conta_logada', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'dadosSeguida', 'paginasSeguidas', 'paginasNaoSeguidas'));
    }

    public function view_delete_couple_page($id)
    {
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
        $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
        $paginasSeguidas = $dates['paginasSeguidas'];
        $dadosSeguida = $dates['dadosSeguida'];
        $notificacoes_count = $dates['notificacoes_count'];

        //=========================================================
        $paginasSeguidas = $auth->paginasSeguidas();
        $paginasNaoSeguidas = $auth->paginasNaoSeguidas();
        $page_current = 'edit_couple';
        $conta_logada = $auth->defaultDate();
        $page=DB::select('select * from pages where uuid = ?', [$id]);


        return view('pagina.delete_couple_page', compact('account_name','page','notificacoes_count','notificacoes', 'conta_logada', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'dadosSeguida', 'paginasSeguidas', 'paginasNaoSeguidas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);

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

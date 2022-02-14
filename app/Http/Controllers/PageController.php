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



    public function get_posts($init, $aux_post, $pegar_posts){
      $auth = new AuthController();
      $dates = $auth->default_();
      $conta_logada_identify = $dates['conta_logada_identify'];


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



      if (sizeof($verificar_post)>0) {
      //--------------------------------------------------------------------------------
      $pegar_posts= $this->verificar_post($verificar_post, $aux_post, $pegar_posts);
      $aux_post=sizeof($pegar_posts);
      //dd($pegar_posts);
      $init_post = DB::select('select * from posts limit 1');
      $init_post = $init_post[0]->post_id;
      //dd($init_post);
      if (sizeof($pegar_posts) < 10 && $init != $init_post) {
        $pegar_posts=$this->get_posts($init, $aux_post, $pegar_posts);
      }
       elseif (sizeof($pegar_posts)<10 && $init == $init_post) {
         $pegar_posts=$this->preencher_com_destacados($aux_post, $pegar_posts);
         return $pegar_posts;
      }
      elseif (sizeof($pegar_posts) == 10) {
        return $pegar_posts;
      }else{
        return [];
      }


      //--------------------------------------------------------------------------------
    }elseif (sizeof($verificar_post)==0 && sizeof($pegar_posts)==0){
                        dd($pegar_posts);

      return $pegar_posts;

    }

    }

    public function verificar_post($verificar_post, $aux_post, $pegar_posts)
    {
      $auth = new AuthController();
      $dates = $auth->default_();
      $conta_logada = $dates['conta_logada'];
      $conta_logada_identify = $dates['conta_logada_identify'];
      $v_pagina_seguida= DB::table('seguidors')->where('identificador_id_seguindo', $conta_logada_identify[0]->identificador_id)->limit(4)->get();


                       if (sizeof($verificar_post) > 0){

                         foreach ($verificar_post as $key) {

                           $aux_post_views= $this->verificar_post_views($key->post_id, $conta_logada[0]->conta_id);

                           if (sizeof($v_pagina_seguida)>0) {
                           $aux_pagina_seguida= $this->verificar_post_pertence_pagina_seguida($key->post_id, $conta_logada_identify[0]->identificador_id);

                           if ($aux_post_views == 0 && $aux_pagina_seguida == 0 && $aux_post < 10) {
                             $pegar_posts[$aux_post]= $key;
                             $aux_post++;
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
      $aux_pagina_seguida=0;

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
        $page=DB::select('select * from pages where uuid = ?', [$id]);


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

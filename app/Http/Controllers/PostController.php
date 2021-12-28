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
        dd($posts);
        //;
    }

    public function posts() {
        $dados = [];
        $total_posts = 10;
        $i = 0;
        $posts = $this->get_posts();
        $dados = array();
        if (sizeof($posts) < 10) {
            $posts_size = sizeof($posts);
            //dd($posts);
            $total_posts = $total_posts - $posts_size;
            $i = 0;
            $destaques = $this->destaques($total_posts);
            $destaques_size = sizeof($destaques);
            $key = 0;
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
        }
        return $dados;
    }
    public function get_posts () {
        DB::beginTransaction();
        try {
            $page_controller = new PageController();
            $account_id = Auth::user()->conta_id;
            //dd($account_id);
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
            $post = DB::select('select * from posts limit 1');
            if (sizeof($post) > 0) {
                $aux1 = sizeof($post) > 0 ? $post[0]->post_id - 1 : 0;
                $post_views = DB::select('select * from views limit 1');
                $aux = sizeof($post_views) > 0 ? $post_views[0]->view_id - 1 : 0;
                while ($control_posts < 2 && sizeof($posts_return) < 10) {
                    while ((sizeof($posts_return) < 10 && $counter >= 0))  {
                        $post_views = DB::select('select post_id, conta_id from views where conta_id = ? and view_id > ? limit 4', [$account_id, $aux]);
                        $posts = DB::select('select * from posts where estado_post_id = ? and post_id > ? limit 4', [1, $aux1]);
                        $ii = 0;
                        $key_store;
                        foreach ($posts as $key => $value) {
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
                            $result = !$result;
                        }
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
                }
                //dd($posts_return);
            }
            DB::commit();
            return $posts_return;
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    public function posts_no_follow(){

    }
    public function posts_no(){

    }
    public function view($post_id, $account_id){
        $post_views = DB::select('select post_id, conta_id from views where conta_id = ? && post_id = ? limit 1', [$account_id, $post_id]);
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
            //dd($post);
            $video = $post[0]->file;
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
        $post1=DB::select('select * from posts where formato_id = ?', [1]);
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
        $post1=DB::select('select * from posts where formato_id = ?', [1]);
        $post=array();
        for ($i=0; $i < 5 ; $i++) {
          $a=0;
          foreach ($post1 as $key) {
            $soma=$key->post_id;
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
        case 'mco':
        $post1=DB::select('select * from posts where formato_id = ?', [1]);
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

    public function destaques($limit){
        $posts = DB::select('select * from posts limit ?', [$limit]);
        $post_drafted = array();
        $aux;
        $reactions_posts = array();
        $destaques = array();
        $i = 0;
        while ($i < sizeof($posts)){
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
        return $destaques;
    }

    public function view_post(Request $request)
    {
        DB::beginTransaction();
        try {
            $line = $request->data."";
            $data = explode('_', $line);
            $post_uuid = $data[2];
            $account_uuid = $data[3];
            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();

            $post = DB::select('select * from posts where uuid = ?', [$post_uuid]);
            $conta = DB::select('select * from contas where uuid = ?', [$account_uuid]);
            $view = DB::select('select * from views where post_id = ? AND conta_id = ?', [$post[0]->post_id, $conta[0]->conta_id]);
            if (sizeof($view) <= 0) {
                $result = DB::insert('insert into views(uuid, post_id, ip_view, conta_id) values(?, ?, ?, ?)',
                [$uuid, $post[0]->post_id, "", $conta[0]->conta_id]);
            }
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

<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaginaCasalController;

class PerfilController extends Controller
{
    private $auth;
    private $casalPage;

    public function __construct()
    {
        $this->auth = new AuthController();
        $this->casalPage = new PaginaCasalController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function dadosPerfil($id){
       $controll = new AuthController();
        $dates = $controll->default_();
       $conta_logada = $dates['conta_logada'];

       $account_name=DB::select('select * from contas where uuid  = ?', [$id]);
       $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
       $lenght = sizeof($aux1);
       $gostos=array();
       $a=0;
       //dd($lenght);
       if ($lenght > 0) {
         $post_reactions= DB::select('select * from post_reactions where identificador_id = ?', [$aux1[0]->identificador_id]);
           $seguidor = DB::select('select * from seguidors where identificador_id_seguindo = ?', [ $aux1[0]->identificador_id]);
           $guardado= DB::select('select * from saveds where conta_id =  ?', [$account_name[0]->conta_id]);
           $verificacao_pedido= DB::select('select * from pedido_relacionamentos where (conta_id_pedida, conta_id_pedinte) = (?, ?)', [$account_name[0]->conta_id, $conta_logada[0]->conta_id]);
           $verificacao_pedido1= DB::select('select * from pedido_relacionamentos where (conta_id_pedida, conta_id_pedinte) = (?, ?)', [$conta_logada[0]->conta_id, $account_name[0]->conta_id]);
           $verificacao_page= DB::select('select * from pages where (conta_id_a,tipo_page_id) = (?, ?)', [$account_name[0]->conta_id, 1]);
           $verificacao_page1= DB::select('select * from pages where (conta_id_b,tipo_page_id) = (?, ?)', [$account_name[0]->conta_id, 1]);
           $verificacao_page2= DB::select('select * from pages where (conta_id_a,tipo_page_id) = (?, ?)', [$conta_logada[0]->conta_id, 1]);
           $verificacao_page3= DB::select('select * from pages where (conta_id_b,tipo_page_id) = (?, ?)', [$conta_logada[0]->conta_id, 1]);

           $perfil[0]['verificacao_relac']=0;
           if (sizeof($verificacao_page) > 0){
             foreach ($verificacao_page as $key) {
               if ($key->tipo_relacionamento_id != 1) {
                 $perfil[0]['verificacao_relac']=1;
                 if ($key->tipo_relacionamento_id == 2) {
                 $perfil[0]['relac']="Noivo de ";
               }elseif ($key->tipo_relacionamento_id == 3) {
                 $perfil[0]['relac']="Apresentado(a) ";
               }elseif ($key->tipo_relacionamento_id == 4) {
                 $perfil[0]['relac']="Casado(a) com ";
               }elseif ($key->tipo_relacionamento_id == 5) {
                 $perfil[0]['relac']="Namorado(a) de ";
               }

               $conta = DB::select('select * from contas where conta_id = ?', [$key->conta_id_b]);

                 $perfil[0]['relac1']=$conta[0]->nome;
                 $perfil[0]['relac1'].=" ";
                 $perfil[0]['relac1'].=$conta[0]->apelido;
           }
           }
           }elseif (sizeof($verificacao_page1) > 0){
           foreach ($verificacao_page1 as $key) {
           if ($key->tipo_relacionamento_id != 1) {
             $perfil[0]['verificacao_relac']=1;
             if ($key->tipo_relacionamento_id == 2) {
             $perfil[0]['relac']="Noivo(a) de ";
           }elseif ($key->tipo_relacionamento_id == 3) {
             $perfil[0]['relac']="Apresentado(a) ";
           }elseif ($key->tipo_relacionamento_id == 4) {
             $perfil[0]['relac']="Casado(a) com ";
           }elseif ($key->tipo_relacionamento_id == 5) {
             $perfil[0]['relac']="Namorado(a) de";
           }

           $conta = DB::select('select * from contas where conta_id = ?', [$key->conta_id_a]);

             $perfil[0]['relac1']=$conta[0]->nome;
             $perfil[0]['relac1'].=" ";
             $perfil[0]['relac1'].=$conta[0]->apelido;
           }

           }
           }
           $perfil[0]['Pedido_relac_uuid']=0;
           $perfil[0]['not_id']=0;
             if (sizeof($verificacao_pedido)>0) {
               if ($verificacao_pedido[0]->estado_pedido_relac_id == 1) {
                 $perfil[0]['Pedido_relac_uuid']=$verificacao_pedido[0]->uuid;
                 $n1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
                 $n2 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
                 $n3 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$verificacao_pedido[0]->pedido_relacionamento_id, 5 ]);
                 $n4=DB::select('select * from notifications where (identificador_id_causador,identificador_id_destino,identificador_id_receptor, 	id_action_notification) = (?, ?, ?, ?)', [$n2[0]->identificador_id,$n3[0]->identificador_id,$n1[0]->identificador_id, 4]);
                 $perfil[0]['not_id']=$n4[0]->notification_id;
                 $perfil[0]['verificacao_pedido']=1;
               }elseif ($verificacao_pedido[0]->estado_pedido_relac_id == 2) {
                 $perfil[0]['Pedido_relac_uuid']=$verificacao_pedido[0]->uuid;
                 $n1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
                 $n2 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
                 $n3 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$verificacao_pedido[0]->pedido_relacionamento_id, 5 ]);
                 $n4=DB::select('select * from notifications where (identificador_id_causador,identificador_id_destino,identificador_id_receptor, 	id_action_notification) = (?, ?, ?, ?)', [$n1[0]->identificador_id,$n3[0]->identificador_id,$n2[0]->identificador_id, 7]);
                 $perfil[0]['not_id']=$n4[0]->notification_id;
                 $perfil[0]['verificacao_pedido']=2;
               }
               else {
                 $perfil[0]['verificacao_pedido']=3;
               }
             }else {
               $perfil[0]['verificacao_pedido']=0;
             }
             if (sizeof($verificacao_pedido1)>0) {
               if ($verificacao_pedido1[0]->estado_pedido_relac_id== 1) {
                 $perfil[0]['Pedido_relac_uuid']=$verificacao_pedido1[0]->uuid;
                 $n1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
                 $n2 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
                 $n3 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$verificacao_pedido1[0]->pedido_relacionamento_id, 5 ]);
                 $n4=DB::select('select * from notifications where (identificador_id_causador,identificador_id_destino,identificador_id_receptor, 	id_action_notification ) = (?, ?, ?, ?)', [$n1[0]->identificador_id,$n3[0]->identificador_id,$n2[0]->identificador_id, 4]);
                 $perfil[0]['not_id']=$n4[0]->notification_id;
                 $perfil[0]['verificacao_pedido1']=sizeof($verificacao_pedido1);
               }else {
                 $perfil[0]['verificacao_pedido1']=2;
               }
             }else {
               $perfil[0]['verificacao_pedido1']=0;
             }
             $perfil[0]['verificacao_page']=sizeof($verificacao_page);
             $perfil[0]['verificacao_page1']=sizeof($verificacao_page1);
             $perfil[0]['verificacao_page2']=sizeof($verificacao_page2);
             $perfil[0]['verificacao_page3']=sizeof($verificacao_page3);
             $perfil[0]['qtd_ps']=sizeof($seguidor);
             $perfil[0]['qtd_like']=sizeof($post_reactions);
             $perfil[0]['qtd_guardados']=sizeof($guardado);
             foreach ($post_reactions as $key ) {
               $posts=DB::select('select * from posts where post_id = ?', [$key->post_id]);
               if (sizeof($posts) > 0) {
              $page= DB::select('select * from pages where page_id = ?', [$posts[0]->page_id]);
              $gostos[$a]['nome_page']=$page[0]->nome;
              $gostos[$a]['page_uuid']=$page[0]->uuid;
              $gostos[$a]['foto_page']=$page[0]->foto;
              $gostos[$a]['formato']=$posts[0]->formato_id;
              $gostos[$a]['file']=$posts[0]->file;
              $gostos[$a]['post']=$posts[0]->descricao;
              $gostos[$a]['post_id']=$posts[0]->post_id;
              $gostos[$a]['post_uuid']=$posts[0]->uuid;
              $a++;
              }
             }
             $a=0;
             $guardadosP=array();
             foreach ($guardado as $key ) {
               $posts=DB::select('select * from posts where post_id = ?', [$key->post_id]);
               if (sizeof($posts) > 0) {
              $page= DB::select('select * from pages where page_id = ?', [$posts[0]->page_id]);
              $guardadosP[$a]['nome_page']=$page[0]->nome;
              $guardadosP[$a]['page_uuid']=$page[0]->uuid;
              $guardadosP[$a]['foto_page']=$page[0]->foto;
              $guardadosP[$a]['formato']=$posts[0]->formato_id;
              $guardadosP[$a]['file']=$posts[0]->file;
              $guardadosP[$a]['post']=$posts[0]->descricao;
              $guardadosP[$a]['post_id']=$posts[0]->post_id;
              $guardadosP[$a]['post_uuid']=$posts[0]->uuid;
              $a++;
              }
             }

       } else {
         $perfil[0]['qtd_ps'] = 0;
       }
       $dadosP = [
           "perfil" => $perfil,
           "gostos" => $gostos,
           "account_name" => $account_name,
           "guardadosP" => $guardadosP,
       ];
       return $dadosP;


     }



    public function index()
    {
        try {

          $controll = new AuthController();
           $dates = $controll->default_();
            $checkUserStatus = $dates['checkUserStatus'];
            $profile_picture = $dates['profile_picture'];
            $isUserHost = $dates['isUserHost'];
            $hasUserManyPages = $dates['hasUserManyPages'];
            $allUserPages = $dates['allUserPages'];
            $page_content = $dates['page_content'];
            $conta_logada = $dates['conta_logada'];
            $dadosP = $this->dadosPerfil($conta_logada[0]->uuid);
            $perfil=$dadosP['perfil'];
            $gostos=$dadosP['gostos'];
            $account_name=$dadosP['account_name'];
            $guardadosP=$dadosP['guardadosP'];
            $tipos_de_relacionamento=DB::table('tipo_relacionamentos')->get();
            $notificacoes = $dates['notificacoes'];
            $notificacoes_count = $dates['notificacoes_count'];
            $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
            $paginasSeguidas = $dates['paginasSeguidas'];
            $dadosSeguida = $dates['dadosSeguida'];
            $this->active_account_id = $account_name[0]->conta_id;
            //---------------------------------------------------------------------
             $authctrol = new AuthController;
            $paginasSeguidas = $authctrol->paginasSeguidas();
            $paginasNaoSeguidas = $authctrol->paginasNaoSeguidas();
             $dadosSeguida = DB::table('seguidors')
             ->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')
             ->select('seguidors.*', 'identificadors.id')
             ->get();



              $page_current = 'profile';

              //dd($account_name);



              return view('perfil.index', compact('account_name','guardadosP','notificacoes_count', 'notificacoes','gostos', 'perfil', 'checkUserStatus', 'profile_picture', 'conta_logada', 'tipos_de_relacionamento', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'page_content', 'dadosSeguida', 'paginasSeguidas', 'paginasNaoSeguidas'));



        } catch (Exception $e) {
            dd('erro');
        }
    }

    public function perfil_das_contas($id)
    {
        try {

          $page_couple = new PaginaCasalController();
          $controll = new AuthController();
           $dates = $controll->default_();
            $checkUserStatus = $dates['checkUserStatus'];
            $profile_picture = $dates['profile_picture'];
            $isUserHost = $dates['isUserHost'];
            $hasUserManyPages = $dates['hasUserManyPages'];
            $allUserPages = $dates['allUserPages'];
            $page_content = $dates['page_content'];
            $conta_logada = $dates['conta_logada'];
            $notificacoes = $dates['notificacoes'];
            $notificacoes_count = $dates['notificacoes_count'];
            $paginasSeguidas = $dates['paginasSeguidas'];
            $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
            $dadosSeguida = $dates['dadosSeguida'];


            //-------------------------------------------------------------------------
              $tipos_de_relacionamento=DB::table('tipo_relacionamentos')->get();
              $account_name=DB::select('select * from contas where uuid  = ?', [$id]);
              $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
              $lenght = sizeof($aux1);
              $gostos=array();
              $a=0;
              //dd($lenght);
              if ($lenght > 0) {
                $post_reactions= DB::select('select * from post_reactions where identificador_id = ?', [$aux1[0]->identificador_id]);
                  $seguidor = DB::select('select * from seguidors where identificador_id_seguindo = ?', [ $aux1[0]->identificador_id]);
                  $guardado= DB::select('select * from saveds where conta_id =  ?', [$account_name[0]->conta_id]);
                  $verificacao_pedido= DB::select('select * from pedido_relacionamentos where (conta_id_pedida, conta_id_pedinte) = (?, ?)', [$account_name[0]->conta_id, $conta_logada[0]->conta_id]);
                  $verificacao_pedido1= DB::select('select * from pedido_relacionamentos where (conta_id_pedida, conta_id_pedinte) = (?, ?)', [$conta_logada[0]->conta_id, $account_name[0]->conta_id]);
                  $verificacao_page= DB::select('select * from pages where conta_id_a = ?', [$account_name[0]->conta_id]);
                  $verificacao_page1= DB::select('select * from pages where conta_id_b = ?', [$account_name[0]->conta_id]);
                  $verificacao_page2= DB::select('select * from pages where conta_id_a = ?', [$conta_logada[0]->conta_id]);
                  $verificacao_page3= DB::select('select * from pages where conta_id_b = ?', [$conta_logada[0]->conta_id]);

                  $authctrol = new AuthController;
                  $paginasSeguidas = $authctrol->paginasSeguidas();
                  $paginasNaoSeguidas = $authctrol->paginasNaoSeguidas();
                  $dadosSeguida = DB::table('seguidors')->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')->select('seguidors.*', 'identificadors.id')->get();

                  $perfil[0]['verificacao_relac']=0;
                  if (sizeof($verificacao_page) > 0){
                    foreach ($verificacao_page as $key) {
                      if ($key->tipo_relacionamento_id != 1) {
                        $perfil[0]['verificacao_relac']=1;
                        if ($key->tipo_relacionamento_id == 2) {
                        $perfil[0]['relac']="Noivo de ";
                      }elseif ($key->tipo_relacionamento_id == 3) {
                        $perfil[0]['relac']="Apresentado(a) ";
                      }elseif ($key->tipo_relacionamento_id == 4) {
                        $perfil[0]['relac']="Casado(a) com ";
                      }elseif ($key->tipo_relacionamento_id == 5) {
                        $perfil[0]['relac']="Namorado(a) de ";
                      }

                      $conta = DB::select('select * from contas where conta_id = ?', [$key->conta_id_b]);

                        $perfil[0]['relac1']=$conta[0]->nome;
                        $perfil[0]['relac1'].=" ";
                        $perfil[0]['relac1'].=$conta[0]->apelido;
                  }
                  }
                  }elseif (sizeof($verificacao_page1) > 0){
                  foreach ($verificacao_page1 as $key) {
                  if ($key->tipo_relacionamento_id != 1) {
                    $perfil[0]['verificacao_relac']=1;
                    if ($key->tipo_relacionamento_id == 2) {
                    $perfil[0]['relac']="Noivo(a) de ";
                  }elseif ($key->tipo_relacionamento_id == 3) {
                    $perfil[0]['relac']="Apresentado(a) ";
                  }elseif ($key->tipo_relacionamento_id == 4) {
                    $perfil[0]['relac']="Casado(a) com ";
                  }elseif ($key->tipo_relacionamento_id == 5) {
                    $perfil[0]['relac']="Namorado(a) de";
                  }

                  $conta = DB::select('select * from contas where conta_id = ?', [$key->conta_id_a]);

                    $perfil[0]['relac1']=$conta[0]->nome;
                    $perfil[0]['relac1'].=" ";
                    $perfil[0]['relac1'].=$conta[0]->apelido;
                  }
                  }
                  }

                    $perfil[0]['verificacao_pedido']=sizeof($verificacao_pedido);
                    $perfil[0]['verificacao_pedido1']=sizeof($verificacao_pedido1);
                    $perfil[0]['verificacao_page']=sizeof($verificacao_page);
                    $perfil[0]['verificacao_page1']=sizeof($verificacao_page1);
                    $perfil[0]['verificacao_page2']=sizeof($verificacao_page2);
                    $perfil[0]['verificacao_page3']=sizeof($verificacao_page3);
                    $perfil[0]['qtd_ps']=sizeof($seguidor);
                    $perfil[0]['qtd_like']=sizeof($post_reactions);
                    $perfil[0]['qtd_guardados']=sizeof($guardado);
                    foreach ($post_reactions as $key ) {
                      $posts=DB::select('select * from posts where post_id = ?', [$key->post_id]);
                      if (sizeof($posts) > 0) {
                     $page= DB::select('select * from pages where page_id = ?', [$posts[0]->page_id]);
                     $gostos[$a]['nome_page']=$page[0]->nome;
                     $gostos[$a]['page_uuid']=$page[0]->uuid;
                     $gostos[$a]['foto_page']=$page[0]->foto;
                     $gostos[$a]['formato']=$posts[0]->formato_id;
                     $gostos[$a]['file']=$posts[0]->file;
                     $gostos[$a]['post']=$posts[0]->descricao;
                     $gostos[$a]['post_id']=$posts[0]->post_id;
                     $gostos[$a]['post_uuid']=$posts[0]->uuid;
                     $a++;
                     }
                    }

              } else {
                $perfil[0]['qtd_ps'] = 0;
              }

            $dadosP = $this->dadosPerfil($id);
            $perfil=$dadosP['perfil'];
            $gostos=$dadosP['gostos'];
            $account_name=$dadosP['account_name'];
            $guardadosP=$dadosP['guardadosP'];
            $tipos_de_relacionamento=DB::table('tipo_relacionamentos')->get();
            $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);

            foreach ($dadosSgndo as $value) {
                $valor = $value->identificador_id;
            }

            $dadoSeguindo = DB::table('seguidors')->where('identificador_id_seguindo', $valor)->join('identificadors', 'seguidors.identificador_id_seguindo', '=', 'identificadors.identificador_id')
            ->select('seguidors.*', 'identificadors.id')
            ->get();

            $tt = 0;
            //-------------------------------------------------------------------------


              $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
              $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
              $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
              $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
              $page_content = $page_couple->page_default_date($account_name);
              $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);


              //dd($account_name);


              $page_current = 'profile';

              //-----------------------------------------------------------------------------------------------------------------------------------------




              return view('perfil.index', compact('account_name','guardadosP', 'notificacoes_count','notificacoes', 'gostos', 'perfil','conta_logada', 'tipos_de_relacionamento', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'page_content', 'dadosSeguida', 'paginasSeguidas', 'paginasNaoSeguidas'));


        } catch (Exception $e) {
            dd('erro');
        }
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
     * @param  \App\Models\Perfil $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit($perfil)
    {
        try {
          $account_name = DB::select('select * from contas where uuid = ?', [$perfil]);

          $page_couple = new PaginaCasalController();
          $controll = new AuthController();
           $dates = $controll->default_();
          $account_name = $dates['account_name'];
          $checkUserStatus = $dates['checkUserStatus'];
          $profile_picture = $dates['profile_picture'];
          $isUserHost = $dates['isUserHost'];
          $hasUserManyPages = $dates['hasUserManyPages'];
          $allUserPages = $dates['allUserPages'];
          $page_content = $dates['page_content'];
          $conta_logada = $dates['conta_logada'];
          $notificacoes = $dates['notificacoes'];
          $notificacoes_count = $dates['notificacoes_count'];
          $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
          $paginasSeguidas = $dates['paginasSeguidas'];
          $dadosSeguida = $dates['dadosSeguida'];

          $authctrol = new AuthController;
            $paginasSeguidas = $authctrol->paginasSeguidas();
            $paginasNaoSeguidas = $authctrol->paginasNaoSeguidas();
          $dadosSeguida = DB::table('seguidors')
             ->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')
             ->select('seguidors.*', 'identificadors.id')
             ->get();

            $page_current = 'profile';



            return view('perfil.edit', compact('account_name','notificacoes_count', 'notificacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'page_content', 'dadosSeguida', 'paginasNaoSeguidas', 'paginasSeguidas', 'conta_logada'));

        } catch (Exception $e) {
            dd('erro');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
          $auth = new AuthController();
          $account_name = $auth->defaultDate();
          //dd($request->genre);
          $date_create_update=date("Y");
          $date_create_update.="-";
          $date_create_update.=date("m");
          $date_create_update.="-";
          $date_create_update.=date("d");
          $date_create_update.=" ";
          $date_create_update.=date("H");
          $date_create_update.=":";
          $date_create_update.=date("i");
          $date_create_update.=":";
          $date_create_update.=date("s");
          DB::table('contas')
                ->where('conta_id', $account_name[0]->conta_id)
                ->update([
                  'nome' => $request->nome,
                  'apelido' => $request->apelido,
                  'genero' => $request->genre,
                  'descricao' => $request->bio,
                  'email' => $request->email,
                  'telefone' => $request->telefone,
                  'updated_at' => $request->$date_create_update

              ]);
              return redirect()->route('account.profile');
        } catch (Exception $e) {
            dd('erro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }

    public function Pedido_relac(Request $request)
    {
        try {
          $controll = new AuthController();


          $conta_pedida=array();
          $verificacao_page_conta_pedida_b=array();
          $verificacao_page_conta_pedida_a=array();
          $verificacao_pedido=array();
          $conta_pedinte = Auth::user()->conta_id;
          $conta_pedida = DB::select('select * from contas where uuid = ?', [$request->conta_pedida]);
          $verificacao_page_conta_pedinte_a=DB::select('select * from pages where (conta_id_a,tipo_page_id) = (?, ?)', [$conta_pedinte, 1]);
          $verificacao_page_conta_pedinte_b=DB::select('select * from pages where (conta_id_b,tipo_page_id) = (?, ?)', [$conta_pedinte, 1]);
          if (sizeof($conta_pedida) == 0  ) {
              $verificacao_pedido[0]=1;
              $verificacao_page_conta_pedida_b[0]=1;
              $verificacao_page_conta_pedida_a[0]=1;
          }else {
          $verificacao_pedido= DB::select('select * from pedido_relacionamentos where (conta_id_pedida, conta_id_pedinte) = (?, ?)', [$conta_pedida[0]->conta_id, $conta_pedinte]);
          $verificacao_page_conta_pedida_b=DB::select('select * from pages where (conta_id_b,tipo_page_id) = (?, ?)', [$conta_pedida[0]->conta_id, 1]);
          $verificacao_page_conta_pedida_a=DB::select('select * from pages where (conta_id_a,tipo_page_id) = (?, ?)', [$conta_pedida[0]->conta_id, 1]);
          }
          $conta= DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
          if ( sizeof($verificacao_pedido) == 0 && sizeof($verificacao_page_conta_pedinte_a) == 0 && sizeof($verificacao_page_conta_pedinte_b) == 0 && sizeof($verificacao_page_conta_pedida_b) == 0 && sizeof($verificacao_page_conta_pedida_a) == 0 && $conta_pedida[0]->genero != $conta[0]->genero ) {

          DB::table('pedido_relacionamentos')->insert([

              'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
              'conta_id_pedida' => $conta_pedida[0]->conta_id,
              'conta_id_pedinte' =>  $conta_pedinte,
              'estado_pedido_relac_id' => 1,
              'name_page' => $request->name_page,
              'tipo_relacionamento_id' =>$request->tipo_relac,
              'created_at'=> $controll->dat_create_update(),


          ]);

          $a=DB::table('pedido_relacionamentos')->get();
          foreach ($a as $key) {
             $c=$key->pedido_relacionamento_id;
             }

          DB::table('identificadors')->insert([
        'tipo_identificador_id' => 5,
        'id' => $c,
        'created_at'=> $controll->dat_create_update(),

   ]);
          $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_pedida[0]->conta_id, 1 ]);
          $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_pedinte, 1 ]);

         $a=DB::table('identificadors')->get();
         foreach ($a as $key) {
            $b=$key->identificador_id;
            }
          DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 4,
                  'identificador_id_causador'=> $aux[0]->identificador_id,
                  'identificador_id_destino'=> $b,
                  'identificador_id_receptor'=> $aux2[0]->identificador_id,
                  'created_at'=> $controll->dat_create_update(),
                  ]);

        }
          return redirect()->route('account1.profile', $request->conta_pedida);
        } catch (Exception $e) {
            dd('erro');
        }
    }


    public function add_picture(Request $request)
    {
        try
        {
            if ($request->hasFile('pagePicture') && PaginaCasalController::check_image_extension($request->pagePicture->extension()))
            {
                $file_name = time() . '_' . md5($request->file('pagePicture')->getClientOriginalName()) . '.' . $request->pagePicture->extension();

                $request->file('pagePicture')->storeAs('public/img/page', $file_name);
                AuthController::updatePageProfilePicture($file_name, $request->uuidPage);
            }

            else if ($request->hasFile('profilePicture'))
            {
                if ($request->hasFile('profilePicture') && PaginaCasalController::check_image_extension($request->profilePicture->extension()))
                {
                    $file_name = time() . '_' . md5($request->file('profilePicture')->getClientOriginalName()) . '.' . $request->profilePicture->extension();

                    $request->file('profilePicture')->storeAs('public/img/users', $file_name);
                    AuthController::updateUserProfilePicture($file_name, $this->auth->defaultDate()[0]->conta_id);
                }
            }

            else if ($request->hasFile('imgOrVideo'))
            {

                $file_name = time() . '_' . md5($request->file('imgOrVideo')->getClientOriginalName()) . '.' . $request->imgOrVideo->extension();
                $request->file('imgOrVideo')->storeAs('public/img/comprovativos', $file_name);

                DB::table('pedido_relacionamentos')->where('pedido_relacionamento_id', $request->Comprovativo)
                ->update(['file'=> $file_name]);
                DB::table('pedido_relacionamentos')->where('pedido_relacionamento_id', $request->Comprovativo)
                ->update(['estado_pedido_relac_id'=> 4]);
                DB::table('notifications')->where('notification_id',$request->notificacao)
                ->update(['id_state_notification' => 3]);

                return redirect()->route('account.home.feed');


            }


            return back();

        } catch (Exception $e) {
            dd('erro');
        }
    }


    public static function profile_picture($account_id)
    {
        return DB::select('select foto from contas where conta_id = ?', [$account_id])[0]->foto;
    }
}

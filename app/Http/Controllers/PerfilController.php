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
    public function index()
    {
        try {
            $auth = new AuthController();
            $page_couple = new PaginaCasalController();

            $account_name = $this->auth->defaultDate();

            $page_content = $this->casalPage->page_default_date($account_name);

            $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
            $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
            $page_content = $page_couple->page_default_date($account_name);
            $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
            $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $conta_logada = $auth->defaultDate();

            $this->active_account_id = $account_name[0]->conta_id;
            //---------------------------------------------------------------------
        $account_name = $auth->defaultDate();
            $dadosPage = Page::all();
          $dadosSeguindo[0] = [
                            'id_seguidor' => 0,
                            'identificador_id_seguida' => 0,
                            'identificador_id_seguindo' => 0,
                            'id' => 0];
           $dadosSeguida = DB::table('seguidors')
            ->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')
            ->select('seguidors.*', 'identificadors.id')
            ->get();

            $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);

            foreach ($dadosSgndo as $value) {
                $valor = $value->identificador_id;
            }

            $dadoSeguindo = DB::table('seguidors')->where('identificador_id_seguindo', $valor)->join('identificadors', 'seguidors.identificador_id_seguindo', '=', 'identificadors.identificador_id')
            ->select('seguidors.*', 'identificadors.id')
            ->get();

            $tt = 0;
            foreach ($dadoSeguindo as $valor1) {
                if ($valor1->id == $account_name[0]->conta_id) {
                        $key = 0;
                        $dadosSeguindo[$key] = [
                            'id_seguidor' => $valor1->seguidor_id,
                            'identificador_id_seguida' => $valor1->identificador_id_seguida,
                            'identificador_id_seguindo' => $valor1->identificador_id_seguindo,
                            'id' => $valor1->id,
                            ];
                    }
                }
        //---------------------------------------------------------------------

            //-------------------------------------------------------------------------
              $tipos_de_relacionamento=DB::table('tipo_relacionamentos')->get();
              $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
              $lenght = sizeof($aux1);
              $page_current = 'profile';
              $gostos=array();
              //-----------------------------------------------------------------------------------------------------------------------------------------
              $notificacoes=array();
              $a=0;
              $nome=array();
              $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
              $notificacoes_aux=DB::select('select * from notifications where identificador_id_destino = ?', [$aux1[0]->identificador_id]);
              if (sizeof($notificacoes_aux)>0) {
                foreach ($notificacoes_aux as $key) {
                  $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_causador ]);
                  if ($aux2[0]->tipo_identificador_id == 1) {
                    $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
                    $nome[0]= $conta[0]->nome ;
                    $nome[0].= " ";
                    $nome[0].= $conta[0]->apelido;
                    $nome[1]= $conta[0]->foto;
                    $nome[2] =1;
                  }elseif ($aux2[0]->tipo_identificador_id == 2) {
                    $page= DB::select('select * from pages where page_id = ?', [$aux2[0]->id]);
                      $nome[0] =$page[0]->nome;
                      $nome[1] =$page[0]->foto;
                      $nome[2] =2;
                  }
                  switch ($key->id_action_notification) {
                    case 1:
                      $notificacoes[$a]['notificacao']=$nome[0] ;
                      $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                      break;
                    case 2:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                        break;
                      case 3:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                          break;
                        case 4:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" enviou-lhe um pedido";
                            break;
                          case 5:
                          $notificacoes[$a]['notificacao']=$nome[0];
                          $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                              break;

                  }
                  $notificacoes[$a]['foto']=$nome[1];
                  $notificacoes[$a]['v']=$nome[2];
                  $a++;
                }
              }
//------------------------------------------------------------------------------------------------------------------
              $a=0;
              if ($lenght > 0) {
                $post_reactions= DB::select('select * from post_reactions where identificador_id = ?', [$aux1[0]->identificador_id]);
                  $seguidor = DB::select('select * from seguidors where identificador_id_seguindo = ?', [ $aux1[0]->identificador_id]);
                    $perfil[0]['qtd_ps']=sizeof($seguidor);
               foreach ($post_reactions as $key ) {
                 $posts=DB::select('select * from posts where post_id = ?', [$key->post_id]);
                 if (sizeof($posts) > 0) {
                $gostos[$a]['formato']=$posts[0]->formato_id;
                $gostos[$a]['file']=$posts[0]->file;
                $gostos[$a]['post']=$posts[0]->descricao;
                $gostos[$a]['post_id']=$posts[0]->post_id;
                $gostos[$a]['post_uuid']=$posts[0]->uuid;
                $a++;
                }
               }


                    return view('perfil.index', compact('account_name', 'notificacoes', 'gostos', 'perfil', 'checkUserStatus', 'profile_picture', 'conta_logada', 'tipos_de_relacionamento', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'page_content', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage'));




              } else {
                $perfil[0]['qtd_ps'] = 0;
              }

              //dd($account_name);



              return view('perfil.index', compact('account_name', 'notificacoes','gostos', 'perfil', 'checkUserStatus', 'profile_picture', 'conta_logada', 'tipos_de_relacionamento', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'page_content', 'dadosSeguida', 'dadosSeguindo', 'dadosPage'));


        } catch (Exception $e) {
            dd('erro');
        }
    }

    public function perfil_das_contas($id)
    {
        try {
            $auth = new AuthController();
            $page_couple = new PaginaCasalController();
             $conta_logada = $auth->defaultDate();
  //--------------------------------------------------------------
             $dadosPage = Page::all();
          $dadosSeguindo[0] = [
                            'id_seguidor' => 0,
                            'identificador_id_seguida' => 0,
                            'identificador_id_seguindo' => 0,
                            'id' => 0];
           $dadosSeguida = DB::table('seguidors')
            ->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')
            ->select('seguidors.*', 'identificadors.id')
            ->get();

            $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);

            foreach ($dadosSgndo as $value) {
                $valor = $value->identificador_id;
            }

            $dadoSeguindo = DB::table('seguidors')->where('identificador_id_seguindo', $valor)->join('identificadors', 'seguidors.identificador_id_seguindo', '=', 'identificadors.identificador_id')
            ->select('seguidors.*', 'identificadors.id')
            ->get();

            $tt = 0;
            foreach ($dadoSeguindo as $valor1) {
                if ($valor1->id == $conta_logada[0]->conta_id) {
                        $key = 0;
                        $dadosSeguindo[$key] = [
                            'id_seguidor' => $valor1->seguidor_id,
                            'identificador_id_seguida' => $valor1->identificador_id_seguida,
                            'identificador_id_seguindo' => $valor1->identificador_id_seguindo,
                            'id' => $valor1->id,
                            ];
                    }
                }

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
                    $perfil[0]['qtd_ps']=sizeof($seguidor);
                    foreach ($post_reactions as $key ) {
                      $posts=DB::select('select * from posts where post_id = ?', [$key->post_id]);
                      if (sizeof($posts) > 0) {
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
              $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
              $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
              $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
              $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
              $page_content = $page_couple->page_default_date($account_name);
              $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);


              //dd($account_name);


              $page_current = 'profile';

              //-----------------------------------------------------------------------------------------------------------------------------------------
              $notificacoes=array();
              $a=0;
              $nome=array();
              $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
              $notificacoes_aux=DB::select('select * from notifications where identificador_id_destino = ?', [$aux1[0]->identificador_id]);
              if (sizeof($notificacoes_aux)>0) {
                foreach ($notificacoes_aux as $key) {
                  $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_causador ]);
                  if ($aux2[0]->tipo_identificador_id == 1) {
                    $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
                    $nome[0]= $conta[0]->nome ;
                    $nome[0].= " ";
                    $nome[0].= $conta[0]->apelido;
                    $nome[1]= $conta[0]->foto;
                    $nome[2] =1;
                  }elseif ($aux2[0]->tipo_identificador_id == 2) {
                    $page= DB::select('select * from pages where page_id = ?', [$aux2[0]->id]);
                      $nome[0] =$page[0]->nome;
                      $nome[1] =$page[0]->foto;
                      $nome[2] =2;
                  }
                  switch ($key->id_action_notification) {
                    case 1:
                      $notificacoes[$a]['notificacao']=$nome[0] ;
                      $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                      break;
                    case 2:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                        break;
                      case 3:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                          break;
                        case 4:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" enviou-lhe um pedido";
                            break;
                          case 5:
                          $notificacoes[$a]['notificacao']=$nome[0];
                          $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                              break;

                  }
                  $notificacoes[$a]['foto']=$nome[1];
                  $notificacoes[$a]['v']=$nome[2];
                  $a++;
                }
              }



              return view('perfil.index', compact('account_name','notificacoes', 'gostos', 'perfil','conta_logada', 'tipos_de_relacionamento', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'page_content', 'dadosSeguida', 'dadosSeguindo', 'dadosPage'));

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

        //  $verificacao_conta_a=DB::select('select * from pages where conta_id_a = ?', [$account_name[0]->conta_id]);
        //  $verificacao_conta_b=DB::select('select * from pages where conta_id_b = ?', [$account_name[0]->conta_id]);

            $account_name = DB::select('select * from contas where uuid = ?', [$perfil]);

            $checkUserStatus = AuthController::isCasal(Auth::user()->conta_id);

            $profile_picture = AuthController::profile_picture(Auth::user()->conta_id);

            $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);

            $hasUserManyPages = AuthController::hasUserManyPages(Auth::user()->conta_id);

            $allUserPages = AuthController::allUserPages(new AuthController, Auth::user()->conta_id);

            $auth = new AuthController();
            $conta_logada = $auth->defaultDate();
            $page_couple = new PaginaCasalController();
            $account_name = $this->auth->defaultDate();
                        //---------------------------------------------------------------------
        $account_name = $auth->defaultDate();
            $dadosPage = Page::all();
          $dadosSeguindo[0] = [
                            'id_seguidor' => 0,
                            'identificador_id_seguida' => 0,
                            'identificador_id_seguindo' => 0,
                            'id' => 0];
           $dadosSeguida = DB::table('seguidors')
            ->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')
            ->select('seguidors.*', 'identificadors.id')
            ->get();

            $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);

            foreach ($dadosSgndo as $value) {
                $valor = $value->identificador_id;
            }

            $dadoSeguindo = DB::table('seguidors')->where('identificador_id_seguindo', $valor)->join('identificadors', 'seguidors.identificador_id_seguindo', '=', 'identificadors.identificador_id')
            ->select('seguidors.*', 'identificadors.id')
            ->get();

            $tt = 0;
            foreach ($dadoSeguindo as $valor1) {
                if ($valor1->id == $account_name[0]->conta_id) {
                        $key = 0;
                        $dadosSeguindo[$key] = [
                            'id_seguidor' => $valor1->seguidor_id,
                            'identificador_id_seguida' => $valor1->identificador_id_seguida,
                            'identificador_id_seguindo' => $valor1->identificador_id_seguindo,
                            'id' => $valor1->id,
                            ];
                    }
                }
        //---------------------------------------------------------------------
            $checkUserStatus = $auth->isCasal(Auth::user()->conta_id);
            $profile_picture = $auth->profile_picture(Auth::user()->conta_id);
            $isUserHost = $auth->isUserHost($account_name[0]->conta_id);
            $hasUserManyPages = $auth->hasUserManyPages(Auth::user()->conta_id);
            $allUserPages = $auth->allUserPages(new AuthController, Auth::user()->conta_id);
            $account_name = DB::select('select * from contas where uuid = ?', [$perfil]);
            $page_content = $page_couple->page_default_date($account_name);
            $page_current = 'profile';

            //-----------------------------------------------------------------------------------------------------------------------------------------
            $notificacoes=array();
            $a=0;
            $nome=array();
            $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
            $notificacoes_aux=DB::select('select * from notifications where identificador_id_destino = ?', [$aux1[0]->identificador_id]);
            if (sizeof($notificacoes_aux)>0) {
              foreach ($notificacoes_aux as $key) {
                $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_causador ]);
                if ($aux2[0]->tipo_identificador_id == 1) {
                  $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
                  $nome[0]= $conta[0]->nome ;
                  $nome[0].= " ";
                  $nome[0].= $conta[0]->apelido;
                  $nome[1]= $conta[0]->foto;
                  $nome[2] =1;
                }elseif ($aux2[0]->tipo_identificador_id == 2) {
                  $page= DB::select('select * from pages where page_id = ?', [$aux2[0]->id]);
                    $nome[0] =$page[0]->nome;
                    $nome[1] =$page[0]->foto;
                    $nome[2] =2;
                }
                switch ($key->id_action_notification) {
                  case 1:
                    $notificacoes[$a]['notificacao']=$nome[0] ;
                    $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                    break;
                  case 2:
                      $notificacoes[$a]['notificacao']=$nome[0];
                      $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                      break;
                    case 3:
                      $notificacoes[$a]['notificacao']=$nome[0];
                      $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                        break;
                      case 4:
                      $notificacoes[$a]['notificacao']=$nome[0];
                      $notificacoes[$a]['notificacao'].=" enviou-lhe um pedido";
                          break;
                        case 5:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                            break;

                }
                $notificacoes[$a]['foto']=$nome[1];
                $notificacoes[$a]['v']=$nome[2];
                $a++;
              }
            }


            return view('perfil.edit', compact('account_name', 'notificacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'page_content', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'conta_logada'));

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
          DB::table('contas')
                ->where('conta_id', $account_name[0]->conta_id)
                ->update([
                  'nome' => $request->nome,
                  'apelido' => $request->apelido,
                  'genero' => $request->genre,
                  'descricao' => $request->bio,
                  'email' => $request->email,
                  'telefone' => $request->telefone

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
          $conta_pedida=array();
          $verificacao_page_conta_pedida_b=array();
          $verificacao_page_conta_pedida_a=array();
          $verificacao_pedido=array();
          $conta_pedinte = Auth::user()->conta_id;
          $conta_pedida = DB::select('select * from contas where uuid = ?', [$request->conta_pedida]);
          $verificacao_page_conta_pedinte_a=DB::select('select * from pages where conta_id_a = ?', [$conta_pedinte]);
          $verificacao_page_conta_pedinte_b=DB::select('select * from pages where conta_id_b = ?', [$conta_pedinte]);
          if (sizeof($conta_pedida) == 0  ) {
              $verificacao_pedido[0]=1;
              $verificacao_page_conta_pedida_b[0]=1;
              $verificacao_page_conta_pedida_a[0]=1;
          }else {
          $verificacao_pedido= DB::select('select * from pedido_relacionamentos where (conta_id_pedida, conta_id_pedinte) = (?, ?)', [$conta_pedida[0]->conta_id, $conta_pedinte]);
          $verificacao_page_conta_pedida_b=DB::select('select * from pages where conta_id_b  = ?', [$conta_pedida[0]->conta_id]);
          $verificacao_page_conta_pedida_a=DB::select('select * from pages where conta_id_a  = ?', [$conta_pedida[0]->conta_id]);

          }
          if ( sizeof($verificacao_pedido) == 0 && sizeof($verificacao_page_conta_pedinte_a) == 0 && sizeof($verificacao_page_conta_pedinte_b) == 0 && sizeof($verificacao_page_conta_pedida_b) == 0 && sizeof($verificacao_page_conta_pedida_a) == 0 ) {

          DB::table('pedido_relacionamentos')->insert([

              'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
              'conta_id_pedida' => $conta_pedida[0]->conta_id,
              'conta_id_pedinte' =>  $conta_pedinte,
              'estado_pedido_relac' => 1,
              'name_page' => $request->name_page,
              'tipo_relacionamento_id' => 1,

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
            if ($request->page_u)
            {
                if ($request->hasFile('profilePicture') && PaginaCasalController::check_image_extension($request->profilePicture->extension()))
                {
                    $file_name = time() . '_' . md5($request->file('profilePicture')->getClientOriginalName()) . '.' . $request->profilePicture->extension();

                    $request->file('profilePicture')->storeAs('public/img/page', $file_name);
                    AuthController::updatePageProfilePicture($file_name, $request->page_u);
                }

            } else {
                if ($request->hasFile('profilePicture') && PaginaCasalController::check_image_extension($request->profilePicture->extension()))
                {
                    $file_name = time() . '_' . md5($request->file('profilePicture')->getClientOriginalName()) . '.' . $request->profilePicture->extension();

                    $request->file('profilePicture')->storeAs('public/img/users', $file_name);
                    AuthController::updateUserProfilePicture($file_name, $this->auth->defaultDate()[0]->conta_id);
                }
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

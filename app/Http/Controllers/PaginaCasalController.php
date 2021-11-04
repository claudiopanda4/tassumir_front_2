<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaCasalController extends Controller
{

    private $current_page_id = 1;
    private $current_page_uuid;

    public function index(){

        $auth = new AuthController();
        $account_name = $auth->defaultDate();
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
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
        $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
        $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
        $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
        $page_content = $this->page_default_date($account_name);

        $seguidores = Self::seguidores($page_content[0]->page_id);
        $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
        $publicacoes = $this->get_all_post($page_content[0]->page_id);
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        $this->current_page_id = $page_content[0]->page_id;
        $page_current = 'page';
        $conta_logada = $auth->defaultDate();
        //dd($page_content);
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

        $sugerir = $this->suggest_pages($page_content[0]->page_id);
        $allPosts = $this->get_post_types($page_content[0]->page_id);

        return view('pagina.couple_page', compact('account_name','notificacoes','conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'allPosts', 'sugerir'));
    }

    public function show_page()
    {

        $auth = new AuthController();
        $account_name = $auth->defaultDate();
        //----------------------------------------------------------------
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
        //----------------------------------------------------------------
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
        $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
        $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
        $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
        $page_content = $this->page_default_date($account_name);
        
        $seguidores = Self::seguidores($page_content[0]->page_id);

        $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
        $publicacoes = $this->get_all_post($page_content[0]->page_id);
        $this->current_page_id = $page_content[0]->page_id;
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        $page_current = 'page';
        //dd($page_content);
        $conta_logada = $auth->defaultDate();

        $sugerir = $this->suggest_pages($page_content[0]->page_id);
        $allPosts = $this->get_post_types($page_content[0]->page_id);

        //dd($page_content);//-----------------------------------------------------------------------------------------------------------------------------------------
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

        

        return view('pagina.couple_page', compact('account_name','notificacoes', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current' , 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'allPosts', 'sugerir'));
        try {
            $auth = new AuthController();
            $account_name = $auth->defaultDate();
            $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
            $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
            $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
            $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $page_content = $this->page_default_date($account_name);
            $seguidores = Self::seguidores($page_content[0]->page_id);
            $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
            $publicacoes = $this->get_all_post($page_content[0]->page_id);
            $this->current_page_id = $page_content[0]->page_id;
            //dd($page_content);
            return view('pagina.couple_page', compact('account_name','notificacoes', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'allPosts', 'sugerir'));
        } catch (Exception $e) {
            dd($e);
        }


    }

    //======================================================

    public function my_pages(){
        try {
            $auth = new AuthController();
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
        //----------------------------------------------------------------
            $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
            $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
            $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
            $page_content = $this->page_default_date($account_name);


            $seguidores = Self::seguidores($page_content[0]->page_id);
            $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
            $publicacoes = $this->get_all_post($page_content[0]->page_id);
            $this->current_page_id = $page_content[0]->uuid;
            $page_current = 'page';
            //dd($page_content);
            $conta_logada = $auth->defaultDate();
            //dd($page_content);
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

            //=============================================
              // siene 
            //=============================================

            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);

            return view('pagina.pages', compact('account_name', 'conta_logada','notificacoes', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'sugerir', 'allPosts'));
        } catch (Exception $e) {
            dd($e);
        }

    }

    public function page_default_date ($account_name) {

        $page_content = DB::select('select * from pages where conta_id_a = ? or conta_id_b = ?', [
            $account_name[0]->conta_id,
            $account_name[0]->conta_id
        ]);

        return $page_content;
    }

    public function paginas($uuid){
        try {
          $auth = new AuthController();
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
          $page_content = $this->page_default_date($account_name);
          $page_current = 'page';
          $page_content = DB::select('select * from pages where uuid = ?', [
                $uuid
            ]);

          $this->current_page_uuid = $page_content[0]->uuid;

          $seguidores = Self::seguidores($page_content[0]->page_id);
          $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
          $publicacoes = $this->get_all_post($page_content[0]->page_id);
          $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
          $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
          $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
          $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
          $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
          $conta_logada = $auth->defaultDate();
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
          //=============================================
            // siene 
          //=============================================

          $sugerir = $this->suggest_pages($page_content[0]->page_id);
          $allPosts = $this->get_post_types($page_content[0]->page_id);
          
          return view('pagina.couple_page', compact('account_name','notificacoes', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'sugerir', 'allPosts'));
        } catch (Exception $e) {
            dd($e);
        }

    }


    public function edit_couple(){
        try {
            $auth = new AuthController();
            $account_name = $auth->defaultDate();
            $page_current = 'page';
            $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
            $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
            $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
            $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $conta_logada = $auth->defaultDate();
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

            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);

            return view('pagina.edit_couple', compact('account_name','notificacoes', 'conta_logada', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'allPosts', 'sugerir'));
        } catch (Exception $e) {
            dd($e);
        }
    }


    public function delete_couple_page(){
        try {
            $auth = new AuthController();
            $account_name = $auth->defaultDate();
            $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
            $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
            $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $page_current = 'page';
            $conta_logada = $auth->defaultDate();

            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);

            return view('pagina.delete_couple_page', compact('account_name', 'conta_logada', 'checkUserStatus', 'profile_picture', 'hasUserManyPages', 'allUserPages', 'page_current', 'allPosts', 'sugerir'));
        } catch (Exception $e) {
            dd($e);
        }
    }

    /*
    ------------------------------------
            siene codificando
    ------------------------------------
    */

    private function type_of_relac($id) {
        return DB::select('select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = ?', [$id])[0]->tipo_relacionamento;
    }

    public static function seguidores($id)
    {
        //return count(DB::select('select * from seguidors where uuid = ?', [$id]));
        return count(DB::select('select * from seguidors where identificador_id_seguida = ?', [$id]));
    }

    private function get_all_post($id) {
        return count(DB::select('select * from posts where page_id = ?', [$id]));
    }

    private function post($uuid) {
        return view('pagina.pages');
        //return count(DB::select('select * from posts where $uuid = ?', [$uuid]));
    }
    /**
     * @param
     */
    public function store_post(Request $request)
    {
        try
        {
            //dd($request);

            $page_id = DB::select('select page_id from pages where uuid = ?', [$request->page_u])[0]->page_id;

            if ($request->hasFile('imgOrVideo'))
            {
                $file_name = time() . '_' . md5($request->file('imgOrVideo')->getClientOriginalName()) . '.' . $request->imgOrVideo->extension();

                $path = '';

                if ( Self::check_image_extension($request->imgOrVideo->extension()) )
                {
                    $path = $request->file('imgOrVideo')->storeAs('public/img/page', $file_name);
                    $this->store($request->message, $file_name, $page_id, $this->formato_id('Imagem'));

                } else if ( $this->check_video_extension($request->imgOrVideo->extension()) ) {

                    $path = $request->file('imgOrVideo')->storeAs('public/video/page', $file_name);
                    $this->store($request->message, $file_name, $page_id, $this->formato_id('Video'));
                }

            } else {
                $this->store($request->message, null, $page_id, $this->formato_id('Textos'));
            }
            return back();

        } catch (Exception $e) {
            dd($e);
        }
    }
    private function store($description, $file_name = null, $id, $format)
    {
        try {
            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            //dd($uuid);
            if($description == null || $description == ""){
                $description = "";
            }
            DB::insert('insert into posts(uuid, descricao, file, page_id, formato_id, estado_post_id) values(?, ?, ?, ?, ?, ?)',
                [$uuid, $description, $file_name, $id, $format, 1]);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function check_image_extension( $extension )
    {
        return $extension === 'jpg' || $extension === 'jpeg' || $extension === 'png';
    }

    public function check_video_extension( $extension )
    {
        return $extension === 'mp4' || $extension === 'avi' || $extension === 'mkv';
    }

    private function formato_id( $formato ) {
        return DB::select('select formato_id from formatos where formato = ?', [$formato])[0]->formato_id;
    }

    public function suggest_pages($hostId) 
    {
        $all_content = [];
        $data = DB::select('select * from seguidors where identificador_id_seguindo != ? && identificador_id_seguida != ?', [$hostId, $hostId]);
        foreach ($data as $value) {
            $all_content = DB::table('pages')->where('page_id', $value->identificador_id_seguida)->get();
        }
        return $all_content;
    }

    public function get_post_types($id)
    {   $index = 0;
        $posts = [];
        $data = DB::table('posts')->where('page_id', $id)->get();
        foreach ($data as $d) {
            if ( sizeof(explode('.',$d->file)) > 1 ) {
                $extension = explode('.', $d->file)[1];
                if ($this->check_image_extension($extension))
                {
                    $posts[$index]['postImages'] = $d->file;
                }
                else if ($this->check_video_extension($extension))
                {
                    $posts[$index]['postVideos'] = $d->file;
                }
            }
            $posts[$index]['postDescricao'] = $d->descricao;
            $index++;
        }
        return $posts;
    }

    /* fim codigo siene */
}

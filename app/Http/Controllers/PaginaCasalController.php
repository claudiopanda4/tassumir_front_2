<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaCasalController extends Controller
{

    private $current_page_id = 1;
    private $current_page_uuid;
    private static $uuid = '';

    public function index(){
      $page_couple = new PerfilController();
      $dates = $page_couple->default_();
      $account_name = $dates['account_name'];
      $checkUserStatus = $dates['checkUserStatus'];
      $profile_picture = $dates['profile_picture'];
      $isUserHost = $dates['isUserHost'];
      $hasUserManyPages = $dates['hasUserManyPages'];
      $allUserPages = $dates['allUserPages'];
      $page_content = $dates['page_content'];
      $conta_logada = $dates['conta_logada'];
      $notificacoes = $dates['notificacoes'];
      $dadosSeguindo = $dates['dadosSeguindo'];
      $dadosPage = $dates['dadosPage'];
      $dadosSeguida = $dates['dadosSeguida'];

      /*siene*/ //$casalPageName = $this->get_casalPage_name($uuid);

      $page_current = 'page';
      $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
      $seguidores = Self::seguidores($page_content[0]->page_id);
      $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
      $publicacoes = $this->get_all_post($page_content[0]->page_id);
      $this->current_page_id = $page_content[0]->page_id;
      $sugerir = $this->suggest_pages($page_content[0]->page_id);
      $allPosts = $this->get_post_types($page_content[0]->page_id);
$v=1;
        return view('pagina.couple_page', compact('account_name','v','notificacoes','conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'allPosts', 'sugerir'));
    }

    public function conf_PR(Request $request)
      {
        DB::table('pedido_relacionamentos')->where('uuid',$request->accept_relacd)
        ->update(['estado_pedido_relac_id' => 2]);
        DB::table('notifications')->where('notification_id',$request->id_notification)
        ->update(['id_state_notification' => 3]);

 $aux= DB::select('select * from pedido_relacionamentos where uuid = ?', [$request->accept_relacd]);;
 $aux1=DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$aux[0]->pedido_relacionamento_id, 5 ]);;
 $aux2=DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$aux[0]->conta_id_pedida, 1 ]);;
 $aux3=DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$aux[0]->conta_id_pedinte, 1]);;
        DB::table('notifications')->insert([
                'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_state_notification' => 2,
                'id_action_notification' => 7,
                'identificador_id_causador'=> $aux2[0]->identificador_id,
                'identificador_id_destino'=> $aux1[0]->identificador_id,
                'identificador_id_receptor'=> $aux3[0]->identificador_id,
                ]);
        return redirect()->route('account.home.feed');
      }
      public function tconfirm(Request $request){

        $tipo=DB::select('select * from pedido_relacionamentos where uuid = ?', [$request->id1]);
        $tipos=DB::select('select * from tipo_relacionamentos where tipo_relacionamento_id = ?', [$tipo[0]->tipo_relacionamento_id]);
        $conta = DB::select('select * from contas where conta_id = ?', [$tipo[0]->conta_id_pedinte]);
        $resposta='Ao clicar em "Sim, Aceito", você concorda com o que os termos dizem sobre o ';
        $resposta.=$tipos[0]->tipo_relacionamento;
        $resposta.='. Caso tenha alguma DÚVIDA, seria bem melhor consultar antes. Aceita Assumir o(a)  ';
        $resposta.= $conta[0]->nome;
        $resposta.= ' ';
        $resposta.= $conta[0]->apelido;
        $resposta.= '?';

        return response()->json($resposta);
      }

      public function reject_relationship(Request $request){
        $aux=DB::select('select * from pedido_relacionamentos where uuid = ?', [$request->id1]);
        $aux1 = DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$aux[0]->pedido_relacionamento_id, 5 ]);
        DB::table('identificadors')->where('identificador_id',$aux1[0]->identificador_id)
        ->delete();
        DB::table('pedido_relacionamentos')->where('uuid',$request->id1)
        ->delete();
        DB::table('notifications')->where('notification_id',$request->id2)
        ->delete();
        $resposta.= 1;

        return response()->json($resposta);
      }

      public function request_relationship1($id) {
        $pedido=array();
        $tipo=DB::select('select * from pedido_relacionamentos where uuid = ?', [$id]);
        $tipos=DB::select('select * from tipo_relacionamentos where tipo_relacionamento_id = ?', [$tipo[0]->tipo_relacionamento_id]);
        $conta = DB::select('select * from contas where conta_id = ?', [$tipo[0]->conta_id_pedida]);
          $pedido[0]['nome']= $conta[0]->nome ;
          $pedido[0]['nome'].= " ";
          $pedido[0]['nome'].= $conta[0]->apelido;
          $pedido[0]['foto']= $conta[0]->foto;
          $pedido[0]['tipo']=$tipos[0]->tipo_relacionamento;
          $pedido[0]['pedido_relacionamento_id']=$tipo[0]->pedido_relacionamento_id;
          $pedido[0]['estado']=$tipo[0]->estado_pedido_relac_id;

      $page_couple = new PerfilController();
      $dates = $page_couple->default_();
          $account_name = $dates['account_name'];
          $checkUserStatus = $dates['checkUserStatus'];
          $profile_picture = $dates['profile_picture'];
          $isUserHost = $dates['isUserHost'];
          $hasUserManyPages = $dates['hasUserManyPages'];
          $allUserPages = $dates['allUserPages'];
          $page_content = $dates['page_content'];
          $conta_logada = $dates['conta_logada'];
          $notificacoes = $dates['notificacoes'];
          $dadosSeguindo = $dates['dadosSeguindo'];
          $dadosPage = $dates['dadosPage'];
          $dadosSeguida = $dates['dadosSeguida'];
          $page_current = 'relationship_request';

          /*siene*/// $casalPageName = $this->get_casalPage_name($page_content);

          if (  $pedido[0]['estado'] == 2) {
          $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
          $aux2 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$tipo[0]->pedido_relacionamento_id, 5 ]);
          $notificacoes_aux=DB::select('select * from notifications where (identificador_id_receptor,id_action_notification,identificador_id_destino) = (?,?,?)', [$aux1[0]->identificador_id, 7, $aux2[0]->identificador_id]);
          $pedido[0]['not']=$notificacoes_aux[0]->notification_id ;
        }elseif (  $pedido[0]['estado'] == 6) {
          $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
          $aux2 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$tipo[0]->pedido_relacionamento_id, 5 ]);
          $notificacoes_aux=DB::select('select * from notifications where (identificador_id_receptor,id_action_notification,identificador_id_destino) = (?,?,?)', [$aux1[0]->identificador_id, 10, $aux2[0]->identificador_id]);
          $pedido[0]['not']=$notificacoes_aux[0]->notification_id ;
        }
                    return view('relacionamento.index', compact('account_name', 'pedido', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida',));
      }

    public function request_relationship() {
        $dates = $this->default_();
        $account_name = $dates['account_name'];
        $checkUserStatus = $dates['checkUserStatus'];
        $profile_picture = $dates['profile_picture'];
        $isUserHost = $dates['isUserHost'];
        $hasUserManyPages = $dates['hasUserManyPages'];
        $allUserPages = $dates['allUserPages'];
        $page_content = $dates['page_content'];
        $conta_logada = $dates['conta_logada'];
        $notificacoes = $dates['notificacoes'];
        $dadosSeguindo = $dates['dadosSeguindo'];
        $dadosPage = $dates['dadosPage'];
        $dadosSeguida = $dates['dadosSeguida'];
        $page_current = 'relationship_request';
        //return view('relacionamento.index', compact('account_name', 'pedido', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida',));

        /*siene*/ //$casalPageName = $this->get_casalPage_name($page_content);
        return view('relacionamento.index', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida', ));
    }
    public function default_(){
        $auth = new AuthController();
        $conta_logada = $auth->defaultDate();
        $account_name = $auth->defaultDate();
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
        $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
        $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
        $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
        $page_content = $this->page_default_date($account_name);
        if (sizeof($page_content) > 0) {
            $seguidores = Self::seguidores($page_content[0]->page_id);
        } else {
            $seguidores = array();
        }
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        $notificacoes=array();
        $a=0;
        $nome=array();
        $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
        $notificacoes_aux=DB::select('select * from notifications where identificador_id_receptor = ?', [$aux1[0]->identificador_id]);
        if (sizeof($notificacoes_aux)>0) {
          foreach ($notificacoes_aux as $key) {
            if($key->id_state_notification!= 3){$aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_causador ]);
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
                $notificacoes[$a]['tipo']=1;
                $notificacoes[$a]['id']=$key->identificador_id_destino;
                $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                $post =  DB::select('select * from posts where post_id = ?', [$aux_link[0]->id]);
                $notificacoes[$a]['link']=$post[0]->uuid;
                break;
              case 2:
                  $notificacoes[$a]['notificacao']=$nome[0];
                  $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                  $notificacoes[$a]['tipo']=2;
                  $notificacoes[$a]['id']=$key->identificador_id_destino;
                  $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                  $post =  DB::select('select * from posts where post_id = ?', [$aux_link[0]->id]);
                  $notificacoes[$a]['link']=$post[0]->uuid;
                  break;
                case 3:
                  $notificacoes[$a]['notificacao']=$nome[0];
                  $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                  $notificacoes[$a]['tipo']=3;
                  $notificacoes[$a]['id']=$key->identificador_id_destino;
                    break;
                  case 4:
                  $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                if (sizeof($aux)){  $tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
                  if (sizeof($tipo)){  $tipos=DB::select('select * from tipo_relacionamentos where tipo_relacionamento_id = ?', [$tipo[0]->tipo_relacionamento_id]);
                  $notificacoes[$a]['notificacao']=$nome[0];
                  $notificacoes[$a]['notificacao'].=" quer assumir o vosso ";
                  $notificacoes[$a]['notificacao'].=$tipos[0]->tipo_relacionamento;
                  $notificacoes[$a]['tipo']=4;
                  $notificacoes[$a]['id']=$tipo[0]->uuid;}
                }
                      break;
                    case 5:
                    $notificacoes[$a]['notificacao']=$nome[0];
                    $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                    $notificacoes[$a]['tipo']=5;
                    $notificacoes[$a]['id']=$key->identificador_id_destino;
                    $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                    $page =  DB::select('select * from pages where page_id = ?',[$aux_link[0]->id]);
                    $notificacoes[$a]['link']=$page[0]->uuid;
                        break;
                    case 6:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                        $notificacoes[$a]['tipo']=5;
                        $notificacoes[$a]['id']=$key->identificador_id_destino;
                        $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                        $post =  DB::select('select * from posts where post_id = ?', [$aux_link[0]->id]);
                        $notificacoes[$a]['link']=$post[0]->uuid;
                            break;
                   case 7:
                   $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                   if (sizeof($aux)){$tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
                   if (sizeof($tipo)){$notificacoes[$a]['notificacao']=$nome[0];
                   $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                   $notificacoes[$a]['tipo']=7;
                   $notificacoes[$a]['id']=$tipo[0]->uuid;}}
                            break;
                case 8:
                            $notificacoes[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                            $notificacoes[$a]['tipo']=8;
                            $notificacoes[$a]['id']=$key->identificador_id_destino;
                            $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                            $page =  DB::select('select * from pages where page_id = ?',[$aux_link[0]->id]);
                            $notificacoes[$a]['link']=$page[0]->uuid;
                                break;

              case 9:
              $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
              if (sizeof($aux)){$tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
              if (sizeof($tipo)){
              $notificacoes[$a]['notificacao']= "o seu pedido de criação de pagina foi negado";
              $notificacoes[$a]['tipo']=9;
              $notificacoes[$a]['id']=$tipo[0]->uuid;}}
                                    break;
           case 10:
            $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
            if (sizeof($aux)){$tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
            if (sizeof($tipo)){$notificacoes[$a]['notificacao']=$nome[0];
            $notificacoes[$a]['notificacao'].=" Pediu que você page";
            $notificacoes[$a]['tipo']=10;
            $notificacoes[$a]['id']=$tipo[0]->uuid;}}
                                                          break;


            }
            $notificacoes[$a]['foto']=$nome[1];
            $notificacoes[$a]['v']=$nome[2];
            $notificacoes[$a]['id1']=$key->notification_id;

            $a++;
          }
        }
        }
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
        $dates = [
            "account_name" => $account_name,
            "checkUserStatus" => $checkUserStatus,
            "profile_picture" => $profile_picture,
            "isUserHost" => $isUserHost,
            "hasUserManyPages" => $hasUserManyPages,
            "allUserPages" => $allUserPages,
            "page_content" => $page_content,
            "seguidores" => $seguidores,
            "checkUserStatus" => $checkUserStatus,
            "conta_logada" => $conta_logada,
            "dadosSeguindo" => $dadosSeguindo,
            "dadosSeguida" => $dadosSeguida,
            "dadosPage" => $dadosPage,
            "notificacoes" => $notificacoes,
        ];
        return $dates;
    }
    public function show_page()
    {

        try {
            /*$auth = new AuthController();
            $account_name = $auth->defaultDate();
            $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
            $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
            $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
            $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $page_content = $this->page_default_date($account_name);
            $seguidores = Self::seguidores($page_content[0]->page_id);
            $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
            $publicacoes = $this->get_all_post($page_content[0]->page_id);
            $this->current_page_id = $page_content[0]->page_id;*/
            //dd($page_content);


                  $dates = $this->default_();
                  $account_name = $dates['account_name'];
                  $checkUserStatus = $dates['checkUserStatus'];
                  $profile_picture = $dates['profile_picture'];
                  $isUserHost = $dates['isUserHost'];
                  $hasUserManyPages = $dates['hasUserManyPages'];
                  $allUserPages = $dates['allUserPages'];
                  $page_content = $dates['page_content'];
                  $conta_logada = $dates['conta_logada'];
                  $notificacoes = $dates['notificacoes'];
                  $dadosSeguindo = $dates['dadosSeguindo'];
                  $dadosPage = $dates['dadosPage'];
                  $dadosSeguida = $dates['dadosSeguida'];
                  $page_current = 'relationship_request';
                  $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);

                        foreach ($dadosSgndo as $value) {
                            $valor = $value->identificador_id;
                        }


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
                    $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);

                    $seguidores = Self::seguidores($page_content[0]->page_id);

                    $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
                    $publicacoes = $this->get_all_post($page_content[0]->page_id);
                    $this->current_page_id = $page_content[0]->page_id;
                    $conta_logada = $auth->defaultDate();

                    $sugerir = $this->suggest_pages($page_content[0]->page_id);
                    $allPosts = $this->get_post_types($page_content[0]->page_id);

                    /*siene*/ //$casalPageName = $this->get_casalPage_name($page_content);


                    return view('pagina.couple_page', compact('account_name','notificacoes', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'allPosts', 'sugerir',));
            //        return view('pagina.couple_page', compact('account_name','notificacoes', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'allPosts', 'sugerir'));
        } catch (Exception $e) {
            dd($e);
        }


    }



    public function my_pages(){
        try {
      $page_couple = new PerfilController();
      $dates = $page_couple->default_();
          $account_name = $dates['account_name'];
          $checkUserStatus = $dates['checkUserStatus'];
          $profile_picture = $dates['profile_picture'];
          $isUserHost = $dates['isUserHost'];
          $hasUserManyPages = $dates['hasUserManyPages'];
          $allUserPages = $dates['allUserPages'];
          $page_content = $dates['page_content'];
          $conta_logada = $dates['conta_logada'];
          $notificacoes = $dates['notificacoes'];
          $dadosSeguindo = $dates['dadosSeguindo'];
          $dadosPage = $dates['dadosPage'];
          $dadosSeguida = $dates['dadosSeguida'];
          $page_current = 'relationship_request';
            $dadosPage = Page::all();


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
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $seguidores = Self::seguidores($page_content[0]->page_id);
            $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
            $publicacoes = $this->get_all_post($page_content[0]->page_id);
            $this->current_page_id = $page_content[0]->uuid;


            //=============================================
              // siene
            //=============================================

            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);

            //$casalPageName = $this->get_casalPage_name($page_content);

            return view('pagina.pages', compact('account_name', 'conta_logada','notificacoes', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'sugerir', 'allPosts',));
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
          $page_couple = new PerfilController();
          $dates = $page_couple->default_();
          $account_name = $dates['account_name'];
          $checkUserStatus = $dates['checkUserStatus'];
          $profile_picture = $dates['profile_picture'];
          $isUserHost = $dates['isUserHost'];
          $hasUserManyPages = $dates['hasUserManyPages'];
          $allUserPages = $dates['allUserPages'];
          $page_content = $dates['page_content'];
          $conta_logada = $dates['conta_logada'];
          $notificacoes = $dates['notificacoes'];
          $dadosSeguindo = $dates['dadosSeguindo'];
          $dadosPage = $dates['dadosPage'];
          $dadosSeguida = $dates['dadosSeguida'];
          $page_current = 'relationship_request';

        //***************** siene *******************//
          $casalPageName = self::get_casalPage_name($uuid);
          $uuidToCompare = $uuid;

        //***************** fim ********************//

            $dadosPage = Page::all();
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
          //dd($page_content[0]);
          $seguidores = Self::seguidores($page_content[0]->page_id);
          $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
          $publicacoes = $this->get_all_post($page_content[0]->page_id);
          $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);

          //=============================================
            // siene
          //=============================================

          $sugerir = $this->suggest_pages($page_content[0]->page_id);
          $allPosts = $this->get_post_types($page_content[0]->page_id);

          $a=DB::select('select * from pages where uuid = ?', [$uuid]);

          if ($a[0]->conta_id_a == $conta_logada[0]->conta_id || $a[0]->conta_id_b == $conta_logada[0]->conta_id) {
            $v=1;
          }else {
            $v=0;
          }
          return view('pagina.couple_page', compact('account_name','notificacoes','v', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'sugerir', 'allPosts', 'casalPageName', 'uuidToCompare'));
        } catch (Exception $e) {
            dd($e);
        }

    }


    public function edit_couple(){
        try {
      $page_couple = new PerfilController();
      $dates = $page_couple->default_();
          $account_name = $dates['account_name'];
          $checkUserStatus = $dates['checkUserStatus'];
          $profile_picture = $dates['profile_picture'];
          $isUserHost = $dates['isUserHost'];
          $hasUserManyPages = $dates['hasUserManyPages'];
          $allUserPages = $dates['allUserPages'];
          $page_content = $dates['page_content'];
          $conta_logada = $dates['conta_logada'];
          $notificacoes = $dates['notificacoes'];
          $page_current = 'relationship_request';
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);

            /*siene*/


            return view('pagina.edit_couple', compact('account_name','notificacoes', 'conta_logada', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'allPosts', 'sugerir'));
        } catch (Exception $e) {
            dd($e);
        }
    }


    public function delete_couple_page(){
        try {
      $page_couple = new PerfilController();
      $dates = $page_couple->default_();
          $account_name = $dates['account_name'];
          $checkUserStatus = $dates['checkUserStatus'];
          $profile_picture = $dates['profile_picture'];
          $isUserHost = $dates['isUserHost'];
          $hasUserManyPages = $dates['hasUserManyPages'];
          $allUserPages = $dates['allUserPages'];
          $page_content = $dates['page_content'];
          $conta_logada = $dates['conta_logada'];
          $page_current = 'relationship_request';
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);

            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);

            /*siene*/ //$casalPageName = $this->get_casalPage_name($page_content);

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

     public function Outra_pessoa(Request $request)
     {
         try
         {
           DB::table('pedido_relacionamentos')->where('pedido_relacionamento_id',$request->p_id)
           ->update(['estado_pedido_relac_id' => 6]);
           $not= DB::select('select * from notifications where notification_id = ?',[$request->n_id]);
           DB::table('notifications')->where('notification_id',$request->n_id)
           ->update(['identificador_id_causador' => $not[0]->identificador_id_receptor]);
           DB::table('notifications')->where('notification_id',$request->n_id)
           ->update(['identificador_id_receptor' => $not[0]->identificador_id_causador]);
           DB::table('notifications')->where('notification_id',$request->n_id)
           ->update(['id_action_notification' => 10]);

           return redirect()->route('account.home.feed');


         } catch (Exception $e) {
             dd($e);
         }
     }
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

                DB::table('identificadors')->insert([
              'tipo_identificador_id' => 3,
              'id' => DB::select('select * from posts where uuid = ?', [$uuid])[0]->post_id,
         ]);
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
        return $extension === 'mp4' || $extension === 'avi' || $extension === 'mkv' || $extension === '3gp' || $extension === 'wmv'|| $extension === 'flv' || $extension === 'webm' || $extension === 'ogg';
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


    //---------------------------------------------------------

    // Pega o nome do casal da pagina 
    private static function get_casalPage_name($uid) 
    {
      //dd($uid);
      $data = DB::table('pages')->where('uuid', $uid)->select('conta_id_a', 'conta_id_b')->get();
      return self::get_account_nomeAndApelido('contas', $data[0]->conta_id_a) . ' & ' . self::get_account_nomeAndApelido('contas', $data[0]->conta_id_b);
    }

    private static function get_account_nomeAndApelido($table_name, $account_id) {
      $account_name = DB::table($table_name)->where('conta_id', $account_id)->select('nome', 'apelido')->get()[0];
      return $account_name->nome . ' ' . $account_name->apelido;
    }


    /* fim codigo siene */
}

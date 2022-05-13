<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaginaCasalController;
use Illuminate\Support\Facades\Hash;


class PerfilController extends Controller
{
    private $auth;
    private $casalPage;

    public function __construct()
    {
        $this->auth = new AuthController();
        $this->casalPage = new PaginaCasalController();
    }

    public function more_information($id)
    {
        $contas = DB::select('select data_nasc, created_at from contas where uuid = ?', [$id])[0];
        $nasc = explode('-', $contas->data_nasc)[0];
        $data = getdate()['year'] - intval($nasc);
        return response()->json(['age' => $data.' anos', 'aderiu' => $contas->created_at]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function notificacoes_number(){
        $id = Auth::user()->conta_id;
        $numbers = DB::select('select count(*) as not_numbers from notifications where notifications.identificador_id_receptor = (select identificadors.identificador_id from identificadors where identificadors.tipo_identificador_id = 1 and id = ?) and id_state_notification = 2', [$id]);
        return ['not_numbers' => $numbers[0]->not_numbers];
      }

    public function index()
    {
        try {
          $page_current = 'profile';
          $conta_id = Auth::user()->conta_id;
          $user = DB::select('select nome, apelido, uuid, descricao, genero, foto from contas where conta_id = ?', [$conta_id]);
          $uuid = $user[0]->uuid;
          $descricao = $user[0]->descricao;
          $foto = $user[0]->foto;
          $genero = $user[0]->genero;
          $nome_completo = $user[0]->nome . ' ' . $user[0]->apelido;
          return view('perfil.index', compact('page_current', 'genero', 'uuid', 'descricao', 'nome_completo', 'foto'));
        } catch (Exception $e) {
            dd('erro');
        }
    }
    public function index_visit(Request $request, $id)
    {
        try {
          $page_current = 'profile';
          $uuid = $id;
          $user = DB::select('select uuid, descricao, apelido, nome, genero, foto from contas where uuid = ?', [$id]);
          $descricao = $user[0]->descricao;
          $foto = $user[0]->foto;
          $genero = $user[0]->genero;
          $nome_completo = $user[0]->nome . ' ' . $user[0]->apelido;
          return view('perfil.index', compact('page_current', 'genero', 'descricao', 'uuid', 'nome_completo', 'foto'));
        } catch (Exception $e) {
            dd('erro');
        }
    }
    public function get_genre()
    {
        try {
          $page_current = 'profile';
          $uuid = $id;
          $user = DB::select('select uuid, descricao, apelido, nome, genero, foto from contas where uuid = ?', [$id]);
          $descricao = $user[0]->descricao;
          $foto = $user[0]->foto;
          $genero = $user[0]->genero;
          $nome_completo = $user[0]->nome . ' ' . $user[0]->apelido;
          return view('perfil.index', compact('page_current', 'genero', 'descricao', 'uuid', 'nome_completo', 'foto'));
        } catch (Exception $e) {
            dd('erro');
        }
    }

    public function marital_status(Request $request){
        $conta_id = Auth::user()->conta_id;
        $uuid = $request->id;
        $result = DB::select("select (select count(*) from pages where conta_id_a = ? || conta_id_b = ?) as has_page, (select conta_id from contas where uuid = ?) as id, (select genero from contas where conta_id = ?) as genre_owner, (select genero from contas where uuid = ?) as genre, if ((select count(*) from pages where pages.conta_id_a = (select conta_id from contas where uuid = ?)) > 0, (select conta_id from contas where conta_id = pages.conta_id_a), (select conta_id from contas where conta_id = pages.conta_id_b)) as conta_id, if(count(pages.tipo_page_id) > 0, (select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = pages.tipo_relacionamento_id), 'not') as relationship, if ((select count(*) from pages where pages.conta_id_a = (select conta_id from contas where uuid = ?)) > 0, (select uuid from contas where conta_id = pages.conta_id_b), (select uuid from contas where conta_id = pages.conta_id_a)) as spouse_uuid, if ((select count(*) from pages where pages.conta_id_a = (select conta_id from contas where uuid = ?)) > 0, (select nome from contas where conta_id = pages.conta_id_b), (select nome from contas where conta_id = pages.conta_id_a)) as spouse_name, if ((select count(*) from pages where uuid = pages.conta_id_a = (select conta_id from contas where uuid = ?)) > 0, (select apelido from contas where conta_id = pages.conta_id_b), (select apelido from contas where conta_id = pages.conta_id_a)) as spouse_apelido from pages where pages.conta_id_a = (select conta_id from contas where uuid = ?) or pages.conta_id_b = (select conta_id from contas where uuid = ?) limit 1", [$conta_id, $conta_id, $uuid, $conta_id, $uuid, $uuid, $uuid, $uuid, $uuid, $uuid, $uuid]);

        $state_marital = $result[0]->relationship;
        $state = 'Editar Perfil';
        $my_profile = false;
        $rel_request = false;
        $reject = false;
        $accept = false;
        $payment = false;
        $notification = false;
        
        if ($result[0]->id == $conta_id) {
          $my_profile = true;
        }
        $relationship_request_id = false;
        $addClass = "";
        $ver = 0;
        if ($state_marital == 'Nativa') {
          $state_marital = 'Tem um relacionamento com ';
          $state = 'Nativo';
        } elseif ($state_marital == 'Apresentação ou Bate Porta') {
          $state = $result[0]->genre == 'Masculino' ? 'Apresentado' : 'Apresentada';
          $state_marital = $result[0]->genre == 'Masculino' ? 'Apresentou a' : 'Apresentada pelo';
          $ver++; 
        }  elseif ($state_marital == 'Namoro') {
          $state = $result[0]->genre == 'Masculino' ? 'Namorando' : 'Namorando';
          $state_marital = $result[0]->genre == 'Masculino' ? 'Namorado da' : 'Namorada da';
          $ver++;
        } elseif ($state_marital == 'União de Facto ou Vivem Maritalmente'){
          $state = $result[0]->genre == 'Masculino' ? 'Vive Maritalmente' : 'Vive Maritalmente';
          $state_marital = $result[0]->genre == 'Masculino' ? 'Vive Maritalmente com' : 'Vive Maritalmente com';
          $ver++;
        }elseif ($state_marital == 'Alambamento ou Pedido') {
          $state = $result[0]->genre == 'Masculino' ? 'Apresentado' : 'Apresentada';
          $state_marital = $result[0]->genre == 'Masculino' ? 'Noivo da' : 'Noiva do';
          $ver++;
        } elseif ($state_marital == 'Casamento Civil' || $state_marital == 'Casamento Religioso') {
          $state = $result[0]->genre == 'Masculino' ? 'Casado' : 'Casada';
          $state_marital = $result[0]->genre == 'Masculino' ? 'Casado com' : 'Casada com';
          $ver++;
        } elseif ($state_marital == 'Viuvo') {
          $state = $result[0]->genre == 'Masculino' ? 'Viúvo' : 'Viúva';
          $state_marital = $result[0]->genre == 'Masculino' ? 'Viúvo da' : 'Viúva do';
          $ver++;
        } else {
          if ($result[0]->id != $conta_id) {
            $relationship_request = $this->relationship_request($result[0]->id, $conta_id);
            if ($result[0]->relationship == 'not') {
              $state = 'Solteiro';
              $addClass = "nothing";
              if ($result[0]->genre_owner != $result[0]->genre) {
                if ($result[0]->has_page < 1) {
                  $state = 'Assumir';
                  $addClass = "target-relationship-assumir";
                }

                if ($result[0]->genre != 'Masculino') {
                  $state = 'Solteira';
                  $addClass = "nothing";
                }
              } else {
                if ($result[0]->genre != 'Masculino') {
                  $state = 'Solteira';
                  $addClass = "nothing";
                }
              }
            }
            if ($relationship_request->pedido) {
                $state = 'Cancelar Pedido';
                $addClass = "target-cancel-assumir";
                $reject = '/relationship/cancel/' . $relationship_request->uuid;
                $accept = '/relationship/accept/' . $relationship_request->uuid;
                if ($relationship_request->estado_pedido == 2) {
                  $state = 'Ver Resposta';
                  $answer = '/relationship/cancel/' . $relationship_request->uuid;
                }
            } else {
              $relationship_request = $this->relationship_request($conta_id, $result[0]->id);
              if ($relationship_request->pedido) {     
                  $accept = '/relationship/accept/' . $relationship_request->uuid;             
                  $reject = '/relationship/cancel/' . $relationship_request->uuid;
                  $rel_request = true;
                  if ($relationship_request->estado_pedido == 2) {
                    $rel_request = false;
                    $state = 'Ver Resposta';
                    if ($result[0]->id != $conta_id) {
                      $state = 'Fazer Pagamento';
                      $relationship_request_id = $relationship_request->id;
                      $notification = $this->get_ident_notification( $relationship_request->id);
                      $addClass = 'nothing paymment-to-do';
                    }
                  }
                  if ($relationship_request->estado_pedido == 4) {
                    $rel_request = false;
                    $payment = true;
                    if ($result[0]->id != $conta_id) {
                      $state = 'Pagamento em Análise';
                      $addClass = 'nothing';
                    }
                  }
              }
            }

          }
        }
        if ($ver > 0) {
          $rel_request = false;
          $addClass = 'nothing';
        }

        if ($result[0]->id == $conta_id) {
          $state = 'Editar Perfil';
        }
        $relationship_details = false;
        if ($result[0]->conta_id) {
          $relationship_details = true;
        }
        $result[0]->relationship = $state_marital;
        return response()->json([
          $result[0],
          'state' => $state,
          'my_profile' => $my_profile,
          'relationship' => $relationship_details,
          'addClass' => $addClass,
          'auth' => $conta_id,
          'accept' => $accept,
          'reject' => $reject,
          'relationship_request' => $rel_request,
          'relationship_ident' => $relationship_request_id,
          'notification' => $notification,
          'payment' => $payment,
        ]);
    }

    public function relationship_request($id_pedida, $id_pedinte){
      $result = DB::select('select uuid, pedido_relacionamento_id as id, estado_pedido_relac_id as estado_pedido, if(count(pedido_relacionamento_id) > 0, true, false) as pedido from pedido_relacionamentos where pedido_relacionamentos.conta_id_pedida = ? and pedido_relacionamentos.conta_id_pedinte = ?', [$id_pedida, $id_pedinte]);
      return $result[0];
    }

    public function relationship_requests(){
      $id_pedida = Auth::user()->conta_id;
      $result = DB::select('select uuid, estado_pedido_relac_id, if(count(pedido_relacionamento_id) > 0, true, false) as pedido from pedido_relacionamentos where pedido_relacionamentos.conta_id_pedida = ? and estado_pedido_relac_id = 1', [$id_pedida]);
      $sizeof = sizeof($result) > 0 ? true : false;
      return response()->json([
        'state' => $result[0]->pedido,
        'estado_pedido' => $result[0]->estado_pedido_relac_id,
      ]);
    }

    public function relationship_requests_pedinte(){
      $id_pedinte = Auth::user()->conta_id;
      $result = DB::select('select uuid, (select tipo_contas_id from contas where conta_id = ?) as tipo_conta, if((select count(*) from pages where conta_id_a = ? || conta_id_b = ?) > 0, true, false) as relationship, estado_pedido_relac_id, if(count(pedido_relacionamento_id) > 0, true, false) as pedido from pedido_relacionamentos where pedido_relacionamentos.conta_id_pedinte = ? || pedido_relacionamentos.conta_id_pedida = ?', [$id_pedinte, $id_pedinte, $id_pedinte, $id_pedinte, $id_pedinte]);
      $sizeof = sizeof($result) > 0 ? true : false;
      if ($sizeof) {
        $sizeof = $result[0]->pedido;
        if (!$result[0]->pedido) {
          $sizeof = $result[0]->relationship == true ? true : false;
        }
      }
      return response()->json([
        'state' => $sizeof,
        'estado_pedido' => $result[0]->estado_pedido_relac_id,
      ]);
    }

    public function search_assumir(Request $request) {
      $id = Auth::user()->conta_id;
      $text = '%'.$request->text.'%';
      $result = [];
      if ($request->text != '' && $request->text != ' ') {
        $result = DB::select("select foto, uuid, conta_id, nome, apelido, (select count(*) as count from pages where conta_id_a = contas.conta_id) as page_a, (select count(*) as count from pages where conta_id_b = contas.conta_id) as page_b from contas where genero <> (select genero from contas where conta_id = ?) and tipo_contas_id = (select tipo_contas_id from contas where tipo_contas_id <> 1 limit 1) and (nome like ? or apelido like ?) limit 5", [$id, $text, $text]);
      }
      
      $state = false;
      $data = $result;
      if (sizeof($result) > 0) {
        $state = true;
      }
      return response()->json([
        'state' => $state,
        'search' => $data,
        'text' => $text,
      ]);
    }

    public function data_profile(Request $request){
      $id = Auth::user()->conta_id;
      $uuid = $request->id;
      if ($request->type == 0) {
        $data = DB::select('select count(*) as seguindo from seguidors where seguidors.identificador_id_seguindo = (select identificador_id as identificador_id_seguindo from identificadors where id = (select conta_id from contas where uuid = ?) and identificadors.tipo_identificador_id = 1)', [$uuid]);
        return response()->json([
          'data' => $data[0]->seguindo
        ]);
      } elseif ($request->type == 1) {
        $data = DB::select('select count(*) as reactions from post_reactions where post_reactions.identificador_id = (select identificador_id as identificador_id_seguindo from identificadors where id = (select conta_id from contas where uuid = ?) and identificadors.tipo_identificador_id = 1)', [$uuid]);
        return response()->json([
          'data' => $data[0]->reactions
        ]);
      } elseif ($request->type == 2) {
        $data = DB::select('select count(*) as saveds from saveds where conta_id = (select conta_id from contas where uuid = ?)', [$uuid]);
        return response()->json([
          'data' => $data[0]->saveds
        ]);
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




    public function get_nine_text_perfil(Request $request)
    {
      try {
      $conta_logada= Auth::user()->conta_id;
      if ($request->id==0) {
        $text=DB::select('select c.* from (select p.page_id,p.formato_id,p.uuid,p.post_id,p.descricao,pg.nome,pg.foto,pg.uuid as page_uuid, (select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1)) as reagi from posts as p inner join pages as pg on pg.page_id=p.page_id where p.post_id>0 and p.formato_id=3 order by p.post_id desc) as c where reagi=1 order by c.post_id desc limit 9',[$conta_logada]);
      }else {
        $text=DB::select('select c.* from (select p.page_id,p.formato_id,p.formatop.uuid,p.post_id,p.descricao,pg.nome,pg.foto,pg.uuid as page_uuid, (select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1)) as reagi from posts as p inner join pages as pg on pg.page_id=p.page_id where p.post_id<? and p.formato_id=3 order by p.post_id desc) as c where reagi=1 order by c.post_id desc limit 9',[$conta_logada,$request->id]);
      }
      return response()->json($text);

    } catch (\Exception $e) {

    }
    }
    public function get_nine_images_perfil(Request $request)
    {
      try {
      $conta_logada= Auth::user()->conta_id;
      $conta_logada= $request->ident;
      if ($request->id==0) {
        $img=DB::select('select c.* from (select p.page_id,p.formato_id,p.uuid,p.file,p.post_id,p.descricao,pg.nome,pg.foto,pg.uuid as page_uuid, (select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = (select identificadors.identificador_id from identificadors where identificadors.id = (select conta_id from contas where uuid = ?) and identificadors.tipo_identificador_id = 1)) as reagi from posts as p inner join pages as pg on pg.page_id=p.page_id where p.post_id>0 and p.formato_id=2 order by p.post_id desc) as c where reagi=1 order by c.post_id desc limit 9',[$conta_logada]);
      }else {
        $img=DB::select('select c.* from (select p.page_id,p.formato_id,p.uuid,p.file,p.post_id,p.descricao,pg.nome,pg.foto,pg.uuid as page_uuid, (select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = (select identificadors.identificador_id from identificadors where identificadors.id = (select conta_id from contas where uuid = ?) and identificadors.tipo_identificador_id = 1)) as reagi from posts as p inner join pages as pg on pg.page_id=p.page_id where p.post_id<? and p.formato_id=2 order by p.post_id desc) as c where reagi=1 order by c.post_id desc limit 9',[$conta_logada,$request->id]);
      }
      return response()->json($img);
    } catch (\Exception $e) {

    }
    }
    public function get_nine_videos_perfil(Request $request)
    {
      try {
        $conta_logada = Auth::user()->conta_id;
        $conta_logada = $request->ident;
        //return $conta_logada;
        if ($request->id==0) {
          $video=DB::select('select c.* from (select p.page_id,p.formato_id,p.uuid,p.file,p.thumbnail,p.post_id,p.descricao,pg.nome,pg.foto,pg.uuid as page_uuid, (select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = (select identificadors.identificador_id from identificadors where identificadors.id = (select conta_id from contas where uuid = ?) and identificadors.tipo_identificador_id = 1)) as reagi from posts as p inner join pages as pg on pg.page_id=p.page_id where p.post_id>0 and p.formato_id=1 order by p.post_id desc) as c where reagi=1 order by c.post_id desc limit 9',[$conta_logada]);
        } else {
          $video=DB::select('select c.* from (select p.page_id,p.formato_id,p.uuid,p.file,p.thumbnail,p.post_id,p.descricao,pg.nome,pg.foto,pg.uuid as page_uuid, (select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = (select identificadors.identificador_id from identificadors where identificadors.id = (select conta_id from contas where uuid = ?) and identificadors.tipo_identificador_id = 1)) as reagi from posts as p inner join pages as pg on pg.page_id=p.page_id where p.post_id<? and p.formato_id=1 order by p.post_id desc) as c where reagi=1 order by c.post_id desc limit 9',[$conta_logada,$request->id]);
        }
        return response()->json($video);
      } catch (Exception $e) {

      }
    }

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

    public function get_ident_notification($id){
      $id = DB::select('select notification_id from notifications where identificador_id_destino = (select identificador_id from identificadors where id = ? and tipo_identificador_id = 5)', [$id])[0]->notification_id;
      return $id;
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

          $takePhone = str_replace("-","",$request->telefone);
          $takeEmail = $request->email;
          $auth = new AuthController();
          $account_name = $auth->defaultDate();

          $password = Hash::make($request->password);

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


                $result_email = DB::table('contas')
                     ->where('email','=',$takeEmail)
                     ->get();

                $result_phone = DB::table('contas')
                     ->where('telefone','=',$takePhone)
                     ->get();

                if (sizeof($result_email) > 0) {


                    DB::table('contas')
                            ->where('conta_id', $account_name[0]->conta_id)
                            ->update([
                              'nome' => $request->nome,
                              'apelido' => $request->apelido,
                              'genero' => $request->genre,
                              'descricao' => $request->bio,

                              'telefone' =>$takePhone,
                              'updated_at' => $request->$date_create_update

                          ]);

                  if ($password != null) {

                                DB::table('logins')->where('conta_id', $account_name[0]->conta_id)
                                ->update([
                                  'password' => $password,

                                  'telefone' =>$takePhone,
                                  'updated_at' => $request->$date_create_update
                                ]);

                  }else{
                              DB::table('logins')->where('conta_id', $account_name[0]->conta_id)
                              ->update([
                                  'telefone' =>$takePhone,
                                  'updated_at' => $request->$date_create_update
                              ]);
                      }

                    return back()->with('info',"Email não salvo porque já existe, salvamos as outras informações");

                }else if(sizeof($result_phone) > 0){


                    DB::table('contas')
                            ->where('conta_id', $account_name[0]->conta_id)
                            ->update([
                              'nome' => $request->nome,
                              'apelido' => $request->apelido,
                              'genero' => $request->genre,
                              'descricao' => $request->bio,
                              'email' =>  $takeEmail,

                              'updated_at' => $request->$date_create_update

                          ]);

                  if ($password != null) {
                                DB::table('logins')->where('conta_id', $account_name[0]->conta_id)
                                ->update([
                                  'password' => $password,
                                  'email' => $request->email,

                                  'updated_at' => $request->$date_create_update
                                ]);

                  }else{
                              DB::table('logins')->where('conta_id', $account_name[0]->conta_id)
                              ->update([
                                  'email' => $request->email,

                                  'updated_at' => $request->$date_create_update
                              ]);
                      }

                    return back()->with('info'," Telefone não salvo porque já existe, salvamos as outras informações");


                }else if(sizeof($result_phone) > 0 && sizeof($result_email) > 0){

                            DB::table('contas')
                            ->where('conta_id', $account_name[0]->conta_id)
                            ->update([
                              'nome' => $request->nome,
                              'apelido' => $request->apelido,
                              'genero' => $request->genre,
                              'descricao' => $request->bio,
                              'updated_at' => $request->$date_create_update

                          ]);

                  if ($password != null) {
                                DB::table('logins')->where('conta_id', $account_name[0]->conta_id)
                                ->update([
                                  'password' => $password,
                                  'updated_at' => $request->$date_create_update
                                ]);

                  }

                    return back()->with('info'," Email e Telefone não salvos porque já existem, salvamos as outras informações");


                }
                else{

                      DB::table('contas')
                            ->where('conta_id', $account_name[0]->conta_id)
                            ->update([
                              'nome' => $request->nome,
                              'apelido' => $request->apelido,
                              'genero' => $request->genre,
                              'descricao' => $request->bio,
                              'email' =>  $takeEmail,
                              'telefone' =>$takePhone,
                              'updated_at' => $request->$date_create_update

                          ]);

                           if ($password != null) {
                              DB::table('logins')->where('conta_id', $account_name[0]->conta_id)
                              ->update([
                                'password' => $password,
                                'email' => $request->email,
                                'telefone' =>$takePhone,
                                'updated_at' => $request->$date_create_update
                              ]);

                         }else{
                                DB::table('logins')->where('conta_id', $account_name[0]->conta_id)
                                ->update([
                                'email' => $request->email,
                                'telefone' =>$takePhone,
                                'updated_at' => $request->$date_create_update
                            ]);
                         }
                        return redirect()->route('account.profile');
              }

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

    public function engagement_proposal(Request $request)
    {
        $auth = new AuthController();
        $this->Pedido_relac($request);
        return back();
    }

    public function Pedido_relac(Request $request)
    {
        try {
          $auth = new AuthController();
          $conta=Auth::user()->conta_id;
          $control= DB::select('select ct.conta_id, (select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_pedida_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_pedinte_identify,(select count(*)from pedido_relacionamentos as pr where pr.conta_id_pedida = ? and pr.conta_id_pedinte= ct.conta_id or pr.conta_id_pedida = ct.conta_id and pr.conta_id_pedinte = ?) as verify_pr, (select count(*) from pages as pg where pg.conta_id_a=? and pg.tipo_page_id=1 or pg.conta_id_b=? and pg.tipo_page_id=1 or pg.conta_id_a=ct.conta_id and pg.tipo_page_id=1 or pg.conta_id_b=ct.conta_id and pg.tipo_page_id=1)as verify_page, if((select c.genero from contas as c where c.conta_id=?)=(select c.genero from contas as c where c.conta_id=ct.conta_id),1,0) as verify_gener from contas as ct where ct.uuid=?', [$conta,$conta,$conta,$conta,$conta,$conta, $request->conta_pedida]);
          //dd($control);
          if ( $control[0]->verify_pr== 0 && $control[0]->verify_page== 0 && $control[0]->verify_gener== 0) {

          $pedido=DB::table('pedido_relacionamentos')->insertGetId([

              'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
              'conta_id_pedida' => $control[0]->conta_id,
              'conta_id_pedinte' =>  $conta,
              'estado_pedido_relac_id' => 1,
              'name_page' => $request->name_page,
              'tipo_relacionamento_id' =>$request->tipo_relac,
              'created_at'=> $auth->dat_create_update(),


          ]);


          $idf=DB::table('identificadors')->insertGetId([
        'tipo_identificador_id' => 5,
        'id' => $pedido,
        'created_at'=> $auth->dat_create_update(),

   ]);

          DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 4,
                  'identificador_id_causador'=> $control[0]->conta_pedinte_identify,
                  'identificador_id_destino'=> $idf,
                  'identificador_id_receptor'=> $control[0]->conta_pedida_identify,
                  'created_at'=> $auth->dat_create_update(),
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
                    /* siene */
                    $extension = ($request->pagePicture->extension());
                    if (!PaginaCasalController::confirm_extension($extension)) {
                      /*Mudar o formato de imagem*/
                      $file_name = PaginaCasalController::convertImage_and_storeTo_storage($request, "app/public/img/page/", 'pagePicture');

                    } else {
                      $request->file('pagePicture')->storeAs('public/img/page', $file_name);
                    } /* end siene */


                    AuthController::updatePageProfilePicture($file_name, $request->uuidPage);
                }

                else if ($request->hasFile('profilePicture'))
                {
                    if ($request->hasFile('profilePicture') && PaginaCasalController::check_image_extension($request->profilePicture->extension()))
                    {
                        $file_name = time() . '_' . md5($request->file('profilePicture')->getClientOriginalName()) . '.' . $request->profilePicture->extension();
                      /* siene */
                        $extension = ($request->profilePicture->extension());
                        if (!PaginaCasalController::confirm_extension($extension)) {
                          /*Mudar o formato de imagem*/
                          $file_name = PaginaCasalController::convertImage_and_storeTo_storage($request, "app/public/img/users/", 'profilePicture');

                        } else {
                          $request->file('profilePicture')->storeAs('public/img/users', $file_name);
                        } /* end siene */

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

<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class PaginaCasalController extends Controller
{

    private $current_page_id = 1;
    private $current_page_uuid;
    private static $uuid = '';




    public function paginas_que_sigo($id){
      $controll = new AuthController;
      $pagenaoseguidas = $controll->paginasNaoSeguidasIndex();
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
      $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
      $paginasSeguidas = $dates['paginasSeguidas'];
      $dadosSeguida = $dates['dadosSeguida'];
      $notificacoes_count = $dates['notificacoes_count'];


      /*siene*/ //$casalPageName = $this->get_casalPage_name($uuid);

      $page_current = 'page';
      if (sizeof($page_content)>0) {

      $seguidores = Self::seguidores($page_content[0]->page_id);
      $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
      $publicacoes = $this->get_all_post($page_content[0]->page_id);
      $this->current_page_id = $page_content[0]->page_id;
      $sugerir = $this->suggest_pages($page_content[0]->page_id);
      $allPosts = $this->get_post_types($page_content[0]->page_id);
    }else {
      $seguidores =array();
      $tipo_relac = array();
      $publicacoes = array();
      $this->current_page_id = array();
      $sugerir = array();
      $allPosts = array();
    }
     $PS=array();
     $a=0;
     $page=DB::table('pages')->get();
     $conta = DB::select('select * from contas where uuid = ?', [$id]);
     $aux = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
     foreach ($page as $key ) {

       $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$key->page_id, 2 ]);
       //dd($aux1[0]->identificador_id);
       //dd($aux[0]->identificador_id);
       if(sizeof($aux1)>0){
       $aux2 = DB::select('select * from seguidors where (identificador_id_seguida, identificador_id_seguindo) = (?, ?)', [$aux1[0]->identificador_id, $aux[0]->identificador_id]);
       //$aux2 = DB::select('select * from seguidors where (identificador_id_seguida, identificador_id_seguindo) = (?, ?)', [1, 31]);
       if (sizeof($aux2)>0) {
         $PS[$a]['foto']=$key->foto;
         $PS[$a]['uuid']=$key->uuid;
         $PS[$a]['nome']=$key->nome;
         $aux3 = DB::select('select * from seguidors where identificador_id_seguida = ?', [$aux1[0]->identificador_id]);
         $PS[$a]['qtdseg']=sizeof($aux3);
         $a++;
        }
       }

       $v[0]['id']=$conta[0]->conta_id;

     }

        return view('pagina.couple_page_following', compact('account_name','v','PS','notificacoes_count','notificacoes','conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'paginasNaoSeguidas', 'paginasSeguidas', 'allPosts', 'sugerir', 'pagenaoseguidas'));
    }

    public function who_follows_me($id){
      $controll = new AuthController;
      $pagenaoseguidas = $controll->paginasNaoSeguidasIndex();
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
      $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
      $paginasSeguidas = $dates['paginasSeguidas'];
      $dadosSeguida = $dates['dadosSeguida'];
      $notificacoes_count = $dates['notificacoes_count'];


      /*siene*/ //$casalPageName = $this->get_casalPage_name($uuid);

      $page_current = 'page';
      if (sizeof($page_content)>0) {

      $seguidores = Self::seguidores($page_content[0]->page_id);
      $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
      $publicacoes = $this->get_all_post($page_content[0]->page_id);
      $this->current_page_id = $page_content[0]->page_id;
      $sugerir = $this->suggest_pages($page_content[0]->page_id);
      $allPosts = $this->get_post_types($page_content[0]->page_id);
    }else {
      $seguidores =array();
      $tipo_relac = array();
      $publicacoes = array();
      $this->current_page_id = array();
      $sugerir = array();
      $allPosts = array();
    }
      $who_follows_me=DB::select('select c.uuid,c.nome,c.apelido,c.foto from (select s.identificador_id_seguindo, (select i.id from identificadors as i where i.identificador_id=s.identificador_id_seguindo)as id from seguidors as s where s.identificador_id_seguida = (select i.identificador_id from identificadors as i where i.tipo_identificador_id = 2 and i.id= (select pa.page_id from pages as pa where pa.uuid=?)))  as al inner join contas as c on c.conta_id = id order by c.nome, c.apelido ',[$id]);

        return view('pagina.who_follows_me', compact('account_name','who_follows_me','notificacoes_count','notificacoes','conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'paginasNaoSeguidas', 'paginasSeguidas', 'allPosts', 'sugerir', 'pagenaoseguidas'));
    }

    //-----------------------começou aqui as funções otimizadas (DomingosDS)

    public function qtd_de_publicacoes(Request $request)
    {
      try {
        $qtd_de_publicacoes=DB::select('select count (*) from posts where page_id=(select page_id from pages where uuid=?) and estado_post_id=1',[$request->page_uuid]);
        return $qtd_de_publicacoes;
      } catch (\Exception $e) {

      }

    }

    public function dados_page($uuid)
    {
      $dados_page=DB::select('Select pg.uuid,pg.nome,pg.descricao,pg.foto,pg.tipo_relacionamento_id,tipo_relacionamento, if(genero_conta_b='Masculino',nome_conta_b,nome_conta_a)as nome_conta_homem, if(genero_conta_b='Masculino',apelido_conta_b,apelido_conta_a)as apeltido_conta_homem, if(genero_conta_b='Masculino',nome_conta_a,nome_conta_b)as nome_conta_mulher, if(genero_conta_b='Masculino',apelido_conta_a,apelido_conta_b)as apeltido_conta_mulher from(select pg.uuid,pg.nome,pg.descricao,pg.foto,pg.tipo_relacionamento_id,(select tr.descricao from tipo_relacionamentos as tr where tr.tipo_relacionamento_id=pg.tipo_relacionamento_id) as tipo_relacionamento,(select c.genero from contas as c where c.conta_id=pg.conta_id_a)as genero_conta_a,(select c.genero from contas as c where c.conta_id=pg.conta_id_b)as genero_conta_b,(select c.nome from contas as c where c.conta_id=pg.conta_id_a)as nome_conta_a,(select c.apelido from contas as c where c.conta_id=pg.conta_id_a)as apelido_conta_a,(select c.nome from contas as c where c.conta_id=pg.conta_id_b)as nome_conta_b,(select c.apelido from contas as c where c.conta_id=pg.conta_id_b)as apelido_conta_b from pages as pg where pg.uuid=?) as pg',[$uuid]);
    }
    public function qtd_de_seguidores(Request $request)
    {
      try {
        $qtd_de_seguidores=DB::select('select count (*) from seguidors as s where s.identificador_id_seguida=(select i.identificador_id from identificadors as i where i.tipo_identificador_id=2 and i.id=(select page_id from pages where uuid=?))',[$request->page_uuid]);
        return $qtd_de_seguidores;
      } catch (\Exception $e) {
      }

    }

    public function get_follow_me(Request $request)
  {
    try {
      $result=DB::select('select c.conta_id,c.uuid,c.nome,c.apelido,c.foto from(select s.identificador_id_seguindo from seguidors as s where s.identificador_id_seguida=(select i.identificador_id from identificadors as i where i.tipo_identificador_id=2 and i.id=(select page_id from pages where uuid=?))) as p inner join contas as c on c.conta_id=(select id from identificadors where identificador_id=p.identificador_id_seguindo)',[$request->page_uuid]);
      return $result;
    } catch (\Exception $e) {
    }
  }

  public function qtd_de_likes_page(Request $request)
  {
    try {
      $qtd_de_likes_page=DB::select('select count(*) from post_reactions as pr inner join posts as  p on p.page_id=(select page_id from pages where uuid=?) where pr.post_id = p.post_id',[$request->page_uuid]);
      return $qtd_de_likes_page;
    } catch (\Exception $e) {
    }

  }

  public function get_nine_text_page(Request $request)
  {
    try {
    if ($request->id==0) {
      $text=DB::select('Select p.uuid,p.formato_id,p.post_id,p.descricao,p.created_at from posts as p where p.page_id=(select page_id from pages where uuid=?) and p.formato_id=3 order by p.post_id desc limit 9',[$request->uuid]);
    }else {
      $text=DB::select('Select p.uuid,p.formato_id,p.post_id,p.descricao,p.created_at from posts as p where p.page_id=(select page_id from pages where uuid=?) and p.formato_id=3 and p.post_id<? order by p.post_id desc limit 9',[$request->uuid,$request->id]);
    }
    return response()->json($text);

  } catch (\Exception $e) {
  }
  }
  public function get_nine_images_page(Request $request)
  {
    try {
      if ($request->id==0) {
        $img=DB::select('Select p.uuid,p.formato_id,p.post_id,p.descricao,p.file,p.created_at from posts as p where p.page_id=(select page_id from pages where uuid=?) and p.formato_id=2 order by p.post_id desc limit 9',[$request->uuid]);
      }else {
        $img=DB::select('Select p.uuid,p.formato_id,p.post_id,p.descricao,p.file,p.created_at from posts as p where p.page_id=(select page_id from pages where uuid=?) and p.formato_id=2 and p.post_id<? order by p.post_id desc limit 9',[$request->uuid,$request->id]);
      }
    return response()->json($img);
  } catch (\Exception $e) {

  }
  }
  public function get_nine_videos_page(Request $request)
  {
    try {
    if ($request->id==0) {
      $video=DB::select('Select p.uuid,p.formato_id,p.post_id,p.descricao,p.file,p.created_at from posts as p where p.page_id=(select page_id from pages where uuid=?) and p.formato_id=1 order by p.post_id desc limit 9',[$request->uuid]);
    }else {
      $video=DB::select('Select p.uuid,p.formato_id,p.post_id,p.descricao,p.file,p.created_at from posts as p where p.page_id=(select page_id from pages where uuid=?) and p.formato_id=1 and p.post_id<? order by p.post_id desc limit 9',[$request->uuid,$request->id]);
    }
    return response()->json($video);
  } catch (\Exception $e) {
  }
  }

//------------------- fim das funções otomizadas (DomingosDS)
    public function page_update(Request $request)
    {
    try {


        if ($request->nome_page != null ) {
        $pages = DB::table('pages')->where(['uuid'=>$request->uuid])->update([
         'nome' => $request->nome_page,
         //'tipo_relacionamento_id' => 1,
     ]);
    }
    return redirect()->route('couple.page1',$request->uuid);


    }  catch (Exception $e) {
        dd($e);
    }


    }
    public function conta_seguinte()
    {
       $dadosSeguida = DB::table('seguidors')
               ->join('identificadors', 'seguidors.identificador_id_seguindo', '=', 'identificadors.identificador_id')
               ->select('seguidors.*', 'identificadors.id')
               ->get();
        $conta_seguinte=array();
          $controll = new AuthController;
          $dates = $controll->default_();
          $conta_logada = $dates['conta_logada'];
          foreach ($dadosSeguida as $key => $value) {
            if ($value->id ==  $conta_logada[0]->conta_id) {
              $conta_seguinte[$key] = $value->identificador_id_seguida;
            }
          }

        return $conta_seguinte;
    }

    public function index(){


      $page_couple = new AuthController();
      $dates = $page_couple->default_();

      $controll = new AuthController;
      $pagenaoseguidas = $controll->paginasNaoSeguidasIndex();
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
      $paginasSeguidas = $dates['paginasSeguidas'];
      $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
      $dadosSeguida = $dates['dadosSeguida'];
      $notificacoes_count = $dates['notificacoes_count'];


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
      $casalPageName = $this->get_casalPage_name($page_content);
      return view('pagina.couple_page', compact('account_name','v','notificacoes_count','notificacoes','conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'paginasSeguidas', 'dadosSeguida', 'paginasNaoSeguidas', 'allPosts', 'sugerir','casalPageName', 'pagenaoseguidas'));
    }

    public function accepted_relationship(Request $request, $uuid)
      {
        $controll = new AuthController;
        DB::table('pedido_relacionamentos')->where('uuid',$uuid)
        ->update(['estado_pedido_relac_id' => 2, 'updated_at' => $controll->dat_create_update()]);
       $aux= DB::select('select pr.conta_id_pedida,pr.conta_id_pedinte,pr.pedido_relacionamento_id,pr.uuid,(select i.identificador_id from identificadors as i where i.tipo_identificador_id=5 and i.id=pr.pedido_relacionamento_id)as pedido_relac_idtf,(select i.identificador_id from identificadors as i where i.tipo_identificador_id=1 and i.id=pr.conta_id_pedinte)as conta_pedinte_idtf,(select i.identificador_id from identificadors as i where i.tipo_identificador_id=1 and i.id=pr.conta_id_pedida)as conta_pedida_idtf  from pedido_relacionamentos as pr where pr.uuid=?', [$uuid]);
       //dd($aux);
       if (sizeof($aux)>0) {
         DB::table('pedido_relacionamentos')->where('conta_id_pedida', $aux[0]->conta_id_pedida)->where('pedido_relacionamento_id','<>',$aux[0]->pedido_relacionamento_id)->orwhere('conta_id_pedinte', $aux[0]->conta_id_pedida)->where('pedido_relacionamento_id','<>',$aux[0]->pedido_relacionamento_id)->delete();
         DB::table('pedido_relacionamentos')->where('conta_id_pedida', $aux[0]->conta_id_pedinte)->where('pedido_relacionamento_id','<>',$aux[0]->pedido_relacionamento_id)->orwhere('conta_id_pedinte', $aux[0]->conta_id_pedinte)->where('pedido_relacionamento_id','<>',$aux[0]->pedido_relacionamento_id)->delete();
         DB::table('notifications')->where('id_action_notification',4)->where('identificador_id_receptor',$aux[0]->conta_pedinte_idtf)->delete();
         DB::table('notifications')->where('id_action_notification',4)->where('identificador_id_receptor',$aux[0]->conta_pedida_idtf)->delete();

          DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 7,
                  'identificador_id_causador'=> $aux[0]->conta_pedida_idtf,
                  'identificador_id_destino'=> $aux[0]->pedido_relac_idtf,
                  'identificador_id_receptor'=> $aux[0]->conta_pedinte_idtf,
                  'created_at'=> $controll->dat_create_update(),

                  ]);
                }

        return back();
      }
      public function relationship_accept(Request $request, $uuid){

        $tipo=DB::select('select (select nome from contas where conta_id = pr.conta_id_pedinte)as nome,(select apelido from contas where conta_id = pr.conta_id_pedinte) as apelido,(select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = pr.tipo_relacionamento_id ) as tipo_relacionamento from pedido_relacionamentos as pr where uuid = ?', [$uuid]);
        $resposta='Ao clicar em "Sim, Aceito", você concorda com o que os termos dizem sobre o ';
        $resposta.=$tipo[0]->tipo_relacionamento;
        $resposta.='. Caso tenha alguma DÚVIDA, seria bem melhor consultar antes. Aceita Assumir o(a)  ';
        $resposta.= $tipo[0]->nome;
        $resposta.= ' ';
        $resposta.= $tipo[0]->apelido;
        $resposta.= '?';

        return /*response()->json($resposta);*/ back();
      }

      public function cancel_request_relationship($uuid){
        
        $control = DB::select('select pr.pedido_relacionamento_id,(select n.notification_id from notifications as n where n.id_action_notification=4 and  n.identificador_id_causador=(select i.identificador_id from identificadors as i where i.tipo_identificador_id=1 and i.id=pr.conta_id_pedinte) and n.identificador_id_receptor=(select i.identificador_id from identificadors as i where i.tipo_identificador_id=1 and i.id=pr.conta_id_pedida) and n.identificador_id_destino=(select i.identificador_id from identificadors as i where i.tipo_identificador_id=5 and i.id=pr.pedido_relacionamento_id)) as id_not, (select identificador_id from identificadors where id= pr.pedido_relacionamento_id and tipo_identificador_id=5) as identify from pedido_relacionamentos as pr where uuid = ?', [$uuid]);

        $resposta = 0;

        if (sizeof($control)>0) {
            DB::table('identificadors')->where('identificador_id',$control[0]->identify)
            ->delete();
            DB::table('pedido_relacionamentos')->where('pedido_relacionamento_id',$control[0]->pedido_relacionamento_id)
            ->delete();
            DB::table('notifications')->where('notification_id',$control[0]->id_not)
            ->delete();
            $resposta = 1;        
        }
        return back();
      }

      public function reject_relationship(Request $request){
        $control=DB::select('select pr.pedido_relacionamento_id,(select n.notification_id from notifications as n where n.id_action_notification=4 and  n.identificador_id_causador=(select i.identificador_id from identificadors as i where i.tipo_identificador_id=1 and i.id=pr.conta_id_pedinte) and n.identificador_id_receptor=(select i.identificador_id from identificadors as i where i.tipo_identificador_id=1 and i.id=pr.conta_id_pedida) and n.identificador_id_destino=(select i.identificador_id from identificadors as i where i.tipo_identificador_id=5 and i.id=pr.pedido_relacionamento_id)) as id_not, (select identificador_id from identificadors where id= pr.pedido_relacionamento_id and tipo_identificador_id=5) as identify from pedido_relacionamentos as pr where uuid = ?', [$request->id1]);
        $resposta= 0;

        if (sizeof($control)>0) {
                  DB::table('identificadors')->where('identificador_id',$control[0]->identify)
                  ->delete();
                  DB::table('pedido_relacionamentos')->where('pedido_relacionamento_id',$control[0]->pedido_relacionamento_id)
                  ->delete();
                  DB::table('notifications')->where('notification_id',$control[0]->id_not)
                  ->delete();
                  $resposta= 1;        }
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

          $controll = new AuthController;
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
          $paginasSeguidas = $dates['paginasSeguidas'];
          $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
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
                    return view('relacionamento.index', compact('account_name','notificacoes_count', 'pedido', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'paginasSeguidas', 'paginasNaoSeguidas', 'dadosSeguida',));
      }

    public function request_relationship() {
      $controll = new AuthController;
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
        $dadosSeguida = $dates['dadosSeguida'];
        $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
        $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
        $page_current = 'relationship_request';
        //return view('relacionamento.index', compact('account_name', 'pedido', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida',));


        /*siene*/ //$casalPageName = $this->get_casalPage_name($page_content);
        //return view('relacionamento.index', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida', ));

        return view('relacionamento.index', compact('account_name','notificacoes_count', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'paginasNaoSeguidas', 'paginasNaoSeguidas', 'dadosSeguida',));

    }


    public function show_page()
    {

        try {
            /*$auth = new AuthController;
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


            $controll = new AuthController;
            $pagenaoseguidas = $controll->paginasNaoSeguidasIndex();
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
                  $paginasSeguidas = $dates['paginasSeguidas'];
                  $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
                  $dadosSeguida = $dates['dadosSeguida'];
                  $page_current = 'relationship_request';
                  $notificacoes_count = $dates['notificacoes_count'];

                    $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);

                    $seguidores = Self::seguidores($page_content[0]->page_id);

                    $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
                    $publicacoes = $this->get_all_post($page_content[0]->page_id);
                    $this->current_page_id = $page_content[0]->page_id;
                    $conta_logada = $auth->defaultDate();

                    $sugerir = $this->suggest_pages($page_content[0]->page_id);
                    $allPosts = $this->get_post_types($page_content[0]->page_id);

                    /*siene*/ //$casalPageName = $this->get_casalPage_name($page_content);



                    //return view('pagina.couple_page', compact('account_name','notificacoes', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'allPosts', 'sugerir',));


                    return view('pagina.couple_page', compact('account_name','notificacoes_count','notificacoes', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'paginasNaoSeguidas', 'paginasSeguidas', 'allPosts', 'sugerir' , 'pagenaoseguidas'));

            //        return view('pagina.couple_page', compact('account_name','notificacoes', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'allPosts', 'sugerir'));
        } catch (Exception $e) {
            dd($e);
        }


    }

    public function my_pages(){
        try {
          $controll = new AuthController;
          $pagenaoseguidas = $controll->paginasNaoSeguidasIndex();
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
          $page_current = 'relationship_request';



            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $seguidores = Self::seguidores($page_content[0]->page_id);
            $tipo_relac = $this->type_of_relac($page_content[0]->tipo_relacionamento_id);
            $publicacoes = $this->get_all_post($page_content[0]->page_id);
            $this->current_page_id = $page_content[0]->uuid;


            //======================
              // siene
            //=============================================

            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);


            //$casalPageName = $this->get_casalPage_name($page_content);

            //return view('pagina.pages', compact('account_name', 'conta_logada','notificacoes', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'sugerir', 'allPosts',));

            return view('pagina.pages', compact('account_name', 'conta_logada','notificacoes_count','notificacoes', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'paginasNaoSeguidas', 'paginasSeguidas', 'sugerir', 'allPosts', 'pagenaoseguidas'));

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
          $controll = new AuthController;
          $pagenaoseguidas = $controll->paginasNaoSeguidasIndex();
           $dates = $controll->default_();
          $account_name = $dates['account_name'];
          $checkUserStatus = $dates['checkUserStatus'];
          $profile_picture = $dates['profile_picture'];
          $isUserHost = $dates['isUserHost'];
          $hasUserManyPages = $dates['hasUserManyPages'];
          $allUserPages = $dates['allUserPages'];
          $page_content = $dates['page_content'];
          $conta_logada = $dates['conta_logada'];
          $notificacoes_count = $dates['notificacoes_count'];
          $notificacoes = $dates['notificacoes'];
          $paginasSeguidas = $dates['paginasSeguidas'];
          $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
          $dadosSeguida = $dates['dadosSeguida'];
          $page_current = 'relationship_request';


        //***************** siene *******************//
          $casalPageName = self::get_casalPage_name($uuid);
          $uuidToCompare = $uuid;

        //***************** fim ********************//


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

          //======================================
            // siene
          //=============================================

          $sugerir = $this->suggest_pages($page_content[0]->page_id);
          $allPosts = $this->get_post_types($page_content[0]->page_id);


          if ($page_content[0]->conta_id_a == $conta_logada[0]->conta_id || $page_content[0]->conta_id_b == $conta_logada[0]->conta_id) {
            $v=1;
          }else {
            $v=0;
          }

          //return view('pagina.couple_page', compact('account_name','notificacoes','v', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'sugerir', 'allPosts', 'casalPageName', 'uuidToCompare'));
          $conta_seguinte = $this->conta_seguinte();

          return view('pagina.couple_page', compact('account_name','notificacoes_count','notificacoes','v', 'conta_logada', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'dadosSeguida', 'paginasNaoSeguidas', 'paginasSeguidas', 'sugerir', 'allPosts', 'casalPageName', 'conta_seguinte', 'pagenaoseguidas'));

        } catch (Exception $e) {
            dd($e);
        }

    }


    public function edit_couple(){
        try {
          $controll = new AuthController;
          $pagenaoseguidas = $controll->paginasNaoSeguidasIndex();
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
          $page_current = 'relationship_request';
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);


            /*siene*/


            //return view('pagina.edit_couple', compact('account_name','notificacoes', 'conta_logada', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'allPosts', 'sugerir'));

            return view('pagina.edit_couple', compact('account_name','notificacoes_count','notificacoes', 'conta_logada', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'allPosts', 'sugerir'));

        } catch (Exception $e) {
            dd($e);
        }
    }


    public function delete_couple_page($id){
        try {
          $auth = new AuthController;
          $dates = $auth->default_();

          $conta_logada = $dates['conta_logada'];

          $page= DB::select('select * from pages where uuid = ?', [$id]);
          if ($conta_logada[0]->conta_id == $page[0]->conta_id_a) {
            $aux1= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
            $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);

          }else {
            $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
            $aux1= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);

          }
          $aux3= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->page_id, 2 ]);

          DB::table('pages')->where('uuid',$id)
          ->update(['estado_pagina_id' => 4, 'updated_at' => $controll->dat_create_update()]);

          DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 11,
                  'identificador_id_causador'=> $aux1[0]->identificador_id,
                  'identificador_id_destino'=> $aux3[0]->identificador_id,
                  'identificador_id_receptor'=> $aux1[0]->identificador_id,
                  'created_at'=> $auth->dat_create_update(),                  ]);

          DB::table('notifications')->insert([
                          'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                          'id_state_notification' => 2,
                          'id_action_notification' => 11,
                          'identificador_id_causador'=> $aux1[0]->identificador_id,
                          'identificador_id_destino'=> $aux3[0]->identificador_id,
                          'identificador_id_receptor'=> $aux2[0]->identificador_id,
                          'created_at'=> $auth->dat_create_update(),
                          ]);


                          return redirect()->route('account.home.feed');
       } catch (Exception $e) {
            dd($e);
        }
    }

    public function editar_pagina(Request $request)
{
    $pages = DB::table('pages')->where(['page_id'=>$request->id])->update([
     'nome' => $request->nome,
     'descricao' => $request->descricao,
     'categoria_id' => $request->categoria
 ]);
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
           $controll = new AuthController;


           DB::table('pedido_relacionamentos')->where('pedido_relacionamento_id',$request->p_id)
           ->update(['estado_pedido_relac_id' => 6, 'updated_at' =>$controll->dat_create_update()]);
           $not= DB::select('select * from notifications where notification_id = ?',[$request->n_id]);
           DB::table('notifications')->where('notification_id',$request->n_id)
           ->update(['identificador_id_causador' => $not[0]->identificador_id_receptor]);
           DB::table('notifications')->where('notification_id',$request->n_id)
           ->update(['identificador_id_receptor' => $not[0]->identificador_id_causador]);
           DB::table('notifications')->where('notification_id',$request->n_id)
           ->update(['id_action_notification' => 10, 'updated_at' =>$controll->dat_create_update()]);

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

                    // Check for video duration
                      if ( $this->check_video_duration($request->file('imgOrVideo')) > 1 ) {
                        return back();
                     }

                    $this->store($request->message, $file_name, $page_id, $this->formato_id('Video'));
                }

            }

            else {
                if ($request->longVideo) {
                  return back();
                }
                $this->store($request->message, null, $page_id, $this->formato_id('Textos'));
            }

            return back();


        } catch (Exception $e) {
            dd($e);
        }
    }

    /* SIENE CODING - Check for video duration */

    function check_video_duration($video) {

      $check = new \getID3;
      $file = $check->analyze($video);
      $duration_seconds = $file['playtime_seconds'];
      $minutos = number_format(floor($duration_seconds / 60), 0);

      return intval($minutos);

    }


    /* END SIENE CODING */


    public function ask_for_annulment(Request $request)
    {
        try
        {
          $controll = new AuthController;


          DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 12,
                  'identificador_id_causador'=>$request->identifyOutraC,
                  'identificador_id_destino'=>$request->identifyPage,
                  'identificador_id_receptor'=>$request->identifyCausador,
                  'created_at'=> $controll->dat_create_update(),
                  ]);
                      return redirect()->route('account.home.feed');

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function undo_page_deletion(Request $request)
    {
        try
        {
          $controll = new AuthController;


          DB::table('pages')->where('uuid',$request->uuidPage)
        ->update(['estado_pagina_id' => 1, 'updated_at' =>$controll->dat_create_update()]);

        $aux = DB::select('select notification_id from notifications where (id_action_notification,identificador_id_causador,identificador_id_destino) = (?, ?, ?)', [11, $request->identifyCausador, $request->identifyPage]);
        $aux12 = DB::select('select notification_id from notifications where (id_action_notification,identificador_id_causador,identificador_id_destino) = (?, ?, ?)', [12, $request->identifyOutraC, $request->identifyPage]);
         for ($i=sizeof($aux12); $i > 0; $i--) {
           DB::table('notifications')->where(
             'notification_id', $aux12[$i-1]->notification_id)->delete();
         }
        DB::table('notifications')->where(
          'notification_id', $aux[1]->notification_id)->delete();

          DB::table('notifications')->where(
            'notification_id', $aux[0]->notification_id)->delete();

            DB::table('notifications')->insert([
                    'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'id_state_notification' => 2,
                    'id_action_notification' => 13,
                    'identificador_id_causador'=>$request->identifyCausador,
                    'identificador_id_destino'=>$request->identifyPage,
                    'identificador_id_receptor'=>$request->identifyOutraC,
                    'created_at'=> $controll->dat_create_update(),
                    ]);

                    DB::table('notifications')->insert([
                            'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                            'id_state_notification' => 2,
                            'id_action_notification' => 13,
                            'identificador_id_causador'=>$request->identifyCausador,
                            'identificador_id_destino'=>$request->identifyPage,
                            'identificador_id_receptor'=>$request->identifyCausador,
                            'created_at'=> $controll->dat_create_update(),
                            ]);

                            return redirect()->route('account.home.feed');

        } catch (Exception $e) {
            dd($e);
        }
    }



    private function store($description, $file_name = null, $id, $format)
    {
        try {
          $controll = new AuthController;


            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            //dd($uuid);
            if($description == null || $description == ""){
                $description = "";
            }
          /*  DB::insert('insert into posts(uuid, descricao, file, page_id,reactions, comments, total_reactions_comments, formato_id, estado_post_id, created_at) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                [$uuid, $description, $file_name, $id, 0, 0, 0, $format, 1, $controll->dat_create_update()]);*/

                DB::insert('insert into posts(uuid, descricao, file, page_id, formato_id, estado_post_id, created_at) values(?, ?, ?, ?, ?, ?, ?)',
                    [$uuid, $description, $file_name, $id, $format, 1, $controll->dat_create_update()]);


                DB::table('identificadors')->insert([
              'tipo_identificador_id' => 3,
              'id' => DB::select('select * from posts where uuid = ?', [$uuid])[0]->post_id,
              'created_at'=> $controll->dat_create_update(),
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
        $data = DB::select('select * from seguidors where identificador_id_seguindo <> ? AND identificador_id_seguida <> ?', [$hostId, $hostId]);
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

    public function delete_page($id){
      try {
          $controll = new AuthController;
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
          $page_current = 'delete_page';
          $page_content = $dates['page_content'];
            $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
            $sugerir = $this->suggest_pages($page_content[0]->page_id);
            $allPosts = $this->get_post_types($page_content[0]->page_id);
            $dados=array();
            $key=DB::table('notifications')->where('notification_id',$id)
            ->get();
            $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key[0]->identificador_id_causador ]);
            $aux= DB::select('select * from identificadors where identificador_id = ?', [$key[0]->identificador_id_destino]);
            if (sizeof($aux)>0){
              $page =  DB::select('select * from pages where page_id = ?',[$aux[0]->id]);
              $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
              if ($page[0]->conta_id_a == $conta[0]->conta_id) {
                $aux1 = DB::select('select identificador_id from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
              }else {
                $aux1 = DB::select('select identificador_id from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
              }
              $aux4 = DB::select('select identificador_id from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->page_id, 2]);
              $dados['nome_pag']=$page[0]->nome;
              $dados['uuid_pag']=$page[0]->uuid;
              $dados['identificador_pag']=$aux4[0]->identificador_id;
              $dados['identificador_causador']=$key[0]->identificador_id_causador;
              $dados['identificador_receptor']=$aux1[0]->identificador_id;
              if ($aux2[0]->id == $conta_logada[0]->conta_id){
                $dados['quem_eliminou']="você";
                $dados['verf']=1;


                  }else {
                    $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
                    $dados['quem_eliminou']=$conta[0]->nome;
                    $dados['verf']=2;


                   }
                }
            return view('notificacoes.delete_page', compact('dados','account_name','notificacoes_count','notificacoes', 'conta_logada', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_current', 'allPosts', 'sugerir', 'page_content'));
        } catch (Exception $e) {
            dd($e);
        }
    }
    //---------------------------------------------------------

    // Pega o nome do casal da pagina
    private static function get_casalPage_name($uid)
    {
      //dd($uid);
      $data = DB::table('pages')->where('uuid', $uid)->select('conta_id_a', 'conta_id_b')->get();

      $donodapage = DB::table('pedido_relacionamentos')->where('conta_id_pedida', $data[0]->conta_id_a)->orwhere('conta_id_pedinte', $data[0]->conta_id_a)->get();

      if (sizeof($donodapage) > 0) {
      $tipo_relac = $donodapage[0]->tipo_relacionamento_id;

      if ($tipo_relac == 1) {
            return 'Página de '.self::get_account_nomeAndApelido('contas', $data[0]->conta_id_a) . ' & ' . self::get_account_nomeAndApelido('contas', $data[0]->conta_id_b) .' que são Nativos';
          } elseif ($tipo_relac == 2) {
            return 'Página de '.self::get_account_nomeAndApelido('contas', $data[0]->conta_id_a) . ' & ' . self::get_account_nomeAndApelido('contas', $data[0]->conta_id_b) .' que são Noivos';
          }elseif ($tipo_relac == 3) {
            return 'Página de '.self::get_account_nomeAndApelido('contas', $data[0]->conta_id_a) . ' & ' . self::get_account_nomeAndApelido('contas', $data[0]->conta_id_b) .' que são Apresentados';
          }elseif ($tipo_relac == 4) {
            return 'Página de '.self::get_account_nomeAndApelido('contas', $data[0]->conta_id_a) . ' & ' . self::get_account_nomeAndApelido('contas', $data[0]->conta_id_b) .' que são Casados';
          }elseif ($tipo_relac == 5) {
            return 'Página de '.self::get_account_nomeAndApelido('contas', $data[0]->conta_id_a) . ' & ' . self::get_account_nomeAndApelido('contas', $data[0]->conta_id_b) .' que são Namorados';
          }
          } else{
            return 'Página de '.self::get_account_nomeAndApelido('contas', $data[0]->conta_id_a) . ' & ' . self::get_account_nomeAndApelido('contas', $data[0]->conta_id_b) .' que são Nativos';
          }

    }

    private static function get_account_nomeAndApelido($table_name, $account_id) {
      $account_name = DB::table($table_name)->where('conta_id', $account_id)->select('nome', 'apelido')->get()[0];
      return $account_name->nome . ' ' . $account_name->apelido;
    }


    /* fim codigo siene */
}

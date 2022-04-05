<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Conta;
use App\Models\Identificador;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PaginaCasalController;
use Illuminate\Support\Facades\Validator;
use App\Models\Pais;
use Illuminate\Support\Facades\Http;


/* email */

use Illuminate\Support\Facades\Mail;
use App\Mail\SendVerificationCode;

/* end email*/

class AuthController extends Controller
{
    private $casalPage;
    public function __construct(){
        //$this->middleware('auth:web1');
        $this->casalPage = new PaginaCasalController();
    }
    public function login_return (Request $request){
        if (Auth::check()) {
           return true;
        } else {
            $numero = $request->telefone;
            $password = $request->password;
            $email = $request->email;

            /*$numero = '913307387';
            $password = '$2y$10$/V5ehJy26rLqc3Z.G2IJn.PzfNZNdR1Nb/qoirD/xCHqw.aSF407m';
            $email = 'claudiopanda4@gmail.com';*/

            $result = DB::select('select * from logins where (telefone = ? && password = ?) OR (email = ? && password = ?)', [$numero, $password, $email, $password]);
            $return = sizeof($result) ? true: false;
            //dd($return);
            return $return;
        }
    }

    public function relationship_type(){
        $result = DB::select('select tipo_relacionamento_id, uuid, tipo_relacionamento from tipo_relacionamentos');
        return response()->json([
            $result,
        ]);
    }

   public function default_(){
           $account_name = $this->defaultDate();
           $checkUserStatus = Self::isCasal($account_name[0]->conta_id);
           $profile_picture = Self::profile_picture(Auth::user()->conta_id);
           $isUserHost =Self::isUserHost($account_name[0]->conta_id);
           $hasUserManyPages = Self::hasUserManyPages(Auth::user()->conta_id);
           $allUserPages = Self::allUserPages(new AuthController, Auth::user()->conta_id);
           $page_content = $this->casalPage->page_default_date($account_name);
           $conta_logada = $this->defaultDate();
           $conta_logada_identify = DB::select('select identificador_id from identificadors where (id, tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
           $notificacoes=array();
           $notificacoes_count=0;
           $a=0;
           $control_data=0;
           $nome=array();
           $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
           $notificacoes_aux=DB::select('select * from notifications where identificador_id_receptor = ? order by notification_id desc', [$aux1[0]->identificador_id]);
           //dd($notificacoes_aux);
           if (sizeof($notificacoes_aux)>0) {
             foreach ($notificacoes_aux as $key) {
               if($key->id_state_notification!= 3){

                 $notificacoes[$a]['id1']=$key->notification_id;
                 $aux_divisão_data = explode(' ', $key->created_at);
                 $notificacoes[$a]['data_creat']=$aux_divisão_data[0];
                 $notificacoes[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                 $notificacoes[$a]['barra_data']=0;

                 $date_create_update=date("Y");
                 $date_create_update.="-";
                 $date_create_update.=date("m");
                 $date_create_update.="-";
                 $date_create_update.=date("d");

                 if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                   $control_data=1;
                   $notificacoes[$a]['barra_data']=1;
                 }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                   $control_data=2;
                   $notificacoes[$a]['barra_data']=2;
                   }


                    $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_causador ]);
                    if ($aux2[0]->tipo_identificador_id == 1) {
                        $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
                        $nome[0]= $conta[0]->nome ;
                        $nome[0].= " ";
                        $nome[0].= $conta[0]->apelido;
                        $nome[1]= $conta[0]->foto;
                        $nome[2] =1;
                    } elseif ($aux2[0]->tipo_identificador_id == 2) {
                     $page= DB::select('select * from pages where page_id = ?', [$aux2[0]->id]);
                       $nome[0] =$page[0]->nome;
                       $nome[1] =$page[0]->foto;
                       $nome[2] =2;
                   }
                   //dd($key);

                   switch ($key->id_action_notification) {
                    case 1:
                       $notificacoes[$a]['notificacao']=$nome[0];
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
                        if (sizeof($aux)){
                            $tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
                            if (sizeof($tipo)){
                              $conta = DB::select('select uuid from contas where conta_id = ?', [$tipo[0]->conta_id_pedinte]);
                                $tipos=DB::select('select * from tipo_relacionamentos where tipo_relacionamento_id = ?', [$tipo[0]->tipo_relacionamento_id]);
                                $notificacoes[$a]['notificacao']=$nome[0];
                                $notificacoes[$a]['notificacao'].=" quer assumir o vosso ";
                                $notificacoes[$a]['notificacao'].=$tipos[0]->tipo_relacionamento;
                                $notificacoes[$a]['tipo']=4;
                                $notificacoes[$a]['id']=$tipo[0]->uuid;
                                $notificacoes[$a]['uuid_pedinte']=$conta[0]->uuid;

                            }
                        }
                        break;
                    case 5:
                        $notificacoes[$a]['notificacao']=$nome[0];
                        $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                        $notificacoes[$a]['tipo']=5;
                        $notificacoes[$a]['id']=$key->identificador_id_destino;
                        $aux_link = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                        $page =  DB::select('select * from pages where page_id = ?', [$aux_link[0]->id]);
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
                        if (sizeof($aux)){
                           $tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
                            if (sizeof($tipo)){
                                $notificacoes[$a]['notificacao']=$nome[0];
                                $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                                $notificacoes[$a]['tipo']=7;
                                $notificacoes[$a]['id']=$tipo[0]->uuid;
                           }
                        }
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
                        if (sizeof($aux)){
                            $tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
                            if (sizeof($tipo)){
                                $notificacoes[$a]['notificacao']= "o seu pedido de criação de pagina foi negado";
                                $notificacoes[$a]['tipo']=9;
                                $notificacoes[$a]['id']=$tipo[0]->uuid;
                            }
                        }
                        break;
                    case 10:
                        $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                        if (sizeof($aux)){
                            $tipo=DB::select('select * from pedido_relacionamentos where pedido_relacionamento_id = ?', [$aux[0]->id]);
                            if (sizeof($tipo)){
                                $notificacoes[$a]['notificacao']=$nome[0];
                                $notificacoes[$a]['notificacao'].=" Pediu que você page";
                                $notificacoes[$a]['tipo']=10;
                                $notificacoes[$a]['id']=$tipo[0]->uuid;
                            }
                        }
                        break;
                        case 11:
                            $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                            if (sizeof($aux)>0){
                              $page =  DB::select('select * from pages where page_id = ?',[$aux[0]->id]);
                                if ($aux2[0]->id == $conta_logada[0]->conta_id){
                                    $notificacoes[$a]['notificacao']=" você eliminou a sua pagina ' ";
                                    $notificacoes[$a]['notificacao'].=$page[0]->nome;
                                    $notificacoes[$a]['notificacao'].=" ', tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                }else {
                                  $notificacoes[$a]['notificacao']=$nome[0];
                                  $notificacoes[$a]['notificacao'].=" eliminou a vossa pagina ' ";
                                  $notificacoes[$a]['notificacao'].=$page[0]->nome;
                                  $notificacoes[$a]['notificacao'].=" ', ele tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                }
                                $notificacoes[$a]['tipo']=11;
                                $notificacoes[$a]['id']=$aux2[0]->id;
                            }
                            break;

                            case 12:
                                $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                                if (sizeof($aux)>0){
                                  $page =  DB::select('select * from pages where page_id = ?',[$aux[0]->id]);

                                    $notificacoes[$a]['notificacao']=$nome[0];
                                    $notificacoes[$a]['notificacao'].=" pediu que você anulasse a eliminação da vossa pagina ' ";
                                    $notificacoes[$a]['notificacao'].=$page[0]->nome;
                                    $notificacoes[$a]['notificacao'].=" '.";
                                    $notificacoes[$a]['tipo']=12;
                                    $notificacoes[$a]['id']=$aux2[0]->id;
                                    $aux12 = DB::select('select notification_id from notifications where (id_action_notification,identificador_id_destino,identificador_id_receptor) = (?, ?, ?)', [11, $key->identificador_id_destino, $key->identificador_id_receptor]);
                                    $notificacoes[$a]['id1']=$aux12[0]->notification_id;

                                }
                                break;

                                case 13:
                                    $aux= DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id_destino]);
                                    if (sizeof($aux)>0){
                                      $page =  DB::select('select * from pages where page_id = ?',[$aux[0]->id]);
                                        if ($aux2[0]->id == $conta_logada[0]->conta_id){
                                            $notificacoes[$a]['notificacao']=" você anulou a eliminação da vossa pagina ' ";
                                            $notificacoes[$a]['notificacao'].=$page[0]->nome;
                                            $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                        }else {
                                          $notificacoes[$a]['notificacao']=$nome[0];
                                          $notificacoes[$a]['notificacao'].=" anulou a eliminação da vossa pagina ' ";
                                          $notificacoes[$a]['notificacao'].=$page[0]->nome;
                                          $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                        }
                                        $notificacoes[$a]['tipo']=13;
                                        $notificacoes[$a]['id']=$aux2[0]->id;
                                        $notificacoes[$a]['link']=$page[0]->uuid;

                                    }
                                    break;

                                  }

                  $notificacoes[$a]['foto']=$nome[1];
                  $notificacoes[$a]['v']=$nome[2];
                   if ($key->id_state_notification == 2) {
                     $notificacoes_count++;
                     $notificacoes[$a]['state_notification']=2;
                   }else {
                     $notificacoes[$a]['state_notification']=1;
                   }
                   $a++;
                 }
           }
           }

          //  dd($notificacoes);
              $dadosSeguida = DB::table('seguidors')
               ->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')
               ->select('seguidors.*', 'identificadors.id')
               ->get();

               $paginasNaoSeguidas = $this->paginasNaoSeguidas();
               $paginasSeguidas = $this->paginasSeguidas();

            $dates = [
               "account_name" => $account_name,
               "checkUserStatus" => $checkUserStatus,
               "profile_picture" => $profile_picture,
               "isUserHost" => $isUserHost,
               "hasUserManyPages" => $hasUserManyPages,
               "allUserPages" => $allUserPages,
               "page_content" => $page_content,
               "checkUserStatus" => $checkUserStatus,
               "conta_logada" => $conta_logada,
               "paginasNaoSeguidas" => $paginasNaoSeguidas,
               "dadosSeguida" => $dadosSeguida,
               "paginasSeguidas" => $paginasSeguidas,
               "notificacoes" => $notificacoes,
               "notificacoes_count" => $notificacoes_count,
               "conta_logada_identify"=> $conta_logada_identify,
           ];
           return $dates;
       }

       public function dat_create_update(){
         $get_date = getdate();
         $date_create_update=date("Y");
         $date_create_update.="-";
         $date_create_update.=date("m");
         $date_create_update.="-";
         $date_create_update.=date("d");
         $date_create_update.=" ";
         $date_create_update.=$get_date['hours'];
         $date_create_update.=":";
         $date_create_update.=$get_date['minutes'];
         $date_create_update.=":";
         $date_create_update.=$get_date['seconds'];
         return $date_create_update;
       }


        public function Notifications_final()
        {

          try {

                $conta=Auth::user()->conta_id;
                //  dd($conta->conta_id);
                $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador, (select nome from pages where page_id = destino_id) as nome_destino,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6,(select uuid from posts where post_id = destino_id), (select uuid from pages where page_id = destino_id)) as link from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_destino) as tipo_destino_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id, (select count(*) from notifications as nt where nt.identificador_id_receptor= conta_identify and nt.id_state_notification = 2) as qtd_notifications from notifications as n inner join contas as ct on ct.conta_id= ?) as n where n.identificador_id_receptor= conta_identify and n.id_state_notification <> 3 and n.id_action_notification=1 ||  n.identificador_id_receptor= conta_identify and n.id_state_notification <> 3 and n.id_action_notification=2||  n.identificador_id_receptor= conta_identify and n.id_state_notification <> 3 and n.id_action_notification=3||  n.identificador_id_receptor= conta_identify and n.id_state_notification <> 3 and n.id_action_notification=5||  n.identificador_id_receptor= conta_identify and n.id_state_notification <> 3 and n.id_action_notification=6 order by n.notification_id desc limit 10', [$conta]);
                //dd($control);$control[0]->
                $notificacoes=array();
                $a=0;
                $control_data=0;
                if (sizeof($control)>0) {
                  $notificacoes_count=$control[0]->qtd_notifications;
                  foreach ($control as $key) {

                      $notificacoes[$a]['id1']=$key->notification_id;
                      $aux_divisão_data = explode(' ', $key->created_at);
                      $notificacoes[$a]['data_creat']=$aux_divisão_data[0];
                      $notificacoes[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                      $notificacoes[$a]['barra_data']=0;

                      $date_create_update=date("Y");
                      $date_create_update.="-";
                      $date_create_update.=date("m");
                      $date_create_update.="-";
                      $date_create_update.=date("d");

                      if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                        $control_data=1;
                        $notificacoes[$a]['barra_data']=1;
                      }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                        $control_data=2;
                        $notificacoes[$a]['barra_data']=2;
                        }



                        //dd($key);

                        switch ($key->id_action_notification) {
                         case 1:
                            $notificacoes[$a]['notificacao']=$key->nome_causador;
                            $notificacoes[$a]['notificacao'].=" ";
                            $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                            $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                            $notificacoes[$a]['tipo']=1;
                            $notificacoes[$a]['id']=$key->identificador_id_destino;
                            $notificacoes[$a]['link']=$key->link;
                            break;
                         case 2:
                           $notificacoes[$a]['notificacao']=$key->nome_causador;
                           $notificacoes[$a]['notificacao'].=" ";
                           $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                           $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                           $notificacoes[$a]['tipo']=2;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                            break;
                         case 3:
                           $notificacoes[$a]['notificacao']=$key->nome_causador;
                           $notificacoes[$a]['notificacao'].=" ";
                           $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                           $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                           $notificacoes[$a]['tipo']=3;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                            break;

                         case 5:
                           $notificacoes[$a]['notificacao']=$key->nome_causador;
                           $notificacoes[$a]['notificacao'].=" ";
                           $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                           $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                           $notificacoes[$a]['tipo']=5;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                             break;
                         case 6:
                           $notificacoes[$a]['notificacao']=$key->nome_causador;
                           $notificacoes[$a]['notificacao'].=" ";
                           $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                           $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                           $notificacoes[$a]['tipo']=6;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                             break;

                                       }

                       $notificacoes[$a]['foto']=$key->foto_causador;
                       $notificacoes[$a]['v']=$key->tipo_causador_identify;
                       $notificacoes[$a]['state_notification']=$key->id_state_notification;

                        $a++;

                }
                }
                dd($notificacoes);
                return $notificacoes;

          }
          catch (\Exception $e) {

          }
        }
        public function Notifications_pedido_final()
        {
            try {
                $conta=Auth::user()->conta_id;
              //  dd($conta->conta_id);
                $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador,(select uuid from pedido_relacionamentos where pedido_relacionamento_id = destino_id) as link_destino,(select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = link_destino) as tipo_pedido_relac from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_destino) as tipo_destino_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id from notifications as n inner join contas as ct on ct.conta_id= ?) as n where n.identificador_id_receptor= conta_identify and n.id_state_notification <> 3 and n.id_action_notification=4 order by n.notification_id desc limit 10', [$conta]);
                //dd($control);$control[0]->
                $not_pedido=array();
                $a=0;
                $control_data=0;
                if (sizeof($control)>0) {
                  foreach ($control as $key) {
                      $not_pedido[$a]['id1']=$key->notification_id;
                      $aux_divisão_data = explode(' ', $key->created_at);
                      $not_pedido[$a]['data_creat']=$aux_divisão_data[0];
                      $not_pedido[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                      $not_pedido[$a]['barra_data']=0;

                      $date_create_update=date("Y");
                      $date_create_update.="-";
                      $date_create_update.=date("m");
                      $date_create_update.="-";
                      $date_create_update.=date("d");

                      if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                        $control_data=1;
                        $not_pedido[$a]['barra_data']=1;
                      }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                        $control_data=2;
                        $not_pedido[$a]['barra_data']=2;
                        }
                        $not_pedido[$a]['notificacao']=$key->nome_causador;
                        $not_pedido[$a]['notificacao'].=" ";
                        $not_pedido[$a]['notificacao'].=$key->apelido_causador;
                        $not_pedido[$a]['notificacao'].=" quer assumir o vosso ";
                        $not_pedido[$a]['notificacao'].=$key->tipo_pedido_relac;
                        $not_pedido[$a]['tipo']=4;
                        $not_pedido[$a]['id']=$key->link_destino;
                        $not_pedido[$a]['foto']=$key->foto_causador;
                        $not_pedido[$a]['v']=$key->tipo_causador_identify;
                        $not_pedido[$a]['state_notification']=$key->id_state_notification;

                        $a++;

                }
                }
                dd($not_pedido);
                return $not_pedido;
            } catch (\Exception $e) {

            }

        }
        public function Notifications_request_response_final()
        {
            try {
              $conta=Auth::user()->conta_id;
            //  dd($conta->conta_id);
              $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador,(select uuid from pedido_relacionamentos where pedido_relacionamento_id = destino_id) as link_destino from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id from notifications as n inner join contas as ct on ct.conta_id= ?) as n where n.identificador_id_receptor= conta_identify and n.id_state_notification <> 3 and n.id_action_notification=7 order by n.notification_id desc limit 10', [$conta]);
              //dd($control);$control[0]->
              $not_resposta=array();
              $a=0;
              $control_data=0;
              if (sizeof($control)>0) {
                foreach ($control as $key) {

                    $not_resposta[$a]['id1']=$key->notification_id;
                    $aux_divisão_data = explode(' ', $key->created_at);
                    $not_resposta[$a]['data_creat']=$aux_divisão_data[0];
                    $not_resposta[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                    $not_resposta[$a]['barra_data']=0;

                    $date_create_update=date("Y");
                    $date_create_update.="-";
                    $date_create_update.=date("m");
                    $date_create_update.="-";
                    $date_create_update.=date("d");

                    if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                      $control_data=1;
                      $not_resposta[$a]['barra_data']=1;
                    }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                      $control_data=2;
                      $not_resposta[$a]['barra_data']=2;
                      }
                       $not_resposta[$a]['notificacao']=$key->nome_causador;
                       $not_resposta[$a]['notificacao'].=" ";
                       $not_resposta[$a]['notificacao'].=$key->apelido_causador;
                       $not_resposta[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                       $not_resposta[$a]['tipo']=7;
                       $not_resposta[$a]['id']=$key->link_destino;
                       $not_resposta[$a]['foto']=$key->foto_causador;
                       $not_resposta[$a]['v']=$key->tipo_causador_identify;
                       $not_resposta[$a]['state_notification']=$key->id_state_notification;
                      $a++;
              }
              }
              dd($not_resposta);
              return $not_resposta;
            } catch (\Exception $e) {

            }

        }
        public function Notifications_page_creat_final()
        {
            try {
              $conta=Auth::user()->conta_id;
            //  dd($conta->conta_id);
              $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador, (select uuid from pages where page_id = destino_id) as link from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_destino) as tipo_destino_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id, (select count(*) from notifications as nt where nt.identificador_id_receptor= conta_identify and nt.id_state_notification = 2) as qtd_notifications from notifications as n inner join contas as ct on ct.conta_id= 1) as n where n.identificador_id_receptor= conta_identify and n.id_state_notification <> 3 and n.id_action_notification=8 order by n.notification_id desc limit 10', [$conta]);
              //dd($control);$control[0]->
              $not_creat_page=array();
              $a=0;
              $control_data=0;
              if (sizeof($control)>0) {
                foreach ($control as $key) {

                    $not_creat_page[$a]['id1']=$key->notification_id;
                    $aux_divisão_data = explode(' ', $key->created_at);
                    $not_creat_page[$a]['data_creat']=$aux_divisão_data[0];
                    $not_creat_page[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                    $not_creat_page[$a]['barra_data']=0;

                    $date_create_update=date("Y");
                    $date_create_update.="-";
                    $date_create_update.=date("m");
                    $date_create_update.="-";
                    $date_create_update.=date("d");

                    if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                      $control_data=1;
                      $not_creat_page[$a]['barra_data']=1;
                    }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $not_creat_page[0]['barra_data'] == 0 && $a == 0) {
                      $control_data=2;
                      $not_creat_page[$a]['barra_data']=2;
                      }
                      $not_creat_page[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                      $not_creat_page[$a]['tipo']=8;
                      $not_creat_page[$a]['id']=$key->identificador_id_destino;
                      $not_creat_page[$a]['link']=$key->link;
                      $not_creat_page[$a]['foto']=$key->foto_causador;
                      $not_creat_page[$a]['v']=$key->tipo_causador_identify;
                      $not_creat_page[$a]['state_notification']=$key->id_state_notification;

                      $a++;
              }
              }
              dd($not_creat_page);
              return $not_creat_page;
            } catch (\Exception $e) {

            }

        }
        public function Notifications_page_denied_final()
        {
              $conta=Auth::user()->conta_id;
            //  dd($conta->conta_id);
              $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6 ,null, (select nome from pages where page_id = destino_id)) as nome_destino,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6,(select uuid from posts where post_id = destino_id), (select uuid from pages where page_id = destino_id)) as link,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select uuid from pedido_relacionamentos where pedido_relacionamento_id = destino_id),null) as link1_destino,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = link1_destino),null) as tipo_pedido_relac,if(n.id_action_notification=12,(select notification_id from notifications where id_action_notification= 11 and identificador_id_destino = n.identificador_id_destino and identificador_id_receptor = n.identificador_id_receptor),null) as notify_id_aux from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_destino) as tipo_destino_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id from notifications as n inner join contas as ct on ct.conta_id= ?) as n where n.identificador_id_receptor= conta_identify order by n.notification_id desc limit 10', [$conta]);
              //dd($control);$control[0]->
              $notificacoes=array();
              $notificacoes_count=0;
              $a=0;
              $control_data=0;
              if (sizeof($control)>0) {
                foreach ($control as $key) {
                  if($key->id_state_notification!= 3){

                    $notificacoes[$a]['id1']=$key->notification_id;
                    $aux_divisão_data = explode(' ', $key->created_at);
                    $notificacoes[$a]['data_creat']=$aux_divisão_data[0];
                    $notificacoes[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                    $notificacoes[$a]['barra_data']=0;

                    $date_create_update=date("Y");
                    $date_create_update.="-";
                    $date_create_update.=date("m");
                    $date_create_update.="-";
                    $date_create_update.=date("d");

                    if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                      $control_data=1;
                      $notificacoes[$a]['barra_data']=1;
                    }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                      $control_data=2;
                      $notificacoes[$a]['barra_data']=2;
                      }



                      //dd($key);

                      switch ($key->id_action_notification) {
                       case 1:
                          $notificacoes[$a]['notificacao']=$key->nome_causador;
                          $notificacoes[$a]['notificacao'].=" ";
                          $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                          $notificacoes[$a]['tipo']=1;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $notificacoes[$a]['link']=$key->link;
                          break;
                       case 2:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                         $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                          $notificacoes[$a]['tipo']=2;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $notificacoes[$a]['link']=$key->link;
                          break;
                       case 3:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                          $notificacoes[$a]['tipo']=3;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          break;
                       case 4:
                                  $notificacoes[$a]['notificacao']=$key->nome_causador;
                                  $notificacoes[$a]['notificacao'].=" ";
                                  $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                   $notificacoes[$a]['notificacao'].=" quer assumir o vosso ";
                                   $notificacoes[$a]['notificacao'].=$key->tipo_pedido_relac;
                                   $notificacoes[$a]['tipo']=4;
                                   $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 5:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                       $notificacoes[$a]['tipo']=5;
                       $notificacoes[$a]['id']=$key->identificador_id_destino;
                       $notificacoes[$a]['link']=$key->link;
                           break;
                       case 6:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                           $notificacoes[$a]['tipo']=6;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                           break;
                       case 7:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                        $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                        $notificacoes[$a]['tipo']=7;
                        $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 8:
                           $notificacoes[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                           $notificacoes[$a]['tipo']=8;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                           break;
                       case 9:
                                   $notificacoes[$a]['notificacao']= "o seu pedido de criação de pagina foi negado";
                                   $notificacoes[$a]['tipo']=9;
                                   $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 10:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" Pediu que você page";
                       $notificacoes[$a]['tipo']=10;
                       $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                           case 11:
                                   if ($key->causador_id == $key->conta_id){
                                       $notificacoes[$a]['notificacao']=" você eliminou a sua pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" ', tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                   }else {
                                     $notificacoes[$a]['notificacao']=$key->nome_causador;
                                     $notificacoes[$a]['notificacao'].=" ";
                                     $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                     $notificacoes[$a]['notificacao'].=" eliminou a vossa pagina ' ";
                                     $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                     $notificacoes[$a]['notificacao'].=" ', ele tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                   }
                                   $notificacoes[$a]['tipo']=11;
                                   $notificacoes[$a]['id']=$key->causador_id ;

                               break;

                               case 12:
                               $notificacoes[$a]['notificacao']=$key->nome_causador;
                               $notificacoes[$a]['notificacao'].=" ";
                               $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                               $notificacoes[$a]['notificacao'].=" pediu que você anulasse a eliminação da vossa pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" '.";
                                       $notificacoes[$a]['tipo']=12;
                                       $notificacoes[$a]['id']=$key->causador_id;
                                       $notificacoes[$a]['id1']=$key->notify_id_aux;

                                   break;

                                   case 13:
                                           if ($key->causador_id == $key->conta_id){
                                               $notificacoes[$a]['notificacao']=" você anulou a eliminação da vossa pagina ' ";
                                               $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                               $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                           }else {
                                             $notificacoes[$a]['notificacao']=$key->nome_causador;
                                             $notificacoes[$a]['notificacao'].=" ";
                                             $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                             $notificacoes[$a]['notificacao'].=" anulou a eliminação da vossa pagina ' ";
                                             $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                             $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                           }
                                           $notificacoes[$a]['tipo']=13;
                                           $notificacoes[$a]['id']=$key->causador_id;
                                           $notificacoes[$a]['link']=$key->link;


                                       break;

                                     }

                     $notificacoes[$a]['foto']=$key->foto_causador;
                     $notificacoes[$a]['v']=$key->tipo_causador_identify;
                      if ($key->id_state_notification == 2) {
                        $notificacoes_count++;
                        $notificacoes[$a]['state_notification']=2;
                      }else {
                        $notificacoes[$a]['state_notification']=1;
                      }
                      $a++;
                    }
              }
              }
              dd($notificacoes);
              return $notificacoes;
        }
        public function Notifications_ask_to_cancel_delete_pagefinal()
        {
                $conta=Auth::user()->conta_id;
              //  dd($conta->conta_id);
                $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6 ,null, (select nome from pages where page_id = destino_id)) as nome_destino,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6,(select uuid from posts where post_id = destino_id), (select uuid from pages where page_id = destino_id)) as link,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select uuid from pedido_relacionamentos where pedido_relacionamento_id = destino_id),null) as link1_destino,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = link1_destino),null) as tipo_pedido_relac,if(n.id_action_notification=12,(select notification_id from notifications where id_action_notification= 11 and identificador_id_destino = n.identificador_id_destino and identificador_id_receptor = n.identificador_id_receptor),null) as notify_id_aux from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_destino) as tipo_destino_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id from notifications as n inner join contas as ct on ct.conta_id= ?) as n where n.identificador_id_receptor= conta_identify order by n.notification_id desc limit 10', [$conta]);
                //dd($control);$control[0]->
                $notificacoes=array();
                $notificacoes_count=0;
                $a=0;
                $control_data=0;
                if (sizeof($control)>0) {
                  foreach ($control as $key) {
                    if($key->id_state_notification!= 3){

                      $notificacoes[$a]['id1']=$key->notification_id;
                      $aux_divisão_data = explode(' ', $key->created_at);
                      $notificacoes[$a]['data_creat']=$aux_divisão_data[0];
                      $notificacoes[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                      $notificacoes[$a]['barra_data']=0;

                      $date_create_update=date("Y");
                      $date_create_update.="-";
                      $date_create_update.=date("m");
                      $date_create_update.="-";
                      $date_create_update.=date("d");

                      if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                        $control_data=1;
                        $notificacoes[$a]['barra_data']=1;
                      }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                        $control_data=2;
                        $notificacoes[$a]['barra_data']=2;
                        }



                        //dd($key);

                        switch ($key->id_action_notification) {
                         case 1:
                            $notificacoes[$a]['notificacao']=$key->nome_causador;
                            $notificacoes[$a]['notificacao'].=" ";
                            $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                            $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                            $notificacoes[$a]['tipo']=1;
                            $notificacoes[$a]['id']=$key->identificador_id_destino;
                            $notificacoes[$a]['link']=$key->link;
                            break;
                         case 2:
                           $notificacoes[$a]['notificacao']=$key->nome_causador;
                           $notificacoes[$a]['notificacao'].=" ";
                           $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                           $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                            $notificacoes[$a]['tipo']=2;
                            $notificacoes[$a]['id']=$key->identificador_id_destino;
                            $notificacoes[$a]['link']=$key->link;
                            break;
                         case 3:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                            $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                            $notificacoes[$a]['tipo']=3;
                            $notificacoes[$a]['id']=$key->identificador_id_destino;
                            break;
                         case 4:
                                    $notificacoes[$a]['notificacao']=$key->nome_causador;
                                    $notificacoes[$a]['notificacao'].=" ";
                                    $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                     $notificacoes[$a]['notificacao'].=" quer assumir o vosso ";
                                     $notificacoes[$a]['notificacao'].=$key->tipo_pedido_relac;
                                     $notificacoes[$a]['tipo']=4;
                                     $notificacoes[$a]['id']=$key->link1_destino;
                             break;
                         case 5:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                         $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                         $notificacoes[$a]['tipo']=5;
                         $notificacoes[$a]['id']=$key->identificador_id_destino;
                         $notificacoes[$a]['link']=$key->link;
                             break;
                         case 6:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                         $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                             $notificacoes[$a]['tipo']=6;
                             $notificacoes[$a]['id']=$key->identificador_id_destino;
                             $notificacoes[$a]['link']=$key->link;
                             break;
                         case 7:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                          $notificacoes[$a]['tipo']=7;
                          $notificacoes[$a]['id']=$key->link1_destino;
                             break;
                         case 8:
                             $notificacoes[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                             $notificacoes[$a]['tipo']=8;
                             $notificacoes[$a]['id']=$key->identificador_id_destino;
                             $notificacoes[$a]['link']=$key->link;
                             break;
                         case 9:
                                     $notificacoes[$a]['notificacao']= "o seu pedido de criação de pagina foi negado";
                                     $notificacoes[$a]['tipo']=9;
                                     $notificacoes[$a]['id']=$key->link1_destino;
                             break;
                         case 10:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                         $notificacoes[$a]['notificacao'].=" Pediu que você page";
                         $notificacoes[$a]['tipo']=10;
                         $notificacoes[$a]['id']=$key->link1_destino;
                             break;
                             case 11:
                                     if ($key->causador_id == $key->conta_id){
                                         $notificacoes[$a]['notificacao']=" você eliminou a sua pagina ' ";
                                         $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                         $notificacoes[$a]['notificacao'].=" ', tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                     }else {
                                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                                       $notificacoes[$a]['notificacao'].=" ";
                                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                       $notificacoes[$a]['notificacao'].=" eliminou a vossa pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" ', ele tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                     }
                                     $notificacoes[$a]['tipo']=11;
                                     $notificacoes[$a]['id']=$key->causador_id ;

                                 break;

                                 case 12:
                                 $notificacoes[$a]['notificacao']=$key->nome_causador;
                                 $notificacoes[$a]['notificacao'].=" ";
                                 $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                 $notificacoes[$a]['notificacao'].=" pediu que você anulasse a eliminação da vossa pagina ' ";
                                         $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                         $notificacoes[$a]['notificacao'].=" '.";
                                         $notificacoes[$a]['tipo']=12;
                                         $notificacoes[$a]['id']=$key->causador_id;
                                         $notificacoes[$a]['id1']=$key->notify_id_aux;

                                     break;

                                     case 13:
                                             if ($key->causador_id == $key->conta_id){
                                                 $notificacoes[$a]['notificacao']=" você anulou a eliminação da vossa pagina ' ";
                                                 $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                                 $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                             }else {
                                               $notificacoes[$a]['notificacao']=$key->nome_causador;
                                               $notificacoes[$a]['notificacao'].=" ";
                                               $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                               $notificacoes[$a]['notificacao'].=" anulou a eliminação da vossa pagina ' ";
                                               $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                               $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                             }
                                             $notificacoes[$a]['tipo']=13;
                                             $notificacoes[$a]['id']=$key->causador_id;
                                             $notificacoes[$a]['link']=$key->link;


                                         break;

                                       }

                       $notificacoes[$a]['foto']=$key->foto_causador;
                       $notificacoes[$a]['v']=$key->tipo_causador_identify;
                        if ($key->id_state_notification == 2) {
                          $notificacoes_count++;
                          $notificacoes[$a]['state_notification']=2;
                        }else {
                          $notificacoes[$a]['state_notification']=1;
                        }
                        $a++;
                      }
                }
                }
                dd($notificacoes);
                return $notificacoes;
        }
        public function Notifications_delete_page_final()
        {
              $conta=Auth::user()->conta_id;
            //  dd($conta->conta_id);
              $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6 ,null, (select nome from pages where page_id = destino_id)) as nome_destino,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6,(select uuid from posts where post_id = destino_id), (select uuid from pages where page_id = destino_id)) as link,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select uuid from pedido_relacionamentos where pedido_relacionamento_id = destino_id),null) as link1_destino,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = link1_destino),null) as tipo_pedido_relac,if(n.id_action_notification=12,(select notification_id from notifications where id_action_notification= 11 and identificador_id_destino = n.identificador_id_destino and identificador_id_receptor = n.identificador_id_receptor),null) as notify_id_aux from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_destino) as tipo_destino_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id from notifications as n inner join contas as ct on ct.conta_id= ?) as n where n.identificador_id_receptor= conta_identify order by n.notification_id desc limit 10', [$conta]);
              //dd($control);$control[0]->
              $notificacoes=array();
              $notificacoes_count=0;
              $a=0;
              $control_data=0;
              if (sizeof($control)>0) {
                foreach ($control as $key) {
                  if($key->id_state_notification!= 3){

                    $notificacoes[$a]['id1']=$key->notification_id;
                    $aux_divisão_data = explode(' ', $key->created_at);
                    $notificacoes[$a]['data_creat']=$aux_divisão_data[0];
                    $notificacoes[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                    $notificacoes[$a]['barra_data']=0;

                    $date_create_update=date("Y");
                    $date_create_update.="-";
                    $date_create_update.=date("m");
                    $date_create_update.="-";
                    $date_create_update.=date("d");

                    if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                      $control_data=1;
                      $notificacoes[$a]['barra_data']=1;
                    }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                      $control_data=2;
                      $notificacoes[$a]['barra_data']=2;
                      }



                      //dd($key);

                      switch ($key->id_action_notification) {
                       case 1:
                          $notificacoes[$a]['notificacao']=$key->nome_causador;
                          $notificacoes[$a]['notificacao'].=" ";
                          $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                          $notificacoes[$a]['tipo']=1;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $notificacoes[$a]['link']=$key->link;
                          break;
                       case 2:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                         $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                          $notificacoes[$a]['tipo']=2;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $notificacoes[$a]['link']=$key->link;
                          break;
                       case 3:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                          $notificacoes[$a]['tipo']=3;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          break;
                       case 4:
                                  $notificacoes[$a]['notificacao']=$key->nome_causador;
                                  $notificacoes[$a]['notificacao'].=" ";
                                  $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                   $notificacoes[$a]['notificacao'].=" quer assumir o vosso ";
                                   $notificacoes[$a]['notificacao'].=$key->tipo_pedido_relac;
                                   $notificacoes[$a]['tipo']=4;
                                   $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 5:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                       $notificacoes[$a]['tipo']=5;
                       $notificacoes[$a]['id']=$key->identificador_id_destino;
                       $notificacoes[$a]['link']=$key->link;
                           break;
                       case 6:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                           $notificacoes[$a]['tipo']=6;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                           break;
                       case 7:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                        $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                        $notificacoes[$a]['tipo']=7;
                        $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 8:
                           $notificacoes[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                           $notificacoes[$a]['tipo']=8;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                           break;
                       case 9:
                                   $notificacoes[$a]['notificacao']= "o seu pedido de criação de pagina foi negado";
                                   $notificacoes[$a]['tipo']=9;
                                   $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 10:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" Pediu que você page";
                       $notificacoes[$a]['tipo']=10;
                       $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                           case 11:
                                   if ($key->causador_id == $key->conta_id){
                                       $notificacoes[$a]['notificacao']=" você eliminou a sua pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" ', tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                   }else {
                                     $notificacoes[$a]['notificacao']=$key->nome_causador;
                                     $notificacoes[$a]['notificacao'].=" ";
                                     $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                     $notificacoes[$a]['notificacao'].=" eliminou a vossa pagina ' ";
                                     $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                     $notificacoes[$a]['notificacao'].=" ', ele tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                   }
                                   $notificacoes[$a]['tipo']=11;
                                   $notificacoes[$a]['id']=$key->causador_id ;

                               break;

                               case 12:
                               $notificacoes[$a]['notificacao']=$key->nome_causador;
                               $notificacoes[$a]['notificacao'].=" ";
                               $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                               $notificacoes[$a]['notificacao'].=" pediu que você anulasse a eliminação da vossa pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" '.";
                                       $notificacoes[$a]['tipo']=12;
                                       $notificacoes[$a]['id']=$key->causador_id;
                                       $notificacoes[$a]['id1']=$key->notify_id_aux;

                                   break;

                                   case 13:
                                           if ($key->causador_id == $key->conta_id){
                                               $notificacoes[$a]['notificacao']=" você anulou a eliminação da vossa pagina ' ";
                                               $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                               $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                           }else {
                                             $notificacoes[$a]['notificacao']=$key->nome_causador;
                                             $notificacoes[$a]['notificacao'].=" ";
                                             $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                             $notificacoes[$a]['notificacao'].=" anulou a eliminação da vossa pagina ' ";
                                             $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                             $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                           }
                                           $notificacoes[$a]['tipo']=13;
                                           $notificacoes[$a]['id']=$key->causador_id;
                                           $notificacoes[$a]['link']=$key->link;


                                       break;

                                     }

                     $notificacoes[$a]['foto']=$key->foto_causador;
                     $notificacoes[$a]['v']=$key->tipo_causador_identify;
                      if ($key->id_state_notification == 2) {
                        $notificacoes_count++;
                        $notificacoes[$a]['state_notification']=2;
                      }else {
                        $notificacoes[$a]['state_notification']=1;
                      }
                      $a++;
                    }
              }
              }
              dd($notificacoes);
              return $notificacoes;
        }
        public function Notifications_ask_the_other_page_final()
        {
              $conta=Auth::user()->conta_id;
            //  dd($conta->conta_id);
              $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6 ,null, (select nome from pages where page_id = destino_id)) as nome_destino,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6,(select uuid from posts where post_id = destino_id), (select uuid from pages where page_id = destino_id)) as link,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select uuid from pedido_relacionamentos where pedido_relacionamento_id = destino_id),null) as link1_destino,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = link1_destino),null) as tipo_pedido_relac,if(n.id_action_notification=12,(select notification_id from notifications where id_action_notification= 11 and identificador_id_destino = n.identificador_id_destino and identificador_id_receptor = n.identificador_id_receptor),null) as notify_id_aux from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_destino) as tipo_destino_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id from notifications as n inner join contas as ct on ct.conta_id= ?) as n where n.identificador_id_receptor= conta_identify order by n.notification_id desc limit 10', [$conta]);
              //dd($control);$control[0]->
              $notificacoes=array();
              $notificacoes_count=0;
              $a=0;
              $control_data=0;
              if (sizeof($control)>0) {
                foreach ($control as $key) {
                  if($key->id_state_notification!= 3){

                    $notificacoes[$a]['id1']=$key->notification_id;
                    $aux_divisão_data = explode(' ', $key->created_at);
                    $notificacoes[$a]['data_creat']=$aux_divisão_data[0];
                    $notificacoes[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                    $notificacoes[$a]['barra_data']=0;

                    $date_create_update=date("Y");
                    $date_create_update.="-";
                    $date_create_update.=date("m");
                    $date_create_update.="-";
                    $date_create_update.=date("d");

                    if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                      $control_data=1;
                      $notificacoes[$a]['barra_data']=1;
                    }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                      $control_data=2;
                      $notificacoes[$a]['barra_data']=2;
                      }



                      //dd($key);

                      switch ($key->id_action_notification) {
                       case 1:
                          $notificacoes[$a]['notificacao']=$key->nome_causador;
                          $notificacoes[$a]['notificacao'].=" ";
                          $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                          $notificacoes[$a]['tipo']=1;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $notificacoes[$a]['link']=$key->link;
                          break;
                       case 2:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                         $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                          $notificacoes[$a]['tipo']=2;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $notificacoes[$a]['link']=$key->link;
                          break;
                       case 3:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                          $notificacoes[$a]['tipo']=3;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          break;
                       case 4:
                                  $notificacoes[$a]['notificacao']=$key->nome_causador;
                                  $notificacoes[$a]['notificacao'].=" ";
                                  $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                   $notificacoes[$a]['notificacao'].=" quer assumir o vosso ";
                                   $notificacoes[$a]['notificacao'].=$key->tipo_pedido_relac;
                                   $notificacoes[$a]['tipo']=4;
                                   $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 5:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                       $notificacoes[$a]['tipo']=5;
                       $notificacoes[$a]['id']=$key->identificador_id_destino;
                       $notificacoes[$a]['link']=$key->link;
                           break;
                       case 6:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                           $notificacoes[$a]['tipo']=6;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                           break;
                       case 7:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                        $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                        $notificacoes[$a]['tipo']=7;
                        $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 8:
                           $notificacoes[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                           $notificacoes[$a]['tipo']=8;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                           break;
                       case 9:
                                   $notificacoes[$a]['notificacao']= "o seu pedido de criação de pagina foi negado";
                                   $notificacoes[$a]['tipo']=9;
                                   $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 10:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" Pediu que você page";
                       $notificacoes[$a]['tipo']=10;
                       $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                           case 11:
                                   if ($key->causador_id == $key->conta_id){
                                       $notificacoes[$a]['notificacao']=" você eliminou a sua pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" ', tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                   }else {
                                     $notificacoes[$a]['notificacao']=$key->nome_causador;
                                     $notificacoes[$a]['notificacao'].=" ";
                                     $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                     $notificacoes[$a]['notificacao'].=" eliminou a vossa pagina ' ";
                                     $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                     $notificacoes[$a]['notificacao'].=" ', ele tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                   }
                                   $notificacoes[$a]['tipo']=11;
                                   $notificacoes[$a]['id']=$key->causador_id ;

                               break;

                               case 12:
                               $notificacoes[$a]['notificacao']=$key->nome_causador;
                               $notificacoes[$a]['notificacao'].=" ";
                               $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                               $notificacoes[$a]['notificacao'].=" pediu que você anulasse a eliminação da vossa pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" '.";
                                       $notificacoes[$a]['tipo']=12;
                                       $notificacoes[$a]['id']=$key->causador_id;
                                       $notificacoes[$a]['id1']=$key->notify_id_aux;

                                   break;

                                   case 13:
                                           if ($key->causador_id == $key->conta_id){
                                               $notificacoes[$a]['notificacao']=" você anulou a eliminação da vossa pagina ' ";
                                               $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                               $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                           }else {
                                             $notificacoes[$a]['notificacao']=$key->nome_causador;
                                             $notificacoes[$a]['notificacao'].=" ";
                                             $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                             $notificacoes[$a]['notificacao'].=" anulou a eliminação da vossa pagina ' ";
                                             $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                             $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                           }
                                           $notificacoes[$a]['tipo']=13;
                                           $notificacoes[$a]['id']=$key->causador_id;
                                           $notificacoes[$a]['link']=$key->link;


                                       break;

                                     }

                     $notificacoes[$a]['foto']=$key->foto_causador;
                     $notificacoes[$a]['v']=$key->tipo_causador_identify;
                      if ($key->id_state_notification == 2) {
                        $notificacoes_count++;
                        $notificacoes[$a]['state_notification']=2;
                      }else {
                        $notificacoes[$a]['state_notification']=1;
                      }
                      $a++;
                    }
              }
              }
              dd($notificacoes);
              return $notificacoes;
        }
        public function Notifications_cancel_delete_page_final()
        {
              $conta=Auth::user()->conta_id;
            //  dd($conta->conta_id);
              $control = DB::select('select n.*,if(tipo_causador_identify=1,(select nome from contas where conta_id = causador_id), (select nome from pages where page_id = causador_id)) as nome_causador,if(tipo_causador_identify=1,(select apelido from contas where conta_id = causador_id),null) as apelido_causador,if(tipo_causador_identify=1,(select foto from contas where conta_id = causador_id), (select foto from pages where page_id = causador_id)) as foto_causador,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6 ,null, (select nome from pages where page_id = destino_id)) as nome_destino,if(n.id_action_notification=1||n.id_action_notification=2 ||n.id_action_notification=3 ||n.id_action_notification=6,(select uuid from posts where post_id = destino_id), (select uuid from pages where page_id = destino_id)) as link,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select uuid from pedido_relacionamentos where pedido_relacionamento_id = destino_id),null) as link1_destino,if(n.id_action_notification=4||n.id_action_notification=7 ||n.id_action_notification=9 ||n.id_action_notification=10,(select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = link1_destino),null) as tipo_pedido_relac,if(n.id_action_notification=12,(select notification_id from notifications where id_action_notification= 11 and identificador_id_destino = n.identificador_id_destino and identificador_id_receptor = n.identificador_id_receptor),null) as notify_id_aux from (select n.*,ct.conta_id,ct.uuid as conta_uuid,ct.nome,ct.apelido,ct.foto,(select identificadors.identificador_id from identificadors where identificadors.id = ct.conta_id and identificadors.tipo_identificador_id = 1) as conta_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as tipo_causador_identify,(select identificadors.tipo_identificador_id from identificadors where identificadors.identificador_id = n.identificador_id_destino) as tipo_destino_identify, (select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_causador) as causador_id,(select identificadors.id from identificadors where identificadors.identificador_id = n.identificador_id_destino ) as destino_id from notifications as n inner join contas as ct on ct.conta_id= ?) as n where n.identificador_id_receptor= conta_identify order by n.notification_id desc limit 10', [$conta]);
              //dd($control);$control[0]->
              $notificacoes=array();
              $notificacoes_count=0;
              $a=0;
              $control_data=0;
              if (sizeof($control)>0) {
                foreach ($control as $key) {
                  if($key->id_state_notification!= 3){

                    $notificacoes[$a]['id1']=$key->notification_id;
                    $aux_divisão_data = explode(' ', $key->created_at);
                    $notificacoes[$a]['data_creat']=$aux_divisão_data[0];
                    $notificacoes[$a]['hora_creat']=str_split($aux_divisão_data[1], 5)[0];
                    $notificacoes[$a]['barra_data']=0;

                    $date_create_update=date("Y");
                    $date_create_update.="-";
                    $date_create_update.=date("m");
                    $date_create_update.="-";
                    $date_create_update.=date("d");

                    if ($aux_divisão_data[0] == $date_create_update && $control_data==0) {
                      $control_data=1;
                      $notificacoes[$a]['barra_data']=1;
                    }elseif ($aux_divisão_data[0] != $date_create_update && $control_data==1 || $notificacoes[0]['barra_data'] == 0 && $a == 0) {
                      $control_data=2;
                      $notificacoes[$a]['barra_data']=2;
                      }



                      //dd($key);

                      switch ($key->id_action_notification) {
                       case 1:
                          $notificacoes[$a]['notificacao']=$key->nome_causador;
                          $notificacoes[$a]['notificacao'].=" ";
                          $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" curtiu a sua publicação ";
                          $notificacoes[$a]['tipo']=1;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $notificacoes[$a]['link']=$key->link;
                          break;
                       case 2:
                         $notificacoes[$a]['notificacao']=$key->nome_causador;
                         $notificacoes[$a]['notificacao'].=" ";
                         $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                         $notificacoes[$a]['notificacao'].=" comentou a sua publicação";
                          $notificacoes[$a]['tipo']=2;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          $notificacoes[$a]['link']=$key->link;
                          break;
                       case 3:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                          $notificacoes[$a]['notificacao'].=" partilhou a sua publicação";
                          $notificacoes[$a]['tipo']=3;
                          $notificacoes[$a]['id']=$key->identificador_id_destino;
                          break;
                       case 4:
                                  $notificacoes[$a]['notificacao']=$key->nome_causador;
                                  $notificacoes[$a]['notificacao'].=" ";
                                  $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                   $notificacoes[$a]['notificacao'].=" quer assumir o vosso ";
                                   $notificacoes[$a]['notificacao'].=$key->tipo_pedido_relac;
                                   $notificacoes[$a]['tipo']=4;
                                   $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 5:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                       $notificacoes[$a]['tipo']=5;
                       $notificacoes[$a]['id']=$key->identificador_id_destino;
                       $notificacoes[$a]['link']=$key->link;
                           break;
                       case 6:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" esta seguindo a sua pagina";
                           $notificacoes[$a]['tipo']=6;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                           break;
                       case 7:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                        $notificacoes[$a]['notificacao'].=" Respondeu a sua Solicitação de Registo de compromisso";
                        $notificacoes[$a]['tipo']=7;
                        $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 8:
                           $notificacoes[$a]['notificacao']=" A vossa pagina foi criada com sucesso ";
                           $notificacoes[$a]['tipo']=8;
                           $notificacoes[$a]['id']=$key->identificador_id_destino;
                           $notificacoes[$a]['link']=$key->link;
                           break;
                       case 9:
                                   $notificacoes[$a]['notificacao']= "o seu pedido de criação de pagina foi negado";
                                   $notificacoes[$a]['tipo']=9;
                                   $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                       case 10:
                       $notificacoes[$a]['notificacao']=$key->nome_causador;
                       $notificacoes[$a]['notificacao'].=" ";
                       $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                       $notificacoes[$a]['notificacao'].=" Pediu que você page";
                       $notificacoes[$a]['tipo']=10;
                       $notificacoes[$a]['id']=$key->link1_destino;
                           break;
                           case 11:
                                   if ($key->causador_id == $key->conta_id){
                                       $notificacoes[$a]['notificacao']=" você eliminou a sua pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" ', tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                   }else {
                                     $notificacoes[$a]['notificacao']=$key->nome_causador;
                                     $notificacoes[$a]['notificacao'].=" ";
                                     $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                     $notificacoes[$a]['notificacao'].=" eliminou a vossa pagina ' ";
                                     $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                     $notificacoes[$a]['notificacao'].=" ', ele tem 3 meses para anular esta acção, caso contrario sera eliminada de forma permanente";
                                   }
                                   $notificacoes[$a]['tipo']=11;
                                   $notificacoes[$a]['id']=$key->causador_id ;

                               break;

                               case 12:
                               $notificacoes[$a]['notificacao']=$key->nome_causador;
                               $notificacoes[$a]['notificacao'].=" ";
                               $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                               $notificacoes[$a]['notificacao'].=" pediu que você anulasse a eliminação da vossa pagina ' ";
                                       $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                       $notificacoes[$a]['notificacao'].=" '.";
                                       $notificacoes[$a]['tipo']=12;
                                       $notificacoes[$a]['id']=$key->causador_id;
                                       $notificacoes[$a]['id1']=$key->notify_id_aux;

                                   break;

                                   case 13:
                                           if ($key->causador_id == $key->conta_id){
                                               $notificacoes[$a]['notificacao']=" você anulou a eliminação da vossa pagina ' ";
                                               $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                               $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                           }else {
                                             $notificacoes[$a]['notificacao']=$key->nome_causador;
                                             $notificacoes[$a]['notificacao'].=" ";
                                             $notificacoes[$a]['notificacao'].=$key->apelido_causador;
                                             $notificacoes[$a]['notificacao'].=" anulou a eliminação da vossa pagina ' ";
                                             $notificacoes[$a]['notificacao'].=$key->nome_destino;
                                             $notificacoes[$a]['notificacao'].=" ', agora ja pode voltar a postar nela.";
                                           }
                                           $notificacoes[$a]['tipo']=13;
                                           $notificacoes[$a]['id']=$key->causador_id;
                                           $notificacoes[$a]['link']=$key->link;


                                       break;

                                     }

                     $notificacoes[$a]['foto']=$key->foto_causador;
                     $notificacoes[$a]['v']=$key->tipo_causador_identify;
                      if ($key->id_state_notification == 2) {
                        $notificacoes_count++;
                        $notificacoes[$a]['state_notification']=2;
                      }else {
                        $notificacoes[$a]['state_notification']=1;
                      }
                      $a++;
                    }
              }
              }
              dd($notificacoes);
              return $notificacoes;
        }

          public function destaques(){
              $post = DB::select('select AL.uuid,AL.descricao, AL.formato_id, AL.file, AL.page_uuid, AL.page_name, AL.page_foto from (select D.*, (QTD_REACOES+QTD_COMM) SOMA from (select p.created_at DATA_CRIACAO, p.post_id, p.uuid,p.descricao,p.estado_post_id,p.formato_id,p.page_id,pa.uuid as page_uuid,pa.nome as page_name,pa.estado_pagina_id as estado_pagina_id,pa.foto as page_foto,p.file, (select count(*) from post_reactions pr where pr.post_id = p.post_id) QTD_REACOES, (select count(*) from comments cm where cm.post_id = p.post_id) QTD_COMM from posts p inner join pages pa on p.page_id =pa.page_id ) as D) as AL ORDER BY SOMA DESC,AL.post_id DESC LIMIT 20');

                return json_encode($post);
            }

    public function index(Request $request){
        if (Auth::check() == true) {
            $page_current = 'home_index';
            return view('feed.index', compact('page_current'));
        }
        return redirect()->route('account.login.form');
        $a++;
    }
    public function add_view_state(Request $request)
    {
        $conta_id = Auth::user()->conta_id;
        $mudar_estado_view = DB::table('views')->where('conta_id',$conta_logada[0]->conta_id)->where('state_views_id', 2)->limit(1)->get();
        if (sizeof($mudar_estado_view)>0) {
          DB::table('views')
                ->where('conta_id', $conta_id)
                ->where('post_id', $post_id)
                ->where('state_views_id', 2)
                ->delete();
        }
    }


    public function user_data(Request $request){
        $id = Auth::user()->conta_id;
        $contas = DB::select('select foto, nome, apelido from contas where (conta_id) = (?)', [$id]);
        return $contas[0];
    }
    /*Função para pegar os dados com ajax*/

    public function paginasqueSigo(){
        $conta_logada = Auth::user()->conta_id;
        $pagequesigo = DB::select('select * from (select pa.*, (select count(*) from seguidors where    identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2) and identificador_id_seguindo = (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1)) as segui, (select count(*) from seguidors where    identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2)) as seguidores FROM pages as pa) as pa where pa.segui = 1 limit 3', [$conta_logada]);

        return response()->json($pagequesigo);
    }

     public function paginasquenaoSigo(){
        $id = Auth::user()->conta_id;
        $pagequesigo = DB::select('select foto, segui, seguidores, tipo_relacionamento_id, uuid, nome, page_id from (select pa.*, (select count(*) from seguidors where    identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2) and identificador_id_seguindo = (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1)) as segui, (select count(*) from seguidors where    identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2)) as seguidores FROM pages as pa) as pa where pa.segui = 0 limit 3', [$id]);

        return response()->json($pagequesigo);
    }

    public function paginasquenaoSigoIndex(){
        $id = Auth::user()->conta_id;
        $pagequesigo = DB::select('select foto, segui, seguidores, tipo_relacionamento_id, uuid, nome, page_id from (select pa.*, (select count(*) from seguidors where    identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2) and identificador_id_seguindo = (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1)) as segui, (select count(*) from seguidors where    identificador_id_seguida = (select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2)) as seguidores FROM pages as pa) as pa where pa.segui = 0 limit 10', [$id]);

        return response()->json($pagequesigo);
    }
    /*Fim função para pegar os dados com ajax*/

  /*Páginas Seguidas e Não seguidas para index e perfil*/
/*Fim*/


  public function paginasSeguidas(){
        try {
            $paginasSeguidas = array();
            $pagePage = array();
            $account_name = $this->defaultDate();
            $identificadorPage = DB::table('identificadors')->where('tipo_identificador_id', 2)->get();
            $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
            $seguidas = DB::table('seguidors')->where('identificador_id_seguindo', $dadosSgndo[0]->identificador_id)->get();
            $valor_id = 0;
            $contador = 0;

            $dadosPage = DB::table('pages')->get();
            foreach ($dadosPage as $key => $page) {
              foreach ($identificadorPage as $identificador) {
                if ($page->page_id == $identificador->id) {
                  foreach ($seguidas as $pageSeguida) {
                    if ($identificador->identificador_id == $pageSeguida->identificador_id_seguida) {
                      $paginasSeguidas[$key] = $page;
                    }
                  }
                }
              }
            }
         foreach ($paginasSeguidas as $key => $valorPage) {

          if ($contador > 2) {
              break;
            }
            $pagePage[$key] = $valorPage;

            $contador = $contador + 1;
         }
              return $pagePage;
        } catch (Exception $e) {

        }
    }

    public function paginasNaoSeguidas(){
        try {
          $paginasNaoSeguidas = array();
          $pagenaoPage = array();
          $account_name = $this->defaultDate();
        $dadosPage = DB::table('pages')->get();
        $dadosSeguida = DB::table('seguidors')
               ->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')
               ->select('seguidors.*', 'identificadors.id')
               ->get();
        $parada = 0;
        $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);

      foreach($dadosPage as $key => $Paginas){
                 $conta_page = 0;
                 $verifica1 = 'A';
                 $verifica = 'B';
                 $seguidors = 0;
                 $tamanho = sizeof($dadosSeguida);

          foreach ($dadosSeguida as $Seguida){
                 if ($Paginas->page_id == $Seguida->id){
                    if ($dadosSgndo[0]->identificador_id == $Seguida->identificador_id_seguindo){
                            $verifica1 = $Paginas->nome;
                    }else{
                            $verifica = $Paginas->nome;
                        }
                }else{
                      $conta_page += 1;
                    }
          }
          if ($verifica1 != $verifica){

               if ($verifica != 'B'){
                 $paginasNaoSeguidas[$key] = $Paginas;
               }
          }
          if ($conta_page == $tamanho){
                  $paginasNaoSeguidas[$key] = $Paginas;
          }
        }
         foreach ($paginasNaoSeguidas as $key => $valuePage) {

          if ($parada > 2) {
              break;
            }
            $pagenaoPage[$key] = $valuePage;

            $parada = $parada + 1;
         }
              return $pagenaoPage;
        } catch (Exception $e) {

        }
    }

    /*Não Usar as funções abixo*/
    public function paSeguidas()
    {
        try {
            $paginasSeguidas = array();
            $pagePage = array();
            $account_name = $this->defaultDate();
            $identificadorPage = DB::table('identificadors')->where('tipo_identificador_id', 2)->get();
            $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
            $seguidas = DB::table('seguidors')->where('identificador_id_seguindo', $dadosSgndo[0]->identificador_id)->get();
            $valor_id = 0;
            $contador = 0;

            $dadosPage = DB::table('pages')->get();
            foreach ($dadosPage as $key => $page) {
              foreach ($identificadorPage as $identificador) {
                if ($page->page_id == $identificador->id) {
                  foreach ($seguidas as $pageSeguida) {
                    if ($identificador->identificador_id == $pageSeguida->identificador_id_seguida) {
                      $paginasSeguidas[$key] = $page;
                    }
                  }
                }
              }
            }

              return $paginasSeguidas;
        } catch (Exception $e) {

        }
    }

    public function NaoSeguidas()
    {
        try {
          $paginasNaoSeguidas = array();
          $pagenaoPage = array();
          $account_name = $this->defaultDate();
        $dadosPage = DB::table('pages')->get();
        $dadosSeguida = DB::table('seguidors')
               ->join('identificadors', 'seguidors.identificador_id_seguida', '=', 'identificadors.identificador_id')
               ->select('seguidors.*', 'identificadors.id')
               ->get();
        $parada = 0;
        $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);

      foreach($dadosPage as $key => $Paginas){
                 $conta_page = 0;
                 $verifica1 = 'A';
                 $verifica = 'B';
                 $seguidors = 0;
                 $tamanho = sizeof($dadosSeguida);

          foreach ($dadosSeguida as $Seguida){
                 if ($Paginas->page_id == $Seguida->id){
                    if ($dadosSgndo[0]->identificador_id == $Seguida->identificador_id_seguindo){
                            $verifica1 = $Paginas->nome;
                    }else{
                            $verifica = $Paginas->nome;
                        }
                }else{
                      $conta_page += 1;
                    }
          }
          if ($verifica1 != $verifica){

               if ($verifica != 'B'){
                 $paginasNaoSeguidas[$key] = $Paginas;
               }
          }
          if ($conta_page == $tamanho){
                  $paginasNaoSeguidas[$key] = $Paginas;
          }
        }
            return $paginasNaoSeguidas;
        } catch (Exception $e) {

        }
    }
    /*Fim das Funções a não usar - Cumpra com o pedido para não dar buggs*/
  public function tipos(){

    $tipos=DB::table('tipo_relacionamentos')->get();
    return response()->json($tipos);
  }

  public function pegar_mais_post(){
    $post_controller = new PageController();
    $array_aux=array();
    $dados=array();
    $post = $post_controller->PP(1);
    $a=0;
    //dd($post);
    if (sizeof($post)>0) {
      foreach ($post as $key) {
        if ($key->estado_pagina_id == 1){
          $dados[$a] = $this->DadosPost($key);
        }
        $a++;
      }
    }
    //dd($dados);
    return response()->json($dados);
  }


/* Siene */

  public function get_only_post(Request $request) {
    if ($request->ajax()) {
        $data = DB::table('posts')->where('uuid', $request->id)->get();
        return response()->json($data);
    }
  }

  public function get_only_comments(Request $request) {
    return DB::select('select * from comments where post_id = (select post_id from posts where uuid = ?)', [$request->id]);
  }

/* EndSiene */

  public function post_index($id){


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
      $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
      $paginasSeguidas = $dates['paginasSeguidas'];
      $dadosSeguida = $dates['dadosSeguida'];
      $allUserPages = $dates['allUserPages'];
      $notificacoes_count = $dates['notificacoes_count'];


            $dadosSgndo = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);

            foreach ($dadosSgndo as $value) {
                $valor = $value->identificador_id;
            }





      $page_current = 'auth';
        $pass=$this->unic_post($id);
        $dados=$pass['dados'];
        $comment=$pass['comment'];
        /*$dados[$a]['qtd_comment_reaction']=0;
        for ($j=1; $j <= sizeof($comment) ; $j++) {
            $reaction_comment = DB::select('select * from reactions_comments where comment_id = ?', [$j]);
        if (sizeof($reaction_comment)>= $dados[$a]['qtd_comment_reaction']) {
          $dados[$a]['qtd_comment_reaction']=sizeof($reaction_comment);
          $dados[$a]['comment']=$comment[$j - 1]->comment;
          $dados[$a]['comment_id']=$comment[$j - 1]->comment_id;

          $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$comment[$j-1]->identificador_id ]);
          if ($aux2[0]->tipo_identificador_id == 1) {
            $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
            $dados[$a]['nome_comment']=$conta[0]->nome;
            $dados[$a]['nome_comment'].=" ";
            $dados[$a]['nome_comment'].=$conta[0]->apelido;
          }elseif ($aux2[0]->tipo_identificador_id == 2) {
            $dados[$a]['nome_comment']=$page[$aux2[0]->id - 1]->nome;
          }
        }
      }*/





      return view('pagina.comment', compact('account_name','notificacoes_count','notificacoes', 'dados','comment', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'paginasSeguidas', 'paginasNaoSeguidas', 'dadosSeguida', 'conta_logada'));

    }


    public function unic_post($id){
      $dates = $this->default_();
      $account_name = $dates['account_name'];
      $conta_logada = $dates['conta_logada'];
      $post =  DB::select('select * from posts where uuid = ?', [$id]);
      $page = DB::table('pages')->get();
      $i=0;
      $dados = array();

        $aux = DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$page[$post[0]->page_id - 1]->page_id, 2 ]);
        $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
        if (sizeof($aux1) > 0 && sizeof($aux) > 0) {
            $seguidor = DB::select('select * from seguidors where (identificador_id_seguida, identificador_id_seguindo) = (?, ?)', [$aux[0]->identificador_id, $aux1[0]->identificador_id]);
        } else {
            $seguidor = array();
        }

        $likes = DB::select('select * from post_reactions where post_id = ?', [$post[0]->post_id]);
        $page_uuid = DB::select('select uuid from pages where page_id = ?', [$post[0]->page_id]);
        $comment = DB::table('comments')->where('post_id', '=', $post[0]->post_id)->orderBy('comment_id', 'desc')->get();
        $guardado= DB::select('select * from saveds where (post_id,conta_id) = (?, ?)', [$post[0]->post_id,  $account_name[0]->conta_id]);

        if (sizeof($aux1) > 0) {
            $ja_reagiu = DB::select('select * from post_reactions where (post_id, identificador_id) = (?, ?)', [$post[0]->post_id, $aux1[0]->identificador_id]);
    //            $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$comment[$key->post_id-1]->comment_id, $aux1[0]->identificador_id]);
        } else {
            $ja_reagiu = array();
        }
        $dados[0]['nome_pag'] = $page[$post[0]->page_id - 1]->nome;
        $dados[0]['foto_page']=$page[$post[0]->page_id - 1]->foto;
        $dados[0]['post']=$post[0]->descricao;
        $dados[0]['qtd_likes']= sizeof($likes);
        $dados[0]['qtd_comment']=sizeof($comment);
        $dados[0]['seguir_S_N']=sizeof($seguidor);
        $dados[0]['post_id']=$post[0]->post_id;
        $dados[0]['post_uuid']= $post[0]->uuid;
        $dados[0]['page_tipo_relac']= $page[0]->tipo_relacionamento_id;
        $dados[0]['page_id']= $post[0]->page_id ;
        $dados[0]['page_uuid']= $page[$post[0]->page_id - 1]->uuid ;
        $dados[0]['reagir_S_N']=sizeof($ja_reagiu);
        $aux_divisão_data = explode(' ', $post[0]->created_at);
        $dados[0]['post_data']= $aux_divisão_data[0];
        $dados[0]['post_hora']= str_split($aux_divisão_data[1], 5)[0];
        $dados[0]['guardado']=sizeof($guardado);
        $dados[0]['formato']=$post[0]->formato_id;
        $dados[0]['estado_post']=$post[0]->estado_post_id;
        if($dados[0]['formato']==1 || $dados[0]['formato']== 2){
        $dados[0]['file']=$post[0]->file;
        }
        if ($account_name[0]->conta_id == $page[$post[0]->page_id - 1]->conta_id_a  || $account_name[0]->conta_id == $page[$post[0]->page_id - 1]->conta_id_b ) {
          $dados[0]['dono_da_pag']=1;
        }else {
          $dados[0]['dono_da_pag']=0;
        }
        $a=0;
        foreach ($comment as $key) {
          if ($a==0) {
           $dados[$a]+=$this->dados_comment($key);
         }else {
           $dados[$a]=$this->dados_comment($key);
         }

           $a++;
        }
        $variable=[
          "dados"=>$dados,
          "comment"=>$comment,
        ];
      return $variable;
    }


    public function updatenot(Request $request){
      DB::table('notifications')
            ->where('notification_id', $request->id1)
            ->update([
              'id_state_notification' => 1,
              'updated_at' => $this->dat_create_update()
          ]);
       $resposta=1;
            return response()->json($resposta);
          }

public function dados_comment($key){
  $dates = $this->default_();
  $account_name = $dates['account_name'];
  $conta_logada = $dates['conta_logada'];
  $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
  $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id ]);
  $dc['comment_id']=$key->comment_id;
  $dc['comment']=$key->comment;
  $dc['post_id']=$key->post_id;
  $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
  if (sizeof($aux1) > 0) {
    $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$key->comment_id, $aux1[0]->identificador_id]);
  } else {
      $ja_reagiu1 = array();
  }
   $dc['comment_S_N']=sizeof($ja_reagiu1);

  if ($aux2[0]->tipo_identificador_id == 1) {
    $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
    $dc['nome_comment']=$conta[0]->nome;
    $dc['nome_comment'].=" ";
    $dc['nome_comment'].=$conta[0]->apelido;
    $dc['foto_conta']=$conta[0]->foto;
    $dc['uuid']=$conta[0]->uuid;
    $dc['foto_ver']=1;
  }elseif ($aux2[0]->tipo_identificador_id == 2) {
    $page = DB::table('pages')->get();
    $dc['nome_comment']=$page[$aux2[0]->id - 1]->nome;
    $dc['foto_conta']=$page[$aux2[0]->id - 1]->foto;
    $dc['uuid']=$page[$aux2[0]->id - 1]->uuid;
    $dc['foto_ver']=2;
  }
  return $dc;
}

    public function like(Request $request){
            $post=DB::select('select * from posts where uuid = ?', [$request->id]);
            $page= DB::select('select * from pages where page_id = ?', [$post[0]->page_id]);
            $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
            $aux3= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
            $aux4= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$post[0]->post_id, 3 ]);
            $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
            $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
            $likes_verificacao = DB::select('select post_reaction_id from post_reactions where (post_id,identificador_id) = (?, ?)', [$post[0]->post_id, $aux[0]->identificador_id]);
            $resposta = 0;
            if (sizeof($likes_verificacao) == 0) {
              DB::table('post_reactions')->insert([
                'reaction_id' => 1,
                'identificador_id' => $aux[0]->identificador_id,
                'post_id' => $post[0]->post_id,
                'created_at'=> $this->dat_create_update(),
              ]);
                /*DB::table('posts')
                ->where('post_id', $post[0]->post_id)
                ->update([
                  'reactions'=> $post[0]->reactions + 1,
                  'total_reactions_comments'=> $post[0]->total_reactions_comments + 1,
                  'updated_at' => $this->dat_create_update()
                ]);*/
              if ($page[0]->conta_id_a != $conta[0]->conta_id && $page[0]->conta_id_b != $conta[0]->conta_id) {
              DB::table('notifications')->insert([
                    'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'id_state_notification' => 2,
                    'id_action_notification' => 1,
                    'identificador_id_causador'=> $aux[0]->identificador_id,
                    'identificador_id_destino'=> $aux4[0]->identificador_id,
                    'identificador_id_receptor'=> $aux2[0]->identificador_id,
                    'created_at'=> $this->dat_create_update(),
                    ]);
                  DB::table('notifications')->insert([
                          'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                          'id_state_notification' => 2,
                          'id_action_notification' => 1,
                          'identificador_id_causador'=> $aux[0]->identificador_id,
                          'identificador_id_destino'=> $aux4[0]->identificador_id,
                          'identificador_id_receptor'=> $aux3[0]->identificador_id,
                          'created_at'=> $this->dat_create_update(),

                          ]);
                        }

              $resposta= 1;

            } elseif (sizeof($likes_verificacao) == 1){
              DB::table('post_reactions')->where(['post_reaction_id'=>$likes_verificacao[0]->post_reaction_id])->delete();
              /*DB::table('posts')
              ->where('post_id', $post[0]->post_id)
              ->update([
                'reactions'=> $post[0]->reactions - 1,
                'total_reactions_comments'=> $post[0]->total_reactions_comments - 1,
                'updated_at' => $this->dat_create_update()
              ]);*/
              $resposta= 2;
            }
            return response()->json($resposta);
          }

          public function like_final(Request $request){

                $conta =Auth::user()->conta_id;
                $control= DB::select('select p.post_id,(select identificadors.identificador_id from identificadors where identificadors.id = p.post_id and identificadors.tipo_identificador_id = 3) as post_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_logada_identify,(select count(*) from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_logada_identify) as reagi,(select count(*) from post_reactions as prr where prr.post_id = p.post_id) as qtd_reactions,(select prr.post_reaction_id from post_reactions as prr where prr.post_id = p.post_id and prr.identificador_id = conta_logada_identify) as id_reagi,(select identificadors.identificador_id from identificadors where identificadors.id = pa.conta_id_a and identificadors.tipo_identificador_id = 1) as conta_a_identify, (select identificadors.identificador_id from identificadors where identificadors.id = pa.conta_id_b and identificadors.tipo_identificador_id = 1) as conta_b_identify, if(pa.conta_id_a = ?|| pa.conta_id_b = ?, 1, 0) as dono_page from posts as p  inner join pages as pa on p.page_id = pa.page_id where p.uuid = ?', [$conta,$conta,$conta,$request->id]);

                  if ($control[0]->reagi == 0) {
                    DB::table('post_reactions')->insert([
                      'reaction_id' => 1,
                      'identificador_id' => $control[0]->conta_logada_identify,
                      'post_id' => $control[0]->post_id,
                      'created_at'=> $this->dat_create_update(),
                    ]);
                    if ($control[0]->dono_page == 0) {
                        DB::table('notifications')->insert([
                          [
                              'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                              'id_state_notification' => 2,
                              'id_action_notification' => 1,
                              'identificador_id_causador'=> $control[0]->conta_logada_identify,
                              'identificador_id_destino'=> $control[0]->post_identify,
                              'identificador_id_receptor'=> $control[0]->conta_a_identify,
                              'created_at'=> $this->dat_create_update(),
                            ],
                            [
                                'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                                'id_state_notification' => 2,
                                'id_action_notification' => 1,
                                'identificador_id_causador'=> $control[0]->conta_logada_identify,
                                'identificador_id_destino'=> $control[0]->post_identify,
                                'identificador_id_receptor'=> $control[0]->conta_b_identify,
                                'created_at'=> $this->dat_create_update(),
                            ]
                        ]);
                    }
                    $id_full = 'on-id-i_'.$request->id;
                    $id_loader = 'loader-id-icon_'.$request->id;
                    $likes_total = $control[0]->qtd_reactions + 1;
                    $resposta = [
                        'id' => $id_full,
                        'loader' => $id_loader,
                        'reactions' => $likes_total,
                        'state' => 'like',
                        'add' => [
                            1 => 'fas',
                            2 => 'liked',
                        ],
                        'remove' => [
                            1 => 'far',
                        ],
                    ];
                  } else {
                    DB::table('post_reactions')->where(['post_reaction_id'=>$control[0]->id_reagi])->delete();
                    $id_full = 'off-id-i_'.$request->id;
                    $id_loader = 'loader-id-icon_'.$request->id;
                    $likes_total = $control[0]->qtd_reactions - 1;
                    $resposta = [
                        'id' => $id_full,
                        'loader' => $id_loader,
                        'reactions' => $likes_total,
                        'state' => 'unlike',
                        'add' => [
                            1 => 'far',
                        ],
                        'remove' => [
                            1 => 'fas',
                            2 => 'liked',
                        ],
                    ];
                  }
                  return json_encode($resposta);
            }

            public function verify_not(Request $request)
            {
              $resposta=DB::select('select pedido_relacionamento_id as verify from pedido_relacionamentos where uuid=?', [$request->id]);
              return response()->json($resposta);
            }

          public function like_unlike(Request $request){
            $post=DB::select('select * from posts where uuid = ?', [$request->id]);
            $page= DB::select('select * from pages where page_id = ?', [$post[0]->page_id]);
            $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
            $aux3= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
            $aux4= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$post[0]->post_id, 3 ]);
            $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
            $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
            $likes_verificacao = DB::select('select post_reaction_id from post_reactions where (post_id,identificador_id) = (?, ?)', [$post[0]->post_id, $aux[0]->identificador_id]);
            $likes_total = DB::select('select post_reaction_id from post_reactions where (post_id) = (?)', [$post[0]->post_id]);
            $likes_total = sizeof($likes_total);
            $resposta = 0;
            $id_full = $request->id_full;
            $reactions_number = sizeof($likes_verificacao);
            if ($reactions_number < 1) {
              DB::table('post_reactions')->insert([
                'reaction_id' => 1,
                'identificador_id' => $aux[0]->identificador_id,
                'post_id' => $post[0]->post_id,
                'created_at'=> $this->dat_create_update(),
              ]);

              if ($page[0]->conta_id_a != $conta[0]->conta_id && $page[0]->conta_id_b != $conta[0]->conta_id) {
                DB::table('notifications')->insert([
                    'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'id_state_notification' => 2,
                    'id_action_notification' => 1,
                    'identificador_id_causador'=> $aux[0]->identificador_id,
                    'identificador_id_destino'=> $aux4[0]->identificador_id,
                    'identificador_id_receptor'=> $aux2[0]->identificador_id,
                    'created_at'=> $this->dat_create_update(),
                    ]);
                DB::table('notifications')->insert([
                    'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'id_state_notification' => 2,
                    'id_action_notification' => 1,
                    'identificador_id_causador'=> $aux[0]->identificador_id,
                    'identificador_id_destino'=> $aux4[0]->identificador_id,
                    'identificador_id_receptor'=> $aux3[0]->identificador_id,
                    'created_at'=> $this->dat_create_update(),

                    ]);
                }
            $likes_total++;
              $resposta = [
                'id' => $id_full,
                'reactions' => $likes_total,
                'state' => 'like',
                'add' => [
                    1 => 'fas',
                    2 => 'liked',
                ],
                'remove' => [
                    1 => 'far',
                ],
              ];

            } elseif ($reactions_number > 0){
              DB::table('post_reactions')->where(['post_reaction_id'=>$likes_verificacao[0]->post_reaction_id])->delete();

              $likes_total--;
              $resposta = [
                'id' => $id_full,
                'reactions' => $likes_total,
                'state' => 'unlike',
                'add' => [
                    1 => 'far',
                ],
                'remove' => [
                    1 => 'fas',
                    2 => 'liked',
                ],
              ];
            }
            return response()->json($resposta);
          }

          public function comment_reac_final(Request $request){
            $control=DB::select('select (select identificadors.identificador_id from identificadors where identificadors.id = c.comment_id and identificadors.tipo_identificador_id = 4) as comment_identify,(select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_identify,(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = conta_identify) as ja_reagi,(select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_reactions,(select r.reaction_comment_id from reactions_comments as r where r.comment_id = c.comment_id and r.identificador_id = conta_identify) as id_ja_reagi  from comments as c where c.comment_id = ?', [Auth::user()->conta_id,$request->id]);
                  $resposta = 0;
                  if ($control[0]->ja_reagi == 0) {
                    DB::table('reactions_comments')->insert([
                      'comment_id' => $request->id,
                      'reaction_id' => 1,
                      'identificador_id' => $control[0]->conta_identify,
                      'created_at'=> $this->dat_create_update(),

                    ]);
                  /*  DB::table('notifications')->insert([
                          'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                          'id_state_notification' => 2,
                          'id_action_notification' => 1,
                          'identificador_id_causador'=> $aux[0]->identificador_id,
                          'identificador_id_destino'=> $aux2[0]->identificador_id,
                          ]);
                        DB::table('notifications')->insert([
                                'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                                'id_state_notification' => 2,
                                'id_action_notification' => 1,
                                'identificador_id_causador'=> $aux[0]->identificador_id,
                                'identificador_id_destino'=> $aux3[0]->identificador_id,
                              ]);*/

                    $resposta= $control[0]->qtd_reactions + 1;

                  } elseif (sizeof($comment_reac_v) == 1){
                    DB::table('reactions_comments')->where(['reaction_comment_id'=>$control[0]->id_ja_reagi])->delete();
                    $resposta= $control[0]->qtd_reactions - 1;
                  }
                  return response()->json($resposta);
                }

                public function comment_reac(Request $request){
                        $comment=DB::select('select * from comments where comment_id = ?', [$request->id]);
                        $post=DB::select('select * from posts where uuid = ?', [$comment[0]->post_id]);
              //                $page= DB::select('select * from pages where page_id = ?', [$post[0]->page_id]);
              //                  $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
            //                  $aux3= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
                        $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
                        $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
                        $comment_reac_v = DB::select('select reaction_comment_id from reactions_comments where (comment_id,identificador_id) = (?, ?)', [$request->id, $aux[0]->identificador_id]);
                        $resposta = 0;
                        if (sizeof($comment_reac_v) == 0) {
                          DB::table('reactions_comments')->insert([
                            'comment_id' => $request->id,
                            'reaction_id' => 1,
                            'identificador_id' => $aux[0]->identificador_id,
                            'created_at'=> $this->dat_create_update(),

                          ]);
                        /*  DB::table('notifications')->insert([
                                'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                                'id_state_notification' => 2,
                                'id_action_notification' => 1,
                                'identificador_id_causador'=> $aux[0]->identificador_id,
                                'identificador_id_destino'=> $aux2[0]->identificador_id,
                                ]);
                              DB::table('notifications')->insert([
                                      'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                                      'id_state_notification' => 2,
                                      'id_action_notification' => 1,
                                      'identificador_id_causador'=> $aux[0]->identificador_id,
                                      'identificador_id_destino'=> $aux3[0]->identificador_id,
                                    ]);*/

                          $resposta= 1;

                        } elseif (sizeof($comment_reac_v) == 1){
                          DB::table('reactions_comments')->where(['reaction_comment_id'=>$comment_reac_v[0]->reaction_comment_id])->delete();
                          $resposta= 2;
                        }
                        return response()->json($resposta);
                      }

    public function seguir(Request $request){


          $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
          $aux = DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$request->id, 2 ]);
          $aux1= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
          $page= DB::select('select * from pages where page_id = ?', [$request->id]);
          $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
          $aux3= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
          $verificacao= DB::select('select * from seguidors where (identificador_id_seguida,identificador_id_seguindo) = (?, ?)', [$aux[0]->identificador_id, $aux1[0]->identificador_id ]);

          if (sizeof($verificacao)==0) {
          DB::table('seguidors')->insert([
              'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
              'identificador_id_seguida' => $aux[0]->identificador_id,
              'identificador_id_seguindo' => $aux1[0]->identificador_id,
              'created_at'=> $this->dat_create_update(),
              ]);
              if ($page[0]->conta_id_a != $conta[0]->conta_id) {
            DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 5,
                  'identificador_id_causador'=> $aux1[0]->identificador_id,
                  'identificador_id_destino'=> $aux[0]->identificador_id,
                  'identificador_id_receptor'=> $aux2[0]->identificador_id,
                  'created_at'=> $this->dat_create_update(),

                  ]);
                }
              if ($page[0]->conta_id_b != $conta[0]->conta_id) {
                DB::table('notifications')->insert([
                        'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'id_state_notification' => 2,
                        'id_action_notification' => 5,
                        'identificador_id_causador'=> $aux1[0]->identificador_id,
                        'identificador_id_destino'=> $aux[0]->identificador_id,
                        'identificador_id_receptor'=> $aux3[0]->identificador_id,
                        'created_at'=> $this->dat_create_update(),
                        ]);
                      }

                    }
              $resposta=1;


                return response()->json($resposta);
        }

        public function seguir_final(Request $request){


              $conta =Auth::user()->conta_id;
              $page= DB::select('select (select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_logada_identify,(select count(*) from seguidors where 	identificador_id_seguida = page_identify and identificador_id_seguindo = conta_logada_identify) as segui, (select seguidor_id from seguidors where identificador_id_seguida = page_identify and identificador_id_seguindo = conta_logada_identify) as id_seguidors,(select identificadors.identificador_id from identificadors where identificadors.id = pa.conta_id_a and identificadors.tipo_identificador_id = 1) as conta_a_identify, (select identificadors.identificador_id from identificadors where identificadors.id = pa.conta_id_b and identificadors.tipo_identificador_id = 1) as conta_b_identify, if(pa.conta_id_a =? || pa.conta_id_b = ?  , 1, 0) as dono_page from pages as pa where page_id = ? ', [$conta,$conta,$conta,$request->id]);

              if ($page[0]->segui==0) {
              DB::table('seguidors')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'identificador_id_seguida' => $page[0]->page_identify,
                  'identificador_id_seguindo' => $page[0]->conta_logada_identify,
                  'created_at'=> $this->dat_create_update(),
                  ]);
                  $resposta='seguiu';
                  if ($page[0]->dono_page == 0) {
                DB::table('notifications')->insert([
                  [
                      'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                      'id_state_notification' => 2,
                      'id_action_notification' => 5,
                      'identificador_id_causador'=> $page[0]->conta_logada_identify,
                      'identificador_id_destino'=> $page[0]->page_identify,
                      'identificador_id_receptor'=> $page[0]->conta_a_identify,
                      'created_at'=> $this->dat_create_update(),

                    ],
                    [
                            'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                            'id_state_notification' => 2,
                            'id_action_notification' => 5,
                            'identificador_id_causador'=> $page[0]->conta_logada_identify,
                            'identificador_id_destino'=> $page[0]->page_identify,
                            'identificador_id_receptor'=> $page[0]->conta_b_identify,
                            'created_at'=> $this->dat_create_update(),
                          ],
                        ]);
                          }

                        }else {
                          DB::table('seguidors')
                                ->where('seguidor_id',$page[0]->id_seguidors)
                                ->delete();
                                $resposta='parou de seguir';
                        }



                    return response()->json($resposta);
            }

        public function savepost(Request $request){

              $conta =Auth::user()->conta_id;
              $aux = DB::select('select * from saveds where (post_id,conta_id) = (?, ?)', [$request->id,  $conta]);
         if (sizeof($aux)== 0) {
           DB::table('saveds')->insert([
               'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
               'conta_id' => $conta,
               'post_id' => $request->id,
               'created_at'=> $this->dat_create_update(),
               ]);
         }

                  $resposta=1;


                    return response()->json($resposta);
            }

            public function delete_post(Request $request){

                  DB::table('posts')
                        ->where('post_id', $request->id)
                        ->update([
                          'estado_post_id' => 4,
                          'updated_at' => $this->dat_create_update()
                      ]);

                      $resposta=1;


                        return response()->json($resposta);
                }

                public function ocultar_post(Request $request){

                      DB::table('posts')
                            ->where('post_id', $request->id)
                            ->update([
                              'estado_post_id' => 2,
                              'updated_at' => $this->dat_create_update()
                          ]);

                          $resposta=1;


                            return response()->json($resposta);
                    }


                    public function comentar_final(Request $request){
                      $conta= Auth::user()->conta_id;
                      $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
                      $control= DB::select('select p.post_id,(select identificadors.identificador_id from identificadors where identificadors.id = p.post_id and identificadors.tipo_identificador_id = 3) as post_identify,(select identificadors.identificador_id from identificadors where identificadors.id = pa.page_id and identificadors.tipo_identificador_id = 2) as page_identify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as conta_logada_identify,(select identificadors.identificador_id from identificadors where identificadors.id = pa.conta_id_a and identificadors.tipo_identificador_id = 1) as conta_a_identify, (select identificadors.identificador_id from identificadors where identificadors.id = pa.conta_id_b and identificadors.tipo_identificador_id = 1) as conta_b_identify, if(pa.conta_id_a = ?|| pa.conta_id_b = ? , 1, 0) as dono_page from posts as p  inner join pages as pa on p.page_id = pa.page_id where p.post_id = (select post_id from posts where uuid = ?)', [$conta,$conta,$conta,$request->id]);

                        $owner_page = false;
                        $comment_qtd = 0;
                        if ($control[0]->dono_page == 1) {
                            $owner_page = true;
                              $comment= DB::table('comments')->insertGetId([
                                'uuid' => $uuid,
                                'post_id' => $control[0]->post_id,
                                'identificador_id' => $control[0]->page_identify,
                                'tipo_estado_comment_id'=>1,
                                'comment'=>$request->comment,
                                'created_at'=> $this->dat_create_update(),
                                ]);

                            DB::table('identificadors')->insert([
                                  'tipo_identificador_id' => 4,
                                  'id' => $comment,
                                  'created_at'=> $this->dat_create_update(),
                            ]);

                            $last_comment=DB::select('select c.comment_id, c.uuid, c.comment,qtd_comment_reactions,(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = my_identify) as ja_comment_reactions,(select count(*) from comments as c where c.post_id = ?) as qtd_comments , if(tipo_verify = 1, (select nome from contas where conta_id = conta_identify ), (select nome from pages where page_id = conta_identify ) ) as nome_comment, if(tipo_verify = 1, (select apelido from contas where conta_id = conta_identify ), null) as apelido_comment, if(tipo_verify = 1,(select foto from contas where conta_id = conta_identify ), (select foto from pages where page_id = conta_identify )) as foto_comment from (select c.*, (select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_comment_reactions, (select tipo_identificador_id from identificadors where  identificador_id = c.identificador_id) as tipo_verify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as my_identify, (select id from identificadors where  identificador_id = c.identificador_id) as conta_identify   from comments as c where c.comment_id = ?) as c ',[$control[0]->post_id,$conta, $comment]);

                                $comment_qtd = $last_comment[0]->qtd_comments;

                              } else {
                                $comment= DB::table('comments')->insertGetId([
                                    'uuid' => $uuid,
                                    'post_id' => $control[0]->post_id,
                                    'identificador_id' => $control[0]->conta_logada_identify,
                                    'tipo_estado_comment_id'=>1,
                                    'comment'=>$request->comment,
                                    'created_at'=> $this->dat_create_update(),
                                ]);


                                $identificador=DB::table('identificadors')->insertGetId([
                                'tipo_identificador_id' => 4,
                                'id' => $comment,
                                'created_at'=> $this->dat_create_update(),
                                ]);

                                $last_comment=DB::select('select c.comment_id, c.uuid, c.comment,qtd_comment_reactions,(select count(*) from reactions_comments where comment_id = c.comment_id and identificador_id = my_identify) as ja_comment_reactions,(select count(*) from comments as c where c.post_id = ?) as qtd_comments  , if(tipo_verify = 1, (select nome from contas where conta_id = conta_identify ), (select nome from pages where page_id = conta_identify ) ) as nome_comment, if(tipo_verify = 1, (select apelido from contas where conta_id = conta_identify ), null) as apelido_comment, if(tipo_verify = 1,(select foto from contas where conta_id = conta_identify ), (select foto from pages where page_id = conta_identify )) as foto_comment from (select c.*, (select count(*) from reactions_comments where comment_id = c.comment_id) as qtd_comment_reactions, (select tipo_identificador_id from identificadors where  identificador_id = c.identificador_id) as tipo_verify, (select identificadors.identificador_id from identificadors where identificadors.id = ? and identificadors.tipo_identificador_id = 1) as my_identify, (select id from identificadors where  identificador_id = c.identificador_id) as conta_identify   from comments as c where c.comment_id = ?) as c ',[$control[0]->post_id,$conta, $comment]);
                                     $comment_qtd = $last_comment[0]->qtd_comments;

                                  DB::table('notifications')->insert([
                                    [
                                      'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                                      'id_state_notification' => 2,
                                      'id_action_notification' => 2,
                                      'identificador_id_causador'=> $control[0]->conta_logada_identify,
                                      'identificador_id_destino'=> $control[0]->post_identify,
                                      'identificador_id_receptor'=> $control[0]->conta_a_identify,
                                      'created_at'=> $this->dat_create_update(),

                                    ],
                                    [
                                            'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                                            'id_state_notification' => 2,
                                            'id_action_notification' => 2,
                                            'identificador_id_causador'=> $control[0]->conta_logada_identify,
                                            'identificador_id_destino'=> $control[0]->post_identify,
                                            'identificador_id_receptor'=> $control[0]->conta_b_identify,
                                            'created_at'=> $this->dat_create_update(),

                                            ]
                                          ]);

                              }

                        return response()->json(
                            [
                                'id' => $request->id,
                                'id_comment' => $uuid,
                                'owner' => $owner_page,
                                'loader' => 'loader_button_comment_'.$request->id,
                                'img_scr' => $request->img_scr,
                                'qtd' => $comment_qtd
                            ]
                        );
                      }

    public function ident(Request $request){
        return response()->json([
            'id' => $request->id,
            'file' => $request->file
        ]);
    }
    public function comentar(Request $request){

      //$ordenar = ['nice'];

      $post= DB::select('select * from posts where post_id = ?', [$request->id]);
      $page= DB::select('select * from pages where page_id = ?', [$post[0]->page_id]);
      $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
      $aux3= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
      $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
      $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
  //    dd($aux);
      $resposta=array();

            if ($page[0]->conta_id_a == $conta[0]->conta_id || $page[0]->conta_id_b == $conta[0]->conta_id) {
              $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$post[0]->page_id, 2 ]);
              DB::table('comments')->insert([
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'post_id' => $request->id,
                'identificador_id' => $aux[0]->identificador_id,
                'tipo_estado_comment_id'=>1,
                'comment'=>$request->comment,
                'created_at'=> $this->dat_create_update(),
                ]);
                /*DB::table('posts')
            ->where('post_id', $post[0]->post_id)
            ->update([
              'comments'=> $post[0]->comments + 1,
              'total_reactions_comments'=> $post[0]->total_reactions_comments + 1,
              'updated_at' => $this->dat_create_update()
            ]);*/

                $variable=  DB::table('comments')->get();
                foreach ($variable as $key) {
                  $resposta[0]['post_id']=$key->post_id;
                    $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$key->comment_id, $aux[0]->identificador_id]);
                   $resposta[0]['comment_S_N']=sizeof($ja_reagiu1);
                   $resposta[0]['comment_id']=$key->comment_id;
                   if ($aux[0]->tipo_identificador_id == 1) {
                    $resposta[0]['nome_comment']=$conta[0]->nome;
                     $resposta[0]['nome_comment'].=" ";
                     $resposta[0]['nome_comment'].=$conta[0]->apelido;
                     $resposta[0]['foto_conta']=$conta[0]->foto;
                     $resposta[0]['foto_ver']=1;
                   }elseif ($aux[0]->tipo_identificador_id == 2) {
                     $page= DB::table('pages')->get();
                    $resposta[0]['nome_comment']=$page[$aux[0]->id - 1]->nome;
                     $resposta[0]['foto_conta']=$page[$aux[0]->id - 1]->foto;
                     $resposta[0]['foto_ver']=2;
                   }
                   $resposta[0]['comment']=$key->comment;
                }
                DB::table('identificadors')->insert([
              'tipo_identificador_id' => 4,
              'id' => $resposta[0]['comment_id'],
              'created_at'=> $this->dat_create_update(),
         ]);

              } else {

                DB::table('comments')->insert([
                'post_id' => $request->id,
                'identificador_id' => $aux[0]->identificador_id,
                'tipo_estado_comment_id'=>1,
                'comment'=>$request->comment,
                'created_at'=> $this->dat_create_update(),
                ]);

                $variable=  DB::table('comments')->get();
                foreach ($variable as $key) {
                  $resposta[0]['post_id']=$key->post_id;
                    $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$key->comment_id, $aux[0]->identificador_id]);
                   $resposta[0]['comment_S_N']=sizeof($ja_reagiu1);
                   $resposta[0]['comment_id']=$key->comment_id;
                   if ($aux[0]->tipo_identificador_id == 1) {
                    $resposta[0]['nome_comment']=$conta[0]->nome;
                     $resposta[0]['nome_comment'].=" ";
                     $resposta[0]['nome_comment'].=$conta[0]->apelido;
                     $resposta[0]['foto_conta']=$conta[0]->foto;
                     $resposta[0]['foto_ver']=1;
                   }elseif ($aux[0]->tipo_identificador_id == 2) {
                     $page= DB::table('pages')->get();
                    $resposta[0]['nome_comment']=$page[$aux[0]->id - 1]->nome;
                     $resposta[0]['foto_conta']=$page[$aux[0]->id - 1]->foto;
                     $resposta[0]['foto_ver']=2;
                   }
                   $resposta[0]['comment']=$key->comment;
                }


                /*DB::table('posts')
                  ->where('post_id', $post[0]->post_id)
                  ->update([
                    'comments'=> $post[0]->comments + 1,
                    'total_reactions_comments'=> $post[0]->total_reactions_comments + 1,
                    'updated_at' => $this->dat_create_update()
                  ]);*/
                DB::table('identificadors')->insert([
              'tipo_identificador_id' => 4,
              'id' => $resposta[0]['comment_id'],
              'created_at'=> $this->dat_create_update(),

         ]);
         $a= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->id, 3 ]);
                  DB::table('notifications')->insert([
                      'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                      'id_state_notification' => 2,
                      'id_action_notification' => 2,
                      'identificador_id_causador'=> $aux[0]->identificador_id,
                      'identificador_id_destino'=> $a[0]->identificador_id,
                      'identificador_id_receptor'=> $aux2[0]->identificador_id,
                      'created_at'=> $this->dat_create_update(),

                      ]);
                    DB::table('notifications')->insert([
                            'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                            'id_state_notification' => 2,
                            'id_action_notification' => 2,
                            'identificador_id_causador'=> $aux[0]->identificador_id,
                            'identificador_id_destino'=> $a[0]->identificador_id,
                            'identificador_id_receptor'=> $aux3[0]->identificador_id,
                            'created_at'=> $this->dat_create_update(),

                            ]);

              }
        //$data = 'Siene';
        //$resposta
       return response()->json($resposta);
     }

    public function defaultDate(){
        $account_name = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
        return $account_name;
    }

    public function seeAllNotifications(){
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
      $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
      $paginasSeguidas = $dates['paginasSeguidas'];
      $dadosSeguida = $dates['dadosSeguida'];
      $allUserPages = $dates['allUserPages'];
      $notificacoes_count = $dates['notificacoes_count'];

        $page_current = 'auth';

        //----------------------------------------------------------------

        //----------------------------------------------------------------


        return view('notificacoes.index', compact('profile_picture','notificacoes_count','notificacoes', 'account_name', 'checkUserStatus', 'isUserHost', 'allUserPages', 'hasUserManyPages', 'page_current', 'page_content', 'conta_logada', 'dadosSeguida', 'paginasSeguidas', 'paginasNaoSeguidas'));
    }



    public function showLoginForm(){
        return view('auth.login_front');
    }

    public function registrarUser(){

        return view('auth.registerUser');
    }

    public function firstForm(){
            $dadosPais = Pais::all();
            return view('auth.RealRegister', compact('dadosPais'));
        }


   public function sendMsgToPhone($takePhone,$code){

         $response = Http::post('http://52.30.114.86:8080/mimosms/v1/message/send?token=a80fed69fcde464b35cee02ae7a172aa918235239 ', [
             'sender'=>'Tassumir',
             'recipients' => $takePhone,
             'text' => 'Codigo de Confirmação Tassumir :'.$code,
        ]);

            $responseBody = $response->body();

   }

   public function criptCode($plain_text_code){

        $cifra = "AES-128-CTR";
        $tmh_crypt = openssl_cipher_iv_length($cifra);

        $encryption_iv = '1234567891011121';
        $encryption_key = "tassumir";
        $options = 0;
        $encryp_conf_cod = openssl_encrypt(  $plain_text_code,$cifra, $encryption_key,$options,$encryption_iv);

        return $encryp_conf_cod;
   }
   public function decriptCode($codigo_criado){

        $options = 0;
        $cifra = "AES-128-CTR";
        $decription_iv = '1234567891011121';
        $decription_key = "tassumir";
        $decryp_code_confi=openssl_decrypt( $codigo_criado,  $cifra , $decription_key,$options,$decription_iv) ;
        return $decryp_code_confi;
   }

   public function sendMsgEmail($takeEmail,$get_verification_code){

     Mail::to($takeEmail)->send(new SendVerificationCode($get_verification_code));

   }

  public function joinAndSave(Request $request){

          try{

            //========== variaveis request ======

                $nome = $request->nome;
                $apelido = $request->apelido;
                $data_nascimento = $request->dat;
                $genero = $request->sexo;
                $nacionalidade = intval($request->nacionalidade);
                $takeEmail = $request->email;
                $takePhone = str_replace("-","",$request->telefone);

                $password = Hash::make($request->password);

            //========== fim variaveis request ======

            if($takeEmail != null){

                $result_email = DB::table('contas')
                     ->where('email','=',$takeEmail)
                     ->get();

                 if (sizeof($result_email) > 0 ) {

                    return back()->with('error',"Já existe uma conta com o email: ".$takeEmail." ". "na plataforma Tassumir");

                 }else{

                      $code = random_int(100000,900000);
                      $takePhone = $takePhone;
                      $takeEmail = $request->email;

                      $get_verification_code = $code;

                     $this->sendMsgEmail($takeEmail,$get_verification_code);

                      //Criptografia do codigo de confirmacao

                        $plain_text_code = $code;
                        $encryp_conf_cod = $this->criptCode($plain_text_code);

                      //fim criptografia

                     return view('auth.codigoRecebidoRegister',compact('nome','apelido','data_nascimento','genero','nacionalidade','encryp_conf_cod','takePhone','takeEmail','password'));

                }

            }else if($takePhone != null){

                    $result_phone = DB::table('contas')
                         ->where('telefone','=',$takePhone)
                         ->get();

                 if(sizeof($result_phone) > 0){

                        return back()->with('error',"Já existe uma conta com o telefone: ".$takePhone." ". "na plataforma Tassumir");
                 }else{

                      $code = random_int(100000,900000);
                      $takePhone = $takePhone;
                      $takeEmail = $request->email;

                      //==== algoritmo para envio de msg para o telefone ====

                        $this->sendMsgToPhone($takePhone,$code);

                     // ==== fim algoritmo para envio de msg para o telefone ====

                    //Criptografia do codigo de confirmacao

                     $plain_text_code = $code;
                     $encryp_conf_cod = $this->criptCode($plain_text_code);

                      //fim criptografia

                    return view('auth.codigoRecebidoRegister',compact('nome','apelido','data_nascimento','genero','nacionalidade','encryp_conf_cod','takePhone','takeEmail','password'));

                 }

            }else{
               // return redirect()->route('auth.ErrorStatus');
            }

          }catch(\Exception $e){

            //echo "O Erro é: " .$e;
          }
    }

    public function verifyCodeSent(Request $request){


        try{

         DB::beginTransaction();

        $input_code = $request->codeSent;

        $codigo_criado = $request->receivedCode;

        //decriptografia cod confirmacao

        $decryp_code_confi = $this->decriptCode($codigo_criado);

        //fim decriptografia

        $phoneReceived = $request->telefone;
        $emailReceived = $request->email;
        $nome = $request->receivedNome;
        $apelido = $request->receivedApelido;
        $data_nascimento = $request->receivedData_Nascimento;
        $nacional=$request->receivedNacio;
        $sexo = $request->receivedGenero;
        $password = $request->password;

        if($input_code === $decryp_code_confi){

            $conta = new Conta();
            $conta->uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            $conta->nome = $nome;
                  $conta->apelido = $apelido;
                  $conta->data_nasc = $data_nascimento;
                  $conta->genero = $sexo;
                  $conta->estado_civil_id = 1;
                  $conta->email = $emailReceived;
                  $conta->estado_conta_id = 1;
                  $conta->tipo_contas_id = 2;
                  $nacionalida = intval($nacional);
                  $conta->nacionalidade_id = $nacionalida;

                  if($phoneReceived){
                      $conta->telefone = $phoneReceived;
                  }

                  $conta->save();

              DB::table('identificadors')->insertGetId([
                   'tipo_identificador_id' => 1,
                   'id' => $conta->conta_id,
                   'created_at'=> $this->dat_create_update(),
              ]);
              if(!$phoneReceived){
                    $phoneReceived = NULL;
                }

              DB::table('logins')->insert([

                  'email' => $emailReceived,
                  'telefone' => $phoneReceived,
                  'password' =>$password,
                  'conta_id' => $conta->conta_id,
                  'created_at'=> $this->dat_create_update(),

              ]);
              DB::table('codigo_confirmacaos')->insert([

                  'codigoGerado' => $decryp_code_confi,
                  'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'conta_id' => $conta->conta_id,
                  'email' => $emailReceived,
                  'telefone' => $phoneReceived,
              ]);

               DB::commit();

                return redirect()->route('account.login.form')->with("success","Conta criada com Sucesso");
        }else{

            DB::rollBack();

           $response = $this->return_view_on_error($phoneReceived,$emailReceived,$nome,$apelido,$data_nascimento,$nacional,$sexo,$password);
            return $response;

        }

        }catch(\Exception $error){
               DB::rollBack();
                dd($error);
        }
    }

    public function return_view_on_error($phoneReceived,$emailReceived,$nome,$apelido,$data_nascimento,$nacional,$sexo,$password){
        return view('auth.codigoRecebidoActualizar',compact('phoneReceived','emailReceived','nome','apelido','data_nascimento','nacional','sexo','password'));
    }

    //nao recebi o codigo

    public function didnotReceived(Request $request){

        try{

        $phoneReceived = $request->telefone;
        $emailReceived = $request->email;
        $nome = $request->receivedNome;
        $apelido = $request->receivedApelido;
        $data_nascimento = $request->receivedData_Nascimento;
        $nacional=$request->receivedNacio;
        $sexo = $request->sexo;
        $password = $request->password;
            return view('auth.codigoRecebidoActualizar',compact('phoneReceived','emailReceived','nome','apelido','data_nascimento','nacional','sexo','password'));

        }catch(\Exception $e){

            dd($e);

        }


    }
    //fim nao recebi o codigo

    public function generateAgain(Request $request){

        try{

        $phoneReceived = $request->telefone;
        $emailReceived = $request->email;
        $nome = $request->receivedNome;
        $apelido = $request->receivedApelido;
        $data_nascimento = $request->receivedData_Nascimento;
        $nacional=$request->receivedNacio;
        $sexo = $request->sexo;
        $password=$request->password;

       if($phoneReceived != null){

            $code2 = random_int(100000,900000);

                    $this->sendMsgToPhone($phoneReceived,$code2);

                   $plain_text_code = $code2;

                        $encryp_conf_cod = $this->criptCode($plain_text_code);

 return view('auth.codigoRecebidoNovaConfirmation',compact('phoneReceived','encryp_conf_cod','emailReceived','nome','apelido','data_nascimento','nacional','sexo','password'));

       }else if($emailReceived != null) {

             $code2 = random_int(100000,900000);
                      $get_verification_code = $code2;

                      $this->sendMsgEmail($emailReceived,$get_verification_code);
                      //Criptografia do codigo de confirmacao
                    $plain_text_code = $code2;
                        $encryp_conf_cod = $this->criptCode($plain_text_code);

                       return view('auth.codigoRecebidoNovaConfirmation',compact('phoneReceived','encryp_conf_cod','emailReceived','nome','apelido','data_nascimento','nacional','sexo','password'));
       }else{

            dd("Telefone ou Email Vazio");
       }

        }catch(\Exception $error){
                dd($error);

        }

    }
    public function verifyAgainCodeSent(Request $request){

        try{

        $codeSent = $request->codeReceived;
        $code_digitado = $request->codeReceived1;

        //decriptografia cod confirmacao
        $decryp_code_confi = $this->decriptCode($codeSent);
        //fim decriptografia

        $phoneReceived = $request->telefone;
        $emailReceived = $request->email;
        $nome = $request->receivedNome;
        $apelido = $request->receivedApelido;
        $data_nascimento = $request->receivedData_Nascimento;
        $nacional=$request->receivedNacio;
        $sexo = $request->receivedGenero;
        $password=$request->password;

      if($decryp_code_confi === $code_digitado){

                $conta = new Conta();

                  $conta->uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
                  $conta->nome = $nome;
                  $conta->apelido = $apelido;
                  $conta->data_nasc = $data_nascimento;
                  $conta->genero = $sexo;
                  $conta->estado_civil_id = 1;
                  $conta->email = $emailReceived;
                  $conta->estado_conta_id = 1;
                  $conta->tipo_contas_id = 2;
                  $nacionalida = intval($nacional);
                  $conta->nacionalidade_id = $nacionalida;

                  if($phoneReceived){
                      $conta->telefone = $phoneReceived;
                  }

                  $conta->save();
                  $saveRetriveId = $conta->conta_id;

              DB::table('identificadors')->insertGetId([
                   'tipo_identificador_id' => 1,
                   'id' => $saveRetriveId,
                   'created_at'=> $this->dat_create_update(),
              ]);
              if(!$phoneReceived){
                    $phoneReceived = NULL;
                }

              DB::table('logins')->insert([

                  'email' => $emailReceived,
                  'telefone' => $phoneReceived,
                  'password' =>$password,
                  'conta_id' => $saveRetriveId,
                  'created_at'=> $this->dat_create_update(),

              ]);
              DB::table('codigo_confirmacaos')->insert([

                  'codigoGerado' => $decryp_code_confi,
                  'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'conta_id' => $saveRetriveId,
                  'email' => $emailReceived,
                  'telefone' => $phoneReceived,
              ]);

                return redirect()->route('account.login.form')->with("success","Conta criada com Sucesso");

      }else{

            return view('auth.codigoRecebidoActualizar',compact('phoneReceived','emailReceived ','nome','apelido','data_nascimento','nacional','sexo','password'));
      }

        }catch(\Exception $error){
            dd($error);
        }

    }

    public function recuperarSenha(){

        return view('auth.codeRecover');
    }
    public function codigoRecebido(){

        return view('auth.codigoRecebido');

    }
    public function newCode(){

        return view('auth.newCode');

    }


  public function sendPhoneEmailRecover(Request $request){

      try{
            $email = $request->emailName;
            $phone = str_replace("-","",$request->phoneNumber);

             if ($phone != null) {

                $takePhone = DB::table('contas')
                  ->select('telefone','conta_id')
                  ->where('telefone','=',$phone)
                  ->get();

                  if (isset($takePhone)) {

                      foreach($takePhone as $info){
                            $foundedId = $info->conta_id;
                            $foundedPhone = $info->telefone;
                            $codeToSend = random_int(100000,900000);
                             $this->sendMsgToPhone($phone,$codeToSend);

                            DB::table('codigo_confirmacaos')
                                          ->where('conta_id', $foundedId)
                                          ->update(['codigoGerado' => $codeToSend]);
                            return view('auth.codigoRecebido',compact('foundedId','codeToSend','phone','email'));
                    }
              }

                 return back()->with('error',"telefone invalido");

             }else if ($email != null) {

                 $takeEmail = DB::table('contas')
                     ->select('email','conta_id')
                     ->where('email','=',$email)
                     ->get();

              if (isset($takeEmail)) {
                foreach($takeEmail as $info){

                    $foundedId = $info->conta_id;

                    $foundedEmail = $info->email;
                    $codeToSend = random_int(100000,900000);
                     $get_verification_code = $codeToSend;

         $this->sendMsgEmail($email,$get_verification_code);
                       DB::table('codigo_confirmacaos')
                                  ->where('conta_id', $foundedId)
                                  ->update(['codigoGerado' => $codeToSend]);

                        return view('auth.codigoRecebido',compact('foundedId','codeToSend','phone','email'));
                }
          }

         return back()->with('error',"Email  invalido");
   }

     return back()->with('error',"Email ou Telefone invalidos");

      }catch(\Exception $error){
            dd($error);
            //return view('auth.ErrorStatus');
      }
  }

  public function verifyToRecoverPass(Request $request){

    try{
        $id = $request->Id;
        $codeSent = $request->codeSend;
        $takeThem = DB::table('codigo_confirmacaos')
            ->select('codigoGerado','conta_id')
            ->where('codigoGerado','=',$codeSent)
            ->where('conta_id','=',$id)
            ->get();

        if(isset($takeThem)){
            foreach($takeThem as $newInfo){

                $takeCode = $newInfo->codigoGerado;
                $takeId = $newInfo->conta_id;

            }

                if($takeCode == $codeSent && $takeId == $id){

                     return view('auth.newCode',compact('takeId'));
                }
        }
            return view('auth.codeRecover')->with('error','Código de confirmação invalido');

    }catch(\Exception $error){

            //return view('auth.ErrorStatus');
            dd($error);
    }

  }

  public function updatePassword(Request $request){

     try{
         $idToCompare = $request->theId;
          $password = $request->password;
          $confirmPass = $request->confirmarPassword;

          $passwordLength = strlen($request->password);
          $confirmPassLength = strlen($request->confirmarPassword);

      if($password == $confirmPass && $passwordLength == $confirmPassLength){

            DB::table('logins')
                  ->where('conta_id', $idToCompare)
                  ->update(['password' =>Hash::make($password), 'updated_at' => $this->dat_create_update()]);

        return redirect()->route('account.login.form')->with("success","Palavra Passe alterada com Sucesso");

      }
      else{

          return view('auth.newCode2',compact('idToCompare'));
      }
     }catch(\Exception $error){
        dd($error);
     }
  }

  public function qtd_like(Request $request)
  {
    try {

     $qtd_like=DB::select('select count(*) from post_reactions as p where p.identificador_id = (select i.identificador_id from identificadors as i where i.tipo_identificador_id= 1 and i.id = ?)',[$request->id]);
      return $qtd_like;
    } catch (\Exception $error){
      dd($error);
    }
  }
  public function qtd_pages_seg(Request $request)
  {
    try {
      $qtd_pages=DB::select('select count(*) from seguidors as s where s.identificador_id_seguindo =(select i.identificador_id from identificadors as i where i.tipo_identificador_id= 1 and i.id = ?)',[$request->id]);
      return $qtd_pages;
    } catch (\Exception $error){
      dd($error);
    }
  }
  public function qtd_saves(Request $request)
  {
    try {
      $qtd_saves=DB::select('select count(*) from saveds as s where s.conta_id =?',[$request->id]);
      return $qtd_saves;
       } catch (\Exception $error){
      dd($error);
    }
  }
  public function state_civil_and_descrition(Request $request)
  {
    try {
      $scad=DB::select('select count()',[$request->id]);
      return $scad;
    } catch (\Exception $error){
      dd($error);
    }
  }
  public function tip_of_relac_you(Request $request)
  {
    try {
        $request->id = Auth::user()->conta_id;
      $tory=DB::select('select al.*, if(id_conta_a=? ,(select ct.nome from contas as ct where ct.conta_id =id_conta_b),(select ct.nome from contas as ct where ct.conta_id =id_conta_a))as nome_outra_pessoa,if(id_conta_a=? ,(select ct.apelido from contas as ct where ct.conta_id =id_conta_b),(select ct.apelido from contas as ct where ct.conta_id =id_conta_a))as apelido_outra_pessoa from (select (select count(*) from pages as pg where pg.conta_id_a=c.conta_id and pg.tipo_page_id=1 or pg.conta_id_b=c.conta_id and pg.tipo_page_id=1)as verify_page,(select pg.page_id from pages as pg where pg.conta_id_a=c.conta_id and pg.tipo_page_id=1 or pg.conta_id_b=c.conta_id and pg.tipo_page_id=1 limit 1)as page_id, (select pg.tipo_relacionamento_id from pages as pg where pg.conta_id_a=c.conta_id and pg.tipo_page_id=1 or pg.conta_id_b=c.conta_id and pg.tipo_page_id=1)as tipo_relac_id, (select p.conta_id_a from pages as p where p.page_id=page_id order by p.page_id desc limit 1)as id_conta_a, (select pa.conta_id_b from pages as pa where pa.page_id=page_id order by pa.page_id desc limit 1)as id_conta_b, (select tp.tipo_relacionamento from tipo_relacionamentos as tp where tp.tipo_relacionamento_id=tipo_relac_id)as tipo_relac from contas as c where c.conta_id=?) as al',[$request->id,$request->id,$request->id]);
      return $tory;
    } catch (\Exception $error){
      dd($error);
    }
  }

  public function updatePassword2(Request $request){

   try{

         $idToCompare = $request->theId1;
          $password = $request->password1;
          $confirmPass = $request->confirmarPassword1;

          $passwordLength = strlen($request->password1);
          $confirmPassLength = strlen($request->confirmarPassword1);
      if($password == $confirmPass && $passwordLength == $confirmPassLength){

        DB::table('logins')
              ->where('conta_id', $idToCompare)
              ->update(['password' =>Hash::make($password),'updated_at' => $this->dat_create_update()]);


        return redirect()->route('account.login.form')->with("success","Palavra Passe alterada com Sucesso");
      }
      else{

          return view('auth.newCode2',compact('idToCompare'));

      }
  }catch(\Exception $error){
    dd($error);
  }

  }
/* final here */

    public function codigoRecebidoRegisto(){
        return view('auth.codigoRecebidoRegister');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'numero_ou_email' => ['required'],
            'palavra_passe' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->numero_ou_email, 'password' =>$request->palavra_passe])) {
            //dd("entrei");
            $request->session()->regenerate();
            return redirect()->route('account.home');

        }else if(Auth::attempt(['telefone' => $request->numero_ou_email, 'password' => $request->palavra_passe])){

            $request->session()->regenerate();
            return redirect()->route('account.home');
        }

         return back()->with('error',"Email ou senha invalido");


    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public static function isCasal($account_id)
    {
        //dd($account_id);
        $auth = new AuthController();
            $conta_logada = $auth->defaultDate();

        return count(DB::table('pages')
                ->where('conta_id_a', $conta_logada[0]->conta_id)
                ->orwhere('conta_id_b', $conta_logada[0]->conta_id)
                ->get()) > 0;
        //return DB::select('select page_id from pages where conta_id_a = ? or conta_id_b = ? and tipo_page_id = ?', [$account_id, $account_id, 1]);
    }

    public static function profile_picture($account_id)
    {
      $auth = new AuthController();
          $conta_logada = $auth->defaultDate();

        return DB::select('select foto from contas where conta_id = ?', [$conta_logada[0]->conta_id])[0]->foto;
    }

      /*  public static function post_files($post_id)
      {
          return DB::select('select files from posts where post_id = ?', [$post_id])[0]->files;
        }*/

    public static function updateUserProfilePicture($picture, $account_id)
    {
        $auth = new AuthController();
        $data = $auth->dat_create_update();
        DB::table('contas')->where('conta_id', $account_id)->update(['foto' => $picture,'updated_at' => $data]);
        return redirect()->route('account.profile');
    }

    public static function updatePageProfilePicture($picture, $uuid)
    {
        $auth = new AuthController();
        $data = $auth->dat_create_update();
        DB::table('pages')->where('uuid', $uuid)->update(['foto' => $picture, 'updated_at' => $data]);
        return back();
    }


    public static function isUserHost($account_id)
    {
      $auth = new AuthController();
          $conta_logada = $auth->defaultDate();
        return count(DB::table('pages')
                    ->where('conta_id_a',  $conta_logada[0]->conta_id)
                    ->orwhere('conta_id_b',  $conta_logada[0]->conta_id)
                    ->get()) > 0;
    }

    public static function hasUserManyPages($account_id)
    {
      $auth = new AuthController();
          $conta_logada = $auth->defaultDate();
        return count(DB::table('pages')
                    ->where('conta_id_a', $conta_logada[0]->conta_id)
                    ->orwhere('conta_id_b', $conta_logada[0]->conta_id)
                    ->get()) > 1;
    }

    /**
     * get all the user pages
     *
     * @return
     */
   public function pegar_ultimocomment(Request $request)
    {
      $comment=DB::table('comments')->where('post_id', '=', $request->id)->orderBy('comment_id', 'desc')->get();
      $resposta=$this->dados_comment($comment[0]);
      return response()->json($resposta);
    }
    public static function allUserPages($auth, $account_id)
    {
        $page_data = array();
        $index = 0;

        if ($auth->hasUserManyPages($account_id))
        {
            $data =  DB::table('pages')->where('conta_id_a', $account_id)->orwhere('conta_id_b', $account_id)->get();
            foreach($data as $d)
            {
                $page_data[$index]['page_uuid'] = $d->uuid;
                $page_data[$index]['page_name'] = $d->nome;
                $page_data[$index]['seguidores'] = PaginaCasalController::seguidores($d->page_id);
                $index++;
            }

        }

        return $page_data;
    }
    public function NotFound(){
        return view('auth.ErrorStatus');
    }

}

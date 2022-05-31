<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
  
    public function index()
    {
        try {
          $controll = new AuthController();
           $dates = $controll->default_();
        $account_name = $dates['account_name'];
        $checkUserStatus = $dates['checkUserStatus'];
        $profile_picture = $dates['profile_picture'];
        $isUserHost = $dates['isUserHost'];
        $hasUserManyPages = $dates['hasUserManyPages'];
        $allUserPages = $dates['allUserPages'];
        $page_content = $dates['page_content'];
        $checkUserStatus = $dates['checkUserStatus'];
        $conta_logada = $dates['conta_logada'];
        $notificacoes = $dates['notificacoes'];
        $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
        $paginasSeguidas = $dates['paginasSeguidas'];
        $dadosSeguida = $dates['dadosSeguida'];
        $page_current = 'relationship_request';
        $user_logado = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);

        $message_contact = DB::table('messages')->where('id_identificador_a', $user_logado[0]->identificador_id)->orwhere('id_identificador_b', $user_logado[0]->identificador_id)->join('identificadors', function ($join) {
            $join->on('messages.id_identificador_a', '=', 'identificadors.identificador_id' )->orOn('messages.id_identificador_b', '=', 'identificadors.identificador_id');
        })->select('messages.*', 'identificadors.id')->get();


        $contas = DB::table('contas')->limit(8)->get();


        //dd($contas);
        return view('message.index', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'paginasNaoSeguidas', 'paginasSeguidas', 'dadosSeguida', 'user_logado', 'contas', 'message_contact'));

        } catch (\Exception $e) {

                $function_name = "index";
                $controller_name = "MessageController";
                $error_msg = $e->getMessage();

                $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }
    }

    public function save_errors_on_database($function_name,$controller_name,$error_msg){


                DB::table('errors')->insert([
                    'uuid'=>\Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'nome_da_funcao'=>$function_name,
                    'nome_do_controller'=>$controller_name,
                    'descricao_do_erro'=> $error_msg,
                    
                ]);

    }
  
    public function store(Request $request)
    {
        try {

        if ($request->ajax()) {
            $m_user_logado = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->user_send, 1 ]);
            $m_destinatario = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->conta_send, 1 ]);
            $foto_user =  DB::table('contas')->where('conta_id', $request->user_send)->get();
            $foto_dest =  DB::table('contas')->where('conta_id', $request->conta_send)->get();

            $mensagem = new Message;
            $mensagem->message = $request->message_send;
            $mensagem->id_identificador_a = $m_user_logado[0]->identificador_id;
            $mensagem->id_identificador_b = $m_destinatario[0]->identificador_id;
            $mensagem->id_state_message = 1;
            $mensagem->save();
            $resposta['resultado'] = 'Salvou';
            $resposta['foto_reme'] = $foto_user[0]->foto;

            //****************************
     
        $message_user['foto_des'] = $foto_dest[0]->foto;
        $message_user['foto_rem'] = $foto_user[0]->foto;
        $message_user['destinatario'] = $m_destinatario[0]->identificador_id;
        $message = DB::table('messages')->where([
                  ['id_identificador_a', '=', $m_user_logado[0]->identificador_id],
                  ['id_identificador_b', '=', $m_destinatario[0]->identificador_id],
            ])->orwhere([
                  ['id_identificador_a', '=', $m_destinatario[0]->identificador_id],
                  ['id_identificador_b', '=', $m_user_logado[0]->identificador_id],
            ])->orderBy('message_id', 'desc')->limit(5)->get()->reverse();

            $tamanho = sizeof($message);
            $key = 0;
            foreach ($message as $value) {
                $resultado[$key] = $value;
                $id_sms_last = $value->message_id;
                $key ++;
            }   
            $message_user['id_last_sms'] = $id_sms_last;
            $message_user['valor'] = $resultado;
            $message_user['resultado'] = "Salvou";
            return response()->json($message_user);
            
        }else{
            return response()->json('Nenhum dado Enviado');
        }
        } catch (\Exception $e) {

                $function_name = "store";
                $controller_name = "MessageController";
                $error_msg = $e->getMessage();

                $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }
    }

    public function show(Request $request)
    {
        try {
            if ($request->ajax()) {
            /*
        $controll = new PaginaCasalController();
        $dates = $controll->default_();
        $account_name = $dates['account_name'];
        $checkUserStatus = $dates['checkUserStatus'];
        $profile_picture = $dates['profile_picture'];
        $isUserHost = $dates['isUserHost'];
        $hasUserManyPages = $dates['hasUserManyPages'];
        $allUserPages = $dates['allUserPages'];
        $page_content = $dates['page_content'];
        $checkUserStatus = $dates['checkUserStatus'];
        $conta_logada = $dates['conta_logada'];
        $notificacoes = $dates['notificacoes'];
        $dadosSeguindo = $dates['dadosSeguindo'];
        $dadosPage = $dates['dadosPage'];
        $dadosSeguida = $dates['dadosSeguida'];
        $page_current = 'relationship_request';*/
        $m_user_logado = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->user_send, 1 ]);
        $m_destinatario = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->conta_send, 1 ]);
        $foto_user =  DB::table('contas')->where('conta_id', $request->user_send)->get();
        $foto_dest =  DB::table('contas')->where('conta_id', $request->conta_send)->get();
      /*
        $message_contact = DB::table('messages')->where('id_identificador_a', $m_user_logado[0]->identificador_id)->orwhere('id_identificador_b', $m_user_logado[0]->identificador_id)->join('identificadors', function ($join) {
            $join->on('messages.id_identificador_a', '=', 'identificadors.identificador_id' )->orOn('messages.id_identificador_b', '=', 'identificadors.identificador_id');
        })->select('messages.*', 'identificadors.id')->get();*/
        $message_user['foto_des'] = $foto_dest[0]->foto;
        $message_user['foto_rem'] = $foto_user[0]->foto;
        $message_user['destinatario'] = $m_destinatario[0]->identificador_id;
        $message = DB::table('messages')->where([
                  ['id_identificador_a', '=', $m_user_logado[0]->identificador_id],
                  ['id_identificador_b', '=', $m_destinatario[0]->identificador_id],
            ])->orwhere([
                  ['id_identificador_a', '=', $m_destinatario[0]->identificador_id],
                  ['id_identificador_b', '=', $m_user_logado[0]->identificador_id],
            ])->orderBy('message_id', 'desc')->limit(5)->get()->reverse();
        $message_lenth = DB::table('messages')->where([
                  ['id_identificador_a', '=', $m_user_logado[0]->identificador_id],
                  ['id_identificador_b', '=', $m_destinatario[0]->identificador_id],
            ])->orwhere([
                  ['id_identificador_a', '=', $m_destinatario[0]->identificador_id],
                  ['id_identificador_b', '=', $m_user_logado[0]->identificador_id],
            ])->orderBy('message_id', 'desc')->get();    

            $tamanho = sizeof($message);
            $key = 0;
            foreach ($message as $value) {
                $resultado[$key] = $value;
                $key ++;
            }
            $message_user['valor'] = $resultado;
            $message_user['tamanho_sms'] = sizeof($message_lenth);
            return response()->json($message_user);
        }
        } catch (\Exception $e) {

                $function_name = "show";
                $controller_name = "MessageController";
                $error_msg = $e->getMessage();

                $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }

    }

        public function mostrar_sms($remetente, $destinatario)
    {
        try {

          $controll = new AuthController();
           $dates = $controll->default_();
        $account_name = $dates['account_name'];
        $checkUserStatus = $dates['checkUserStatus'];
        $profile_picture = $dates['profile_picture'];
        $isUserHost = $dates['isUserHost'];
        $hasUserManyPages = $dates['hasUserManyPages'];
        $allUserPages = $dates['allUserPages'];
        $page_content = $dates['page_content'];
        $checkUserStatus = $dates['checkUserStatus'];
        $conta_logada = $dates['conta_logada'];
        $notificacoes = $dates['notificacoes'];
        $page_current = 'relationship_request';

        $conta_logada = DB::table('contas')->where('uuid', $remetente)->get();
        $conta_destino = DB::table('contas')->where('uuid', $destinatario)->get();

        $user_logado = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);

        $identificador_user = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
        $identificador_dest = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_destino[0]->conta_id, 1 ]);

         $message_text = DB::table('messages')->where([
                  ['id_identificador_a', '=', $identificador_user[0]->identificador_id],
                  ['id_identificador_b', '=', $identificador_dest[0]->identificador_id],
            ])->orwhere([
                  ['id_identificador_a', '=', $identificador_dest[0]->identificador_id],
                  ['id_identificador_b', '=', $identificador_user[0]->identificador_id],
            ])->orderBy('message_id', 'desc')->limit(5)->get()->reverse();

            $message_lenth = DB::table('messages')->where([
                  ['id_identificador_a', '=', $identificador_user[0]->identificador_id],
                  ['id_identificador_b', '=', $identificador_dest[0]->identificador_id],
            ])->orwhere([
                  ['id_identificador_a', '=', $identificador_dest[0]->identificador_id],
                  ['id_identificador_b', '=', $identificador_user[0]->identificador_id],
            ])->orderBy('message_id', 'desc')->get();

          $message_contact = DB::table('messages')->where('id_identificador_a', $identificador_user[0]->identificador_id)->orwhere('id_identificador_b', $identificador_user[0]->identificador_id)->join('identificadors', function ($join) {
            $join->on('messages.id_identificador_a', '=', 'identificadors.identificador_id' )->orOn('messages.id_identificador_b', '=', 'identificadors.identificador_id');
        })->select('messages.*', 'identificadors.id')->get();


        $contas = DB::table('contas')->limit(8)->get();

        return view('message.index', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'user_logado', 'contas', 'message_contact', 'message_text', 'identificador_user', 'identificador_dest', 'conta_destino', 'message_lenth'));
        

        } catch (\Exception $e) {

                $function_name = "mostrar_sms";
                $controller_name = "MessageController";
                $error_msg = $e->getMessage();

                $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }

    }

   
     public function last_sms(Request $request)
    {
        try {
            if ($request->ajax()) {

                $foto_user =  DB::table('contas')->where('conta_id', $request->user_send)->get();
                $foto_dest =  DB::table('contas')->where('conta_id', $request->conta_send)->get();
                $message_user['foto_des'] = $foto_dest[0]->foto;
                $message_user['foto_rem'] = $foto_user[0]->foto;
                $message_user['nome_des'] = $foto_dest[0]->nome;
                $message_user['code'] = 1;

                $identificador_user = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->user_send, 1 ]);
                $identificador_dest = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->conta_send, 1 ]);

                $message_user['destinatario'] = $identificador_dest[0]->identificador_id;
                $message = DB::table('messages')->where([
                  ['id_identificador_a', '=', $identificador_user[0]->identificador_id],
                  ['message_id', '<', $request->id_sms],
                  ['id_identificador_b', '=', $identificador_dest[0]->identificador_id],
                    ])->orwhere([
                  ['id_identificador_a', '=', $identificador_dest[0]->identificador_id],
                  ['message_id', '<', $request->id_sms],
                  ['id_identificador_b', '=', $identificador_user[0]->identificador_id],
                    ])->orderBy('message_id', 'desc')->limit(5)->get()->reverse();

                    $message_lenth = DB::table('messages')->where([
                  ['id_identificador_a', '=', $identificador_user[0]->identificador_id],
                  ['message_id', '<', $request->id_sms],
                  ['id_identificador_b', '=', $identificador_dest[0]->identificador_id],
                    ])->orwhere([
                  ['id_identificador_a', '=', $identificador_dest[0]->identificador_id],
                  ['message_id', '<', $request->id_sms],
                  ['id_identificador_b', '=', $identificador_user[0]->identificador_id],
                    ])->orderBy('message_id', 'desc')->get();

            if (sizeof($message) == 0) {
                $message_user['code'] = 2;
                $message_user['valor'] = 0;
            }else {
                $key = 0;
            foreach ($message as $value) {
                $resultado[$key] = $value;
                $key ++;
            }
            $message_user['valor'] = $resultado;
            $message_user['tamanho_sms'] = sizeof($message_lenth);
            }
            return response()->json($message_user);
            }
        } catch (\Exception $e) {

                $function_name = "last_sms";
                $controller_name = "MessageController";
                $error_msg = $e->getMessage();

                $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }
    }

    public function first_sms(Request $request)
    {
        try {
            if ($request->ajax()) {

                $foto_user =  DB::table('contas')->where('conta_id', $request->user_send)->get();
                $foto_dest =  DB::table('contas')->where('conta_id', $request->conta_send)->get();
                $message_user['foto_des'] = $foto_dest[0]->foto;
                $message_user['foto_rem'] = $foto_user[0]->foto;
                $message_user['nome_des'] = $foto_dest[0]->nome;
                $message_user['code'] = 1;

                $identificador_user = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->user_send, 1 ]);
                $identificador_dest = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->conta_send, 1 ]);

                $message_user['destinatario'] = $identificador_dest[0]->identificador_id;
                $message_user['valor'] = DB::table('messages')->where([
                  ['id_identificador_a', '=', $identificador_user[0]->identificador_id],
                  ['message_id', '>', $request->id_sms],
                  ['id_identificador_b', '=', $identificador_dest[0]->identificador_id],
                    ])->orwhere([
                  ['id_identificador_a', '=', $identificador_dest[0]->identificador_id],
                  ['message_id', '>', $request->id_sms],
                  ['id_identificador_b', '=', $identificador_user[0]->identificador_id],
                    ])->orderBy('message_id', 'asc')->limit(5)->get()->reverse();

                $message_lenth = DB::table('messages')->where([
                  ['id_identificador_a', '=', $identificador_user[0]->identificador_id],
                  ['message_id', '>', $request->id_sms],
                  ['id_identificador_b', '=', $identificador_dest[0]->identificador_id],
                    ])->orwhere([
                  ['id_identificador_a', '=', $identificador_dest[0]->identificador_id],
                  ['message_id', '>', $request->id_sms],
                  ['id_identificador_b', '=', $identificador_user[0]->identificador_id],
                    ])->orderBy('message_id', 'asc')->get();    

            if (sizeof($message_user['valor']) == 0) {
                $message_user['code'] = 2;
                $message_user['tamanho_sms'] = sizeof($message_lenth);
            }
            return response()->json($message_user);
            }
        } catch (\Exception $e) {

                $function_name = "first_sms";
                $controller_name = "MessageController";
                $error_msg = $e->getMessage();

                $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }
    }

    public function pesquisar_destinatario(Request $request)
    {
        try{

            if($request->ajax()){

                $conta = DB::table('contas')->where('nome', 'like', '%'.$request->dados.'%')
                ->orwhere('apelido', 'like', '%'.$request->dados.'%')->limit(5)->get();

                $data = $conta;
                if(count($data)>0){
                    $output['valor']=$data;
                }else{
                  $output['valor']='Sem Resultado';
                }

                return response()->json($output);
            }

        }catch(\Exception $e){

                $function_name = "pesquisar_destinatario";
                $controller_name = "MessageController";
                $error_msg = $e->getMessage();

                $this->save_errors_on_database($function_name, $controller_name,  $error_msg );
        }


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
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
        $page_current = 'relationship_request';
        $user_logado = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
        
        $message_contact = DB::table('messages')->where('id_identificador_a', $user_logado[0]->identificador_id)->orwhere('id_identificador_b', $user_logado[0]->identificador_id)->join('identificadors', function ($join) {
            $join->on('messages.id_identificador_a', '=', 'identificadors.identificador_id' )->orOn('messages.id_identificador_b', '=', 'identificadors.identificador_id');
        })->select('messages.*', 'identificadors.id')->get();

           
        

        $contas = DB::table('contas')->limit(8)->get();
        
                
        //dd($contas);
        return view('message.index', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida', 'user_logado', 'contas', 'message_contact'));
        } catch (Exception $e) {
            
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
        try {
           
        if ($request->ajax()) {
            $m_user_logado = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->user_send, 1 ]);
            $m_destinatario = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$request->conta_send, 1 ]);
            $foto_user =  DB::table('contas')->where('conta_id', $request->user_send)->get();

            $mensagem = new Message;
            $mensagem->message = $request->message_send;
            $mensagem->id_identificador_a = $m_user_logado[0]->identificador_id;
            $mensagem->id_identificador_b = $m_destinatario[0]->identificador_id;
            $mensagem->id_state_message = 1;
            $mensagem->save();
            $resposta['resultado'] = 'Salvou';
            $resposta['foto_reme'] = $foto_user[0]->foto;
            return response()->json($resposta);
        }else{
            return response()->json('Nenhum dado Enviado');
        } 
        } catch (Exception $e) {
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
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
        $message_user['valor'] = DB::table('messages')->where([
                  ['id_identificador_a', '=', $m_user_logado[0]->identificador_id],
                  ['id_identificador_b', '=', $m_destinatario[0]->identificador_id],
            ])->orwhere([
                  ['id_identificador_a', '=', $m_destinatario[0]->identificador_id],
                  ['id_identificador_b', '=', $m_user_logado[0]->identificador_id],
            ])->orderBy('message_id', 'desc')->limit(5)->get()->reverse();

    /*     
         $users = DB::table('users')
                ->orderBy('name', 'desc')
                ->get();
         $users = DB::table('users')->where([
                  ['status', '=', '1'],
                  ['subscribed', '<>', '1'],
            ])->get();
            $contas = DB::table('contas')->limit(8)->get();
            $conta_destino = DB::table('contas')->where('conta_id', $destinatario)->get();
               
    */    
            return response()->json($message_user);
        }
        } catch (Exception $e) {
            
        }
         
    }

        public function mostrar_sms($remetente, $destinatario)
    {      
        try {
            
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
            
        
               

          $message_contact = DB::table('messages')->where('id_identificador_a', $identificador_user[0]->identificador_id)->orwhere('id_identificador_b', $identificador_user[0]->identificador_id)->join('identificadors', function ($join) {
            $join->on('messages.id_identificador_a', '=', 'identificadors.identificador_id' )->orOn('messages.id_identificador_b', '=', 'identificadors.identificador_id');
        })->select('messages.*', 'identificadors.id')->get();  
        

        $contas = DB::table('contas')->limit(8)->get();
        
                
        //dd($contas);
        return view('message.index', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida', 'user_logado', 'contas', 'message_contact', 'message_text', 'identificador_user', 'identificador_dest', 'conta_destino'));
        
        } catch (Exception $e) {
            
        }
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    public function pesquisar_destinatario(Request $request)
    {
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

    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}

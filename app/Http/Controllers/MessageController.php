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
        return view('message.index', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida', 'user_logado', 'contas', 'message_contact'));    }

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
        if ($request->ajax()) {
            $mensagem = new Message;
            $mensagem->message = $request->message_send;
            $mensagem->id_identificador_a = $request->user_send;
            $mensagem->id_identificador_b = $request->conta_send;
            $mensagem->id_state_message = 1;
            $mensagem->save();
            return response()->json('Salvou');
        }else{
            return response()->json('Nenhum dado Enviado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($destinatario, $user_logado)
    {
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
        $m_user_logado = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$user_logado, 1 ]);
        $m_destinatario = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$destinatario, 1 ]);
      
        $message_contact = DB::table('messages')->where('id_identificador_a', $m_user_logado[0]->identificador_id)->orwhere('id_identificador_b', $m_user_logado[0]->identificador_id)->join('identificadors', function ($join) {
            $join->on('messages.id_identificador_a', '=', 'identificadors.identificador_id' )->orOn('messages.id_identificador_b', '=', 'identificadors.identificador_id');
        })->select('messages.*', 'identificadors.id')->get();

        $message_user = DB::table('messages')->where('id_identificador_a', $m_user_logado[0]->identificador_id)->orwhere('id_identificador_a',$m_destinatario[0]->identificador_id)->limit(6)->get();
         
         
            $contas = DB::table('contas')->limit(8)->get();
            $conta_destino = DB::table('contas')->where('conta_id', $destinatario)->get();
               
        
        return view('message.index', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'checkUserStatus', 'conta_logada', 'notificacoes', 'dadosPage', 'dadosSeguindo', 'dadosSeguida', 'm_user_logado', 'contas', 'message_user', 'm_destinatario', 'message_contact', 'conta_destino')); 
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

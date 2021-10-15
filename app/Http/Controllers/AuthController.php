<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(){
        //$this->middleware('auth:web1');
    }
    public function index(){
        if (Auth::check() == true) {
            $account_name = $this->defaultDate();
      $post=  DB::table('posts')->get();
      $page= DB::table('pages')->get();
      $a=0;
      $dados = array();
      foreach ($post as $key) {

        $aux = DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$page[$key->page_id - 1]->page_id, 2 ]);
        $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
        $seguidor = DB::select('select * from seguidors where (identificador_id_seguida, identificador_id_seguindo) = (?, ?)', [$aux[0]->identificador_id, $aux1[0]->identificador_id]);
        $likes = DB::select('select * from post_reactions where post_id = ?', [$key->post_id]);
        $comment = DB::select('select * from comments where post_id = ?', [$key->post_id]);
        $ja_reagiu = DB::select('select * from post_reactions where (post_id, identificador_id) = (?, ?)', [$key->post_id, $aux1[0]->identificador_id]);

        $dados[$a]['nome_pag'] = $page[$key->page_id - 1]->nome;
        $dados[$a]['post']=$key->descricao;
        $dados[$a]['qtd_likes']= sizeof($likes);
        $dados[$a]['qtd_comment']=sizeof($comment);
        $dados[$a]['seguir_S/N']=sizeof($seguidor);
        $dados[$a]['post_id']=$key->post_id;
        $dados[$a]['page_id']= $key->page_id ;
        $dados[$a]['reagir_S/N']=sizeof($ja_reagiu);

        $a++;
      }
        return view('feed.index', compact('account_name', 'dados'));
    }
            return redirect()->route('account.login.form');
}

    public function like(Request $request){
            $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
            $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
            $resposta = 0;
            if ($request->v == 1) {
              DB::table('post_reactions')->insert([
                'reaction_id' => 1,
                'identificador_id' => $aux[0]->identificador_id,
                'post_id' => $request->id,
              ]);
              $resposta= 1;

            } elseif ($request->v == 2){
              DB::table('post_reactions')->where(['post_id'=>$request->id])->delete();
              $resposta= 2;
            }
            return response()->json($resposta);
          }

    public function seguir(Request $request){

          $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
          $aux = DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$request->id, 2 ]);
          $aux1= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);

          DB::table('seguidors')->insert([
              'identificador_id_seguida' => $aux[0]->identificador_id,
              'identificador_id_seguindo' => $aux1[0]->identificador_id,
              ]);
              $resposta=1;


                return response()->json($resposta);
        }

    public function comentar(Request $request){

            $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
            $aux1= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);

            DB::table('comments')->insert([
              'post_id' => $request->id,
              'identificador_id' => $aux1[0]->identificador_id,
              'tipo_estado_comment_id'=>1,
              'comment'=>$request->comment,
              ]);
              $resposta=1;


          return response()->json($resposta);
          }

    public function defaultDate(){
        $account_name = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
        return $account_name;
    }

    public function showLoginForm(){
        return view('auth.login_front');
    }
    public function registrarUser(){

        return view('auth.registerUser');
    }
    public function registrarUserComplete(Request $request){

        return view('auth.registerUserLastInfo');
    }

    public function sendtoOtherForm(Request $request){

        $nome = $request->nome;
        $apelido = $request->apelido;
        $sexo = $request->sexo;
        $data = $request->dat;

        //dd($nome."=>".$apelido."=>".$sexo."=>".$data);
        
        return view('auth.registerUserLastInfo',compact('nome','apelido','sexo','data'));
        
    }
    public function joinAndSave(Request $request){


        $saveRetriveId = DB::table('contas')->insertGetId([
            'nome' => $request->nome1,
            'apelido' => $request->apelido1,
            'data_nasc' => $request->dataNasc1,
            'genero' => $request->sexo1,
            'estado_civil_id' => 1,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'estado_conta_id' => 1,
            'nacionalidade' => $request->nacionalidade

        ]);


        //$countId = DB::table('contas')->select(count(['conta_id']))->count();

        DB::table('logins')->insert([

            'email' => $request->email,
            'telefone' => $request->telefone,
            'password' => Hash::make($request->password),
            'conta_id' => $saveRetriveId,

        ]);


        return redirect()->route('account.login.form');
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

    public function login(Request $request){

        /*$credentials = $request->validate([
            'email_login' => ['required'],
            'password_login' => ['required'],
        ]);*/

        //dd($request);

        if (Auth::attempt(['email' => $request->number_email_login, 'password' => $request->password_login])) {

            $request->session()->regenerate();
            return redirect()->route('account.home');

        }else if(Auth::attempt(['telefone' => $request->number_email_login, 'password' => $request->password_login])){


            $request->session()->regenerate();
            return redirect()->route('account.home');

        }
        return redirect()->route('account.login.form');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}

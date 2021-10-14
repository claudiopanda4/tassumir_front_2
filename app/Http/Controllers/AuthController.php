<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct(){
        //$this->middleware('auth:web1');
    }
    public function index(){
        if (Auth::check() == true) {
            $account_name = $this->defaultDate();
            //dd($account_name);
            //define('USER_NOME', $account_name[0]->nome);
            //define('USER_APELIDO', $account_name[0]->apelido);
            //---------------------------------------------------------------------------------


      $post=  DB::table('posts')->get();
      $page= DB::table('pages')->get();
      $a=0;


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






      //---------------------------------------------------------------------------------


              return view('feed.index', compact('account_name', 'dados'));
            }
            return redirect()->route('account.login.form');
          }

    public function like(Request $request){
            $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
            $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
            if ($request->v == 1) {
              DB::table('post_reactions')->insert([
                'reaction_id' => 1,
                'identificador_id' => $aux[0]->identificador_id,
                'post_id' => $request->id,
              ]);
              $resposta="Não gosto";

            }elseif ($request->v == 2){
              DB::table('post_reactions')->where(['post_id'=>$request->id])->delete();
              $resposta="Gosto";
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
    public function registrarUserComplete(){
        return view('auth.registerUserLastInfo');
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

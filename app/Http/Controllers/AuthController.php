<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\PaginaCasalController;

class AuthController extends Controller
{
    private $casalPage;
    public function __construct(){
        //$this->middleware('auth:web1');
        $this->casalPage = new PaginaCasalController();
    }



    public function index(){
        if (Auth::check() == true) {

        $account_name = $this->defaultDate();
        $page_content = $this->casalPage->page_default_date($account_name);
        $checkUserStatus = Self::isCasal(Auth::user()->conta_id);
        $profile_picture = Self::profile_picture(Auth::user()->conta_id);
        $isUserHost = Self::isUserHost($account_name[0]->conta_id);
        $hasUserManyPages = Self::hasUserManyPages(Auth::user()->conta_id);
        $allUserPages = Self::allUserPages(new AuthController, Auth::user()->conta_id);

        //=================================================================
        //=========================Comecem Aqui-----------
        $dadosPage = Page::all();
        if (sizeof($page_content) <= 0) {
        }
        //dd(sizeof($page_content));
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

                //=========================Terminem Aqui----------- Depois põe estas variáveis no compact 'dadosSeguida', 'dadosSeguindo', 'dadosPage'
        $page_current = 'auth';
        $conta_logada = $this->defaultDate();

      $post=  DB::table('posts')->get();
      $page= DB::table('pages')->get();
      $a=0;

      $dados = array();
      foreach ($post as $key) {

        $aux = DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$page[$key->page_id - 1]->page_id, 2 ]);

        //dd($aux);
        $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
        if (sizeof($aux1) > 0 && sizeof($aux) > 0) {
            $seguidor = DB::select('select * from seguidors where (identificador_id_seguida, identificador_id_seguindo) = (?, ?)', [$aux[0]->identificador_id, $aux1[0]->identificador_id]);
        } else {
            $seguidor = array();
        }

        $likes = DB::select('select * from post_reactions where post_id = ?', [$key->post_id]);
        $like_verify = DB::select('select * from post_reactions where identificador_id = ?', [$aux1[0]->identificador_id]);
        $liked = sizeof($like_verify) > 0 ? true : false;

        //dd($likes);
        $comment = DB::select('select * from comments where post_id = ?', [$key->post_id]);
        $guardado= DB::select('select * from saveds where (post_id,conta_id) = (?, ?)', [$key->post_id,  $account_name[0]->conta_id]);

        if (sizeof($aux1) > 0) {
            $ja_reagiu = DB::select('select * from post_reactions where (post_id, identificador_id) = (?, ?)', [$key->post_id, $aux1[0]->identificador_id]);
//            $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$comment[$key->post_id-1]->comment_id, $aux1[0]->identificador_id]);
        } else {
            $ja_reagiu = array();
        }
        $dados[$a]['nome_pag'] = $page[$key->page_id - 1]->nome;
        $dados[$a]['post']=$key->descricao;
        $dados[$a]['qtd_likes']= sizeof($likes);
        $dados[$a]['qtd_comment']=sizeof($comment);
        $dados[$a]['seguir_S/N']=sizeof($seguidor);
        $dados[$a]['post_id']=$key->post_id;
        $dados[$a]['page_id']= $key->page_id ;
        $dados[$a]['page_uuid']= $page[$key->page_id - 1]->uuid ;
        $dados[$a]['post_uuid']= $key->uuid;
        $dados[$a]['reagir_S/N']=sizeof($ja_reagiu);
//        $dados[$a]['comment_S/N']=sizeof($ja_reagiu1);
        $dados[$a]['guardado?']=sizeof($guardado);
        $dados[$a]['formato']=$key->formato_id;
        $dados[$a]['estado_post']=$key->estado_post_id;
        $dados[$a]['foto_page']=$page[$key->page_id - 1]->foto;
        if($dados[$a]['formato']==1 || $dados[$a]['formato']== 2){
        $dados[$a]['file']=$key->file;
        }
        if ($account_name[0]->conta_id == $page[$key->page_id - 1]->conta_id_a  || $account_name[0]->conta_id == $page[$key->page_id - 1]->conta_id_b ) {
          $dados[$a]['dono_da_pag?']=1;
        }else {
          $dados[$a]['dono_da_pag?']=0;
        }
        $dados[$a]['qtd_comment_reaction']=0;
        for ($j=1; $j <= sizeof($comment) ; $j++) {
            $reaction_comment = DB::select('select * from reactions_comments where comment_id = ?', [$j]);
        if (sizeof($reaction_comment)>= $dados[$a]['qtd_comment_reaction']) {
          $dados[$a]['qtd_comment_reaction']=sizeof($reaction_comment);
          $dados[$a]['comment']=$comment[$j - 1]->comment;
          $dados[$a]['comment_id']=$comment[$j - 1]->comment_id;
          $dados[$a]['comment_uuid']=$comment[$j - 1]->uuid;
          $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
          if (sizeof($aux1) > 0) {
            $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$comment[$j - 1]->comment_id, $aux1[0]->identificador_id]);
          } else {
              $ja_reagiu1 = array();
          }
           $dados[$a]['comment_S/N']=sizeof($ja_reagiu1);

          $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$comment[$j-1]->identificador_id ]);
          if ($aux2[0]->tipo_identificador_id == 1) {
            $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
            $dados[$a]['nome_comment']=$conta[0]->nome;
            $dados[$a]['nome_comment'].=" ";
            $dados[$a]['nome_comment'].=$conta[0]->apelido;
            $dados[$a]['foto_conta']=$conta[0]->foto;
            $dados[$a]['foto_ver']=1;
          }elseif ($aux2[0]->tipo_identificador_id == 2) {
            $dados[$a]['nome_comment']=$page[$aux2[0]->id - 1]->nome;
            $dados[$a]['foto_conta']=$page[$aux2[0]->id - 1]->foto;
            $dados[$a]['foto_ver']=2;
          }
        }
      }
        $a++;
      }
      //--------------------------------------------------------------------------------------------o que estão falando --------------------------------------------------------------
      $melhores=array();
      $what_are_talking = array();

      for ($i=0; $i <sizeof($post) ; $i++) {
        $a=0;

        foreach ($post as $key) {
          $likes = DB::select('select * from post_reactions where post_id = ?', [$key->post_id]);
          $comment = DB::select('select * from comments where post_id = ?', [$key->post_id]);
          $soma= sizeof($likes) + sizeof($comment);
          $b=0;

            for ($j=0; $j <sizeof($melhores); $j++) {
              if ($key->post_id == $melhores[$j] ){
                $b=1;
              }
            }
            if ($soma >= $a && $b!=1 && $key->estado_post_id == 1) {
              $melhores[$i]= $key->post_id;
              $page= DB::table('pages')->get();
                $aux = DB::select('select * from identificadors where (id, tipo_identificador_id) = (?, ?)', [$page[$key->page_id - 1]->page_id, 2 ]);
                $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
                if (sizeof($aux1) > 0 && sizeof($aux) > 0) {
                    $seguidor = DB::select('select * from seguidors where (identificador_id_seguida, identificador_id_seguindo) = (?, ?)', [$aux[0]->identificador_id, $aux1[0]->identificador_id]);
                } else {
                    $seguidor = array();
                }
                $guardado= DB::select('select * from saveds where (post_id,conta_id) = (?, ?)', [$key->post_id,  $account_name[0]->conta_id]);
                if (sizeof($aux1) > 0) {
                    $ja_reagiu = DB::select('select * from post_reactions where (post_id, identificador_id) = (?, ?)', [$key->post_id, $aux1[0]->identificador_id]);
                } else {
                    $ja_reagiu = array();
                }
                //$what_are_talking[$i]['nome_pag'] = $page[$key->page_id - 1]->nome;
                $what_are_talking[$i]['post']=$key->descricao;
                //$what_are_talking[$i]['qtd_likes']= sizeof($likes);
              //  $what_are_talking[$i]['qtd_comment']=sizeof($comment);
              //  $what_are_talking[$i]['seguir_S/N']=sizeof($seguidor);
                $what_are_talking[$i]['post_id']=$key->post_id;
                $what_are_talking[$i]['page_id']= $key->page_id ;
                $what_are_talking[$i]['page_uuid']= $page[$key->page_id - 1]->uuid ;
                $what_are_talking[$i]['post_uuid']= $key->uuid;
                //$what_are_talking[$i]['reagir_S/N']=sizeof($ja_reagiu);
                //$what_are_talking[$i]['guardado?']=sizeof($guardado);
                $what_are_talking[$i]['formato']=$key->formato_id;
                $what_are_talking[$i]['estado_post']=$key->estado_post_id;
                $what_are_talking[$i]['foto_page']=$page[$key->page_id - 1]->foto;
                if($what_are_talking[$i]['formato']==1 || $what_are_talking[$i]['formato']== 2){
                $what_are_talking[$i]['file']=$key->file;
                }
                /*if ($account_name[0]->conta_id == $page[$key->page_id - 1]->conta_id_a  || $account_name[0]->conta_id == $page[$key->page_id - 1]->conta_id_b ) {
                  $what_are_talking[$i]['dono_da_pag?']=1;
                }else {
                  $what_are_talking[$i]['dono_da_pag?']=0;
                }*/
                //$what_are_talking[$i]['qtd_comment_reaction']=0;
                /*for ($k=1; $k <= sizeof($comment) ; $k++) {
                    $reaction_comment = DB::select('select * from reactions_comments where comment_id = ?', [$k]);
                if (sizeof($reaction_comment)>= $dados[$i]['qtd_comment_reaction']) {
                  $what_are_talking[$i]['qtd_comment_reaction']=sizeof($reaction_comment);
                  $what_are_talking[$i]['comment']=$comment[$k - 1]->comment;
                  $what_are_talking[$i]['comment_id']=$comment[$k - 1]->comment_id;

                  $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$comment[$k-1]->identificador_id ]);
                  if ($aux2[0]->tipo_identificador_id == 1) {
                    $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
                    $what_are_talking[$i]['nome_comment']=$conta[0]->nome;
                    $what_are_talking[$i]['nome_comment'].=" ";
                    $what_are_talking[$i]['nome_comment'].=$conta[0]->apelido;
                    $what_are_talking[$i]['foto_conta']=$conta[0]->foto;
                  }elseif ($aux2[0]->tipo_identificador_id == 2) {
                    $what_are_talking[$i]['nome_comment']=$page[$aux2[0]->id - 1]->nome;
                    $what_are_talking[$i]['foto_conta']=$conta[0]->foto;
                  }
                }
              }*/

              $a=$soma;
            }
          }



      }
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
        return view('feed.index', compact('account_name','notificacoes','what_are_talking', 'dados', 'conta_logada', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage'));

    }
    return redirect()->route('account.login.form');
    }


  public function tipos(){

    $tipos=DB::table('tipo_relacionamentos')->get();
    return response()->json($tipos);
  }
    public function post_index($id){
        $account_name = $this->defaultDate();
        $conta_logada = $this->defaultDate();
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


      $page_content = $this->casalPage->page_default_date($account_name);
      $checkUserStatus = Self::isCasal(Auth::user()->conta_id);
      $profile_picture = Self::profile_picture(Auth::user()->conta_id);
      $isUserHost = Self::isUserHost($account_name[0]->conta_id);
      $hasUserManyPages = Self::hasUserManyPages(Auth::user()->conta_id);
      $allUserPages = Self::allUserPages(new AuthController, Auth::user()->conta_id);
      $page_current = 'auth';
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
        $comment = DB::select('select * from comments where post_id = ?', [$post[0]->post_id]);
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
        $dados[0]['seguir_S/N']=sizeof($seguidor);
        $dados[0]['post_id']=$post[0]->post_id;
        $dados[0]['post_uuid']= $post[0]->uuid;
        $dados[0]['page_id']= $post[0]->page_id ;
        $dados[0]['page_uuid']= $page[$post[0]->page_id - 1]->uuid ;
        $dados[0]['reagir_S/N']=sizeof($ja_reagiu);
//        $dados[0]['comment_S/N']=sizeof($ja_reagiu1);
        $dados[0]['guardado?']=sizeof($guardado);
        $dados[0]['formato']=$post[0]->formato_id;
        $dados[0]['estado_post']=$post[0]->estado_post_id;
        if($dados[0]['formato']==1 || $dados[0]['formato']== 2){
        $dados[0]['file']=$post[0]->file;
        }
        if ($account_name[0]->conta_id == $page[$post[0]->page_id - 1]->conta_id_a  || $account_name[0]->conta_id == $page[$post[0]->page_id - 1]->conta_id_b ) {
          $dados[0]['dono_da_pag?']=1;
        }else {
          $dados[0]['dono_da_pag?']=0;
        }
        $a=0;
        foreach ($comment as $key) {
          $aux2 = DB::select('select * from identificadors where identificador_id = ?', [$key->identificador_id ]);
          $dados[$a]['comment_id']=$key->comment_id;
          $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta_logada[0]->conta_id, 1 ]);
          if (sizeof($aux1) > 0) {
            $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$key->comment_id, $aux1[0]->identificador_id]);
          } else {
              $ja_reagiu1 = array();
          }
           $dados[$a]['comment_S/N']=sizeof($ja_reagiu1);

          if ($aux2[0]->tipo_identificador_id == 1) {
            $conta = DB::select('select * from contas where conta_id = ?', [$aux2[0]->id]);
            $dados[$a]['nome_comment']=$conta[0]->nome;
            $dados[$a]['nome_comment'].=" ";
            $dados[$a]['nome_comment'].=$conta[0]->apelido;
            $dados[$a]['foto_conta']=$conta[0]->foto;
            $dados[$a]['foto_ver']=1;
          }elseif ($aux2[0]->tipo_identificador_id == 2) {
            $dados[$a]['nome_comment']=$page[$aux2[0]->id - 1]->nome;
            $dados[$a]['foto_conta']=$page[$aux2[0]->id - 1]->foto;
            $dados[$a]['foto_ver']=2;
          }
          $a++;
        }
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
//-------------------------------------------------------------------------------------------------------------------------------------------
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




      return view('pagina.comment', compact('account_name','notificacoes', 'dados','comment', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages', 'page_content', 'page_current', 'dadosSeguida', 'dadosSeguindo', 'dadosPage', 'conta_logada'));

    }



    public function like(Request $request){
            $post=DB::select('select * from posts where uuid = ?', [$request->id]);
            $page= DB::select('select * from pages where page_id = ?', [$post[0]->page_id]);
            $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
            $aux3= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
            $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
            $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
            $likes_verificacao = DB::select('select * from post_reactions where (post_id,identificador_id) = (?, ?)', [$post[0]->post_id, $aux[0]->identificador_id]);
            $resposta = 0;
            if (sizeof($likes_verificacao) == 0) {
              DB::table('post_reactions')->insert([
                'reaction_id' => 1,
                'identificador_id' => $aux[0]->identificador_id,
                'post_id' => $post[0]->post_id,
              ]);
              if ($page[0]->conta_id_a != $conta[0]->conta_id) {
              DB::table('notifications')->insert([
                    'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'id_state_notification' => 2,
                    'id_action_notification' => 1,
                    'identificador_id_causador'=> $aux[0]->identificador_id,
                    'identificador_id_destino'=> $aux2[0]->identificador_id,
                    ]);
                    }
                    if ($page[0]->conta_id_b != $conta[0]->conta_id) {
                  DB::table('notifications')->insert([
                          'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                          'id_state_notification' => 2,
                          'id_action_notification' => 1,
                          'identificador_id_causador'=> $aux[0]->identificador_id,
                          'identificador_id_destino'=> $aux3[0]->identificador_id,
                          ]);
                        }

              $resposta= 1;

            } elseif (sizeof($likes_verificacao) == 1){
              DB::table('post_reactions')->where(['post_id'=>$post[0]->post_id])->delete();
              $resposta= 2;
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
                  $comment_reac_v = DB::select('select * from reactions_comments where (comment_id,identificador_id) = (?, ?)', [$request->id, $aux[0]->identificador_id]);
                  $resposta = 0;
                  if (sizeof($comment_reac_v) == 0) {
                    DB::table('reactions_comments')->insert([
                      'comment_id' => $request->id,
                      'reaction_id' => 1,
                      'identificador_id' => $aux[0]->identificador_id,
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
                    DB::table('reactions_comments')->where(['comment_id'=>$request->id])->delete();
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
              ]);
              if ($page[0]->conta_id_a != $conta[0]->conta_id) {
            DB::table('notifications')->insert([
                  'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                  'id_state_notification' => 2,
                  'id_action_notification' => 5,
                  'identificador_id_causador'=> $aux1[0]->identificador_id,
                  'identificador_id_destino'=> $aux2[0]->identificador_id,
                  ]);
                }
              if ($page[0]->conta_id_b != $conta[0]->conta_id) {
                DB::table('notifications')->insert([
                        'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                        'id_state_notification' => 2,
                        'id_action_notification' => 5,
                        'identificador_id_causador'=> $aux1[0]->identificador_id,
                        'identificador_id_destino'=> $aux3[0]->identificador_id,
                        ]);
                      }

                    }
              $resposta=1;


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
                      ]);

                      $resposta=1;


                        return response()->json($resposta);
                }

                public function ocultar_post(Request $request){

                      DB::table('posts')
                            ->where('post_id', $request->id)
                            ->update([
                              'estado_post_id' => 2,
                          ]);

                          $resposta=1;


                            return response()->json($resposta);
                    }

    public function comentar(Request $request){
      $post= DB::select('select * from posts where post_id = ?', [$request->id]);
      $page= DB::select('select * from pages where page_id = ?', [$post[0]->page_id]);
      $aux2= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_a, 1 ]);
      $aux3= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$page[0]->conta_id_b, 1 ]);
      $conta = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
      $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$conta[0]->conta_id, 1 ]);
      $resposta=array();

            if ($page[0]->conta_id_a == $conta[0]->conta_id || $page[0]->conta_id_b == $conta[0]->conta_id) {
              $aux= DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$post[0]->page_id, 2 ]);
              DB::table('comments')->insert([
                'post_id' => $request->id,
                'identificador_id' => $aux[0]->identificador_id,
                'tipo_estado_comment_id'=>1,
                'comment'=>$request->comment,
                ]);

                $variable=  DB::table('comments')->get();
                foreach ($variable as $key) {
                  $resposta[0]['post_id']=$key->post_id;
                    $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$key->comment_id, $aux[0]->identificador_id]);
                   $resposta[0]['comment_S/N']=sizeof($ja_reagiu1);
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

              } else {
                DB::table('comments')->insert([
                'post_id' => $request->id,
                'identificador_id' => $aux[0]->identificador_id,
                'tipo_estado_comment_id'=>1,
                'comment'=>$request->comment,
                ]);
                  DB::table('notifications')->insert([
                      'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                      'id_state_notification' => 2,
                      'id_action_notification' => 2,
                      'identificador_id_causador'=> $aux[0]->identificador_id,
                      'identificador_id_destino'=> $aux2[0]->identificador_id,
                      ]);
                    DB::table('notifications')->insert([
                            'uuid' => $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString(),
                            'id_state_notification' => 2,
                            'id_action_notification' => 2,
                            'identificador_id_causador'=> $aux[0]->identificador_id,
                            'identificador_id_destino'=> $aux3[0]->identificador_id,
                            ]);

                $variable=  DB::table('comments')->get();
                foreach ($variable as $key) {
                  $resposta[0]['post_id']=$key->post_id;
                    $ja_reagiu1 = DB::select('select * from  reactions_comments where (comment_id , identificador_id) = (?, ?)', [$key->comment_id, $aux[0]->identificador_id]);
                   $resposta[0]['comment_S/N']=sizeof($ja_reagiu1);
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
              }


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
    public function seeAllNotifications(){
        $account_name = $this->defaultDate();
        $profile_picture = Self::profile_picture(Auth::user()->conta_id);
        $checkUserStatus = Self::isCasal(Auth::user()->conta_id);
        $profile_picture = Self::profile_picture(Auth::user()->conta_id);
        $isUserHost = Self::isUserHost($account_name[0]->conta_id);
        $hasUserManyPages = Self::hasUserManyPages(Auth::user()->conta_id);
        $allUserPages = Self::allUserPages(new AuthController, Auth::user()->conta_id);
        $page_content = $this->casalPage->page_default_date($account_name);
        $page_current = 'auth';
        $conta_logada = $this->defaultDate();

        //----------------------------------------------------------------
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
        //-------------------------------------------------------------------------------------------------------------------------------------------
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

        return view('notificacoes.index', compact('profile_picture','notificacoes', 'account_name', 'checkUserStatus', 'isUserHost', 'allUserPages', 'hasUserManyPages', 'page_current', 'page_content', 'conta_logada', 'dadosSeguida', 'dadosSeguindo', 'dadosPage'));
    }

    public function sendtoOtherForm(Request $request){

        $nome = $request->nome;
        $apelido = $request->apelido;
        $sexo = $request->sexo;
        $data = $request->dat;
        $page_current = 'auth';

        //dd($nome."=>".$apelido."=>".$sexo."=>".$data);

        return view('auth.registerUserLastInfo',compact('nome','apelido','sexo','data', 'page_current'));

    }
    public function joinAndSave(Request $request){


        $saveRetriveId = DB::table('contas')->insertGetId([
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
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
        DB::table('identificadors')->insertGetId([
             'tipo_identificador_id' => 1,
             'id' => $saveRetriveId,
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

    public static function isCasal($account_id)
    {
        //dd($account_id);
        $auth = new AuthController();
            $conta_logada = $auth->defaultDate();

        return count(DB::table('pages')
                ->where('conta_id_a', $conta_logada[0]->conta_id)
                ->orwhere('conta_id_b', $conta_logada[0]->conta_id)
                ->orwhere('tipo_page_id', 1)
                ->get()) > 0;
        //return DB::select('select page_id from pages where conta_id_a = ? or conta_id_b = ? and tipo_page_id = ?', [$account_id, $account_id, 1]);
    }

    public static function profile_picture($account_id)
    {
        return DB::select('select foto from contas where conta_id = ?', [$account_id])[0]->foto;
    }

/*  public static function post_files($post_id)
  {
      return DB::select('select files from posts where post_id = ?', [$post_id])[0]->files;
  }*/

    public static function updateUserProfilePicture($picture, $account_id)
    {
        DB::table('contas')->where('conta_id', $account_id)->update(['foto' => $picture]);
        return redirect()->route('account.profile');
    }

    public static function updatePageProfilePicture($picture, $uuid)
    {
        DB::table('pages')->where('uuid', $uuid)->update(['foto' => $picture]);
        return back();
    }


    public static function isUserHost($account_id)
    {

        return count(DB::table('pages')
                    ->where('conta_id_a', $account_id)
                    ->orwhere('conta_id_b', $account_id)
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

}

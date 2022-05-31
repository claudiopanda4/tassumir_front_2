<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageDefinition extends Controller
{
    public function index(){

      try{

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
          $paginasSeguidas = $dates['paginasSeguidas'];
          $paginasNaoSeguidas = $dates['paginasNaoSeguidas'];
          $dadosSeguida = $dates['dadosSeguida'];
          $page_current = 'relationship_request';

            return view('pagina.page_definition',compact('account_name','checkUserStatus','profile_picture','isUserHost','hasUserManyPages','allUserPages','conta_logada','page_content','notificacoes','notificacoes_count','paginasSeguidas','paginasNaoSeguidas','dadosSeguida','page_current'));

      }catch(\Exception $e){

                $function_name = "index";
                $controller_name = "PageDefinition";
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


}

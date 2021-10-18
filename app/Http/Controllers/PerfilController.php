<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = new AuthController();
        $account_name = $auth->defaultDate();

        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);

        $conta_logada = $auth->defaultDate();

        //-------------------------------------------------------------------------
          $tipos_de_relacionamento=DB::table('tipo_relacionamentos')->get();
          $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
          $lenght = sizeof($aux1);
          //dd($lenght);
          if ($lenght > 0) {
              $seguidor = DB::select('select * from seguidors where identificador_id_seguindo = ?', [ $aux1[0]->identificador_id]);
                $perfil[0]['qtd_ps']=sizeof($seguidor);

                return view('perfil.index', compact('account_name', 'perfil', 'checkUserStatus', 'profile_picture','conta_logada','tipos_de_relacionamento'));


          } else {
            $perfil[0]['qtd_ps'] = 0;
          }

          //dd($account_name);

          return view('perfil.index', compact('account_name', 'perfil', 'checkUserStatus', 'profile_picture','conta_logada','tipos_de_relacionamento'));


    }

    public function perfil_das_contas($id)
    {
        $auth = new AuthController();
         $conta_logada = $auth->defaultDate();
        //-------------------------------------------------------------------------
          $tipos_de_relacionamento=DB::table('tipo_relacionamentos')->get();
          $account_name=DB::select('select * from contas where uuid  = ?', [$id]);
          $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
          $lenght = sizeof($aux1);
          //dd($lenght);
          if ($lenght > 0) {
              $seguidor = DB::select('select * from seguidors where identificador_id_seguindo = ?', [ $aux1[0]->identificador_id]);
                $perfil[0]['qtd_ps']=sizeof($seguidor);
          } else {
            $perfil[0]['qtd_ps'] = 0;
          }

          //dd($account_name);
          return view('perfil.index', compact('account_name', 'perfil','conta_logada', 'tipos_de_relacionamento'));

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
    public function edit($perfil)
    {
        $account_name = DB::select('select * from contas where uuid = ?', [$perfil]);
        return view('perfil.edit', compact('account_name'));
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
      $auth = new AuthController();
      $account_name = $auth->defaultDate();
      //dd($request->genre);
      DB::table('contas')
            ->where('conta_id', $account_name[0]->conta_id)
            ->update([
              'nome' => $request->nome,
              'apelido' => $request->apelido,
              'genero' => $request->genre,
              'descricao' => $request->bio,
              'email' => $request->email,
              'telefone' => $request->telefone

          ]);
          return redirect()->route('account.profile');
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

    public function Pedido_relac(Request $request)
    {
      $verificacaop=array();
      $conta_pedinte = Auth::user()->conta_id;
      $conta_pedida = DB::select('select * from contas where uuid = ?', [$request->conta_pedida]);
      if (sizeof($conta_pedida) == 0  ) {
          $verificacaop[0]=1;
      }else {
      $verificacaop= DB::select('select * from pedido_relacionamentos where (conta_id_pedida, conta_id_pedinte) = (?, ?)', [$conta_pedida[0]->conta_id, $conta_pedinte]);
      }


      if ( sizeof($verificacaop) == 0) {

      DB::table('pedido_relacionamentos')->insert([

          'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
          'conta_id_pedida' => $conta_pedida[0]->conta_id,
          'conta_id_pedinte' =>  $conta_pedinte,
          'estado_pedido_relac' => 1,
          'name_page' => $request->name_page,
          'tipo_relacionamento_id' => 1,

      ]);

    }
      return redirect()->route('account1.profile', $request->conta_pedida);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        //-------------------------------------------------------------------------
          $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
          $lenght = sizeof($aux1);
          //dd($lenght);
          if ($lenght > 0) {
              $seguidor = DB::select('select * from seguidors where identificador_id_seguindo = ?', [ $aux1[0]->identificador_id]);
                $perfil[0]['qtd_ps']=sizeof($seguidor);
                return view('perfil.index', compact('account_name', 'perfil'));
          } else {
            $perfil[0]['qtd_ps'] = 0;
          }

          //dd($account_name);
          return view('perfil.index', compact('account_name', 'perfil'));
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
        $auth = new AuthController();
        $account_name = $auth->defaultDate();
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
}

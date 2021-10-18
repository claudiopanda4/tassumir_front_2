<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaginaCasalController;

class PerfilController extends Controller
{
    private $auth;

    public function __construct()
    {
        $this->auth = new AuthController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = new AuthController();
        $account_name = $this->auth->defaultDate();

        $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);

        $conta_logada = $auth->defaultDate();

        $this->active_account_id = $account_name[0]->conta_id;

        //-------------------------------------------------------------------------
          $tipos_de_relacionamento=DB::table('tipo_relacionamentos')->get();
          $aux1 = DB::select('select * from identificadors where (id,tipo_identificador_id) = (?, ?)', [$account_name[0]->conta_id, 1 ]);
          $lenght = sizeof($aux1);
          //dd($lenght);
          if ($lenght > 0) {
              $seguidor = DB::select('select * from seguidors where identificador_id_seguindo = ?', [ $aux1[0]->identificador_id]);
                $perfil[0]['qtd_ps']=sizeof($seguidor);

                return view('perfil.index', compact('account_name', 'perfil', 'checkUserStatus', 'profile_picture', 'conta_logada', 'tipos_de_relacionamento', 'isUserHost'));


          } else {
            $perfil[0]['qtd_ps'] = 0;
          }

          //dd($account_name);
          return view('perfil.index', compact('account_name', 'perfil', 'checkUserStatus', 'profile_picture', 'conta_logada', 'tipos_de_relacionamento', 'isUserHost'));

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
          $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
          $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
          $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);

          //dd($account_name);
          return view('perfil.index', compact('account_name', 'perfil','conta_logada', 'tipos_de_relacionamento', 'checkUserStatus', 'profile_picture', 'isUserHost'));

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
      $conta_pedida=array();
      $verificacao_page_conta_pedida_b=array();
      $verificacao_page_conta_pedida_a=array();
      $verificacao_pedido=array();
      $conta_pedinte = Auth::user()->conta_id;
      $conta_pedida = DB::select('select * from contas where uuid = ?', [$request->conta_pedida]);
      $verificacao_page_conta_pedinte_a=DB::select('select * from pages where conta_id_a = ?', [$conta_pedinte]);
      $verificacao_page_conta_pedinte_b=DB::select('select * from pages where conta_id_b = ?', [$conta_pedinte]);

      if (sizeof($conta_pedida) == 0  ) {
          $verificacao_pedido[0]=1;
          $verificacao_page_conta_pedida_b[0]=1;
          $verificacao_page_conta_pedida_a[0]=1;
      }else {
      $verificacao_pedido= DB::select('select * from pedido_relacionamentos where (conta_id_pedida, conta_id_pedinte) = (?, ?)', [$conta_pedida[0]->conta_id, $conta_pedinte]);
      $verificacao_page_conta_pedida_b=DB::select('select * from pages where conta_id_b  = ?', [$conta_pedida[0]->conta_id]);
      $verificacao_page_conta_pedida_a=DB::select('select * from pages where conta_id_a  = ?', [$conta_pedida[0]->conta_id]);

      }


      if ( sizeof($verificacao_pedido) == 0 && sizeof($verificacao_page_conta_pedinte_a) == 0 && sizeof($verificacao_page_conta_pedinte_b) == 0 && sizeof($verificacao_page_conta_pedida_b) == 0 && sizeof($verificacao_page_conta_pedida_a) == 0 ) {

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


    public function add_picture(Request $request)
    {

        $file_name = time() . '_' . md5($request->file('profilePicture')->getClientOriginalName()) . '.' . $request->profilePicture->extension();

        if ($request->hasFile('profilePicture'))
        {

            if (PaginaCasalController::check_image_extension($request->profilePicture->extension()))
            {
                $request->file('profilePicture')->storeAs('public/img/users', $file_name);
                AuthController::updateUserProfilePicture($file_name, $this->auth->defaultDate()[0]->conta_id);
            }

        }

        return redirect()->route('account.profile');
    }





}

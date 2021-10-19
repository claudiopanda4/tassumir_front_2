<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaCasalController extends Controller
{

    private $current_page_id = 1;


    public function index(){
        $auth = new AuthController();
        //===================================================================================
        $account_name = $auth->defaultDate();
        //===================================================================================
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        //===================================================================================
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
        //===================================================================================
        $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
        //===================================================================================
        $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
        //===================================================================================
        $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
        //===================================================================================
        $page_content = $this->page_default_date($account_name);
        //===================================================================================
        $seguidores = Self::seguidores($page_content[0]->page_id);
        //===================================================================================
        $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
        //===================================================================================
        $publicacoes = $this->get_all_post($page_content[0]->page_id);
        //===================================================================================
        $this->current_page_id = $page_content[0]->page_id;
        //===================================================================================
        //dd($page_content);
        return view('pagina.couple_page', compact('account_name', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages'));
    }

    //======================================================

    public function show_page()
    {

        $auth = new AuthController();
        //===================================================================================
        $account_name = $auth->defaultDate();
        //===================================================================================
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        //===================================================================================
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
        //===================================================================================
        $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
        //===================================================================================
        $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
        //===================================================================================
        $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
        //===================================================================================
        $page_content = $this->page_default_date($account_name);
        //===================================================================================
        $seguidores = Self::seguidores($page_content[0]->page_id);
        //===================================================================================
        $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
        //===================================================================================
        $publicacoes = $this->get_all_post($page_content[0]->page_id);
        //===================================================================================
        $this->current_page_id = $page_content[0]->page_id;
        //===================================================================================
        //dd($page_content);
        return view('pagina.couple_page', compact('account_name', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages'));
    }

    //======================================================

    public function my_pages(){
        $auth = new AuthController();
        //===================================================================================
        $account_name = $auth->defaultDate();
        //===================================================================================
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        //===================================================================================
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
        //===================================================================================
        $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
        //===================================================================================
        $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
        //===================================================================================
        $page_content = $this->page_default_date($account_name);
        //===================================================================================
        $seguidores = Self::seguidores($page_content[0]->page_id);
        //===================================================================================
        $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
        //===================================================================================
        $publicacoes = $this->get_all_post($page_content[0]->page_id);
        //===================================================================================
        $this->current_page_id = $page_content[0]->page_id;
        //===================================================================================
        //dd($page_content);
        return view('pagina.pages', compact('account_name', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'hasUserManyPages', 'allUserPages'));
    }

    public function page_default_date ($account_name) {

        $page_content = DB::select('select * from pages where conta_id_a = ? or conta_id_b = ?', [
            $account_name[0]->conta_id,
            $account_name[0]->conta_id
        ]);

        return $page_content;
    }

    public function paginas($id){
      $auth = new AuthController();
      //===================================================================================
      $account_name = $auth->defaultDate();
      //===================================================================================
      $page_content = $this->page_default_date($account_name);
      //===================================================================================
      $page_content = DB::select('select * from pages where uuid = ?', [
            $id
        ]);
      //===================================================================================
      $seguidores = Self::seguidores($page_content[0]->page_id);
      //===================================================================================
      $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
      //===================================================================================
      $publicacoes = $this->get_all_post($page_content[0]->page_id);
      //===================================================================================
      $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
      //===================================================================================
      $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
      //===================================================================================
      $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
      //===================================================================================
      $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
      //===================================================================================
      $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
      //===================================================================================

      return view('pagina.couple_page', compact('account_name', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages'));
    }


    public function edit_couple(){
        $auth = new AuthController();
        //===================================================================================
        $account_name = $auth->defaultDate();
        //===================================================================================
        $isUserHost = AuthController::isUserHost($account_name[0]->conta_id);
        //===================================================================================
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        //===================================================================================
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
        //===================================================================================
        $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
        //===================================================================================
        $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
        //===================================================================================
        return view('pagina.edit_couple', compact('account_name', 'checkUserStatus', 'profile_picture', 'isUserHost', 'hasUserManyPages', 'allUserPages'));
    }


    public function delete_couple_page(){
        $auth = new AuthController();
        //===================================================================================
        $account_name = $auth->defaultDate();
        //===================================================================================
        $checkUserStatus = AuthController::isCasal($account_name[0]->conta_id);
        //===================================================================================
        $profile_picture = AuthController::profile_picture($account_name[0]->conta_id);
        //===================================================================================
        $hasUserManyPages = AuthController::hasUserManyPages($account_name[0]->conta_id);
        //===================================================================================
        $allUserPages = AuthController::allUserPages(new AuthController, $account_name[0]->conta_id);
        //===================================================================================

        return view('pagina.delete_couple_page', compact('account_name', 'checkUserStatus', 'profile_picture', 'hasUserManyPages', 'allUserPages'));
    }

    /*
    ------------------------------------
            siene codificando
    ------------------------------------
    */

    private function type_of_relac($id) {
        return DB::select('select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = ?', [$id])[0]->tipo_relacionamento;
    }
    public static function seguidores($id) {

        return count(DB::select('select * from seguidors where uuid = ?', [$id]));
    }

    private function get_all_post($id) {
        return count(DB::select('select * from posts where page_id = ?', [$id]));
    }

    /**
     * @param
     */
    public function store_post(Request $request)
    {
        if ($request->hasFile('imgOrVideo'))
        {
            $file_name = time() . '_' . md5($request->file('imgOrVideo')->getClientOriginalName()) . '.' . $request->imgOrVideo->extension();

            $path = '';

            if ( Self::check_image_extension($request->imgOrVideo->extension()) )
            {
                $path = $request->file('imgOrVideo')->storeAs('public/img/page', $file_name);
                $this->store($request->message, $file_name, $this->current_page_id, $this->formato_id('Imagem'));

            } else if ( $this->check_video_extension($request->imgOrVideo->extension()) ) {

                $path = $request->file('imgOrVideo')->storeAs('public/video/page', $file_name);
                $this->store($request->message, $file_name, $this->current_page_id, $this->formato_id('Video'));
            }

            return redirect()->route('couple.page');
        }

        $this->store($request->message, null, $this->current_page_id, $this->formato_id('Textos'));
        return redirect()->route('couple.page');
    }
    private function store($description, $file_name = null, $id, $format)
    {

        $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
        //dd($uuid);
        DB::insert('insert into posts(uuid, descricao, file, page_id, formato_id, estado_post_id) values(?, ?, ?, ?, ?, ?)',
            [$uuid, $description, $file_name, $id, $format, 1]);
    }

    public static function check_image_extension( $extension )
    {
        return $extension === 'jpg' || $extension === 'jpeg' || $extension === 'png';
    }

    public function check_video_extension( $extension )
    {
        return $extension === 'mp4' || $extension === 'avi' || $extension === 'mkv';
    }

    private function formato_id( $formato ) {
        return DB::select('select formato_id from formatos where formato = ?', [$formato])[0]->formato_id;
    }


}

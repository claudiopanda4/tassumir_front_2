<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaCasalController extends Controller
{
 
    private $current_page_id = 1;

    public function index(){
        $auth = new AuthController();
        $account_name = $auth->defaultDate();

        $page_content = DB::select('select * from pages where conta_id_a = ? or conta_id_b = ?', [
            $account_name[0]->conta_id, 
            $account_name[0]->conta_id
        ]);
         
        $seguidores = $this->seguidores($page_content[0]->nome, $page_content[0]->page_id);
        $tipo_relac = $this->type_of_relac($page_content[0]->page_id);
        $publicacoes = $this->get_all_post($page_content[0]->page_id);
        $this->current_page_id = $page_content[0]->page_id; 
    
        return view('pagina.couple_page', compact('account_name', 'page_content', 'tipo_relac', 'seguidores', 'publicacoes'));
    }

    public function edit_couple(){
        $auth = new AuthController();
        $account_name = $auth->defaultDate();
        return view('pagina.edit_couple', compact('account_name'));
    }


    public function delete_couple_page(){
        $auth = new AuthController();
        $account_name = $auth->defaultDate();
        return view('pagina.delete_couple_page', compact('account_name'));
    }

    /*
    ------------------------------------
            siene codificando
    ------------------------------------
    */

    private function type_of_relac($id) {
        return DB::select('select tipo_relacionamento from tipo_relacionamentos where tipo_relacionamento_id = ?', [$id])[0]->tipo_relacionamento;
    }
    private function seguidores($check_name, $id) {
        /*$seguidores = DB::select('select identificador_id_seguida from seguidors');
        foreach ($seguidores as $segue) {
            $page_name = DB::select('select nome from pages where page_id = ?',[
                DB::select('select id from identificadors where identificador_id = ? and tipo_identificador_id = ?', [$segue->identificador_id_seguida, 2])[0]->id
            ])[0]->nome;
            
            if ($page_name === $check_name) {
                return $this->getAllSeguidores($segue->identificador_id_seguida);
            }
        }
        return 0;
        */
        return count(DB::select('select * from seguidors where identificador_id_seguida = ?', [$id]));
        
    }

    private function get_all_post($id) {
        return count(DB::select('select * from posts where page_id = ?', [$id]));
    }

    /*private function getAllSeguidores($id) {
        return count(DB::select('select count(identificador_id_seguindo) from seguidors where identificador_id_seguida = ?', [$id]));
    }*/

    private $paths = [
        'post_image_path' => 'public/images/posts',
        'post_video_path' => 'public/video/posts'
    ];

    public function create_post(Request $request) {

        $post_info = $request->all();
        
        if ($request->hasFile('image')) 
        {
            
            $image_name = time() . '-' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs($this->paths['post_image_path'], $image_name);
            $post_info['image'] = $image_name;
            
            if ( $this->check_extension_type($request->image->extension(), 'image') ) 
            {
                DB::insert('insert into posts(descricao, file, page_id, formato_id) 
                            values(?, ?, ?, ?)', 
                            [
                                $post_info['post_name'], 
                                $post_info['image'], 
                                $this->current_page_id, 
                                $this->formato_id('Imagem') 
                            ]);
            }

        }

        if ($request->hasFile('video'))
        {
            $video_name = time() . '-' . $request->file('video')->getClientOriginalName();
            $path = $request->file('video')->storeAs($this->paths['post_video_path'], $video_name);
            $post_info['video'] = $video_name;

            if ( $this->check_extension_type($request->image->extension(), 'video') ) 
            {
                DB::insert('insert into posts(descricao, file, page_id, formato_id) 
                            values(?, ?, ?, ?)', 
                            [
                                $post_info['post_name'], 
                                $post_info['image'], 
                                $this->current_page_id, 
                                $this->formato_id('Video') 
                            ]);
            }

        }

        return redirect()->route('couple.page');

    }

    private function check_extension_type($extension, $file) {

        if ($file === 'image')
        {
            return  ($extension === 'jpg'  || $extension === 'JPG' || 
                     $extension === 'jpeg' || $extension === 'JPEG'|| 
                     $extension === 'png'  || $extension === 'PNG');
        }

        if ($file === 'video')
        {
            return  ($extension === 'mp4'   || $extension === 'MP4' || 
                     $extension === 'avi'   || $extension === 'AVI' || 
                     $extension === 'mkv'   || $extension === 'MKV' ||
                     $extension === 'kk'    || $extension === 'KK');
        }

    }

    private function formato_id($formato) {
        return DB::select('select formato_id from formatos where formato = ?', [$formato])[0]->formato_id;
    }

}

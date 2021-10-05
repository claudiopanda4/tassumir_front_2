<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaCasalController extends Controller
{
    

    public function index(){

        return view('pagina.couple_page');
    }
    public function edit_couple(){
        return view('pagina.edit_couple');
    }


    public function delete_couple_page(){
        return view('pagina.delete_couple_page');
    }
}

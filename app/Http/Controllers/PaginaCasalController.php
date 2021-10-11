<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaCasalController extends Controller
{
    

    public function index(){
        $auth = new AuthController();
        $account_name = $auth->defaultDate();
        return view('pagina.couple_page', compact('account_name'));
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificatioController extends Controller
{
    public function index(){

        return view('Pesquisas.allSearch');
    }
}

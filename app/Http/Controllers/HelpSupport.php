<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpSupport extends Controller
{
    public function index(){

        return view('pagina.help_support');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageDefinition extends Controller
{
    public function index(){

        return view('pagina.page_definition');
    }


}

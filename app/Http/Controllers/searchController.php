<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    public function index(){

        return view('Pesquisas.allSearch');
    }
    public function peoplesSearch(){

        return view('Pesquisas.peoples');
    }
        public function pagesSearch(){

        return view('Pesquisas.pages');
    }
       public function publicationsSearch(){

        return view('Pesquisas.publications');
    }
}

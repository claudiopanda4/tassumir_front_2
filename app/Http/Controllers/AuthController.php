<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct(){
        //$this->middleware('auth:web1');
    }
    public function index(){
        if (Auth::check() == true) {
            $account_name = $this->defaultDate();
            //dd($account_name);
            //define('USER_NOME', $account_name[0]->nome);
            //define('USER_APELIDO', $account_name[0]->apelido);

            return view('feed.index', compact('account_name'));
        } 
        return redirect()->route('account.login.form');
    }
    public function defaultDate(){
        $account_name = DB::select('select * from contas where conta_id = ?', [Auth::user()->conta_id]);
        return $account_name;
    }

    public function showLoginForm(){
        return view('auth.login_front');
    }

    public function login(Request $request){
        
        /*$credentials = $request->validate([
            'email_login' => ['required'],
            'password_login' => ['required'],
        ]);*/
        
        //dd($request);
        
        if (Auth::attempt(['email' => $request->number_email_login, 'password' => $request->password_login])) {
            $request->session()->regenerate();
            return redirect()->route('account.home');
        }
        return redirect()->route('account.login.form');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}

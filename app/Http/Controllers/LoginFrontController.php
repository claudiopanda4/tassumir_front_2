<?php

namespace App\Http\Controllers;

use App\Models\LoginFront;
use Illuminate\Http\Request;

class LoginFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
     * @param  \App\Models\LoginFront  $loginFront
     * @return \Illuminate\Http\Response
     */
    public function show(LoginFront $loginFront)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoginFront  $loginFront
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginFront $loginFront)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoginFront  $loginFront
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoginFront $loginFront)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoginFront  $loginFront
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginFront $loginFront)
    {
        //
    }
}

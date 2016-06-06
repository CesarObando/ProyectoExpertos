<?php

namespace smarttour\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use smarttour\Http\Requests;
use smarttour\Http\Requests\LoginRequest;
use smarttour\Http\Controllers\Controller;

class LogController extends Controller
{


    public function index()
    {

    }

    public function create()
    {

    }

    public function store(LoginRequest $request)
    {
      //print_r($request['email']);
      //print_r($request['password']);
      if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
        return Redirect::to('/');
      }
      Session::flash('message-error','Los datos no son correctos');
      return Redirect::to('insertarLugar');
    }

    public function login(){
      return view('login');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }
}

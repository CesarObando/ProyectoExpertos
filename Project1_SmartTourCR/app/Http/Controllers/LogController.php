<?php

namespace smarttour\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use smarttour\Http\Requests;
use smarttour\Http\Requests\LoginRequest;

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
      if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
        return Redirect::to('insertarLugar');
      }
      Session::flash('message-error','Los datos no son correctos');
      return Redirect::to('/');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }
}

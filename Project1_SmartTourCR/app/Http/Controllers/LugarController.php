<?php

namespace smarttour\Http\Controllers;

use Illuminate\Http\Request;

use smarttour\Http\Requests;

class LugarController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
      return view ('lugar/insertarLugar');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}

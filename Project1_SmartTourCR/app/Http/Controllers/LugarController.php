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
      return view ('insertarLugar');
    }

    public function store(Request $request)
    {
      \smarttour\Lugar::create([
      'nombre' => $request['nombre'],
      'latitud' => $request['latitud'],
      'longitud' => $request['longitud'],
    ]);
    return view ('insertarLugar');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
      $lugar = \smarttour\Lugar::find($id);
      return view ('editarLugar',['lugar'=>$lugar]);
    }

    public function update($id, Request $request)
    {
      $lugar = \smarttour\Lugar::find($id);
      $lugar->fill($request->all());
      $lugar->save();
      return redirect ('/');
    }

    public function destroy($id)
    {
      $lugar = \smarttour\Lugar::find($id);
      $lugar->delete();
    }

    public function listar()
    {
      $lugares = \smarttour\Lugar::All();
      return view('listarLugares',compact('lugares'));
    }
}

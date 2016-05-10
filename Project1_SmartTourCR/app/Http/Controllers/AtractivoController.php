<?php

namespace smarttour\Http\Controllers;

use Illuminate\Http\Request;

use smarttour\Http\Requests;

class AtractivoController extends Controller
{
  public function index()
  {

  }

  public function create()
  {
    return view ('insertarAtractivo');
  }

  public function store(Request $request)
  {
    \smarttour\Atractivo::create([
    'idlugar' => $request['idlugar'],
    'nombre' => $request['nombre'],
    'duracion' => $request['duracion'],
    'tipoCamino' => $request['tipoCamino'],
    'precio' => $request['precio'],
    'distancia' => $request['distancia'],
    'clima' => $request['clima'],
    'latitud' => $request['latitud'],
    'longitud' => $request['longitud'],
  ]);
  return view ('insertarAtractivo');
  }

  public function show($id)
  {

  }

  public function edit($id)
  {
    $atractivo = \smarttour\Atractivo::find($id);
    return view ('editarAtractivo',['atractivo'=>$atractivo]);
  }

  public function update($id, Request $request)
  {
    $atractivo = \smarttour\Atractivo::find($id);
    $atractivo->fill($request->all());
    $atractivo->save();
    return redirect ('/');
  }

  public function destroy($id)
  {
    $atractivo = \smarttour\Atractivo::find($id);
    $atractivo->delete();
  }

  public function listar()
  {
    $atractivos = \smarttour\Atractivo::All();
    return view('listarAtractivos',compact('atractivos'));
  }
}

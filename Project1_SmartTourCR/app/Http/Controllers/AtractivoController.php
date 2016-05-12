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
    $lugares = \smarttour\Lugar::All();
    return view ('insertarAtractivo',compact('lugares'));
  }

  public function store(Request $request)
  {
    \smarttour\Atractivo::create([
    'idlugar' => $request['lugar'],
    'nombre' => $request['nombre'],
    'duracion' => $request['duracion'],
    'tipoCamino' => $request['tipoCamino'],
    'precio' => $request['precio'],
    'distancia' => $request['distancia'],
    'clima' => $request['clima'],
    'descripcion' => $request['descripcion'],
    'rutaImagen' => $request['imagen'],
    'latitud' => $request['latitud'],
    'longitud' => $request['longitud'],
  ]);
  $lugares = \smarttour\Lugar::All();
  return view ('insertarAtractivo',compact('lugares'));
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

  public function verAtractivos()
  {
    $atractivos = \smarttour\Atractivo::All();
    return view('verAtractivos',compact('atractivos'));
  }
}

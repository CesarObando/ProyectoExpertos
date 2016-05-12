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
<<<<<<< HEAD
    'descripcion' => $request['descripcion'],
    'rutaImagen' => $request['imagen'],
=======
>>>>>>> 9dc63307c4aca0ce2af4c408a3b48eb233bafd4e
    'latitud' => $request['latitud'],
    'longitud' => $request['longitud'],
    'rutaImagen'=> $request['rutaImagen'],
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
    return view ('modificarAtractivo',['atractivo'=>$atractivo]);
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

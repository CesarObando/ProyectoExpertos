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
    'clima' => $request['clima'],
    'descripcion' => $request['descripcion'],
    'rutaImagen' => $request['rutaImagen'],
    'latitud' => $request['latitud'],
    'longitud' => $request['longitud'],
  ]);
  $lugares = \smarttour\Lugar::All();
  return view ('insertarAtractivo',compact('lugares'));
  }

  public function show()
  {

  }

  public function edit($id)
  {
    $atractivo = \smarttour\Atractivo::find($id);
    $lugares = \smarttour\Lugar::All();
    return view ('modificarAtractivo',['atractivo'=>$atractivo],compact('lugares'));
  }

  public function update($id, Request $request)
  {
    $atractivo = \smarttour\Atractivo::find($id);
    $atractivo->fill($request->all());
    $atractivo->save();
    return redirect ('verAtractivos');
  }

  public function eliminar($id)
  {
    \smarttour\Atractivo::destroy($id);
    return redirect('verAtractivos');
  }

  public function verAtractivos()
  {
    $atractivos = \smarttour\Atractivo::Atractivos();
    return view('verAtractivos',compact('atractivos'));
  }

}

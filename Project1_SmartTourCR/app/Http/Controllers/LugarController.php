<?php

namespace smarttour\Http\Controllers;

use Illuminate\Http\Request;

use smarttour\Http\Requests;

use DB;

class LugarController extends Controller
{

    public function _construct(){
      $this->middleware('auth');
    }
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
    return view ('principal');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
      $lugar = \smarttour\Lugar::find($id);
      return view ('modificarLugar',['lugar'=>$lugar]);
    }

    public function update($id, Request $request)
    {
      $lugar = \smarttour\Lugar::find($id);
      $lugar->fill($request->all());
      $lugar->save();
      return redirect ('verLugares');
    }

    public function eliminar($id)
    {
      DB::update('update lugar set longitud = 0, latitud = 0 where id = ?',[$id]);
      $lugar = \smarttour\Lugar::find($id);
      DB::update('update atractivo set longitud = 0, latitud = 0 where idlugar = ?',[$lugar->id]);
      return redirect('verLugares');
    }

    public function verLugares()
    {
      $lugares = \smarttour\Lugar::Lugares();
      return view('verLugares',compact('lugares'));
    }
}

<?php

namespace smarttour\Http\Controllers;

use Illuminate\Http\Request;
use smarttour\Http\Requests;
use smarttour\Http\Controllers\Controller;
use DB;

class PrincipalController extends Controller
{

    public function index()
    {
      DB::select('CALL bayes()');
      $lugares = \smarttour\Lugar::All();
      return view('index',compact('lugares'));
    }

    public function quienesSomos()
    {
      return view('quienesSomos');
    }

    public function store(Request $request)
    {
        $idLugar = 0;

        $result = DB::statement('CALL bayes7(?,?,?,?,@idlugar)',array($request['clima'],$request['duracion'],$request['tipoCamino'],$request['precio']));
        $idLugar = DB::select('select @idlugar as idlugar');
        print_r($idLugar[0]->idlugar);

        //return view('quienesSomos');
    }

}

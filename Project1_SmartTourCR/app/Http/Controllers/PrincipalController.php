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
        //DB::select('CALL bayes()');
        $idLugar = DB::select('CALL bayes7(?,?,?,?,@idLugar)',[$request['clima'],$request['duracion'],$request['tipoCamino'],$request['precio'],0]);
        //$idLugar = DB::select('select _idLugar');
        print_r($idLugar);

        //return view('quienesSomos');
    }

}

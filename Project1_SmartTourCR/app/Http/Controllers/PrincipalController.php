<?php

namespace smarttour\Http\Controllers;

use Illuminate\Http\Request;
use smarttour\Http\Requests;
use smarttour\Http\Controllers\Controller;

use DB;

class PrincipalController extends Controller
{


    public function _construct(){
      $this->middleware('auth',['only'=>'verAtractivos']);
    }

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
        $idLugar = $idLugar[0]->idlugar;
        //print_r($idLugar);
        $result = DB::select('select * from atractivo where idlugar ='.$idLugar.' and latitud != 0');
        //print_r($result);
        $puntoPartida = DB::select('select * from lugar where id ='.$request['lugar']);
        //print_r($puntoPartida);
        $atractivo;
        $distancia = 100;
        for($i=0;$i<sizeof($result);$i++){
          $var = sqrt(pow(($result[$i]->latitud - $puntoPartida[0]->latitud), 2) +
                    pow(($result[$i]->longitud - $puntoPartida[0]->longitud), 2));
            //En esta operacion se utiliza el algoritmo de distancia (euclides) proveido por el profesor, se almacena el resultado en una variable
            if ($var < $distancia) {
                $distancia = $var;
                $atractivo = $result[$i];
            }


        }
        //print_r($atractivo->);
        return view('atractivoSugerido',compact('atractivo'));
    }

    public function sugerirAtractivo(Request $request)
    {
        $result = array($request['clima'],$request['duracion'],$request['tipoCamino'],$request['precio']);
        $idLugar = 0;
        print_r($result);
        $result = DB::statement('CALL bayes7(?,?,?,?,@idlugar)',array($request['clima'],$request['duracion'],$request['tipoCamino'],$request['precio']));
        $idLugar = DB::select('select @idlugar as idlugar');
        $idLugar = $idLugar[0]->idlugar;
        print_r($idLugar);

        //$result = DB::select('select * from atractivo where idlugar ='.$idLugar.' and latitud != 0');
        //print_r($result);
        return view('atractivoSugerido');
    }



}

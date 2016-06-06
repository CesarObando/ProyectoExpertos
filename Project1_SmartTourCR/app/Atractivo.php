<?php

namespace smarttour;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Atractivo extends Model
{
  protected $table = 'atractivo';
  public $timestamps = false;
  protected $fillable = ['idlugar','nombre','duracion','tipoCamino','precio','clima','descripcion','rutaImagen','latitud','longitud'];

  public function setRutaImagenAttribute($rutaImagen){
    $this->attributes['rutaImagen'] = Carbon::now()->second.$rutaImagen->getClientOriginalName();
    $nombre = Carbon::now()->second.$rutaImagen->getClientOriginalName();
    \Storage::disk('local')->put($nombre, \File::get($rutaImagen));
    }

  public static function Atractivos(){
    return DB::table('atractivo')
        ->join('lugar','lugar.id','=','atractivo.idlugar')
        ->select('atractivo.*','lugar.nombre as nombreLugar')
        ->where('atractivo.latitud','!=', 0)
        ->get();
  }
}

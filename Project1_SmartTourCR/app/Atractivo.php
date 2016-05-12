<?php

namespace smarttour;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Atractivo extends Model
{
  protected $table = 'atractivo';
  public $timestamps = false;
  protected $fillable = ['idlugar','nombre','duracion','tipoCamino','precio','distancia','clima','descripcion','latitud','longitud','rutaImagen'];

  public function setRutaImagenAttribute($rutaImagen){
    $this->attributes['rutaImagen'] = Carbon::now()->second.$rutaImagen->getClientOriginalName();
    $name = Carbon::now()->second.$rutaImagen->getClientOriginalName();
    \Storage::disk('local')->put($nombre, \File::get($rutaImagen));
    }
}

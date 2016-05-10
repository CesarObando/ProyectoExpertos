<?php

namespace smarttour;

use Illuminate\Database\Eloquent\Model;

class Atractivo extends Model
{
  protected $table = 'atractivo';
  public $timestamps = false;
  protected $fillable = ['idlugar','nombre','duracion','tipoCamino','precio','distancia','clima','latitud','longitud'];
}

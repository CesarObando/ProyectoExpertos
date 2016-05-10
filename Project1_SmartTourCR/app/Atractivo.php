<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atractivo extends Model
{
  protected $table = 'atractivo';
  protected $fillable = ['idlugar','nombre','duracion','tipoCamino','precio','distancia','clima'];
}

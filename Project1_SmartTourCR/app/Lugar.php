<?php

namespace smarttour;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
  protected $table = 'lugar';
  public $timestamps = false;
  protected $fillable = ['nombre','latitud','longitud'];
}

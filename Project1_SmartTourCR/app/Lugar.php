<?php

namespace smarttour;

use Illuminate\Database\Eloquent\Model;
use DB;

class Lugar extends Model
{
  protected $table = 'lugar';
  public $timestamps = false;
  protected $fillable = ['nombre','latitud','longitud'];

  public static function Lugares(){
    return DB::table('lugar')
        ->select('lugar.*')
        ->where('lugar.latitud','!=', 0,'and','lugar.longitud','!=',0)
        ->get();
  }
}

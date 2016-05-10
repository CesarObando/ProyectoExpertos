<?php

namespace smarttour;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
  protected $table = 'lugar';
  protected $fillable = ['nombre'];
}

<?php

namespace smarttour\Http\Controllers;

use Illuminate\Http\Request;
use smarttour\Http\Requests;
use smarttour\Http\Controllers\Controller;

class PrincipalController extends Controller
{

    public function index()
    {
      return view('index');
    }

}

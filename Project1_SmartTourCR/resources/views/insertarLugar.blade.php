@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
{!!Form::open(['route'=>'lugar.store','method'=>'post'])!!}
  <h1>Agregar Lugar</h1>

  <label for="nombre">Nombre:</label>
  <input type="text" class="form-control" name="nombre" required="">
  <label for="latitud">Latitud:</label>
  <input type="text" class="form-control" name="latitud" required="">
  <label for="longitud">Longitud:</label>
  <input type="text" class="form-control" name="longitud" required="">

  <hr>
  <input type="submit" name="insertarLugar" value="Insertar" class="btn btn-success btn-fill">
{!!Form::close()!!}
</div>
</div>
@stop

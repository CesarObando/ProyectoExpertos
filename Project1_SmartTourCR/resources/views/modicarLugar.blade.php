@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
{!!Form::model($lugar,['route'=>['lugar.update',$lugar->id],'method'=>'PUT'])!!}
  <h1>Modificar Lugar</h1>

  <label for="nombre">Nombre:</label>
  <input type="text" class="form-control" name="nombre" required="">
  <label for="latitud">Latitud:</label>
  <input type="text" class="form-control" name="latitud" required="">
  <label for="longitud">Longitud:</label>
  <input type="text" class="form-control" name="longitud" required="">
  <hr>
  <input type="submit" name="modificarLugar" value="modificar" class="btn-success btn-lg">
{!!Form::close()!!}
</div>
</div>
@stop

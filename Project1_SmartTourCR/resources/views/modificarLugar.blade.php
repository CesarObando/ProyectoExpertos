@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
{!!Form::model($lugar,['route'=>['lugar.update',$lugar->id],'method'=>'PUT'])!!}
  <h1>Modificar Lugar</h1>

  <label for="nombre">Nombre:</label>
  <input type="text" class="form-control" name="nombre" required="" value= {{$lugar->nombre}}>
  <label for="latitud">Latitud:</label>
  <input type="text" class="form-control" name="latitud" required="" value= {{$lugar->latitud}}>
  <label for="longitud">Longitud:</label>
  <input type="text" class="form-control" name="longitud" required="" value= {{$lugar->longitud}}>
  <hr>
  <input type="submit" name="modificarLugar" value="modificar" class="btn btn-warning btn-fill">
{!!Form::close()!!}
</div>
</div>
@stop

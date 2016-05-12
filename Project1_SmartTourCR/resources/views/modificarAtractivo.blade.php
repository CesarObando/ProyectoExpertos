@extends('principal')
@section('content')
<<<<<<< HEAD
{!!Form::model($atractivo,['route'=>['atractivo.update',$atractivo->id],'method'=>'PUT'])!!}
=======
<div class="content">
  <div class="container-fluid">
{!!Form::open(['route'=>'lugar.store','method'=>'post'])!!}
>>>>>>> 7f8aa6a8fadddd7af6239e3f11f2d8372bb89051

<h1>Modificar Atractivo</h1>

<label for="nombre">Nombre:</label>
<input type="text" class="form-control" name="nombre" required="" value= {{$atractivo->nombre}}>

  <label>Lugar</label>
  <select name="lugar" id="lugar" class="form-control" tabindex="9">
    <option value="0">San José</option>
    <option value="1">Alajuela</option>
    <option value="2">Cartago</option>
    <option value="3">Guanacaste</option>
  </select>

  <div class="form-group">
    <label>Precio</label>
    <input type="number" name="precio" id="precio" class="form-control" value= {{$atractivo->precio}}></input>
  </div>

  <div class="form-group">
    <label>Tipo de camino</label>
    <select name="tipoCamino" id="tipoCamino" class="form-control" tabindex="9" value= {{$atractivo->tipoCamino}}>
      <option value="Asfaltado">Asfaltado</option>
      <option value="Pedregoso">Pedregoso</option>
      <option value="Lastre">Lastre</option>
      <option value="Barro">Barro</option>
    </select>
  </div>

  <div class="form-group">
    <label>Duracion (Horas)</label>
    <input type="number" id="duracion" name="duracion" class="form-control" value= {{$atractivo->duracion}}></input>
  </div>

  <div class="form-group">
    <label>Clima</label>
    <select name="clima" id="clima" class="form-control" tabindex="9" value= {{$atractivo->clima}}>
      <option value="Frío">Frío</option>
      <option value="Lluvioso">Lluvioso</option>
      <option value="Soleado">Soleado</option>
      <option value="Caliente">Caliente</option>
    </select>
  </div>
  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" class="form-control" name="imagen" >
  </div>
  <div class="form-group">
    <label>Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" class="form-control" value= {{$atractivo->descripcion}}></input>
  </div>
  <div class="form-group">
    <label>Latitud</label>
    <input type="text" name="latitud" id="latitud" class="form-control" value= {{$atractivo->latitud}}></input>
  </div>
  <div class="form-group">
    <label>Longitud</label>
    <input type="text" name="longitud" id="longitud" class="form-control" value= {{$atractivo->longitud}}></input>
  </div>
  <hr>
  <input type="submit" name="modificarAtractivo" value="Modificar" class="btn btn-warning btn-fill">
{!!Form::close()!!}
</div>
</div>
@stop

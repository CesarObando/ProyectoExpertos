@extends('principal')
@section('content')

<div class="content">
  <div class="container-fluid">
{!!Form::open(['route'=>'lugar.store','method'=>'post'])!!}

<h1>Agregar Atractivo</h1>

<label for="nombre">Nombre:</label>
<input type="text" class="form-control" name="nombre" required="">

<label>Lugar</label>
<select name="lugar" id="lugar" class="form-control" tabindex="9">
  <option value="0">San José</option>
  <option value="1">Alajuela</option>
  <option value="2">Cartago</option>
  <option value="3">Guanacaste</option>
</select>

<div class="form-group">
  <label>Precio</label>
  <select name="precio" id="precio" class="form-control" tabindex="9">
    <option value="0">Gratis</option>
    <option value="1">1000-5000 colones</option>
    <option value="2">5000-10000 colones</option>
    <option value="3">10000-15000 colones</option>
  </select>
</div>

<div class="form-group">
  <label>Tipo de camino</label>
  <select name="tipoCamino" id="tipoCamino" class="form-control" tabindex="9">
    <option value="0">Asfaltado</option>
    <option value="1">Pedregoso</option>
    <option value="2">Lastre</option>
    <option value="3">Barro</option>
  </select>
</div>

<div class="form-group">
  <label>Duracion</label>
  <select name="duracion" id="duracion" class="form-control" tabindex="9">
    <option value="0">Menos de 1 hora</option>
    <option value="1">1-2 horas</option>
    <option value="2">2-3 horas</option>
    <option value="3">3-4 horas</option>
  </select>
</div>

<div class="form-group">
  <label>Clima</label>
  <select name="clima" id="clima" class="form-control" tabindex="9">
    <option value="0">Frío</option>
    <option value="1">Lluvioso</option>
    <option value="2">Soleado</option>
    <option value="3">Caliente</option>
  </select>
</div>
<div class="form-group">
  <label for="imagen">Imagen</label>
  <input type="file" class="form-control" name="imagen" >
</div>
<hr>
<input type="submit" name="insertarAtractivo" value="Insertar" class="btn btn-success btn-fill">
{!!Form::close()!!}
</div>
</div>

@stop

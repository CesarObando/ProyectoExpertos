@extends('principal')
@section('content')

<div class="content">
  <div class="container-fluid">
{!!Form::open(['route'=>'atractivo.store','method'=>'post'])!!}

<h1>Agregar Atractivo</h1>

<label for="nombre">Nombre:</label>
<input type="text" class="form-control" name="nombre" required="">

<label>Lugar</label>
<select name="lugar" id="lugar" class="form-control" tabindex="9">
  @foreach($lugares as $lugar)
  <option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
  @endforeach
</select>

<div class="form-group">
  <label>Precio</label>
  <input type="number" name="precio" id="precio" class="form-control"></input>
</div>

<div class="form-group">
  <label>Tipo de camino</label>
  <select name="tipoCamino" id="tipoCamino" class="form-control" tabindex="9">
    <option value="Asfaltado">Asfaltado</option>
    <option value="Pedregoso">Pedregoso</option>
    <option value="Lastre">Lastre</option>
    <option value="Barro">Barro</option>
  </select>
</div>

<div class="form-group">
  <label>Duracion (Horas)</label>
  <input type="number" id="duracion" name="duracion" class="form-control"></input>
</div>

<div class="form-group">
  <label>Clima</label>
  <select name="clima" id="clima" class="form-control" tabindex="9">
    <option value="Frío">Frío</option>
    <option value="Lluvioso">Lluvioso</option>
    <option value="Soleado">Soleado</option>
    <option value="Caliente">Caliente</option>
  </select>
</div>
<div class="form-group">
  <label for="rutaImagen">Imagen</label>
  <input type="file" class="form-control" name="rutaImagen" >
</div>
<div class="form-group">
  <label>Descripcion</label>
  <input type="text" name="descripcion" id="descripcion" class="form-control"></input>
</div>
<div class="form-group">
  <label>Latitud</label>
  <input type="text" name="latitud" id="latitud" class="form-control"></input>
</div>
<div class="form-group">
  <label>Longitud</label>
  <input type="text" name="longitud" id="longitud" class="form-control"></input>
</div>
<hr>
<input type="submit" name="insertarAtractivo" value="Insertar" class="btn btn-success btn-fill">
{!!Form::close()!!}
</div>
</div>

@stop

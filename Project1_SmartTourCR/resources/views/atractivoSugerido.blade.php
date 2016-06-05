
@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <form onload="poblarMarcadores()">

            <div id="mapa" style="width: 1000px; height: 500px;"></div>
          <input type="hidden" id="latitud" value="{{$atractivo->latitud}}" >
          <input type="hidden" id="longitud" value="{{$atractivo->longitud}}" >
          <input type="hidden" id="imagen" value="{{$atractivo->rutaImagen}}" >
          <input type="hidden" id="descripcion" value="{{$atractivo->descripcion}}" >
          <input type="hidden" id="nombre" value="{{$atractivo->nombre}}" >
        </form>
      </div>

    </div>
  </div>
</div>
@stop

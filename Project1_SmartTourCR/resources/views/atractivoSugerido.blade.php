
@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <form onload="poblarMarcadores()">

          <div class="col-lg-6">
            <div id="mapa" style="width: 680px; height: 450px;"></div>
          </div>
          <input type="text" id="latitud" value="{{$atractivo->latitud}}" >
          <input type="text" id="longitud" value="{{$atractivo->longitud}}" >
        </form>
      </div>

    </div>
  </div>
</div>
@stop

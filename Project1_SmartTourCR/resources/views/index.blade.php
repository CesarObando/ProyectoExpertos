@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        {!!Form::open(['route'=>'principal.store','method'=>'post'])!!}

          <div class="form-group">
            <label>Lugar</label>
            <select name="lugar" id="lugar" class="form-control" tabindex="9">
              @foreach($lugares as $lugar)
              <option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Precio por persona (Colones)</label>
            <select name="precio" id="precio" class="form-control" tabindex="9">
              <option value="a">0-2000</option>
              <option value="b">2000-5000</option>
              <option value="c">Más de 5000</option>
            </select>
          </div>

          <div class="form-group">
            <label>Tipo de camino</label>
            <select name="tipoCamino" id="tipoCamino" class="form-control" tabindex="9">
              <option value="a">Asfaltado</option>
              <option value="b">Lastre</option>
              <option value="c">Barro</option>
            </select>
          </div>

          <div class="form-group">
            <label>Duración (Horas)</label>
            <select name="duracion" id="duracion" class="form-control" tabindex="9">
              <option value="a">0-1</option>
              <option value="b">1-3</option>
              <option value="c">Más de 3</option>
            </select>
          </div>

          <div class="form-group">
            <label>Clima</label>
            <select name="clima" id="clima" class="form-control" tabindex="9">
              <option value="a">Frío</option>
              <option value="b">Lluvioso</option>
              <option value="c">Soleado</option>
            </select>
          </div>

<input type="submit" name="buscar" value="Buscar" class="btn btn-success btn-fill">
        {!!Form::close()!!}
      </div>
      <div class="col-lg-6">
        <div id="mapa" style="width: 680px; height: 450px;"></div>
      </div>
    </div>
  </div>
</div>
@stop

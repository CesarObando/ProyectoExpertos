@extends('principal')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="col-lg-4">
      {!!Form::open(['route'=>'atractivo.store','method'=>'post', 'files'=>true])!!}

      <h1>Agregar Atractivo</h1>

      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" name="nombre" required="" id="nombre">

      <label>Lugar</label>
      <select name="lugar" id="lugar" class="form-control" tabindex="9">
        @foreach($lugares as $lugar)
        <option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
        @endforeach
      </select>

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
        <input type="text" name="latitud" id="latitud" class="form-control" readonly=""></input>
      </div>
      <div class="form-group">
        <label>Longitud</label>
        <input type="text" name="longitud" id="longitud" class="form-control" readonly=""></input>
      </div>
      <hr>
      <input type="submit" name="insertarAtractivo" value="Insertar" class="btn btn-success btn-fill">
      {!!Form::close()!!}
    </div>
    <div class="col-lg-6">
      <br>
      <br>
      <br>
      <br>
      <ul>
        <input type="text" id="address" placeholder="Escribe aquí tu lugar..." value="" class="form-control" />
        <input type="button" value="Buscar" onclick="geocode()" class="btn btn-success btn-fill" />
        <span id="formatedAddress">...</span>
      </ul>
      <div id="mapa" style="width: 680px; height: 450px;"></div>
    </div>
  </div>
</div>

@stop
<script type="text/javascript">
var map;
var geocoder;
var centerChangedLast;
var reverseGeocodedLast;
var currentReverseGeocodeResponse;

function initialize(map_lat, map_lon, map_zoom) {

  map_lat   = typeof map_lat !== 'undefined' ? map_lat : '9.905378';
  map_lon   = typeof map_lon !== 'undefined' ? map_lon : '-84.096466';
  map_zoom  = typeof map_zoom !== 'undefined' ? map_zoom : 3;

  var latlng = new google.maps.LatLng(map_lat, map_lon);

  var myOptions = {
    zoom: map_zoom,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("mapa"), myOptions);
  geocoder = new google.maps.Geocoder();
  setupEvents();
  centerChanged();
  var opt = { minZoom: 3 };
  map.setOptions(opt);

}

function setupEvents() {

  reverseGeocodedLast = new Date();
  centerChangedLast = new Date();

  setInterval(function() {
    if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
      if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
      reverseGeocode();
    }
  }, 1000);

  google.maps.event.addListener(map, 'center_changed', centerChanged);
  google.maps.event.addDomListener(document.getElementById('crosshair'),'dblclick', function() {
    map.setZoom(map.getZoom() + 1);
  });

}

function getCenterLatLngText() {

  return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';

}

function centerChanged() {

  centerChangedLast = new Date();
  var latlng = getCenterLatLngText();
  var lat = map.getCenter().lat();
  var lng = map.getCenter().lng();
  document.getElementById('latitud').value = lat;
  document.getElementById('longitud').value = lng;
  document.getElementById('nombre').value = document.getElementById('address').value;
  reverseGeocode();

}

function reverseGeocode() {

  reverseGeocodedLast = new Date();
  geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);

}

function reverseGeocodeResult(results, status) {

  currentReverseGeocodeResponse = results;

  if(status == 'OK') {
    if(results.length == 0) {
      document.getElementById('formatedAddress').innerHTML = '???';
    } else {
      document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
    }
  } else {
    document.getElementById('formatedAddress').innerHTML = '???';
  }

}

function geocode() {

  var address = document.getElementById("address").value;
  geocoder.geocode({
    'address': address,
    'partialmatch': true
  }, geocodeResult);

}

function geocodeResult(results, status) {

  //  if (status == 'OK' && results.length > 0) {
  map.fitBounds(results[0].geometry.viewport);
  centerChanged();
  //  } else {
  //    alert("Geocode was not successful for the following reason: " + status);
  //  }

}

function addMarkerAtCenter() {

  var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map
  });

  var text = 'Lat/Lng: ' + getCenterLatLngText();

  if(currentReverseGeocodeResponse) {
    var addr = '';
    if(currentReverseGeocodeResponse.size == 0) {
      addr = 'None';
    } else {
      addr = currentReverseGeocodeResponse[0].formatted_address;
    }
    text = text + '<br>' + 'Dirección: <br>' + addr;
  }

  var infowindow = new google.maps.InfoWindow({ content: text });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

}

$(document).ready(function(){

  initialize();

});

$(document).keypress(function(event){

  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    geocode();
  }

});
</script>

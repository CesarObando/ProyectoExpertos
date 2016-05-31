@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="col-lg-4">
      {!!Form::model($atractivo,['route'=>['atractivo.update',$atractivo->id],'method'=>'PUT'])!!}

      <h1>Modificar Atractivo</h1>

      {!!Form::label('nombre','Nombre:')!!}
      {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre'])!!}

      <label>Lugar</label>
      <select name="idlugar" id="lugar" class="form-control">
        @foreach($lugares as $lugar)
        <option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
        @endforeach
      </select>


      {!!Form::label('precio','Precio por persona (Colones):')!!}
      {!!Form::select('precio', ['a'=>'0-2000',
      'b' =>'2000-5000',
      'c' =>'Más de 5000'],null,['class'=>'form-control',
      'placeholder'=>'Seleccione el precio'])!!}


      {!!Form::label('tipoCamino','Tipo de camino:')!!}
      {!!Form::select('tipoCamino', ['Asfaltado'=>'Asfaltado',
      'Pedregoso' => 'Pedregoso',
      'Lastre' => 'Lastre',
      'Barro'=>'Barro'],null,['class'=>'form-control',
      'placeholder'=>'Seleccione el tipo de camino'])!!}

      {!!Form::label('duracion','Duración (Horas):')!!}
      {!!Form::select('duracion', ['a'=>'0-1',
      'b' =>'1-3',
      'c' =>'Más de 3'],null,['class'=>'form-control',
      'placeholder'=>'Seleccione la duración'])!!}

      {!!Form::label('clima','Clima:')!!}
      {!!Form::select('clima', ['Frío'=>'Frío',
      'Lluvioso' => 'Lluvioso',
      'Soleado' => 'Soleado',
      'Caliente'=>'Caliente'],null,['class'=>'form-control',
      'placeholder'=>'Seleccione el clima'])!!}

      {!!Form::file('imagen')!!}

      {!!Form::label('descripcion','Descripcion:')!!}
      {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion'])!!}

      {!!Form::label('latitud','Latitud:')!!}
      {!!Form::text('latitud',null,['class'=>'form-control','placeholder'=>'Ingrese la latitud','readonly'=>''])!!}

      {!!Form::label('longitud','Longitud:')!!}
      {!!Form::text('longitud',null,['class'=>'form-control','placeholder'=>'Ingrese la longitud','readonly'=>''])!!}

      {!!Form::submit('Modificar',['class'=>'btn btn-warning btn-fill'])!!}
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

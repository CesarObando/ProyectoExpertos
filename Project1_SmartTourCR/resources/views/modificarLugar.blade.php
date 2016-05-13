@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
{!!Form::model($lugar,['route'=>['lugar.update',$lugar->id],'method'=>'PUT'])!!}
  <h1>Modificar Lugar</h1>

  {!!Form::label('nombre','Nombre:')!!}
  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre'])!!}

  {!!Form::label('latitud','Latitud:')!!}
  {!!Form::text('latitud',null,['class'=>'form-control','placeholder'=>'Ingrese la latitud'])!!}

  {!!Form::label('longitud','Longitud:')!!}
  {!!Form::text('longitud',null,['class'=>'form-control','placeholder'=>'Ingrese la longitud'])!!}

  {!!Form::submit('Modificar',['class'=>'btn btn-warning btn-fill'])!!}
{!!Form::close()!!}
</div>
</div>
@stop

@extends('principal')
@section('content')
@include('alertas.error')
<div class="content">
  <div class="container-fluid">
{!!Form::open(['route'=>'log.store','method'=>'post'])!!}
  <h1>Iniciar Sesión</h1>



  {!!Form::label('correo','Correo:')!!}
  {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese el correo'])!!}

  {!!Form::label('password','Password:')!!}
  {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese la contrasena'])!!}

  {!!Form::submit('Iniciar sesion',['class'=>'btn btn-warning btn-fill'])!!}
{!!Form::close()!!}
</div>
</div>
@stop

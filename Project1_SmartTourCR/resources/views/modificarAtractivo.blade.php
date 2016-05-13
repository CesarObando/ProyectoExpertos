@extends('principal')
@section('content')
<div class="content">
  <div class="container-fluid">
{!!Form::model($atractivo,['route'=>['atractivo.update',$atractivo->id],'method'=>'PUT'])!!}

<h1>Modificar Atractivo</h1>

{!!Form::label('nombre','Nombre:')!!}
{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre'])!!}

<label>Lugar</label>
<select name="lugar" id="lugar" class="form-control" tabindex="9">
  @foreach($lugares as $lugar)
  <option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
  @endforeach
</select>


{!!Form::label('precio','Precio (por persona):')!!}
{!!Form::text('precio',null,['class'=>'form-control','placeholder'=>'Ingrese el precio'])!!}


{!!Form::label('tipoCamino','Tipo de camino:')!!}
                {!!Form::select('tipoCamino', ['Asfaltado'=>'Asfaltado',
                                          'Pedregoso' => 'Pedregoso',
                                          'Lastre' => 'Lastre',
                                          'Barro'=>'Barro'],null,['class'=>'form-control',
                                          'placeholder'=>'Seleccione el tipo de camino'])!!}

  {!!Form::label('duracion','Duracion (Horas):')!!}
  {!!Form::text('duracion',null,['class'=>'form-control','placeholder'=>'Ingrese la duracion'])!!}

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
  {!!Form::text('latitud',null,['class'=>'form-control','placeholder'=>'Ingrese la latitud'])!!}

  {!!Form::label('longitud','Longitud:')!!}
  {!!Form::text('longitud',null,['class'=>'form-control','placeholder'=>'Ingrese la longitud'])!!}

{!!Form::submit('Modificar',['class'=>'btn btn-warning btn-fill'])!!}
{!!Form::close()!!}
</div>
</div>
@stop

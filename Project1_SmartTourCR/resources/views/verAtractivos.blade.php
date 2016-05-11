@extends('principal')
@section('content')
<div class="col-md-12">
<div class="card">
<div class="content table-responsive table-full-width">
                <br>
                <br>
                <h1>Atractivos</h1>
                <br>
                <a href="{!!URL::to("insertarAtractivo")!!}" class="btn btn-success btn-fill">Agregar +</a>
                <hr>
                <form>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Lugar</th>
                                <th>Nombre</th>
                                <th>Duración</th>
                                <th>Tipo de camino</th>
                                <th>Precio</th>
                                <th>Distancia</th>
                                <th>Clima</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach($atractivos as $atractivo)
                        <tbody>
                            <tr>
                                <td>{{$atractivo->id_lugar}}</td>
                                <td>{{$atractivo->nombre}}</td>
                                <td>{{$atractivo->duracion}}</td>
                                <td>{{$atractivo->tipoCamino}}</td>
                                <td>{{$atractivo->precio}}</td>
                                <td>{{$atractivo->distancia}}</td>
                                <td>{{$atractivo->clima}}</td>
                                <td>{{$atractivo->latitud}}</td>
                                <td>{{$atractivo->longitud}}</td>
                                <td><a href="#">Ver</a></td>
                                <td>
                                  {!!link_to_route('atractivo.edit', $title = 'Modificar', $parameters = $atractivo->id, $attributes = ['class'=>'btn btn-warning btn-fill'])!!}
                                  {!!link_to_action('AtractivoController@destroy', $title = 'Eliminar', $parameters = $atractivo->id, $attributes = ['class'=>'btn btn-danger btn-fill'])!!}
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </form>
                <br>
                <br>

            </div>
          </div>
        </div>

        @stop

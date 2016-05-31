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
                                <td>{{$atractivo->nombreLugar}}</td>
                                <td>{{$atractivo->nombre}}</td>
                                @if($atractivo->duracion == 'a')
                                <!--<td>{{$atractivo->duracion}}</td>-->
                                <td>De 0 a 1</td>
                                @elseif($atractivo->duracion == 'b')
                                <td>De 1 a 3</td>
                                @else
                                <td>3 o más</td>
                                @endif

                                @if($atractivo->tipoCamino == 'a')
                                <td>Alfaltado</td>
                                @elseif($atractivo->tipoCamino == 'b')
                                <td>Lastre</td>
                                @else
                                <td>Barro</td>
                                @endif

                                @if($atractivo->precio == 'a')
                                <td>0 a 2000</td>
                                @elseif($atractivo->precio == 'b')
                                <td>2000 a 5000</td>
                                @else
                                <td>5000 o más</td>
                                @endif

                                @if($atractivo->clima == 'a')
                                <td>Frío</td>
                                @elseif($atractivo->clima == 'b')
                                <td>Lluvioso</td>
                                @else
                                <td>Soleado</td>
                                @endif

                                <td>{{$atractivo->latitud}}</td>
                                <td>{{$atractivo->longitud}}</td>
                                <td>
                                    <img src="atractivos/{{$atractivo->rutaImagen}}" alt="" style="width:100px;"/>
                                </td>
                                <td>
                                  {!!link_to_route('atractivo.edit', $title = 'Modificar', $parameters = $atractivo->id, $attributes = ['class'=>'btn btn-warning btn-fill'])!!}
                                  {!!link_to_action('AtractivoController@eliminar', $title = 'Eliminar', $parameters = $atractivo->id, $attributes = ['class'=>'btn btn-danger btn-fill'])!!}
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

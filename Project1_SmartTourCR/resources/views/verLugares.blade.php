@extends('principal')
@section('content')
<div class="content">
<div class="container-fluid">
<div class="col-md-12">
  <div class="card">
<div class="content table-responsive table-full-width">
                <br>
                <br>
                <h1>Lugares</h1>
                <br>
                <a href="{!!URL::to("insertarLugar")!!}" class="btn btn-success btn-fill">Agregar +</a>
                <hr>
                <form>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach($lugares as $lugar)
                        <tbody>
                            <tr>
                                <td>{{$lugar->nombre}}</td>
                                <td>{{$lugar->latitud}}</td>
                                <td>{{$lugar->longitud}}</td>
                                <td>
                                  {!!link_to_route('lugar.edit', $title = 'Modificar', $parameters = $lugar->id, $attributes = ['class'=>'btn-warning btn-fill'])!!}
                                  {!!link_to_action('LugarController@eliminar', $title = 'Eliminar', $parameters = $lugar->id, $attributes = ['class'=>'btn-danger btn-fill'])!!}
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
      </div>
    </div>

        @stop

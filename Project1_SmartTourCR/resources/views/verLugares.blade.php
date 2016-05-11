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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach($lugares as $lugar)
                        <tbody>
                            <tr>
                                <td>{{$lugar->id}}</td>
                                <td>{{$lugar->nombre}}</td>
                                <td>{{$lugar->latitud}}</td>
                                <td>{{$lugar->longitud}}</td>
                                <td>
<<<<<<< HEAD
                                  {!!link_to_route('lugar.edit', $title = 'Modificar', $parameters = $lugar->id, $attributes = ['class'=>'btn btn-warning btn-fill'])!!}
                                  {!!link_to_action('LugarController@destroy', $title = 'Eliminar', $parameters = $lugar->id, $attributes = ['class'=>'btn btn-danger btn-fill'])!!}
=======
                                  {!!link_to_route('lugar.edit', $title = 'Modificar', $parameters = $lugar->id, $attributes = ['class'=>'btn-warning btn-sm'])!!}
                                  {!!link_to_route('lugar.destroy', $title = 'Eliminar', $parameters = $lugar->id, $attributes = ['class'=>'btn-danger btn-sm'])!!}
>>>>>>> 8374d7116094c1704fc79f7b55e714a3cf08ba7b
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

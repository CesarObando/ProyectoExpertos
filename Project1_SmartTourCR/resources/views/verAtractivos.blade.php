<div class="col-md-12">
<div class="card">
<div class="content table-responsive table-full-width">
                <br>
                <br>
                <h1>Atractivos</h1>
                <br>
                <a href="#" class="btn-success btn-lg">Agregar</a>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach($lugares as $lugar)
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
                                <td>
                                  <!-- Acciones-->
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

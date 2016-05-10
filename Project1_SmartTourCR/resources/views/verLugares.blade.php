<div class="col-md-12">
                        <div class="card">
<div class="content table-responsive table-full-width">
                <br>
                <br>
                <h1>Lugares</h1>
                <br>
                <a href="#" class="btn-success btn-lg">Agregar</a>
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

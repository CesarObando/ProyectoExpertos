{!!Form::open(['route'=>'lugar.store','method'=>'post'])!!}
  <h1>Agregar Lugar</h1>

  <label for="nombre">Nombre:</label>
  <input type="text" class="form-control" name="nombre" required="">
  <label for="nombre">Latitud:</label>
  <input type="text" class="form-control" name="nombre" required="">
  <label for="nombre">Longitud:</label>
  <input type="text" class="form-control" name="nombre" required="">
  <hr>
  <input type="submit" name="insertarLugar" value="Insertar" class="btn-success btn-lg">
{!!Form::close()!!}

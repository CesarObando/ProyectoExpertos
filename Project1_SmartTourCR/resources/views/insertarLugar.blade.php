{!!Form::open(['route'=>'lugar.store','method'=>'post'])!!}
  <label for="nombre">Marca:</label>
  <input type="text" class="form-control" name="nombre" required="">
  <hr>
  <input type="submit" name="insertarLugar" value="Insertar" class="btn-success btn-lg">
{!!Form::close()!!}

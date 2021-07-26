@csrf
<input type="text" name="id" id="id" hidden>

<label for="" class="col-form-control">
    Nivel de responsabilidad:
</label>
<textarea class="form-control" name="nombre" id="nombre"></textarea>

<label for="" name='puntos' class="col-form-control">
    Puntos asginado:
</label>

<input type="number" name="puntos" class="form-control" onKeyPress="return soloNumeros(event)">

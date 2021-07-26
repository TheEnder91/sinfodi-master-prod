@csrf
<input type="text" name="id" id="id" hidden>

<label for="factor" class="col-form-control">
    F2 = FACTOR:
</label>

<input type="text" name="factor" id="factor" class="form-control" onKeyPress="return soloNumeros(event)">

<label for="nivel" class="col-form-control">
    Nivel:
</label>
<select name="nivel" id="nivel" class="form-control">
    <option value="" selected disabled>Seleccione un nivel...</option>
    <option value="Alto">Alto</option>
    <option value="Medio">Medio</option>
    <option value="Bajo">Bajo</option>
    <option value="Nulo">Nulo</option>
</select>

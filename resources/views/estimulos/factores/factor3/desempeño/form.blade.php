@csrf
<input type="text" name="id" id="id" hidden>

<label for="resultados" class="col-form-control">
    RESULTADO DE LA EVALUACION:
</label>
<input type="text" name="resultados" id="resultados" class="form-control">

<label for="f3" class="col-form-control">
    F3 = FACTOR X Cumplimiento de Metas de Desempeño Cualitativo:
</label>

<input type="text" name="f3" id="f3" class="form-control" onKeyPress="return soloNumeros(event)">

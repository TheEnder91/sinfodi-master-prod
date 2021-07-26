@csrf
<input type="text" name="id" id="id" hidden>

<label for="cumplimiento" class="col-form-control">
    % CUMPLIMIENTO DE METAS:
</label>
<textarea class="form-control" name="cumplimiento" id="cumplimiento"></textarea>

<label for="f2" class="col-form-control">
    F2 = FACTOR X Cumplimiento de Indicadores Institucionales:
</label>

<input type="text" name="f2" id="f2" class="form-control" onKeyPress="return soloNumeros(event)">

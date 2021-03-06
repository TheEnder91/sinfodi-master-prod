<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel"><i class="fa fa-pencil"></i> Editar Factor por Desempeño</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @include('estimulos.factores.factor3.desempeño.form')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                @can('estimulo-desempeño-edit')
                    <button type="submit" class="btn btn-primary" id="btn_actualizar"><i class="fa fa-save"></i> Guardar</button>
                @endcan
            </div>
        </div>
    </div>
</div>

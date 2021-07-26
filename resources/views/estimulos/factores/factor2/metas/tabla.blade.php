<div class="table-responsive">
    <table id="tblMetas" class="table table-bordered table-striped">
        <caption>Los valores de esta tabla podrán ser modificados a criterío de la Dirección General.</caption>
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">% CUMPLIMIENTO DE METAS</th>
                <th scope="col">F2= FACTOR x Cumplimiento de Indicadores Institucionales</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($metas as $item)
                <tr>
                    <th scope="row" class="text-center" width="2%">{{ $item->id }}</th>
                    <td width="44%" class="text-center">{{ $item->cumplimiento }}</td>
                    <td width="44%" class="text-center">{{ $item->f2 }}</td>
                    <td class="text-center" width="10%">
                        @can('estimulo-meta-show')
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditar" onclick="ver_datos({{ $item->id }});">
                                <i class="fa fa-pencil-alt"></i>
                            </button>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(function(){
        $('#tblMetas').DataTable({
            "order":[[0, "asc"]],
            "language":{
              "lengthMenu": "Mostrar _MENU_ registros por página.",
              "info": "Página _PAGE_ de _PAGES_",
              "infoEmpty": "No se encontraron registros.",
              "infoFiltered": "(filtrada de _MAX_ registros)",
              "loadingRecords": "Cargando...",
              "processing":     "Procesando...",
              "search": "Buscar:",
              "zeroRecords":    "No se encontraron registros.",
              "paginate": {
                              "next":       ">",
                              "previous":   "<"
                          },
            },
            lengthMenu: [[10, 15, 20], [10, 15, 20]]
        });
    });
</script>

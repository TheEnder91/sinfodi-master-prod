<div class="table-responsive">
    <table id="tblObjetivos" class="table table-bordered table-striped">
        <caption>Listado de objetivos establecidos para la evaluación.</caption>
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre del objetivo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <th scope="row" width="5%" class="text-center">{{ $item->id }}</td>
                    <td width="85%">{{ $item->nombre }}</td>
                    <td class="text-center" width="10%">
                        @can('estimulo-objetivo-show')
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
        $('#tblObjetivos').DataTable({
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
            lengthMenu: [[10, 15, 20, 25], [10, 15, 20, 25]]
        });
    });
</script>

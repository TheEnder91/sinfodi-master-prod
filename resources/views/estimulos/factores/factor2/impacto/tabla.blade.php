<div class="table-responsive">
    <table id="tblImpacto" class="table table-bordered table-striped">
        <caption>Listado del factor por nivel de impacto al desarrollo institucional.</caption>
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">F2 = FACTOR</th>
                <th scope="col">Nivel</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($impacto as $item)
                <tr>
                    <th scope="row" class="text-center" width="2%">{{ $item->id }}</th>
                    <td width="44%" class="text-center">{{ $item->factor }}</td>
                    <td width="44%" class="text-center">{{ $item->nivel }}</td>
                    <td class="text-center" width="10%">
                        @can('estimulo-impacto-show')
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
        $('#tblImpacto').DataTable({
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

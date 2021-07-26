<div class="table-responsive">
    <table id="tblResponsabilidades" class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Puntos</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responsabilidades as $item)
                <tr>
                    <th scope="row" class="text-center" width="2%">{{ $item->id }}</th>
                    <td width="83%">{{ $item->nombre }}</td>
                    <td class="text-center" width="5%">{{ $item->puntos }}</td>
                    <td class="text-center" width="10%">
                        @can('estimulo-responsabilidad-show')
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
        $('#tblResponsabilidades').DataTable({
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

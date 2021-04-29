@extends('layouts.app')

@section('title_page')
    <img src="{{ asset('img/panel_control.png') }}" width="50px" height="50px"> Panel de control
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Listado de usuarios</li>
    </ol>
@endsection

@section('content')
    @component('components.card')
        @slot('title_card', 'Listado de usuarios')
        <div class="table-responsive">
            <table id="tblUsers" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="5%">#</th>
                        <th>Usuario</th>
                        <th>Fecha de acceso</th>
                        <th width="10%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                            {{-- @can('admin-user-show') --}}
                                    <a href="{{ route('admin.user.show', $user->id) }}"><i class="fa fa-edit"></i></a>
                            {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @slot('script_tabla')
            <script>
                $(function(){
                    $('#tblUsers').DataTable({
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
                        lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
                    });
                });
            </script>
        @endslot
    @endcomponent
@endsection

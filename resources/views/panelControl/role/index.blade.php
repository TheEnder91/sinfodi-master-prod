@extends('layouts.app')

@section('title_page')
    <img src="{{ asset('img/panel_control.png') }}" width="50px" height="50px"> Panel de control
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Listado de roles</li>
    </ol>
@endsection

@section('content')
    @component('components.card')
        @slot('title_card', 'Listado de roles')
        <section class="text-right">
        @can('admin-role-create')
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary" role="button" aria-disabled="true">
                    <i class="fa fa-plus"></i> Nuevo registro
                </a>
        @endcan
        </section><br>
        <div class="table-responsive">
            <table id="tblRole" class="table table-bordered table-striped">
                <caption>Listado de roles</caption>
                <thead>
                    <tr class="text-center">
                        <th width="5%">#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th width="10%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $item)
                        <tr class="text-center">
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td class="text-left">{{ $item->description }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                            @can('admin-role-show')
                                    <a href="{{ route('admin.role.show', $item->id) }}"><i class="fa fa-edit"></i></a>
                            @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @slot('script_tabla')
            <script>
                $(function(){
                    $('#tblRole').DataTable({
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
        @endslot
    @endcomponent
@endsection

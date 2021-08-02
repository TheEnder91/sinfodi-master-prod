@extends('layouts.app')

@section('title_page')
    <img src="{{ asset('img/panel_control.png') }}" width="50px" height="50px"> Panel de control
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Listado de roles</a></li>
        <li class="breadcrumb-item active">Editar registro(Rol: <b>{{ $row->id }}</b>)</li>
    </ol>
@endsection

@section('content')
    @component('components.card')
        @slot('title_card')
            Editar registro(Rol: <b>{{ $row->id }}</b>)
        @endslot
        {!! Form::open(['route'=>['admin.role.update',$row->id], 'method'=>'PATCH']) !!}
            <div class="row">
                <div class="col-12 col-md-4">
                    {!! Field::text('name', $row->name, ['placeholder'=>'Nombre', 'label'=>'Nombre del rol:', 'readonly']) !!}
                </div>
                <div class="col-12 col-md-8">
                    {!! Field::text('description', $row->description, ['placeholder'=>'Descripción', 'label'=>'Descripción del rol:']) !!}
                </div>
            </div>
            @component('components.card')
                @slot('title_card', 'Asignación de permisos')
                <section class="text-right">
                    <button type="button" class="btn btn-primary" id="check-all">Seleccionar todos los permisos</button>
                </section>
                <script>
                        var checked = false;
                        $('#check-all').on('click',function(){
                            if(checked == false) {
                                $('.form-check-input').prop('checked', true);
                                checked = true;
                                document.getElementById('check-all').innerText = 'Deseleccionar todos los permisos';
                            } else {
                                $('.form-check-input').prop('checked', false);
                                checked = false;
                                document.getElementById('check-all').innerText = 'Seleccionar todos los permisos';
                            }
                        });
                </script>
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($catPermissions as $itemcatP)
                                <a class="nav-link {{ $itemcatP->id_categoria == 1 ? 'active' : '' }}" id="vert-tabs-{{ $itemcatP->id_categoria }}-tab" data-toggle="pill" href="#vert-tabs-{{ $itemcatP->id_categoria }}" role="tab" aria-controls="vert-tabs-{{ $itemcatP->id_categoria }}" aria-selected="true">
                                    {{ $itemcatP->categoria }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane text-left fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                                <div style="column-count:2; list-style: none;">
                                    @foreach ($permissionsPanelControl as $itemPermissions)
                                        <div class="col-12">
                                            <li>{!! Field::checkbox("permission[{$itemPermissions->id}]",
                                                $itemPermissions->id,
                                                $row->hasPermissionTo($itemPermissions->id),
                                                ['label' => $itemPermissions->description])
                                            !!}</li>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane text-left fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                                <div style="column-count:2; list-style: none;">
                                    @foreach ($permissionsEstimulos as $itemPermissions)
                                        <div class="col-12">
                                            <li>{!! Field::checkbox("permission[{$itemPermissions->id}]",
                                                $itemPermissions->id,
                                                $row->hasPermissionTo($itemPermissions->id),
                                                ['label' => $itemPermissions->description])
                                            !!}</li>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcomponent

            <div class="row">
                <div class="col-12">
                    <div class="float-right">
                        <a href="{{ route('admin.role.index') }}" class="btn btn-outline-danger">Cancelar</a>
                        @can('admin-role-edit')
                            <button type="submit" class="ml-2 btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                        @endcan
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    @endcomponent
@endsection

@if (session()->has('process_result'))
    @section('scripts')
        <script>
            $(function() {
                swal({
                    position: 'top-end',
                    type: '{{ session('process_result')['status'] }}',
                    title: '{{ session('process_result')['content'] }}',
                    showConfirmButton: false,
                    timer: 1800
                })
                setTimeout(function(){
                    window.location.href = "{{ route('admin.role.index') }}";
                }, 1800);
            });
        </script>
    @endsection
@endif


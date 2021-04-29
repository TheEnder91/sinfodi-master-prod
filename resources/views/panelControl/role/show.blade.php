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
                <div style="column-count:4; list-style: none;">
                    @foreach ($permissions as $permission)
                        <li>{!! Field::checkbox("permission[{$permission->id}]",
                            $permission->id,
                            $row->hasPermissionTo($permission->id),
                            ['label' => $permission->description])
                        !!}</li>
                    @endforeach
               </div>
            @endcomponent
            <div class="row">
                <div class="col-12">
                    <div class="float-right">
                        <a href="{{ route('admin.role.index') }}" class="btn btn-outline-danger">Cancelar</a>
                        {{-- @can('admin-role-edit') --}}
                            <button type="submit" class="ml-2 btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                        {{-- @endcan --}}
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


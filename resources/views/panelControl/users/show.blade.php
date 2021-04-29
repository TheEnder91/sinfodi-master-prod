@extends('layouts.app')

@section('title_page')
    <img src="{{ asset('img/panel_control.png') }}" width="50px" height="50px"> Panel de control
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Listado de usuarios</a></li>
        <li class="breadcrumb-item active">Editar: <b>{{ $row->username }}</b></li>
    </ol>
@endsection

@section('content')
    {!! Form::open(['route'=>['admin.user.update', $row->id], 'method'=>'PATCH']) !!}
        @component('components.card')
            @slot('title_card')
                Editar registro: <b>{{ $row->username }}
            @endslot
            <div class="row">
                <div class="col-12 col-md-1">
                    {!! Field::text('id', $row->id, ['placeholder'=>'id del usuario', 'label'=>'Id:', 'readonly']) !!}
                </div>
                <div class="col-12 col-md-2">
                    {!! Field::text('username', $row->username, ['placeholder'=>'Usuario', 'label'=>'Usuario:', 'readonly']) !!}
                </div>
                <div class="col-12 col-md-9">
                    @component('components.card')
                        @slot('title_card', 'Asignar rol')
                        <div class="col-12" style="column-count:2; list-style: none;">
                            @foreach ($roles as $rol)
                                <li>{!! Field::checkbox("rol[{$rol->id}]",
                                    $rol->id,
                                    $row->hasRole($rol->id),
                                    ['label' => $rol->description])
                                !!}</li>
                            @endforeach
                        </div>
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="float-right">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-outline-danger">Cancelar</a>
                        @can('admin-user-edit')
                            <button type="submit" class="ml-2 btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                        @endcan
                    </div>
                </div>
            </div>
        @endcomponent
    {!! Form::close() !!}
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
                    window.location.href = "{{ route('admin.user.index') }}";
                }, 1800);
            });
        </script>
    @endsection
@endif

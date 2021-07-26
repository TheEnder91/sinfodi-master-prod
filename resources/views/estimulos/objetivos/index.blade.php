@extends('layouts.app')

@section('title_page')
    <img src="{{ asset('img/estimulos.png') }}" width="70px" height="40px">Estimulos
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Listado de objetivos</li>
    </ol>
@endsection

@section('content')
    @component('components.card')
        @slot('title_card', 'Listado de objetivos')
        <section class="text-right">
            @can('estimulo-objetivo-create')
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" onclick="$('#formNuevo')[0].reset();">
                    <i class="fa fa-plus"></i> Nuevo objetivo
                </button>
            @endcan
        </section><br>
        <div id="tabla"></div>
        @include('estimulos.objetivos.modalEditar')
        {{-- Modal nuevo registro --}}
        @section('title_modal')
            <i class="fa fa-plus"></i> Agregar objetivo
        @endsection
        @section('content_modal')
            <form id="formNuevo" action="{{ route('estimulo.objetivo.store') }}" method="post">
                @csrf
                @include('estimulos.objetivos.form')
                @section('buttons_modal')
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="ml-2 btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                </form>
            @endsection
        @endsection
        {{-- Termina modal nuevo registro --}}
    @endcomponent
@endsection

@section('scripts')
    @if (session()->has('process_result'))
        <script>
            $(function() {
                swal({
                    position: 'top-end',
                    type: '{{ session('process_result')['status'] }}',
                    title: '{{ session('process_result')['content'] }}',
                    showConfirmButton: false,
                    timer: 1800
                });
            });
        </script>
    @endif
    <script>
        $(document).ready(function(){
            ver_tabla();
        });

        function ver_tabla(){
            $.get('tblObjetivos', function(data){
                $('#tabla').empty().html(data);
            });
        }

        function ver_datos(id){
            $.get('objetivos/' + id + '/edit', function(data){
                $('#id').val(data.id);
                $('input[name="nombre"]').val(data.nombre);
            });

            $('#btn_actualizar').on('click', function(){
                var id = $('#id').val();
                var nombre = $('input[name="nombre"]').val();
                var token = $('input[name="_token"]').val();
                swal({
                    type: 'warning',
                    title: "Se actualizara el registro.",
                    text: "¿Desea continuar?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Si, actualizar",
                    denyButtonText: "Cancelar",
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: 'objetivos/' + id,
                            type: 'PUT',
                            data: {
                                nombre: nombre,
                                _token: token
                            },
                            success: function(data){
                                console.log(data);
                                if(data == "exito"){
                                    $('#modalEditar').modal('hide');
                                    swal({
                                        position: 'top-end',
                                        type: 'success',
                                        title: 'Se actualizo correctamente el registro.',
                                        showConfirmButton: false,
                                        timer: 1800
                                    });
                                    ver_tabla();
                                }
                            }
                        });
                    }
                });
            });
        }
    </script>
@endsection

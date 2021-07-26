@extends('layouts.app')

@section('title_page')
    <img src="{{ asset('img/estimulos.png') }}" width="70px" height="40px">Estimulos
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Tabla 1. Actividades A</li>
    </ol>
@endsection

@section('content')
    @component('components.card')
        @slot('title_card', 'Tabla 1. Actividades A')
        <section class="text-right">
            @can('estimulo-actividadA-create')
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" onclick="$('#formNuevo')[0].reset();">
                    <i class="fa fa-plus"></i> Nuevo criterio
                </button>
            @endcan
        </section><br>
        <div id="tabla"></div>
        @include('estimulos.factores.factor1.actividadesA.modalEditar')
        {{-- Modal nuevo registro --}}
        @section('title_modal')
            <i class="fa fa-plus"></i> Agregar criterio
        @endsection
        @section('content_modal')
            <form id="formNuevo" action="{{ route('estimulo.configuracion.factor1.actividadA.store') }}" method="post">
                @csrf
                @include('estimulos.factores.factor1.actividadesA.form')
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
            $.get('tblActividadesA', function(data){
                $('#tabla').empty().html(data);
            });
        }

        function soloNumeros(e){
	        var key = window.Event ? e.which : e.keyCode;
	        return ((key >= 48 && key <= 57) || (key==8) || (key==46));
        }

        function ver_datos(id){
            $.get('actividadesA/' + id + '/edit', function(data){
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#id_objetivo').val(data.id_objetivo);
                $('input[name="puntos"]').val(data.puntos);
            });

            $('#btn_actualizar').on('click', function(){
                var id = $('#id').val();
                var nombre = $('#nombre').val();
                var id_objetivo = $('#id_objetivo').val();
                var puntos = $('input[name="puntos"]').val();
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
                            url: 'actividadesA/' + id,
                            type: 'PUT',
                            data: {
                                nombre: nombre,
                                id_objetivo: id_objetivo,
                                puntos: puntos,
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

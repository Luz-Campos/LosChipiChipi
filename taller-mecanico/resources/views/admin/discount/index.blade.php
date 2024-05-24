@extends('adminlte::page')
@section('title', 'Descuentos')
@section('plugins.Sweetalert2, true')
@section('plugins.Datatables, true')
@section('plugins.Select2, true')
@section('content_header')
    <h1>Descuentos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addDiscount">
                <i class="fas fa-plus"></i> Agregar Descuento
            </button>
        </div>
        <div class="card-body">
            <div class="container-fluid table-responsive">
                <table class="table table-striped" id="discount">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Descuento (%)</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Termino</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($discount as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->producto }}</td>
                                <td>{{ $d->discount }}%</td>
                                <td>{{ \Carbon\Carbon::parse($d->date_start)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($d->date_end)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</td>
                                <td>
                                    <button class="btn btn-success" data-toggle="modal"
                                        data-target="#ViewDiscount{{ $d->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Imagen
                                    </button>
                                    <button class="btn btn-warning" data-toggle="modal"
                                        data-target="#editDiscount{{ $d->id }}">
                                        <i class="fa fa-pen" aria-hidden="true"></i> Editar
                                    </button>
                                    <button class="btn btn-danger destroy" data-toggle="modal"
                                        data-target="#deleteDiscount{{ $d->id }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                            @include('admin.discount.modals.view')
                            @include('admin.discount.modals.edit')
                            @include('admin.discount.modals.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.discount.modals.create')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/dataTable.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.create_discount').on('submit', function(e) {
                e.preventDefault(); // Evitar que el formulario se envíe normalmente

                var formData = new FormData(this); // Obtener los datos del formulario en formato FormData

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                title: 'Registro Creado!',
                                text: 'El registro ha sido creado correctamente'
                            }).then(function() {
                                window.location.href =
                                    "{{ route('descuentos') }}";
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error!',
                                text: 'Hubo un problema al crear el registro'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: 'Hubo un problema al enviar la solicitud al servidor'
                        });
                    }
                });
            });
        });


        $(document).ready(function() {
            $('.update_discount').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                title: 'Registro Actualizado!',
                                text: 'El registro ha sido actualizado correctamente'
                            }).then(function() {
                                window.location.href =
                                    "{{ route('descuentos') }}";
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error!',
                                text: 'Hubo un problema al actualizar el registro'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: 'Hubo un problema al enviar la solicitud al servidor'
                        });
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.delete-confirm').on('click', function() {
                var discountId = $(this).data('id');
                var url = '/admin/discount/delete/' + discountId;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: '¡Registro Eliminado!',
                                text: 'El registro ha sido eliminado exitosamente.',
                                type: 'success'
                            }).then(function() {
                                window.location.href = "{{ route('descuentos') }}";
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Hubo un problema al eliminar el registro.',
                                type: 'error'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un problema al enviar la solicitud al servidor.',
                            type: 'error'
                        });
                    }
                });
            });
        });
    </script>

@stop

@extends('adminlte::page')
@section('title', 'Productos')
@section('plugins.Sweetalert2, true')
@section('plugins.Datatables, true')
@section('plugins.Select2, true')
@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addProduct">
                <i class="fas fa-plus"></i> Agregar Producto
            </button>
        </div>
        <div class="card-body">
            <div class="container-fluid table-responsive">
                <table class="table table-striped" id="product">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoria</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->producto }}</td>
                                <td>{{ $p->description }}</td>
                                <td>${{ $p->price }}</td>
                                <td>{{ $p->stock }}</td>
                                <td>{{ $p->categoria }}</td>
                                <td>
                                    <button class="btn btn-success" data-toggle="modal"
                                        data-target="#ViewProduct{{ $p->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i> Visualizar
                                    </button>
                                    <button class="btn btn-warning" data-toggle="modal"
                                        data-target="#editProduct{{ $p->id }}">
                                        <i class="fa fa-pen" aria-hidden="true"></i> Editar
                                    </button>
                                    <button class="btn btn-danger destroy" data-toggle="modal"
                                        data-target="#deleteProduct{{ $p->id }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                            @include('admin.products.modals.view')
                            @include('admin.products.modals.edit')
                            @include('admin.products.modals.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.products.modals.create')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/dataTable.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.create_product').on('submit', function(e) {
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
                                    "{{ route('productos') }}";
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
            $('.update_product').on('submit', function(e) {
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
                                    "{{ route('productos') }}";
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
                var productId = $(this).data('id');
                var url = '/admin/product/delete/' + productId;

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
                                window.location.href = "{{ route('productos') }}";
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

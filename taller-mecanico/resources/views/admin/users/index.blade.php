@extends('adminlte::page')
@section('title', 'Usuarios')
@section('plugins.Sweetalert2, true')
@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addUser">
                <i class="fas fa-plus"></i> Agregar Usuario
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped-table-responsive" id="category">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#editUser{{ $u->id }}">
                                    <i class="fa fa-pen"></i> Editar
                                </button>
                                <button class="btn btn-primary delete-category" data-toggle="modal"
                                    data-target="#passwordUser{{ $u->id }}">
                                    <i class=" fas fa-fw fa-key"></i> Cambiar contraseña
                                </button>
                                <button class="btn btn-danger delete-category" data-toggle="modal"
                                    data-target="#deleteUser{{ $u->id }}">
                                    <i class=" fa fa-trash"></i> Borrar
                                </button>

                            </td>
                        </tr>
                        @include('admin.users.modals.edit')
                        @include('admin.users.modals.delete')
                        @include('admin.users.modals.changepassword')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.users.modals.create')

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/dataTable.js') }}"></script>

@section('js')
    <script>
        $(document).ready(function() {
            $('.create_user').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                title: 'Registro creado!',
                                text: 'El registro fue creado correctamente',
                            }).then(function() {
                                window.location.href = "{{ route('user') }}";
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error!',
                                text: 'Hubo un problema al crear el registro',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: 'Hubo un problema al enviar la solicitud al servidor',
                        });
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.update_user').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                'title': 'Registro Actualizado!',
                                'text': 'El registro se ha actualizado correctamente',
                            }).then(function() {
                                window.location.href = "{{ route('user') }}";
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error!',
                                text: 'Hubo un problema al actualizar el registro',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: 'Hubo un problema al enviar la solicitud al servidor',
                        });
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.delete-confirm').on('click', function() {
                var userId = $(this).data('id');
                var url = '/admin/users/delete/' + userId;

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
                                window.location.href = "{{ route('user') }}";
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

        $(document).ready(function() {
            $('.password_user').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                'title': 'Registro Actualizado!',
                                'text': 'El registro se ha actualizado correctamente',
                            }).then(function() {
                                window.location.href = "{{ route('user') }}";
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error!',
                                text: 'Hubo un problema al actualizar el registro',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: 'Hubo un problema al enviar la solicitud al servidor',
                        });
                    }
                });
            });
        });
    </script>
@endsection

@stop

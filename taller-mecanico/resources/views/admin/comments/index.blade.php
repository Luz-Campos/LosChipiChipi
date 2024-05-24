@extends('adminlte::page')
@section('title', 'Comentarios')
@section('plugins.Sweetalert2, true')
@section('content_header')
    <h1>Comentarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Comentarios
        </div>
        <div class="card-body">
            <table class="table table-striped-table-responsive" id="category">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comment as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->email }}</td>
                            @if ($c->status == 0)
                                <td class="text-danger">No Leido</td>
                            @else
                                <td class="text-success">Leido</td>
                            @endif
                            <td>
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#detailComment{{ $c->id }}">
                                    <i class="fas fa-eye"></i> Detalles
                                </button>
                                @if ($c->status == 0)
                                    <button class="btn btn-success change-status" data-id="{{ $c->id }}">
                                        <i class=" fas fa-check"></i> Marcar como leido
                                    </button>
                                @endif
                                <button class="btn btn-danger delete-category" data-toggle="modal"
                                    data-target="#deleteComment{{ $c->id }}">
                                    <i class=" fa fa-trash"></i> Borrar
                                </button>
                            </td>
                        </tr>
                        @include('admin.comments.modals.detail')
                        @include('admin.comments.modals.delete')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/dataTable.js') }}"></script>

@section('js')
    <script>
        $(document).ready(function() {
            $('.change-status').click(function() {
                var commentId = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: '/admin/comments/read',
                    data: {
                        commentId: commentId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            type: 'success',
                            title: 'Marcado como leido',
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(function() {
                            window.location.href = "{{ route('comments') }}";
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            type: error,
                            title: 'Error al actualizar',
                            text: 'No se puedo cambiar el status, intentelo de nuevo'
                        });
                    }
                });
            });
        });


        $(document).ready(function() {
            $('.delete-confirm').on('click', function() {
                var commentId = $(this).data('id');
                var url = '/admin/comments/delete/' + commentId;

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
                                window.location.href = "{{ route('comments') }}";
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
@endsection

@stop

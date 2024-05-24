@extends('adminlte::page')
@section('title','Categorias')
@section('plugins.Sweetalert2, true')
@section('content_header')
<h1>Categorias</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success float-right glyphicon" data-toggle="modal" data-target="#addCategory">
            <i class="fas fa-plus"></i> Agregar Categoria
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped-table-responsive" id="category">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editCategory{{$c->id}}">
                            <i class="fa fa-pen"></i> Editar
                        </button>
                        <button class="btn btn-danger delete-category" data-toggle="modal" data-target="#deleteCategory{{ $c->id }}">
                            <i class=" fa fa-trash"></i> Borrar
                        </button>
                    </td>
                </tr>
                @include('admin.category.modals.edit')
                @include('admin.category.modals.delete')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.category.modals.create')

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{asset('js/dataTable.js')}}"></script>

@section('js')
<script>
    $(document).ready(function() {
        $('.create_category').on('submit', function(e) {
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
                            window.location.href = "{{route('categorias')}}";
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
        $('.update_category').on('submit', function(e) {
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
                            window.location.href = "{{route('categorias')}}";
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
            var categoryId = $(this).data('id');
            var url = '/admin/category/delete/' + categoryId;

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
                            window.location.href = "{{ route('categorias') }}";
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

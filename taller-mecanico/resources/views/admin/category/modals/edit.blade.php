<!-- Modal -->
<div class="modal fade" id="editCategory{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryLabel">Agregar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="update_category" action="{{route('category.update', $c->id)}}" method="POST" enctype="multipart/form-data" id="createCategory">
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre de la categoria*:</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{$c->name}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar</button>
                    <button type="submit" class="btn btn-success" id="formSubmit">
                        <i class="fa fa-save" aria-hidden="true"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editProduct{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="addProductLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="update_product" action="{{ route('product.update', $p->id) }}" method="POST"
                enctype="multipart/form-data" id="createProduct">
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nombre del Producto*:</label>
                        <input type="text" name="name" id="name" class="form-control" required
                            value="{{ $p->producto }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion del Producto</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $p->description }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price">Precio*:</label>
                            <input type="number" name="price" id="price" class="form-control" required
                                value="{{ $p->price }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="stock">Stock*:</label>
                            <input type="number" name="stock" id="stock" class="form-control" required
                                value="{{ $p->stock }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Categoria*:</label>
                        <select name="categoria" id="categoria" class="form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}" @if ($c->id == $p->id_category) selected @endif>
                                    {{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="name">Imagen*:</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar</button>
                    <button type="submit" class="btn btn-success" id="formSubmit">
                        <i class="fa fa-save" aria-hidden="true"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

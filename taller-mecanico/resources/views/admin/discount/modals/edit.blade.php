<div class="modal fade" id="editDiscount{{ $d->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editDiscountLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDiscountLabel">Editar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="update_discount" action="{{ route('discount.update', $d->id) }}" method="POST"
                enctype="multipart/form-data" id="createDiscount">
                @method('PUT')
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Producto*:</label>
                        <select name="producto" id="producto" class="form-control form-control-lg" required>
                            <option value="">Seleccione la opcion correspondiente</option>
                            @foreach ($product as $p)
                                <option value="{{ $p->id }}" @if ($p->id == $d->id_producto) selected @endif>
                                    {{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Descuento (En porcentaje)*:</label>
                        <input type="number" name="descuento" id="descuento" class="form-control" required
                            value="{{ $d->discount }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="price">Fecha de Inicio*:</label>
                            <input type="date" name="date_start" id="date_start" class="form-control" required
                                value="{{ $d->date_start }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="stock">Fecha de Termino*:</label>
                            <input type="date" name="date_end" id="date_end" class="form-control" required
                                value="{{ $d->date_end }}">
                        </div>
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

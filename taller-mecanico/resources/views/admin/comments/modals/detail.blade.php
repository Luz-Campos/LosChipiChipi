<div class="modal fade" id="detailComment{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="showLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 text-center" id="exampleModalLabel">Detalles</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><span style="font-weight:bolder">Nombre: </span>{{ $c->name }}</p>
                <p><span style="font-weight:bolder">Correo: </span>{{ $c->email }}</p>
                <p><span style="font-weight:bolder">Mensaje: </span>{{ $c->message }}</p>
                <p><span style="font-weight:bolder">Status: </span>
                    @if ($c->status == 0)
                        <span class="text-danger">No Leido</span>
                    @else
                        <span class="text-success">Leido</span>
                    @endif
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

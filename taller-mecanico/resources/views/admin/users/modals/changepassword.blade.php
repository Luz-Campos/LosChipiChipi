<div class="modal fade" id="passwordUser{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="EditUserLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserLabel">Actualizar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('user.password', $u->id) }}" class="password_user">
                @method('PUT')
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                        <label for="contraseña"
                            class="col-md-4 col-form-label text-md-end">{{ __('Contraseña nueva') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('name') is-invalid @enderror" name="password" value=""
                                required autofocus>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-success" id="formSubmit" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</div>

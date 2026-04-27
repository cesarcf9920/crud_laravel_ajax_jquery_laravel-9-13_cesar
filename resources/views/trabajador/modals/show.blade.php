<div class="modal-header">
    <h5 class="modal-title">Detalle de Usuario</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" value="{{ $usuario->name }}" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="text" class="form-control" value="{{ $usuario->phone }}" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="text" class="form-control" value="{{ $usuario->email }}" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Compañía</label>
        <input type="text" class="form-control" value="{{ $usuario->compañia }}" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Calle</label>
        <input type="text" class="form-control" value="{{ $usuario->street }}" readonly>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Cerrar
    </button>
</div>
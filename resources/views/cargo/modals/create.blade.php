    <div class="modal-header">
        <h5 class="modal-title">Nuevo cargo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <div class="modal-body">

    {!! Form::open([
        'route' => ['cargo.store'],
        'class' => 'form-horizontal',
        'id' => 'form-create-cargo'
    ]) !!}
    
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>

    {!! Form::close() !!}

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" form="form-create-cargo" class="btn btn-success">
            Guardar
        </button>
    </div>
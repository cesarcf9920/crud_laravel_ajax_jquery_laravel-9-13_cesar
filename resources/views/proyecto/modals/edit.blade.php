<div class="modal-header">
    <h5 class="modal-title">Editar proyecto</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

{!! Form::model($proyecto, [
    'route' => ['proyecto.update', $proyecto->id],
    'method' => 'PATCH',
    'id' => 'form-create-proyecto'
]) !!}

<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control" 
        value="{{ $proyecto->nombre ?? '' }}">
</div>

{!! Form::close() !!}

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="submit" form="form-create-proyecto" class="btn btn-primary">
        Actualizar
    </button>
</div>
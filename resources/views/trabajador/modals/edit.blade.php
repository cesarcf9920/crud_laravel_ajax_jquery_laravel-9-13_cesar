<div class="modal-header">
    <h5 class="modal-title">Editar trabajador</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

{!! Form::model($trabajador, [
    'route' => ['trabajador.update', $trabajador->id],
    'method' => 'PATCH',
    'id' => 'form-create-trabajador'
]) !!}
<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" class="form-control" 
        value="{{ $trabajador->nombre ?? '' }}">
</div>

<div class="mb-3">
    <label>Cargo</label>
    <select name="cargo_id" class="form-control">
        <option value="">Seleccione un cargo</option>
        @foreach($cargos as $cargo)
            <option value="{{ $cargo->id }}" 
                {{ (isset($trabajador) && $trabajador->cargo_id == $cargo->id) ? 'selected' : '' }}>
                {{ $cargo->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Proyecto</label>
    <select name="proyecto_id" class="form-control">
        <option value="">Seleccione un proyecto</option>
        @foreach($proyectos as $proyecto)
            <option value="{{ $proyecto->id }}" 
                {{ (isset($trabajador) && $trabajador->proyecto_id == $proyecto->id) ? 'selected' : '' }}>
                {{ $proyecto->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Tipo pago</label>
    <select name="tipo_pago_id" id="cmb_tipo_pago" class="form-control">
        <option value="">Seleccione un tipo de pago</option>
        @foreach($tipos_pagos as $tipo_pago)
            <option value="{{ $tipo_pago->id }}" 
                {{ (isset($trabajador) && $trabajador->tipo_pago_id == $tipo_pago->id) ? 'selected' : '' }}>
                {{ $tipo_pago->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Tipo cambio</label>
    <select name="tipo_cambio_id" id="cmb_tipo_cambio" class="form-control">
        <option value="">Seleccione un tipo de cambio</option>
        @foreach($tipos_cambios as $tipo_cambio)
            <option value="{{ $tipo_cambio->id }}" 
                {{ (isset($trabajador) && $trabajador->tipo_cambio_id == $tipo_cambio->id) ? 'selected' : '' }}>
                {{ $tipo_cambio->nombre }}
            </option>
        @endforeach
    </select>
</div>
{!! Form::close() !!}

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="submit" form="form-create-trabajador" class="btn btn-primary">
        Actualizar
    </button>
</div>
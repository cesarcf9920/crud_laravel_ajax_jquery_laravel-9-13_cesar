    <div class="modal-header">
        <h5 class="modal-title">Nuevo trabajador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <div class="modal-body">

    {!! Form::open([
        'route' => ['trabajador.store'],
        'class' => 'form-horizontal',
        'id' => 'form-create-trabajador'
    ]) !!}
    
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control">
    </div>

    <div class="mb-3">
        <label>Proyectos</label>
        <select name="proyecto_id" class="form-control">
            <option value="">Seleccione un proyecto</option>
            @foreach($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tipo cargo</label>
        <select name="cargo_id" class="form-control">
            <option value="">Seleccione un cargo</option>
            @foreach($cargos as $cargo)
                <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tipo pago</label>
        <select name="tipo_pago_id" id="cmb_tipo_pago" class="form-control" required>
            <!--<option value="">Seleccione un tipo de pago</option>-->
        </select>
    </div>

    <div class="mb-3">
        <select name="tipo_cambio_id" id="cmb_tipo_cambio" class="form-control" disabled>
            <!--<option value="">Seleccione un tipo de cambio</option>-->
        </select>
    </div>
    @php
        $tiposPago = [
            ['id' => 1, 'nombre' => 'Contado'],
            ['id' => 2, 'nombre' => 'Crédito'],
            ['id' => 3, 'nombre' => 'Transferencia'],
        ];
    @endphp
    <select name="tipo_pago" class="form-control">
        <option value="">Seleccione</option>

        @foreach($tiposPago as $item)
            <option value="{{ $item['id'] }}">
                {{ $item['nombre'] }}
            </option>
        @endforeach
    </select>

    {!! Form::close() !!}

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" form="form-create-trabajador" class="btn btn-success">
            Guardar
        </button>
    </div>

    
<script>
    function cargarTipoPago() {
        $.ajax({
            url: 'tipos_pagos/list',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log('tipo pago:',data);
                let select = $('#cmb_tipo_pago');

                // limpiar opciones anteriores
                select.empty();
                select.append('<option value="">Seleccione un tipo de pago</option>');

                // agregar opciones desde Laravel
                data.forEach(function(tipo) {console.log('tipo:',tipo);
                    select.append(
                        '<option value="' + tipo.id + '">' + tipo.nombre + '</option>'
                        //`<option value="${tipo.id}">${tipo.nombre}</option>`
                    );
                });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Error al cargar tipos de pago');
            }
        });
    }

     /*$.get(url, function(data){
                const view = data.allocated_view;
                $(template).html(view);
            });*/

    //$("#cmb_tipo_pago").on("change", function() {
    // evento correcto (delegado)
    $(document).on("change", "#cmb_tipo_pago", function() {

        var id = $(this).val();
        let combo = $('#cmb_tipo_cambio');

        console.log("ID tipo pago:", id);

        combo.html('<option value="">Seleccione tipo de cambio</option>');
        combo.prop('disabled', true);

        if (!id) return;

        $.ajax({
            url: 'tipos_cambios/list/' + id, //1ra opcion el contralador con la variable tipo_pago_id
            //url: 'tipos_cambios/list/',//2da opcion
            type: 'GET',
            dataType: 'json',
            //data: { tipo_pago_id: id }, //2da opcion en controlador con request ahi vienen las variables  /tipos_cambios/list?tipo_pago_id=1
            success: function(data) {
                console.log("tipo cambio:", data);
                data.forEach(function(item) {
                    combo.append(
                        '<option value="' + item.id + '">' + item.nombre + '</option>'
                    );
                });

                combo.prop('disabled', false);
            },
            error: function() {
                alert('Error al cargar tipo de cambio');
                combo.prop('disabled', false);
            }
        });
    });
    $(document).ready(function () {
        cargarTipoPago();
    });

</script>
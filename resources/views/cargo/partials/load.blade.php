<table class="table table-hover table-striped align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th width="150">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cargos as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nombre }}</td>
            <td class="text-center">

                    <!-- Ver -->
                    <!--<a title="Detalle"
                       href="{{ route('cargo.show', $c->id) }}"
                       class="btn btn-sm btn-info btn-show">
                        <i class="bi bi-eye"></i>
                    </a>-->

                    <!-- Editar -->
                    <a title="Editar"
                       href="{{ route('cargo.edit', $c->id) }}"
                       class="btn btn-sm btn-warning btn-edit">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <!-- Eliminar -->
                    <button title="Eliminar"
                            data-id="{{ $c->id }}"
                            data-name="{{ $c->nombre }}"
                            class="btn btn-sm btn-danger btn-delete">
                        <i class="bi bi-trash"></i>
                    </button>

                </td>
        </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center text-muted">
                    No se encontraron resultados
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-between align-items-center mt-2">

    <small class="text-muted">
        Mostrando {{ $cargos->firstItem() }} 
        a {{ $cargos->lastItem() }} 
        de {{ $cargos->total() }}
    </small>

</div>
<table class="table table-hover table-striped align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th width="150">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($proyectos as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nombre }}</td>
            <td class="text-center">

                    <!-- Ver -->
                    <!--<a title="Detalle"
                       href="{{ route('proyecto.show', $p->id) }}"
                       class="btn btn-sm btn-info btn-show">
                        <i class="bi bi-eye"></i>
                    </a>-->

                    <!-- Editar -->
                    <a title="Editar"
                       href="{{ route('proyecto.edit', $p->id) }}"
                       class="btn btn-sm btn-warning btn-edit">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <!-- Eliminar -->
                    <button title="Eliminar"
                            data-id="{{ $p->id }}"
                            data-name="{{ $p->nombre }}"
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
        Mostrando {{ $proyectos->firstItem() }} 
        a {{ $proyectos->lastItem() }} 
        de {{ $proyectos->total() }}
    </small>

</div>
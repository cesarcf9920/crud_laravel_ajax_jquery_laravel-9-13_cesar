<table class="table table-hover table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Proyecto</th>
            <th>Estado</th>
            <th class="text-center" style="width:150px;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($trabajadores as $trabajador)
        <tr>
            <td>{{ $trabajador->nombre }}</td>
            <td>{{ $trabajador->cargo?->nombre }}</td>
            <td>{{ $trabajador->proyecto?->nombre }}</td>
            <td>
                <span class="badge bg-{{ $trabajador->activo ? 'success' : 'secondary' }}">
                    {{ $trabajador->activo ? 'Activo' : 'Inactivo' }}
                </span>
            </td>
            <td class="text-center">
                <a href="{{ route('trabajador.edit', $trabajador->id) }}"
                   class="btn btn-sm btn-warning btn-edit">
                    <i class="bi bi-pencil"></i>
                </a>

                <button data-id="{{ $trabajador->id }}"
                        data-name="{{ $trabajador->nombre }}"
                        class="btn btn-sm btn-danger btn-delete">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">
                No se encontraron resultados
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-between align-items-center flex-wrap mt-2">

    <small class="text-muted">
        Mostrando {{ $trabajadores->firstItem() }}
        a {{ $trabajadores->lastItem() }}
        de {{ $trabajadores->total() }}
    </small>

    {!! $trabajadores->links() !!}

</div>
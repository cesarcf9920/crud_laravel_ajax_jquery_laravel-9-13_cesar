@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('trabajador.index') }}">
                <i class="bi bi-house"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('trabajador.index') }}">Trabajadores</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Lista de trabajadores
        </li>
    </ol>
</nav>
@endsection

@section('topbar')
<a class="btn btn-success" id="btn-create" href="{{ route('trabajador.create') }}">
    <i class="bi bi-plus-lg"></i>
    Nuevo trabajador
</a>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">
        
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Trabajadores</h5>
        </div>

        <div class="card-body">
            
            <div class="row mb-3">

                <div class="col-md-3">
                    <input type="text" id="search" class="form-control" placeholder="Buscar...">
                </div>

                <div class="col-md-2">
                    <select id="cargo_id" name="cargo_id" class="form-control select2">
                        <option value=""> Seleccionar cargo </option>
                        @foreach($cargos as $cargo)
                            <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <select id="estado" class="form-control select2">
                        <option value=""> Seleccionar estado </option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

            </div>

            <div id="table-content">
                <!-- AJAX -->
            </div>

        </div>

    </div>

    <!-- DELETE FORM -->
    {!! Form::open([
        'route' => ['trabajador.delete', ':ROW_ID'],
        'method' => 'DELETE',
        'id' => 'form-delete'
    ]) !!}
    {!! Form::close() !!}

    <!-- Modal -->
    <div id="modal-form" class="modal fade" tabindex="-1"><!-- tabindex="-1" ?-->
        <div class="modal-dialog modal-lg modal-dialog-centered"><!-- modal-dialog-centered centrará el modal en la pantall -->
            <div class="modal-content"></div>
        </div>
    </div>

</div>
@endsection

@push('scripts')

<script>
    var url_load     = "{{ route('trabajador.load') }}";
    var entity_title = "TRABAJADOR";
</script>

<!-- Plugins -->
<script src="{{ asset('js/filter.js') }}"></script>

<!-- Index JS -->
<script src="{{ asset('app/trabajador/index.js') }}"></script>

@endpush
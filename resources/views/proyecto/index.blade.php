@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('proyecto.index') }}">
                <i class="bi bi-house"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('proyecto.index') }}">Proyectos</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Lista de proyectos
        </li>
    </ol>
</nav>
@endsection

@section('topbar')
<a class="btn btn-success" id="btn-create" href="{{ route('proyecto.create') }}">
    <i class="bi bi-plus-lg"></i>
    Nuevo proyecto
</a>
@endsection

@section('content')
<div class="card">
        
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">Proyectos</h5>
        <!--<button class="btn btn-success" id="btn-create">Nuevo</button>-->
    </div>

    <div class="card-body">
        <div id="table-content">
            <!-- AJAX -->
        </div>
    </div>

    <!-- DELETE FORM -->
    {!! Form::open([
        'route' => ['proyecto.delete', ':ROW_ID'],
        'method' => 'DELETE',
        'id' => 'form-delete'
    ]) !!}
    {!! Form::close() !!}

    <!-- Modal -->
    <div id="modal-form" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content"></div>
        </div>
    </div>

</div>
@endsection

@push('scripts')

<script>
    var url_load     = "{{ route('proyecto.load') }}";
    var entity_title = "PROYECTO";
</script>

<!-- Plugins -->
<script src="{{ asset('js/filter.js') }}"></script>

<!-- Index JS -->
<script src="{{ asset('app/proyecto/index.js') }}"></script>

@endpush
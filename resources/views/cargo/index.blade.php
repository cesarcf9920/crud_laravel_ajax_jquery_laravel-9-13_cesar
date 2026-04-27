@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('cargo.index') }}">
                <i class="bi bi-house"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('cargo.index') }}">Cargos</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Lista de cargos
        </li>
    </ol>
</nav>
@endsection

@section('topbar')
<a class="btn btn-success" id="btn-create" href="{{ route('cargo.create') }}">
    <i class="bi bi-plus-lg"></i>
    Nuevo cargo
</a>
@endsection

@section('content')
<div class="card">
        
    <div class="card-header d-flex justify-content-between ">
        <h5 class="mb-0">Cargos</h5>
        <!--<button class="btn btn-success" id="btn-create">Nuevo</button>-->
    </div>
    <div class="card-body">
        <div id="table-content">
            <!-- AJAX -->
        </div>
    </div>

    <!-- DELETE FORM -->
    {!! Form::open([
        'route' => ['cargo.delete', ':ROW_ID'],
        'method' => 'DELETE',
        'id' => 'form-delete'
    ]) !!}
    {!! Form::close() !!}

    <!-- Modal -->
    <div id="modal-form" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered"><!-- modal-dialog-centered centrará el modal en la pantall -->
            <div class="modal-content"></div>
        </div>
    </div>

</div>
@endsection

@push('scripts')

<script>
    var url_load     = "{{ route('cargo.load') }}";
    var entity_title = "CARGO";
</script>

<!-- Plugins -->
<script src="{{ asset('js/filter.js') }}"></script>

<!-- Index JS -->
<script src="{{ asset('app/cargo/index.js') }}"></script>

@endpush
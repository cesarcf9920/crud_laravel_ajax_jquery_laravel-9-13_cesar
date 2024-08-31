@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="crumb-active">
                <a href="{{ route('usuario.index') }}">Lista de Usuarios</a>
        </li>  
        <li class="crumb-icon">
            <a href="{{ route('usuario.index') }}">
                <span class="glyphicon glyphicon-home"></span>
            </a>
        </li>
        <li class="crumb-link">
            <a href="{{ route('usuario.index') }}">Home</a>
        </li>
        <li class="crumb-link">
            <a href="{{ route('usuario.index') }}">Usuarios</a>
        </li>
        <li class="crumb-trail">
            <stronh>Lista de Usuarios</strong>
        </li>        
    </ol>
@endsection

@section('topbar')
<a class="btn btn-success" id="btn-create" href="{{ route('usuario.create') }}">
    <i class="fa fa-plus"></i>
    <b>NUEVO USUARIO</b>
</a>
@endsection

@section('content')
<div class="theme-primary theme-primary">
    <div class=" center-block"> 
        <div class="content-table">
            <div class="panel">
                <div class="panel-menu p12 theme-primary">
                </div>
                <div class="center-block">  
                    <div id="table-content">
                        
                    </div>
                </div>   
    
            </div>
        </div>
    </div>

    <!-- DELETE FORM -->
    {!! Form::open([ 'route' => ['usuario.delete', ':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
</div>
@endsection

@push('scripts')

    <script type="text/javascript">        
        var url_load                = "{{ route('usuario.load') }}";
        var entity_title            = "USUARIO";
    </script>
    
    <!-- Touchspin -->
    <script type="text/javascript" src="{{ asset('bower_components/vendor/plugins/touchspin/jquery.bootstrap-touchspin.js') }}"></script>
    <!-- Bootbox modal + functions(modal, alerts Customized) -->
    <script type="text/javascript" src="{{ asset('js/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/filter.js') }}"></script>  
     <!-- Bootstrap-datetimepicker Plugin + moment Dependency -->
     <script type="text/javascript" src="{{ asset('bower_components/vendor/plugins/fullcalender/lib/moment.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('bower_components/vendor/plugins/datetimepicker/src/bootstrap-datetimepicker.js') }}"></script>
    <!-- Select2 v.4 -->
    <script type="text/javascript" src="{{ asset('bower_components/vendor/plugins/select2v4/dist/js/select2.js') }}"></script>  
    <!-- Validations JS -->
    @include('scripts-group.jquery-validation')
    <!-- Index JS -->
    <script type="text/javascript" src="{{ asset('app/usuario/index.js') }}"></script>
@endpush

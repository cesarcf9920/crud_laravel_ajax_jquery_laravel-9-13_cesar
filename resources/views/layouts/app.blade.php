<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { overflow-x: hidden; }
        .sidebar { width: 250px; height: 100vh; position: fixed; }
        .content { margin-left: 250px; }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar bg-dark text-white p-3">
        <h5 class="text-center">Sistema</h5>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('trabajador.index') }}" class="nav-link text-white">
                    <i class="bi bi-people"></i> Trabajadores
                </a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('cargo.index') }}" class="nav-link text-white">
                    <i class="bi bi-people"></i> Cargos
                </a>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('proyecto.index') }}" class="nav-link text-white">
                    <i class="bi bi-people"></i> Proyectos
                </a>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="content w-100">

        <!-- TOPBAR -->
        <nav class="navbar bg-light shadow-sm px-3">
            <div class="container-fluid">
                <div>@yield('breadcrumb')</div>
                <div>@yield('topbar')</div>
            </div>
        </nav>

        <!-- MAIN -->
        <div class="p-4">
            @yield('content')
        </div>

    </div>

</div>

<!-- jQuery PRIMERO -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>-->

@stack('scripts')

<script type="text/javascript">
    /*$.ajaxSetup({
        statusCode: {
            422: function (xhr) {
                showFieldErrors(xhr.responseJSON.errors);
            }
        }
    });*/

    function showFieldErrors(errors) {

        $('.error-text').remove();
        $('input, select').removeClass('is-invalid');

        $.each(errors, function(field, messages) {

            let input = $('[name="' + field + '"]');

            input.addClass('is-invalid');

            input.after(
                '<small class="text-danger error-text">' + messages[0] + '</small>'
            );
        });
    }

    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.headers.common['X-CSRF-TOKEN'] =
        document.querySelector('meta[name="csrf-token"]').content;
    
</script>

</body>
</html>
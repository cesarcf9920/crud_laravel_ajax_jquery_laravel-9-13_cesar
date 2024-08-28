<!DOCTYPE html>
<html lang="es">

    <head>
        <title>{{ env('APP_NAME', 'APP') }}</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icono-page2.ico') }}">
    
        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/assets/skin/default_skin/css/theme.css') }}">  
        
        <!-- Admin Forms CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/assets/admin-tools/admin-forms/css/admin-forms.min.css') }}">
        
        
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <style>
            a.kendo-buttons{
                padding: 2px;
                text-decoration: none;
            }
            .content-kendo, .k-grid{
                font-size: 12px;
            }

            .btn-group .ul .admin-form .checkbox, .admin-form .dropdown-menu .radio {
                background: transparent;
                border: 0px;
            }
            
            .alert-link:link {
                 cursor: default;
            }
            
            .alert-link:hover {
                 text-decoration: none;
            }
            
            .alert-link:link {
                 text-decoration: none;
            }
            
            .non-link:link {
                text-decoration: none;
            }
            
            .non-link:hover {
                text-decoration: none;
            }
                        
            
            
            .jstree.state-error {
                background: #fee9ea;
                border: 1px solid #de888a;  
            }
            
            .jstree.state-success {
                background: #F0FEE9;
                border-color: #A5D491;  
            }
            
                        
            /* Select single */
            .select2-container .select2-selection--single{
                height:42px;
                width:100%;
            }
            
            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 1px solid #ddd;
            }
            
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 40px;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                top: 8px;
            }
            
            /* Select multi */         
           .select2-container-multi .select2-choices {
                min-height: 42px;
            }

            .select2-container-multi .select2-choices {
                border: 1px solid #ddd;
            }

            .select2-container.select2-container-multi{
                width: 100%;
            }
            
            .select2-container .select2-selection--multiple .select2-search__field{
                height: 32px;
            }
            
            .select2-container span.selection .select2-selection{
                border: 1px solid #ddd;
            }
            
            .select2-container--default.select2-container--focus .select2-selection--multiple {
                border: solid blue 1px;
            }
            
            .select2.select2-container{
               width: 100%; 
            }
           .select2-selection.state-error {
                background: #fee9ea;
                border: 1px solid #de888a;  
            }
            
            .select2-selection.state-success {
                background: #F0FEE9;
                border-color: #A5D491;  
            }
            
            .select2-container span.selection .select2-selection.state-error {
                border: 1px solid #de888a;
            }
            
            .field {
                width: 100%;
            }
            
            .user-avatar {
                max-width: 100%;
/*                height: auto;*/
                border-width: 3px;
                border-style: solid;
                border-color: rgb(204, 204, 204);
                border-image: initial;
            }
            
            .modal-abs {
                width: 98%;
            }
            
            .modal-lg {
                width: 1200px;
            }
            
            #range-date.expand +.btn-group {
                width: 100%;
            }
            #range-date.expand + .btn-group button{
                width: 100%;
            }
            
            .table > thead > tr > th {
                vertical-align: middle;
            }
            
            /* theme hitachi */
            .navbar .nav > li.dropdown.open .dropdown-menu, .navbar .nav > li.dropdown .open .dropdown-menu {
                border-top-color: rgb(244, 123, 34);
            }
            
            .navbar .nav > li.dropdown.open .dropdown-menu:after, .navbar .nav > li.dropdown .open .dropdown-menu:after {
                border-bottom-color: rgb(244, 123, 34);
            }
            
            #sidebar_left.sidebar-light .sidebar-menu > li.active > a > span:nth-child(1) {
                color: rgb(244, 123, 34);
            }
            #content-access-direct{
                margin-top: 71px;
                position:relative;
            }
            /* theme hitachi */
            
            
            /* Tooltip container */
.variable-value {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.variable-value + .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
 
    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
/*.tooltipz:hover + .tooltiptext {
    visibility: visible;
}*/

#project-global:hover, #project-global:focus {
    background: #f7f7f7;
}

#project-global option {
    background: white;
}

#project-global option:hover {
    background-color: orange;
}


.loader {
 position: relative;    
}

.loader .loader-container{
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.74);
    z-index: 9999;
    left:0;
    top:0;
}

.loader .loader-container .loader-icon{
    display: table;
    width: 100%;
    height: 100%;
}

.loader .loader-container .loader-icon .loader-container-icon {
    display: table-cell;
    vertical-align: middle;
}

.loader .loader-container .loader-icon .loader-container-icon i.fa{
    color: rgba(244, 123, 34, 0.8);
}


/* Modal */
.modal-lg .modal-body {
    max-height: 485px;
    overflow-y: auto;
}
</style>

<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
    /*window.$zopim||(function(d,s){var z=$zopim=function(c){
    z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
    $.src='https://v2.zopim.com/?64DP8ly5uZvk6uNChs2V7L313VEC2bxT';z.t=+new Date;$.
    type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');*/
</script>
<!--End of Zendesk Chat Script-->

    </head>


    <body class="dashboard-page onload-check" style="min-height: 703px; overflow-x: initial;">

        <!-- Start: Main -->
        <div id="main">
            <!-- Start: Header -->

            <section id="content-access-direct">
                <div class='side-body'>   </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    @include('layouts.messages.message')
                    </div>
                </div>
                    @yield('content')
            </section>
        </div>
        <!-- End: Main -->


    <!-- SCRIPTS Libs -->
        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('bower_components/vendor/jquery/jquery-1.11.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

         <!--Theme Javascript--> 
        <script type="text/javascript" src="{{ asset('bower_components/assets/js/utility/utility.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/assets/js/main.js') }}"></script>
        
        <script src="{{ asset('app/home/index-home.js')}}" type="text/javascript"></script>
        
<!-- Scripts in views -->
@stack('scripts')

    
    </body>
</html>
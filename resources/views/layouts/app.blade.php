<!DOCTYPE html>
<html lang="es">

<head>   

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bower_components/assets/admin-tools/admin-forms/css/admin-forms.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/assets/skin/default_skin/css/theme.css') }}">

    <!-- JsTree CSS -->
    <!--<link rel="stylesheet" href="{{asset('bower_components/vendor/plugins/jstree/themes/default/style.min.css')}}"/>-->

    <!-- General CSS -->
    <link href="{{ asset('app/css/styles.css')}}" rel="stylesheet" type="text/css"/>

</head>

<body class="dashboard-page onload-check" style="min-height: 1230px; overflow-x: initial;">

<!-- Start: Main -->
<div id="main">
   
    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top navbar-shadow" style="border-top: 5px solid rgb(244, 123, 34); height: 65px">
        <!--bg-hitachi-->
        <div class="navbar-branding dark">

            <a class="navbar-brand" href="{{ route('usuario.index') }}" style="padding-left: 0px;">
               
            </a>
            <a class="navbar-brand" href="#" style="font-size: 11px; margin-top: 14px; padding-left: 0;">
                
            </a>
            <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
        </div>
        @include('layouts.navs.nav-left')
    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar Left -->
    <aside id="sidebar_left" class="nano nano-light affix has-scrollbar sidebar-light light">
        <!-- Start: Sidebar Left Content -->
        <div class="sidebar-left-content nano-content" tabindex="0">
            <div class="nav-collapse">
                @include('layouts.sidebars.sidebar')
            </div>
        </div>
        <!-- End: Sidebar Left Content -->

        <div class="nano-panel">
            <div class="nano-slider" style="height: 336px; transform: translate(0px, 0px);">
            </div>
        </div>
    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        
        <!-- Start: Topbar -->
        <header id="topbar" class="alt">
            <div class="topbar-left">
                @yield('breadcrumb')
            </div>
            <div class="topbar-right">
                @yield('topbar')
            </div>
        </header>
        <!-- End: Topbar -->

        <!-- Begin: Content -->
        <section id="content" class="">            
            @yield('content-errors')
            <div class='side-body'></div>
            @include('layouts.messages.message')
            @yield('content')
        </section>
        <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

    <!-- Start: Theme Preview Panel -->
    <!-- End: Theme Preview Panel -->
</div>
<!-- End: Main -->
<div class="modal-background"></div>

<!-- JQuery -->
<script type="text/javascript" src="{{ asset('bower_components/vendor/jquery/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

<!--Config plugins JS-->
<script type="text/javascript" src="{{ asset('js/config.js') }}"></script>

<!--Theme Javascript-->
<script type="text/javascript" src="{{ asset('bower_components/assets/js/utility/utility.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>

<!-- Scripts in views -->
@stack('scripts')

<!-- BEGIN: PAGE SCRIPTS -->
<script type="text/javascript">
   
    $(document).ready(function () {
        "use strict";
        
        $.ajaxSetup({
            statusCode: {
                200: function () {
                    //                      var top = 0;// $(".side-body:last").offset().top;
                    //                       $("[type=submit]").removeAttr("disabled");
                    //                       $("body").scrollTop(top);
//                        AlertMessage.removeCurrentAlerts();
                }
            }
        });

        $.ajaxSetup({
            statusCode: {
                401: function () {
                    AlertMessage.printError('.side-body:last', 'No tiene permitido realizar esta acción o ver parte de este contenido.');
                    var top = 0;// $(".side-body:last").offset().top;
                    $("[type=submit]").removeAttr("disabled");

                    if ($(".bootbox").length) {
                        $(".modal-body").animate({scrollTop: 0}, "fast");
                    } else {
                        $(document).scrollTop(top);
                    }
                }
            }
        });

        $.ajaxSetup({
            statusCode: {
                403: function (data) {
                    var message = data.responseJSON == '' ? 'No tiene permitido realizar esta acción o ver parte de este conteanido.' : data.responseJSON;
                    AlertMessage.printError('.side-body:last', message);
                    var top = 0;
                    $("[type=submit]").removeAttr("disabled");

                    if ($(".bootbox").length) {
                        $(".modal-body").animate({scrollTop: 0}, "fast");
                    } else {
                        $(document).scrollTop(top);
                    }

                }
            }
        });

        $.ajaxSetup({
            statusCode: {
                404: function (data) {
                    AlertMessage.printInfo('.side-body:last', 'No se encontraron resultados.');
                    var top = 0;
                    $("[type=submit]").removeAttr("disabled");

                    if ($(".bootbox").length) {
                        $(".modal-body").animate({scrollTop: 0}, "fast");
                    } else {
                        $(document).scrollTop(top);
                    }
                }
            }
        });

        $.ajaxSetup({
            statusCode: {
                422: function (data) {
                    AlertMessage.printError('.side-body:last', data.responseJSON.errors);
                    var top = 0;
                    $("[type=submit]").removeAttr("disabled");

                    if ($(".bootbox").length) {
                        $(".modal-body").animate({scrollTop: 0}, "fast");
                    } else {
                        $(document).scrollTop(top);
                    }
                }
            }
        });
        
        $.ajaxSetup({
            statusCode: {
                500: function (data) {
                    AlertMessage.print('.side-body:last', data.responseText);
                    var top = 0;
                    $("[type=submit]").removeAttr("disabled");

                    if ($(".bootbox").length) {
                        $(".modal-body").animate({scrollTop: 0}, "fast");
                    } else {
                        $(document).scrollTop(top);
                    }
                }
            }
        });

    });
</script>
<!-- END: PAGE SCRIPTS -->

</body>
<input type="hidden" value="0" id="valid_ajax_request"/>

</html>
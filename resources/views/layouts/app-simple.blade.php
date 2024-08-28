<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TH3WKCFCZQ"></script>
    <script>
        var spartezSupportChat
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TH3WKCFCZQ');
        var user_email =  "{{ auth()->user()->email }}";
        var user_name =  "{{ auth()->user()->username }}";
    </script>
    <title>{{ env('APP_NAME', 'APP') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icono-page2.ico') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bower_components/assets/skin/default_skin/css/theme.css') }}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bower_components/assets/admin-tools/admin-forms/css/admin-forms.min.css') }}">

    <!-- General CSS -->

    <link href="{{ asset('lightbox/css/lightbox.css') }}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
    </script>

    <style>
        a.kendo-buttons {
            padding: 2px;
            text-decoration: none;
        }

        .content-kendo,
        .k-grid {
            font-size: 12px;
        }

        .btn-group .ul .admin-form .checkbox,
        .admin-form .dropdown-menu .radio {
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
        .select2-container .select2-selection--single {
            height: 42px;
            width: 100%;
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

        .select2-container.select2-container-multi {
            width: 100%;
        }

        .select2-container .select2-selection--multiple .select2-search__field {
            height: 32px;
        }

        .select2-container span.selection .select2-selection {
            border: 1px solid #ddd;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid blue 1px;
        }

        .select2.select2-container {
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
            max-width: 1200px;
        }

        #range-date.expand+.btn-group {
            width: 100%;
        }

        #range-date.expand+.btn-group button {
            width: 100%;
        }

        .table>thead>tr>th {
            vertical-align: middle;
        }

        /* theme hitachi */
        .navbar .nav>li.dropdown.open .dropdown-menu,
        .navbar .nav>li.dropdown .open .dropdown-menu {
            border-top-color: rgb(244, 123, 34);
        }

        .navbar .nav>li.dropdown.open .dropdown-menu:after,
        .navbar .nav>li.dropdown .open .dropdown-menu:after {
            border-bottom-color: rgb(244, 123, 34);
        }

        #sidebar_left.sidebar-light .sidebar-menu>li.active>a>span:nth-child(1) {
            color: rgb(244, 123, 34);
        }

        #content-access-direct {
            margin-top: 71px;
            position: relative;
        }

        /* theme hitachi */


        /* Tooltip container */
        .variable-value {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
            /* If you want dots under the hoverable text */
        }

        /* Tooltip text */
        .variable-value+.tooltiptext {
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

        #project-global:hover,
        #project-global:focus {
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

        .loader .loader-container {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.74);
            z-index: 9999;
            left: 0;
            top: 0;
        }

        .loader .loader-container .loader-icon {
            display: table;
            width: 100%;
            height: 100%;
        }

        .loader .loader-container .loader-icon .loader-container-icon {
            display: table-cell;
            vertical-align: middle;
        }

        .loader .loader-container .loader-icon .loader-container-icon i.fa {
            color: rgba(244, 123, 34, 0.8);
        }


        /* Modal */
        .modal-lg .modal-body {
            max-height: 485px;
            overflow-y: auto;
        }

        .lb-nav {
            cursor: help;
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

    <!-- Jira chat -->
    <script type="text/javascript">
        spartezSupportChat = {
            portal: 3,
            cloud: {
                jiraId: 'd1129e99-4304-3f82-9a63-406894497500',
                jiraUrl: 'https://zamineperu.atlassian.net',
                urls: {
                    rest: 'https://chat-api.spartez-software.com',
                    ws: 'wss://chat-ws.spartez-software.com'
                },
            }
            //meta: [ // optional, custom metadata to store in the issue created from conversation.
            //    { render: true, name: "Value Name 1", value: val1 }, // "render" values will be displayed in the chat dashboard
            //    { render: false, name: "Value Name 2", value: val2 },
            //],
            // delay: 100, // delay between page load and chat load in milliseconds
            // container: 'spartez-support-chat-container', // ID of the page element that will be replaced by chat
            // iconClass: '', // additional class added to the chat icon
            // chatClass: '', // additional class added to the chat widget
            // locale: 'en-us' // force a specified locale for displaying texts to the user
                            // instead of detecting it from the browser
        }

       
    </script>
    <script type="text/javascript" src="https://chat-api.spartez-software.com/chat.js"></script>
    <!-- Fin Jira chat -->

    @include('layouts.navs.nav-danger')

    <!-- Start: Main -->
    <div id="main">
        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top navbar-shadow"
            style="border-top: 5px solid rgb(244, 123, 34); height: 65px">
            <!--bg-hitachi-->
            <div class="navbar-branding dark">

                <a href="{{ route('home') }}" class="navbar-brand" href="#" style="padding-left: 16px;">
                    <img src="" class="pr-20" style="width:107px; height: 56px">
                </a>
                <a class="navbar-brand" href="#" style="font-size: 11px; margin-top: 14px; padding-left: 0;">
                    
                </a>
            </div>
            @include('layouts.navs.nav-rigth')
        </header>

        <section id="content-access-direct">

            <div class='side-body'> </div>
            <div class="row">
                @if(auth()->user()->is_activo)
                    @include( 'layouts.partials.pop-up' )
                @endif
                <div class="col-md-8 col-md-offset-2">
                    @include('layouts.messages.message')
                </div>
            </div>
            @yield('content')
        </section>
    </div>
    @include('layouts.navs.nav-right.nav-right-new')
    <div class="modal-background"></div>
    <!-- End: Main -->


    <!-- SCRIPTS Libs
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>-->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('bower_components/vendor/jquery/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/vendor/jquery/jquery_ui/jquery-ui.min.js') }}">
    </script>
    <!-- lightbox -->
    <script type="text/javascript" src="{{ asset('lightbox/js/lightbox.js') }}"> </script>
    <!--Theme Javascript-->
    <script type="text/javascript" src="{{ asset('bower_components/assets/js/utility/utility.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/assets/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsrsasign/10.5.13/jsrsasign-all-min.js"
        integrity="sha512-VMSfvYqueByPkGKgs04eYawSpoaEI8FZWl1urgDS405q27u+r34Zx0rRsZyS9q3keOPvUREwQsMXitQ5qkvucA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('a.example-image-link2:first').trigger('click');
                const header = {
                    alg: 'HS256',
                    typ: 'JWT'
                };
                const payload = {
                    email: user_email,
                    displayName: user_name,
                    iat: Date.now() / 1000, //unix timestamp in seconds
                    exp: Date.now() / 1000 + 60 * 5 //token expiry date
                };
                const token = KJUR.jws.JWS.sign( //example using jsrsasign library
                    "HS256",
                    JSON.stringify(header),
                    JSON.stringify(payload),
                    'MjQ1LDIyNywyNTAsMjEyLDIyMCw3Myw0OCwxNDEsMjUxLDU1LDEyMSwxMDQsMTAxLDYxLDAsOTE='
                );

                async function startLogin(token) {
                    try {
                        const result = await spartezSupportChat.sso.login(token);
                        return result;
                    } catch (exception){
                        console.log(exception);
                    }

                    return false;
                }

                function sleep(token){
                    if(getCookie('login_jira')=='1' && getCookie('user_email') == user_email){                        
                        return true;
                    }
                    console.log(getCookie('login_jira'));
                    setTimeout(() => {
                        var login_result =startLogin(token);
                        if(login_result){
                            document.cookie = "login_jira=1";
                            document.cookie = "user_email="+user_email;
                        }else{
                            document.cookie = "login_jira=0";
                            document.cookie = "user_email=";
                        }
                    }, 5000);
                }
                sleep(token);
        });
    </script>
    <!-- Scripts in views -->


    <script type="text/javascript">
        $(document).ready(function () {

            /** Status request ajax **/

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
                    404: function (data) {
//                        AlertMessage.print('.side-body:last', data.responseText);
                        AlertMessage.printInfo('.side-body:last', 'No se encontraron resultados.');
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
                    422: function (data) {
                        AlertMessage.printError('.side-body:last', data.responseJSON.errors);
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
                    500: function (data) {
                        AlertMessage.print('.side-body:last', data.responseText);
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

            $(document).on('click', '.modal-success', function (event) {
                bootbox.hideAll();
            });


            $.fn.modal.Constructor.prototype.enforceFocus = function () {
            };

            //initFirebaseMessagingRegistration();

        });
    </script>

    <style>
        .support-chat-icon[data-v-2eae6cb2] {
            background-color: rgb(244 123 34);
        }

        .top-header {
            background-color: rgb(244 123 34) !important;
        }

        .new-conversation {
            background-color: rgb(244 123 34) !important;
        }
    </style>
    @stack('scripts')


</body>

</html>
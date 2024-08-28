@php
$module = !empty($module) ? $module : null;
@endphp
<!-- Start Vue Assets -->
<!-- Select 2 v4 -->
{{--<script type="text/javascript" src="{{ asset('bower_components/vendor/plugins/select2v4/dist/js/select2.js') }}"></script>--}}

<script src="{{ asset('js/tinymce_6.8.2/js/tinymce/tinymce.min.js') }}"></script>
@routes
<script type="text/javascript" src="{{ route_main_js('v2', $module) }}"></script>
<!-- Ende Vue Assets -->
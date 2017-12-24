<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="{{ url('favicon.png') }}">
    <title>@yield('title', config('adminlte.title', 'AdminLTE 2'))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">

    @if(config('adminlte.plugins.select2'))
    <link href="https://cdn.bootcss.com/select2/4.0.4/css/select2.min.css" rel="stylesheet">
    @endif

    @if(config('adminlte.plugins.datatables'))
    <link href="https://cdn.bootcss.com/datatables/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = '{!!   json_encode([
                'csrfToken' => csrf_token(),
            ]) !!}';
    </script>
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')
    <script src="{{ mix('js/admin/app.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <script src="https://cdn.bootcss.com/select2/4.0.4/js/select2.min.js"></script>
@endif
@if(config('adminlte.plugins.datatables'))
    <script src="https://cdn.bootcss.com/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.bootcss.com/datatables/1.10.16/js/dataTables.bootstrap.min.js"></script>
@endif
@if(config('adminlte.plugins.chartjs'))
    <script src="https://cdn.bootcss.com/Chart.js/2.7.1/Chart.min.js"></script>
    {{--<script src="https://cdn.bootcss.com/Chart.js/1.1.1/Chart.js"></script>--}}

@endif
@yield('adminlte_js')

</body>
</html>

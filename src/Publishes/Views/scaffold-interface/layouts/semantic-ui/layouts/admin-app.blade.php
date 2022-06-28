<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title") </title>

    <link rel="stylesheet" type="text/css" href='{{ asset("assets/semantic-ui/css/semantic.min.css") }}'>
    <link rel="stylesheet" type="text/css" href='{{ asset("assets/semantic-ui/css/datatables.semanticui.min.css") }}'>
    <link rel="stylesheet" type="text/css" href='{{ asset("assets/semantic-ui/css/calendar.min.css") }}'>
    <link rel="stylesheet" type="text/css" href='{{ asset("assets/semantic-ui/build/jquery.datetimepicker.min.css") }}'>
    <link rel="stylesheet" type="text/css" href='{{ asset("assets/semantic-ui/libraries/sweetalert/sweetalert.css") }}'>

    @yield('stylesheet')
</head>

<body>

@yield('container')

<script src='{{ asset("assets/semantic-ui/js/jquery.min.js") }}'></script>
<script src='{{ asset("assets/semantic-ui/js/jquery-ui.min.js") }}'></script>
<script src='{{ asset("assets/semantic-ui/js/semantic.min.js") }}'></script>
<script src='{{ asset("assets/semantic-ui/js/datatables.min.js") }}'></script>
<script src='{{ asset("assets/semantic-ui/js/jquery.datatables.min.js") }}'></script>
<script src='{{ asset("assets/semantic-ui/js/datatables.semanticui.min.js") }}'></script>
<script src='{{ asset("assets/semantic-ui/js/calendar.min.js") }}'></script>
<script src='{{ asset("assets/semantic-ui/build/jquery.datetimepicker.full.min.js") }}'></script>
<script src='{{ asset("assets/semantic-ui/libraries/sweetalert/sweetalert.min.js") }}'></script>
<script>
    $('.message .close')
        .on('click', function () {
            $(this)
                .closest('.message')
                .transition('fade')
            ;
        })
    ;

    $('.shake').transition('shake');

    $('.scale')
        .transition({
            animation: 'scale',
            duration: '600ms',
            interval: 300
        })
    ;
</script>
@yield('scripts')
</body>
</html>

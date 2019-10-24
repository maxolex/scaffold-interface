<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset("assets/css/ionicons.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("assets/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset("assets/css/_all-skins.min.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/css/jquery.dataTables.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/buttons.dataTables.min.css") }}">

    <link href="{{ asset("assets/css/select2.min.css") }}"
          rel="stylesheet"/>
    <link rel="stylesheet"
          href="{{ asset("assets/css/select2-bootstrap.min.css") }}"
          integrity="sha256-nbyata2PJRjImhByQzik2ot6gSHSU4Cqdz5bNYL2zcU=" crossorigin="anonymous"/>


    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('scaffold-dashboard')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>IN</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
						<img style="float: left" width="50px" src="{{ asset("images/logo.png") }}" alt="">
                        <b>ScaffoldInterface</b>
                    </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notification Navbar List-->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label notification-label">Nouveau</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Vos notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu notification-menu">
                                </ul>
                            </li>
                            <li class="footer"><a href="#">Voir Tout</a></li>
                        </ul>
                    </li>
                    <!-- END notification navbar list-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://ahloman.net/wp-content/uploads/2013/06/user.jpg" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="http://ahloman.net/wp-content/uploads/2013/06/user.jpg" class="img-circle"
                                     alt="User Image">
                                <p>
                                    {{Auth::user()->name}}
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{url('logout')}}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">Déconnexion</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- search form -->
        {{--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Recherche...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>--}}
        <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="{{url('scaffold-dashboard')}}">
                        <i class="fa fa-dashboard"></i> <span>Tableau de bord</span></i>
                    </a>
                </li>
                @include("scaffold-interface.layouts.partials._nav")

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        @if (count($errors) > 0)
            <div class="alert dark alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        @yield('content')
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class='AjaxisModal'>
    </div>
</div>
<!-- Compiled and minified JavaScript -->
<script src="{{ asset("assets/js/jquery-2.1.1.min.js") }}"></script>
<script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/js/app.min.js") }}"></script>
<script src="{{ asset("assets/js/demo.js") }}"></script>
<script> var baseURL = "{{ URL::to('/') }}"</script>
<script src="{{URL::asset('js/AjaxisBootstrap.js') }}"></script>
<script src="{{URL::asset('js/scaffold-interface-js/customA.js') }}"></script>
<script src="{{ asset("assets/js/pusher.min.js") }}"></script>
<script src="{{ asset("assets/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("assets/js/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("assets/js/buttons.flash.min.js") }}"></script>
<script src="{{ asset("assets/js/jszip.min.js") }}"></script>
<script src="{{ asset("assets/js/pdfmake.min.js") }}"></script>
<script src="{{ asset("assets/js/vfs_fonts.js") }}"></script>
<script src="{{ asset("assets/js/buttons.html5.min.js") }}"></script>
<script src="{{ asset("assets/js/buttons.print.min.js") }}"></script>
<script src="{{ asset("assets/js/select2.min.js") }}"></script>
<script src="{{ asset("assets/js/buttons.colVis.min.js") }}"></script>
<script>
    // pusher log to console.
    Pusher.logToConsole = true;
    // here is pusher client side code.
    var pusher = new Pusher("{{env("PUSHER_APP_KEY")}}", {
        encrypted: true
    });
    var channel = pusher.subscribe('test-channel');
    channel.bind('test-event', function (data) {
        // display message coming from server on dashboard Notification Navbar List.
        $('.notification-label').addClass('label-warning');
        $('.notification-menu').append(
            '<li>\
                <a href="#">\
                    <i class="fa fa-users text-aqua"></i> ' + data.message + '\
				</a>\
			</li>'
        );
    });

    $(document).ready(function () {
        $('.table.table-striped').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
            },
            dom: 'Bfrtip',
            /*columnDefs: [
                {
                    targets: 0,
                    className: 'noVis'
                }
            ],*/
            buttons: [
                {
                    extend: 'colvis',
                    text: "Visibilité des champs",
                    columns: ':not(.noVis)'
                },
                {
                    extend: 'excel',
                    /*className: 'btn btn-default',*/
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },
                {
                    extend: 'print',
                    text: "Imprimer",
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },

            ],
        });
    });
    (function ($) {
        $.fn.extend({
            tableAddCounter: function (options) {

                // set up default options
                var defaults = {
                    title: '#',
                    start: 1,
                    id: false,
                    class: false,
                };

                // Overwrite default options with user provided
                var options = $.extend({}, defaults, options);

                return $(this).each(function () {
                    // Make sure this is a table tag
                    if ($(this).is('table')) {

                        // Add column title unless set to 'false'
                        if (!options.title) options.title = '';
                        $('th:first-child, thead td:first-child', this).each(function () {
                            var tagName = $(this).prop('tagName');
                            $(this).before('<' + tagName + ' rowspan="' + $('thead tr').length + '" class="' + options.class + '" id="' + options.id + '">' + options.title + '</' + tagName + '>');
                        });

                        // Add counter starting counter from 'start'
                        $('tbody td:first-child', this).each(function (i) {
                            $(this).before('<td>' + (options.start + i) + '</td>');
                        });

                    }
                });
            }
        });
    })(jQuery);
    /*var options = {
        name: "Count",
        class: "counter",
        start: 26
    };*/
    $('.table.table-striped').tableAddCounter();
    $(document).ready(function () {
        $("form").attr("autocomplete", "off"); // Comment if you want auto-complete
        $('.form-group>select').not('#select2').select2({theme: "bootstrap"});
        $('.form-group>select>#permissions').select2({theme: "bootstrap",multiple: true});
        $('.form-group>select>#roles').select2({theme: "bootstrap",multiple: true});
    });
    $("#select1").change(function () {
        if ($(this).data('options') === undefined) {
            /*Taking an array of all options-2 and kind of embedding it on the select1*/
            $(this).data('options', $('#select2 option').clone());
        }
        var id = $(this).val();
        var options = $(this).data('options').filter('[data-id=' + id + ']');
        $('#select2').html(options);
        $('#select2').change();
        $('#select2 option:first-child').attr("selected", "selected").change();

    });
    /*$('#select1 option:first-child').attr("selected", "selected").change();*/
</script>
<script>
    $(document).ready(function () {
        $('a.removal').click(function () {
            event.preventDefault();
            document.getElementById("remove-form").action = $(this).attr('href');
            document.getElementById("remove-form").submit();
        });
    });
</script>
@yield('js')
@include('flashy::message')
</body>
</html>

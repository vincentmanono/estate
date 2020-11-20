<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/assets/images/favicon.png')}}">
    @yield('title')
    @yield('extraCss')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('/assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('/assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('/assets/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('/assets/dist/css/pages/dashboard1.css')}}" rel="stylesheet">
{{--  chat  --}}

<link href="{{ asset('assets/dist/css/pages/chat-app-page.css') }}" rel="stylesheet">
<link href="{{ asset('assets/dist/css/pages/inbox.css') }}" rel="stylesheet">



{{--  end chat  --}}
     <!-- Editable CSS -->
     <link type="text/css" rel="stylesheet" href="{{asset('/assets/node_modules/jsgrid/jsgrid.min.css')}}" />
     <link type="text/css" rel="stylesheet" href="{{asset('/assets/node_modules/jsgrid/jsgrid-theme.min.css')}}" />
     <!-- Custom CSS -->

</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">{{ config('app.name') }}</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('includes.navbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       @include('includes.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->

        <!-- ============================================================== -->
        @yield('content')

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © {{ date("Y") . config('app.name')  }}
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
     <script src="{{ asset('/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
     <script src="{{ asset('/assets/node_modules/popper/popper.min.js')}}"></script>
     <script src="{{ asset('/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
     <script src="{{ asset('/assets/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
     <script src="{{ asset('/assets/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
     <script src="{{ asset('/assets/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
     <script src="{{ asset('/assets/dist/js/custom.min.js')}}"></script>
     <script src="{{ asset('/assets/node_modules/datatables/datatables.min.js')}}"></script>
    {{-- table  --}}
    <link href="{{asset('/assets/node_modules/datatables/media/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('/assets/node_modules/raphael/raphael-min.js') }}"></script>
     <script src="{{ asset('/assets/node_modules/morrisjs/morris.min.js')}}"></script>
     <script src="{{ asset('/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Popup message jquery -->
     <script src="{{ asset('/assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <!-- Chart JS -->
     <script src="{{ asset('/assets/dist/js/dashboard1.js')}}"></script>
     <script src="{{ asset('assets/dist/js/pages/chat.js') }}"></script>
    <!-- start - This is for export functionality only -->
     <script src="{{ asset('/assets/files/dataTables.buttons.min.js')}}"></script>
     <script src="{{ asset('/assets/files/buttons.flash.min.js')}}"></script>
     <script src="{{ asset('/assets/files/jszip.min.js')}}"></script>
     <script src="{{ asset('/assets/files/pdfmake.min.js')}}"></script>
     <script src="{{ asset('/assets/files/vfs_fonts.js')}}"></script>
     <script src="{{ asset('/assets/files/buttons.html5.min.js')}}"></script>
     <script src="{{ asset('/assets/files/buttons.print.min.js')}}"></script>
    <!-- end - This is for export functionality only -->
    <script>
         <script src="{{ asset('/assets/node_modules/datatables/datatables.min.js')}}"></script>
        <script>
        $(function() {
            $('#myTable').DataTable();
            $(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        </script>

        <!-- Editable -->
     <script src="{{ asset('/assets/node_modules/jsgrid/db.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/assets/node_modules/jsgrid/jsgrid.min.js')}}"></script>
     <script src="{{ asset('/assets/dist/js/pages/jsgrid-init.js')}}"></script>
     <!-- slimscrollbar scrollbar JavaScript -->
     <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>

     <!--stickey kit -->
     <script src="/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
     <script src="/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
     <!--Custom JavaScript -->
     <script src="/assets/dist/js/custom.min.js"></script>
     @yield('extraScripts')

</body>

</html>

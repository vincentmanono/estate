<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

     <!-- Site Metas -->
    <title>ChiefProperties Real Estate </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/client/css/bootstrap.min.cs') }}s">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('/client/style.css') }}">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="{{ asset('/client/css/colors.css') }}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{ asset('/client/css/versions.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('/client/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/client/css/custom.css') }}">

    <!-- Modernizer for Portfolio -->
    <script src="{{asset('/client/js/modernizer.js')}}"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body class="realestate_version">


@include('includes.clientnavbar')

@yield('content')

@include('includes.clientfooter')

    <div class="copyrights">

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{asset('/client/js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('/client/js/custom.js')}}"></script>
    <script src="{{asset('/client/js/portfolio.js')}}"></script>
    <script src="{{asset('/client/js/hoverdir.js')}}"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
   <!-- MAP & CONTACT -->
    <script src="{{asset('/client/js/map.js')}}"></script>

</body>
</html>

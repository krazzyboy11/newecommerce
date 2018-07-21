<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('/backend/css/app.css')}}" rel="stylesheet" type="text/css" />

    <!-- end of global css -->
    <!--page level css -->


    <link href="{{asset('/backend/vendors/iCheck/css/square/blue.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/backend/vendors/fullcalendar/css/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend/css/pages/calendar_custom.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="{{asset('/backend/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css')}}" />
    <link rel="stylesheet" href="{{asset('/backend/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/css/pages/only_dashboard.css')}}" />
    <script src="{{asset('/backend/js/dropzone.js')}}" type="text/javascript"></script>

    @stack('css')

</head>
<body class="skin-josh">

        @if(Request::is('admin*'))
        @include('layouts.partial.header')
        @endif
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            @if(Request::is('admin*'))
            @include('layouts.partial.sidebar')
            @endif

            <!-- Right side column. Contains the navbar and content of the page -->
            @yield('content')
            <!-- right-side -->
        </div>

    <!-- global js -->
    <script src="{{asset('/backend/js/app.js')}}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!-- EASY PIE CHART JS -->
    <script src="{{asset('/backend/vendors/jquery.easy-pie-chart/js/easypiechart.min.js')}}"></script>
    <script src="{{asset('/backend/vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('/backend/js/jquery.easingpie.js')}}"></script>
    <!--end easy pie chart -->
    <!--for calendar-->
    <script src="{{asset('/backend/vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/endors/fullcalendar/js/fullcalendar.min.js')}}v" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="{{asset('/backend/vendors/flotchart/js/jquery.flot.js')}}" type="text/javascript"></script>
    <script src="{{asset('/backend/vendors/flotchart/js/jquery.flot.resize.js')}}" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="{{asset('/backend/vendors/sparklinecharts/jquery.sparkline.js')}}"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{asset('/backend/vendors/countUp.js/js/countUp.js')}}"></script>
    <!--   maps -->
    <script src="{{asset('/backend/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('/backend/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('/backend/vendors/chartjs/Chart.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <!--  todolist-->
    <script src="{{asset('/backend/js/pages/todolist.js')}}"></script>
    <script src="{{asset('/backend/js/pages/dashboard.js')}}" type="text/javascript"></script>
        @stack('scripts')


</body>
</html>

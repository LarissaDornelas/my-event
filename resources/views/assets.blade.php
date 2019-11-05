<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>


    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <link rel="stylesheet" href="{{asset('assets/css/lib/weather-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/lib/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/lib/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/lib/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lib/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lib/menubar/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lib/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lib/helper.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/myEvent/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    @yield('morecss')
</head>

<body>
    @yield('content')
    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('assets/js/lib/preloader/pace.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{asset('assets/js/lib/morris-chart/raphael-min.js')}}"></script>
    <script src="{{asset('assets/js/lib/morris-chart/morris.js')}}"></script>
    <script src="{{asset('assets/js/lib/morris-chart/morris-init.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/js/lib/flot-chart/flot-chart-init.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.algeria.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.argentina.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.brazil.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.france.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.germany.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.greece.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.iran.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.iraq.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.russia.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.tunisia.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.europe.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/country/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('assets/js/lib/vector-map/vector.init.js')}}"></script>
    <script src="{{asset('assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/weather/weather-init.js')}}"></script>
    <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/myEvent/app.js')}}"></script>




    @yield('morejs')
</body>

</html>

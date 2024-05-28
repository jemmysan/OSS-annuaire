<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Annuaire Start-Up</title>
    <link href="{{asset('img/favicon.png')}}" rel="icon" sizes="144x144">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito')}}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- switcher css -->
    <link href="{{asset('css/switcher.css')}}" rel="stylesheet" />

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon" sizes="144x144">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i')}}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    {{--    <link href="{{ asset('maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="{{ asset('maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js') }}"></script>--}}
{{--    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>--}}
{{--    <!------ Include the above in your HEAD tag ---------->--}}
</head>
<body class="login-page" style="background-color: whitesmoke">

         @yield('content')

</body>
</html>

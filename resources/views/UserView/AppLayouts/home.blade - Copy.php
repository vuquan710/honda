<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>

    <meta name="description" content="User login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>@yield('title')</title>
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{!! URL::asset('css/bootstrap.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/font-awesome.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/owl.carousel.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/owl.theme.default.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/jquery.fancybox.min.css') !!}"/>
    <!-- text fonts -->
    <link href="https://fonts.googleapis.com/css?family=Arsenal" rel="stylesheet">
    <link rel="stylesheet" href="{!! URL::asset('css/fashion_font.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/animate.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/app.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/custom.css') !!}"/>
@yield('css')
<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]-->
    <script type="text/javascript" src="{!! URL::asset('js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! URL::asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! URL::asset('js/owl.carousel.min.js') !!}"></script>
    <script src="{!! URL::asset('js/jquery.fancybox.min.js') !!}"></script>
    <script src="{!! URL::asset('js/custom.js') !!}"></script>
    <!--[endif]-->

    @yield('script')
</head>
<body class="login-layout light-login">
@section('sidebar')
@show
<header>
    @widget('fashionNavbar')
</header>
<main class="container">
    @yield('content')
</main>
<footer>
    @include('UserView.Share.footer')
</footer>
@include('UserView.Share.follow')

</body>
</html>
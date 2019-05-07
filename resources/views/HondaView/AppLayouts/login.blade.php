<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>

    <meta name="description" content="User login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{!! URL::asset('css/bootstrap.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/font-awesome.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('js/editor/trumbowyg.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/fashion_font.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/app.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/admin/style.css') !!}"/>
    @yield('css')
    <script type="text/javascript" src="{!! URL::asset('js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! URL::asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! URL::asset('js/editor/trumbowyg.min.js') !!}"></script>
    <script src="{!! URL::asset('js/admin/script.js') !!}"></script>

    @yield('script')
</head>
<body class="admin-layout admin-login-layout">
@section('sidebar')
@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
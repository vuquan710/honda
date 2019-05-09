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
    <link rel="stylesheet" href="{!! URL::asset('css/select2.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('js/editor/trumbowyg.min.css') !!}"/>
    <!-- ace styles -->
    <link rel="stylesheet" href="{!! URL::asset('css/admin/ace.min.css') !!}" class="ace-main-stylesheet"
          id="main-ace-style"/>
    <!--[if lte IE 9]-->
    <link rel="stylesheet" href="{!! URL::asset('css/admin/ace-part2.min.css') !!}"/>
    <!--[endif]-->
    <link rel="stylesheet" href="{!! URL::asset('css/admin/ace-rtl.min.css') !!}"/>

    <!--[if lte IE 9]--->
    <link rel="stylesheet" href="{!! URL::asset('css/admin/ace-ie.min.css') !!}"/>
    <!----[endif]-->
    <link rel="stylesheet" href="{!! URL::asset('css/fashion_font.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/app.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/users/honda/style.css') !!}"/>

    @yield('css')

</head>
<body class="admin-layout no-skin">
{{--@widget('UserNavBar')--}}
@section('sidebar')
@show
<div class="container ace-save-state" id="main-container">
{{--    @include('AdminView.Share.sidebarAdmin')--}}
    @yield('content')
    {{--@include('AdminView.Share.footer')--}}
</div>
<script src="{!! URL::asset('js/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! URL::asset('js/translate/jquery.i18n.language.js') !!}"></script>
@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
    <script src="{!! URL::asset('js/translate/lang/en.js') !!}"></script>
@else
    <script src="{!! URL::asset('js/translate/lang/vi.js') !!}"></script>
@endif
<script src="{!! URL::asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! URL::asset('js/select2.min.js') !!}"></script>
<script src="{!! URL::asset('js/editor/trumbowyg.min.js') !!}"></script>
<script src="{!! URL::asset('js/admin/ace-extra.min.js') !!}"></script>
<script src="{!! URL::asset('js/admin/ace-elements.min.js') !!}"></script>
<script src="{!! URL::asset('js/admin/ace.min.js') !!}"></script>
<script src="{!! URL::asset('js/common.js') !!}"></script>
<script src="{!! URL::asset('js/admin/script.js') !!}"></script>
@yield('script')
</body>
</html>
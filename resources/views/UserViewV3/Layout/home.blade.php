<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Electronic Store a Ecommerce Online Shopping Category Bootstrap Responsive Website Template | Home ::
        w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <!-- Custom Theme files -->
    <link href="{{asset('UserV3/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('UserV3/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('UserV3/css/fasthover.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('UserV3/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <!-- //Custom Theme files -->
    <!-- font-awesome icons -->
    <link href="{{asset('UserV3/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="{{asset('UserV3/js/jquery.min.js')}}"></script>
    <!-- //js -->
    <!-- web fonts -->

    <link href="https://fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <!-- //web fonts -->
    <!-- start-smooth-scrolling -->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
</head>
<body>
<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('UserV3/js/bootstrap-3.1.1.min.js')}}"></script>
<!-- //for bootstrap working -->

@include('UserViewV3.Share.header')
@include('UserViewV3.Share.navigation')
@yield('content')
<!-- top-brands -->
@include('UserViewV3.Share.brand')
<!-- //top-brands -->
<!-- newsletter -->
@include('UserViewV3.Share.news_letter')
<!-- //newsletter -->
@include('UserViewV3.Share.footer')
<!-- cart-js -->
{{--<script src="js/minicart.js"></script>--}}
{{--<script>--}}
    {{--w3ls.render();--}}

    {{--w3ls.cart.on('w3sb_checkout', function (evt) {--}}
        {{--var items, len, i;--}}

        {{--if (this.subtotal() > 0) {--}}
            {{--items = this.items();--}}

            {{--for (i = 0, len = items.length; i < len; i++) {--}}
            {{--}--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
<!-- //cart-js -->

<script type="text/javascript" src="{{asset('USerV3/js/jquery.flexisel.js')}}"></script>
<script type="text/javascript" src="{{asset('USerV3/js/script.js')}}"></script>
</body>
</html>
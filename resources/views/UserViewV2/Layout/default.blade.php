<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="fb:app_id" content="1729956273939871"/>
    <meta name="description" content="Áo Đồng Phục - Áo Sự Kiện - Áo Quà Tặng - Áo Thời Trang - Áo VNXK
Thương Hiệu Số 1 Việt Nam. Doanh Nghiệp Sản Xuất & Thương Mại Uy Tín 2018.

In Theo Yêu Cầu Chỉ Từ 1 Cái. May Theo Hàng Thiết Kế Thời Trang Cao Cấp Xuất Khẩu
    05 Nguyễn Văn Săng, P.Tân Sơn Nhì, Q.Tân Phú"/>
    <title>ÁO ĐỘNG LỰC - IN / MAY / THÊU THEO YÊU CẦU</title>
    <link rel="icon" href="{!! asset('img/base/aodongluc.ico') !!}" type="image/x-icon"/>
    {{--<link href="https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900|Quicksand:300,400,500,700&amp;subset=latin-ext,tamil,vietnamese"--}}
    {{--rel="stylesheet">--}}

    <link rel="stylesheet" type="text/css" href="{{asset('css/users/fonts/font.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/select2.min.css') !!}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/users/animate.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/users/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/facebook.css')}}"/>
    <style type="text/css">
        body {
            /*font-family: 'Quicksand', sans-serif;*/
            font-family: 'Arima Madurai', cursive;
            /*font-family: 'Roboto', sans-serif;*/
        }

        h1, h2, h3, h4 {
            font-family: 'Arima Madurai', cursive;
            /*font-family: 'Quicksand', sans-serif;*/
        }

    </style>
</head>

<body class="animated fadeIn">
@include('UserViewV2.Share.header')

@yield('content')

@include('UserViewV2.Share.footer')

<a href="tel:0898514408" title="0898514408" id="callMe"><i class="fa fa-phone" aria-hidden="true"></i></a>
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
{{--<div id="fb-root"></div>--}}

{{--<div id="cfacebook">--}}

{{--  <a href="javascript:" class="chat_fb"><i class="fa fa-facebook-square"></i>Tư vấn <span--}}
{{--        id="minimize-facechat"></span></a>--}}


{{--   <div class="fchat">--}}
{{--     <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/aodongluc.vn" data-width="220"--}}
{{--     data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"--}}
{{--     data-show-facepile="true" data-show-posts="false"></div>--}}
{{-- </div>--}}
{{--</div>--}}

<!--JS Plugin-->
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{!! URL::asset('js/select2.min.js') !!}"></script>
<script type="text/javascript" src="{{asset('js/users/waypoints.min.js')}}"></script>
<!--End JS Plugin-->

<!--JS Custom-->
<script src="{!! URL::asset('js/common.js') !!}"></script>
<script type="text/javascript" src="{{asset('js/users/script.js')}}"></script>
<!--End JS Custom-->
{{--<script>--}}
{{-- (function (d, s, id) {--}}
{{--    var js, fjs = d.getElementsByTagName(s)[0];--}}
{{--    if (d.getElementById(id)) return;--}}
{{--     js = d.createElement(s);--}}
{{--    js.id = id;--}}
{{--    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1729956273939871";--}}
{{--   fjs.parentNode.insertBefore(js, fjs);--}}
{{-- }(document, 'script', 'facebook-jssdk'));--}}
{{-- </script>--}}
<script>
    jQuery(document).ready(function () {
        {{--     jQuery(".chat_fb").click(function () {--}}
        {{--     jQuery('#minimize-facechat').toggle();--}}
        {{--     jQuery('.fchat').toggle(100);--}}
        {{--  });--}}
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scroll').fadeIn();
            } else {
                $('#scroll').fadeOut();
            }
        });
        $('#scroll').click(function () {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
        //Disable cut copy paste
        $('body').bind('cut copy paste', function (e) {
            e.preventDefault();
        });

        //Disable mouse right click--}}
        // $("body").on("contextmenu", function (e) {
           // return false;
      // });
    });
</script>
<div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
        <div class="ctrlq fb-close"></div>
        <div class="fb-page" data-href="https://www.facebook.com/aodongluc.vn" data-tabs="messages" data-width="360"
             data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"></div>
        <div id="fb-root"></div>
    </div>
    <a href="https://m.me/aodongluc.vn" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button">
        <div class="bubble">1</div>
        <div class="bubble-msg">Bạn cần hỗ trợ?</div>
    </a></div>
<script src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1729956273939871"></script>
<script>
    $(document).ready(function () {
        function detectmob() {
            if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                return true;
            } else {
                return false;
            }
        }

        var t = {delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")};
        setTimeout(function () {
            $("div.fb-livechat").fadeIn()
        }, 8 * t.delay);
        if (!detectmob()) {
            $(".ctrlq").on("click", function (e) {
                e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
                    bottom: 0,
                    opacity: 0
                }, 2 * t.delay, function () {
                    $(this).hide("slow"), t.button.show()
                })) : t.button.fadeOut("medium", function () {
                    t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)
                })
            })
        }
    });
</script>
</body>

</html>
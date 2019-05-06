<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>

<meta property="fb:app_id" content="1729956273939871"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>ÁO ĐỘNG LỰC - IN / MAY / THÊU THEO YÊU CẦU</title>
    <meta name="description" content="Áo Đồng Phục - Áo Sự Kiện - Áo Quà Tặng - Áo Thời Trang - Áo VNXK
Thương Hiệu Số 1 Việt Nam. Doanh Nghiệp Sản Xuất & Thương Mại Uy Tín 2018. 
In Theo Yêu Cầu Chỉ Từ 1 Cái. May Theo Hàng Thiết Kế Thời Trang Cao Cấp Xuất Khẩu
    05 Nguyễn Văn Săng, P.Tân Sơn Nhì, Q.Tân Phú"/>
    <link rel="icon" href="{!! asset('img/base/aodongluc.ico') !!}" type="image/x-icon"/>
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{!! URL::asset('css/bootstrap.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/font-awesome.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/owl.carousel.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/owl.theme.default.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/jquery.fancybox.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/animate.css') !!}"/>
    <!-- text fonts -->

    <link rel="stylesheet" href="{!! URL::asset('css/fashion_font.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/default.css') !!}"/>
 <link rel="stylesheet" href="{!! URL::asset('css/facebook.css') !!}"/>
@yield('css')
<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]-->
    <script type="text/javascript" src="{!! URL::asset('js/jquery-3.2.1.min.js') !!}"></script>
    <script src="{!! URL::asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! URL::asset('js/owl.carousel.min.js') !!}"></script>
    <script src="{!! URL::asset('js/jquery.fancybox.min.js') !!}"></script>
    <script src="{!! URL::asset('js/default.js') !!}"></script>
    <script src="{!! URL::asset('js/translate/jquery.i18n.language.js') !!}"></script>
    @if(\App::getLocale()==\App\Models\Setting::LANG_EN)
        <script src="{!! URL::asset('js/translate/lang/en.js') !!}"></script>
    @else
        <script src="{!! URL::asset('js/translate/lang/vi.js') !!}"></script>
    @endif
<!--[endif]-->

    @yield('script')
</head>
<body>
<section class="page-wrap">
    <header class="header">
        <div class="container-fluid">


            <div class="row margin-top-10" id="header1">
                <div class="col-md-12 col-sm-12 top-header">

                    <div class="left-header">

                        <div class="text-center header-text">
                            <div class="web-brand">IN MAY THÊU THEO YÊU CẦU</div>
                        </div>

                        <nav class="navbar navbar-inverse header-nav">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse"
                                            data-target="#myNavbar" aria-expanded="false" aria-controls="navbar">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                </div>
                                <div class="collapse navbar-collapse" id="myNavbar">
                                    @if(\App::getLocale()==\App\Models\Setting::LANG_EN)
                                        <ul class="nav navbar-nav">
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.homes.') !== false)?"active":"" }}">
                                                <a href="{{route('user.homes.index')}}" class="home">HOME</a></li>

                                            <li class="{{(strpos(\Route::current()->getName(), 'user.products.exporters') !== false)?"active":"" }}">
                                                <a href="{{route('user.products.exporters')}}" class="li-vnxk">VNXK
                                                    SHIRT</a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.products.motivation') !== false)?"active":"" }}">
                                                <a href="{{route('user.products.motivation')}}" class="li-adl">DONG LUC
                                                    SHIRT</a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.products.printOnRequest') !== false)?"active":"" }}">
                                                <a href="{{route('user.products.printOnRequest')}}" class="li-aityc">SHIRT
                                                    IN REQUEST</a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.gallerys.') !== false)?"active":"" }}">
                                                <a href="{{route('user.gallerys.index')}}" class="li-product-image">GALLERY</a>
                                            </li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.news_categories.') !== false)?"active":"" }}">
                                                <a href="{{route('user.news_categories.index')}}" class="li-about">ABOUT
                                                    US</a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.contacts.') !== false)?"active":"" }}">
                                                <a href="{{route('user.contacts.index')}}"
                                                   class="li--contact">CONTACT</a></li>
                                        </ul>
                                    @else
                                        <ul class="nav navbar-nav">
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.homes.') !== false)?"active":"" }}">
                                                <a href="{{route('user.homes.index')}}" class="home">TRANG CHỦ</a></li>

                                            <li class="{{(strpos(\Route::current()->getName(), 'user.products.exporters') !== false)?"active":"" }}">
                                                <a href="{{route('user.products.exporters')}}" class="li-vnxk">ÁO
                                                    VNXK</a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.products.motivation') !== false)?"active":"" }}">
                                                <a href="{{route('user.products.motivation')}}" class="li-adl">ÁO ĐỘNG
                                                    LỰC</a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.products.printOnRequest') !== false)?"active":"" }}">
                                                <a href="{{route('user.products.printOnRequest')}}" class="li-aityc">ÁO
                                                    IN THEO YÊU CẦU</a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.gallerys.') !== false)?"active":"" }}">
                                                <a href="{{route('user.gallerys.index')}}" class="li-product-image">HÌNH
                                                    ẢNH SẢN PHẨM</a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.news_categories.') !== false)?"active":"" }}">
                                                <a href="{{route('user.news_categories.index')}}" class="li-about">GIỚI
                                                    THIỆU </a></li>
                                            <li class="{{(strpos(\Route::current()->getName(), 'user.contacts.') !== false)?"active":"" }}">
                                                <a href="{{route('user.contacts.index')}}" class="li--contact">LIÊN
                                                    HỆ</a></li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </nav>
                        <span class="lang-header">
							@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
                                <a href="{{route('user.homes.changelang','vi')}}"><img
                                            src="{!! asset('img/base/Vietnam.png') !!}"/></a>
                            @else
                                <a href="{{route('user.homes.changelang','en')}}"><img
                                            src="{!! asset('img/base/Kingdom.png') !!}"/></a>
                            @endif
                            </span>
                    </div>

                </div>

            </div>

            <img src="{!! asset('img/base/adl-logo.png') !!}" class="img-responsive logo"/>


            <div id="header2" class="row margin-top-10">
                <div class="col-md-12 col-sm-12 text-center" id="banner-header">
                    <img class="img-responsive banner-image" src="{!! asset('img/base/aodongluc.png') !!}"/>
                    <span class="text-header" class="web-brand"> IN MAY THÊU THEO YÊU CẦU</span>
                    <span class="lang-header">
                           @if(\App::getLocale()==\App\Models\Setting::LANG_EN)
                            <a href="{{route('user.homes.changelang','vi')}}"><img
                                        src="{!! asset('img/base/Vietnam.png') !!}"/></a>
                        @else
                            <a href="{{route('user.homes.changelang','en')}}"><img
                                        src="{!! asset('img/base/Kingdom.png') !!}"/></a>
                        @endif
                        </span>
                </div>
                <nav class="navbar navbar-inverse nav-mobile">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse"
                                    data-target="#myNavbar1" aria-expanded="false" aria-controls="navbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar1">

                            @if(\App::getLocale()==\App\Models\Setting::LANG_EN)
                                <ul class="nav navbar-nav">
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.homes.') !== false)?"active":"" }}">
                                        <a href="{{route('user.homes.index')}}" class="home">HOME</a></li>

                                    <li class="{{(strpos(\Route::current()->getName(), 'user.products.exporters') !== false)?"active":"" }}">
                                        <a href="{{route('user.products.exporters')}}" class="li-vnxk">VNXK SHIRT</a>
                                    </li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.products.motivation') !== false)?"active":"" }}">
                                        <a href="{{route('user.products.motivation')}}" class="li-adl">DONG LUC
                                            SHIRT</a></li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.products.printOnRequest') !== false)?"active":"" }}">
                                        <a href="{{route('user.products.printOnRequest')}}" class="li-aityc">SHIRT IN
                                            REQUEST</a></li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.gallerys.') !== false)?"active":"" }}">
                                        <a href="{{route('user.gallerys.index')}}" class="li-product-image">GALLERY</a>
                                    </li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.news_categories.') !== false)?"active":"" }}">
                                        <a href="{{route('user.news_categories.index')}}" class="li-about">ABOUT US</a>
                                    </li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.contacts.') !== false)?"active":"" }}">
                                        <a href="{{route('user.contacts.index')}}" class="li--contact">CONTACT</a></li>
                                </ul>
                            @else
                                <ul class="nav navbar-nav">
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.homes.') !== false)?"active":"" }}">
                                        <a href="{{route('user.homes.index')}}" class="home">TRANG CHỦ</a></li>

                                    <li class="{{(strpos(\Route::current()->getName(), 'user.products.exporters') !== false)?"active":"" }}">
                                        <a href="{{route('user.products.exporters')}}" class="li-vnxk">ÁO VNXK</a></li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.products.motivation') !== false)?"active":"" }}">
                                        <a href="{{route('user.products.motivation')}}" class="li-adl">ÁO ĐỘNG LỰC</a>
                                    </li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.products.printOnRequest') !== false)?"active":"" }}">
                                        <a href="{{route('user.products.printOnRequest')}}" class="li-aityc">ÁO IN THEO
                                            YÊU CẦU</a></li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.gallerys.') !== false)?"active":"" }}">
                                        <a href="{{route('user.gallerys.index')}}" class="li-product-image">HÌNH ẢNH SẢN
                                            PHẨM</a></li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.news_categories.') !== false)?"active":"" }}">
                                        <a href="{{route('user.news_categories.index')}}" class="li-about">GIỚI
                                            THIỆU </a></li>
                                    <li class="{{(strpos(\Route::current()->getName(), 'user.contacts.') !== false)?"active":"" }}">
                                        <a href="{{route('user.contacts.index')}}" class="li--contact">LIÊN HỆ</a></li>

                                </ul>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <section class="container">
        @yield('content')
    </section>
</section>
 <div class="foot-brand">
                    @if(\App::getLocale()==\App\Models\Setting::LANG_EN)
                        <div class="footer-content">
                            <img src="{!! asset('img/base/adl freeship.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b id="delivery">Delivery</b></p>
                            <p class="text-center text-footer" id="deliverys-msg">Free shipping on orders over 1
                                million</p>
                        </div>
                        <div class="footer-content">
                            <img src="{!! asset('img/base/VANCHUYEN.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b id="ProductReturn">Product Returns</b></p>
                            <p class="text-center text-footer" id="ProductReturnMsg">7 days to return products in the
                                inner city<br/>10 days return of products outside the city</p>

                        </div>
                        <div class="footer-content">
                            <img src="{!! asset('img/base/Tu van online.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b>Hotline 24/7</b></p>
                            <p class="text-center text-footer" id="address-footer">169.735.8789-0898.514.408<br/>05
                                Nguyen Van Sang Street, Tan Son Nhi Ward, Tan Phu District, HCM City/p>
                        </div>
                    @else
                        <div class="footer-content">
                            <img src="{!! asset('img/base/adl freeship.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b id="delivery">Giao hàng</b></p>
                            <p class="text-center text-footer" id="deliverys-msg">Miễn phí giao hàng cho các đơn hàng có
                                hóa đơn trên 1 triệu đồng</p>
                        </div>
                        <div class="footer-content">
                            <img src="{!! asset('img/base/VANCHUYEN.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b id="ProductReturn">Đổi trả sản phẩm</b></p>
                            <p class="text-center text-footer" id="ProductReturnMsg">7 ngày đổi trả sản phẩm nội
                                thành<br/>10 ngày đổi trả sản phẩm ngoại thành</p>

                        </div>
                        <div class="footer-content">
                            <img src="{!! asset('img/base/Tu van online.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b>Hotline 24/7</b></p>
                            <p class="text-center text-footer" id="address-footer">0169.735.8789-0898.514.408<br/>05
                                Nguyễn Văn Săng, P.Tân Sơn Nhì, Q.Tân Phú, TP.HCM</p>
                        </div>
                    @endif
                </div>
<footer class="footer  margin-top-60">
    <div class="footer__body">
        <div class="container">
            <div class="col-md-5 col-sm-12"></div>
            <div class="col-md-7 col-sm-12">
                <div class="row">
                    @if(\App::getLocale()==\App\Models\Setting::LANG_EN)
                        <div class="footer-content">
                            <img src="{!! asset('img/base/adl freeship.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b id="delivery">Delivery</b></p>
                            <p class="text-center text-footer" id="deliverys-msg">Free shipping on orders over 1
                                million</p>
                        </div>
                        <div class="footer-content">
                            <img src="{!! asset('img/base/VANCHUYEN.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b id="ProductReturn">Product Returns</b></p>
                            <p class="text-center text-footer" id="ProductReturnMsg">7 days to return products in the
                                inner city<br/>10 days return of products outside the city</p>

                        </div>
                        <div class="footer-content">
                            <img src="{!! asset('img/base/Tu van online.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b>Hotline 24/7</b></p>
                            <p class="text-center text-footer" id="address-footer">169.735.8789-0898.514.408<br/>05
                                Nguyen Van Sang Street, Tan Son Nhi Ward, Tan Phu District, HCM City/p>
                        </div>
                    @else
                        <div class="footer-content">
                            <img src="{!! asset('img/base/adl freeship.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b id="delivery">Giao hàng</b></p>
                            <p class="text-center text-footer" id="deliverys-msg">Miễn phí giao hàng cho các đơn hàng có
                                hóa đơn trên 1 triệu đồng</p>
                        </div>
                        <div class="footer-content">
                            <img src="{!! asset('img/base/VANCHUYEN.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b id="ProductReturn">Đổi trả sản phẩm</b></p>
                            <p class="text-center text-footer" id="ProductReturnMsg">7 ngày đổi trả sản phẩm nội
                                thành<br/>10 ngày đổi trả sản phẩm ngoại thành</p>

                        </div>
                        <div class="footer-content">
                            <img src="{!! asset('img/base/Tu van online.png') !!}" class="img-responsive footer-img"/>
                            <p class="text-center"><b>Hotline 24/7</b></p>
                            <p class="text-center text-footer" id="address-footer">0169.735.8789-0898.514.408<br/>05
                                Nguyễn Văn Săng, P.Tân Sơn Nhì, Q.Tân Phú, TP.HCM</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</footer>
<a "tel:0898514408"  title="0898514408"id="callMe" ><i class="fa fa-phone" aria-hidden="true"></i></a>
<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1729956273939871";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<script>
    jQuery(document).ready(function () {
        jQuery(".chat_fb").click(function() {
            jQuery('#minimize-facechat').toggle();
            jQuery('.fchat').toggle(100);
        });
    });
</script>
	<div id="cfacebook">
	@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
		 <a href="javascript:" class="chat_fb"><i class="fa fa-facebook-square"></i>Support<span id="minimize-facechat"></span></a>
		@else
			 <a href="javascript:" class="chat_fb"><i class="fa fa-facebook-square"></i>Tư vấn  <span id="minimize-facechat"></span></a>
			@endif
   
    <div class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/aodongluc.vn" data-width="220" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
    </div>
</div>
</body>
</html>
@extends('UserViewV3.Layout.home')

@section('content')
    <!-- banner -->
    <div class="banner">
        <div class="container">
            <h3>Electronic Store, <span>Special Offers</span></h3>
        </div>
    </div>
    <!-- //banner -->

    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="col-md-5 wthree_banner_bottom_left">
                <div class="video-img">
                    <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                        <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- pop-up-box -->
                <script src="{{asset('UserV3/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
                <!--//pop-up-box -->
                <div id="small-dialog" class="mfp-hide">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/snNlYy277zY" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <script>
                    $(document).ready(function () {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });

                    });
                </script>
            </div>
            <div class="col-md-7 wthree_banner_bottom_right">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        @foreach($listRecommendCategories as $key => $recommendCategory)
                            <li role="presentation" class="@if($key==0) active @endif"><a href="#tab-{{$key}}"
                                                                                          role="tab" id="{{$key}}-tab"
                                                                                          data-toggle="tab"
                                                                                          aria-controls="home">{{$recommendCategory['name']}}</a>
                            </li>
                        @endforeach
                        {{--<li role="presentation"><a href="#audio" role="tab" id="audio-tab" data-toggle="tab"--}}
                        {{--aria-controls="audio">Audio</a></li>--}}
                        {{--<li role="presentation"><a href="#video" role="tab" id="video-tab" data-toggle="tab"--}}
                        {{--aria-controls="video">Computer</a></li>--}}
                        {{--<li role="presentation"><a href="#tv" role="tab" id="tv-tab" data-toggle="tab"--}}
                        {{--aria-controls="tv">Household</a>--}}
                        {{--</li>--}}
                        {{--<li role="presentation"><a href="#kitchen" role="tab" id="kitchen-tab" data-toggle="tab"--}}
                        {{--aria-controls="kitchen">Kitchen</a></li>--}}
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        @foreach($listRecommendCategories as $key=>$recommendCategory)
                            <div role="tabpanel" class="tab-pane fade @if($key==0) active @endif in" id="tab-{{$key}}"
                                 aria-labelledby="{{$key}}-tab">
                                <div class="agile_ecommerce_tabs">
                                    @foreach($recommendCategory['product'] as $product)
                                        @include('UserViewV3.Share.product_content_slide', ['product'=>$product])
                                    @endforeach
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //banner-bottom -->
    <!-- modal-video -->
    {{--Modal product here       --------------------------------------------------             --}}
    <!-- //modal-video -->
    <!-- banner-bottom1 -->
    {{--<div class="banner-bottom1">--}}
    {{--<div class="agileinfo_banner_bottom1_grids">--}}
    {{--<div class="col-md-7 agileinfo_banner_bottom1_grid_left">--}}
    {{--<h3>Grand Opening Event With flat<span>20% <i>Discount</i></span></h3>--}}
    {{--<a href="products.html">Shop Now</a>--}}
    {{--</div>--}}
    {{--<div class="col-md-5 agileinfo_banner_bottom1_grid_right">--}}
    {{--<h4>hot deal</h4>--}}
    {{--<div class="timer_wrap">--}}
    {{--<div id="counter"></div>--}}
    {{--</div>--}}
    {{--<script src="{{asset('UserV3/js/jquery.countdown.js')}}"></script>--}}
    {{--<script src="{{asset('UserV3/js/script.js')}}"></script>--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- //banner-bottom1 -->
    <!-- special-deals -->
    <div class="special-deals">
        <div class="container">
            <h2>{{__('userV3Messages.phan_hoi_cua_khach_hang')}}</h2>
            <div class="w3agile_special_deals_grids">
                <div class="col-md-7 w3agile_special_deals_grid_left">
                    <div class="w3agile_special_deals_grid_left_grid">
                        <img src="{{asset('UserV3/images/21.jpg')}}" alt=" " class="img-responsive"/>
                        <div class="w3agile_special_deals_grid_left_grid_pos1">
                            <h5>30%<span>Off/-</span></h5>
                        </div>
                        <div class="w3agile_special_deals_grid_left_grid_pos">
                            <h4>We Offer <span>Best Products</span></h4>
                        </div>
                    </div>
                    <div class="wmuSlider example1">
                        <div class="wmuSliderWrapper">
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{asset('UserV3/images/t1.png')}}" alt=" " class="img-responsive"/>
                                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem
                                            eum fugiat quo voluptas nulla pariatur</p>
                                        <h4>Laura</h4>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{asset('UserV3/images/t2.png')}}" alt=" " class="img-responsive"/>
                                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem
                                            eum fugiat quo voluptas nulla pariatur</p>
                                        <h4>Michael</h4>
                                    </div>
                                </div>
                            </article>
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-wrap">
                                    <div class="w3agile_special_deals_grid_left_grid1">
                                        <img src="{{asset('UserV3/images/t3.png')}}" alt=" " class="img-responsive"/>
                                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem
                                            eum fugiat quo voluptas nulla pariatur</p>
                                        <h4>Rosy</h4>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <script src="{{asset('UserV3/js/jquery.wmuSlider.js')}}"></script>
                    <script>
                        $('.example1').wmuSlider();
                    </script>
                </div>
                <div class="col-md-5 w3agile_special_deals_grid_right">
                    <img src="{{asset('UserV3/images/20.jpg')}}" alt=" " class="img-responsive"/>
                    <div class="w3agile_special_deals_grid_right_pos">
                        <h4>Women's <span>Special</span></h4>
                        <h5>save up <span>to</span> 30%</h5>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //special-deals -->
    <!-- new-products -->
    <div class="new-products">
        <div class="container">
            <h3>{{__('userV3Messages.san_pham_moi')}}</h3>
            <div class="agileinfo_new_products_grids">
                @foreach($listNewProducts as $product)
                    @include('UserViewV3.Share.product_content_hot', ['product'=>$product])
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //new-products -->
@endsection

@extends('UserViewV3.Layout.home')
@section('content')
    <!-- banner -->
    <div class="banner banner10" style="background-image: url({{asset($product['image_main_url'])}})">
        <div class="container">
            <h2>{{$product['name']}}</h2>
        </div>
    </div>
    <!-- //banner -->
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{route('user.v3.homes.index')}}"><span class="glyphicon glyphicon-home"
                                                                     aria-hidden="true"></span> {{__('userV3Messages.trang_chu')}}
                    </a>
                    <i>/</i></li>
                <li>
                    <a href="{{route('user.v3.categories.show', @$product['product_category']['slug'])}}">{{$product['product_category']['name']}}</a>
                    <i>/</i>
                </li>
                <li>
                    {{$product['name']}}
                </li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <div class="single">
        <div class="container">
            <div class="col-md-4 single-left">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($product['images'] as $image)
                            <li data-thumb="{{asset($image['url'])}}">
                                <div class="thumb-image"><img src="{{asset($image['url_thumb'])}}" data-imagezoom="true"
                                                              class="img-responsive" alt=""></div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- flexslider -->
                <script defer src="{{asset('UserV3/js/jquery.flexslider.js')}}"></script>
                <link rel="stylesheet" href="{{asset('UserV3/css/flexslider.css')}}" type="text/css" media="screen"/>
                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function () {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
                <!-- flexslider -->
                <!-- zooming-effect -->
                <script src="{{asset('UserV3/js/imagezoom.js')}}"></script>
                <!-- //zooming-effect -->
            </div>
            <div class="col-md-8 single-right">
                <h3>{{$product['name']}}</h3>
                {{--<div class="rating1">--}}
                {{--<span class="starRating">--}}
                {{--<input id="rating5" type="radio" name="rating" value="5">--}}
                {{--<label for="rating5">5</label>--}}
                {{--<input id="rating4" type="radio" name="rating" value="4">--}}
                {{--<label for="rating4">4</label>--}}
                {{--<input id="rating3" type="radio" name="rating" value="3" checked>--}}
                {{--<label for="rating3">3</label>--}}
                {{--<input id="rating2" type="radio" name="rating" value="2">--}}
                {{--<label for="rating2">2</label>--}}
                {{--<input id="rating1" type="radio" name="rating" value="1">--}}
                {{--<label for="rating1">1</label>--}}
                {{--</span>--}}
                {{--</div>--}}
                <div class="description">
                    <h5><i>{{__('userV3Messages.thong_tin_co_ban')}}</i></h5>
                    <p>{{$product['short_description']}}</p>
                </div>
                <div class="color-quality">
                    {{--<div class="color-quality-left">--}}
                    {{--<h5>Color : </h5>--}}
                    {{--<ul>--}}
                    {{--<li><a href="#"><span></span></a></li>--}}
                    {{--<li><a href="#" class="brown"><span></span></a></li>--}}
                    {{--<li><a href="#" class="purple"><span></span></a></li>--}}
                    {{--<li><a href="#" class="gray"><span></span></a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    <div class="color-quality-left">
                        <h5>Quality :</h5>
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus1">&nbsp;</div>
                                <div class="entry value1"><span>1</span></div>
                                <div class="entry value-plus1 active">&nbsp;</div>
                            </div>
                        </div>
                        <!--quantity-->
                        <script>
                            $('.value-plus1').on('click', function () {
                                var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10) + 1;
                                divUpd.text(newVal);
                            });

                            $('.value-minus1').on('click', function () {
                                var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10) - 1;
                                if (newVal >= 1) divUpd.text(newVal);
                            });
                        </script>
                        <!--quantity-->

                    </div>
                    <div class="clearfix"></div>
                </div>
                {{--<div class="occasional">--}}
                {{--<h5>RAM :</h5>--}}
                {{--<div class="colr ert">--}}
                {{--<div class="check">--}}
                {{--<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>3--}}
                {{--GB</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="colr">--}}
                {{--<div class="check">--}}
                {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>2 GB</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="colr">--}}
                {{--<div class="check">--}}
                {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>1 GB</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                <div class="simpleCart_shelfItem">
                    <p><span>{{\App\Models\Product::$unit[$product['unit']]}}{{number_format($product['price'])}}</span>
                        <i class="item_price">{{\App\Models\Product::$unit[$product['unit']]}}{{number_format(empty($product['price_sale'])?$product['price']:$product['price_sale'])}}</i>
                    </p>
                    <form action="#" method="post">
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="add" value="1">
                        <input type="hidden" name="w3ls_item" value="Smart Phone">
                        <input type="hidden" name="amount" value="450.00">
                        <button type="submit" class="w3ls-cart">{{__('userV3Messages.them_vao_gio')}}</button>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="additional_info">
        <div class="container">
            <div class="sap_tabs">
                <div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
                    <ul>
                        <li class="resp-tab-item" aria-controls="tab_item-0" role="tab">
                            <span>{{__('userV3Messages.thong_tin_chi_tiet')}}</span>
                        </li>
                        <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
                    </ul>
                    <div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
                        {!! $product['description'] !!}
                    </div>

                    <div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
                        <h4>(2) Reviews</h4>
                        <div class="additional_info_sub_grids">
                            <div class="col-xs-2 additional_info_sub_grid_left">
                                <img src="images/t1.png" alt=" " class="img-responsive"/>
                            </div>
                            <div class="col-xs-10 additional_info_sub_grid_right">
                                <div class="additional_info_sub_grid_rightl">
                                    <a href="single.html">Laura</a>
                                    <h5>Oct 06, 2016.</h5>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat
                                        quo voluptas nulla pariatur.</p>
                                </div>
                                <div class="additional_info_sub_grid_rightr">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="additional_info_sub_grids">
                            <div class="col-xs-2 additional_info_sub_grid_left">
                                <img src="images/t2.png" alt=" " class="img-responsive"/>
                            </div>
                            <div class="col-xs-10 additional_info_sub_grid_right">
                                <div class="additional_info_sub_grid_rightl">
                                    <a href="single.html">Michael</a>
                                    <h5>Oct 04, 2016.</h5>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat
                                        quo voluptas nulla pariatur.</p>
                                </div>
                                <div class="additional_info_sub_grid_rightr">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="review_grids">
                            <h5>Add A Review</h5>
                            <form action="#" method="post">
                                <input type="text" name="Name" value="Name" onfocus="this.value = '';"
                                       onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                <input type="email" name="Email" placeholder="Email" required="">
                                <input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';"
                                       onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
                                <textarea name="Review" onfocus="this.value = '';"
                                          onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{asset('UserV3/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab1').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
            </script>
        </div>
    </div>
@endsection
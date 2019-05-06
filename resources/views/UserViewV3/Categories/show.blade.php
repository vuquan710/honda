@extends('UserViewV3.Layout.home')
@section('content')
    <div class="banner banner1"
         style="background-image: url({{asset(!empty($category['url_banner'])?$category['url_banner']:'img/banner_bepnuong.png')}})">
        <div class="container">
            <h2>{{$category['name']}}</h2>
        </div>
    </div>
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="{{route('user.v3.homes.index')}}"><span class="glyphicon glyphicon-home"
                                                                        aria-hidden="true"></span> {{__('userV3Messages.trang_chu')}}
                    </a> <i>/</i></li>
                <li>{{$category['name']}}</li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <div class="mobiles">
        <div class="container">
            <div class="w3ls_mobiles_grids">
                <div class="col-md-4 w3ls_mobiles_grid_left">
                    <div class="w3ls_mobiles_grid_left_grid">
                        <h3>{{__('userV3Messages.danh_muc')}}</h3>
                        <div class="w3ls_mobiles_grid_left_grid_sub">
                            <ul class="panel_bottom">
                                @foreach($categories as $categoryItem)
                                    <li>
                                        <a @if($categoryItem['id'] == $category['id'])class="act"@endif href="{{route('user.v3.categories.show', $categoryItem['slug'])}}">{{$categoryItem['name']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="w3ls_mobiles_grid_left_grid">
                        <h3>{{__('userV3Messages.gia')}}</h3>
                        <div class="w3ls_mobiles_grid_left_grid_sub">
                            <div class="ecommerce_color ecommerce_size">
                                <ul>
                                    <li><a href="#">{{__('userV3Messages.duoi')}} 100.000</a></li>
                                    <li><a href="#">100.000 - 500.000</a></li>
                                    <li><a href="#">500.000 - 2.500.000</a></li>
                                    <li><a href="#">{{__('userV3Messages.tren')}} 5.000.000</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 w3ls_mobiles_grid_right">
                    {{--<div class="col-md-6 w3ls_mobiles_grid_right_left">--}}
                    {{--<div class="w3ls_mobiles_grid_right_grid1">--}}
                    {{--<img src="images/46.jpg" alt=" " class="img-responsive" />--}}
                    {{--<div class="w3ls_mobiles_grid_right_grid1_pos1">--}}
                    {{--<h3>Smart Phones<span>Up To</span> 15% Discount</h3>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6 w3ls_mobiles_grid_right_left">--}}
                    {{--<div class="w3ls_mobiles_grid_right_grid1">--}}
                    {{--<img src="images/47.jpg" alt=" " class="img-responsive" />--}}
                    {{--<div class="w3ls_mobiles_grid_right_grid1_pos">--}}
                    {{--<h3>Top 10 Latest<span>Mobile </span>& Accessories</h3>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"> </div>--}}

                    <div class="w3ls_mobiles_grid_right_grid2">
                        <div class="w3ls_mobiles_grid_right_grid2_left">
                            <h3>Showing Results: 0-{{$listProducts->total()}}</h3>
                        </div>
                        <div class="w3ls_mobiles_grid_right_grid2_right">
                            <select name="select_item" class="select_item">
                                <option selected="selected">Default sorting</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by newness</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <?php
                    $listProductsToArray = $listProducts->toArray();
                    $listProductsChunk = array_chunk($listProductsToArray['data'], 3);
                    ?>
                    @foreach($listProductsChunk as $listProductsArray)
                        <div class="w3ls_mobiles_grid_right_grid3">
                            @foreach($listProductsArray as $product)
                                @include('UserViewV3.Share.product_content', ['$product'=>$product])
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="modal video-modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModal9">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <section>
                    <div class="modal-body">
                        <div class="col-md-5 modal_body_left">
                            <img src="images/27.jpg" alt=" " class="img-responsive"/>
                        </div>
                        <div class="col-md-7 modal_body_right">
                            <h4>Latest Smart Phone </h4>
                            <p>Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore
                                eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</p>
                            <div class="rating">
                                <div class="rating-left">
                                    <img src="images/star-.png" alt=" " class="img-responsive"/>
                                </div>
                                <div class="rating-left">
                                    <img src="images/star-.png" alt=" " class="img-responsive"/>
                                </div>
                                <div class="rating-left">
                                    <img src="images/star-.png" alt=" " class="img-responsive"/>
                                </div>
                                <div class="rating-left">
                                    <img src="images/star.png" alt=" " class="img-responsive"/>
                                </div>
                                <div class="rating-left">
                                    <img src="images/star.png" alt=" " class="img-responsive"/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="modal_body_right_cart simpleCart_shelfItem">
                                <p><span>$250</span> <i class="item_price">$245</i></p>
                                <form action="#" method="post">
                                    <input type="hidden" name="cmd" value="_cart"/>
                                    <input type="hidden" name="add" value="1"/>
                                    <input type="hidden" name="w3ls_item" value="Smart Phone"/>
                                    <input type="hidden" name="amount" value="245.00"/>
                                    <button type="submit" class="w3ls-cart">Add to cart</button>
                                </form>
                            </div>
                            <h5>Color</h5>
                            <div class="color-quality">
                                <ul>
                                    <li><a href="#"><span></span></a></li>
                                    <li><a href="#" class="brown"><span></span></a></li>
                                    <li><a href="#" class="purple"><span></span></a></li>
                                    <li><a href="#" class="gray"><span></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
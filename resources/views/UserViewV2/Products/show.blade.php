@extends('UserViewV2.Layout.default')

@section('css')

@endsection

@section('script')

@endsection

@section('content')
    <div id="content">
        <div class="container-fluid bg-gray">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{route('user.v2.homes.index')}}">Trang chủ</a></li>
                    <li>{{$product['product_category']['name']}}</li>
                </ul>

                <div class="product-detail row">
                    <section class="box box-image-product">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="row">
                                <div class="list-img-product">
                                    <ul class="">
                                        @if(!empty($product['images']))
                                            @foreach($product['images'] as $image)
                                                <li class="list-img" data-url="{{asset($image['url'])}}">
                                                    <img class="" width="100%"
                                                         src="{{asset($image['url_thumb'])}}"/>
                                                </li>
                                            @endforeach
                                        @endif
                                        <div class="clearfix"></div>
                                    </ul>
                                </div>
                                <div class="image-show">
                                    @if($product['is_sale'])
                                        <div class="sale">{{__('messages.UserV2.giam_gia')}}</div>
                                    @endif
                                    <div class="">
                                        <img class="img img-responsive img-main" width="100%"
                                             src="@if(isset($product['image_main_url'])) {{asset($product['image_main_url'])}} @else http://via.placeholder.com/200x250 @endif"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class="">
                                <h3 class="name">{{$product['name']}}</h3>

                                <p>
                                    @if($product['is_sale'])
                                        <span class="price-sale">{{number_format($product['price_sale'])}}</span>
                                        <span class="price-no-sale">{{number_format($product['price'])}}</span>
                                    @else
                                        <span class="price-sale">{{number_format($product['price'])}}</span>
                                    @endif
                                    {{\App\Models\Product::$unit[$product['unit']]}}
                                </p>
                                @if(!empty($product['options']))

                                    @include('UserViewV2.Share.options', ['options'=>$product['options']])
                                @endif
                                @if(trim($product['short_description']) !== '')

                                    <p class="short-description margin-top-20">{{$product['short_description']}}</p>
                                @endif

                                <div class="contact-buy">
                                    <p>LIÊN HỆ MUA HÀNG</p>
                                    <p>- Hotline 24/24: 0169.735.8789 - 0898.514.408</p>
                                    <p>- Địa chỉ: 05 Nguyễn Văn Săng, Phường Tân Sơn Nhì, Quận Tân Phú, Thành phố Hồ Chí
                                        Minh</p>
                                    <p>- Email: aodongluc@gmail.com</p>
                                </div>
                                <div class="button-buy">
                                    <button class="btn btn-warning">Gọi lại cho tôi</button>
                                    <button class="btn btn-success">Đặt mua</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="info row">
                                <h3>THÔNG TIN HỖ TRỢ</h3>
                                <p><span style="color:#4c707e;">0169.735.8789 - 0898.514.408</span> Tư vấn mua hàng</p>
                                <p><span style="color:#4c707e;">0937.201.002 - 0169.462.7272</span> Hỗ trợ kỹ thuật</p>
                                <p>Miễn phí giao hàng cho các đơn hàng có
                                    hóa đơn trên 1 triệu đồng</p>
                                <p>7 ngày đổi trả sản phẩm nội
                                    thành<br/>10 ngày đổi trả sản phẩm ngoại thành</p>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </section>
                    <div class="clearfix"></div>
                    <section class="description box">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-20">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab"
                                                      href="#menu1">{{__('messages.UserV2.thong_tin')}}</a></li>
                                <li><a data-toggle="tab" href="#menu2">{{__('messages.UserV2.danh_gia')}}</a></li>
                                <li><a data-toggle="tab" href="#menu3">{{__('messages.UserV2.binh_luan')}}</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="menu1" class="tab-pane fade in active">
                                    @if(empty($product['description']))
                                        {{__('messages.UserV2.khong_co_mo_ta')}}
                                    @else
                                        {!! $product['description'] !!}
                                    @endif
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    {{__('messages.UserV2.khong_co_danh_gia')}}
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    {{__('messages.UserV2.khong_co_binh_luan')}}
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </section>
                    <div class="clearfix"></div>
                    <section>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-20">
                            <h3 class="">{{__('messages.UserV2.san_pham_lien_quan')}}</h3>
                            <div class="row">
                                @include('UserViewV2.Share.slide_list_products', ['listProducts'=>$listProductRelate])
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
@endsection
<section class="row products-box">
    @if($listProducts->total())
        @foreach($listProducts as $product)
            <?php $product = $product->toArray(); ?>
            <div class="col-md-3 col-sm-4">
                <article class="product box animated fadeInUp">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="{{route('user.v2.products.show', $product['alias'])}}">
                                    <img src="@if(isset($product['images'][0]['url_thumb'])){{asset($product['images'][0]['url_thumb'])}}@else {{asset('img/noimage.png')}} @endif"
                                         alt=""
                                         class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text padding-top-10 text-center">
                        <h3>
                            <a href="{{route('user.v2.products.show', $product['alias'])}}">{{$product['name']}}</a>
                        </h3>
                        <p class="price">
                            <span @if($product['is_sale']) class="font-12 price-no-sale" @endif>{{number_format($product['price'])}}</span>
                            @if($product['is_sale'])
                                <span class="bold price-sale">{{number_format($product['price_sale'])}}</span>
                            @endif
                            &nbsp;{{\App\Models\Product::$unit[$product['unit']]}}
                        </p>
                        <p class="buttons">
                            <a href="{{route('user.v2.products.show', $product['alias'])}}"
                               class="btn btn-default">{{__('messages.UserV2.xem_chi_tiet')}}</a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="action-product">
                        @if($product['is_new'])
                            <div class="new">{{__('messages.UserV2.moi')}}</div>
                        @endif
                        @if($product['is_sale'])
                            <div class="sale">{{__('messages.UserV2.giam_gia')}}</div>
                        @endif
                    </div>
                </article>
            </div>
        @endforeach
    @endif
</section>
<div class="col-md-4 agile_ecommerce_tab_left">
    <div class="hs-wrapper">
        @foreach($product['images'] as $image)
            <img src="{{asset($image['url_thumb'])}}" alt=" "
                 class="img-responsive"/>
        @endforeach
        <div class="w3_hs_bottom">
            @include('UserViewV3.Share.quick_view_product')
        </div>
    </div>
    <h5><a href="{{route('user.v3.products.show', $product['slug'])}}">{{$product['name']}}</a></h5>
    <div class="simpleCart_shelfItem">
        <p>
            <span>{{\App\Models\Product::$unit[$product['unit']]}}{{number_format($product['price'])}}</span>
            <i class="item_price">{{\App\Models\Product::$unit[$product['unit']]}}{{number_format(empty($product['price_sale'])?$product['price']:$product['price_sale'])}}</i>
        </p>
        @include('UserViewV3.Share.add_to_cart')
    </div>
</div>
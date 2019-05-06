<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
    <div class="agile_ecommerce_tab_left mobiles_grid">
        <div class="hs-wrapper hs-wrapper2">
            @foreach($product['images'] as $image)
                <img src="{{asset($image['url_thumb'])}}" alt=" "
                     class="img-responsive"/>
            @endforeach
            <div class="w3_hs_bottom w3_hs_bottom_sub1">
                @include('UserViewV3.Share.quick_view_product')
            </div>
        </div>
        <h5>
            <a href="{{route('user.v3.products.show', $product['slug'])}}">{{$product['name']}}</a>
        </h5>
        <div class="simpleCart_shelfItem">
            <p>
                <span>{{\App\Models\Product::$unit[$product['unit']]}}{{number_format($product['price'])}}</span>
                <i class="item_price">{{\App\Models\Product::$unit[$product['unit']]}}{{number_format(empty($product['price_sale'])?$product['price']:$product['price_sale'])}}</i>
            </p>
            @include('UserViewV3.Share.add_to_cart')
        </div>
        @if($product['is_new'])
            <div class="mobiles_grid_pos">
                <h6>{{__('userV3Messages.moi')}}</h6>
            </div>
        @endif
    </div>
</div>
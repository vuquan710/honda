<div class="top-brands">
    <div class="container">
        <h3>{{__('userV3Messages.thuong_hieu')}}</h3>
        <div class="sliderfig">
            @if(!empty($allBrands))
                <ul id="brand-slider">
                    @foreach($allBrands as $brand)
                        <li>
                            <img src="{{asset('UserV3/images/brands/'.$brand)}}" alt=" " class="img-responsive"/>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
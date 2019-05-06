@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
    <link rel="stylesheet" href="{!! URL::asset('css/newspage.css') !!}"/>
@endsection
@section('js')
@endsection
@section('content')
    <div class="row">

        <div class="col-md-12 col-sm-12 margin-top-10"></div>
        <div id="secwrapper">
            {{--<section>--}}
                {{--@if(\App::getLocale()==\App\Models\Setting::LANG_EN)--}}
                    {{--@foreach($listProducts as $key => $product)--}}
                        {{--<article>--}}
                            {{--@if(!empty($product['images']))--}}
                                {{--@if (count($product['images']) == 0)--}}
                                    {{--<a href="{{route('user.products.show', $product['alias'])}}"> <img--}}
                                                {{--class="img-responsive img-news" src="{!! asset('img/noimage.png') !!}"/></a>--}}
                                {{--@endif--}}
                                {{--@foreach($product['images'] as $image)--}}
                                    {{--@if($image['is_main'] =='1' )--}}
                                        {{--<a href="{{route('user.products.show', $product['alias'])}}"> <img--}}
                                                    {{--class="img-responsive img-news"--}}
                                                    {{--src="{{asset($image['url_thumb'])}}"/></a>--}}

                                    {{--@endif--}}




                                {{--@endforeach--}}
                            {{--@else--}}
                                {{--<a href="{{route('user.products.show', $product['alias'])}}"> <img--}}
                                            {{--class="img-responsive img-news" src="{!! asset('img/noimage.png') !!}"/></a>--}}
                            {{--@endif--}}
                            {{--<a href="{{route('user.products.show', $product['alias'])}}">--}}
                                {{--<p class="text-center">{{@$product['en_name']}}</p></a>--}}
                            {{--@if($product['is_sale'])--}}
                                {{--<h5 class="price text-center"><span class="line-through">{{@$product['price']}}--}}
                                        {{--VND</span><span>{{@$product['price_sale']}}VND</span></h5>--}}
                            {{--@else--}}
                                {{--<h5 class="price text-center"><span>{{@$product['price']}}VND</span></h5>@endif--}}


                        {{--</article>--}}
                    {{--@endforeach--}}
                {{--@else--}}
                    {{--@foreach($listProducts as $key => $product)--}}
                        {{--<article>--}}
                            {{--@if(!empty($product['images']))--}}
                                {{--@if (count($product['images']) == 0)--}}
                                    {{--<a href="{{route('user.products.show', $product['alias'])}}"> <img--}}
                                                {{--class="img-responsive img-news" src="{!! asset('img/noimage.png') !!}"/></a>--}}
                                {{--@endif--}}
                                {{--@foreach($product['images'] as $image)--}}
                                    {{--@if($image['is_main'] =='1' )--}}
                                        {{--<a href="{{route('user.products.show', $product['alias'])}}"> <img--}}
                                                    {{--class="img-responsive img-news"--}}
                                                    {{--src="{{asset($image['url_thumb'])}}"/></a>--}}

                                    {{--@endif--}}




                                {{--@endforeach--}}
                            {{--@else--}}
                                {{--<a href="{{route('user.products.show', $product['alias'])}}"> <img--}}
                                            {{--class="img-responsive img-news" src="{!! asset('img/noimage.png') !!}"/></a>--}}
                            {{--@endif--}}
                            {{--<a href="{{route('user.products.show', $product['alias'])}}">--}}
                                {{--<p class="text-center">{{@$product['name']}}</p></a>--}}
                            {{--@if($product['is_sale'])--}}
                                {{--<h5 class="price text-center"><span class="line-through">{{@$product['price']}}--}}
                                        {{--VND</span><span>{{@$product['price_sale']}}VND</span></h5>--}}
                            {{--@else--}}
                                {{--<h5 class="price text-center"><span>{{@$product['price']}}VND</span></h5>@endif--}}


                        {{--</article>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            {{--</section>--}}
            @include('UserView.Share.list_products',['listProducts'=>$listProducts ])
            @include('UserView.Share.paginate', ['paginator'=>$listProducts])
        </div>

    </div>
    {{--<div class="row">--}}
        {{--@if($count>12)--}}
            {{--@if($count%12==0)--}}
                {{--<ul class="pagination">--}}
                    {{--@if($page>1)--}}
                        {{--<li><a href="{{route('user.products.exporters').'?page='.($page-1)}}">&laquo;</a></li>@endif--}}
                    {{--@for ($i = 0; $i < $count/12; $i++)--}}
                        {{--@if($page==$i+1)--}}
                            {{--<li class="active"><a--}}
                                        {{--href="{{route('user.products.exporters').'?page='.($i+1)}}">{{$i+1}}</a></li>--}}
                        {{--@else--}}
                            {{--<li><a href="{{route('user.products.exporters').'?page='.($i+1)}}">{{$i+1}}</a></li>--}}
                        {{--@endif--}}

                    {{--@endfor--}}
                    {{--@if($page<($count/12))--}}
                        {{--<li><a href="{{route('user.products.exporters').'?page='.($page+1)}}">&raquo;</a></li>@endif--}}
                {{--</ul>--}}
            {{--@else--}}
                {{--<ul class="pagination">--}}
                    {{--@if($page>1)--}}
                        {{--<li><a href="{{route('user.products.exporters').'?page='.($page-1)}}">&laquo;</a></li>@endif--}}
                    {{--@for ($i = 0; $i < ($count)/4+1; $i++)--}}
                        {{--@if($page==$i+1)--}}
                            {{--<li class="active"><a--}}
                                        {{--href="{{route('user.products.exporters').'?page='.($i+1)}}">{{$i+1}}</a></li>--}}
                        {{--@else--}}
                            {{--<li><a href="{{route('user.products.exporters').'?page='.($i+1)}}">{{$i+1}}</a></li>--}}
                        {{--@endif--}}
                    {{--@endfor--}}
                    {{--@if($page<(($count/12)+1))--}}
                        {{--<li><a href="{{route('user.products.exporters').'?page='.($page+1)}}">&raquo;</a></li>@endif--}}
                {{--</ul>--}}
            {{--@endif--}}
        {{--@endif--}}
    {{--</div>--}}

@endsection
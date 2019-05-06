@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
<link rel="stylesheet" href="{!! URL::asset('css/newspage.css') !!}"/>

@endsection
@section('js')
@endsection
@section('content')
<div class="row margin-top-10">
 <div class="col-sm-12 col-md-4"></div>
 <div class="col-sm-12 col-md-4">
            <div class="searchbox">
			@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
				<form class="form-inline" method="GET" action="{{route('user.products.exporters')}}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" id="topSearchKeyword" placeholder="Search Product">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
				@else
					<form class="form-inline" method="GET" action="{{route('user.products.exporters')}}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="keyword" id="topSearchKeyword" placeholder="Tìm kiếm sản phẩm">
                    </div>
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                </form>
					@endif
                
                
            </div>
        </div>
		 <div class="col-sm-12 col-md-4"></div>
</div>
<div class="row">
  
			  <div class="col-md-12 col-sm-12 margin-top-10"></div>
              <div id="secwrapper">
			<section>
			@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
				 @foreach($listProducts as $key => $product)
			 <article class="ribbon-content">
			  @if(!empty($product['images']))
                            @if (count($product['images']) == 0)
                               <a href="{{route('user.products.show', $product['alias'])}}">    <img class="img-responsive img-news" src="{!! asset('img/noimage.png') !!}"/></a>
                            @endif
                            @foreach($product['images'] as $image)
                               
                                    <a href="{{route('user.products.show', $product['alias'])}}">   <img class="img-responsive img-news" src="{{asset($image['url_thumb'])}}"/></a>


@break

                            @endforeach
                        @else
                            <a href="{{route('user.products.show', $product['alias'])}}">   <img class="img-responsive img-news" src="{!! asset('img/noimage.png') !!}"/></a>
                        @endif
						 @if($product['is_sale'])
		   <div class="ribbon base-alt"><span>Discount&nbsp; {{floor(($product['price']-$product['price_sale'])/$product['price']*100)}}%</span></div>
		 @if($product['is_new'])
		   <div class="ribbon red new-not-discount"><span>New</span></div>
		
			@endif
		@else
			@if($product['is_new'])
		   <div class="ribbon red"><span>New</span></div>
		
			@endif
			@endif
			
					  <a href="{{route('user.products.show', $product['alias'])}}">
					<p class="text-center">{{@$product['en_name']}}</p></a>
					<h5 class="price text-center"> <span>@if($product['is_sale'])
							  {{@$product['price_sale']}}VND
							 @else
								  {{@$product['price']}}VND
								 @endif</span></h5>
					 
					
				</article>
			  @endforeach
				@else
			 @foreach($listProducts as $key => $product)
			 <article  class="ribbon-content">
					 @if(!empty($product['images']))
                            @if (count($product['images']) == 0)
                               <a href="{{route('user.products.show', $product['alias'])}}">    <img class="img-responsive img-news" src="{!! asset('img/noimage.png') !!}"/></a>
                            @endif
                            @foreach($product['images'] as $image)
                               
                                    <a href="{{route('user.products.show', $product['alias'])}}">   <img class="img-responsive img-news" src="{{asset($image['url_thumb'])}}"/></a>

                               @break




                            @endforeach
                        @else
                            <a href="{{route('user.products.show', $product['alias'])}}">   <img class="img-responsive img-news" src="{!! asset('img/noimage.png') !!}"/></a>
                        @endif
						 	 @if($product['is_sale'])
		   <div class="ribbon base-alt"><span>
	Giảm giá &nbsp;	 {{floor(($product['price']-$product['price_sale'])/$product['price']*100)}}%
	   </span></div>
	   @if($product['is_new'])
		   <div class="ribbon red new-not-discount"><span>Mới</span></div>
		
			@endif
		@else
			@if($product['is_new'])
		   <div class="ribbon red"><span>Mới</span></div>
		
			@endif
			@endif
			
					<a href="{{route('user.products.show', $product['alias'])}}">
					<p class="text-center">{{@$product['name']}}</p></a>
				
							<h5 class="price text-center"> <span>@if($product['is_sale'])
							  {{@$product['price_sale']}}VND
							 @else
								  {{@$product['price']}}VND
								 @endif</span></h5>
					
				
					
				</article>
			  @endforeach
				@endif
			</section>
            </div>
			
            </div>
				<div class="row">
	@if($count>20)
	@if($count%20==0)
		 <ul class="pagination">
	 @if($page>1)
	  <li><a href="{{route('user.products.exporters').'?page='.($page-1).$searchurl}}">&laquo;</a></li>@endif
			 @for ($i = 0; $i < $count/20; $i++)
				 @if($page==$i+1)
					 <li class="active"><a href="{{route('user.products.exporters').'?page='.($i+1).$searchurl}}">{{$i+1}}</a></li>
				 @else
					  <li><a href="{{route('user.products.exporters').'?page='.($i+1).$searchurl}}">{{$i+1}}</a></li>
				 @endif
    
@endfor  
	 @if($page<($count/20))
<li><a href="{{route('user.products.exporters').'?page='.($page+1).$searchurl}}">&raquo;</a></li>@endif
</ul>
@else
	 <ul class="pagination">
   @if($page>1)
	  <li><a href="{{route('user.products.exporters').'?page='.($page-1).$searchurl}}">&laquo;</a></li>@endif
			 @for ($i = 0; $i < ($count/20)+1; $i++)
    @if($page==$i+1)
					 <li class="active"><a href="{{route('user.products.exporters').'?page='.($i+1).$searchurl}}">{{$i+1}}</a></li>
				 @else
					  <li><a href="{{route('user.products.exporters').'?page='.($i+1).$searchurl}}">{{$i+1}}</a></li>
				 @endif
@endfor  
 @if($page<(($count/20)+1))
<li><a href="{{route('user.products.exporters').'?page='.($page+1).$searchurl}}">&raquo;</a></li>@endif
</ul>
@endif
@endif
	</div>

@endsection
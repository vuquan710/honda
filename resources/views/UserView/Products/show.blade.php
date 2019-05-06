@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
@endsection
@section('js')
@endsection
@section('content')

 <div class="row">
 	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						  @if(!empty($product['images']))
							  	<div class="preview-pic tab-content">
                                        @foreach($product['images'] as $image)
									@if($image['is_main'] =='1' ) 
										 <div class="tab-pane active" id="pic-{{!empty($image['id'])?$image['id']:'0'}}">  <img class="img-responsive" src="{{asset($image['url_thumb'])}}" /></div>
	                             
							   @else
								    <div class="tab-pane" id="pic-{{$image['id']}}"><img class="img-responsive" src="{{asset($image['url_thumb'])}}" /></div>
										@endif
									
										
                                                                        
												
                                        @endforeach
										</div>
                                   <ul class="preview-thumbnail nav nav-tabs">
								    @foreach($product['images'] as $image)
								   @if($image['is_main'] =='1' ) 										
	                              <li class="active"><a data-target="#pic-{{!empty($image['id'])?$image['id']:'0'}}" data-toggle="tab"><img class="img-responsive" src="{{asset($image['url_thumb'])}}" /></a></li>
							   @else
								   <li><a data-target="#pic-{{!empty($image['id'])?$image['id']:'0'}}" data-toggle="tab"><img class="img-responsive" src="{{asset($image['url_thumb'])}}" /></a></li>
										@endif
									
										
                                                                        
												
                                        @endforeach
								   </ul>
                                    @endif
						
						
					</div>
					<div class="details col-md-6">
						
						@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
							<h3 class="product-title">{{@$product['en_name']}}</h3>
								<p class="product-description">{{@$product['en_short_description']}}</p>
						@if($product['is_sale'])
						<h4 class="price">Price: <span class="line-through">{{@$product['price']}}VND</span><span>{{@$product['price_sale']}}VND</span></h4>
						@else
							<h4 class="price">Price: <span>{{@$product['price']}}VND</span></h4>@endif
							@else
								<h3 class="product-title">{{@$product['name']}}</h3>
								<p class="product-description">{{@$product['short_description']}}</p>
						@if($product['is_sale'])
						<h4 class="price">Giá: <span class="line-through">{{@$product['price']}}VND</span><span>{{@$product['price_sale']}}VND</span></h4>
						@else
							<h4 class="price">Giá: <span>{{@$product['price']}}VND</span></h4>
							@endif
								@endif
						
						
					</div>
					
				</div>
				<div class="row margin-top-10">
				<div class="col-md-12">
					
				@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
					  @if(!empty($product['en_description']))
					<p class="text-center"><b>Product Info</b></p>
				<p>
						
							{!!html_entity_decode(@$product['en_description'])!!}
							</p>
					@endif
					@else
						 @if(!empty($product['description']))
						<p class="text-center"><b>Thông tin sản phẩm</b></p>
				<p>
						
						{!!html_entity_decode(@$product['description'])!!}
							</p>
						@endif
						@endif
				
					</div>
					</div>
			</div>
		</div>
	</div>
 </div>
   
@endsection
@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
   <style>
   .owl-carousel .owl-item img{
	   height:200px;object-fit:cover;
   }
   </style>
@endsection
@section('js')
@endsection
@section('content')
     <div class="row">
@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
	  @foreach($listCategories as $key => $category)
			  
       <div class="row  margin-top-10">
		 <h3  class="text-center">
				{{@$category['en_name']}}</h3></div>
		<div class="owl-carousel owl-theme  margin-top-10" id="slide{{@$category['id']}}">
		  @foreach($listProducts as $key => $product)		  
		  @if($product['p_category_id']==$category['id'])
			  <div class="item">
                                <div >
			 @if(!empty($product['images']))
											@if (count($product['images']) == 0)<a href="{{route('user.products.show', $product['alias'])}}">
    <img class="img-responsive" src="{!! asset('img/base/adl-logo.png') !!}"/></a>
                                                @endif
                                        @foreach($product['images'] as $image)
									@if($image['is_main'] =='1' ) <a href="{{route('user.products.show', $product['alias'])}}">
	                               <img class="img-responsive" src="{{asset($image['url_thumb'])}}" /></a>
                                        
										@endif
									
										
                                                                        
												
                                        @endforeach
                                    @else
                                                 <a href="{{route('user.products.show', $product['alias'])}}">                 <img class="img-responsive" src="{!! asset('img/noimage.png') !!}"/></a>
                                    @endif
                                      </div>
									  
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-center">  <a href="{{route('user.products.show', $product['alias'])}}"> 
                                                {{@$product['en_name']}}</a></h5>
												@if($product['is_sale'])
						<h5 class="price text-center"> <span class="line-through">{{@$product['price']}}VND</span><span>{{@$product['price_sale']}}VND</span></h5>
						@else
							<h5 class="price text-center"> <span>{{@$product['price']}}VND</span></h5>@endif
                                           
                                        </div>
                                       
                                    </div>
                                    
                                  
                                
								
              </div>
			  @endif
		  @endforeach
		 </div>
		@endforeach
	@else
			  @foreach($listCategories as $key => $category)
			  
       <div class="row  margin-top-10">
		 <h3  class="text-center">
				{{@$category['name']}}</h3></div>
		<div class="owl-carousel owl-theme  margin-top-10" id="slide{{@$category['id']}}">
		  @foreach($listProducts as $key => $product)		  
		  @if($product['p_category_id']==$category['id'])
			  <div class="item">
                                <div >
			 @if(!empty($product['images']))
											@if (count($product['images']) == 0) <a href="{{route('user.products.show', $product['alias'])}}">
    <img class="img-responsive" src="{!! asset('img/base/adl-logo.png') !!}"/></a>
                                                @endif
                                        @foreach($product['images'] as $image)
									@if($image['is_main'] =='1' )  <a href="{{route('user.products.show', $product['alias'])}}">
	                               <img class="img-responsive" src="{{asset($image['url_thumb'])}}" /></a>
                                        
										@endif
									
										
                                                                        
												
                                        @endforeach
                                    @else
                                                     <a href="{{route('user.products.show', $product['alias'])}}">              <img class="img-responsive" src="{!! asset('img/noimage.png') !!}"/></a>
                                    @endif
                                      </div>
									  
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5  class="text-center">
											  <a href="{{route('user.products.show', $product['alias'])}}"> 
                                                {{@$product['name']}}</a></h5>
                                          @if($product['is_sale'])
						<h5 class="price text-center"> <span class="line-through">{{@$product['price']}}VND</span><span>{{@$product['price_sale']}}VND</span></h5>
						@else
							<h5 class="price text-center"> <span>{{@$product['price']}}VND</span></h5>@endif
                                        </div>
                                       
                                    </div>
                                    
                                  
                                
								
              </div>
			  @endif
		  @endforeach
		 </div>
		@endforeach
		  @endif
    </div>
	<div class="row">
	@if($count>2)
	@if($count%2==0)
		 <ul class="pagination">
	 @if($curpage>1)
	  <li><a href="{{route('user.products.printOnRequest').'?page='.($curpage-1)}}">&laquo;</a></li>@endif
			 @for ($i = 0; $i < $count/2; $i++)
				 @if($curpage==$i+1)
					 <li class="active"><a href="{{route('user.products.printOnRequest').'?page='.($i+1)}}">{{$i+1}}</a></li>
				 @else
					  <li><a href="{{route('user.products.printOnRequest').'?page='.($i+1)}}">{{$i+1}}</a></li>
				 @endif
    
@endfor  
	 @if($curpage<($count/2))
<li><a href="{{route('user.products.printOnRequest').'?page='.($curpage+1)}}">&raquo;</a></li>@endif
</ul>
@else
	 <ul class="pagination">
   @if($curpage>1)
	  <li><a href="{{route('user.products.printOnRequest').'?page='.($curpage-1)}}">&laquo;</a></li>@endif
			 @for ($i = 0; $i < ($count+1)/2; $i++)
    @if($curpage==$i+1)
					 <li class="active"><a href="{{route('user.products.printOnRequest').'?page='.($i+1)}}">{{$i+1}}</a></li>
				 @else
					  <li><a href="{{route('user.products.printOnRequest').'?page='.($i+1)}}">{{$i+1}}</a></li>
				 @endif
@endfor  
 @if($curpage<(($count+1)/2))
<li><a href="{{route('user.products.printOnRequest').'?page='.($curpage+1)}}">&raquo;</a></li>@endif
</ul>
@endif
@endif
	</div>
	<script>
            $(document).ready(function() {
             var owl = $('.owl-carousel');
			 if ( typeof(owl) !== "undefined" && owl !== null ) {
				 owl.each(function(){
					 $(this).owlCarousel({
    
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
	responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,loop:true
        },
        600:{
            items:3,
            nav:false,loop:true
        },
        1000:{
            items:4,
            nav:false,loop:true
            
        }
	}
				 });
				  $(this).trigger('owl.autoplay', [1000])
			 });
			 }
            })
          </script>
@endsection
@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
@endsection
@section('js')
@endsection
@section('content')
 <style>
@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}

</style>
    <div class="row">
			  @foreach($listCategories as $key => $category)
			  
        <div class="row">
            <div class="col-md-9">
                <h3>
				{{@$category['name']}}</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
		  @foreach($listProducts as $key => $product)
		  @if($product['p_category_id']==$category['id'])
			   <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
			<div class="item active">
                    <div class="row">
					 <div class="col-item">
                                <div class="photo">
			 @if(!empty($product['images']))
											@if (count($product['images']) == 0)
    <img class="img-responsive" src="{!! asset('img/base/adl-logo.png') !!}"/>
                                                @endif
                                        @foreach($product['images'] as $image)
									@if($image['is_main'] =='1' ) 
	                               <img class="img-responsive" src="{{asset($image['url_thumb'])}}" />
                                        
										@endif
									
										
                                                                        
												
                                        @endforeach
                                    @else
                                                                  <img class="img-responsive" src="{!! asset('img/base/adl-logo.png') !!}"/>
                                    @endif
                                      </div>
									   <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                {{@$product['name']}}</h5>
                                            <h5 class="price-text-color">
                                                $199.99</h5>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="clearfix">
                                    </div>
                                </div>
								 </div>
                
                </div>
            </div>
        </div>
			  @endif
		  @endforeach
		@endforeach
       
		
    </div>
@endsection
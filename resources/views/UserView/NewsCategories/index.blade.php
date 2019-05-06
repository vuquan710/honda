@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
@endsection
@section('js')
@endsection
@section('content')
   
	 <style>
        .item{border:1px solid #000000;border-radius:25px;position:relative;}
            .item img {
                margin: 0 auto;max-height: 160px;
            }
            .item p {
                position: absolute;
                top: 30%;
                text-align: center;
                width: 100%;
                font-weight: bolder;
				color:black;
            }
        .padding-5{padding:5px;}
    </style>
   <div class="row">
              
			 <div class="col-md-12 col-sm-12 margin-top-10">
				 @foreach($listCategory as $key => $category)
                    <!--the main content-->
                    <div class="col-md-3 col-sm-6 padding-5">
					<a href="{{route('user.news_categories.pages', $category['id'])}}">
                        <div class="item">
						 @if(!empty($category['background_image']))
							  <img class="img-responsive" src="{!! asset('uploads/'.$category['background_image']) !!}"/>
							 @else
								  <img class="img-responsive" src="{!! asset('img/noimage.png') !!}"/>
								 @endif
                           
							@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
								  <p>{{@$category['name_en']}}</p>
								@else
									  <p>{{@$category['name']}}</p>
									@endif
                          
                        </div>
						</a>
                    </div>
                    @endforeach
                </div>
				
            </div>
			<div class="row">
	@if($count>12)
	@if($count%12==0)
		 <ul class="pagination">
	 @if($page>1)
	  <li><a href="{{route('user.news_categories.index').'?page='.($page-1)}}">&laquo;</a></li>@endif
			 @for ($i = 0; $i < $count/12; $i++)
				 @if($page==$i+1)
					 <li class="active"><a href="{{route('user.news_categories.index').'?page='.($i+1)}}">{{$i+1}}</a></li>
				 @else
					  <li><a href="{{route('user.news_categories.index').'?page='.($i+1)}}">{{$i+1}}</a></li>
				 @endif
    
@endfor  
	 @if($page<($count/12))
<li><a href="{{route('user.news_categories.index').'?page='.($page+1)}}">&raquo;</a></li>@endif
</ul>
@else
	 <ul class="pagination">
   @if($page>1)
	  <li><a href="{{route('user.news_categories.index').'?page='.($page-1)}}">&laquo;</a></li>@endif
			 @for ($i = 0; $i < ($count)/12+1; $i++)
    @if($page==$i+1)
					 <li class="active"><a href="{{route('user.news_categories.index').'?page='.($i+1)}}">{{$i+1}}</a></li>
				 @else
					  <li><a href="{{route('user.news_categories.index').'?page='.($i+1)}}">{{$i+1}}</a></li>
				 @endif
@endfor  
 @if($page<(($count/12)+1))
<li><a href="{{route('user.products.printOnRequest').'?page='.($page+1)}}">&raquo;</a></li>@endif
</ul>
@endif
@endif
	</div>
@endsection
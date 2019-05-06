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
			<section>
			@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
				@foreach($listnews as $key => $news)
			 <article>
					<a href="{{route('user.news.show', $news['id'])}}"><img src="{!! asset(@$news['small_image']) !!}" alt="" class="img-responsive img-news"/></a>
					<a href="{{route('user.news.show', $news['id'])}}" class="text-center"><p class="text-center">{{@$news['en_title']}}</p>
					 </a>
					
				</article>
			  @endforeach
				@else
			 @foreach($listnews as $key => $news)
			 <article>
					<a href="{{route('user.news.show', $news['id'])}}"><img src="{!! asset(@$news['small_image']) !!}" alt="" class="img-responsive img-news"/></a>

					<a href="{{route('user.news.show', $news['id'])}}" class="text-center"><p class="text-center">{{@$news['title']}}</p></a>
					
				</article>
			  @endforeach
				@endif
			</section>
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
			 @for ($i = 0; $i < ($count)/4+1; $i++)
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


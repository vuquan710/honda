@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
@endsection
@section('js')
@endsection
@section('content')
   
	
   <div class="row">
                <div class="col-md-12 col-sm-12 margin-top-10">
					@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
							<h1>{{@$news->en_title}}</h1>
				 {!! @$news->en_content !!}
						@else
							
				<h1>{{@$news->title}}</h1>
				 {!! @$news->content !!}
				@endif
                </div>
            </div>
@endsection
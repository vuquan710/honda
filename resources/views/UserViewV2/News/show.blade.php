@extends('UserViewV2.Layout.default')

@section('content')
    <div class="container-fluid">
        <div class="grid_3">
            <div class="cold-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="post-title">{{@$news->title}}</h3>
                <img src="{{asset(@$news->small_image)}}" width="100%" class="img-responsive" alt=""/>
                <p class="">{{@$news->short_description}}</p>
                <p class="m_11">{!! @$news->content !!}</p>
            </div>
           
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
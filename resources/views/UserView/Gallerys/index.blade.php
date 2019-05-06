@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
@endsection
@section('js')
@endsection
@section('content')
     <div class="row">
	  <div class="col-md-1 col-sm-12"></div>
                <div class="col-md-10 col-sm-12 margin-top-10">
                    <!--the main content-->
                    <div class="carousel slide article-slide" id="article-photo-carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner cont-slider">
                            <div class="item active">
                                <img alt="" title="" src="{!! asset('img/gallery/ADL 1.jpg') !!}" class="img-responsive">
                            </div>
                            <div class="item">
                                <img alt="" title="" src="{!! asset('img/gallery/ADL 2.jpg') !!}" class="img-responsive">
                            </div>
                            <div class="item">
                                <img alt="" title="" src="{!! asset('img/gallery/ADL 3.jpg') !!}" class="img-responsive">
                            </div>
                            <div class="item">
                                <img alt="" title="" src="{!! asset('img/gallery/ADL 4.jpg') !!}" class="img-responsive">
                            </div>
                        </div>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
                                <img alt="" src="{!! asset('img/gallery/ADL 1.jpg') !!}">
                            </li>
                            <li class="" data-slide-to="1" data-target="#article-photo-carousel">
                                <img alt="" src="{!! asset('img/gallery/ADL 2.jpg') !!}">
                            </li>
                            <li class="" data-slide-to="2" data-target="#article-photo-carousel">
                                <img alt="" src="{!! asset('img/gallery/ADL 3.jpg') !!}">
                            </li>
                            <li class="" data-slide-to="3" data-target="#article-photo-carousel">
                                <img alt="" src="{!! asset('img/gallery/ADL 4.jpg') !!}">
                            </li>
                        </ol>
						 <a class="left carousel-control" href="#article-photo-carousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
 <a class="right carousel-control" href="#article-photo-carousel" data-slide="next">
    <span class="icon-next"></span>
  </a> 
                    </div>
                </div>
				  <div class="col-md-1 col-sm-12"></div>
            </div>
			<div class="row  margin-top-10"></div>
			<script>
			$('#article-photo-carousel').carousel({
  interval: 3000,
  cycle: true
}); 
			</script>
@endsection
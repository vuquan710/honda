@extends('UserViewV2.Layout.default')

@section('content')
    <div class="container-fluid">
        <section class="blog-top">
            @foreach($listNews as $key => $news)
                <?php
                $news = $news->toArray();
                ?>
                <article class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="grid_3">
                        <h3><a href="{{route('user.v2.news.show', $news['id'])}}">{{$news['title']}}</a></h3>
                        <a href="{{route('user.v2.news.show', $news['id'])}}"><img src="{{asset($news['small_image'])}}"
                                                                                   width="100%"
                                                                                   class="img-responsive img-news"
                                                                                   alt=""/></a>
                        <div class="header-blog">
                            <div class="blog-poast-admin">
                                <a href="#"><img src="{{asset('img/avatars/no_avatar.png')}}"
                                                 class="img-responsive img-admin img-thumbnail"
                                                 title="{{@$news['staff']['first_name'].@$news['staff']['last_name']}}"
                                                 alt=""/></a>
                            </div>
                            <div class="blog-poast-info">
                                <ul>
                                    <li><i class="fa fa-user"> </i><a class="admin"
                                                                      href="javascript:void(0);"><span> </span> @if(!empty($news['staff'])) {{$news['staff']['first_name'].'&nbsp;'.$news['staff']['last_name']}} @else {{__('messages.Admin')}} @endif
                                        </a></li>
                                    <li>
                                        <i class="fa fa-calendar"> </i><span> </span>{{date('Y/m/d H:i', strtotime($news['updated_at']))}}
                                    </li>
                                    {{--<li><i class="fa fa-comment"> </i><a class="p-blog" href="#"><span> </span>No Comments</a></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <p>@if(strlen($news['short_description'])<=200){{$news['short_description']}}@else{{substr($news['short_description'], 0, 200).'...'}}@endif</p>
                        <div class="button">
                            <a href="{{route('user.v2.news.show', $news['id'])}}">{{__('messages.UserV2.xem_them')}}</a>
                        </div>
                    </div>
                </article>
                @if($key%2==1)
                    <div class="clearfix"></div>
                @endif
            @endforeach
        </section>
    </div>
@endsection
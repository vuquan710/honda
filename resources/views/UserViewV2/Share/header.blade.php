<header>
    <div class="header_top font-quick-san">
        <div class="">
            <div class="header_top-box" style="margin-top:5px;">
                <div class="col-md-1 respon-logo">
                    <img width="90px" align="left" src="{!! asset('img/base/adl-lg2.png') !!}" class="hidden-xs hidden-sm">
                </div>
                <div class="col-md-11">
                    <div class="row hidden-xs hidden-sm" style="height:40.5px">
                        <font class="hidden-xs hidden-sm" size="6" ><b><center>MAY / IN / THÊU THEO YÊU CẦU</center></b></font>
                    </div>
                     <div class="row" style="height:49px;">
                        <nav class="navbar navbar-grey">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed btn" data-toggle="collapse"
                                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand hidden-md hidden-sm hidden-lg" href="#">
									<img src="{!! asset('img/base/adl-lg2.png') !!}" style="height:40px;margin-top:-15px;" class="img-reponsive"/>
									</a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="@if(\Route::current()->getName() == 'user.v2.homes.index') active @endif"><a
                                                    href="{{route('user.v2.homes.index')}}"><i class="fa fa-home" style="font-size: 3em; margin-top: -15px; color: #fff;"></i></a></li>
                                        @foreach($categories as $category)
                                            @if(empty($category['children']))
                                                <li class=""><a
                                                            href="{{route('user.v2.categories.show', $category['id'])}}">{{$category['name']}}
                                                        <span class="sr-only">(current)</span></a></li>
                                            @else
                                                <li class="dropdown">
                                                    <a href="{{route('user.v2.categories.show', $category['id'])}}"
                                                       class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button"
                                                       aria-haspopup="true" aria-expanded="false">{{$category['name']}} <span
                                                                class="caret"></span></a>
                                                    <div class="megapanel dropdown-menu">
                                                        @foreach($category['children'] as $children)
                                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                <div class="content-sub-menu">
                                                                    <a href="{{route('user.v2.categories.show', $children['id'])}}">{{$children['name']}}</a>
                                                                    <div class="clearfix"></div>
                                                                    <div class="row">
                                                                        @if(!empty($children['product']))
                                                                            @foreach($children['product'] as $product)
                                                                                <div class="col-md-6 margin-top-5">
                                                                                    <a href="{{route('user.v2.products.show', $product['alias'])}}"><img
                                                                                                src="{{asset($product['image_main_url'])}}"
                                                                                                width="50px" height="100px" class=""/>
                                                                                    </a>
                                                                                    <div class="detail">
                                                                                        <h4>
                                                                                            <a href="{{route('user.v2.products.show', $product['alias'])}}">{{$product['name']}}</a>
                                                                                        </h4>
                                                                                        <p>
                                                                                            <span class="red">{{number_format($product['price'])}}</span>&nbsp;<span
                                                                                                    class="font-12">{{\App\Models\Product::$unit[$product['unit']]}}</span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a
                                                                                    href="{{route('user.v2.categories.show', $children['id'])}}"><span
                                                                                        class="green more">{{__('messages.UserV2.xem_them')}}
                                                                                    ...
                                                                            </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endif

                                        @endforeach
                                    </ul>
                                    @if(count($listNewsCat['show_menu_on'])+count($listNewsCat['show_menu_off'])>0)
                                        <ul class="nav navbar-nav">
                                            @foreach($listNewsCat['show_menu_on'] as $newsCat)
                                                <li>
                                                    <a href="{{route('user.v2.newsCategories.show', $newsCat['id'])}}">{{$newsCat['name']}}</a>
                                                </li>
                                            @endforeach
                                            @if(count($listNewsCat['show_menu_off'])>0)
                                                <li>
                                                    <a href="#" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button"
                                                       aria-haspopup="true" aria-expanded="false">{{__('messages.UserV2.tin_tuc')}}<span
                                                                class="caret"></span></a>
                                                    <div class="megapanel dropdown-menu">
                                                        @foreach($listNewsCat['show_menu_off'] as $newsCat)
                                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                <div class="content-sub-menu">
                                                                    <a href="{{route('user.v2.newsCategories.show', $newsCat['id'])}}">{{$newsCat['name']}}</a>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                    <ul class="nav navbar-nav">
                                        <li class="@if(\Route::current()->getName() == 'user.v2.homes.contact') active @endif">
                                            <a href="{{route('user.v2.homes.contact')}}">{{__('messages.UserV2.lien_he')}}</a>
                                        </li>

                                    </ul>
                                </div><!-- /.navbar-collapse -->

                        </nav>
                    </div>   
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
</header>
 
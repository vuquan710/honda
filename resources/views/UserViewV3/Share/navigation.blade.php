<!-- navigation -->
<div class="navigation">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                        data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('user.v3.homes.index')}}" class="act">{{__('userV3Messages.trang_chu')}}</a>
                    </li>
                    <!-- Mega Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{__('userV3Messages.san_pham')}} <b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                @foreach($categories as $category)
                                    <div class="col-sm-3">
                                        <ul class="multi-column-dropdown">
                                            <h6>{{$category['name']}}</h6>
                                            <li>
                                                <a href="{{route('user.v3.categories.show', $category['slug'])}}">{{$category['name']}}</a>
                                            </li>
                                            @if(!empty($category['children']))
                                                @foreach($category['children'] as $child)
                                                    <li>
                                                        <a href="{{route('user.v3.categories.show', $child['slug'])}}">{{$child['name']}}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </ul>
                    </li>
                    <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true" aria-expanded="false">{{__('userV3Messages.tin_tuc')}}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($listNewsCategory as $newsCategory)
                                <li>
                                    <a href="{{route('user.v3.newsCategories.show', $newsCategory['slug'])}}">{{$newsCategory['name']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('user.v3.homes.aboutUs')}}">{{__('userV3Messages.ve_chung_toi')}}</a></li>
                    <li><a href="{{route('user.v3.homes.contactUs')}}">{{__('userV3Messages.lien_he')}}</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- //navigation -->
<div class="navbar-collapse collapse" id="navigation">

    <ul class="nav navbar-nav navbar-left">

        <li @if(\Route::current()->getName() == 'user.v2.homes.index') class="active" @endif><a
                    href="{{route('user.v2.homes.index')}}">Home</a></li>
        @foreach($categories as $category)
            @if(!empty($category['children']))
                <li class="dropdown yamm-fw">
                    <a href="{{route('user.v2.categories.show', @$category['id'])}}" class="dropdown-toggle"
                       data-toggle="dropdown" data-hover="dropdown" data-delay="200">{{@$category['name']}}
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">{{@$category['name']}}
                                </div>
                            </div>
                        </li>
                        @foreach($category['children'] as $children)
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        @if(!empty($children['children']))
                                            @foreach($children['$children'] as $child)
                                                <div class="col-sm-3">
                                                    <h5>
                                                        <a href="{{route('user.v2.categories.show', $children['id'])}}">{{$children['name']}}</a>
                                                    </h5>
                                                    <ul>

                                                        <li>
                                                            <a href="{{route('user.v2.categories.show', $child['id'])}}">{{$child['name']}}</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-sm-12">
                                                <h5>{{$children['name']}}</h5>
                                                <ul>
                                                    <li>
                                                        Anh SP
                                                    </li>
                                                    <li>Anh SP</li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li @if(\Route::current()->getName() == 'user.v2.categories.show' && \Route::current()->parameter('category') == $category['id']) class="active" @endif>
                    <a href="{{route('user.v2.categories.show', @$category['id'])}}">
                        {{@$category['name']}}</a>
                </li>
            @endif

        @endforeach
    </ul>

</div>
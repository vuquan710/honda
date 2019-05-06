<div id="sidebar" class="sidebar responsive ace-save-state">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">

        <li class="{{(strpos(\Route::current()->getName(), 'admin.homes.') !== false)?"open active":"" }}">
            <a href="{{route('admin.homes.index')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> {{__('messages.Dashboard')}}  </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="{{(strpos(\Route::current()->getName(), 'admin.products.') !== false)?"open active":"" }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
								{{__('messages.Products')}}
							</span>

                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{(strpos(\Route::current()->getName(), 'admin.products.index') !== false)?"active":"" }}">
                    <a href="{{route('admin.products.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{__('messages.List_Product')}}
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{route('admin.comments.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{__('messages.List_Comment')}}
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{__('messages.List_Review')}}
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{(strpos(\Route::current()->getName(), 'admin.categories.') !== false)?"open active":"" }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">{{__('messages.Categories')}}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{(strpos(\Route::current()->getName(), 'admin.categories.index') !== false)?"active":"" }}">
                    <a href="{{route('admin.categories.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{__('messages.List_Category')}}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{(strpos(\Route::current()->getName(), 'admin.vendors.') !== false)?"open active":"" }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-handshake-o"></i>
                <span class="menu-text">{{__('messages.Product_Vendors')}}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{(strpos(\Route::current()->getName(), 'admin.vendors.index') !== false)?"active":"" }}">
                    <a href="{{route('admin.vendors.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{__('messages.List_Product_Vendors')}}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{(strpos(\Route::current()->getName(), 'admin.news_categories.') !== false)?"open active":"" }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">{{__('messages.NewsCategories')}}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{(strpos(\Route::current()->getName(), 'admin.news_categories.index') !== false)?"active":"" }}">
                    <a href="{{route('admin.news_categories.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{__('messages.List_NewsCategory')}}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{(strpos(\Route::current()->getName(), 'admin.news.') !== false)?"open active":"" }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">{{__('messages.News')}}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="{{(strpos(\Route::current()->getName(), 'admin.news.index') !== false)?"active":"" }}">
                    <a href="{{route('admin.news.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        {{__('messages.List_News')}}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        @if(\Auth::guard('admin')->user()->author_type == \App\Models\Staff::AUTHOR_ADMIN)
            <li class="{{(strpos(\Route::current()->getName(), 'admin.users.') !== false)?"open active":"" }}">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text">{{__('messages.Users')}}</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="{{(strpos(\Route::current()->getName(), 'admin.users.index')!== false)?"active":"" }}">
                        <a href="{!! route('admin.users.index') !!}">
                            <i class="menu-icon fa fa-users"></i>
                            {{__('messages.List_Users')}}
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="#">
                            <i class="menu-icon fa fa-user-secret"></i>
                            {{__('messages.Follow_User')}}
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="{{(strpos(\Route::current()->getName(), 'admin.staffs.') !== false)?"open active":"" }}">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">{{__('messages.Staffs')}}</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class="{{(strpos(\Route::current()->getName(), 'admin.staffs.index') !== false)?"active":"" }}">
                        <a href="{{route('admin.staffs.index')}}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            {{__('messages.List_Staffs')}}
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="{{(strpos(\Route::current()->getName(), 'admin.settings.index') !== false)?"active":""}}">
                <a href="{{route('admin.settings.index')}}">
                    <i class="menu-icon fa fa-cogs"></i>
                    <span class="menu-text">  {{__('messages.Setting')}}  </span>
                </a>
                <b class="arrow"></b>
            </li>
        @endif
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
           data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
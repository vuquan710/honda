@extends('AdminView.AppLayouts.default')

@section('title', __('Dashboard'))

@section('script')
    <script src="{{asset('js/admin/users/user.js')}}"></script>
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Detail')])
            <div class="page-header">
                <h1>
                    {{__('messages.List_Users')}}
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.Detail')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div id="user-profile-1" class="user-profile row">
                            <div class="col-xs-12 col-sm-3 center">
                                <div>
                                    <span class="profile-picture">
                                        <img id="avatar"
                                             class="editable img-responsive editable-click editable-empty"
                                             alt="{{$user->full_name}}'s Avatar"
                                             src="{{empty($user->photo)?asset('img/avatars/no_avatar.png'):$user->photo}}">
                                    </span>
                                    <div class="space-4"></div>
                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                        <div class="inline position-relative">
                                            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                <i class="ace-icon fa fa-circle light-green"></i>
                                                &nbsp;
                                                <span class="white">{{$user->full_name}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-6"></div>
                                <div class="profile-contact-info">
                                    <div class="profile-contact-links align-left">
                                        <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                                            {{__('messages.Send_a_message')}}
                                        </a>
                                    </div>

                                    <div class="space-6"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <div class="center">
												<span class="btn btn-app btn-sm btn-light no-hover">
													<span class="line-height-1 bigger-170 blue"> 1,411 </span>

													<br>
													<span class="line-height-1 smaller-90"> {{__('messages.Orders')}} </span>
												</span>

                                    <span class="btn btn-app btn-sm btn-yellow no-hover">
													<span class="line-height-1 bigger-170"> 32 </span>

													<br>
													<span class="line-height-1 smaller-90"> Followers </span>
												</span>

                                    <span class="btn btn-app btn-sm btn-pink no-hover">
													<span class="line-height-1 bigger-170"> 4 </span>

													<br>
													<span class="line-height-1 smaller-90"> Projects </span>
												</span>

                                    <span class="btn btn-app btn-sm btn-grey no-hover">
													<span class="line-height-1 bigger-170"> 23 </span>

													<br>
													<span class="line-height-1 smaller-90"> Reviews </span>
												</span>

                                    <span class="btn btn-app btn-sm btn-success no-hover">
													<span class="line-height-1 bigger-170"> 7 </span>

													<br>
													<span class="line-height-1 smaller-90"> Albums </span>
												</span>

                                    <span class="btn btn-app btn-sm btn-primary no-hover">
													<span class="line-height-1 bigger-170"> 55 </span>

													<br>
													<span class="line-height-1 smaller-90"> Contacts </span>
												</span>
                                </div>

                                <div class="space-12"></div>

                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> E-Mail</div>

                                        <div class="profile-info-value">
                                            <span class="editable editable-click" id="username">{{$user->email}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> {{__('messages.Address')}}</div>

                                        <div class="profile-info-value">
                                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                                            <span class="">{{empty($user->address)?'-':$user->address}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> {{__('messages.Age')}}</div>

                                        <div class="profile-info-value">
                                            <span class="">38</span>
                                        </div>
                                    </div>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> {{__('messages.Phone_number')}}</div>

                                        <div class="profile-info-value">
                                            <span class="">{{empty($user->phone_number)?'_':$user->phone_number}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> {{__('messages.Created_At')}}</div>

                                        <div class="profile-info-value">
                                            <span class="">{{date('Y/m/d', strtotime($user->created_at))}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> {{__('messages.Last_Online')}}</div>

                                        <div class="profile-info-value">
                                            <span class="">{{date('Y/m/d H:i:s', strtotime($user->last_access_at))}}</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> {{__('messages.Description')}}</div>

                                        <div class="profile-info-value">
                                            <span class="">{{empty($user->description)?'-':$user->description}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-20"></div>

                                <div class="widget-box transparent">
                                    <div class="widget-header widget-header-small">
                                        <h4 class="widget-title blue smaller">
                                            <i class="ace-icon fa fa-rss orange"></i>
                                            {{__('messages.Recent_Orders')}}
                                        </h4>

                                        <div class="widget-toolbar action-buttons">
                                            <a href="javascript:void(0)" onclick="loadRecentOrder(this)"
                                               target-element="list-recent-orders"
                                               target-link="{{route('admin.orders.listRecentOrder')}}">
                                                <i class="ace-icon fa fa-refresh blue"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main padding-8">
                                            <div class="profile-feed ace-scroll">
                                                <div class="scroll-content list-recent-orders"
                                                     style="max-height: 200px;overflow-y: scroll">
                                                    <div class="profile-activity clearfix">
                                                        <div>
                                                            <a href="#" class="btn btn-app btn-default">
                                                                <span class="ace-icon bigger-180">29/1</span>
                                                            </a>
                                                            <a class="user" href="#"> Alex Doe </a>
                                                            has order.
                                                            <a href="#">Take a look</a>

                                                            <div class="time">
                                                                <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                18:00:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="profile-activity clearfix">
                                                        <div>
                                                            <a href="#" class="btn btn-app btn-success">
                                                                <span class="ace-icon bigger-180">29/1</span>
                                                            </a>
                                                            <a class="user" href="#"> Alex Doe </a>
                                                            has order.
                                                            <a href="#">Take a look</a>

                                                            <div class="time">
                                                                <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                18:00:00
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="hr hr2 hr-double"></div>

                                <div class="space-6"></div>

                                <div class="center">
                                    <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                                        <i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
                                        <span class="bigger-110">{{__('messages.View_more_orders')}}</span>
                                        <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
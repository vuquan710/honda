@extends('AdminView.AppLayouts.default')

@section('title', __('Dashboard'))

@section('script')
    <script>
        $('#modal-change-password').on('shown.bs.modal', function () {
            $('#form-change-password')[0].reset();
        })
    </script>
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Detail')])
            <div class="page-header">
                <h1>
                    {{__('messages.Staffs')}}
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
                            </div>
                            <div class="col-xs-12 col-sm-9">


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


                                <div class="hr hr2 hr-double"></div>

                                <div class="space-6"></div>

                                <div class="center">
                                    <button type="button" data-toggle="modal" data-target="#modal-change-password"
                                            class="btn btn-sm btn-danger">
                                        <span class="bigger-110">{{__('messages.Change_Password')}}</span>
                                    </button>
                                    <div id="modal-change-password" class="modal fade" role="dialog"
                                         data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{__('messages.Change_Password')}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="javascript:void(0);"
                                                          id="form-change-password">
                                                        <input type="hidden" name="alias" value="{{$user->alias}}"/>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4"
                                                                   for="old_password">{{__('messages.Old_Password')}}
                                                                :</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" name="old_password"
                                                                       class="form-control" id="old_password"
                                                                       placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4"
                                                                   for="new_password">{{__('messages.New_Password')}}
                                                                :</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" name="new_password"
                                                                       class="form-control" id="new_password"
                                                                       placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-4"
                                                                   for="confirm_new_password">{{__('messages.Confirm_New_Password')}}
                                                                :</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" name="confirm_new_password"
                                                                       class="form-control" id="confirm_new_password"
                                                                       placeholder="">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success btn-sm"
                                                            onclick="changePassword(this)"
                                                            data-target="#form-change-password"
                                                            data-link="{{route('admin.staffs.change_password')}}">
                                                        {{__('messages.Save')}}
                                                    </button>
                                                    <button type="button" class="btn btn-default btn-sm"
                                                            data-dismiss="modal">
                                                        {{__('messages.Back')}}
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="{{route('admin.staffs.edit', @$user->id)}}"
                                       class="btn btn-sm btn-primary">
                                        <span class="bigger-110">{{__('messages.Edit')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
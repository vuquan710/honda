@extends('AdminView.AppLayouts.default')

@section('title', __('Dashboard'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Staffs')])
            <div class="page-header">
                <h1>
                    {{__('messages.Staffs')}}
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.Add')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        @include('AdminView.Share.errorValidate')
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <form class="form-horizontal" method="POST" action="{{route('admin.staffs.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.UserName')}}<i class="require-character">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control" placeholder="{{__('messages.UserName')}}">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.Password')}}<i class="require-character">*</i></label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" placeholder="{{__('messages.Password')}}">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"> {{__('messages.Email')}}</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="{{__('messages.Email')}}">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.FirstName')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="first_name" class="form-control" placeholder="{{__('messages.FirstName')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.LastName')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" class="form-control" placeholder="{{__('messages.LastName')}}">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm">{{__('messages.Save')}} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
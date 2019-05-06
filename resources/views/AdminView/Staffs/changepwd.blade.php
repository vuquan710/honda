@extends('AdminView.AppLayouts.default')

@section('title', __('Dashboard'))

@section('script')
    <script src="{{asset('js/admin/users/user.js')}}"></script>
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.ChangePass')])
            <div class="page-header">
                <h1>
                    {{__('messages.List_Users')}}
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.ChangePass')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                       <form class="form-horizontal" method="POST" action="{{route('admin.staffs.updatePassword')}}">
					     {{csrf_field()}}
							 {{ method_field('PUT') }}
            
   
      <div class="form-group">
       <label for="current-password" class="col-sm-4 control-label"> {{__('messages.CurPass')}}</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="current-password" name="curentpassword" placeholder="{{__('messages.CurPass')}}">
      </div>
    </div>
  
      <div class="form-group">
	    <label for="password" class="col-sm-4 control-label">{{__('messages.NewPass')}}</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="{{__('messages.NewPass')}}">
      </div>
    </div>
  
      <div class="form-group">
	    <label for="password_confirmation" class="col-sm-4 control-label">{{__('messages.ConfirmPass')}}</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="password_confirmation" name="passwordconfirmation" placeholder="{{__('messages.ConfirmPass')}}">
      </div>
    </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">{{__('messages.Update')}}</button>
    </div>
  </div>
</form>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
@extends('AdminView.AppLayouts.default')

@section('title', __('Dashboard'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Product_Vendors')])
            <div class="page-header">
                <h1>
                    {{__('messages.Product_Vendors')}}
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
                        <form class="form-horizontal" method="POST" action="{{route('admin.productvendors.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Vendor Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" placeholder="Address">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="contact_email" class="form-control" placeholder="Email">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary"> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
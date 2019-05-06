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
                        {{__('messages.Edit')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        @include('AdminView.Share.errorValidate')
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <form class="form-horizontal" method="POST" action="{{route('admin.vendors.update',$productVendor->id)}}">
						 {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.VendorName')}}<i class="require-character">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="{{__('messages.VendorName')}}" value="{{ $productVendor->name }}">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.Address')}}<i class="require-character">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" placeholder="{{__('messages.Address')}}" value="{{ $productVendor->address }}">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.Email')}}</label>
                                <div class="col-sm-10">
                                    <input type="email" name="contact_email" class="form-control" placeholder="{{__('messages.Email')}}" value="{{ $productVendor->contact_email }}">
                                </div>
                            </div>
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.Phone_number')}}<i class="require-character">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone_number" class="form-control" placeholder="{{__('messages.Phone_number')}}" value="{{ $productVendor->phone_number }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">{{__('messages.Description')}}</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="description" placeholder="{{__('messages.Description')}}" >{{ $productVendor->description }}</textarea>
                                </div>
                            </div>
                           <div class="form-group">
                               
                                <div class="col-sm-10">
                                    <input type="hidden" name="created_by" class="form-control"  value="{{ $productVendor->created_by }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm"> {{__('messages.Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
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
                        {{__('messages.All')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="pull-right margin-bottom-10">
                            <a href="{{route('admin.productvendors.create')}}"
                               class="btn btn-success btn-sm">{{__('messages.Add')}}</a>
                        </div>
                        <div class="table table-responsive">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" width="5px">#</th>
                                    <th >{{__('messages.Product_Vendors')}}</th>
									<th >{{__('messages.Phone_number')}}</th>
									<th >{{__('messages.Address')}}</th>
									<th >{{__('messages.Email')}}</th>
                                    <th >{{__('messages.Description')}}</th>
                                    <th width="60px"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($listProductVendors as $key => $productvendor)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{@$productvendor['name']}}</td>
										 <td>{{@$productvendor['phone_number']}}</td>
										  <td>{{@$productvendor['address']}}</td>
										   <td>{{@$productvendor['contact_email']}}</td>
                                        <td>{{@$productvendor['description']}}</td>
                                        <td class="text-center">
                                            <div class="action-buttons">
                                                <a href="{{route('admin.productvendors.edit', $productvendor['id'])}}" class="info" >
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="red" onclick="confirmDeleteData(this)"
                                                   data-url="{{route('admin.productvendors.destroy', $productvendor['id'])}}"
                                                   title="{{__('messages.Delete')}}">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
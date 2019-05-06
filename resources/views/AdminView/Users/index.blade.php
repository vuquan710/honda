@extends('AdminView.AppLayouts.default')

@section('title', __('Dashboard'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Users')])
            <div class="page-header">
                <h1>
                    {{__('messages.Users')}}
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.All')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    {{--<div class="col-md-12 col-lg-12">--}}
                        {{--Search--}}
                        {{--<input name="email" type="text" class="margin-bottom-10" placeholder="Search name, email, phone,..."/><button class="btn btn-success btn-sm margin-left-10">Search</button>--}}
                    {{--</div>--}}
                    <div class="col-md-12 col-lg-12">
                        <div class="pull-right tableTools-container">
                            <div class="dt-buttons btn-overlap btn-group">
                                <a class="dt-button buttons-collection buttons-colvis btn btn-white btn-primary btn-bold"
                                   tabindex="0" title="">
                                    <span>
                                        <i class="fa fa-trash-o bigger-110 red"></i>
                                        <span class="hidden">Show/hide columns</span>
                                    </span>
                                </a>
                                <a class="dt-button buttons-csv buttons-html5 btn btn-white btn-primary btn-bold"
                                   title="">
                                    <span>
                                        <i class="fa fa-cloud-download bigger-110 blue"></i>
                                        <span class="hidden">Export to CSV</span>
                                    </span>
                                </a>
                                <a class="dt-button buttons-print btn btn-white btn-primary btn-bold" tabindex="0"
                                   title="">
                                    <span>
                                        <i class="fa fa-print bigger-110 grey"></i>
                                        <span class="hidden">Print</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="pull-left">
                            @include('AdminView.Share.limit_default', ['paginator'=>$listUsers, 'listOption' => \App\Http\Controllers\Admin\AdminAppController::$listOptionPaginate])
                        </div>
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center" width="1%">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace">
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th class="">#</th>
                                    <th class="">{{__('messages.Full_name')}}</th>
                                    <th>Email</th>
                                    <th class="">{{__('messages.Phone_number')}}</th>
                                    <th class="">{{__('messages.Address')}}</th>
                                    <th class="">{{__('messages.Status')}}</th>
                                    <th width="1%"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @if($listUsers->count()>0)
                                    @foreach($listUsers as $key => $user)
                                        <tr>
                                            <td>
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace">
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>{{ ($key+1)+($listUsers->currentPage()-1)*$listUsers->perPage() }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.show', $user->alias) }}">{{ $user->full_name }}</a>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ empty($user->phone_number)?'-':$user->phone_number }}</td>
                                            <td>{{ empty($user->address)?'-':$user->address }}</td>
                                            <td>{{\App\Models\User::$status[$user->status]}}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a class="red" href="#" title="{{__('messages.Delete')}}">
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                        @include('AdminView.Share.pagination_default', ['paginator'=>$listUsers])

                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
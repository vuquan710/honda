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
							<div class="pull-right margin-left-10" >
                            <a href="{{route('admin.staffs.create')}}"
                               class="btn btn-success btn-sm">{{__('messages.Add')}}</a>
                        </div>
                        </div>
						
                        <div class="pull-left">
                            @include('AdminView.Share.limit_default', ['paginator'=>$listStaffs, 'listOption' => \App\Http\Controllers\Admin\AdminAppController::$listOptionPaginate])
                        </div>
						
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                <tr>
								<!--
                                    <th class="center" width="1%">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace">
                                            <span class="lbl"></span>
                                        </label>
                                    </th>-->
                                    <th class="">#</th>
                                    <th class="">{{__('messages.Full_name')}}</th>
									<th>{{__('messages.UserName')}}</th>
                                    <th>{{__('messages.Email')}}</th>
                                    <th class="">{{__('messages.Phone_number')}}</th>
                                    <th>{{__('messages.Role')}}</th>

                                    <th width="60px"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @if($listStaffs->count()>0)
                                    @foreach($listStaffs as $key => $user)
                                        <tr>
                                          <!--  <td>
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace">
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>-->
                                            <td>{{ ($key+1)+($listStaffs->currentPage()-1)*$listStaffs->perPage() }}</td>
                                            <td>
                                                <a href="{{ route('admin.staffs.show', $user->alias) }}">{{ $user->full_name }}</a>
                                            </td>
											<td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ empty($user->phone_number)?'-':$user->phone_number }}</td>
                                            <td>{{\App\Models\Staff::$authorType[$user->author_type]}}</td>
                                           
                                            <td>
                                                <div class="action-buttons">
												 <a href="{{route('admin.staffs.edit', $user['id'])}}" class="info" >
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>
                                                    <a class="red"  onclick="confirmDeleteData(this,'{{__('messages.MessageConfirmDelete')}}')" title="{{__('messages.Delete')}}" href="javascript:void(0)" data-url="{{route('admin.staffs.destroy', $user['id'])}}">
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

                        @include('AdminView.Share.pagination_default', ['paginator'=>$listStaffs])

                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
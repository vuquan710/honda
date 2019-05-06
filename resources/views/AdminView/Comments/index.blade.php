@extends('AdminView.AppLayouts.default')

@section('title', __('messages.List_Comment'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.List_Comment')])
            <div class="page-header">
                <h1>
                    <a href="{{route('admin.comments.index')}}">{{__('messages.List_Comment')}}</a>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.All')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="table table-responsive">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" width="1%">#</th>
                                    <th class="">{{__('messages.Name_Category')}}&nbsp;({{__('messages.VI')}})</th>
                                    <th class="">{{__('messages.Name_Category')}}&nbsp;({{__('messages.EN')}})</th>
                                    <th width="25%">{{__('messages.Description')}}&nbsp;({{__('messages.VI')}})</th>
                                    <th width="25%">{{__('messages.Description')}}&nbsp;({{__('messages.EN')}})</th>
                                    <th width="60px"></th>
                                </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
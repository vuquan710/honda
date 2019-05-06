@extends('AdminView.AppLayouts.default')

@section('title', __('messages.NewsCategories'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.NewsCategories')])
            <div class="page-header">
                <h1>
                    <a href="{{route('admin.news_categories.index')}}">{{__('messages.NewsCategories')}}</a>
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
                            <a href="{{route('admin.news_categories.create')}}"
                               class="btn btn-success btn-sm">{{__('messages.Add')}}</a>
                        </div>
                        <div class="table table-responsive">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" width="1%">#</th>
                                    <th class="">{{__('messages.Name_NewsCategory')}}</th>
                                    <th width="50%">{{__('messages.Description')}}</th>
                                    <th width="60px"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($listNewsCategories as $key => $newscategory)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{@$newscategory['name']}}{{ method_field('PUT') }}</td>
                                        <td>{{@$newscategory['description']}}</td>
                                        <td class="text-center">
                                            <div class="action-buttons">
                                                <a href="{{route('admin.news_categories.edit', $newscategory['id'])}}" class="info">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="red" onclick="confirmDeleteData(this)"
                                                   data-url="{{route('admin.news_categories.destroy', $newscategory['id'])}}"
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
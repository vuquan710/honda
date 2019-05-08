@extends('AdminView.AppLayouts.default')

@section('title', __('messages.Categories'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Categories')])
            <div class="page-header">
                <h1>
                    <a href="{{route('admin.categories.index')}}">{{__('messages.Categories')}}</a>
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
                            <a href="{{route('admin.categories.create')}}"
                               class="btn btn-success btn-sm">{{__('messages.Add')}}</a>
                        </div>
                        <div class="table table-responsive">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" width="1%">#</th>
                                    <th class="">{{__('messages.Name_Category')}}&nbsp;({{__('messages.VI')}})</th>
                                    {{--<th class="">{{__('messages.Name_Category')}}&nbsp;({{__('messages.EN')}})</th>--}}
                                    <th width="25%">{{__('messages.Description')}}&nbsp;({{__('messages.VI')}})</th>
                                    {{--<th width="25%">{{__('messages.Description')}}&nbsp;({{__('messages.EN')}})</th>--}}
                                    {{--<th width="10%">{{__('messages.ImageBanner')}}</th>--}}
                                    <th width="60px"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($listCategories as $key => $category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{@$category['text_name']}}{{ method_field('PUT') }}</td>
                                        {{--<td>{{@$category['en_text_name']}}</td>--}}
                                        <td>{{@$category['description']}}</td>
                                        {{--<td>{{@$category['en_description']}}</td>--}}
                                        {{--<td>@if(!empty($category['url_banner']))<img width="100px"--}}
                                                                                     {{--src="{{asset($category['url_banner'])}}"/>@endif--}}
                                        {{--</td>--}}
                                        <td class="text-center">
                                            <div class="action-buttons">
                                                <a href="{{route('admin.categories.edit', $category['id'])}}"
                                                   class="info">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="red"
                                                   onclick="confirmDeleteData(this)"
                                                   data-url="{{route('admin.categories.destroy', $category['id'])}}"
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
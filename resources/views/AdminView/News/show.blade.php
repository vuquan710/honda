@extends('AdminView.AppLayouts.default')

@section('title', __('messages.News'))

@section('sidebar')
@endsection
@section('script')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.News')])
            <div class="page-header">
                <h1>
                    <a href="{{route('admin.products.index')}}">{{__('messages.News')}}</a>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.Detail')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="pull-right margin-bottom-10">
                    <a href="{{route('admin.news.edit', $new['id'])}}"
                       class="btn btn-primary btn-sm">{{__('messages.Edit')}}</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 colsm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class=" img-main">
                                    <img src="{{asset($new['small_image'])}}" class="img-product"
                                         src=""/>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="table-responsive">
                                    <table width="100%"
                                           class="table-hover table-bordered table-detail table-detail-product">
                                        <tr>
                                            <th width="10%">
                                                <div>{{__('messages.Title')}}:</div>
                                            </th>
                                            <td>{{$new['title']}}&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th width="10%">{{__('messages.Status')}}:</th>
                                            <td colspan="2" class="valign-middle">
                                                <span>
                                                    {{__('messages.Show')}}:&nbsp;@if($new['is_show'])
                                                        <i class="fa fa-check-square-o green"></i>@else <i
                                                                class="fa fa-square-o"></i> @endif
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{__('messages.NewsCategories')}}:</th>
                                              <td> @foreach($NewsCategory as $newscategory)
                                                @if($newscategory['id'] == $new['news_category_id'])
                                                    {{$newscategory['name']}}
                                                @else
                                                {{"-"}}
                                                @endif
                                            @endforeach</td>
                                        </tr>
                                        <tr>
                                            <th width="10%">
                                                <div>{{__('messages.Short_Description')}}:</div>
                                            </th>
                                            <td colspan="3">{{$new['short_description']}}</td>
                                        </tr>
                                        <tr>
                                            <th width="10%">
                                                <div>{{__('messages.Content')}}:</div>
                                            </th>
                                            <td colspan="3">
                                                <textarea class="editor" disabled>
                                                    {!! $new['content'] !!}
                                                </textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
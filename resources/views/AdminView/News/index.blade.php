@extends('AdminView.AppLayouts.default')

@section('title', __('messages.News'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.News')])
            <div class="page-header">
                <h1>
                    {{__('messages.News')}}
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.All')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="box-search">
                        <form method="GET" action="{{route('admin.news.index')}}">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="search-name"
                                           class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label font-13 padding-top-10 text-center">{{__('messages.Title')}}
                                        /{{__('messages.Short_Description')}}</label>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" id="search-name" name="search" class="form-control font-13"
                                               value="{{@$dataSearch}}"
                                               placeholder="Input name or code product">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <button type="submit"
                                                class="btn btn-primary btn-sm">{{__('messages.Search')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="pull-right padding-left-20"><a href="{{__(route('admin.news.create'))}}" class="btn btn-success btn-sm">{{__('messages.Add')}}</a></div>
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
                            @include('AdminView.Share.limit_default', ['paginator'=>$listNews, 'listOption' => \App\Http\Controllers\Admin\AdminAppController::$listOptionPaginate, 'dataSearch'=>$dataSearch])
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
                                    <th class="">{{__('messages.Title')}}</th>
                                    <th>{{__('messages.Short_Description')}}</th>
                                    <th class="">{{__('messages.NewsCategories')}}</th>
                                    <th width="60px"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @if($listNews->count()>0)
                                    @foreach($listNews as $key => $news)
                                        <tr>
                                            <td>
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace">
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>{{ ($key+1)+($listNews->currentPage()-1)*$listNews->perPage() }}</td>
                                            <td>
                                                <a href="{{ route('admin.news.show', $news->id) }}">{{ $news->title }}</a>
                                            </td>
                                            <td>{{ $news->short_description }}</td>
                                            <td> @foreach($listNewsCategories as $newscategory)
                                                @if($newscategory['id'] == $news['news_category_id'])
                                                    {{$newscategory['name']}}
                                                @endif
                                            @endforeach</td>
                                            <td class="text-center">
                                                <div class="action-buttons">
                                                    <a href="{{route('admin.news.edit', $news->id)}}"
                                                       class="info">
                                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="red"
                                                       onclick="confirmDeleteData(this)"
                                                       data-url="{{route('admin.news.destroy', $news->id)}}"
                                                       title="{{__('messages.Delete')}}">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                        @include('AdminView.Share.pagination_default', ['paginator'=>$listNews, 'dataSearch'=>$dataSearch])

                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
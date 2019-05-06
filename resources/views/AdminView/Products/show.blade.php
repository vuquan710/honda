@extends('AdminView.AppLayouts.default')

@section('title', __('messages.Products'))

@section('sidebar')
@endsection
@section('script')
    <script src="{!! URL::asset('js/admin/products/create.js') !!}"></script>
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Products')])
            <div class="page-header">
                <h1>
                    <a href="{{route('admin.products.index')}}">{{__('messages.Products')}}</a>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.Detail')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="pull-right margin-bottom-10">
                    <a href="{{route('admin.products.edit', $product['alias'])}}"
                       class="btn btn-primary btn-sm">{{__('messages.Edit')}}</a>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 colsm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class=" img-main">
                                    <img src="{{asset($product['imageMain']['url_thumb'])}}" class="img-product"
                                         src=""/>
                                </div>
                                <div class="img-other padding-top-5 margin-bottom-10">
                                    @if(!empty($product['images']))
                                        @foreach($product['images'] as $image)
                                            <img src="{{asset($image['url_thumb'])}}"
                                                 class="img-product-thumb @if($product['imageMain']['url_thumb'] == $image['url_thumb']) active @endif"
                                                 title=""/>
                                        @endforeach
                                    @else
                                        <img src="#" width="100%" height="30vh" class="img img-thumbnail img-responsive"
                                             title="No Image"/>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="table-responsive">
                                    <table width="100%"
                                           class="table-hover table-bordered table-detail table-detail-product">
                                        <tr>
                                            <th width="10%">
                                                <div>{{__('messages.Name')}}:</div>
                                                <div>({{__('messages.VI').'/'.__('messages.EN')}})</div>
                                            </th>
                                            <td>{{$product['name']}}&nbsp;({{@$product['en_name']}})</td>
                                            <th>
                                                <div class="text-right">{{__('messages.Code')}}:</div>
                                            </th>
                                            <td>{{empty($product['product_code'])?"-":$product['product_code']}}</td>
                                        </tr>
                                        <tr>
                                            <th width="10%">{{__('messages.Quantity')}}:</th>
                                            <td class="valign-middle">{{$product['quantity']}}</td>
                                            <td colspan="2" class="valign-middle">
                                                <span>
                                                    {{__('messages.New')}}:&nbsp;@if($product['is_new'])
                                                        <i class="fa fa-check-square-o green"></i>@else <i
                                                                class="fa fa-square-o"></i> @endif
                                                </span>
                                                <span class="padding-left-20">
                                                    {{__('messages.Show')}}:&nbsp;@if($product['is_show'])
                                                        <i class="fa fa-check-square-o green"></i>@else <i
                                                                class="fa fa-square-o"></i> @endif
                                                </span>
                                                <span class="padding-left-20">
                                                    {{__('messages.Sale_Off')}}:&nbsp;@if($product['is_sale'])
                                                        <i class="fa fa-check-square-o green"></i>@else <i
                                                                class="fa fa-square-o"></i> @endif
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{__('messages.Categories')}}:</th>
                                            <td>{{!empty($product['product_category'])?$product['product_category']['name']:'-'}}</td>
                                            <th>
                                                <div class="text-right">{{__('messages.Vendors')}}:</div>
                                            </th>
                                            <td>{{!empty($product['product_vendor'])?$product['product_vendor']['name']:'-'}}</td>
                                        </tr>
                                        <tr>
                                            <th width="10%">{{__('messages.Price')}}:</th>
                                            <td>{{$product['price']}}
                                                &nbsp;{{\App\Models\Product::$unit[$product['unit']]}}</td>
                                            <th>
                                                <div class="text-right">{{__('messages.New_Price')}}:</div>
                                            </th>
                                            <td>{{empty($product['price_sale'])?"-":$product['price_sale']}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{__('messages.Options')}}:</th>
                                            <td colspan="3" class="valign-middle">
                                                @include('AdminView.Share.optionsProduct', ['options'=>$product['options']])
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="10%">
                                                <div>{{__('messages.Short_Description')}}:</div>
                                                <div>({{__('messages.VI')}})</div>
                                            </th>
                                            <td colspan="3">{{$product['short_description']}}</td>
                                        </tr>
                                        <tr>
                                            <th width="10%">
                                                <div>{{__('messages.Short_Description')}}:</div>
                                                <div>({{__('messages.EN')}})</div>
                                            </th>
                                            <td colspan="3">{{$product['en_short_description']}}</td>
                                        </tr>
                                        <tr>
                                            <th width="10%">
                                                <div>{{__('messages.Description')}}:</div>
                                                <div>({{__('messages.VI')}})</div>
                                            </th>
                                            <td colspan="3">
                                                <textarea class="editor" disabled>
                                                    {!! $product['description'] !!}
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="10%">
                                                <div>{{__('messages.Description')}}:</div>
                                                <div>({{__('messages.EN')}})</div>
                                            </th>
                                            <td colspan="3">
                                                <textarea class="editor" disabled>
                                                    {!! $product['en_description'] !!}
                                                </textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active">
                                    <a data-toggle="tab" href="#product-comment" aria-expanded="true" class="green">
                                        <i class="fa fa-comment-o"></i>
                                        {{__('messages.List_Comment')}}
                                        <span class="badge badge-danger">{{$comments->total()}}</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a data-toggle="tab" href="#product-review" aria-expanded="false" class="blue">
                                        <i class="fa fa-sticky-note-o"></i>
                                        {{__('messages.List_Review')}}
                                        <span class="badge badge-danger">{{$reviews->total()}}</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="product-comment" class="tab-pane fade active in">
                                    @if($comments->total()>0)
                                        <p>Co comment</p>
                                    @else
                                        <p>{{__('messages.No_Comment')}}</p>
                                    @endif
                                </div>

                                <div id="product-review" class="tab-pane fade">
                                    @if($reviews->total()>0)
                                        <p>Co review</p>
                                    @else
                                        <p>{{__('messages.No_Review')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
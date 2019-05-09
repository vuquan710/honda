@extends('HondaView.AppLayouts.login')

@section('title', __('Login User'))

@section('content')

    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="box-search" style="margin: 15px 0px;">
                <form method="GET" action="{{route('admin.products.index')}}">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="search-name"
                                   class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label font-13 padding-top-10 text-center">{{__('messages.Name')}}
                                /{{__('messages.Code')}}</label>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <input type="text" id="search-name" name="search" class="form-control font-13"
                                       value="{{@$dataSearch}}"
                                      >
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
                        <th class="">Tên Đặt Hàng</th>
                        <th class="">Tên Đăng Xuất</th>
                        {{--<th class="">Mã Gốc</th>--}}
                        <th class="">Mã Mới</th>
                        {{--<th class="">Giá Gốc</th>--}}
                        <th class="">Giá Đại Lý Cấp 1</th>
                        {{--<th class="">Giá Đại Lý Cấp 2</th>--}}
                        <th class="">Đơn Giá</th>
                        {{--<th width="60px"></th>--}}
                    </tr>
                    </thead>

                    <tbody>
                    @if( !empty($listProducts))
                        @foreach($listProducts as $key => $product)
                            <tr>
                                <td>
                                    <label class="pos-rel">
                                        <input type="checkbox" class="ace">
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td>{{ ($key+1)+($listProducts->currentPage()-1)*$listProducts->perPage() }}</td>
                                <td>
                                    {{--<a href="{{ route('admin.products.show', $product->alias) }}">{{ $product->name }}--}}
                                    {{--&nbsp;</a>--}}
                                    {{ $product->name }}
                                </td>
                                <td>{{$product->name_checkout}}</td>
                                <td>{{ $product->product_code_fake }}</td>
                                <td>{{ empty($product->price_agency1)?0: $product->price_agency1}}</td>
                                <td>{{\App\Models\Product::$unit[$product->unit]}}</td>
                                {{--<td class="text-center">--}}
                                    {{--<div class="action-buttons">--}}
                                        {{--<a href="{{route('admin.products.edit', $product->alias)}}"--}}
                                           {{--class="info">--}}
                                            {{--<i class="ace-icon fa fa-pencil bigger-120"></i>--}}
                                        {{--</a>--}}
                                        {{--<a href="javascript:void(0)" class="red"--}}
                                           {{--onclick="confirmDeleteData(this)"--}}
                                           {{--data-url="{{route('admin.products.destroy', $product->alias)}}"--}}
                                           {{--title="{{__('messages.Delete')}}">--}}
                                            {{--<i class="ace-icon fa fa-trash-o bigger-120"></i>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="box-search" style="margin: 15px 0px;">
                <form method="GET" action="{{route('admin.products.index')}}">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <h3>Đ</h3>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
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
                        <th class="">Tên Đặt Hàng</th>
                        <th class="">Tên Đăng Xuất</th>
                        {{--<th class="">Mã Gốc</th>--}}
                        <th class="">Mã Mới</th>
                        {{--<th class="">Giá Gốc</th>--}}
                        <th class="">Giá Đại Lý Cấp 1</th>
                        {{--<th class="">Giá Đại Lý Cấp 2</th>--}}
                        <th class="">Đơn Giá</th>
                        {{--<th width="60px"></th>--}}
                    </tr>
                    </thead>

                    <tbody>
                    @if( !empty($listProducts))
                        @foreach($listProducts as $key => $product)
                            <tr>
                                <td>
                                    <label class="pos-rel">
                                        <input type="checkbox" class="ace">
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td>{{ ($key+1)+($listProducts->currentPage()-1)*$listProducts->perPage() }}</td>
                                <td>
                                    {{--<a href="{{ route('admin.products.show', $product->alias) }}">{{ $product->name }}--}}
                                    {{--&nbsp;</a>--}}
                                    {{ $product->name }}
                                </td>
                                <td>{{$product->name_checkout}}</td>
                                <td>{{ $product->product_code_fake }}</td>
                                <td>{{ empty($product->price_agency1)?0: $product->price_agency1}}</td>
                                <td>{{\App\Models\Product::$unit[$product->unit]}}</td>
                                {{--<td class="text-center">--}}
                                {{--<div class="action-buttons">--}}
                                {{--<a href="{{route('admin.products.edit', $product->alias)}}"--}}
                                {{--class="info">--}}
                                {{--<i class="ace-icon fa fa-pencil bigger-120"></i>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0)" class="red"--}}
                                {{--onclick="confirmDeleteData(this)"--}}
                                {{--data-url="{{route('admin.products.destroy', $product->alias)}}"--}}
                                {{--title="{{__('messages.Delete')}}">--}}
                                {{--<i class="ace-icon fa fa-trash-o bigger-120"></i>--}}
                                {{--</a>--}}
                                {{--</div>--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
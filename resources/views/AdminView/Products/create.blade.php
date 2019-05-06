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
                        {{__('messages.Add')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        @include('AdminView.Share.errorValidate')
                    </div>
                    <form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data"
                          class="form-horizontal">
                        {{csrf_field()}}
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#product-general"
                                                                          aria-controls="product-general" role="tab"
                                                                          data-toggle="tab"><i
                                                class="fa fa-cogs font-18"></i><label
                                                class="hidden-xs">&nbsp;{{__('messages.Setting')}}</label>&nbsp;{{__('messages.General')}}
                                    </a>
                                </li>
                                <li role="presentation"><a href="#product-attribute" aria-controls="profile" role="tab"
                                                           data-toggle="tab"><i
                                                class="fa fa-pencil-square-o font-18"></i><label
                                                class="hidden-xs">&nbsp;{{__('messages.Setting')}}</label>&nbsp;{{__('messages.Attributes')}}
                                    </a>
                                </li>
                                <li role="presentation"><a href="#product-image" aria-controls="product-image"
                                                           role="tab"
                                                           data-toggle="tab"><i class="fa fa-image font-18"></i><label
                                                class="hidden-xs">&nbsp;{{__('messages.Setting')}}</label>&nbsp;{{__('messages.Images')}}
                                    </a></li>
                            </ul>

                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="product-general">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="name"
                                                       class="col-sm-4 control-label">{{__('messages.Name')}}&nbsp;({{__('messages.VI')}})&nbsp;<span
                                                            class="red">(*)</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="name" required class="form-control"
                                                           id="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="product_code"
                                                       class="col-sm-2 control-label">{{__('messages.Code')}}&nbsp;<span
                                                            class="red">(*)</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="product_code" class="form-control" required
                                                           id="product_code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="en_name"
                                                       class="col-sm-4 control-label">{{__('messages.Name')}}&nbsp;({{__('messages.EN')}})&nbsp;<span
                                                            class="red">(*)</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="en_name" class="form-control" required
                                                           id="en_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price"
                                               class="col-sm-2 col-xs-2 control-label">{{__('messages.Price')}}</label>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="number" name="price" id="price" class="form-control" min="0"/>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <select name="unit" class="form-control select2" style="width: 100%">
                                                @foreach(\App\Models\Product::$unit as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity"
                                               class="col-sm-2 col-xs-2 control-label">{{__('messages.Quantity')}}</label>
                                        <div class="col-sm-2 col-xs-6">
                                            <input type="number" name="quantity" id="quantity" class="form-control"
                                                   min="0" value="1"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="p_vendor_id"
                                               class="col-sm-2 col-xs-2 control-label">{{__('messages.Vendors')}}</label>
                                        <div class="col-sm-6 col-xs-8">
                                            <select name="p_vendor_id" class="form-control select2"
                                                    style="width: 100%">
                                                <option value="">- Select -</option>
                                                @if(!empty($vendors))
                                                    @foreach($vendors as $vendor)
                                                        <option value="{{$vendor['id']}}"
                                                                @if(old('p_vendor_id') == $vendor['id']) selected @endif>{{$vendor['name']}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            <div class="row">
                                                <a href="{{route('admin.vendors.create')}}" class="btn btn-sm btn-success">{{__('messages.New')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="p_category_id"
                                               class="col-sm-2 col-xs-2 control-label">{{__('messages.Categories')}}
                                            &nbsp;<span class="red">(*)</span></label>
                                        <div class="col-sm-6 col-xs-8">
                                            <select name="p_category_id" class="form-control select2" required
                                                    style="width: 100%">
                                                <option value="">- Select -</option>
                                                @if(!empty($listOptionCategories))
                                                    @foreach($listOptionCategories as $category)
                                                        <option value="{{$category['id']}}"
                                                                @if(old('p_category_id') == $category['id']) selected @endif>{{$category['text_name']}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            <div class="row">
                                                <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-success">{{__('messages.New')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description"
                                               class="col-sm-2 control-label">{{__('messages.Short_Description')}}&nbsp;({{__('messages.VI')}})</label>
                                        <div class="col-sm-10">
                                            <textarea type="number" name="short_description" id="short_description" maxlength="255"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="en_short_description"
                                               class="col-sm-2 control-label">{{__('messages.Short_Description')}}&nbsp;({{__('messages.EN')}})</label>
                                        <div class="col-sm-10">
                                            <textarea type="number" name="en_short_description" id="en_short_description" maxlength="255"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description"
                                               class="col-sm-2 control-label">{{__('messages.Description')}}&nbsp;({{__('messages.VI')}})</label>
                                        <div class="col-sm-10">
                                            <textarea type="number" name="description" id="description"
                                                      class="form-control editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="en_description"
                                               class="col-sm-2 control-label">{{__('messages.Description')}}&nbsp;({{__('messages.EN')}})</label>
                                        <div class="col-sm-10">
                                            <textarea type="number" name="en_description" id="en_description"
                                                      class="form-control editor"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-offset-2 col-sm-2">
                                            <div class="form-group">
                                                <label class="col-sm-12">
                                                    <input name="is_show" type="checkbox" class="ace" checked value="1">
                                                    <span class="lbl">{{__('messages.Show')}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="col-sm-12">
                                                    <input name="is_new" type="checkbox" checked value="1"
                                                           class="ace">
                                                    <span class="lbl">{{__('messages.New')}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-sm-12">
                                                    <input name="is_sale" type="checkbox" class="ace" value="1"
                                                           onchange="displayTarget(this)"
                                                           target-display="#price_sale">
                                                    <span class="lbl">{{__('messages.Sale_Off')}}</span>
                                                </label>
                                                <div class="col-sm-12">
                                                    <input type="number" id="price_sale" name="price_sale" min="0"
                                                           class="form-control hidden"
                                                           placeholder="{{__('messages.New_Price')}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="product-attribute">
                                    <div class="table table-responsive">
                                        <table id="table-list-option"
                                               class="table table-bordered table-hover table-list">
                                            <thead>
                                            <tr>
                                                <th width="1%">#</th>
                                                <th width="20%">{{__('messages.Display_Name')}}</th>
                                                <th width="15%">{{__('messages.Display_Type')}}</th>
                                                <th>{{__('messages.Value')}}</th>
                                                <th width="1%">{{__('messages.Delete')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr index="0">
                                                <td>1</td>
                                                <td><input type="text" name="options[0][display_name]" value=""
                                                           class="form-control"/></td>
                                                <td>
                                                    <select class="select2" name="options[0][display_type]" max-option="{{\App\Models\ProductOption::MAX_OPTION}}"
                                                            style="width: 100%"
                                                            onchange="changeOption(this)">
                                                        <option value="">- Select -</option>
                                                        @foreach(\App\Models\ProductOption::$displayType as $key=>$value)
                                                            <option value="{{$key}}">{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="value-option"></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-xs btn-danger"
                                                            onclick="deleteThisRow(this)"><i
                                                                class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm" max-option="{{\App\Models\ProductOption::MAX_OPTION}}"
                                                id="add-more-option">{{__('messages.Add')}}</button>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="product-image">
                                    <div class="table table-responsive">
                                        <table id="table-list-image"
                                               class="table table-bordered table-hover table-list">
                                            <thead>
                                            <tr>
                                                <th width="1%">#</th>
                                                <th width="10%">{{__('messages.Show')}}</th>
                                                <th width="5%">{{__('messages.Main')}}</th>
                                                <th width="35%">{{__('messages.Choose_Image')}}</th>
                                                <th class="">{{__('messages.Description')}}</th>
                                                <th width="10%">{{__('messages.Preview')}}</th>
                                                <th width="1%">{{__('messages.Delete')}}</th>
                                            </tr>
                                            </thead>

                                            <tbody class="text-center">
                                            <tr index="0">
                                                <td>1</td>
                                                <td><label><input type="checkbox" class="ace" checked="checked"
                                                                  name="images[0][is_show]" value="1"/><span
                                                                class="lbl"></span></label></td>
                                                <td class="text-center">
                                                    <label class="">
                                                        <input name="image_main" type="radio" value="0"
                                                               class="ace">
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="text-left">
                                                        <label class="ace-file-input">
                                                            <input type="file" name="images[0][image]"
                                                                   accept="image/x-png,image/gif,image/jpeg"
                                                                   onchange="chooseImage(this)">
                                                            <span class="ace-file-container" data-title="{{__('messages.Choose')}}">
                                                            <span class="ace-file-name" data-title="{{__('messages.No_file_choose')}}..."
                                                                  data-old-title="{{__('messages.No_file_choose')}}...">
                                                                <i class=" ace-icon fa fa-upload"></i>
                                                            </span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><input class="form-control input-sm" name="images[0][description]"/>
                                                </td>
                                                <td>
                                                    <div class="img-preview"></div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-danger"
                                                            onclick="deleteThisRow(this)"><i
                                                                class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm"
                                                id="add-more-image">{{__('messages.Add')}}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="margin-top-10">
                                <button class="btn btn-success btn-sm">{{__('messages.Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

    <script>
        var displayType = '{!! addslashes(json_encode(\App\Models\ProductOption::$displayType)) !!}';
        displayType = JSON.parse(displayType);
    </script>

@endsection
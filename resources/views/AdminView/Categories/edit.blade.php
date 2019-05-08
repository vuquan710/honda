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
                        {{__('messages.Add')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        @include('AdminView.Share.errorValidate')
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST"
                              enctype="multipart/form-data"
                              action="{{route('admin.categories.update', $category['id'])}}">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name"
                                       class="col-sm-4 col-xs-12 control-label">{{__('messages.Name_Category')}}
                                    &nbsp;({{__('messages.VI')}})&nbsp;<span class="red">(*)</span></label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" id="name" name="name" autofocus class="form-control"
                                           placeholder="" required
                                           value="{{!empty(old('name'))?old('name'):@$category['name']}}">
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label for="en_name"--}}
                                       {{--class="col-sm-4 col-xs-12 control-label">{{__('messages.Name_Category')}}--}}
                                    {{--&nbsp;({{__('messages.EN')}})&nbsp;<span class="red">(*)</span></label>--}}
                                {{--<div class="col-sm-8 col-xs-12">--}}
                                    {{--<input type="text" id="en_name" name="en_name" autofocus class="form-control"--}}
                                           {{--placeholder="" required--}}
                                           {{--value="{{!empty(old('en_name'))?old('en_name'):@$category['en_name']}}">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="description"
                                       class="col-sm-4 col-xs-12 control-label">{{__('messages.Description')}}
                                    &nbsp;({{__('messages.VI')}})&nbsp;<span class="red">(*)</span></label>
                                <div class="col-sm-8 col-xs-12">
                                    <textarea name="description" class="form-control" id="description" required
                                              placeholder="">{{!empty(old('description'))?old('description'):@$category['description']}}</textarea>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label for="en_description"--}}
                                       {{--class="col-sm-4 col-xs-12 control-label">{{__('messages.Description')}}--}}
                                    {{--&nbsp;({{__('messages.EN')}})&nbsp;<span class="red">(*)</span></label>--}}
                                {{--<div class="col-sm-8 col-xs-12">--}}
                                    {{--<textarea name="en_description" class="form-control" id="en_description" required--}}
                                              {{--placeholder="">{{!empty(old('en_description'))?old('en_description'):@$category['en_description']}}</textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="col-sm-4 col-xs-12 control-label">
                                    {{__('messages.Parent')}}
                                </label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control select2" style="width: 100%" name="parent_id">
                                        <option value="">-- Select parent --</option>
                                        @foreach($listOption as $option)
                                            <option value="{{$option['id']}}"
                                                    @if(!empty(old('parent_id')) &&(old('parent_id') == $option['id']))
                                                    selected
                                                    @else
                                                    @if($category['parent_id'] == $option['id']) selected @endif
                                                    @endif
                                                    @if($option['disable_status'])disabled="disabled" @endif
                                                    @if($option['id'] == $category['id']) disabled="disabled"@endif>{{$option['text_name']}}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label class="col-sm-4 col-xs-12 control-label">--}}
                                    {{--{{__('messages.ImageBanner')}}--}}
                                {{--</label>--}}
                                {{--<div class="col-sm-8 col-xs-12">--}}
                                    {{--<div class="text-left">--}}
                                        {{--<label class="ace-file-input">--}}
                                            {{--<input type="hidden" class="old-image"--}}
                                                   {{--data-url="{{asset($category['url_banner'])}}"--}}
                                                   {{--name="old_image"--}}
                                                   {{--value="{{str_replace($dirImage,'',$category['url_banner'])}}"/>--}}
                                            {{--<input type="file" name="url_banner"--}}
                                                   {{--accept="image/x-png,image/gif,image/jpeg"--}}
                                                   {{--onchange="chooseImage(this)">--}}
                                            {{--<span class="ace-file-container"--}}
                                                  {{--data-title="{{__('messages.Choose')}}">--}}
                                                            {{--<span class="ace-file-name"--}}
                                                                  {{--data-title="{{str_replace($dirImage,'',$category['url_banner'])}}"--}}
                                                                  {{--data-old-title="{{str_replace($dirImage,'',$category['url_banner'])}}">--}}
                                                                {{--<i class=" ace-icon fa fa-upload"></i>--}}
                                                            {{--</span>--}}
                                                        {{--</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-xs-12 col-sm-8">
                                    <button type="submit"
                                            class="btn btn-success btn-sm">{{__('messages.Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
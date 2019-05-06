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
                        {{__('messages.Edit')}}
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
                              action="{{route('admin.news_categories.update', $newscategory['id'])}}"
                              enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Name_NewsCategory')}}
                                    &nbsp;<span
                                            class="red">(*)</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="name" autofocus class="form-control" placeholder=""
                                           required
                                           value="{{!empty(old('name'))?old('name'):@$newscategory['name']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="meta_title"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Meta_Title')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <input name="meta_title" class="form-control" id="meta_title"
                                           placeholder=""
                                           value=" {{!empty(old('meta_title'))?old('meta_title'):@$newscategory['meta_title']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Meta_Keywords')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="meta_keywords" class="form-control" id="meta_keywords"
                                              placeholder="">{{!empty(old('meta_keywords'))?old('meta_keywords'):@$newscategory['meta_keywords']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="meta_description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Meta_Description')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="meta_description" class="form-control" id="meta_description"
                                              placeholder="">{{!empty(old('meta_description'))?old('meta_description'):@$newscategory['meta_description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Description')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="description" class="form-control" id="description"
                                              placeholder="">{{!empty(old('description'))?old('description'):@$newscategory['description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_name"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Name_NewsCategory_en')}}
                                    &nbsp;<span
                                            class="red">(*)</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="en_name" autofocus class="form-control" placeholder=""
                                           id="en_name"
                                           required
                                           value="{{!empty(old('en_name'))?old('en_name'):@$newscategory['en_name']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_meta_title"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.en_meta_title')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <input name="en_meta_title" class="form-control" id="en_meta_title"
                                           placeholder=""
                                           value=" {{!empty(old('en_meta_title'))?old('en_meta_title'):@$newscategory['en_meta_title']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_meta_keywords"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.en_meta_keywords')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="en_meta_keywords" class="form-control" id="en_meta_keywords"
                                              placeholder="">{{!empty(old('en_meta_keywords'))?old('en_meta_keywords'):@$newscategory['en_meta_keywords']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_meta_description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.en_meta_description')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="en_meta_description" class="form-control" id="en_meta_description"
                                              placeholder="">{{!empty(old('en_meta_description'))?old('en_meta_description'):@$newscategory['en_meta_description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Description_en')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="en_description" class="form-control" id="en_description"
                                              placeholder="">{{!empty(old('en_description'))?old('en_description'):@$newscategory['en_description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="background_image"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Background_Image')}}
                                    &nbsp;</label>
                                <div class="col-sm-10 col-xs-12">
                                    <div class="text-left">
                                        <label class="ace-file-input">
                                            <input type="hidden" name="old_background_image"
                                                   value="{{$newscategory['background_image']}}">
                                            <input type="file" name="background_image"
                                                   accept="image/x-png,image/gif,image/jpeg"
                                                   onchange="chooseImageUpload(this)">
                                            <span class="ace-file-container" data-title="{{__('messages.Choose')}}">
                                                <span class="ace-file-name"
                                                      data-title="{{__('messages.No_file_choose')}}..."
                                                      data-old-title="{{__('messages.No_file_choose')}}...">
                                                    <i class=" ace-icon fa fa-upload"></i>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-offset-2 col-xs-12 col-sm-10">
                                    <input name="is_show" type="checkbox" class="ace" value="1"
                                           @if($newscategory['is_show']) checked="checked" @endif >
                                    <span class="lbl">&nbsp;{{__('messages.Show')}}</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-offset-2 col-xs-12 col-sm-10">
                                    <input name="is_show_on_menu" type="checkbox" class="ace" value="1"
                                           @if($newscategory['is_show_on_menu']) checked="checked" @endif>
                                    <span class="lbl">&nbsp;{{__('messages.Show_On_Menu')}}</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-xs-12 col-sm-10">
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
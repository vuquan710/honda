@extends('AdminView.AppLayouts.default')

@section('title', __('messages.News'))

@section('sidebar')
@endsection

@section('script')
    <script>
        function chooseImage(element) {
            var name = $(element).val().split(/(\\|\/)/g).pop();
            var title = $(element).closest('label').find('span.ace-file-name:first').attr('data-old-title');
            if (name == '') {
                name = title;
                if ($(element).closest('label').find('input.old-image').length > 0) {
                    var oldImage = $(element).closest('label').find('input.old-image:first').attr('data-url');
                    $(element).closest('tr').find('td div.img-preview').html('<img class="img img-responsive img-thumbnail" src="' + oldImage + '">');
                } else {
                    $(element).closest('tr').find('td div.img-preview').html('');
                }
            }
            $(element).closest('.ace-file-input').find('span.ace-file-name').attr('data-title', name);
        }
    </script>
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.News')])
            <div class="page-header">
                <h1>
                    <a href="{{route('admin.news.index')}}">{{__('messages.News')}}</a>
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
                              action="{{route('admin.news.update', $news['id'])}}" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Title')}}&nbsp;<span
                                            class="red">(*)</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="title" autofocus class="form-control" placeholder=""
                                           required
                                           value="{{!empty(old('title'))?old('title'):@$news['title']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="short_description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Meta_Title')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="meta_title" class="form-control" id="meta_title"
                                           placeholder=""
                                           value="{{!empty(old('meta_title'))?old('meta_title'):@$news['meta_title']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="small_image"
                                       class="col-sm-2 control-label">{{__('messages.Small_Image')}}</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="old_small_image" id="old_small_image"
                                           class="form-control" value="{{$news['small_image']}}">
                                    {{--<input type="file" name="small_image" id="small_image" class="form-control">--}}
                                    <label class="ace-file-input">
                                        <input type="file" name="small_image"
                                               accept="image/x-png,image/gif,image/jpeg"
                                               onchange="chooseImage(this)">
                                        <span class="ace-file-container" data-title="{{__('messages.Choose')}}">
                                                            <span class="ace-file-name"
                                                                  data-title="{{str_replace($dirThumb,'',$news['small_image'])}}"
                                                                  data-old-title="{{str_replace($dirThumb,'',$news['small_image'])}}">
                                                                <i class=" ace-icon fa fa-upload"></i>
                                                            </span>
                                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="news_category_id"
                                       class="col-sm-2 col-xs-2 control-label">{{__('messages.NewsCategories')}}</label>
                                <div class="col-sm-6 col-xs-8">
                                    <select name="news_category_id" class="form-control select2" style="width: 100%">
                                        @foreach($listNewsCategories as $newscategory)
                                            @if($newscategory['id'] == $news['news_category_id'])
                                                <option value="{{$newscategory['id']}}">{{$newscategory['name']}}</option>
                                            @endif
                                        @endforeach
                                        @if(!empty($listNewsCategories))
                                            @foreach($listNewsCategories as $newscategory)
                                                <option value="{{$newscategory['id']}}"
                                                        @if(old('news_category_id') == $newscategory['id']) selected @endif>{{$newscategory['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="short_description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Short_Description')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="short_description" class="form-control" id="short_description"
                                              placeholder="">{{!empty(old('short_description'))?old('short_description'):@$news['short_description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Content')}} &nbsp;<span
                                            class="red">(*)</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea type="text" name="content" required="" class="editor"
                                              class="form-control">{{!empty(old('content'))?old('content'):@$news['content']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="meta_description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Meta_Description')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="meta_description" class="form-control" id="meta_description"
                                              placeholder="">{{!empty(old('meta_description'))?old('meta_description'):@$news['meta_description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Meta_Keywords')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="meta_keywords" class="form-control" id="meta_keywords"
                                              placeholder="">{{!empty(old('meta_keywords'))?old('meta_keywords'):@$news['meta_keywords']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_title"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.en_title')}}&nbsp;<span
                                            class="red">(*)</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="en_title" autofocus class="form-control" placeholder=""
                                           required
                                           value="{{!empty(old('en_title'))?old('en_title'):@$news['en_title']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_meta_title"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.en_meta_title')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <input type="text" name="en_meta_title" class="form-control" id="en_meta_title"
                                           placeholder=""
                                           value="{{!empty(old('en_meta_title'))?old('en_meta_title'):@$news['en_meta_title']}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_short_description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.Short_Description_en')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="en_short_description" class="form-control" id="en_short_description"
                                              placeholder="">{{!empty(old('en_short_description'))?old('en_short_description'):@$news['en_short_description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_content"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.en_content')}}
                                    &nbsp;<span class="red">(*)</span></label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea type="text" name="en_content" required="" class="editor"
                                              class="form-control">{{!empty(old('en_content'))?old('en_content'):@$news['en_content']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_meta_description"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.en_meta_description')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="en_meta_description" class="form-control" id="en_meta_description"
                                              placeholder="">{{!empty(old('en_meta_description'))?old('en_meta_description'):@$news['en_meta_description']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="en_meta_keywords"
                                       class="col-sm-2 col-xs-12 control-label">{{__('messages.en_meta_keywords')}}</label>
                                <div class="col-sm-10 col-xs-12">
                                    <textarea name="en_meta_keywords" class="form-control" id="en_meta_keywords"
                                              placeholder="">{{!empty(old('en_meta_keywords'))?old('en_meta_keywords'):@$news['en_meta_keywords']}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-offset-2 col-sm-2">
                                    <div class="form-group">
                                        <label class="col-sm-12">
                                            <input name="is_show" type="checkbox" class="ace" value="1"
                                                   @if($news['is_show']) checked="checked" @endif>
                                            <span class="lbl">{{__('messages.Show')}}</span>
                                        </label>
                                    </div>
                                </div>
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
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
                        {{__('messages.Add')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        @include('AdminView.Share.errorValidate')
                    </div>
                    <form method="POST" action="{{route('admin.news.store')}}" enctype="multipart/form-data"
                          class="form-horizontal">
                        {{csrf_field()}}
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- Nav tabs -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="product-general">
                                    <div class="form-group">
                                        <label for="title"
                                               class="col-sm-2 control-label">{{__('messages.Title')}}&nbsp;<span
                                                    class="red">(*)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" required class="form-control"
                                                   id="title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title"
                                               class="col-sm-2 control-label">{{__('messages.Meta_Title')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="meta_title" id="meta_title"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="small_image"
                                               class="col-sm-2 control-label">{{__('messages.Small_Image')}}</label>
                                        <div class="col-sm-10">
                                            <label class="ace-file-input">
                                                <input type="file" name="small_image"
                                                       accept="image/x-png,image/gif,image/jpeg"
                                                       onchange="chooseImage(this)">
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
                                    <div class="form-group">
                                        <label for="news_category_id"
                                               class="col-sm-2 col-xs-2 control-label">{{__('messages.NewsCategories')}}
                                            &nbsp;<span
                                                    class="red">(*)</span></label>
                                        <div class="col-sm-6 col-xs-8">
                                            <select name="news_category_id" required class="form-control select2"
                                                    style="width: 100%">
                                                <option value="">- Select -</option>
                                                @if(!empty($listNewsCategories))
                                                    @foreach($listNewsCategories as $newscategory)
                                                        <option value="{{$newscategory['id']}}"
                                                                @if(old('news_category_id') == $newscategory['id']) selected @endif>{{$newscategory['name']}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            <div class="row">
                                                <a href="{{route('admin.news_categories.create')}}"
                                                   class="btn btn-sm btn-success">{{__('messages.New')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description"
                                               class="col-sm-2 control-label">{{__('messages.Short_Description')}}</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="short_description" id="short_description"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content"
                                               class="col-sm-2 control-label">{{__('messages.Content')}} &nbsp;<span
                                                    class="red">(*)</span></label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="content" required="" class="editor"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description"
                                               class="col-sm-2 control-label">{{__('messages.Meta_Description')}}</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="meta_description" id="meta_description"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords"
                                               class="col-sm-2 control-label">{{__('messages.Meta_Keywords')}}</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="meta_keywords" id="meta_keywords"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="en_title"
                                               class="col-sm-2 control-label">{{__('messages.en_title')}}&nbsp;<span
                                                    class="red">(*)</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="en_title" required class="form-control"
                                                   id="title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="en_meta_title"
                                               class="col-sm-2 control-label">{{__('messages.en_meta_title')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="en_meta_title" id="en_meta_title"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="en_short_description"
                                               class="col-sm-2 control-label">{{__('messages.Short_Description_en')}}</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="en_short_description" id="en_short_description"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="en_content"
                                               class="col-sm-2 control-label">{{__('messages.en_content')}} &nbsp;<span
                                                    class="red">(*)</span></label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="en_content" required="" class="editor"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="en_meta_description"
                                               class="col-sm-2 control-label">{{__('messages.en_meta_description')}}</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="en_meta_description" id="en_meta_description"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="en_meta_keywords"
                                               class="col-sm-2 control-label">{{__('messages.en_meta_keywords')}}</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="en_meta_keywords" id="en_meta_keywords"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-offset-2 col-sm-2">
                                            <div class="form-group">
                                                <label class="col-sm-12">
                                                    <input name="is_show" type="checkbox" class="ace" value="1">
                                                    <span class="lbl">{{__('messages.Show')}}</span>
                                                </label>
                                            </div>
                                        </div>
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
@endsection
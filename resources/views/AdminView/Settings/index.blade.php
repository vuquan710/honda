@extends('AdminView.AppLayouts.default')

@section('title', __('messages.Setting'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Setting')])
            <div class="page-header">
                <h1>
                    {{__('messages.Setting')}}
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.All')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        @include('AdminView.Share.errorValidate')
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        @include('AdminView.Share.successMessage')
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST"
                              action="{{route('admin.settings.update', $setting['id'])}}">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3"
                                       class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">{{__('messages.Select_Default_Language')}}</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control select2" style="width: 100%" name="setting[language]">
                                        @foreach(\App\Models\Setting::$language as $key=>$lang)
                                            <option value="{{$key}}"
                                                    @if($setting['language'] == $key)selected="selected"@endif>{{$lang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="checkbox">
                                        <label class="padding-left-10">
                                            <input type="checkbox" class="ace" name="setting[using_for_admin]" value="1"
                                                   @if($setting['using_for_admin']) checked="checked" @endif>
                                            <span class="lbl">&nbsp;{{__('messages.Using_too_for_admin_system')}}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <button type="submit" class="btn btn-success btn-sm">{{__('messages.Save')}}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
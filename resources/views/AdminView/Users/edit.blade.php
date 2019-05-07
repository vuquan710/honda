@extends('AdminView.AppLayouts.default')

@section('title', __('Dashboard'))

@section('sidebar')
@endsection

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            @include('AdminView.Share.breadcrumbs', ['breadcrumbs'=>__('messages.Users')])
            <div class="page-header">
                <h1>
                    {{__('messages.Users')}}
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        {{__('messages.Edit')}}
                    </small>
                </h1>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        @include('AdminView.Share.errorValidate')
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <form class="form-horizontal" method="POST" action="{{route('admin.users.update',$user->alias)}}">
                            {{csrf_field()}}
							 {{ method_field('PUT') }}
							<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"> {{__('messages.Email')}}</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="{{__('messages.Email')}}"  value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"> {{__('messages.Phone_number')}}<i class="require-character">*</i></label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone_number" value="{{@$user->phone_number}}" class="form-control" placeholder="{{__('messages.Phone_number')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">{{__('messages.City')}}</label>
                                <div class="col-sm-10">
                                    <select name="city">
                                        @foreach($listCities as $city)
                                            <option {{$city->vehicle_id == $user->city ? 'selected' : ''}} value="{{$city->vehicle_id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm">{{__('messages.Save')}} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.page-content -->

        </div>
    </div><!-- /.main-content -->

@endsection
@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
@endsection
@section('js')
@endsection
@section('content')

    <style>
        .bold-red {
            font-weight: bold;
            color: red;
        }

        .bold-green {
            font-weight: bold;
            color: green;
        }

        .margin-top-20 {
            margin-top: 20px;
        }
    </style>
    <div class="row">
        <div class="col-md-12 col-sm-12">
@if(\App::getLocale()==\App\Models\Setting::LANG_EN)
            {!! @$news1->en_content !!}
		@else
			 {!! @$news1->content !!}
			@endif
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="col-md-12 col-lg-12 col-sm-12">
                @include('AdminView.Share.errorValidate')
            </div>
            <div class="form-area">
                <form role="form" method="POST" action="{{route('user.contacts.send')}}">
                    <br style="clear:both">
                    {{csrf_field()}}
                    @if(\App::getLocale()==\App\Models\Setting::LANG_EN)
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mobile" placeholder="Phone number">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="textarea" name="info" placeholder="Content"
                                      maxlength="140" rows="7"></textarea>

                        </div>

                        <button type="submit" name="submit" class="btn btn-primary pull-left">Send</button>
                        <br/>
                    @else
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Họ Tên">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="mobile" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="textarea" name="info" placeholder="Nội dung"
                                      maxlength="140" rows="7"></textarea>

                        </div>

                        <button type="submit" name="submit" class="btn btn-primary pull-left">Gửi</button>
                        <br/>
                    @endif

                </form>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 margin-top-30">
           
                @if(\App::getLocale()==\App\Models\Setting::LANG_EN)
            {!! @$news2->en_content !!}
		@else
			 {!! @$news2->content !!}
			@endif
          


        </div>
    </div>
@endsection
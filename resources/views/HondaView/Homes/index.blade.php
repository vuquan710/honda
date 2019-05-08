@extends('HondaView.AppLayouts.login')

@section('title', __('Login User'))

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="name"
                       class="col-sm-4 control-label">Tên Đăng Xuất&nbsp;<span
                            class="red">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" name="name_checkout" required class="form-control"
                           id="name_checkout">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="product_code_fake"
                       class="col-sm-2 control-label">Mã Mới<span
                            class="red">(*)</span></label>
                <div class="col-sm-10">
                    <input readonly type="text" name="product_code_fake" class="form-control" required
                           id="product_code_fake">
                </div>
            </div>
        </div>
    </div>
@endsection
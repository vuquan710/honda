@extends('UserView.AppLayouts.home')

@section('title', __('Home'))
@section('css')
@endsection
@section('js')
@endsection
@section('content')
   
	<style>
        .carousel-content {
            color: black;
            display: flex;
            align-items: center;
        }

        #text-carousel {
            width: 100%;
            height: auto;
           
        }
        .carousel-control.left, .carousel-control.right{background:none;display:none;}

    </style>
    <div class="row margin-top-50">
                <div class="col-md-3 col-sm-12 animated fadeInLeft">
                    <div class="intro">
                        <p class="text-center"><b>Công nghệ may</b></p>
                        <p class="text-center"><b>Đánh bông móc xích</b><br /> đẳng cấp đến từ sự tinh tế tỉ mỉ kết hợp với sợi chống giãn giúp form áo mãi đẹp theo thời gian</p>
                    </div>
                    <div class="intro">
                        <p class="text-center"><b>Vải chánh phẩm</b></p>
                        <p class="text-center">với các vật liệu vải thấm hút một chiều, co giãn 4 chiều đã xử lý lông trên bề mặt vải tạo sự em ái nhẹ nhàng và thoải mái trong mọi hoạt động</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="{!! asset('img/base/dream-adl.png') !!}" class="img-responsive margin-top-30 dream-shirt" style="margin: 0 auto;" />
                </div>
                <div class="col-md-3 col-sm-12 animated fadeInRight">
                    <div class="intro">
                        <p class="text-center"><b>FixBody</b></p>
                        <p class="text-center">mang lại sự thoải mái tối đa cho người sử dụng khi những đường may luôn bo đều theo từng đường nét của cơ thể </p>
                    </div>
                    <div class="intro">
                        <p class="text-center"><b>Công nghệ in</b></p>
                        <p class="text-center">với những công nghệ hàng đầu về in trên vật liệu vải, chúng tôi luôn tự hào là đơn vị tiên phong ứng dụng công nghệ và tạo ra sắc màu sống động trên từng sản phẩm</p>
                    </div>
                </div>
            </div>
             <div class="row animated fadeInUp">
                <div id="text-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="row">
                        <div class="col-xs-offset-3 col-xs-6">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="carousel-content">
                                        <div>
                                            <p class="text-center">"Họ luôn nỗ lực tạo ra những điều thật sự tuyệt vời cho chúng tôi"</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carousel-content">
                                        <div>
                                            <p class="text-center">"Họ luôn nỗ lực tạo ra những điều thật sự tuyệt vời cho chúng tôi"</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carousel-content">
                                        <div>
                                            <p class="text-center">"Họ luôn nỗ lực tạo ra những điều thật sự tuyệt vời cho chúng tôi"</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Controls --> <a class="left carousel-control" href="#text-carousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#text-carousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>

                </div>
                </div>
@endsection
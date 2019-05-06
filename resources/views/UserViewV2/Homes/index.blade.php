@extends('UserViewV2.Layout.default')
@section('css')

@endsection

@section('script')

@endsection

@section('content')

    <div class="container-fluid" style="margin-top:10px;">

        <div class="col-xs-12 col-sm-12 col-md-4 option">
            <img align="left" src="{!! asset('img/base/adl freeship.png') !!}" class="img-responsive footer-img"/><font class="text-center text-footer" id="deliverys-msg"><b class="tree-option">Miễn phí</b> giao hàng cho các đơn hàng có
                hóa đơn trên 1 triệu đồng</font>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 option">
            <img align="left" src="{!! asset('img/base/VANCHUYEN.png') !!}" class="img-responsive footer-img"/>
            <font class="text-center text-footer" id="ProductReturnMsg"><b class="tree-option">7 ngày đổi trả</b> sản phẩm nội
                thành<br/><b class="tree-option">10 ngày đổi trả</b> sản phẩm ngoại thành</font>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 option">
            <img align="left" src="{!! asset('img/base/Tu van online.png') !!}" class="img-responsive footer-img"/>
            <font class="text-center tree-option"><b>Hotline kinh doanh</b></font><br>
            <font class="text-center text-footer" id="address-footer">0169.735.8789 - 0898.514.408</font>
        </div>
    </div>
    <div class="container introduce">
        <div class="col-md-4 animated fadeInLeft">
            <div>
                <h3 class="text-center">Công nghệ may</h3>
                <h4 class="text-center">Đánh bông móc xích</h4>
                <p class="text-center">
                    Đẳng cấp đến từ sự tinh tế tỉ mỉ kết hợp với sợi chống giãn giúp form áo mãi đẹp theo thời gian
                </p>
            </div>
            <div>
                <h3 class="text-center">Vải chánh phẩm</h3>
                <p class="text-center">Với các vật liệu vải thấm hút một chiều, co giãn 4 chiều đã xử lý lông trên bề mặt vải tạo sự em ái
                    nhẹ nhàng và thoải mái trong mọi hoạt động</p>
            </div>
        </div>
        <div class="col-md-4 animated">
            <div class="text-center">
                <img src="{{asset('img/base/dream-adl.png')}}" width="100%"/>
            </div>
        </div>
        <div class="col-md-4 animated fadeInRight">
            <div>
                <h3 class="text-center">FixBody</h3>

                <p class="text-center">Mang lại sự thoải mái tối đa cho người sử dụng khi những đường may luôn bo đều theo từng đường nét
                    của cơ
                    thể</p>
            </div>
            <div>
                <h3 class="text-center">Công nghệ in</h3>

                <p class="text-center">Với những công nghệ hàng đầu về in trên vật liệu vải, chúng tôi luôn tự hào là đơn vị tiên phong ứng
                    dụng công nghệ và tạo ra sắc màu sống động trên từng sản phẩm</p>
            </div>
        </div>
    </div>

    



    


@endsection
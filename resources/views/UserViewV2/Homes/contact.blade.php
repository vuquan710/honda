@extends('UserViewV2.Layout.default')

@section('css')

@endsection

@section('script')
@endsection


@section('content')



    <div class="container-fluid">
        <div class="col-md-12">
            <h2>CÔNG TY TNHH SẢN XUẤT VÀ THƯƠNG MẠI ÁO ĐỘNG LỰC</h2>
            <p>
                MST:0314774678<br/>
                Số ĐT:0169.735.8789<br/>
                Email:aodongluc@gmail.com<br/>
                Website: www.aodongluc.vn-www.aovnxk.vn<br/>
                Địa chỉ: 05 Nguyễn Văn Săng, Phường Tân Sơn Nhì, Quận Tân Phú, Thành phố Hồ Chí Minh<br/>
                Áo động lực xin chân thành cảm ơn quý khách hàng dành thời gian tìm hiểu các sản phẩm trên trang web của
                chúng tôi.</br/>
                Nếu quý khách cần thêm thông tin khác xin quý khách vui lòng liên hệ với chúng tôi qua địa chỉ ở trên,
                hoặc có thể điền thông tin vào mẫu đơn "Phản hồi thông tin " của chúng tôi. Chân thành cảm ơn.</br/>
            </p>
        </div>
        <div class="col-md-6">
            <div id="map"></div>
        </div>
        <div class="col-md-6 comments-area">
            <form role="form" method="POST" action="{{route('user.v2.homes.saveContact')}}" class="form-contact">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">{{__('messages.Full_name')}}</label><span>*</span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label><span>*</span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">{{__('messages.Phone_number')}}</label><span>*</span>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="subject">{{__('messages.Content')}}</label><span>*</span>
                    <textarea name="subject" id="subject" class="form-control" autocomplete="off" required></textarea>
                </div>
                <button type="submit" class="btn">Gửi</button>
            </form>
        </div>
    </div>
	<div class="container-fluid" style="margin-top:10px;" id="fbPage">

 
 </div>
    <script>
        function myMap() {
            var mapOptions = {
                center: new google.maps.LatLng(51.5, -0.12),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.HYBRID
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeVbqGZHhLAeGPxW2y3m37XxbQ6_We6uI&callback=myMap"></script>
@endsection
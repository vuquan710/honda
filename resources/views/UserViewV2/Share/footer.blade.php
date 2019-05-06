
<footer id="footer" class="animated fadeInUp">
    <div class="container">
        <div class="">

            <div class="col-md-3 col-sm-6">

                <h4>Thông tin cần thiết</h4>


                <ul>
                    <li><a href="#">Hướng dẫn mua hàng</a>
                    </li>
                    <li><a href="#">Quy định đổi trả</a>
                    </li>
                    <li><a href="#">Hướng dẫn thanh toán</a>
                    </li>
                </ul>


            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Địa chỉ văn phòng</h4>

                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 05 Nguyễn Văn Săng, Phường Tân Sơn Nhì, Quận Tân
                    Phú, Thành phố Hồ Chí Minh
                </p>

                <a href="{{route('user.v2.homes.contact')}}">Liên hệ</a>


            </div>
            <!-- /.col-md-3 -->


            <div class="col-md-3 col-sm-6">

                <h4>Theo dõi chúng tôi</h4>
                <p class="social">
                    <a href="https://www.facebook.com/aodongluc.vn" class="facebook external"><i
                                class="fa fa-facebook"></i></a>
                    <a href="https://www.youtube.com/channel/UCUtNKnfl0d5KzY-crJQwjjg" class="twitter external"><i
                                class="fa fa-youtube"></i></a>
                    <a href="#" class="twitter external"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="instagram external"><i
                                class="fa fa-instagram"></i></a>
                    <a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a>

                </p>


            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6">
                <form style="font-size:11px; float: right; margin-right: 0px;     margin-top: 10px;" method="POST" action="{{route('user.v2.homes.search')}}">
                {{csrf_field()}}
                        <input type="text" name="keyword" class="search" placeholder="{{__('messages.Search')}}..."/>
                        <button  type="button" class="" onclick="searchProduct();"><i class="fa fa-search"></i>
                        </button>
                        <input type="submit" style="display:none;" id="search-exec"/>
                </form>   
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</footer>
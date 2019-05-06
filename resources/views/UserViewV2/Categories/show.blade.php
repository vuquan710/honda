@extends('UserViewV2.Layout.default')

@section('css')

@endsection

@section('script')

@endsection

@section('content')

    <div id="content">
        <div class="container-fluid">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="{{route('user.v2.homes.index')}}">Trang chủ</a></li>
                    <li>{{$category['name']}}</li>
                </ul>

                <div class="">
                    <h1>{{$category['name']}}</h1>
                    <p>{{$category['description']}}</p>
                </div>

                @include('UserViewV2.Share.paginate_top', ['paginator'=>$listProducts, 'sort'=>$sort])

                @include('UserViewV2.Share.list_products',['listProducts'=>$listProducts ])

                @include('UserViewV2.Share.paginate', ['paginator'=>$listProducts])

            </div>
        </div>
    </div>

@endsection
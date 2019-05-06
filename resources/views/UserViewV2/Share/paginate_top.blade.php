<div class=" info-bar">
    <div class="row">
        <div class="col-sm-12 col-md-8 products-number-sort">
            <div class="row">
                <form class="">
                    <div class="col-md-6 col-sm-6 hidden-xs">
                        <div class="products-number">
                            <strong>Hiển thị</strong>
                            <a href="{{$paginator->url(1).'&limit=8'}}"
                               class="btn btn-default btn-sm @if($paginator->perPage() == 8) btn-primary @endif">8</a>
                            <a href="{{$paginator->url(1).'&limit=12'}}"
                               class="btn btn-default btn-sm @if($paginator->perPage() == 12) btn-primary @endif">12</a>
                            <a href="{{$paginator->url(1).'&limit=24'}}"
                               class="btn btn-default btn-sm @if($paginator->perPage() == 24) btn-primary @endif">24</a>
                            sản phẩm
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="products-sort-by form-inline">
                            <strong>Sắp xếp theo</strong>
                            <select name="sort-by" class="form-control change-sort">
                                <option value="{{$paginator->url(1).'&limit='.$paginator->perPage().'&sort=newest'}}" @if($sort == 'newest') selected @endif>
                                   Mới nhất
                                </option>
                                <option value="{{$paginator->url(1).'&limit='.$paginator->perPage().'&sort=price'}}" @if($sort == 'price') selected @endif>
                                    Giá
                                </option>
                                <option value="{{$paginator->url(1).'&limit='.$paginator->perPage().'&sort=name'}}" @if($sort == 'name') selected @endif>
                                    Tên
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
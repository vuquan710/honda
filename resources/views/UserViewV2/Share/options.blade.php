@foreach($options as $option)
    <?php $valueOption = json_decode($option['value'], true); ?>
    <div class="title-option">{{$option['display_name']}}</div>
    @if($option['display_type'] == \App\Models\ProductOption::DISPLAY_TYPE_CHECK_BOX)
        <div class="">
            @foreach($valueOption as $value)
                <div><img src="{{asset('img/base/checked.svg')}}" width="30px"/>&nbsp;{{$value['label']}}</div>
            @endforeach
        </div>
    @endif
    @if($option['display_type'] == \App\Models\ProductOption::DISPLAY_TYPE_SELECT_BOX)
        <select>
            @foreach($valueOption as $value)

                <option value="{{$value['val']}}">{{$value['label']}}</option>
            @endforeach
        </select>
    @endif
    @if($option['display_type'] == \App\Models\ProductOption::DISPLAY_TYPE_RADIO_BOX)
        <div class="">
            @foreach($valueOption as $value)
                <div><img src="{{asset('img/base/radio-on.svg')}}" width="30px"/>&nbsp;{{$value['label']}}</div>
            @endforeach
        </div>
    @endif

    @if($option['display_type'] == \App\Models\ProductOption::DISPLAY_TYPE_COLOR_BOX)
        <select>
            @foreach($valueOption as $value)

                <option value="{{$value['val']}}"
                        style="background-color:{{$value['val']}};">{{$value['label']}}</option>
            @endforeach
        </select>
    @endif


@endforeach
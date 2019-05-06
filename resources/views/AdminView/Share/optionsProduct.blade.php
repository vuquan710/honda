@if(!empty($options))
    <table>
        @foreach($options as $option)
            <tr>
                <th class="align-middle">
                    <?php
                    $select = json_decode($option['value'], true);
                    ?>
                    {{$option['display_name']}}:&nbsp;
                </th>
                <td>
                    <div class="">
                        @if($option['display_type'] == \App\Models\ProductOption::DISPLAY_TYPE_CHECK_BOX)
                            @foreach($select as $opt)
                                <label class="padding-top-5 padding-right-20">
                                    <input name="form-field-radio" type="checkbox" class="ace"
                                           name="{{strtolower(str_replace(' ', '_', $option['display_name']))}}"
                                           value="{{@$opt['val']}}">
                                    <span class="lbl">{{@$opt['label']}}</span>
                                </label>
                            @endforeach
                        @endif
                        @if($option['display_type'] == \App\Models\ProductOption::DISPLAY_TYPE_RADIO_BOX)
                            @foreach($select as $opt)
                                <label class="padding-top-5 padding-right-20">
                                    <input name="form-field-radio" type="radio" class="ace"
                                           name="{{strtolower(str_replace(' ', '_', $option['display_name']))}}"
                                           value="{{@$opt['val']}}">
                                    <span class="lbl">{{@$opt['label']}}</span>
                                </label>
                            @endforeach
                        @endif
                        @if($option['display_type'] == \App\Models\ProductOption::DISPLAY_TYPE_SELECT_BOX)
                            <select class="form-control select2" style="width: 100%">
                                @foreach($select as $opt)
                                    <option value="{{@$opt['val']}}">{{@$opt['label']}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </td>
            </tr>
        @endforeach
    </table>
@else
    -
@endif
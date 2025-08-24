<li class="inventory row_style">
    <div class="title">
        <div class="subtitle">
            @if ($batch || $search)
                <div>
                    <div class="radioSmall inventory sortStatusSet" style="padding: 0px !important;">
                        <div style="display:flex; align-items: center; padding: 8px">
                            <div class="ios_switch radio_btn_switch">
                                <input name="{{ 'batch_' . $name }}" type="text" value="">
                                <div class="box">
                                    <span class="ball"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div>{{ $title }}</div>
        </div>
    </div>
    <div class="inner">
        <input class="normal_input" data-autosetup="" name="{{ $disabled ? '' : $name }}" type="hidden" value="{{$value}}" {{ $disabled ? 'disabled' : '' }} autocomplete="off">
            <div class="select2MultiNew">
                @foreach($selectValues as $val)
                <span data-id="{{ $val['key'] }}" draggable="true"><a class="fa fa-remove"></a>{{ $val['title'] }}</span>
                @endforeach
            </div>
            <div class="select2MultiNew_search" data-options_model="{{$set['options_model'] ?? ''}}" data-main_model="{{$set['main_model'] ?? ''}}" data-max="{{$set['options_max']??'100'}}" data-foreign_key="{{$set['foreign_key'] ?? ''}}" data-two_level="{{$set['two_level'] ?? false}}">
                <p class="select2MultiNew_all">全選</p>
                <p class="select2MultiNew_unall">清除全選</p>
                @if(isset($set['options_model']) && !empty($set['options_model']) && isset($set['ajax']) && $set['ajax'])
                <div>
                    <span class="icon-search"></span>
                    <input name="search_keyword" type="text" autocomplete="off" placeholder="SEARCH 請輸入關鍵字搜尋">
                    <a>Search</a>
                </div>
                @endif
            </div>
            <div class="select2MultiNewtip {{ (isset($set['options_max']) && $set['options_max'] == count($options) && $set['options_max'] > 0) ? 'active':'' }}">下列選項只會顯示最新{{$set['options_max']}}筆,若不在列表內請使用搜尋功能</div>
            <div class="select2MultiNew_option">
                <div class="select2MultiNew_option_item_search hide">

                </div>
                @if(!isset($set['two_level']) || (isset($set['two_level']) && !$set['two_level']))
                    <div class="select2MultiNew_option_item">
                        @foreach($options as $val)
                            <span data-id="{{$val['key']}}" class="{{ (in_array($val['key'],$value_arr)) ? 'active':'' }} " data-text="{{$val['title']}}">{{$val['title']}}</span>
                        @endforeach
                    </div>
                @else
                    <div class="select2MultiNew_option_relation">
                        <div>
                            @foreach($options as $key=>$val)
                            <a class="{{($key == 0) ? 'active':''}}" data-key="{{$val['key']}}">{{$val['title']}}</a>
                            @endforeach
                        </div>
                        <div>
                            @foreach($options as $key=>$val)
                                @foreach($val['_son_data'] as $v)
                                <span style="{{ ($key == 0) ? '':'display: none;' }}" data-key="{{ $v[$set['foreign_key']] }}" data-id="{{$v['key']}}" class="{{ (in_array($v['key'],$value_arr)) ? 'active':'' }}" data-text="{{ $val['title'] .' -> ' . $v['title']}}">{{$v['title']}}</span>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @if (!empty($tip))
            <div class="tips">
                @if (isset($set['search_tag']))
                    <span style="color: #ff0000;font-weight: 700;margin-right: 10px;">全站搜尋</span>
                @endif
                <div class="title">
                    <span>TIPS</span>
                </div>
                <p>{!! $tip !!}</p>
            </div>
        @endif
    </div>

</li>

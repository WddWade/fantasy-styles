<li class="inventory {!! $sontable ? '' : 'row_style' !!}">
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
    {!! $sontable ? '' : '<div class="title">' !!}
    <p class="subtitle">{{ $title }}</p>
    {!! $sontable ? '' : '</div>' !!}
    <div class="inner">
        @if(isset($set['ajax']) && $set['ajax'])
            <div class="leon-select {{ $auto }}"
                data-options_model="{{$set['options_model'] ?? ''}}"
                data-main_model="{{$set['main_model'] ?? ''}}" 
                data-max="{{$set['options_max']??'100'}}" 
                data-foreign_key="{{$set['foreign_key'] ?? ''}}" 
                data-autosetup="{{ $autosetup }}"
            >
                <input class="__value" type="hidden" name="{{ $disabled ? '' : $name }}" value="{{$value}}">
                <div class="selected">{{ collect($selectValues)->first()['title'] ?? '請選擇選項'}}</div>
                <div class="options">
                    <div class="leon-select-bar">
                        <span class="icon-search"></span>
                        <input type="text" class="search-box" placeholder="SEARCH 請輸入關鍵字搜尋" />
                        <a>Search</a>
                    </div>
                    
                    <div class="options_item">
                        @foreach(collect($options) as $val)
                        <div data-value="{{ $val['key'] }}">{{ $val['title'] }}</div>
                        @endforeach
                        @if(count($options) > ($set['options_max']??'100'))
                        <span>以上僅顯示最新{{$set['options_max']??'100'}}筆,其他資料請使用搜尋</span>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <select class="____select2 {{ $auto }}" 
                name="{{ $disabled ? '' : $name }}" 
                data-autosetup="{{ $autosetup }}" 
                @if (!empty($set['verify']) && !$disabled) data-verify="{{ json_encode($set['verify']) }}" @endif 
                {{ $disabled ? 'disabled' : '' }}
            >
                @if(!empty($selectValues))
                <optgroup label="目前選項為">
                    <option value="{{ $value }}" selected>{{ collect($selectValues)->first()['title'] ?? ''}}</option>
                </optgroup>
                @endif
                @if(!empty(collect($options)->whereNotIn('key',$value)->all()))
                <optgroup label="可選擇下列選項">
                    @foreach ($options as $key => $row)
                        @if($row['key'] != $value)
                            <option value="{{ $row['key'] }}">{{ $row['title'] }}</option>
                        @endif
                    @endforeach
                </optgroup>
                @endif
            </select>
        @endif
        @if (!empty($tip))
            <div class="tips">
                <span class="title">TIPS</span>
                <p>{!! $tip !!}</p>
            </div>
        @endif
    </div>
</li>

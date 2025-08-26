<li class="inventory">
    @if ($batch || $search)
        <div>
            <div class="radioSmall sortStatusSet" style="padding: 0px !important;">
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
    <div class="title">
        <p class="subtitle">{{ $title }}</p>
    </div>
    <div class="inner">
        <div class="checkbox">
            <div class="content">
                <input class="normal_input" name="{{ $disabled ? '' : $name }}" type="hidden" value="{{ $value }}">
                <div class="checkbox_list">
                @foreach ($options as $key => $row)
                    <span class="{{ (in_array($row['key'],$value_arr)) ? 'active' : '' }}" data-value="{{ $row['key'] }}">{{ $row['title'] }}</span>
                @endforeach
                </div>
            </div>
        </div>
        @if (!empty($tip))
            <div class="tips">
                <span class="title">TIPS</span>
                <p>{!! $tip !!}</p>
            </div>
        @endif
    </div>
</li>

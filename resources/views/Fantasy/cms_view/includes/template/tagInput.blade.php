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
        <div class="tag-editor">
            <input class="normal_input" name="{{ $disabled ? '' : $name }}" type="hidden" value="{{ (!empty($value)) ? json_encode($value, JSON_UNESCAPED_UNICODE) : '' }}" {{$disabled ? 'disabled' : ''}} autocomplete="off">
            @foreach($value ?: [] as $val)
            <div class="tag-item" draggable="true">{{$val}}<span class="tag-remove"><a class="fa fa-remove"></a></span></div>
            @endforeach
            <input class="tag-input" type="text" placeholder="添加標籤..." autocomplete="off">
        </div>
        @if (!empty($tip))
            <div class="tips">
                <div class="title">
                    <span>TIPS</span>
                </div>
                <p>{!! $tip !!}</p>
            </div>
        @endif
    </div>
</li>

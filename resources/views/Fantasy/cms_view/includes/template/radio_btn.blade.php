<li class="inventory sortStatusSet">
    {!! $sontable === false ? ' <div class="title">' : '' !!}
    <div class="subtitle">
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
        <div>{{ $title }}</div>
    </div>
    {!! $sontable === false ? '</div>' : '' !!}

    {!! $sontable === false ? '<div class="inner">' : '' !!}

        <div class="ios_switch {{ $disabled ? '' : 'radio_btn_switch' }} {{ $value == '1' ? 'on' : '' }}">
            <input name="{{ $disabled ? '' : $name }}" type="text" value="{{ $value ?: '0' }}">
            <div class="box">
                <span class="ball"></span>
            </div>
        </div>

        @if($tip != '')
            <div class="tips">
                <span class="title">TIPS</span>
                <p>{!! $tip !!}</p>
            </div>
        @endif
        {!! $sontable === false ? '
    </div>' : '' !!}

</li>

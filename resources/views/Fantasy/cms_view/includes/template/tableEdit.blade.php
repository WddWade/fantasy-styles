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
        <div class="table-editor">
            <div class="button-group">
                <button class="bkSpreadsheetNewCol" type="button">新增欄</button>
                <button class="bkSpreadsheetNewRow" type="button">新增列</button>
                @if(!$disableSetColWidth) <button class="bkSpreadsheetResetColWidth" type="button">恢復預設欄寬</button> @endif
                <button class="bkSpreadsheetEditFullScreen" type="button" data-to-open="全螢幕編輯" data-to-close="退出全螢幕">全螢幕編輯</button>
            </div>
            <div class='bk_spreadsheet' data-defaultWidth='{{ $defaultWidth ?? 200 }}'  {{ $disableSetHeader ? 'data-disableSetHeader' : ''; }} {{ $disableSetMerge ? 'data-disableSetMerge' : ''; }} {{ $disableSetFreeze ? 'data-disableSetFreeze' : ''; }} {{ $disableSetColWidth ? 'data-disableSetColWidth' : ''; }}></div>
            <input class="bk_spreadsheet_value {{ $set['class'] ?? '' }}" data-autosetup="{{ $autosetup }}" name="{{ $disabled ? '' : $name }}" type="text" value="{{ $value }}" {{ $disabled ? 'disabled' : '' }} autocomplete="off" hidden>
            <input class="bk_spreadsheet_merge {{ $set['class'] ?? '' }}" data-autosetup="{{ $autosetup }}" name="{{ $disabled ? '' : $name2 }}" type="text" value="{{ $value2 }}" {{ $disabled ? 'disabled' : '' }} autocomplete="off" hidden>
            <input class="bk_spreadsheet_header {{ $set['class'] ?? '' }}" data-autosetup="{{ $autosetup }}" name="{{ $disabled ? '' : $name3 }}" type="text" value="{{ $value3 }}" {{ $disabled ? 'disabled' : '' }} autocomplete="off" hidden>
            <input class="bk_spreadsheet_freeze {{ $set['class'] ?? '' }}" data-autosetup="{{ $autosetup }}" name="{{ $disabled ? '' : $name4 }}" type="text" value="{{ $value4 }}" {{ $disabled ? 'disabled' : '' }} autocomplete="off" hidden>
            <input class="bk_spreadsheet_col_width {{ $set['class'] ?? '' }}" data-autosetup="{{ $autosetup }}" name="{{ $disabled ? '' : $name5 }}" type="text" value="{{ $value5 }}" {{ $disabled ? 'disabled' : '' }} autocomplete="off" hidden>
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

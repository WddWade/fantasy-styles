{{-- @dd($key_group) --}}
@foreach ($key_group as $key => $row)
    <li class="inventory ams_permissions hide_auth hide_auth_{{ $row['CmsMenu'][0]['key_id'] ?? '' }}">
        <div class="title">
            <div class="subtitle">
                <div>{{ $row['title'] }}</div>
            </div>
            <div class="title_conteollers">
                <a class="ios_switch_select_block" data-val="0" href="javascript:void(0)" style="background-color: #c5c5c5;padding: 5px;color: #fff;">全關</a>
                <a class="ios_switch_select_block" data-val="1" href="javascript:void(0)" style="background-color: #3a9eea;padding: 5px;color: #fff;">全開</a>
            </div>
        </div>
        <div class="inner">
            @foreach ($row['cms_menu'] as $cms_menu)
                <div class="group">
                    <div class="left">
                        <span>{{ $cms_menu['title'] }}</span>
                            @if (in_array(intval($cms_menu['type']), [1]))
                            <input class="check_ams_rabio" name="jsonData[{{ $cms_menu['id'] }}][]" type="hidden" value="1">
                            <input class="check_ams_rabio" name="jsonData[{{ $cms_menu['id'] }}][]" type="hidden" value="1">
                            <input class="check_ams_rabio" name="jsonData[{{ $cms_menu['id'] }}][]" type="hidden" value="1">
                            <input class="check_ams_rabio" name="jsonData[{{ $cms_menu['id'] }}][]" type="hidden" value="1">
                            @if(isset($cms_menu['son_cms_menu']))
                            <input class="check_ams_rabio" name="jsonData[{{ $cms_menu['son_cms_menu']['id'] }}][]" type="hidden" value="1">
                            <input class="check_ams_rabio" name="jsonData[{{ $cms_menu['son_cms_menu']['id'] }}][]" type="hidden" value="1">
                            <input class="check_ams_rabio" name="jsonData[{{ $cms_menu['son_cms_menu']['id'] }}][]" type="hidden" value="1">
                            <input class="check_ams_rabio" name="jsonData[{{ $cms_menu['son_cms_menu']['id'] }}][]" type="hidden" value="1">
                            @endif
                            @endif
                    </div>
                    <div class="options">
                        @if (in_array(intval($cms_menu['type']), [2]))
                        @php
                        $cms_menu['title'] = '';
                        $cms_menu['cms_menu'] = [$cms_menu];
                        @endphp
                        @endif
                        @foreach ($cms_menu['cms_menu'] as $row2)
                            <div class="inner_box has_auth auth_{{ $row2['key_id'] ?? '' }}">
                                @if(!empty($row2['title']))
                                <div class="info_text">
                                    <strong>{{ $row2['title'] }}</strong>
                                </div>
                                @endif
                                <div class="switch_box_list">
                                    <div class="switch_box">
                                        <div class="ios_switch @if ((isset($jsonSup[$row2['id']][0]) && $jsonSup[$row2['id']][0]) || !isset($jsonSup[$row2['id']][0])) on @endif ams_ios_switch switch-block mrg-l-30 view-switch">
                                            <label class="title mrg-r-10">檢視</label>
                                            <input class="check_ams_rabio" name="jsonData[{{ $row2['id'] }}][]"
                                                type="hidden" value="{{ $jsonSup[$row2['id']][0] ?? '1' }}">

                                            <input type="checkbox">
                                            <div class="box"><span class="ball"></span> </div>
                                        </div>
                                        @if (empty($row2['is_content']))
                                            <div
                                                class="ios_switch @if ((isset($jsonSup[$row2['id']][1]) && $jsonSup[$row2['id']][1]) || !isset($jsonSup[$row2['id']][1])) on @endif ams_ios_switch switch-block mrg-l-30">
                                                <label class="title mrg-r-10">新增</label>
                                                <input class="check_ams_rabio" name="jsonData[{{ $row2['id'] }}][]"
                                                    type="hidden" value="{{ $jsonSup[$row2['id']][1] ?? '1' }}">
                                                <input type="checkbox">
                                                <div class="box"><span class="ball"></span> </div>
                                            </div>
                                            <div
                                                class="ios_switch @if ((isset($jsonSup[$row2['id']][2]) && $jsonSup[$row2['id']][2]) || !isset($jsonSup[$row2['id']][2])) on @endif ams_ios_switch switch-block mrg-l-30">
                                                <label class="title mrg-r-10">刪除</label>
                                                <input class="check_ams_rabio" name="jsonData[{{ $row2['id'] }}][]"
                                                    type="hidden" value="{{ $jsonSup[$row2['id']][2] ?? '1' }}">
                                                <input type="checkbox">
                                                <div class="box"><span class="ball"></span> </div>
                                            </div>
                                        @else
                                            <div style="display: none">
                                                <input class="check_ams_rabio" name="jsonData[{{ $row2['id'] }}][]"
                                                    type="hidden" value="0">
                                                <input class="check_ams_rabio" name="jsonData[{{ $row2['id'] }}][]"
                                                    type="hidden" value="0">
                                            </div>
                                        @endif
                                        <div
                                            class="ios_switch @if ((isset($jsonSup[$row2['id']][3]) && $jsonSup[$row2['id']][3]) || !isset($jsonSup[$row2['id']][3])) on @endif ams_ios_switch switch-block mrg-l-30">
                                            <label class="title mrg-r-10">編輯</label>
                                            <input class="check_ams_rabio" name="jsonData[{{ $row2['id'] }}][]"
                                                type="hidden" value="{{ $jsonSup[$row2['id']][3] ?? '1' }}">

                                            <input type="checkbox">
                                            <div class="box"><span class="ball"></span> </div>
                                        </div>
                                        @if ($need_review && !$row2['no_review'])
                                            <div class="ios_switch review-action @if ((isset($jsonSup[$row2['id']][4]) && $jsonSup[$row2['id']][4]) || !isset($jsonSup[$row2['id']][4])) on @endif review-switch ams_ios_switch switch-block mrg-l-30">
                                                <label class="title mrg-r-10">審核</label>
                                                <input class="check_ams_rabio" name="jsonData[{{ $row2['id'] }}][]"
                                                    type="hidden" value="{{ $jsonSup[$row2['id']][4] ?? '1' }}">
                                                <input type="checkbox">
                                                <div class="box"><span class="ball"></span> </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="switch_box_auth">
                                    @if ($row2['has_auth'] == $row2['id'])
                                        <input name='auth_menu_id[][]' type='hidden' value="{{ $row2['id'] }}" />
                                        <ul class="multi_select_has_auth" id="multi_select_has_auth_{{ $row2['id'] }}"
                                            data-menu_id="{{ $row2['id'] }}" data-model="{{ $row2['model'] }}">
                                            @php
                                                $get_cms_option = [];
                                                if (!empty($BranchOriginUnit)) {
                                                    $LeonTableName = M_table_Config(M($row2['model']));
                                                    $model_locale = explode('_', $LeonTableName);
                                                    $SaveToMany = false;
                                                    if (count($model_locale) > 1) {
                                                        unset($model_locale[0]);
                                                        $LeonTableName = implode('_', $model_locale);
                                                        $SaveToMany = true;
                                                    }
                                                    $TableName = $SaveToMany ? $BranchOriginUnit['locale'] . '_' . $LeonTableName : $LeonTableName;
                                                
                                                    $get_cms_option = DB::table($TableName)
                                                        ->where('branch_id', $row2['branch_id'])
                                                        ->get()
                                                        ->map(function ($item) {
                                                            return [
                                                                'key' => $item->id,
                                                                'title' => $item->w_title ?? $item->title,
                                                            ];
                                                        })
                                                        ->prepend(['key' => 'pass', 'title' => '+++ 全部授權 +++']);
                                                }
                                                
                                            @endphp
                                            {{ UnitMaker::select2Multi([
                                                'name' => 'authData[auth_data][' . $row2['id'] . ']',
                                                'options' => $get_cms_option,
                                                'value' =>
                                                    array_key_exists($row2['id'], $data['CmsDataAuth']) && $data['CmsDataAuth'][$row2['id']]['data_id'] != ''
                                                        ? $data['CmsDataAuth'][$row2['id']]['data_id']
                                                        : '',
                                            ]) }}
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </li>
@endforeach

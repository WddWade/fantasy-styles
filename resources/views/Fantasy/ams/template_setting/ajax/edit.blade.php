<input name="_token" type="hidden" value="<?php echo csrf_token(); ?>">
<div class="backEnd_quill">
    <div class="hiddenArea_frame">
        <div class="hiddenArea_frame_box">
            <div class="detailEditor">
                <div class="editorBody">
                    <div class="editorHeader">
                        <div class="info">
                            @if(isset($branch_options[$data['origin_id']]))
                                <h3 class="dataEditTitle">{{$branch_options[$data['origin_id']]}}-單元設定</H3>
                            @else
                                <h3 class="dataEditTitle">新增分站單元設定</h3>
                            @endif
                            {{-- <div class="title">
                                <p class="ams_type_create_zz" style="display:none;">Create CMS Template 新增功能設定</p>
                                <p class="ams_type_edit_zz" style="display:none;">Edit CMS Template 編輯功能設定</p>
                            </div> --}}
                            {{-- <div class="area">
                                
                            </div>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p></p>
                            </div> --}}
                        </div>
                        <div class="control">
                            <ul class="btnGroup">
                                <li class="cancel">
                                    <a class="close_btn close_ams_hiddenArea" href="javascript:void(0)">
                                        <span class="fa fa-remove"></span>
                                        <span class="label">Cancel</span>
                                    </a>
                                </li>
                                <li class="check">
                                    <a class="updated_ams_edit_btn" data-type="template-setting"
                                        href="javascript:void(0)">
                                        <span class="fa fa-check"></span>
                                        <span class="label">Save</span>
                                    </a>
                                </li>                                
                            </ul>
                        </div>                        
                    </div>
                    <div class="editorContent">
                        <ul class="box_block_frame">
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">是否啟用</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">設定該分站是否啟用，未開啟將無法瀏覽</p>
                                        </div>
                                        <div class="switch_box">
                                            
                                        </div>
                                    </div> --}}

                                    <div class="ios_switch radio_btn_switch mrg-l-30 ams_ios_switch {{ isset($data['is_active']) && $data['is_active'] == 0 ? '' : 'on' }}">
                                        <input class="check_ams_rabio" name="amsData[is_active]" type="hidden"
                                            value="{{ isset($data['is_active']) && $data['is_active'] == 0 ? '0' : '1' }}">
                                        <input type="checkbox">
                                        <div class="box ams_switch_ball">
                                            <span class="ball"></span>
                                        </div>
                                    </div>                                    
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                         <p>啟用該分站單元權限，未開啟或為設定啟用的分站單元將無法被瀏覽</p>
                                    </div>                                        
                                </div>
                            </li>
                            {{UnitMaker::textInput([
                                'name' => '',
                                'title' => '分站',
                                'tip' => '',
                                'value' => ( !empty($branch_options[$data['origin_id']]) )? $branch_options[$data['origin_id']] : '',
                                'disabled'=>true,
                            ])}}
                            {{UnitMaker::textInput([
                                'name' => '',
                                'title' => '語系',
                                'tip' => '',
                                'value' => ( !empty($locale_options[$data['locale']]) )? $locale_options[$data['locale']] : '',
                                'disabled' => true,
                            ])}}

                            <li class="inventory">
                                <div class="inner" style="width:100%;">
                                    <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="f-900" style="font-size: 18px;">請設定此分站/語系，可管理的單元</p>
                                        </div>
                                        <div class="switch_box">
                                            <div style="display: flex;width: 95px;">
                                                <a class="ios_switch_select_block_all" data-val="0"
                                                    href="javascript:void(0)"
                                                    style="background-color: #c5c5c5;padding: 5px;color: #fff;">全關</a>
                                                <a class="ios_switch_select_block_all" data-val="1"
                                                    href="javascript:void(0)"
                                                    style="background-color: #3a9eea;padding: 5px;color: #fff;">全開</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @foreach ($key_group as $key => $row)
                                <li class="inventory">
                                    <div class="inner" style="width:100%;">
                                        <div class="inner_box ">
                                            <div class="info_text">
                                                <p class="f-900">{{ $row['title'] }}</p>
                                            </div>
                                            <div class="switch_box">
                                                <div
                                                    class="ios_switch radio_btn_switch mrg-l-30 ams_ios_switch switch-block {{ isset($row['is_active']) && $row['is_active'] == 1 ? 'on' : '' }}">
                                                    <input class="check_ams_rabio" name="jsonData[{{ $row['id'] }}]"
                                                        type="hidden"
                                                        value="{{ isset($row['is_active']) && $row['is_active'] == 1 ? '1' : '0' }}">
                                                    <input type="checkbox">
                                                    <div class="box ams_switch_ball">
                                                        <span class="ball"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">最後異動時間</div>
                                </div>
                                <div class="inner">
                                    <div class="file_date">
                                        @if (isset($data['updated_at']) and !empty($data['updated_at']))
                                            <p>{{ $data['updated_at'] }}</p>
                                        @else
                                            <p></p>
                                        @endif
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>不開放修改，由系統自行更新。</p>
                                    </div>
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">單元設定建立日期</div>
                                </div>
                                <div class="inner">
                                    <div class="file_date">
                                        @if (isset($data['created_at']) and !empty($data['created_at']))
                                            <p>{{ $data['created_at'] }}</p>
                                        @else
                                            <p></p>
                                        @endif
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>不開放修改，由系統自行更新。</p>
                                    </div>
                                </div>
                            </li>
                            <input name="amsData[origin_id]" type="hidden" value="{{ $data['origin_id'] }}">
                            <input name="amsData[locale]" type="hidden" value="{{ $data['locale'] }}">
                            @if (isset($data['id']) and !empty($data['id']))
                            <input class="supportAmsId_Input" name="amsData[id]" type="hidden" value="{{ $data['id'] }}">
                            @else
                            <input class="supportAmsId_Input" name="amsData[id]" type="hidden" value="0">
                            @endif
                        </ul>
                    </div>
                    <!--區塊功能按鈕-->
                    <div class="hiddenArea_frame_controlBtn">
                        <ul class="btnGroup">
                        
                            <li class="cancel">
                                <a class="close_btn close_ams_hiddenArea" href="javascript:void(0)">
                                    <span class="fa fa-remove"></span>
                                    <p>CANCEL</p>
                                </a>
                            </li>
                            <li class="check">
                                <a class="updated_ams_edit_btn" data-type="template-setting" href="javascript:void(0)">
                                    <span class="fa fa-check"></span>
                                    <p>SETTING</p>
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

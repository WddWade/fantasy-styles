<input name="_token" type="hidden" value="<?php echo csrf_token(); ?>">
{{-- 不能用當前語系  改用 unit 紀錄的語系 --}}
<input name="_lang" type="hidden"
    value="@if ($BranchOriginUnit) {{ $BranchOriginUnit['locale'] . '_' }} @else {{ config::get('app.dataBasePrefix') }} @endif">
<div class="backEnd_quill">
    <div class="hiddenArea_frame">
        <div class="hiddenArea_frame_box">
            <div class="detailEditor">
                <div class="editorBody">
                    <div class="editorHeader">
                    <div class="info">
                        {{-- <div class="title">
                            <!-- <p class="ams_type_create_zz" style="display:none;">Create CMS Template 新增功能設定</p> -->
                            <p class="ams_type_edit_zz">Edit CMS Template 權限設定</p>
                        </div> --}}
                         @if(isset($data['branch_unit_id']))
                            <h3 class="dataEditTitle">分站管理權限設定</H3>
                        @else
                            <h3 class="dataEditTitle">新增分站管理權限</h3>
                        @endif
                    </div>
                        <div class="control">
                            <ul class="btnGroup">                            
                                <li class="trash delete_ams_hiddenArea">
                                    <a class="delete_ams_information" data-type="cms-manager" href="javascript:void(0)">
                                        <span class="fa fa-trash"></span>
                                        <div class="label">Delete</div>
                                    </a>
                                </li>
                                <li class="check">
                                    <a class="updated_ams_edit_btn" data-type="cms-manager" href="javascript:void(0)">
                                        <span class="fa fa-check"></span>
                                        <span class="label">Save</span>
                                    </a>
                                </li>
                                <li class="remove">
                                    <a class="close_btn close_ams_hiddenArea" href="javascript:void(0)">
                                        <span class="fa fa-remove"></span>
                                        <span class="label">Cancel</span>
                                    </a>
                                </li>    
                            </ul>
                        </div>                        
                    </div>
                    <div class="editorContent">
                        <ul class="box_block_frame" style="min-height: 1000px;">
                            @if (isset($data['id']) and !empty($data['id']))
                                <input class="supportAmsId_Input" name="amsData[id]" type="hidden"
                                    value="{{ $data['id'] }}">
                            @else
                                <input class="supportAmsId_Input" name="amsData[id]" type="hidden" value="0">
                            @endif
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">
                                        <div>是否啟用管理權限設定</div>
                                    </div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box "> --}}
                                        {{-- <div class="info_text">
                                            <p class="title">該管理權限設定 是否啟用</p> --}}
                                            {{-- <p>未啟用視同該使用者無權限</p> --}}
                                            {{-- <p>選擇要取得
                                                <strong>CMS emplate</strong>管理授權的管理者帳號，打開授權開關將可決定管理帳號是否可進入
                                                <strong>CMS Template</strong> 進行管理
                                            </p> --}}
                                        {{-- </div> --}}
                                        
                                    {{-- </div> --}}
                                    <div class="switch_box radio_btn_switch">
                                        <div class="ios_switch  ams_ios_switch {{ isset($data['is_active']) && $data['is_active'] == 0 ? '' : 'on' }}">
                                            <label class="title mrg-r-10">啟用</label>
                                            <input class="check_ams_rabio" name="amsData[is_active]" type="hidden"
                                                value="{{ isset($data['is_active']) && $data['is_active'] == 0 ? '0' : '1' }}">
                                            <input type="checkbox">
                                            <div class="box">
                                                <span class="ball"></span>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>未啟用視同該使用者無權限。</p>
                                    </div>
                                </div>
                            </li>
                            <li class="inventory ">
                                <div class="title">
                                    <div class="subtitle">分站管理者</div>
                                </div>
                                <div class="inner">
                                    <select class="____select2 valid" name="amsData[user_id]" aria-invalid="false">
                                        <option value="0">請選擇管理者</option>
                                        @foreach ($FantasyUsers as $row)
                                            <option value="{{ $row['id'] }}" @if(isset($data['user_id']) && $row['id'] == $data['user_id'] ) selected @endif>
                                                {{ $row['name'] ?: $row['account'] ?: '未設定帳號名稱'}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            {{ UnitMaker::select2([
                                'name' => 'amsData[branch_unit_id]',
                                'title' => '選擇分站',
                                'value' => !empty($data['branch_unit_id']) ? $data['branch_unit_id'] : '',
                                'options' => $branch_unit_options,
                            ]) }}
                            {{-- <li class="inventory review-action"
                                @if (!$need_review) style="display: none" @endif>
                                <div class="title">
                                    <div class="subtitle">編輯免審核</div>
                                </div>
                                <div class="inner">
                                    <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">無審核權限編輯是否免審核</p>
                                            <p>預設無審核權限者，編輯後會資料會自動下架，若不讓資料下架，可開啟此功能
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                            <div
                                                class="ios_switch  ams_ios_switch {{ isset($data['is_review_edit']) && $data['is_review_edit'] == 0 ? '' : 'on' }}">
                                                <input class="check_ams_rabio" name="amsData[is_review_edit]"
                                                    type="hidden"
                                                    value="{{ isset($data['is_review_edit']) && $data['is_review_edit'] == 0 ? '0' : '1' }}">
                                                <input type="checkbox">
                                                <div class="box">
                                                    <span class="ball"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            {{-- wade:delete --}}
                            <div class="ajax_html">
                            @include('Fantasy.ams.cms_manager.ajax.unit', [
                                'need_review' => $need_review,
                            ])
                            </div>
                            @if(!empty($data))
                            <li class="change_dom_top inventory">
                                <div class="title">
                                    <div class="subtitle">最後異動時間</div>
                                </div>
                                <div class="inner">
                                    <div class="file_date">
                                        <p>{{ $data['updated_at'] ?? '' }}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">建立日期</div>
                                </div>
                                <div class="inner">
                                    <div class="file_date">
                                        <p>{{ $data['created_at'] ?? ''}}</p>
                                    </div>
                                </div>
                            </li>
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

                            <li class="trash delete_ams_hiddenArea">
                                <a class="delete_ams_information" data-type="cms-manager" href="javascript:void(0)">
                                    <span class="fa fa-trash"></span>
                                    <p>DELETE</p>
                                </a>
                            </li>

                            <li class="check">
                                <a class="updated_ams_edit_btn" data-type="cms-manager" href="javascript:void(0)">
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

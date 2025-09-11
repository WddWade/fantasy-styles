<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="backEnd_quill">
    <div class="hiddenArea_frame">
        <div class="hiddenArea_frame_box">
            <div class="detailEditor">
                <div class="editorBody">
                    <div class="editorHeader">
                        <div class="info">
                            {{-- <div class="title">
                                <p class="ams_type_edit_zz">Fantasy Account Management 帳號管理</p>
                            </div> --}}
                            @if(isset($data['account']))
                                <h3 class="dataEditTitle">{{$data['account']}}</H3>
                            @else
                                <h3 class="dataEditTitle">歡迎，新冒險家</h3>
                            @endif
                        </div>
                         <div class="control">
                            <ul class="btnGroup">
                                <li class="cancel">
                                    <a href="javascript:void(0)" class="close_btn close_ams_hiddenArea">
                                        <span class="fa fa-remove"></span>
                                        <span class="label">Cancel</span>
                                    </a>
                                </li>
                                <li class="trash delete_ams_hiddenArea">
                                    <a href="javascript:void(0)" class="delete_ams_information" data-type="fantasy-account">
                                        <span class="fa fa-trash"></span>
                                        <div class="label">Delete</div>
                                    </a>
                                </li>
                                <li class="check">
                                    <a href="javascript:void(0)" class="updated_ams_edit_btn" data-type="fantasy-account">
                                        <span class="fa fa-check"></span>
                                        <span class="label">Save</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="editorContent">
                        <ul class="frame">
                            @if(isset($data['id']) AND !empty($data['id']))
                            <input type="hidden" value="{{$data['id']}}" name="amsData[id]" class="supportAmsId_Input">
                            @else
                            <input type="hidden" value="0" name="amsData[id]" class="supportAmsId_Input">
                            @endif
                            
                            {{-- <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">注意事項</div>
                                </div>
                                <div class="inner">
                                    <div class="tips">
                                        <span class="title">Tips</span>
                                        <p>設定與管理 Fantasy Account，擁有 Account 才能夠登入 Fantasy 進行操作</p>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">帳號是否啟用</div>
                                </div>
                                <div class="inner">
                                    <div class="ios_switch radio_btn_switch mrg-l-30 {{ (isset($data['is_active']) && $data['is_active'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_active']) && $data['is_active'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_active]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                         <p>設定與管理 Fantasy Account，擁有 Account 才能夠登入 Fantasy 進行操作<br>啟用後此帳號才能登入</p>
                                    </div>
                                </div>
                            </li>
                            {{UnitMaker::imageGroup([
                                'title' => '帳號大頭照',
                                'image_array' =>[[
                                    'name' => 'amsData[photo_image]',
                                    'title' => '',
                                    'value' => ( !empty($data['photo_image']) )? $data['photo_image'] : '',
                                    'set_size' => 'yes',
                                    'width' => '100',
                                    'height' => '100',
                                    ]],
                                    'tip' => '圖片尺寸 100 x 100 像素，圖片解析度限制 : 72DPI，檔案格式限定 : JPG、PNG、GIF。'
                            ])}}

                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">帳號設定</div>
                                </div>
                                <div class="inner">
                                    <input class="normal_input" type="text" placeholder="" name="amsData[account]" value="{{$data['account'] ?? ''}}" autocomplete="off">
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>不可與其他管理帳號重複，特殊符號如 : @#$%?/\|*.及全形輸入也請盡量避免。</p>
                                    </div>
                                </div>
                            </li>
                             <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">姓名</div>
                                </div>
                                <div class="inner">
                                    <input class="normal_input" type="text" placeholder="" name="amsData[name]" value="{{$data['name'] ?? ''}}">
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">電子郵件</div>
                                </div>
                                <div class="inner">
                                    <input class="normal_input" type="text" placeholder="" name="amsData[mail]" value="{{$data['mail'] ?? ''}}">
                                </div>
                            </li>
                            
                            @if(empty($data))
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">密碼設定</div>
                                </div>
                                <div class="inner">
                                    <div class="inner_box row_style">
                                        <div class="psbox gray w-50 mrg-r-10">
                                            <input class="normal_input" type="password" placeholder="請輸入密碼" name="amsData[password]">
                                            {{-- <span class="icon blind fa fa-eye-slash"></span> --}}
                                        </div>
                                        <div class="psbox w-50 mrg-l-10">
                                            <input class="normal_input" type="password" placeholder="密碼驗證，請再次輸入密碼" name="amsData[password2]">
                                            {{-- <span class="icon blind fa fa-eye-slash"></span> --}}
                                        </div>
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>請輸入8-12 位英文字母與數字、符號組合而成的密碼，英文字母至少有一位為大寫字母。</p>
                                    </div>
                                </div>
                            </li>
                            @endif
                            {{-- <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">帳號是否啟用</div>
                                </div>
                                <div class="inner">
                                    <div class="radio_area">
                                        <div class="radio_area_content">
                                            <input id="is_active" name="amsData[is_active]" type="hidden" value="{{$data['is_active'] ?? 0}}">
                                            <label class="box {{ (isset($data['is_active']) && $data['is_active']==1) ? '':'active' }}" data-value="0" data-hide="">
                                                <div class="plan">
                                                    <span class="circle"></span>
                                                    <span class="yearly">否</span>
                                                </div>
                                            </label>
                                            <label class="box {{ (isset($data['is_active']) && $data['is_active']==1) ? 'active':'' }}" data-value="1" data-hide="">
                                                <div class="plan">
                                                    <span class="circle"></span>
                                                    <span class="yearly">是</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>啟用後此帳號才能登入</p>
                                    </div>
                                </div>
                            </li>        --}}
                            
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">限制登入IP</div>
                                </div>
                                <div class="inner">
                                    <input class="normal_input" type="text" placeholder="" name="amsData[lock_ip]" value="{{$data['lock_ip'] ?? ''}}">
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>設定登入IP將限制該帳號只能於登入IP位址登入系統，若需設定多個IP請使用逗號區分。</p>
                                    </div>
                                </div>
                            </li>
                            {{-- <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">FMS最大權限管理者</div>
                                </div>
                                <div class="inner">
                                    <div class="inner_box row_style">
                                        <div class="switch_box">
                                            <div class="ios_switch mrg-l-30 ams_ios_switch {{ (isset($data['fms_admin']) && $data['fms_admin'] == 0) ? '':'on' }}">
                                                <input type="hidden" value="{{ (isset($data['fms_admin']) && $data['fms_admin'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[fms_admin]">
                                                <input type="checkbox">
                                                <div class="box ams_switch_ball">
                                                    <span class="ball"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>開啟本選項，該帳號可不受擁有者限制，編輯、刪除FMS檔案。</p>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">備註說明</div>
                                </div>
                                <div class="inner">
                                    <textarea name="amsData[note]" id="" placeholder="">{{$data['note'] ?? ''}}</textarea>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>僅提供後台備註說明使用</p>
                                    </div>
                                </div>
                            </li>
                            @if(!empty($data))
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">最後異動時間</div>
                                </div>
                                <div class="inner">
                                    <div class="file_date">
                                        <p>{{$data['updated_at']}}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">帳號建立日期</div>
                                </div>
                                <div class="inner">
                                    <div class="file_date">
                                        <p>{{$data['created_at']}}</p>
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
                                <a href="javascript:void(0)" class="close_btn close_ams_hiddenArea">
                                    <span class="fa fa-remove"></span>
                                    <p>CANCEL</p>
                                </a>
                            </li>

                            <li class="trash delete_ams_hiddenArea">
                                <a href="javascript:void(0)" class="delete_ams_information" data-type="fantasy-account">
                                    <span class="fa fa-trash"></span>
                                    <p>DELETE</p>
                                </a>
                            </li>

                            <li class="check">
                                <a href="javascript:void(0)" class="updated_ams_edit_btn" data-type="fantasy-account">
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

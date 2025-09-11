<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="backEnd_quill">
    <div class="hiddenArea_frame">
        <div class="hiddenArea_frame_box">
            <div class="detailEditor">
                <div class="editorBody">
                    <div class="editorHeader">
                        <div class="info">
                            {{-- <div class="title">
                                <!-- <p class="ams_type_create_zz" style="display:none;">Create AMS 新增管理權限</p> -->
                                <p class="ams_type_edit_zz">Edit 權限管理</p>
                            </div> --}}
                            @if(isset($data['UsersData']))
                                <h3 class="dataEditTitle">{{ $data['UsersData']['name'] }} 權限設定</h3>
                            @else
                                <h3 class="dataEditTitle">新增權限設定</h3>
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
                                    <a href="javascript:void(0)" class="delete_ams_information" data-type="ams-manager">
                                        <span class="fa fa-trash"></span>
                                        <div class="label">Delete</div>
                                    </a>
                                </li>

                                    <li class="check">
                                    <a href="javascript:void(0)" class="updated_ams_edit_btn" data-type="ams-manager">
                                        <span class="fa fa-check"></span>
                                        <span class="label">Save</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="editorContent">
                        <ul class="box_block_frame" style="min-height: 1000px;">
                           
<<<<<<< HEAD
                            {{-- <li class="inventory ">
=======
                            <li class="inventory ">
>>>>>>> 674bf40978c984d5d1cb0eda679c9af9a9dd33b9
                                <div class="title">
                                    <div class="subtitle">權限是否啟用</div>
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
                                        <p>啟用後此權限設定才會生效</p>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">權限是否啟用</div>
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
                                         <p>啟用後此權限設定才會生效</p>
                                    </div>
                                </div>
                            </li>
<<<<<<< HEAD


=======
>>>>>>> 674bf40978c984d5d1cb0eda679c9af9a9dd33b9
                            {{-- <li class="inventory open_ams_lightbox" style="display:none;">
                                <div class="title">
                                    是否啟用
                                </div>
                                <div class="inner">
                                    <div class="inner_box" style="display:none;">
                                        <ul class="radio state_button mrg-0">
                                            <li class="mrg-r-20">
                                                <input type="radio" checked="checked" value="" name="radio2" id="stateA">
                                                <label for="stateA">
                                                    <strong>Administrator</strong>最大權限管理者
                                                </label>
                                            </li>
                                            <li class="mrg-r-20">
                                                <input type="radio" value="no" name="radio2" id="stateB">
                                                <label for="stateB">
                                                    <strong>Manager</strong>限定權限管理者
                                                </label>
                                            </li>
                                        </ul>
                                        <div class="tips">
                                            <span class="title">TIPS</span>
                                            <p>Administrator 最大權限管理者可對所有管理項目進行管理，Manage
                                                限定權限管理者只可對被指派項目進行管理。</p>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="inventory ">
                                <div class="title">
                                    <div class="subtitle">管理者</div>
                                </div>
                                <div class="inner">
                                    <select class="____select2 valid" name="amsData[user_id]" aria-invalid="false">
                                        @foreach ($FantasyUserEmpty as $row)
                                        <option value="{{ $row['id'] }}" @if(isset($data['user_id']) && $row['id'] == $data['user_id'] ) selected @endif>
                                            {{ $row['name'] ?: $row['account'] ?: '未設定帳號名稱'}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>

                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">帳號管理</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">Fantasy Account 管理權限是否啟用</p>
                                            <p>打開授權開關，將授權管理帳號可進入
                                                <strong>Account 帳號管理</strong>，並對內容及設定進行編輯作業
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                            
<<<<<<< HEAD
=======
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_fantasy']) && $data['is_fantasy'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_fantasy']) && $data['is_fantasy'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_fantasy]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
>>>>>>> 674bf40978c984d5d1cb0eda679c9af9a9dd33b9
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_fantasy']) && $data['is_fantasy'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_fantasy']) && $data['is_fantasy'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_fantasy]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                         <p>啟用授權，將授權管理帳號可進入 <strong>帳號管理</strong>，並對內容及設定進行編輯作業</p>
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                         <p>啟用授權，將授權管理帳號可進入 <strong>帳號管理</strong>，並對內容及設定進行編輯作業</p>
                                    </div>
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">權限設定</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">AMS 管理權限是否啟用</p>
                                            <p>打開授權開關，將授權管理帳號管理
                                                <strong>權限管理</strong>，並對內容及設定進行編輯作業
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                            
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_ams']) && $data['is_ams'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_ams']) && $data['is_ams'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_ams]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>啟用授權，將授權管理帳號管理 <strong>權限管理</strong>，並對內容及設定進行編輯作業</p>
                                    </div>
                                </div>
                            </li>
                            @if($configSet['setBranchs'])
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">分站管理</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">CMS Template 分站語系設定</p>
                                            <p>打開授權開關，將授權管理帳號管理
                                                <strong>CMS Template 分站後台語系啟用設定、分站網址設定</strong>，並對內容及設定進行編輯作業
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                            
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_cover_page']) && $data['is_cover_page'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_cover_page']) && $data['is_cover_page'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_cover_page]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>                                    
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                         <p>啟用授權，將授權管理帳號管理 <strong>分站管理</strong>，並對內容及設定進行編輯作業</p>
                                    </div>                                    
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">分站單元管理</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">分站單元設定</p>
                                            <p>打開授權開關，將授權管理帳號管理
                                                <strong>CMS Template 設定分站可編輯的資料類別</strong>，並對內容及設定進行編輯作業
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                            
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_cms_template']) && $data['is_cms_template'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_cms_template']) && $data['is_cms_template'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_cms_template]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>                                    
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                          <p>啟用授權，將授權管理帳號管理 <strong>分站單元管理</strong>，並對內容及設定進行編輯作業</p>
                                    </div>                                       
                                </div>
                            </li>
                            
                            @endif
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">分站管理權限設定</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">CMS Template 帳號權限管理</p>
                                            <p>打開授權開關，將授權管理帳號管理
                                                <strong>CMS Template 依帳號設定可編輯的資料類別</strong>，並對內容及設定進行編輯作業
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                           
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_cms_template_ma']) && $data['is_cms_template_ma'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_cms_template_ma']) && $data['is_cms_template_ma'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_cms_template_ma]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>                                    
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                         <p>啟用授權，將授權管理帳號管理 <strong>分站管理權限設定</strong>，並對內容及設定進行編輯作業</p>
                                    </div>                                    
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">檔案管理權限</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">檔案管理權限</p>
                                            <p>打開授權開關，將授權管理帳號可進入
                                                <strong>Fms Folder 基本目錄管理</strong>，且帳號可不受擁有者限制，編輯、刪除FMS檔案。
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                            
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_folder']) && $data['is_folder'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_folder']) && $data['is_folder'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_folder]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>                                    
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                         <p>打開授權開關，將授權管理帳號可進入 <strong>檔案管理權限</strong>，且帳號可不受擁有者限制，編輯、刪除FMS檔案</p>
                                    </div>                                    
                                </div>
                            </li>
                            {{-- <li class="inventory" style="display:none;">
                                <div class="title">
                                    <div class="subtitle">Fantasy</br>Setting</div>
                                </div>
                                <div class="inner">
                                    <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">Fantasy Setting 管理權限是否啟用</p>
                                            <p>打開授權開關，將授權管理帳號可進入
                                                <strong>Fantasy Setting 權限管理</strong>，並對內容及設定進行編輯作業
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                            <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_fantasy_setting']) && $data['is_fantasy_setting'] == 0) ? '':'on' }}">
                                                <input type="hidden" value="{{ (isset($data['is_fantasy_setting']) && $data['is_fantasy_setting'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_fantasy_setting]">
                                                <input type="checkbox">
                                                <div class="box ">
                                                    <span class="ball"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">網址導向設定</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">網址導向設定權限是否啟用</p>
                                            <p>打開授權開關，將授權管理帳號可進入
                                                <strong>網址導向設定</strong>，並對內容及設定進行編輯作業
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                           
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_autoredirect']) && $data['is_autoredirect'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_autoredirect']) && $data['is_autoredirect'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_autoredirect]">
                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                          <p>打開授權開關，將授權管理帳號可進入 <strong>網址導向設定</strong>，並對內容及設定進行編輯作業</p>
                                    </div>                                     
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">Log紀錄</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box ">
                                        <div class="info_text">
                                            <p class="title">Log 權限是否啟用</p>
                                            <p>打開授權開關，將授權管理帳號可進入
                                                <strong>Log 紀錄</strong>，並對內容及設定進行查看作業
                                            </p>
                                        </div>
                                        <div class="switch_box">
                                           
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30  {{ (isset($data['is_log']) && $data['is_log'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_log']) && $data['is_log'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_log]">

                                        <input type="checkbox">
                                        <div class="box ">
                                            <span class="ball"></span>
                                        </div>
                                    </div>                                    
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                           <p>打開授權開關，將授權管理帳號可進入 <strong>Log 紀錄</strong>，並對內容及設定進行查看作業</p>
                                    </div>                                     
                                </div>
                            </li>

                            @if(isset($data['id']) AND !empty($data['id']))
                            <input type="hidden" value="{{$data['id']}}" name="amsData[id]" class="supportAmsId_Input">
                            @else
                            <input type="hidden" value="0" name="amsData[id]" class="supportAmsId_Input">
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
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
                    <a href="javascript:void(0)" class="delete_ams_information" data-type="ams-manager">
                        <span class="fa fa-trash"></span>
                        <p>DELETE</p>
                    </a>
                </li>

                   <li class="check">
                    <a href="javascript:void(0)" class="updated_ams_edit_btn" data-type="ams-manager">
                        <span class="fa fa-check"></span>
                        <p>SETTING</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

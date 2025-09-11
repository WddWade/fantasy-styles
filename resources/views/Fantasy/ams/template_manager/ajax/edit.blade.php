<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="backEnd_quill">
    <div class="hiddenArea_frame">
        <div class="hiddenArea_frame_box">
            <div class="detailEditor">
                <div class="editorBody">
                    <div class="editorHeader">
                        <div class="info">
                            @if (isset($data['title']))
                                <h3 class="dataEditTitle">{{ $data['title'] }}分站管理</h3>
                            @else
                                <h3 class="dataEditTitle">新增分站</h3>
                            @endif                      
                            {{-- <div class="title">
                                <p class="ams_type_create_zz" style="display:none;">Create CMS Template 新增管理與設定</p>
                                <p class="ams_type_edit_zz" style="display:none;">Edit CMS Template 編輯管理與設定</p>
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
                                    <a href="javascript:void(0)" class="close_btn close_ams_hiddenArea">
                                        <span class="fa fa-remove"></span>
                                        <span class="label">Cancel</span>
                                    </a>
                                </li>                                
                               
                                {{-- 有開分站設定才可以刪除 --}}
                                @if ( Config::get('cms.setBranchs') )
                                <li class="trash delete_ams_hiddenArea">
                                    <a href="javascript:void(0)" class="delete_ams_information" data-type="template-manager">
                                        <span class="fa fa-trash"></span>
                                        <div class="label">Delete</div>
                                    </a>
                                </li>
                                @endif

                                <li class="check">
                                    <a href="javascript:void(0)" class="updated_ams_edit_btn" data-type="template-manager">
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
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">是否啟用分站</div>
                                </div>
                                <div class="inner">
                                    {{-- <div class="inner_box row_style">
                                        <div class="info_text">
                                            <p class="title">設定 CMS Template 分站是否啟用</p>
                                        </div>
                                        <div class="switch_box">
                                           
                                        </div>
                                    </div> --}}
                                    <div class="ios_switch radio_btn_switch mrg-l-30 ams_ios_switch {{ (isset($data['is_active']) && $data['is_active'] == 0) ? '':'on' }}">
                                        <input type="hidden" value="{{ (isset($data['is_active']) && $data['is_active'] == 0) ? '0':'1' }}" class="check_ams_rabio" name="amsData[is_active]">
                                        <input type="checkbox">
                                        <div class="box ams_switch_ball">
                                            <span class="ball"></span>
                                        </div>
                                    </div>                                    
                                    <div class="tips">
                                        <span class="title">TIPS</span>
                                        <p>設定啟用分站，分站即正式發佈公開瀏覽。</p>
                                    </div>                                    
                                </div>
                            </li>
                            @if(empty($data) || $data['blade_template'] > 1)
                            {{UnitMaker::select2([
                                'name' => 'amsData[blade_template]',
                                'title' => '選擇分站風格',
                                'tip' => '設定分站使用的風格版型。',
                                'options'=> collect(Config::get('cms.blade_template'))->where('add',1)->all(),
                                'value' => ( !empty($data['blade_template']) )? $data['blade_template'] : '',
                                'disabled' => ''
                            ])}}
                            @endif

                            {{UnitMaker::textInput([
                                'name' => 'amsData[title]',
                                'title' => '分站中文名稱',
                                'tip' => '名稱不可與其他分站名稱重複，禁止輸入特殊符號@#$%?/\|*.與全形輸入字元。',
                                'value' => ( !empty($data['title']) )? $data['title'] : '',
                            ])}}
                            {{UnitMaker::textInput([
                                'name' => 'amsData[en_title]',
                                'title' => '分站英文名稱',
                                'tip' => '名稱不可與其他分站名稱重複，禁止輸入特殊符號@#$%?/\|*.與全形輸入字元。',
                                'value' => ( !empty($data['en_title']) )? $data['en_title'] : '',
                            ])}}
                            {{UnitMaker::textInput([
                                'name' => 'amsData[url_title]',
                                'title' => '分站網址名稱',
                                'tip' => '基本分站網址 = https://'.\Route::getCurrentRequest()->server('HTTP_HOST').'/{站點網址}<br>
                                子網域分站網址 = https://{站點網址}.'.\Route::getCurrentRequest()->server('HTTP_HOST').'<br>
                                不可與其他站點網址名稱重複，特殊符號如 : @#$%?/\|*.及全形輸入也請盡量避免。',
                                'value' => ( !empty($data['url_title']) )? $data['url_title'] : '',
                            ])}}
                            {{UnitMaker::select2Multi([
                                'name' => 'amsData[local_set]',
                                'title' => '啟用語系設定',
                                'tip' => '設定該分站啟用語系。',
                                'options'=>$langArray,
                                'value' => ( !empty($data['local_set']) )? $data['local_set'] : '',
                                'disabled' => ''
                            ])}}
                            @if($configSet['reviewfunction'])
                            {{UnitMaker::select2Multi([
                                'name' => 'amsData[local_review_set]',
                                'title' => '啟用審核機制',
                                'tip' => '設定 Template 語系是否開啟審核功能。',
                                'options'=>$langArray,
                                'value' => ( !empty($data['local_review_set']) )? $data['local_review_set'] : '',
                                'disabled' => ''
                            ])}}
                            @endif

                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">最後異動時間</div>
                                </div>
                                <div class="inner">
                                    <div class="file_date">
                                        @if(isset($data['updated_at']) AND !empty($data['updated_at']))
                                        <p>{{$data['updated_at']}}</p>
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
                                    <div class="subtitle">分站建立日期</div>
                                </div>
                                <div class="inner">
                                    <div class="file_date">
                                        @if(isset($data['created_at']) AND !empty($data['created_at']))
                                        <p>{{$data['created_at']}}</p>
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
                {{-- 有開分站設定才可以刪除 --}}
                @if ( Config::get('cms.setBranchs') )
                <li class="trash delete_ams_hiddenArea">
                    <a href="javascript:void(0)" class="delete_ams_information" data-type="template-manager">
                        <span class="fa fa-trash"></span>
                        <p>DELETE</p>
                    </a>
                </li>
                @endif
                <li class="check">
                    <a href="javascript:void(0)" class="updated_ams_edit_btn" data-type="template-manager">
                        <span class="fa fa-check"></span>
                        <p>SETTING</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="backEnd_quill">
    <div class="detailEditor">
        <div class="editorBody">
            <div class="editorHeader">
                <div class="info">
                    {{-- wade:delete --}}
                    {{-- <div class="title">
                        <p>{{ $area_title }}</p>
                    </div> --}}
                    <h3>{{ $File['title'].((!empty($File['type']))?'.'.$File['type']:'') }}</h3>
                    {{-- wade:delete --}}
                    {{-- <div class="area">
                        <div class="control">
                            <ul class="btnGroup">
                                <li class="remove">
                                    <a href="javascript:;" class="close_btn">
                                        <span class="fa fa-remove"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>

                {{-- wade:add --}}
                <div class="control">
                    <ul class="btnGroup">
                         <li class="cancel">
                            <a href="javascript:;" class="close_btn">
                                <span class="fa fa-remove"></span>
                                <span class="label">Cancel</span>
                            </a>
                        </li>

                        {{-- wade:add --}}
                        <li class="trash file_edit_delete">
                            <a href="javascript:void(0)">
                                <span class="fa fa-trash"></span>
                                <span class="label">Delete</span>
                            </a>
                        </li>

                        {{-- wade:add --}}
                        <li class="check file_edit_upload">
                            <a href="javascript:void(0)">
                                <span class="fa fa-check"></span>
                                <span class="label">Save</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <input type="hidden" name="fms[edit_id]" value="0">
            <input type="hidden" name="fms[file_use_count]" value="{{$File['fms_file_use_count']}}">
            <input type="hidden" name="fms[folder_level]" value="{{$File['level']}}">
            <input type="hidden" name="fms[folder_id]" value="{{$File['folder_id']}}">
            <div class="editorContent">
                <ul class="box_block_frame frame">
                    <li class="inventory file_box fileInformation">
                        <div class="title">
                            <p class="subtitle">檔案資訊</p>
                        </div>
                        <div class="file_frame">
                            <div class="file_frame_info">
                                <div class="img_box">
                                    @php
                                    $ext = strtolower(pathinfo($File['real_m_route'],PATHINFO_EXTENSION));
                                    $filepath = $File['real_m_route'];
                                    if(in_array($ext,['pdf','doc','docx','ppt','pptx','xls','xlsx','txt','zip','rar','video','mpg','mpeg','avi','mp4','webm'])){
                                        $filepath = '/vender/assets/img/icon/'.$ext.'.png';
                                    }
                                    @endphp
                                    <img src="{{ BaseFunction::imgSrc($filepath) }}" alt="">
                                </div>
                                <div class="info_box">
                                    <p class="type">
                                        <span>{{ $file_type['title'].', '.$File['type'] }}</span>
                                        <i>|</i>
                                        <span class="number">
                                            @if($file_type['title']=='影像'){{ $File['img_w'].'x'.$File['img_h'] }},
                                            @endif{{ formatBytes($File['size']) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="toolBtn">
                                @if($area_detail!='資料夾')
                                @if($file_type['title']=='影像')
                                <span class="icon fa fa-eye  open_img_box" data-src="{{ $File['real_route'] }}"></span>
                                @endif
                                <span class="icon pg-download file_fantasy_download" data-src="{{ $File['real_route'] }}" data-title="{{ $File['title'].".".$File['type'] }}"></span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="inventory row_style fileUpload upload_box">
                        <input type="file" name="file_one" style="display:none;" class="fileInputClick_one" multiple>
                        <p class="subtitle">
                            <span class="en_title"></span> 選擇要更換的檔案
                        </p>
                        <div class="upload_frame fileUploadClick_one" ondrop="javascript: drop_image_one(event);" ondragover="javascript: dragHandler(event);">
                            <div class="upload_frame_info">
                                <div class="center_box">
                                    <span class="fa fa-cloud-upload"></span>
                                </div>
                                <div class="info_box">
                                    <p class="en">Press or Drag Files to Here</p>
                                    <p>按下按鈕或拖曳檔案到這裡</p>
                                </div>
                            </div>
                        </div>
                        <div class="tips">
                            <span class="title">TIPS</span>
                            <p>你可以選擇檔案上傳，也可以直接將檔案拖曳到區塊中 ( <span style="color:#ff0000;">拖曳功能只支援
                                    Chrome</span> )，預設的檔案上傳容量為
                                15MB，若你需要更大的上傳容量，請與開發者聯繫。</p>
                        </div>
                    </li>
                    <li class="inventory fileUpload">
                        <p class="subtitle">
                            <span class="en_title"></span> 確認檔案
                        </p>
                        <ul class="upload_list locale_file_list_one">
                            <!--待上傳列表-->
                        </ul>
                    </li>
                    <li class="inventory row_style">
                        <div class="title">
                            <p class="subtitle">檔案名稱</p>
                        </div>
                        <div class="inner">
                            <input class="normal_input" name="fms[title]" type="text" placeholder="" value="{{ $File['title']}}">
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>單行輸入，內容不支援HTML及CSS、JQ、JS等語法，特殊符號如 : @#$%?/\|*.及全形也盡量避免。</p>
                            </div>
                        </div>
                    </li>
                    <li class="inventory row_style">
                        <div class="title">
                            <p class="subtitle">檔案目錄位置</p>
                        </div>
                        <div class="inner">
                            <div class="select_Box" data-type="path">
                                <div class="select_Btn" data-id="0">
                                    <p class="title">{{$nowFolderPathText}}</p>
                                    <i class="arrow pg-arrow_down"></i>
                                </div>
                                <ul class="option_list" data-id="0" data-level="-1">
                                    @include('Fantasy.fms.folder_all_select')
                                </ul>
                            </div>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>你可以更改檔案的資料夾位置。</p>
                            </div>
                        </div>
                    </li>
                    @if(config('fms.s3_use') === false)
                    <li class="inventory row_style">
                        <p class="subtitle">下載時使用原檔名</p>
                        <p class="subtitle">檔案上傳後系統會重新編寫檔名，如 dog.png -> {{ date('YmdHi') }}abcdefg.png，若勾選下載時使用原檔名可使下載的檔案檔名同上傳時的檔名，但相對的會使用較多的伺服器資源。</p>
                        <div class="inner">
                            <div class="radio_area">
                                <div class="radio_area_content">
                                    <input id="use_origin_name" name="fms[use_origin_name]" type="hidden" value="{{ $File['use_origin_name'] ?? 0 }}">
                                    <label class="box @if($File['use_origin_name']==0) active @endif">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly">否</span>
                                        </div>
                                    </label>
                                    <label class="box @if($File['use_origin_name']==1) active @endif" data-value="1">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly">是</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    <li class="inventory row_style">
                        <div class="title">
                            <p class="subtitle">自訂網址名稱</p>
                        </div>
                        <div class="inner">
                            <div class="fms_url_name">
                                <p>{{url('download')}}/</p>
                            <input class="normal_input" name="fms[url_name]" type="text" placeholder="" value="{{ $File['url_name']}}">
                            </div>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>此網址名稱，可使用中文<br><strong style="color: red;">不可有空格、不可重複、不可使用特殊符號如「;　/　?　:　@　=　&　<　>　""　#　%　{　}　|　\　^　~　[　]　`　」</strong><br><strong style="color: red;">網址名稱不能重複，若重複檔案會抓取錯誤</strong></p>
                            </div>
                        </div>
                    </li>
                    <li class="inventory row_style">
                        <div class="title">
                            <p class="subtitle">Alt 名稱</p>
                        </div>
                        <div class="inner">
                            <input class="normal_input" name="fms[alt]" type="text" placeholder="" value="{{ $File['alt']}}">
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>單行輸入，內容不支援HTML及CSS、JQ、JS等語法，特殊符號如 : @#$%?/\|*.及全形也盡量避免。</p>
                            </div>
                        </div>
                    </li>
                    <li class="inventory row_style">
                        <div class="title">
                            <p class="subtitle">備註與說明</p>
                        </div>
                        <div class="inner">
                            <textarea name="fms[note]" id="file_outSite_textarea3" placeholder="">{{ $File['note']}}</textarea>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>僅提供後台備註與說明使用</p>
                            </div>
                        </div>
                    </li>
                    @if($File['create_id'] == $user['id'] || $user['fms_admin'] == 1)
                    <li class="inventory row_style">
                        <p class="subtitle">權限設定</p>
                        <div class="inner">
                            <div class="radio_area">
                                <div class="radio_area_content">
                                    <input id="is_private" name="fms[is_private]" type="hidden" value="{{$File['is_private'] ?? 0}}">
                                    <label class="box {{ (isset($File['is_private']) && $File['is_private']==1) ? '':'active' }}" data-value="0" data-hide="can_use">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly">公開</span>
                                        </div>
                                    </label>
                                    <label class="box {{ (isset($File['is_private']) && $File['is_private']==1) ? 'active':'' }}" data-value="1" data-hide="">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly">私人</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                    @php
                    if(isset($File['can_use'])){
                    $tempCanUse = json_decode($File['can_use']);
                    if(empty($tempCanUse)) $tempCanUse = [];
                    }
                    else $tempCanUse = [];
                    $all_owner = (isset($all_owner)) ? $all_owner : [];
                    @endphp
                    <li class="inventory row_style auth_group" @if($File['is_private']==0) style="display: none;" @endif>
                        <div class="title">
                            <p class="subtitle">使用者權限</p>
                        </div>
                        <div class="inner">
                            <select class="____select2 valid" name="fms[can_use][]" aria-invalid="false" multiple="multiple">
                                @foreach ($all_owner as $row)
                                <option value="{{ $row['id'] }}" @if(isset($File['can_use']) && in_array($row['id'],$tempCanUse )) selected @endif>
                                    {{ $row['name'] ?: $row['account'] ?: '未設定帳號名稱'}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="tips">
                            <span class="title">TIPS</span>
                            <p>你可以選擇其他使用者,賦予可使用權限</p>
                        </div>
                    </li>
                    @endif
                    <li class="inventory row_style">
                        <div class="title">
                            <p class="subtitle">最後異動時間</p>
                        </div>
                        <div class="inner">
                            <div class="file_date">
                                @if(!empty($last_edit_user))
                                <p class="name">{{$last_edit_user['name']??'N/A'}},</p>
                                <p>在 {{ date("Y 年 m 月 d 日 H : i : s", strtotime($File['updated_at'])) }} 修改過</p>
                                @else
                                <p class="name">{{$owner['name']??'N/A'}},</p>
                                <p>在 {{ date("Y 年 m 月 d 日 H : i : s", strtotime($File['updated_at'])) }} 修改過</p>
                                @endif
                            </div>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>不開放修改，由系統自行更新。</p>
                            </div>
                        </div>
                    </li>
                    <li class="inventory row_style">
                        <div class="title">
                            <p class="subtitle">建立日期</p>
                        </div>
                        <div class="inner">
                            <div class="file_date">
                                <p class="name">{{$owner['name']??'N/A'}},</p>
                                <p>在 {{ date("Y 年 m 月 d 日 H : i : s", strtotime($File['created_at'])) }} 建立</p>
                            </div>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>不開放修改，由系統自行更新。</p>
                            </div>
                        </div>
                    </li>
                    <li class="inventory row_style">
                        <div class="title">
                            <p class="subtitle">擁有者</p>
                        </div>
                        <div class="inner">
                            <div class="owner">
                                <!--32*32-->
                                <p class="name">{{$owner['name']??'N/A'}}</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!--區塊功能按鈕-->
@if($is_delete == "true")
<div class="hiddenArea_frame_controlBtn" data-delete="true">
    <ul class="btnGroup">
        <li class="check file_edit_upload">
            <a href="javascript:void(0)">
                <span class="fa fa-check"></span>
                <p>Recovery 復原</p>
            </a>
        </li>
        <li class="trash file_edit_delete">
            <a href="javascript:void(0)">
                <span class="fa fa-trash"></span>
                <p>DELETE 永久刪除</p>
            </a>
        </li>
        <li class="remove">
            <a href="javascript:void(0)" class="close_btn">
                <span class="fa fa-remove"></span>
                <p>CANCEL 取消</p>
            </a>
        </li>
    </ul>
</div>
@else
<div class="hiddenArea_frame_controlBtn" data-delete="false">
    <ul class="btnGroup">
       
 
        <li class="cancel">
            <a href="javascript:void(0)" class="close_btn">
                <span class="fa fa-remove"></span>
                <p>CANCEL</p>
            </a>
        </li>

        {{-- wade:add --}}
               <li class="trash file_edit_delete {{$File['use_auth']}}">
            <a href="javascript:void(0)">
                <span class="fa fa-trash"></span>
                <p>DELETE</p>
            </a>
        </li>

        {{-- wade:add --}}
         <li class="check file_edit_upload {{$File['use_auth']}}">
            <a href="javascript:void(0)">
                <span class="fa fa-check"></span>
                <p>SAVE</p>
            </a>
        </li>
    </ul>
</div>
@endif
</div>

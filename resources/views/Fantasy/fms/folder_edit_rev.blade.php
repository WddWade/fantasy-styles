<div class="backEnd_quill">
    <div class="detailEditor">
        <div class="editorBody">
            <div class="editorHeader">
                <div class="info">
                    {{-- wade:delete --}}
                    {{-- <div class="title">
                        <p>{{ $area_title }}</p>
                    </div> --}}
                    <h3 class="dataEditTitle">{{ $folderData['title'] }}</h3>
                    {{-- wade:delete --}}
                    {{-- <div class="area"> --}}
                        {{-- <h3>{{ $folderData['title'] }}</h3> --}}
                        {{--  --}}
                        {{-- <div class="control">
                            <ul class="btnGroup">
                                <li class="remove">
                                    <a href="javascript:;" class="close_btn">
                                        <span class="fa fa-remove"></span>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    {{-- </div> --}}
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
                         @if($folderData['id']!='0')
                        <li class="trash folder_edit_delete">
                            <a href="javascript:void(0)">
                                <span class="fa fa-trash"></span>
                                <span class="label">Delete</span>
                            </a>
                        </li>
                        @endif

                        {{-- wade:add --}}
                        <li class="check folder_edit_upload_new">
                            <a href="javascript:void(0)">
                                <span class="fa fa-check"></span>
                                <span class="label">Save</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <input type="hidden" name="fms[parent_folder_id]" value="{{ $folderData['parent_id'] }}">
            <input type="hidden" name="fms[parent_folder_level]" value="{{ $folderData['parent_level'] }}">
            <input type="hidden" name="fms[parent_branch]" value="{{ $folderData['parent_branch'] }}">
            <input type="hidden" name="fms[self_id]" value="{{ $folderData['id'] }}">

            <div class="editorContent">
                <ul class="box_block_frame frame">
                    <li class="inventory row_style">
                        <div class="title">
                            <div class="subtitle">資料夾名稱</div>
                        </div>
                        <div class="inner">
                            <input class="normal_input" name="fms[title]" type="text" placeholder="" value="{{ $folderData['title']}}">
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>單行輸入，內容不支援HTML及CSS、JQ、JS等語法，特殊符號如 : @#$%?/\|*.及全形也盡量避免。</p>
                            </div>
                        </div>
                    </li>
                    {{-- @if($File['id']=='0')  --}}
                    <li class="inventory row_style">
                        <div class="title">
                            <div class="subtitle">資料夾目錄位置</div>
                        </div>
                        <div class="inner">
                            <div class="select_Box" data-type="path">
                                <div class="select_Btn" data-id="0">
                                    <p class="title">{{ $nowFolderPathText }}</p>
                                    <i class="arrow pg-arrow_down"></i>
                                </div>

                                <ul class="option_list" data-id="0" data-level="-1">
                                    {{-- 所有資料夾 --}}
                                    @include('Fantasy.fms.folder_all_select')
                                </ul>
                            </div>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>你可以指定資料夾位置。</p>
                            </div>
                        </div>
                    </li>
                    {{-- @endif --}}
                    <li class="inventory row_style">
                        <div class="title">
                            <div class="subtitle">資料夾排序</div>
                        </div>
                        <div class="inner">
                            <input class="normal_input" name="fms[w_rank]" type="text" placeholder="" value="{{ $folderData['w_rank']}}">
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>排序數字由小至大</p>
                            </div>
                        </div>
                    </li>
                    <li class="inventory row_style">
                        <div class="subtitle">權限設定</div>
                        <div class="inner">
                            <div class="radio_area">
                                <div class="radio_area_content">
                                    <input id="is_private" name="fms[is_private]" type="hidden" value="{{$selfFolder['is_private'] ?? 0}}">
                                    <label class="box {{ (isset($selfFolder['is_private']) && $selfFolder['is_private']==1) ? '':'active' }}" data-value="0" data-hide="can_use">
                                        <div class="plan">
                                            <span class="circle"></span>
                                            <span class="yearly">公開</span>
                                        </div>
                                    </label>
                                    <label class="box {{ (isset($selfFolder['is_private']) && $selfFolder['is_private']==1) ? 'active':'' }}" data-value="1" data-hide="">
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
                    if(isset($selfFolder['can_use'])){
                    $tempCanUse = json_decode($selfFolder['can_use']);
                    if(empty($tempCanUse)) $tempCanUse = [];
                    }
                    else $tempCanUse = [];
                    $all_owner = (isset($all_owner)) ? $all_owner : [];
                    @endphp
                    <li class="inventory row_style auth_group" style="display: none;{{(isset($selfFolder['is_private']) && $selfFolder['is_private']==1) ? '':'display: none;'}}">
                        <div class="title">
                            <div class="subtitle">使用者權限</div>
                        </div>
                        <div class="inner">
                            <select class="____select2 valid" name="fms[can_use][]" aria-invalid="false" multiple="multiple">
                                @foreach ($all_owner as $row)
                                <option value="{{ $row['id'] }}" @if(isset($selfFolder['can_use']) && in_array($row['id'],$tempCanUse ) ) selected @endif>
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

                    <li class="inventory row_style">
                        <div class="title">
                            <div class="subtitle">備註與說明</div>
                        </div>
                        <div class="inner">
                            <textarea name="fms[note]" id="file_outSite_textarea3" placeholder="">{{ $folderData['note']}}</textarea>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>僅提供後台備註與說明使用</p>
                            </div>
                        </div>
                    </li>

                    @if($folderData['id']!='0')
                    <li class="inventory row_style">
                        <div class="title">
                            <div class="subtitle">最後異動時間</div>
                        </div>
                        <div class="inner">
                            <div class="file_date">
                                @if(!empty($last_edit_user))
                                <p class="name">{{$last_edit_user['name']??'N/A'}},</p>
                                <p>在 {{ date("Y 年 m 月 d 日 H : i : s", strtotime($selfFolder['updated_at'])) }} 修改過</p>
                                @else
                                <p class="name">{{$owner['name']??'N/A'}},</p>
                                <p>在 {{ date("Y 年 m 月 d 日 H : i : s", strtotime($selfFolder['updated_at'])) }} 修改過</p>
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
                            <div class="subtitle">建立日期</div>
                        </div>
                        <div class="inner">
                            <div class="file_date">
                                <p class="name">{{$owner['name']??'N/A'}},</p>
                                <p>在 {{ date("Y 年 m 月 d 日 H : i : s", strtotime($selfFolder['created_at'])) }} 建立</p>
                            </div>
                            <div class="tips">
                                <span class="title">TIPS</span>
                                <p>不開放修改，由系統自行更新。</p>
                            </div>
                        </div>
                    </li>
                    @endif

                    <li class="inventory row_style">
                        <div class="title">
                            <div class="subtitle">擁有者</div>
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
            <!--區塊功能按鈕-->
            <div class="hiddenArea_frame_controlBtn">
                <ul class="btnGroup">

                    <li class="cancel">
                        <a href="javascript:void(0)" class="close_btn">
                            <span class="fa fa-remove"></span>
                            <p>CANCEL</p>
                        </a>
                    </li>
                    @if($folderData['id']!='0')
                    <li class="trash folder_edit_delete">
                        <a href="javascript:void(0)">
                            <span class="fa fa-trash"></span>
                            <p>DELETE</p>
                        </a>
                    </li>
                    @endif
                    <li class="check folder_edit_upload_new">
                        <a href="javascript:void(0)">
                            <span class="fa fa-check"></span>
                            <p>SAVE</p>
                        </a>
                    </li>
                </ul>
            </div>            
        </div>
    </div>
</div>

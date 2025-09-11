<input name="_token" type="hidden" value="<?php echo csrf_token(); ?>">
<input name="_lang" type="hidden" value="<?php echo Config::get('app.dataBasePrefix'); ?>">
<div class="backEnd_quill">
    <div class="hiddenArea_frame">
        <div class="hiddenArea_frame_box">
            <div class="detailEditor">
                <div class="editorBody">
                    <div class="editorHeader">
                        <div class="info">
                            @if (isset($data['log_type']))
                                <h3  class="dataEditTitle">
                                    {{ $data['user_name'] . ' ' . $actions[$data['log_type']] ?? $data['log_type'] }}
                                </h3>
                            @else
                                <h3  class="dataEditTitle">Log 紀錄</h3>
                            @endif
                            {{-- <div class="title">
                                <!-- <p class="ams_type_create_zz" style="display:none;">Create CMS Template 新增功能設定</p> -->
                                <p class="ams_type_edit_zz">Log 紀錄</p>
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
                            </ul>
                        </div>
                    </div>
                    <div class="editorContent">
                        @if(count($old_data) > 0)
                       
                        @endif
                        <ul class="frame">
                            {{-- <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">紀錄時間</div>
                                </div>
                                <div class="inner">
                                    <p style="margin-top: 5px;font-size: 1rem;">{{ $data['create_time'] }}</p>
                                </div>
                            </li>
                            <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">IP位址</div>
                                </div>
                                <div class="inner">
                                    <p style="margin-top: 5px;font-size: 1rem;">{{ $data['ip'] }}</p>
                                </div>
                            </li> --}}

                            {{-- <li class="inventory">
                                <div class="title">
                                    <div class="subtitle">紅色文字為本次異動的資料</div>
                                </div>
                                 <div class="inner">
                                    <div class="tips">
                                        <span class="title">Tips</span>
                                        <p>紅色文字為本次異動的資料</p>
                                    </div>
                                 </div>
                            </li> --}}
                            @if (isset($data['id']) and !empty($data['id']))
                                <input class="supportAmsId_Input" name="log[id]" type="hidden"
                                    value="{{ $data['id'] }}">
                            @else
                                <input class="supportAmsId_Input" name="log[id]" type="hidden" value="0">
                            @endif
                            @php
                                $ChangeData = !empty($data['ChangeData']) ? json_decode($data['ChangeData'], true) : [];
                                $OldChangeData = isset($old_data['ChangeData']) ? json_decode($old_data['ChangeData'], true) : [];
                                unset($ChangeData['branch_id']);
                                unset($ChangeData['temp_url']);
                                unset($ChangeData['updated_at']);
                                unset($ChangeData['created_at']);
                                $isNew = in_array($data['log_type'], ['create', 'insert']);

                            @endphp                            
                            <li class="inventory">
                                <div class="inner">
                                    <div class="informationTable">
                                        <div class="table-header">
                                            <h2 class="table-title">紀錄時間 : {{ $data['create_time'] }}</h2>
                                            <div class="table-controllers">
                                                <button onclick="printOrder()">Export CSV</button>
                                            </div>
                                        </div>
                                        <div class="table-content">
                                            <section data-style="default-odd">
                                                <div class="section-content">
                                                    <div class="items">
                                                        <span><strong>IP位址 :</strong></span>
                                                        <span>{{ $data['ip'] }}</span>
                                                    </div>
                                                    @foreach ($ChangeData as $key => $val)
                                                        @if (!isset($OldChangeData[$key]))
                                                            <div class="items">
                                                                <span><strong>{{ $columns[$key]['Comment'] ?: $key }}：</strong></span>
                                                                <span>{{ $val ?: '-' }}</span>
                                                            </div>
                                                        @else
                                                            <div class="items">
                                                                <span style="color:#ff0000;"><strong>{{ $columns[$key]['Comment'] ?: $key }}：</strong></span>
                                                                @if($OldChangeData[$key] != $val)
                                                                <span>{{ $val ?: '-' }}</span>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="tips">
                                        <span class="title">Tips</span>
                                        <p>紅色文字為本次異動的資料</p>
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
                    <a class="close_btn close_ams_hiddenArea" href="javascript:void(0)">
                        <span class="fa fa-remove"></span>
                        <p>CANCEL</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

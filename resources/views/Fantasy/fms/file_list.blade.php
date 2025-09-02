@foreach($file as $key=> $row)
<tr class="tbody_tick fms_list fms_list_{{$row['folder_id']}} can_use @if($row['is_delete']) is_delete @endif" style="cursor: pointer;" data-folder-id="{{$row['folder_id']}}">
    <td class="w_Check">
        <div class="tableContent">
            <label class="select-item">
                <input type="checkbox" class="input_number fms_lbox_file_select_checkbox" data-use-count="{{$row['fms_file_use_count']}}" data-id="{{ $row['id'] }}" data-file-key="{{ $row['file_key']}}" data-src="{{ BaseFunction::imgSrc($row['real_route']) }}" data-title="{{ $row['title'].".".$row['type'] }}" data-type="{{ $row['type'] }}" data-key="{{ $row['file_key'] }}">
                <span class="check-circle icon-check"></span>
            </label>
        </div>
    </td>
    <td class="edit_ctrl @if(!isset($cms_open)) open_file_edit @endif" @if(isset($cms_open)) onclick="Leon_open_file_edit(this);" @endif>
        <div class="tableMaintitle">
            <div class="cms_open_file_edit file-edit" data-id="{{$row['id']}}">
                {{-- wade:delete --}}
                {{-- <span class="fa fa-pencil"></span>
                <span class="edit-txt">編輯</span> --}}

                {{-- wade:add --}}
                <span class="fa fa-pencil-square-o edit-txt"></span>
            </div>
        </div>
    </td>
    <td class="main_field tool_ctrl @if(!isset($cms_open)) open_file_edit @endif" @if(isset($cms_open)) onclick="Leon_open_file_edit(this);" @endif>
        <div class="tableMaintitle">
            @php
            $ext = strtolower(pathinfo($row['real_m_route'],PATHINFO_EXTENSION));
            $filepath = $row['real_m_route'];
            $NotImg = false;

            if(in_array($ext,['pdf','doc','docx','ppt','pptx','xls','xlsx','txt','zip','rar','video','mpg','mpeg','avi','mp4','webm'])){
            $filepath = '/vender/assets/img/icon/'.$ext.'.png';
            $NotImg = true;
            }
            @endphp
            <div class="title-img rwdhide">
                <img @if(!$NotImg) class="open_img_box" @endif src="{{ BaseFunction::imgSrc($filepath) }}" data-src="{{ BaseFunction::imgSrc($filepath) }}" alt="" loading="lazy">
            </div>
            <span class="title-name bold">{{ $row['title'] }}.{{ $row['type'] }}</span>
            {{-- <div class="cms_open_file_edit file-edit" data-id="{{$row['id']}}">
                <span class="fa fa-pencil"></span>
                <span class="edit-txt">編輯</span>
            </div> --}}
        </div>
    </td>
    <td class="order_field">
        <div class="tableContent"><a class="fileUse" data-key="{{$row['file_key']}}">{{$row['fms_file_use_count']}}</a></div>
    </td>
    <td class="format_field">
        <div class="tableContent">{{ $row['type'] }}</div>
    </td>
    {{-- wade:delete --}}
    {{-- <td class="type_field">
        <div class="tableContent">檔案</div>
    </td> --}}
    <td class="size_field">
        <div class="tableContent">{{ formatBytes($row['size']) }}</div>
    </td>
    <td class="dimension_field">
        <div class="tableContent">
            {{ (!empty($row['img_w'])) ? $row['img_w'] .' x '.$row['img_h'] : '' }}
        </div>
    </td>
    <td class="last_modified_field">
        <div class="tableContent">{{ $row['updated_at'] }}</div>
    </td>
    <td class="owner_field">
        <div class="tableContent">{{ isset($row['create_user']) ? $row['create_user']['name'] : 'N/A' }} </div>
    </td>
</tr>
@endforeach

@foreach($data as $key => $row)
<tr>
    <td class="edit_ctrl">
        <div class="edit-icon edit_ams_wrapper" data-type="template-setting" data-id="{{ $row['id'] }}">
            <span class="fa fa-pencil-square-o edit-txt"></span>
        </div>
    </td>                                            
    <td class="ams_site_status">
        <div class="tableContent">{{ ($row['is_active'] == 1) ? '啟用' : '未啟用' }}</div>
    </td>                                            
    <td class="ams_site_name">
        <div class="tableContent">
            {{ collect($branch_options)->where('key',$row['origin_id'])->first()['title'] ?? '-' }}-{{ collect($locale_options)->where('key',$row['locale'])->first()['title'] ?? '-' }}
        </div>
    </td>
    <td class="ams_site_name">
        <div class="tableContent">
            {{ $row['unit_set_path'] }}
        </div>
    </td>
    <td class="w_Update ams_updated">
        <div class="tableContent">{{ $row['updated_at'] }}</div>
    </td>
</tr>
@endforeach
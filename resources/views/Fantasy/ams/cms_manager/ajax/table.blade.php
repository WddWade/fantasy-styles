@foreach($data as $key => $row)
<tr>
    <td class="edit_ctrl">
        <div class="edit-icon edit_ams_wrapper" data-type="cms-manager" data-id="{{ $row['id'] }}">
            <span class="fa fa-pencil-square-o edit-txt"></span>
        </div>
    </td>                                                         
    <td class="ams_status">
        <div class="tableContent">{{ $row['is_active'] == 1 ? '啟用' : '未啟用' }}</div>
    </td>                                                    
    <td class="ams_account">
        <div class="tableMaintitle">
            @if (!empty($row['UsersData']['_photo_image']))
            <div class="title-img rwdhide">
                <img src="{{ $row['UsersData']['_photo_image']['real_route'] }}">
            </div>
            @endif
            <span class="title-name">{{ $row['UsersData']['name'] }}</span>
        </div>
    </td>
    <td class="ams_site">
        <div class="tableContent">
            {{ collect($branch_unit_options)->where('key', $row['branch_unit_id'])->first()['branch'] ?? '-' }}-{{ collect($branch_unit_options)->where('key', $row['branch_unit_id'])->first()['locale'] ?? '-' }}
        </div>
    </td>
    <td class="ams_updated">
        <div class="tableContent">{{ $row['updated_at'] }}</div>
    </td>
</tr>
@endforeach
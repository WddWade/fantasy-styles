@foreach($data as $key => $row)
<tr>
    <td class="edit_ctrl">
        <div class="edit-icon edit_ams_wrapper" data-type="ams-manager" data-id="{{ $row['id'] }}">
            <span class="fa fa-pencil-square-o edit-txt"></span>
        </div>
    </td>                                          
    <td class="ams_status w_Preview">
        <div class="tableContent">{{ ($row['is_active'] == 1) ? '啟用' : '未啟用' }}</div>
    </td>                                            
    <td class="ams_account">
        <div class="tableMaintitle">
            @if(!empty($row['UsersData']['_photo_image']))
            <div class="title-img rwdhide">
                <img src="{{$row['UsersData']['_photo_image']['real_route']}}">
            </div>
            @endif
            <span class="title-name">{{ $row['UsersData']['name'] }}</span>
        </div>
    </td>
    <td class="ams_permission_level">
        <div class="tableContent">{{ $row['role_identity'] ?: '-'}}</div>
    </td>
    <td class="ams_permission">
        <div class="tableContent">{{ $row['role_group'] ?: '-'}}</div>
    </td>
    <td class="ams_updated">
        <div class="tableContent">{{ $row['updated_at'] }}</div>
    </td>
</tr>
@endforeach

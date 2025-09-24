@foreach($data as $key => $row)
<tr>
    <td class="edit_ctrl">
        <div class="edit-icon edit_ams_wrapper" data-type="fantasy-account" data-id="{{ $row['id'] }}">
            <span class="fa fa-pencil-square-o edit-txt"></span>
        </div>
    </td>
    <td class="ams_status w_Preview">
        <div class="tableContent">{{ ($row['is_active'] == 1) ? '啟用' : '未啟用' }}</div>
    </td>
    <td class="ams_account">
        <div class="tableMaintitle">
            @if(!empty($row['_photo_image']))
            <div class="title-img rwdhide">
                <img src="{{$row['_photo_image']['real_route']}}">
            </div>
            @endif
            <span class="title-name">{{$row['account']}}</span>
        </div>
    </td>
    <td class="ams_name">
        <div class="tableContent">{{$row['name'] ?: '-'}}</div>
    </td>
    <td class="ams_mail">
        <div class="tableContent">{{$row['mail'] ?: ''}}</div>
    </td>
    <td class="ams_updated">
        <div class="tableContent">{{$row['updated_at'] }}</div>
    </td>
</tr>
@endforeach
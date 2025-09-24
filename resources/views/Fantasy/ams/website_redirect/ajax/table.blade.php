@foreach($data as $key => $row)
<tr>
    <td class="edit_ctrl">
        <div class="edit-icon edit_ams_wrapper" data-type="autoredirect" data-id="{{ $row['id'] }}">
            <span class="fa fa-pencil-square-o edit-txt"></span>
        </div>
    </td>                                             
    <td class="ams_status">
        <div class="tableMaintitle open_builder">
            <span class="title-name open_builder">啟用</span>
        </div>
    </td>
    <td class="ams_type w_Preview">
        <div class="tableContent">{{ ($row['active301'] == 1) ? '301' : '302' }}</div>
    </td>        
    <td class="ams_old_address ">
        <div class="tableMaintitle open_builder">
            <span class="title-name open_builder">{{ $row['old_url'] }}</span>
        </div>
    </td>
    <td class="ams_new_address">
        <div class="tableMaintitle open_builder">
            <span class="title-name open_builder">{{ $row['new_url'] }}</span>
        </div>
    </td>
    <td class="ams_updated w_Preview">
        <div class="tableContent">{{\Carbon\Carbon::parse($row['updated_at'])->format('Y-m-d H:i:s')}}</div>
    </td>
</tr>
@endforeach
@foreach($data as $key => $row)
<tr>
    <td class="edit_ctrl">
        <div class="edit-icon edit_ams_wrapper" data-type="log" data-id="{{ $row['id'] }}" data-ym="{{ $ShowTime }}">
            <span class="fa fa-pencil-square-o edit-txt"></span>
        </div>
    </td>   
    
    <td class="ams_account">
        <div class="tableMaintitle">
            <span class="title-name">{{ $row['user_name'] }}</span>
        </div>
    </td>
    <td class="ams_log_action">
        <div class="tableMaintitle">
            <span class="title-name">{{ $actions[$row['log_type']] }}</span>
        </div>
    </td>                                                    
    <td class="ams_log_unit">
        <div class="tableMaintitle">
            <span class="title-name"> {{ $DB_Names[$row['table_name']] ?? $tables[$row['table_name']]->Comment ?? $row['table_name'] }}</span>
        </div>
    </td>
    <td class="ams_log_ip">
        <div class="tableMaintitle">
            <span class="title-name">{{ $row['ip'] }}</span>
        </div>
    </td>
    <td class="ams_log_date">
            <div class="tableMaintitle">
            <span class="title-name">{{ $row['create_time'] }}</span>
        </div>
    </td>                                                    
</tr>
@endforeach
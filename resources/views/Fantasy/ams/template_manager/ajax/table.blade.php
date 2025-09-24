@foreach($data as $key => $row)
<tr>
    <td class="edit_ctrl">
        <div class="edit-icon edit_ams_wrapper" data-type="template-manager" data-id="{{ $row['id'] }}">
            <span class="fa fa-pencil-square-o edit-txt"></span>
        </div>
    </td>                                       
    <td class="ams_site_status w_Preview">
        <div class="tableContent">{{ ($row['is_active'] == 1) ? '啟用' : '未啟用' }}</div>
    </td>
    <td class="ams_site_name">
        <div class="tableContent">
            {{ $row['title'] ?: '-' }} / {{ $row['en_title'] ?: '-' }}
        </div>
    </td>
    <th class="ams_site_language">
        <div class="fake-th">
            <span class="" data-column="account">{{$row['local_set_path']}}</span>
        </div>
    </th>
    <th class="ams_site_language">
        <div class="fake-th">
            <span class="" data-column="account">{{$row['local_review_set_path']}}</span>
        </div>
    </th>
    <td class="ams_site_address">
        <div class="tableContent">{{ $row['url_title'] ?: '-' }}</div>
    </td>
    <td class="ams_updated open_builder">
        <div class="tableContent">{{ $row['updated_at'] }}</div>
    </td>
</tr>
@endforeach
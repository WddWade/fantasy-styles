@if(isset($folderAll))
@if(!isset($loop))
<li class="option" data-id="0" data-path="根目錄/" data-level="-1" data-branch="1">
	<p class="title">根目錄</p>
	@foreach($folderAll as $key => $row)
	@if(isset($json_folder))
	@if(!in_array($row['id'],$json_folder) && $row['is_delete'] == 0)
<li class="option" data-id="{{ $row['id'] }}" data-path="根目錄/{{$row['title']}}" data-parent-id="{{ $row['parent_id'] }}" data-level="{{ $row['self_level'] }}" data-branch="{{ $row['branch_id'] }}">
	<p class="title">{{ $row['title'] }}@if(count($row['son_folder_withSession']) > 0)<span class="arrow"></span>@endif</p>
	@if(count($row['son_folder_withSession']) > 0)
	<ul class="option_list" data-id="{{ $row['id'] }}" data-parent-id="{{ $row['parent_id'] }}" data-level="{{ $row['self_level'] }}" data-branch="{{ $row['branch_id'] }}" style="display: none;">
		@include('Fantasy.fms.folder_all_select',['folderAll'=>$row['son_folder_withSession'],'json_folder'=>$json_folder,'loop'=>1,'path'=>'根目錄/'.$row['title']])
	</ul>
	@endif
</li>
@endif
@else
@if($row['is_delete'] == 0)
<li class="option" data-id="{{ $row['id'] }}" data-path="根目錄/{{$row['title']}}" data-parent-id="{{ $row['parent_id'] }}" data-level="{{ $row['self_level'] }}" data-branch="{{ $row['branch_id'] }}">
	<p class="title">{{ $row['title'] }}@if(count($row['son_folder_withSession']) > 0)<span class="arrow"></span>@endif</p>
	@if(count($row['son_folder_withSession']) > 0)
	<ul class="option_list" data-id="{{ $row['id'] }}" data-parent-id="{{ $row['parent_id'] }}" data-level="{{ $row['self_level'] }}" data-branch="{{ $row['branch_id'] }}" style="display: none;">
		@include('Fantasy.fms.folder_all_select',['folderAll'=>$row['son_folder_withSession'],'loop'=>1,'path'=>'根目錄/'.$row['title']])
	</ul>
	@endif
</li>
@endif
@endif
@endforeach
</li>
@else
@foreach($folderAll as $key => $row)
@if(isset($json_folder))
@if(!in_array($row['id'],$json_folder) && $row['is_delete'] == 0)
<li class="option" data-id="{{ $row['id'] }}" data-path="{{$path.'/'.$row['title']}}" data-parent-id="{{ $row['parent_id'] }}" data-level="{{ $row['self_level'] }}" data-branch="{{ $row['branch_id'] }}">
	<p class="title">{{ $row['title'] }}@if(count($row['son_folder_withSession']) > 0)<span class="arrow"></span>@endif</p>
	@if(count($row['son_folder_withSession']) > 0)
	<ul class="option_list" data-id="{{ $row['id'] }}" data-parent-id="{{ $row['parent_id'] }}" data-level="{{ $row['self_level'] }}" data-branch="{{ $row['branch_id'] }}" style="display: none;">
		@include('Fantasy.fms.folder_all_select',['folderAll'=>$row['son_folder_withSession'],'json_folder'=>$json_folder,'loop'=>1,'path'=>$path.'/'.$row['title']])
	</ul>
	@endif
</li>
@endif
@else
@if($row['is_delete'] == 0)
<li class="option" data-id="{{ $row['id'] }}" data-path="{{$path.'/'.$row['title']}}" data-parent-id="{{ $row['parent_id'] }}" data-level="{{ $row['self_level'] }}" data-branch="{{ $row['branch_id'] }}">
	<p class="title">{{ $row['title'] }}@if(count($row['son_folder_withSession']) > 0)<span class="arrow"></span>@endif</p>
	@if(count($row['son_folder_withSession']) > 0)
	<ul class="option_list" data-id="{{ $row['id'] }}" data-parent-id="{{ $row['parent_id'] }}" data-level="{{ $row['self_level'] }}" data-branch="{{ $row['branch_id'] }}" style="display: none;">
		@include('Fantasy.fms.folder_all_select',['folderAll'=>$row['son_folder_withSession'],'loop'=>1,'path'=>$path.'/'.$row['title']])
	</ul>
	@endif
</li>
@endif
@endif
@endforeach
@endif

@endif

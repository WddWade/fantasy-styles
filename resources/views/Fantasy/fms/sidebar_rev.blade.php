<div class="sidebar-menu">
    <!--語系-->
    <ul class="head-bar">
        <li class="level-1">
            <!---->
            <div class="display-title">
                <div class="title">
                    <span class="title_block">FMS</span>
                    <span>檔案管理</span>
                </div>
                {{-- <span class="arrow"></span> --}}
            </div>
            <!--==============================-->
        </li>
    </ul>
    <!--列表list-->
    <div class="body-list content-scrollbox">
        {{-- 資料夾樹 --}}

        {{-- wade:add --}}
        <div class="menu-block">
            <div class="menu-block-title">Controls</div>
            <div class="menu-block-content">
                <div class="fms_controls">
                    <a href="javascript:;" class="fms_bulider_upload" data-model="All_colunm">
                        <span class="fms-upload"></span>
                        <span class="text">上傳檔案</span>
                    </a>
                    <a href="javascript:;" class="fms_bulider_new" id="leon-cms-delete-list" data-model="All_colunm">
                        <span class="fms-folder-add"></span>
                        <span class="text">新增資料夾</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- wade:add --}}
        <div class="menu-block">
            <div class="menu-block-title">Folders</div>
            <div class="menu-block-content">
                @include('Fantasy.fms.son_folder_rev',['for_son_folder'=>$folderAll,'firstTime'=>1])
            </div>
        </div>

        {{-- wade:add --}}
        <div class="menu-block">
            <div class="menu-block-title">Others</div>
            <div class="menu-block-content">
                <div class="fms_controls">
                    <div class="fms_trash tree-title trash" data-folder-id="">
                        <span class="fms-delete"></span>
                        <span class="title">垃圾桶</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- wade:delete --}}
    {{-- <div class="clearfix"></div> --}}
</div>
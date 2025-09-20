<!--語系-->
@php
    $index = 0;
@endphp
<ul class="head-bar">
    <li class="level-1">
        <!---->
        <div class="display-title">
            <div class="title">
                <span class="title_block">AMS</span>
                <span>帳號與設定</span>
            </div>
        </div>
        <!---->
    </li>
</ul>
<!--列表list-->
<div class="body-list ams-list-doyouwanttobeagoodman">

    <div class="menu-block">
        <div class="menu-block-title">Account</div>
        <ul class="menu-block-content">
            @if ($amsRoleArray['is_fantasy'] == '1')
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/fantasy-account') }}" class="level-1-link">
                        <span class="title">帳號管理</span>
                    </a>
                </li>
            @endif
            @if ($amsRoleArray['is_ams'] == '1')
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/ams-manager') }}" class="level-1-link">
                        <span class="title">權限設定</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
   

    {{-- <li class="level-1 level_list" style="display:none;">
    <a href="javascript:;" class="level-1-link">
      <span class="icon">01.</span>
      <span class="title">CMS 權限管理</span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <li class="level-2 level_list">
        <a href="javascript:;">
          <span class="icon">01.</span>
          <span class="title">Cover Page 權限管理</span>
        </a>
      </li>
      <li class="level-2 level_list">
        <a href="javascript:;">
          <span class="icon">01.</span>
          <span class="title">Template 權限管理</span>
        </a>
      </li>
    </ul>
    </li> --}}

    {{-- 只有Leon帳號有權限開分站語系 ?? basic_ams_role => is_cover_page --}}
    
    {{-- wade:add --}}
    <div class="menu-block">
        <div class="menu-block-title">Sites</div>
        <ul class="menu-block-content">
            @if ($amsRoleArray['is_cover_page'] == '1')
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/template-manager') }}" class="level-1-link">
                        <span class="title">分站管理</span>
                    </a>
                </li>
            @endif
            @if ($amsRoleArray['is_cms_template'] == '1')
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/template-setting') }}" class="level-1-link">
                        <span class="title">分站單元設定</span>
                    </a>
                </li>
            @endif
            @if ($amsRoleArray['is_cms_template_ma'] == '1')
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/cms-manager') }}" class="level-1-link">
                        <span class="title">分站管理權限設定</span>
                    </a>
                </li>
            @endif
            @if ($amsRoleArray['is_cms_template_setting'] == '100')
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/crs-template') }}" class="level-1-link">
                        <span class="title">分站帳號權限管理</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>    

    {{-- <li class="level-1 level_list" style="display:none;">
    <a href="javascript:;" class="level-1-link">
      <span class="icon">01.</span>
      <span class="title">Cover Page 功能設定</span>
    </a>
    </li> --}}

    {{-- @if ($amsRoleArray['is_crs_role'] == '1' && $configSet['setBranchs']) --}}
    {{-- <li class="level-1 level_list">
      <a href="{{ url('Fantasy/Ams/cms-overview') }}" class="level-1-link">
  <span class="icon">01.</span>
  <span class="title">Cover Page 權限管理</span>
  </a>
  </li> --}}
    {{-- @endif --}}
    {{-- @if ($amsRoleArray['is_overview_crs'] == '10' && $configSet['isReview'])
  <li class="level-1 level_list">
    <a href="{{ url('Fantasy/Ams/crs-overview') }}" class="level-1-link">
      <span class="icon">01.</span>
      <span class="title">Cover Page Review 權限管理</span>
    </a>
  </li>
  @endif --}}

    {{-- <li class="level-1 level_list" style="display:none;">
    <a href="javascript:;" class="level-1-link">
      <span class="icon">01.</span>
      <span class="title">FMS 管理與設定</span>
    </a>
    </li> --}}

    {{-- <li class="level-1 level_list" style="display:none;">
    <a href="javascript:;" class="level-1-link">
      <span class="icon">01.</span>
      <span class="title">Message 權限管理</span>
    </a>
    </li> --}}

    {{-- <li class="level-1 level_list" style="display:none;">
    <a href="javascript:;" class="level-1-link">
      <span class="icon">01.</span>
      <span class="title">Analytics-Website 權限管理</span>
    </a>
    </li> --}}

    {{-- <li class="level-1 level_list" style="display:none;">
    <a href="javascript:;" class="level-1-link">
      <span class="icon">01.</span>
      <span class="title">Analytics-Google 權限管理</span>
    </a>
    </li> --}}
 
    {{-- wade:add --}}
    <div class="menu-block">
        <div class="menu-block-title">Settings</div>
        <ul class="menu-block-content">
            @if ($amsRoleArray['is_folder'] == '1' && 0)
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/fms-folder') }}" class="level-1-link">
                        <span class="title">檔案目錄管理</span>
                    </a>
                </li>
            @endif
            @if ($amsRoleArray['is_autoredirect'] == '1')
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/autoredirect') }}" class="level-1-link">
                        <span class="title">網址導向設定</span>
                    </a>
                </li>
            @endif
            @if ($amsRoleArray['is_log'] == '1')
                <li class="level-1 level_list">
                    <a href="{{ url('Fantasy/Ams/log') }}" class="level-1-link">
                        <span class="title">Log紀錄</span>
                    </a>
                </li>
            @endif
            <li class="level-1 level_list" style="display:none;">
                <a href="javascript:;" class="level-1-link">
                    <span class="title">系統設定</span>
                </a>
            </li>
        </ul>
    </div>    



</div>
<div class="clearfix"></div>

<input class="base-url-cms" type="hidden" value="{{ BaseFunction::cms_url('/') }}">

<!--分站/語系 head-bar-->
{{-- wade:add --}}
<div class="site-head">
    <div class="sites dropdown">
        <div class="current-site" data-toggle="dropdown">
            <span >CMS</span>
            <p>{{ $branchMenuList['now'] }}</p>
        </div>
        <div class="sites-list dropdown-menu">
            @foreach ($branchMenuList['list'] as $key => $row)
                <div class="dropdown-item">
                    <a href="" data-site="{{$row['en_title']}}">
                        <span class="iconSquare"></span>
                        <span>{{$row['title']}}</span>
                    </a>            
                </div>
            @endforeach
        </div>
    </div>
    <div class="languages dropdown">
        <div class="current-language" data-toggle="dropdown">
            <div class="language-title">繁體中文語系</div>
            <span class="icon-open-menu"></span>
        </div>
        <div class="languages-list dropdown-menu">
            @foreach ($branchMenuList['list'] as $key => $row)
                @foreach ($row['list'] as $key2 => $row2)
                   <div class="dropdown-item" data-site="{{$row['en_title']}}">
                        <a href="{{ $row2['link'] }}">
                            <span class="iconSquare"></span>
                            <span class="title">{{ $row2['title'] }}</span>
                        </a>
                   </div>
                @endforeach          
            @endforeach
        </div>
    </div>
</div>
{{-- wade:delete --}}
{{-- <ul class="head-bar" style="display:none">
    <li class="level-1">
        <a class="display-title" href="javascript:;">
            <div class="title">
                <span class="title_block">CMS</span>
                <span class="title_site">{{ $branchMenuList['now'] }}</span>
                <span class="title_language">{{$branchMenuList['now_locale']}}</span>
            </div>
            <span class="icon-open-menu"></span>
        </a>

        <ul class="sub-menu">
            @foreach ($branchMenuList['list'] as $key => $row)
                @if (empty($row['list']))
                    @php
                        $link_arr = [];
                        if (isset($firstId)) {
                            $link_arr[] = $firstId;
                        }
                        if (isset($pageId)) {
                            $link_arr[] = $pageId;
                        }
                    @endphp
                    <li class="lng level-2">
                        <a class="title-box" href="{{ $row['link'] . '/' . implode('/', $link_arr) }}">
                            @if($branchMenuList['now_locale_prefix']==$row['locale'])
                                <i class="fa fa-dot-circle-o _off"></i>
                            @else
                                <i class="fa fa-circle-o _off"></i>
                            @endif
                            <span class="title">{{ $row['title'] }}</span>
                        </a>
                    </li>
                @else
                    <li class="level-2">
                        <a class="title-box" href="{{ $row['link'] }}">
                            @if($branchMenuList['now_locale_prefix']==$row['locale'])
                                <i class="fa fa-dot-circle-o _off"></i>
                            @else
                                <i class="fa fa-circle-o _off"></i>
                            @endif
                            <span class="title">{{ $row['title'] }}</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($row['list'] as $key2 => $row2)
                                <li class="level-3">
                                    <a href="{{ $row2['link'] }}">
                                        <span class="iconSquare"></span>
                                        <span class="title">{{ $row2['title'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>
</ul> --}}
<!--分站/語系 head-bar-->

<!--CMS主選項-->
{{-- wade:add --}}
<div class="body-list">
    {{-- wade:add --}}
    <div class="menu-block">
        {{-- wade:add --}}
        <div class="menu-block-title">Blockname</div>
        {{-- wade:add --}}
        <ul class="menu-block-content">
        @foreach ($cmsMenuList as $key => $row)
            <li class="level-1 level_list" data-route="{{ $row['link'] }}">
                {{-- wade:add --}}
                <a class="level-1-link" href="javascript:;">
                    {{-- wade:delete --}}
                    {{-- <span class="icon">{{ sprintf('%02d', $key + 1) }}.</span> --}}
                    <span class="title">{{ $row['title'] }}</span>
                    @if (isset($row['list']) and !empty($row['list']))
                        <span class="arrow {{ $row['active'] }}"></span>
                        {{-- <!--<span class="tip">{{$row['DataCount']}}</span>--> --}}
                    @endif
                </a>
                @if (isset($row['list']) and !empty($row['list']))
                    <ul class="sub-menu" @if (!empty($row['active'])) style="display:block;" @endif>
                        @foreach ($row['list'] as $key2 => $row2)
                            <li class="level-2 level_list" data-route="{{ $row2['link'] }}">
                                {{-- wade:add --}}
                                <a class="level-2-link" href="javascript:;">
                                    <span class="iconSquare"></span>
                                    <span class="title">{{ $row2['title'] }}</span>
                                    @if (isset($row2['list']) and !empty($row2['list']))
                                        <span class="arrow {{ $row2['active'] }}"></span>
                                    @endif
                                    {{-- <!--<span class="tip">{{$row2['DataCount']}}</span>--> --}}
                                </a>
                                @if (isset($row2['list']) and !empty($row2['list']))
                                    <ul class="sub-menu" @if (!empty($row2['active'])) style="display:block;" @endif>
                                        @foreach ($row2['list'] as $key3 => $row3)
                                            {{-- wade:add --}}
                                            <li class="level-3 level_list"
                                                data-route="{{ $row3['link'] }}">
                                                <a class="level-3-link" href="javascript:;">
                                                    <span class="iconSquare"></span>
                                                    <span class="title">{{ $row3['title'] }}</span>
                                                    {{-- <!--<span class="tip">{{$row3['DataCount']}}</span>--> --}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        </ul>
    </div>
</div>
<!--CMS主選項-->

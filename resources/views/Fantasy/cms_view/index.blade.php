@extends('Fantasy.template')

@section('bodySetting', 'cms_page')

@section('css')

@stop

    @section('css_back')

    @stop

        @section('content')

        <!-- 左邊滑動的 sidebar -->
        @include('Fantasy.includes.sidebar')
        <!-- 左邊滑動的 sidebar -->


        <!-- 中間主區塊 -->
        <div class="page-container extract-block">

            <!-- 最上面的 header bar -->
            @include('Fantasy.includes.header')
            <!-- 最上面的 header bar -->

            <div class="mainContent full-height">
                <div class="content full-height">
                    <!-- 左邊 SECONDARY SIDEBAR MENU-->
                    {{-- wade:delete --}}
                    {{-- <nav class="content-sidebar">

                        <div class="sidebar-menu">

                            @include('Fantasy.cms_view.includes.list')

                            <div class="clearfix"></div>
                        </div>

                    </nav> --}}
                    <!-- 左邊 SECONDARY SIDEBAR MENU -->
                    <div class="inner-content">
                        {{-- wade:delete --}}
                        {{-- <div class="jumbotron">
                            <div class="container-fluid">
                                <div class="inner">
                                    <div class="inner-left">
                                        <div class="switch-menu">
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="scroll-wrapper content-scrollbox" style="position: relative;">
                            <div class="content-scrollbox scroll-content" style="height: 877px; margin-bottom: 0px; margin-right: 0px; max-height: none;">
                                <div class="content-wrap main-table index-table-div" data-tableid="new_cms_table">

                                    {{-- wade:add --}}
                                    <div class="cms_index">
                                        <div class="main_title">CMS : Hi, WDD</div>
                                        <div class="main_content">
                                            <div class="subs_table">
                                                <div class="thead">
                                                    <div>sites Overview</div>
                                                    <p>
                                                        <span>1 Main-Site</span>
                                                        <span>5 Subs-Sites</span>
                                                    </p>
                                                </div>
                                                <div class="tbody">
                                                    @foreach($branchMenuList['list'] as $key => $row)
                                                        <section>
                                                            <div class="site_content">
                                                                <div class="site_sort">{{ sprintf('%02d', $key + 1) }}.</div>
                                                                {{-- site_type: main-site | sub-site | event-site --}}
                                                                <div class="site_type">event-site</div>
                                                                <div class="site_name">
                                                                    <div class="title">
                                                                        <span>{{ $row['en_title'] }}</span>
                                                                        <p>{{ $row['title'] }}</p>
                                                                    </div>
                                                                    @if($row['blade_template'] == 1)
                                                                        <a target="_blank" href="{{preg_replace('/^(https?:\/\/)([^.]+)(\..+)$/', '$1' . $row['url_title'] . '$3', url(''))}}">{{preg_replace('/^(https?:\/\/)([^.]+)(\..+)$/', '$1' . $row['url_title'] . '$3', url(''))}}</a>
                                                                    @else
                                                                        <a target="_blank" href="{{url($row['url_title'])}}">{{url($row['url_title'])}}</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="site_language">
                                                                <div class="language_content">
                                                                    <div class="languages dropup">
                                                                        <a class="" data-toggle="dropdown" href="javascript:void(0)" aria-haspopup="true" aria-expanded="false">
                                                                            <span class="text">Select Language</span>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                                                                             @foreach($row['list'] as $key2 => $row2)
                                                                                <a class="dropdown-item" href="{{ $row2['link'] }}">
                                                                                    <span>ZH-TW</span>
                                                                                    <p>{{ $row2['title'] }}</p>
                                                                                </a>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main_footer">
                                            <div>
                                                <span>Fantasy © WADE DIGITAL DESIGN, LTD.</span>
                                                <span>Designed & Developed by WDD</span>
                                            </div>
                                            <div>FANTASY VERSION 2.0</div>
                                        </div>
                                    </div>

                                    {{-- wade:add --}}
                                    {{-- <div class="content-head cms-index_table" data-can_review="1" data-edit="1" data-delete="1" data-create="1" data-model="Class_faq" data-page="1" data-pn="1" data-auth="206" data-pagetitle="常見問題分類" data-issearch="1" data-isbatch="1" data-isclone="1" data-isexport="">
                                        <h1>品牌總覽</h1>
                                    </div>
                                    <div class="content-body">
                                        <div class="branch_wrapper">
                                            @foreach($branchMenuList['list'] as $key => $row)
                                                <div class="branch_area">
                                                    <div class="branch_header">
                                                        <div class="branch_title">{{ $row['title'] }}</div>
                                                        <div class="branch_title">{{ $row['en_title'] }}</div>
                                                        @if($row['blade_template'] == 1)
                                                            <div class="branch_title">
                                                                <a target="_blank" href="{{preg_replace('/^(https?:\/\/)([^.]+)(\..+)$/', '$1' . $row['url_title'] . '$3', url(''))}}">{{preg_replace('/^(https?:\/\/)([^.]+)(\..+)$/', '$1' . $row['url_title'] . '$3', url(''))}}</a>
                                                            </div>
                                                        @else
                                                            <div class="branch_title">
                                                                <a target="_blank" href="{{url($row['url_title'])}}">{{url($row['url_title'])}}</a>
                                                            </div>
                                                        @endif
                                                        <div class="branch_lang">
                                                            @foreach($row['list'] as $key2 => $row2)
                                                                <div>
                                                                    <a href="{{ $row2['link'] }}">{{ $row2['title'] }}</a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 右邊 PAGE CONTENT -->
                </div>
            </div>
            <!-- 內容 CONTENT -->
        </div>
        <!-- 中間主區塊 -->

        @section('script')
        <script type="text/javascript" src="{{ asset('/vender/backend/js/cms/cms.js') }}"></script>
        @stop

            @section('script_back')

            @stop
                @stop

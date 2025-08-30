@extends('Fantasy.template')

@section('bodySetting', 'fixed-header cms_theme uiv2')

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
                                    <div class="content-head cms-index_table" data-can_review="1" data-edit="1" data-delete="1" data-create="1" data-model="Class_faq" data-page="1" data-pn="1" data-auth="206" data-pagetitle="常見問題分類" data-issearch="1" data-isbatch="1" data-isclone="1" data-isexport="">
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
                                                    <div class="branch_title"><a target="_blank" href="{{preg_replace('/^(https?:\/\/)([^.]+)(\..+)$/', '$1' . $row['url_title'] . '$3', url(''))}}">{{preg_replace('/^(https?:\/\/)([^.]+)(\..+)$/', '$1' . $row['url_title'] . '$3', url(''))}}</a></div>
                                                    @else
                                                    <div class="branch_title"><a target="_blank" href="{{url($row['url_title'])}}">{{url($row['url_title'])}}</a></div>
                                                    @endif
                                                        </div>
                                                <div class="branch_lang">
                                                            @foreach($row['list'] as $key2 => $row2)
                                                    <div><a href="{{ $row2['link'] }}">{{ $row2['title'] }}</a></div>
                                                            @endforeach
                                                        </div>
                                            </div>
                                                @endforeach
                                        </div>

                                    </div>
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

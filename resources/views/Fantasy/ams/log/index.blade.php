@extends('Fantasy.template')
@section('bodySetting', 'ams_page')
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
                <nav class="content-sidebar">
                    <div class="sidebar-menu">
                        @include('Fantasy.ams.includes.sidebar')
                    </div>
                </nav>
                <!-- 左邊 SECONDARY SIDEBAR MENU -->
                <div class="inner-content" style="">
                    <!-- 上面區塊 (佈告欄)-->
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
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="{{ url('Fantasy/Ams') }}">AMS Overview 資訊總覽</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Log 紀錄</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="total">
                                    <p>
                                        <span class="text">Total Data</span>
                                        <span class="num">{{ count($data) }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="content-scrollbox" style="position: relative;">
                        <div class="content-wrap main-table index-table-div" data-tableid="new_cms_table">
                            {{-- <div class="content-head cms-index_table" data-edit="1" data-delete="1" data-create="1" data-model="" data-page="1" data-pn="1" data-auth="0" data-pagetitle="Log 紀錄"> --}}
                            <div class="content-head" data-edit="1" data-delete="1" data-create="1" data-model="" data-page="1" data-pn="1" data-auth="0" data-pagetitle="Log 紀錄">

                                {{-- wade:add --}}
                                <div class="content-head-container">
                                    <div class="content-title">
                                        <div class="switch-menu navigation-toggle">
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                        </div>
                                        <h1>Log 紀錄 : {{ $ShowTime }}</h1>
                                    </div>
                                    <div class="content-nav">
                                        {{-- wade:add --}}
                                        <div class="btn-item dropdown btn-role">
                                            <a class="" data-toggle="dropdown" href="javascript:void(0)" aria-haspopup="true" aria-expanded="true">
                                                <span class="text">2024</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                                                <a class="dropdown-item ExportBtnCheck" href="javascript:void(0)" title="下載勾選項目"">１月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">2月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">3月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">4月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">5月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">6月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">7月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">8月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">9月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">１0月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">１1月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">１2月</a>
                                                <a class="clearfix bg-master-lighter dropdown-item" href="javascript:void(0)">
                                                    <span class="pull-left">關閉選單</span>
                                                    <span class="pull-right"><i class="pg-power"></i></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="btn-item dropdown btn-role">
                                            <a class="" data-toggle="dropdown" href="javascript:void(0)" aria-haspopup="true" aria-expanded="true">
                                                <span class="text">2023</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                                                <a class="dropdown-item ExportBtnCheck" href="javascript:void(0)" title="下載勾選項目"">１月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">2月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">3月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">4月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">5月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">6月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">7月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">8月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">9月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">１0月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">１1月</a>
                                                <a class="dropdown-item ExportBtnSrh" data-href="javascript:;" href="javascript:void(0)" title="目前篩選資料">１2月</a>
                                                <a class="clearfix bg-master-lighter dropdown-item" href="javascript:void(0)">
                                                    <span class="pull-left">關閉選單</span>
                                                    <span class="pull-right"><i class="pg-power"></i></span>
                                                </a>
                                            </div>
                                        </div>

                                        {{-- wade:delete --}}
                                        {{-- <div class="btn-item">
                                            @foreach ($M_list as $val)
                                            <a href="/Fantasy/Ams/log?date={{ $val }}"
                                                style="margin-right: 15px;">{{ $val }}</a>
                                            @endforeach
                                        </div> --}}
                                </div>

                                {{-- wade"delete --}}
                                {{-- <h1>{{ $ShowTime }} - Log 紀錄</h1>
                                <div class="content-nav">
                                    <div class="navleft">
                                        @foreach ($M_list as $val)
                                            <a href="/Fantasy/Ams/log?date={{ $val }}"
                                                style="margin-right: 15px;">{{ $val }}</a>
                                        @endforeach
                                    </div>
                                </div> --}}

                            </div>
                            <div class="content-body">
                                <div class="datatable">
                                    <table class="log_table">
                                        <thead>
                                            <tr>
                                                <th style="width:170px;">時間</th>
                                                <th style="width:170px;">使用者</th>
                                                <th>單元</th>
                                                <th style="width:170px;">動作</th>
                                                <th style="width:170px;">IP位址</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $row)
                                                <tr class="edit_ams_wrapper" data-type="log" data-id="{{ $row['id'] }}" data-ym="{{ $ShowTime }}">
                                                    <td>{{ $row['create_time'] }}</td>
                                                    <td>{{ $row['user_name'] }}</td>
                                                    <td>{{ $DB_Names[$row['table_name']] ?? $tables[$row['table_name']]->Comment ?? $row['table_name'] }}</td>
                                                    <td>{{ $actions[$row['log_type']] }}</td>
                                                    <td>{{ $row['ip'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <article class="hiddenArea ams_hiddenArea amsDetailAjaxArea ">
        <div class="hiddenArea_frame ajaxItem ams">
            <!--AMS 編輯管理權限-->
            <form class="ajaxContainer" id="ams_edit_form" action="">
            </form>
        </div>
    </article>
@section('script')
@stop
@section('script_back')
    <script type="text/javascript" src="/vender/backend/js/ams/ams.js"></script>
    <script type="text/javascript" src="/vender/backend/js/cms/cms_unit.js"></script>
@stop
@stop

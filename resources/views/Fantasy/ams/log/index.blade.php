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
                                        @foreach($groupedByYear as $Year => $month)
                                        <div class="btn-item dropdown btn-role">
                                            <a class="" data-toggle="dropdown" href="javascript:void(0)" aria-haspopup="true" aria-expanded="true">
                                                <span class="text">{{$Year}}</span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                                                @foreach($month as $val)
                                                <a class="dropdown-item ExportBtnCheck" href="/Fantasy/Ams/log?date={{ $Year.$val }}" title="下載勾選項目">{{$val}}月</a>
                                                @endforeach
                                                <a class="clearfix bg-master-lighter dropdown-item" href="javascript:void(0)">
                                                    <span class="pull-left">關閉選單</span>
                                                    <span class="pull-right"><i class="pg-power"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        {{-- wade:delete --}}
                                        {{-- <div class="btn-item">
                                            @foreach ($M_list as $val)
                                            <a href="/Fantasy/Ams/log?date={{ $val }}"
                                                style="margin-right: 15px;">{{ $val }}</a>
                                            @endforeach
                                        </div> --}}
                                    </div>
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
                                    <table class="tables">
                                        <thead>
                                            <tr>
                                                <th class="edit_ctrl">
                                                    <div class="fake-th ">
                                                        <span class="sort theadSortBtn" data-column="99" data-sort="0">Edit</span>
                                                    </div>
                                                </th>                                                
                                                <th class="ams_account">
                                                      <div class="fake-th ">
                                                        <span>使用者</span>
                                                    </div>
                                                </th>
                                                <th class="ams_log_action">
                                                    <div class="fake-th ">
                                                        <span>動作</span>
                                                    </div>
                                                </th>                                                
                                                <th class="ams_log_unit">
                                                    <div class="fake-th ">
                                                        <span>單元</span>
                                                    </div>
                                                </th>

                                                <th class="ams_log_ip">
                                                    <div class="fake-th ">
                                                        <span>IP位址</span>
                                                    </div>
                                                </th>
                                                <th class="ams_log_date">
                                                    <div class="fake-th ">
                                                        <span>時間</span>
                                                    </div>
                                                </th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $row)
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

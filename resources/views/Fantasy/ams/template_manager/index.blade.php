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
                                            <a href="{{url('Fantasy/Ams')}}">AMS Overview 資訊總覽</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">分站管理</li>
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
                        {{-- <div class="content-head cms-index_table" data-edit="1" data-delete="1" data-create="1" data-model="" data-page="1" data-pn="1" data-auth="0" data-pagetitle="Cover Page 權限管理"> --}}
                        <div class="content-head" data-edit="1" data-delete="1" data-create="1" data-model="" data-page="1" data-pn="1" data-auth="0" data-pagetitle="Cover Page 權限管理">
                            {{-- wade:add --}}
                            <div class="content-head-container">
                                <div class="content-title">
                                    <div class="switch-menu navigation-toggle">
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                    </div>
                                    <h1>分站管理</h1>
                                </div>
                                <div class="content-nav">
                                    {{-- 有開分站設定才可以新增 --}}
                                    @if ( Config::get('cms.setBranchs') )
                                        <div class="btn-item">
                                            <a href="javascript:void(0)" class="create_ams_wrapper" data-type="template-manager" data-id="0">
                                                <span class="icon-add"></span>
                                                <span class="text">新增分站</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- wade:delete --}}
                            {{-- <h1>分站管理</h1> --}}
                            {{-- <div class="content-nav"> --}}
                                {{-- <div class="navleft"> --}}
                                    {{-- 有開分站設定才可以新增 --}}
                                    {{-- @if ( Config::get('cms.setBranchs') )
                                    <div class="btn-item">
                                        <a href="javascript:void(0)" class="create_ams_wrapper" data-type="template-manager" data-id="0">
                                            <span class="icon-add"></span>
                                            <span class="text">ADD DATA 新增</span>
                                        </a>
                                    </div>
                                    @endif
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
                                            <th class="ams_site_status w_Preview">
                                                <div class="fake-th ">
                                                    <span class="" data-column="is_active">狀態</span>
                                                </div>
                                            </th>                                            
                                            <th class="ams_site_name">
                                                <div class="fake-th">
                                                    <span class="" data-column="account">分站名稱</span>
                                                </div>
                                            </th>
                                            <th class="ams_site_language">
                                                <div class="fake-th">
                                                    <span class="" data-column="account">啟用語系</span>
                                                </div>
                                            </th>
                                            <th class="ams_site_language">
                                                <div class="fake-th">
                                                    <span class="" data-column="account">啟用審核</span>
                                                </div>
                                            </th>
                                            <th class="ams_site_address">
                                                <div class="fake-th ">
                                                    <span class="" data-column="mail">分站網址名稱</span>
                                                </div>
                                            </th>
                                            <th class="ams_updated">
                                                <div class="fake-th ">
                                                    <span class="" data-column="updated_at">最後異動時間</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="ams_tbody" data-type="template-manager">
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
<article class="ams_hiddenArea hiddenArea amsDetailAjaxArea ">
    <div class="hiddenArea_frame ajaxItem ams">
        <!--AMS 編輯管理權限-->
        <form class="ajaxContainer" action="" id="ams_edit_form">
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
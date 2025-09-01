@extends('Fantasy.template')
@section('bodySetting', 'uiv2 ams_theme')
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
                <div class="jumbotron">
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
                                        <li class="breadcrumb-item active" aria-current="page">CMS Template 分館資料設定</li>
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
                </div>

                <div class="content-scrollbox" style="position: relative;">
                    <div class="content-wrap main-table index-table-div" data-tableid="new_cms_table">
                        <div class="content-head cms-index_table" data-edit="1" data-delete="1" data-create="1" data-model="" data-page="1" data-pn="1" data-auth="0" data-pagetitle="Cover Page 權限管理">
                            <h1>CMS Template 分館資料設定</h1>
                            <div class="content-nav">
                                <div class="navleft">

                                </div>
                            </div>
                        </div>
                        <div class="content-body">
                            <div class="datatable">
                                <table class="tables">
                                    <thead>
                                        <tr>
                                            <th class="w_TableMaintitle">
                                                <div class="fake-thead fake-thead-ams">
                                                    <div class="fake-th first">
                                                    </div>
                                                </div>
                                                <div class="fake-th ">
                                                    <span class="" data-column="account">分館</span>
                                                </div>
                                            </th>
                                            <th class="w_Category w180">
                                                <div class="fake-th ">
                                                    <span class="" data-column="name">語系</span>
                                                </div>
                                            </th>
                                            <th class="text-center w_Preview">
                                                <div class="fake-th ">
                                                    <span class="" data-column="is_active">狀態</span>
                                                </div>
                                            </th>
                                            <th class="w_Update">
                                                <div class="fake-th ">
                                                    <span class="" data-column="updated_at">最後異動時間</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="ams_tbody" data-type="template-setting">
                                        @foreach($data as $key => $row)
                                        <tr>
                                            <td class="w_TableMaintitle edit_ams_wrapper" data-type="template-setting" data-id="{{ $row['id'] }}">
                                                <div class="tableContent">
                                                    {{ collect($branch_options)->where('key',$row['origin_id'])->first()['title'] ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="w_Category w180 edit_ams_wrapper" data-type="template-setting" data-id="{{ $row['id'] }}">
                                                <div class="tableContent">
                                                    {{ collect($locale_options)->where('key',$row['locale'])->first()['title'] ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="text-center w_Preview edit_ams_wrapper" data-type="template-setting" data-id="{{ $row['id'] }}">
                                                <div class="tableContent">{{ ($row['is_active'] == 1) ? '啟用' : '未啟用' }}</div>
                                            </td>
                                            <td class="w_Update open_builder" data-type="template-setting" data-id="{{ $row['id'] }}">
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
    <div class="hiddenArea_frame ajaxItem ams ">
        <!--AMS 編輯管理權限-->
        <form class="ajaxContainer ams_manager" action="" id="ams_edit_form">
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
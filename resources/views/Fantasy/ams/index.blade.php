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
            <div class="inner-content" style="background-image:url(); background-size:cover;">
                <div class="scroll-wrapper content-scrollbox" style="position: relative;">
                    <div class="content-scrollbox scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 953px;">
                        <div class="content-wrap">
                            <div class="ams_index">
                                <div class="main_title">AMS</div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                            <a href="javascript:void(0);">AMS Overview 資訊總覽</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@section('script')
@stop
@section('script_back')
<script type="text/javascript" src="/vender/backend/js/ams/ams.js"></script>
@stop
@stop
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
                    <div class="inner-content">

                        <div class="scroll-wrapper content-scrollbox" style="position: relative;">
                            <div class="content-scrollbox scroll-content" style="height: 877px; margin-bottom: 0px; margin-right: 0px; max-height: none;">
                                <div class="content-wrap main-table index-table-div" data-tableid="new_cms_table">

                                    {{-- wade:add --}}
                                    <div class="fantasy_index">
                                        <div class="main_title">Hi, {{$user['name']}}</div>
                                        <div class="main_content">
                                            <div class="content_left">
                                                <div class="cms_sitename">
                                                    <span>CMS:</span>
                                                    <p>創意電子科技官方網站</p>
                                                </div>
                                                <div class="cms_language">
                                                    <a href="">
                                                        <span>ZH-TW</span>
                                                        <p>繁體中文語系</p>
                                                    </a>
                                                    <a href="">
                                                        <span>ZH-TW</span>
                                                        <p>繁體中文語系</p>
                                                    </a>
                                                    <a href="">
                                                        <span>ZH-TW</span>
                                                        <p>繁體中文語系</p>
                                                    </a>
                                                    <a href="">
                                                        <span>ZH-TW</span>
                                                        <p>繁體中文語系</p>
                                                    </a>
                                                    <a href="">
                                                        <span>ZH-TW</span>
                                                        <p>繁體中文語系</p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="content_right">
                                                <div class="fms">
                                                    <a href="{{ url('Fantasy/Fms') }}">FMS</a>
                                                    <p>Online File Manager</p>
                                                </div>
                                                <div class="ams">
                                                    <a href="{{ url('Fantasy/Ams') }}">AMS</a>
                                                    <p>Account and Settings</p>
                                                </div>
                                                 <div class="preview">
                                                    <a href="{{ BaseFunction::preview_url('') }}" target="_blank" class="previewButton" data-toggle="tooltip" data-placement="bottom" data-original-title="前往預覽未正式發佈的網站內容">PREVIEW</a>
                                                    <p>Preview Your Website</p>
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
                                        <h1>登入首頁</h1>
                                    </div>
                                    <div class="content-body">
                                        <?php
                                            $photo = BaseFunction::RealFiles($FantasyUser['photo_image']);
                                            $realphoto = !empty($photo) ? $photo : asset('/vender/assets/img/profiles/wdd.jpg');
                                        ?>
                                        <img src="{{ $realphoto }}" alt="" data-src="{{ $realphoto }}" data-src-retina="{{ $realphoto }}" width="32" height="32">
               
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

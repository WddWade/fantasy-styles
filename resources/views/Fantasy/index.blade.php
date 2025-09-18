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
                                            <div>
                                                <a href="{{ url('Fantasy/Cms') }}">CMS</a>
                                                <p>Content Management</p>
                                            </div>
                                            <div>
                                                <a href="{{ url('Fantasy/Fms') }}">FMS</a>
                                                <p>Online File Manager</p>
                                            </div>
                                            <div>
                                                <a href="{{ url('Fantasy/Ams') }}">AMS</a>
                                                <p>Account and Settings</p>
                                            </div>
                                            <div>
                                                <a href="{{ BaseFunction::preview_url('') }}" target="_blank" class="previewButton" data-toggle="tooltip" data-placement="bottom" data-original-title="前往預覽未正式發佈的網站內容">PREVIEW</a>
                                                <p>Preview Your Website</p>
                                            </div>
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

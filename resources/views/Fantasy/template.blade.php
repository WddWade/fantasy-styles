<!DOCTYPE html>
<html>

<head>
    <meta name="robots" content="noindex">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Fantasy - {{ $unitTitle }}</title>
    <!--============  Meta宣告  ============-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="apple-touch-icon" href="{{ asset('/vender/pages/ico/60.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/vender/pages/ico/76.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/vender/pages/ico/120.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/vender/pages/ico/152.png') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/vender/assets/img/Fantasy-icon.svg') }}" />
    <!--============  引入外掛css  ============-->
    <link href="{{ asset('/vender/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/vender/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/vender/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/vender/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('/vender/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('/vender/assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <!--模仿ios開關按鈕-->
    {{-- <link href="{{ asset('/vender/assets/plugins/summernote/summernote.css') }}" rel="stylesheet" type="text/css"
    media="screen" /> --}}
    <link href="{{ asset('/vender/assets/plugins/bootstrap-datepicker1.9/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('/vender/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('/vender/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="/vender/pages/css/pages-icons.css" rel="stylesheet" type="text/css" />
    <link class="main-stylesheet" href="/vender/pages/css/pages.css" rel="stylesheet" type="text/css" />
    <!--datatable-->
    <link type="text/css" rel="stylesheet" href="{{ asset('/vender/assets/plugins/jquery-datatable/media/css/jquery.dataTables.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/vender/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" />
    <link media="screen" type="text/css" rel="stylesheet" href="{{ asset('/vender/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" />
    <!--color-picker(2018/4/3 引入)-->
    <link type="text/css" rel="stylesheet" href="{{ asset('/vender/assets/js/spectrum/spectrum.css') }}" />
    <!--icomoon(2019/7/25 引入) -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/vender/assets/font/icomoon/style.css') }}" />

    {{-- 資料夾樹 --}}
    <link href="{{ asset('/vender/assets/css/tree/jquerysctipttop.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vender/assets/css/tree/quicksand.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vender/assets/css/tree/filetree.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+TC:wght@100..900&family=Noto+Serif+TC:wght@200..900&display=swap" rel="stylesheet">    {{-- 資料夾樹 end --}}
    <link rel="stylesheet" href="{{ asset('dist-summernote/css/summernote/summernote-lite.min.css') }}" attr="attr" />
    <link rel="stylesheet" href="{{ asset('dist-summernote/icon/style.css') }}" attr="attr" />
    <link rel="stylesheet" href="{{ asset('dist-summernote/css/editor.css') }}" attr="attr" />
    <link rel="stylesheet" href="{{ asset('/vender/assets/font/fmsIcon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/vender/assets/css/custom_aggrid.css') }}">
    <!--============  引入FantasyAllcss  ============-->
    <link href="https://cdn.jsdelivr.net/npm/swiper@11.1.15/swiper-bundle.min.css" rel="stylesheet">
    <!--============  頁面JS  ============-->
    <script type="text/javascript">
        window.onload = function() {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML +=
                "<link rel=\"stylesheet\" type=\"text/css\" href=\"{{ asset('/vender/pages/css/windows.chrome.fix.css') }}\" />";
        }
    </script>
    <!-- 非共用的Css -->
    @yield('css')
    <!-- 非共用的Css(絕對後面那種) -->
    @yield('css_back')
    <link rel="stylesheet" type="text/css" href="{{ asset('/vender/assets/css/cmsArticle.css?v=').BaseFunction::getV() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/vender/assets/css/FantasyAllcss.css?v=') . BaseFunction::getV() }}" />
</head>

<body class="@yield('bodySetting') {{$routeNode}}">
    <!--阻擋視窗 想要阻擋視窗出現 就在 block_out 後面再加ㄧ個 show-->
    <div id="temp_div_blockout" class="block_out" style="background-color: rgba(255, 255, 255, 0.3); user-select: none;">
        <div class="box" style="background-color: rgba(0, 0, 0, 0)">
            <div class="progress-circle-indeterminate"></div>
        </div>
    </div>
    <!-- 乾淨der網址 -->
    <input type="hidden" class="base-url-plus" value="{{ url('/') }}">
    <input type="hidden" class="base-location" value="{{ $locale }}">
    <input type="hidden" class="base-url" value="{{ BaseFunction::f_url('/') }}">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" class="_token">
    <input id="folder_id" value="0" type="hidden">
    @yield('content')
    @include('Fantasy.load.file_upload')
    <div id="errorMeg" class="">
        <div class="errorMeg_header"><strong>ERROR 錯誤提醒 | 點擊項目可自動轉跳</strong><span class="fa fa-remove"></span></div>
        <div class="errorMeg_list">

        </div>
    </div>
    <div class="login_modal wddLoginMain">
        <input type="hidden" class="publickey" value="{{ config('rsa.publickey') }}">
        <article class="login_sec">
            <div class="title">
                <div class="fantasylogo">
                    FANTASY<span class="fantasyver">v2.1.8</span>
                </div>
            </div>
            <h2>目前系統已被登出，請重新登入繼續操作</h2>
            <div id="accountForm">
                <div class="frame">
                    <div class="input_box">
                        <input type="text" placeholder="Account" class="accountInput" name="account">
                    </div>
                    <div class="input_box">
                        <input type="password" placeholder="Password" class="passwordInput" name="password">
                    </div>
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </div>
            <button class="login_btn loginBtn" type="submit">Sign in</button>
            <div class="forwho">{{config('cms.ProjectName')}}</br>All Rights Reserved.<span>Fantasy By WDD</span></div>
        </article>
    </div>
    <article class="article_lbox">
        <div class="article_container">
            <div class="article_container_scroll">
            @foreach (config('article') as $val)
                <div class="article_item" data-key="{{ $val['key'] }}">
                    <div class="article_sub">
                        <img src="/vender/assets/img/article4/{{ $val['key'] }}.jpg">
                        <p>{{ $val['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </article>
    <article class="coordinate_lbox">
        <div class="coordinate_container">
            <div class="coordinate_img">
                <div id="pinContainer" class="coordinate_pin">
                    <img id="pinImage" src="/vender/assets/img/pin.svg">
                </div>
                <img id="mainImage" src="/vender/assets/img/global_map_1400x720.png">
            </div>
        </div>
        <div class="coordinate_btn">
            <span class="coordinate_size" data-action="add">圖片放大</span>
            <span class="coordinate_size" data-action="reset">大小重置</span>
            <span class="coordinate_set">確認選擇位置</span>
        </div>
    </article>
    {{-- cms上傳視窗 --}}
    <article class="hiddenArea fms_lbox lbox_frame fmsAjaxArea">
        <div class="ajaxItem fms">
            <div class="ajaxContainer fms_container open">
                <div class="detailEditor">
                    <div class="frame editorBody">
                    </div>
                </div>
            </div>
        </div>
    </article>
    {{-- ams選帳號視窗 --}}
    <article class="ams_lbox lbox_frame">
        <div class="frame">
        </div>
    </article>
    <article id="fantasy_alert_box" class="submit_lbox lbox_frame" style="z-index:13;">
        <div class="frame">
            <div class="message">
                <div class="topBar"></div>
                <div class="content">
                    <i class="fa fa-remove closeBtn"></i>
                    <div class="logoImg">
                        <!--<img src="{{ asset('vender/assets/img/Main-Icon.jpg') }}" alt="logo" class="brand">-->
                        <h2>fantasy</h2>
                    </div>
                    <hr>
                    <h3></h3>
                    <p></p>
                    <hr>
                    <div class="buttonBox">
                        <button type="button" class="checkBtn success" style="text-align: center">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <article id="fantasy_confirm_box" class="submit_lbox lbox_frame">
        <div class="frame">
            <div class="message">
                <div class="topBar"></div>
                <div class="content">
                    <i class="fa fa-remove closeBtn"></i>
                    <div class="logoImg">
                        <!--<img src="{{ asset('vender/assets/img/Main-Icon.jpg') }}" alt="logo" class="brand">-->
                        <h2>fantasy</h2>
                    </div>
                    <hr>
                    <h3></h3>
                    <p></p>
                    <hr>
                    <div class="buttonBox">
                        <button type="button" class="checkBtn success" style="text-align: center">
                            <i class="fa fa-check"></i> CONFIRM
                        </button>
                        <button type="button" class="checkBtn null" style="text-align: center">
                            <i class="fa fa-remove"></i> CANCEL
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!--JS-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/pace/pace.min.js') }}"></script>
    <!--載入進度條插件-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery/jquery-3.4.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/modernizr.custom.js') }}"></script>
    <!--判斷各類型瀏覽器對CSS3某些屬性的支不支持-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/tether/js/tether.min.js') }}"></script>
    <!---->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery/jquery-easy.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}"></script>
    <!--lazy load img-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
    <!--一個即使物件display:none 也還是可以抓到寬高的插件-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!--scroll bar-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!--下拉選單-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/classie/classie.js') }}"></script>
    <!--也是下拉選單-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/switchery/js/switchery.min.js') }}"></script>
    <!--模仿ios開關按鈕-->
    <!--bootstrap-editors文字編輯器-->
    {{-- <script type="text/javascript" src="{{ asset('/vender/assets/plugins/summernote/summernote.min.js') }}"></script>
    --}}
    <!--editors文字編輯器-->
    <script src="{{ asset('dist-summernote/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('dist-summernote/js/summernote/summernote-zh-TW.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}">
    </script>
    <!--input裡有tag的插件-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/bootstrap-daterangepicker/zh-tw.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/bootstrap-datepicker1.9/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/bootstrap-datepicker1.9/js/locales/bootstrap-datepicker.zh-TW.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('/vender/pages/js/pages.js') }}"></script> --}}
    <!--模板(template)js-->
    <!--============  引入JS  ============-->
    <!--datatable-->
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-datatable/extensions/FixedColumns/js/dataTables.fixedColumns.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/plugins/jquery-datatable/extensions/FixedHeader/js/dataTables.fixedHeader.min.js') }}"></script>
    <!--table-->
    {{-- <script type="text/javascript" src="{{ asset('/vender/backend/js/tables.js') }}"></script>疑似未使用#HondaDebug --}}
    <!--color-picker(2018/4/3 引入)-->
    <script type="text/javascript" src="{{ asset('/vender/assets/js/spectrum/spectrum.js') }}"></script>
    <!--==========  引入JS End  ==========-->
    <!--QuillCircleProgram.js(2018/5/14 引入)-->
    <script type="text/javascript" src="{{ asset('/vender/backend/js/QuillCircleProgram/QuillCircleProgram.js') }}">
    </script>{{-- 僅在上傳檔案時fms有使用#HondaDebug --}}
    <script type="text/javascript" src="{{ asset('/vender/backend/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/backend/js/js_builder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/assets/js/fantasy_main_leon.js?v=') . BaseFunction::getV() }}"></script>
    <!--==========  後端用JS  ==========-->

    <script type="text/javascript" src="/vender/backend/js/cms/cms_backend.js?v={{ BaseFunction::getV() }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11.1.15/swiper-bundle.min.js"></script>
    <!--Leon(2019/10/18 引入)-->
    <script type="text/javascript" src="{{ asset('/vender/backend/js/jquery.serializejson.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/backend/js/fms/file_upload.js') }}"></script>
    <script type="text/javascript" src="/vender/backend/js/cms/verify.js?v={{ BaseFunction::getV() }}"></script>
    <script type="text/javascript" src="{{ asset('/vender/backend/js/fms/dropzone.min.js') }}"></script>
    <script src="/vender/backend/js/jsencrypt.min.js"></script>
    {{-- 資料夾樹 --}}
    <script src="{{ asset('/vender/backend/js/tree/filetree.js') }}"></script>
    {{-- 資料夾樹 end --}}

    {{-- <!-- OpenCC 繁轉簡 https://cdn.jsdelivr.net/npm/opencc-js@1.0.5/dist/umd/t2cn.js --> --}}
    <script src="{{ asset('/vender/backend/js/t2cn.js') }}"></script>

    {{-- 非共用的JS區塊 --}}
    @yield('script')
    {{-- <script type="text/javascript" src="{{ asset('/vender/backend/js/fms/fms.js') }}"></script>
    只需要grid_mode()和table_view_mode()兩個功能#Honda --}}
    {{-- 非共用的JS區塊(更後面) --}}
    @yield('script_back')
    {{-- 表單驗證 --}}
    {{-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.1/jquery.validate.js"></script> --}}
    {{-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.1/localization/messages_zh_tw.js"></script> --}}

    {{-- jspreadsheet --}}
    <script src="/vender/jspreadsheet/index.min.js?v={{ BaseFunction::getV() }}"></script>
    <script src="/vender/jspreadsheet/jsuites.min.js?v={{ BaseFunction::getV() }}"></script>
    <link rel="stylesheet" href="/vender/jspreadsheet/jspreadsheet.min.css?v={{ BaseFunction::getV() }}" type="text/css" />
    <link rel="stylesheet" href="/vender/jspreadsheet/jsuites.min.css?v={{ BaseFunction::getV() }}" type="text/css" />
    <link rel="stylesheet" href="/vender/jspreadsheet/custom.css" type="text/css" />
</body>

</html>
<script>
    function change_tag_date() {
        let _star = $("#tag_star_date").val().replace(/\//g, '-');
        let _end = $("#tag_end_date").val().replace(/\//g, '-');
        location.href = "//" + location.host + location.pathname + "?star_date=" + _star + "&end_date=" + _end;
    }
    /**
     *
     * 若原本阻擋視窗是關閉，則開啟阻擋視窗，反之則關閉阻擋視窗
     *
     */
    function temp_loading() {
        $('#temp_div_blockout').toggleClass('show');
    }
    /**
     * 開啟alert
     * @augments
     * content(array) { 'title': 訊息視窗標題, 'msg': 訊息內容 }
     * btn_setting(array) { 'confirm': 按下確認要執行的功能, 'confirm_txt': 確認鈕文字 }
     * */
    function temp_alert_box(content, btn_setting) {
        $('#fantasy_alert_box').addClass('open');
        $('#fantasy_alert_box h3').text(content['title']);
        $('#fantasy_alert_box p').text(content['msg']);
        $('#fantasy_alert_box button.checkBtn.success').html(btn_setting['confirm_txt'] != undefined ? btn_setting['confirm_txt'] : 'OK');
        $('#fantasy_alert_box button.checkBtn.success').off('click').click(function() {
            if (btn_setting['confirm'] != undefined) btn_setting['confirm']();
            $('#fantasy_alert_box').removeClass('open');
        });
    }
    /**
     * 開啟confirm
     * @augments
     * content(array) { 'title': 訊息視窗標題, 'msg': 訊息內容 }
     * btn_setting(array) { 'confirm': 按下確認要執行的功能,  'confirm_txt': 確認鈕文字, 'cancel': 按下取消要執行的功能, 'cancel_txt': 取消鈕文字 }
     * */
    function temp_confirm_box(content, btn_setting) {
        $('#fantasy_confirm_box').addClass('open');
        $('#fantasy_confirm_box h3').text(content['title']);
        $('#fantasy_confirm_box p').text(content['msg']);
        $('#fantasy_confirm_box button.checkBtn.success').html('<i class="fa fa-check"></i>' + (btn_setting['confirm_txt'] != undefined ? btn_setting['confirm_txt'] : 'CONFIRM'));
        $('#fantasy_confirm_box button.checkBtn.null').html('<i class="fa fa-remove"></i>' + (btn_setting['cancel_txt'] != undefined ? btn_setting['cancel_txt'] : 'CANCEL'));
        $('#fantasy_confirm_box button.checkBtn.success').off('click').click(function() {
            if (btn_setting['confirm'] != undefined) btn_setting['confirm']();
            $('#fantasy_confirm_box').removeClass('open');
        });
        $('#fantasy_confirm_box button.checkBtn.null').off('click').click(function() {
            if (btn_setting['cancel'] != undefined) btn_setting['cancel']();
            $('#fantasy_confirm_box').removeClass('open');
        });
    }
    //全選事件
    $(document).on('click', '.__multiple2all', function() {
        var all = $(this).closest('div').find('select option').map(function(val, index) {
            return $(index).val();
        }).get();

        var select = $(this).closest('div').find('select');

        select.val(all);
        select.trigger('change');
    })
    $(document).on('click', '.__multiple2all_close', function() {
        var select = $(this).closest('div').find('select');
        select.val('');
        select.trigger('change');
    });
</script>

@if (config('cms.setT2CN'))
    <script>
        // 引入opencc-t2cn版（繁轉簡,header加上https://cdn.jsdelivr.net/）
        $(function() {
            // 設置 MutationObserver 來監聽 DOM 變化 (解決點選新增段落編輯)
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    mutation.addedNodes.forEach(function(node) {
                        // 檢查新增的節點是否是元素節點
                        if (node.nodeType === 1) {
                            convertTextNodes(node);
                        }
                    });
                });
            });

            // 配置 Observer 監聽的選項
            const config = {
                childList: true, // 監聽子元素的新增或刪除
                subtree: true // 監聽整個 DOM 樹
            };

            // 開始監聽 document.body 來捕捉所有變化
            observer.observe(document.body, config);

            // 使用 OpenCC 庫創建一個轉換器實例
            const converter = OpenCC.Converter({
                from: 'tw',
                to: 'cn'
            });
            // 初始加載時繁轉簡
            convertTextNodes(document.body);

            function convertTextNodes(element) {
                // 非公版，針對各專案的aggrid動態添加
                if (element.id === 'productSpecificationGrid' || $(element).closest('#productSpecificationGrid')
                    .length > 0) return;

                //  排除不轉簡體的部分
                if (element.classList) {
                    //closest解決內層的被轉簡體
                    if (element.classList.contains('note-editable') ||
                        $(element).closest('.note-editable').length > 0) return; //編輯框
                    if (element.classList.contains('dataEditTitle')) return; //編輯頁最上面標題
                    if (element.classList.contains('ag-cell-wrapper')) return; //表格cell
                    if (element.classList.contains('AutoSet_title')) return; //AutoSet
                    if (element.classList.contains('AutoSet_article_dec')) return; //AutoSet（編輯器圖片）

                    // FMS
                    if (element.classList.contains('tool_ctrl')) return; // FMS表格檔案名稱
                    if (element.classList.contains('tool_ctrl') && !element.classList.contains('fms_folder_back'))
                        return; // FMS表格檔案名稱
                    if (element.classList.contains('select_folder_name')) return; // FMS上方檔案名稱
                    if (element.classList.contains('folder-tree')) return; //FMS左邊
                    if (element.classList.contains('list_title')) return; //FMS上傳完成檔案名
                    if (element.classList.contains('select_Btn')) return; //FMS新增檔案的預設選項
                    if (element.closest('.option_list')) return; //FMS新增檔案的下拉選項
                    if (element.classList.contains('breadcrumb-item')) {
                        // 排除FMS的麵包屑（因為是自定義名稱）
                        if ($(element).closest('.fileUpload').length > 0 ||
                            $(element).closest('.files-breadcrumb').length > 0) {
                            return;
                        }
                    }
                    if (element.classList.contains('select2-selection__rendered')) return; //選項框
                    // 目前下拉選單select2沒有成功轉換
                    // if (element.closest('.select2-hidden-accessible')) {
                    //     console.log('00', element.classList.contains('select2-hidden-accessible'));
                    //     return; //選項框
                    // }

                    // AMS
                    if (element.classList.contains('open_builder')) return; // AMS帳號管理的帳號
                    if ($(element).attr('data-type') == 'fantasy-account' && $(element).closest('.w_Category')
                        .length > 0) return; // AMS帳號管理的姓名
                    const editorHeader = element.closest('.editorHeader')
                    if (editorHeader) {
                        if (editorHeader.querySelector('.ams_type_edit_zz') && element.closest('.area')) {
                            return; // AMS權限管理點帳號編輯的帳號名稱
                        }
                    }
                    if ($(element).hasClass('tableMaintitle')) return // AMS權限管理的表格帳號名稱

                }
                // 排除所有 input 和 textarea 元素
                if (element.nodeName === 'INPUT' || element.nodeName === 'TEXTAREA') return;

                // 遍歷所有子元素
                element.childNodes.forEach(function(node) {
                    if (node.nodeType === 3) { // 這是文本節點
                        const traditionalText = node.nodeValue;
                        // 將文本轉換為簡體
                        const simplifiedText = converter(traditionalText); // 使用 OpenCC 轉換
                        node.nodeValue = simplifiedText; // 更新文本內容
                    } else if (node.nodeType === 1) { // 如果是元素節點，繼續遞歸遍歷
                        convertTextNodes(node);
                    }
                });
            }

            $(document).ajaxComplete(function(event, xhr, settings) {
                const url = settings.url;
                //  檢查 URL 是否包含 'auth/status'，如果包含則直接跳過
                if (url.includes('auth/status')) {
                    return;
                }
                setTimeout(() => {
                    convertTextNodes(document.body);
                }, 400); // 看資料量調整
            });
        })
    </script>
@endif

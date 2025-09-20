<div class="page-container extract-block">
    @include('Fantasy.includes.header')
    <div class="mainContent full-height">
        <div class="content full-height">
            <nav class="content-sidebar">
                <div class="sidebar-menu">
                    @include('Fantasy.cms_view.includes.list')
                    <div class="clearfix"></div>
                </div>
            </nav>
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
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb"></ol>
                                </nav>
                            </div>
                            <div class="total"></div>
                        </div>
                    </div>
                </div> --}}
                <div class="content-scrollbox">
                    @if(isset($branchData) && isset($branchMenuList))
                    <div class="cms_site_index">
                        <div class="site_name">{{$branchData['title']}}</div>
                        <div class="site_name_en">{{$branchData['en_title']}}</div>
                        <div class="site_language">{{$branchMenuList['now_locale']}}</div>
                        <a href="https://laravel11.wdd.idv.tw">Published Site</a>
                        <a href="https://laravel11.wdd.idv.tw">Preview Site</a>
                    </div>
                    @endif
                    <div class="content-wrap main-table index-table-div" data-tableid="new_cms_table" style="{{ (isset($branchData) && isset($branchMenuList)) ? 'display: none;':'' }}">
                        <div class="content-head cms-index_table">
                            {{-- wade:add --}}
                            <div class="content-head-container">
                                <div class="content-title">
                                    <div class="switch-menu navigation-toggle">
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                        <span class="bar"></span>
                                    </div>
                                    <h1>WDD Design</h1>
                                </div>
                                <div class="content-nav">

                                </div>
                            </div>

                            {{-- wade:delete --}}
                            {{-- <h1>WDD Design</h1> --}}
                            {{-- <div class="content-nav">
                            </div> --}}
                        </div>
                        {{-- wade:add --}}
                        <div class="data-aggrid ag-theme-alpine" id="main"></div>
                        <div class="content-bottom">
                            <div class="content-bottom-info">
                                <span class="blod" id="d-index-s">-</span>
                                <span id="ag-26-to">to</span>
                                <span class="blod" id="d-index-e">-</span>
                                <span id="ag-26-of">of</span>
                                <span class="blod" id="d-index-t">-</span>
                            </div>
                            <div class="content-bottom-page ag-theme-alpine"></div>
                        </div>
                    </div>
                    {{-- wade:delete --}}
                    {{-- <div class="data-aggrid ag-theme-alpine" id="main"></div>
                    <div class="content-bottom">
                        <div class="content-bottom-info">
                            <span class="blod" id="d-index-s">-</span>
                            <span id="ag-26-to">to</span>
                            <span class="blod" id="d-index-e">-</span>
                            <span id="ag-26-of">of</span>
                            <span class="blod" id="d-index-t">-</span>
                        </div>
                        <div class="content-bottom-page ag-theme-alpine"></div>
                    </div> --}}
                    <div class="hiddenArea editContentArea cms_hiddenArea cmsDetailAjaxArea">
                        {{-- Fantasy.cms.Edit.edit --}}
                    </div>
                    <div class="hiddenArea editContentArea cms_hiddenArea cmsDetailAjaxSearch"></div>
                </div>
            </div>
        </div>
    </div>
</div>

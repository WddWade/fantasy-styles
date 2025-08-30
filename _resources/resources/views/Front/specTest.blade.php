<!DOCTYPE html>
<html lang="zh-Hant-TW" data-overlayscrollbars-initialize>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Safari 電話號碼判斷-->
    <meta content="telephone=no" name="format-detection" />
    <title>WDD F2E Framework</title>
    <link rel="shortcut icon" href="/specTest/assets/img/favicon.ico" type="image/x-icon" />
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&amp;family=Outfit:wght@100..900&amp;family=Noto+Sans+TC:wght@100..900&amp;display=swap" />
    <!-- 共用樣式-->
    <link rel="stylesheet" href="/specTest/assets/fonts/icomoon/style.css" />
    <!-- 個別頁面 CSS-->
    <!-- 主頁面 CSS-->
    <!-- 共用 JS-->
    <script type="module" crossorigin src="/specTest/assets/js/about.min.js"></script>
    <link rel="modulepreload" crossorigin href="/specTest/assets/js/style.min.js" />
    <link rel="modulepreload" crossorigin href="/specTest/assets/js/vendor.min.js" />
    <link rel="modulepreload" crossorigin href="/specTest/assets/js/xwadex.fesd.min.js" />
    <link rel="modulepreload" crossorigin href="/specTest/assets/js/commons.min.js" />
    <link rel="stylesheet" crossorigin href="/specTest/assets/css/style.min.css" />
    <link rel="stylesheet" crossorigin href="/specTest/assets/css/about.min.css" />
</head>

<body class="about-page" data-overlayscrollbars-initialize>
    <h1 class="visuallyhidden">WDD F2E Framework!</h1>
    <div class="main-wrapper">
        <!-- 導覽列--><!-- 主要內容-->
        <main>
            <section class="bannerBox">
                <!-- 主題顏色 深淺 data-theme='dark'/'light' -->
                <div class="bannerBox" data-theme="dark" data-align="center" data-aost>
                    <!-- 麵包屑-->
                    <div class="breadCrumbs">
                        <div class="items">
                            <div class="item"><a href="/specTest/index.html">Home</a></div>
                            <div class="item"><span>About Us</span></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="bgBox">
                            <div class="pic">
                                <picture>
                                    <source data-srcset="/specTest/assets/img/banner.jpg" media="(min-width: 1025px)" />
                                    <source data-srcset="/specTest/assets/img/banner.jpg" media="(min-width: 501px)" />
                                    <img class="lazy" data-src="/specTest/assets/img/banner.jpg" alt="" />
                                </picture>
                            </div>
                        </div>
                        <div class="txtBox">
                            <div class="subSlogan">
                                <span>Front-End Suite Design Framework</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section1" data-content>
                <div class="container">
                    <div class="content">
                        <div class="_articleBlock">
                            <!-- 引言樣式-->
                            <article class="_article typeQuote" data-aost data-aost-fade-up>
                                <div class="_contentWrap">
                                    <q class="_quote">Words can be like X-rays, if you use them
                                        properly—they’ll go through anything. You read and you’re
                                        pierced.</q>
                                </div>
                            </article>
                            @php
                                $DatalistArr = [];
                                $DatalistArr['data_table'] = json_decode($Datalist_1['data_table'], true) ?? [];
                                $DatalistArr['data_table_merge'] =
                                    json_decode($Datalist_1['data_table_merge'], true) ?? [];
                                $DatalistArr['data_table_header'] =
                                    json_decode($Datalist_1['data_table_header'], true) ?? [];
                                $DatalistArr['data_table_freeze'] =
                                    json_decode($Datalist_1['data_table_freeze'], true) ?? [];
                                $DatalistArr['data_table_col_width'] =
                                    json_decode($Datalist_1['data_table_col_width'], true) ?? [];
                                $DatalistArr['data_table_header'] = $DatalistArr['data_table_header'][1] ?? null;
                                $DatalistArr['data_table_col_freeze'] = $DatalistArr['data_table_freeze'][0] ?? null;
                                $DatalistArr['data_table_row_freeze'] = $DatalistArr['data_table_freeze'][1] ?? null;

                                $DatalistArr['removeArr'] = [];
                                $DatalistArr['expansionArr'] = [];
                                foreach ($DatalistArr['data_table_merge'] as $A1Notation => $rangeArr) {
                                    $positionArr = fromA1Notation($A1Notation);
                                    for ($i = $positionArr[0]; $i < $positionArr[0] + $rangeArr[0]; $i++) {
                                        for ($j = $positionArr[1]; $j < $positionArr[1] + $rangeArr[1]; $j++) {
                                            if ($i != $positionArr[0] || $j != $positionArr[1]) {
                                                $DatalistArr['removeArr'][toA1Notation($i) . $j] = [$i, $j];
                                            }
                                        }
                                    }
                                    $DatalistArr['expansionArr'][$positionArr[0] . '.' . $positionArr[1]] = [
                                        $rangeArr[0],
                                        $rangeArr[1],
                                    ];
                                }

                                $DatalistArr['header_data_table'] = [];
                                if (isset($DatalistArr['data_table_header'])) {
                                    $DatalistArr['header_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        0,
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                    $DatalistArr['content_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                } else {
                                    $DatalistArr['content_data_table'] = $DatalistArr['data_table'];
                                }
                                foreach ($DatalistArr['removeArr'] as $key => $value) {
                                    if ($value[1] < count($DatalistArr['header_data_table'] ?? [])) {
                                        unset($DatalistArr['header_data_table'][$value[1]][$value[0]]);
                                    } else {
                                        unset(
                                            $DatalistArr['content_data_table'][
                                                $value[1] - count($DatalistArr['header_data_table'] ?? [])
                                            ][$value[0]],
                                        );
                                    }
                                }
                            @endphp
                            {{-- @dump($DatalistArr) --}}
                            <!-- 簡易表格樣式 基本格式(無特殊設定)-->
                            <article class="_article typeTable" data-aost data-aost-fade-up
                                {{ isset($DatalistArr['data_table_row_freeze']) || isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table=on' : '' }}
                                {{ isset($DatalistArr['data_table_row_freeze']) ? 'freeze-table-row=' . ($DatalistArr['data_table_row_freeze'] + 1) : '' }}
                                {{ isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table-col=' . ($DatalistArr['data_table_col_freeze'] + 1) : '' }}>
                                <div class="_contentWrap">
                                    <h4 class="_H">This is the title of the Form (基本表格)</h4>
                                    <div class="_tableCover">
                                        <p class="_tipText">
                                            <i class="icon-drag"></i><span>左右托拉查看表格資訊</span>
                                        </p>
                                        <div class="_table">
                                            <table>
                                                @if (count($DatalistArr['header_data_table'] ?? []) > 0)
                                                    <thead>
                                                        @foreach ($DatalistArr['header_data_table'] as $key => $row)
                                                            <tr data-row="{{ $key }}">
                                                                @foreach ($row as $key2 => $value2)
                                                                    @php
                                                                        $tempExpansionArr =
                                                                            $DatalistArr['expansionArr'][
                                                                                $key2 . '.' . $key
                                                                            ] ?? [];
                                                                    @endphp
                                                                    <th data-column="{{ toA1Notation($key2) }}"
                                                                        {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}

                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                        {{ $value2 }}
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </thead>
                                                @endif
                                                <tbody>
                                                    @foreach ($DatalistArr['content_data_table'] as $key => $row)
                                                        <tr
                                                            data-row="{{ $key + count($DatalistArr['header_data_table'] ?? []) }}">
                                                            @foreach ($row as $key2 => $value2)
                                                                @php
                                                                    $tempExpansionArr =
                                                                        $DatalistArr['expansionArr'][
                                                                            $key2 .
                                                                                '.' .
                                                                                $key +
                                                                                count(
                                                                                    $DatalistArr['header_data_table'] ??
                                                                                        [],
                                                                                )
                                                                        ] ?? [];
                                                                @endphp
                                                                <td data-column="{{ toA1Notation($key2) }}"
                                                                    {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}

                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                    {{ $value2 }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="_description">
                                            What would the museum in your imagination look like?
                                            It's a good idea to build your favorite museum in Mondo
                                            Museum, whether it's to be displayed in a sub-category,
                                            or to show it all at once and make a sensation in the
                                            world.
                                        </p>
                                    </div>
                                </div>
                            </article>
                            @php
                                $DatalistArr = [];
                                $DatalistArr['data_table'] = json_decode($Datalist_2['data_table'], true) ?? [];
                                $DatalistArr['data_table_merge'] =
                                    json_decode($Datalist_2['data_table_merge'], true) ?? [];
                                $DatalistArr['data_table_header'] =
                                    json_decode($Datalist_2['data_table_header'], true) ?? [];
                                $DatalistArr['data_table_freeze'] =
                                    json_decode($Datalist_2['data_table_freeze'], true) ?? [];
                                $DatalistArr['data_table_col_width'] =
                                    json_decode($Datalist_2['data_table_col_width'], true) ?? [];
                                $DatalistArr['data_table_header'] = $DatalistArr['data_table_header'][1] ?? null;
                                $DatalistArr['data_table_col_freeze'] = $DatalistArr['data_table_freeze'][0] ?? null;
                                $DatalistArr['data_table_row_freeze'] = $DatalistArr['data_table_freeze'][1] ?? null;

                                $DatalistArr['removeArr'] = [];
                                $DatalistArr['expansionArr'] = [];
                                foreach ($DatalistArr['data_table_merge'] as $A1Notation => $rangeArr) {
                                    $positionArr = fromA1Notation($A1Notation);
                                    for ($i = $positionArr[0]; $i < $positionArr[0] + $rangeArr[0]; $i++) {
                                        for ($j = $positionArr[1]; $j < $positionArr[1] + $rangeArr[1]; $j++) {
                                            if ($i != $positionArr[0] || $j != $positionArr[1]) {
                                                $DatalistArr['removeArr'][toA1Notation($i) . $j] = [$i, $j];
                                            }
                                        }
                                    }
                                    $DatalistArr['expansionArr'][$positionArr[0] . '.' . $positionArr[1]] = [
                                        $rangeArr[0],
                                        $rangeArr[1],
                                    ];
                                }

                                $DatalistArr['header_data_table'] = [];
                                if (isset($DatalistArr['data_table_header'])) {
                                    $DatalistArr['header_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        0,
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                    $DatalistArr['content_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                } else {
                                    $DatalistArr['content_data_table'] = $DatalistArr['data_table'];
                                }
                                foreach ($DatalistArr['removeArr'] as $key => $value) {
                                    if ($value[1] < count($DatalistArr['header_data_table'] ?? [])) {
                                        unset($DatalistArr['header_data_table'][$value[1]][$value[0]]);
                                    } else {
                                        unset(
                                            $DatalistArr['content_data_table'][
                                                $value[1] - count($DatalistArr['header_data_table'] ?? [])
                                            ][$value[0]],
                                        );
                                    }
                                }
                            @endphp
                            {{-- @dump($DatalistArr) --}}
                            <!-- 合併 : td/th 設定 colspan="2" / rowspan="2" --><!-- 個別表格設定最小寬度(非預設) table(style='--minWidth: 500px;')-->

                            <article class="_article typeTable" data-aost data-aost-fade-up
                                {{ isset($DatalistArr['data_table_row_freeze']) || isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table=on' : '' }}
                                {{ isset($DatalistArr['data_table_row_freeze']) ? 'freeze-table-row=' . ($DatalistArr['data_table_row_freeze'] + 1) : '' }}
                                {{ isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table-col=' . ($DatalistArr['data_table_col_freeze'] + 1) : '' }}>
                                <div class="_contentWrap">
                                    <h4 class="_H">
                                        This is the title of the Form (有合併/拖拉的)
                                    </h4>
                                    <div class="_tableCover">
                                        <p class="_tipText">
                                            <i class="icon-drag"></i><span>左右托拉查看表格資訊</span>
                                        </p>
                                        <div class="_table">
                                            <table style="--minWidth: 500px">
                                                @if (count($DatalistArr['header_data_table'] ?? []) > 0)
                                                    <thead>
                                                        @foreach ($DatalistArr['header_data_table'] as $key => $row)
                                                            <tr data-row="{{ $key }}">
                                                                @foreach ($row as $key2 => $value2)
                                                                    @php
                                                                        $tempExpansionArr =
                                                                            $DatalistArr['expansionArr'][
                                                                                $key2 . '.' . $key
                                                                            ] ?? [];
                                                                    @endphp
                                                                    <th data-column="{{ toA1Notation($key2) }}"
                                                                        {{ isset($tempExpansionArr[0]) ? ('colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1]) : '' }}

                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                        {{ $value2 }}
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </thead>
                                                @endif
                                                <tbody>
                                                    @foreach ($DatalistArr['content_data_table'] as $key => $row)
                                                        <tr
                                                            data-row="{{ $key + count($DatalistArr['header_data_table'] ?? []) }}">
                                                            @foreach ($row as $key2 => $value2)
                                                                @php
                                                                    $tempExpansionArr =
                                                                        $DatalistArr['expansionArr'][
                                                                            $key2 .
                                                                                '.' .
                                                                                $key +
                                                                                count(
                                                                                    $DatalistArr['header_data_table'] ??
                                                                                        [],
                                                                                )
                                                                        ] ?? [];
                                                                @endphp
                                                                <td data-column="{{ toA1Notation($key2) }}"
                                                                    {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}
                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                    {{ $value2 }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="_description">
                                            What would the museum in your imagination look like?
                                            It's a good idea to build your favorite museum in Mondo
                                            Museum, whether it's to be displayed in a sub-category,
                                            or to show it all at once and make a sensation in the
                                            world.
                                        </p>
                                    </div>
                                </div>
                            </article>
                            @php
                                $DatalistArr = [];
                                $DatalistArr['data_table'] = json_decode($Datalist_3['data_table'], true) ?? [];
                                $DatalistArr['data_table_merge'] =
                                    json_decode($Datalist_3['data_table_merge'], true) ?? [];
                                $DatalistArr['data_table_header'] =
                                    json_decode($Datalist_3['data_table_header'], true) ?? [];
                                $DatalistArr['data_table_freeze'] =
                                    json_decode($Datalist_3['data_table_freeze'], true) ?? [];
                                $DatalistArr['data_table_col_width'] =
                                    json_decode($Datalist_3['data_table_col_width'], true) ?? [];
                                $DatalistArr['data_table_header'] = $DatalistArr['data_table_header'][1] ?? null;
                                $DatalistArr['data_table_col_freeze'] = $DatalistArr['data_table_freeze'][0] ?? null;
                                $DatalistArr['data_table_row_freeze'] = $DatalistArr['data_table_freeze'][1] ?? null;

                                $DatalistArr['removeArr'] = [];
                                $DatalistArr['expansionArr'] = [];
                                foreach ($DatalistArr['data_table_merge'] as $A1Notation => $rangeArr) {
                                    $positionArr = fromA1Notation($A1Notation);
                                    for ($i = $positionArr[0]; $i < $positionArr[0] + $rangeArr[0]; $i++) {
                                        for ($j = $positionArr[1]; $j < $positionArr[1] + $rangeArr[1]; $j++) {
                                            if ($i != $positionArr[0] || $j != $positionArr[1]) {
                                                $DatalistArr['removeArr'][toA1Notation($i) . $j] = [$i, $j];
                                            }
                                        }
                                    }
                                    $DatalistArr['expansionArr'][$positionArr[0] . '.' . $positionArr[1]] = [
                                        $rangeArr[0],
                                        $rangeArr[1],
                                    ];
                                }

                                $DatalistArr['header_data_table'] = [];
                                if (isset($DatalistArr['data_table_header'])) {
                                    $DatalistArr['header_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        0,
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                    $DatalistArr['content_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                } else {
                                    $DatalistArr['content_data_table'] = $DatalistArr['data_table'];
                                }
                                foreach ($DatalistArr['removeArr'] as $key => $value) {
                                    if ($value[1] < count($DatalistArr['header_data_table'] ?? [])) {
                                        unset($DatalistArr['header_data_table'][$value[1]][$value[0]]);
                                    } else {
                                        unset(
                                            $DatalistArr['content_data_table'][
                                                $value[1] - count($DatalistArr['header_data_table'] ?? [])
                                            ][$value[0]],
                                        );
                                    }
                                }
                            @endphp
                            {{-- @dump($DatalistArr) --}}
                            <!-- 特例表格樣式 (TSC專用)-->
                            <!-- 凍結表格設定 freeze-table='on' 預設凍結 第一列/第一欄-->
                            <!-- 個別欄位寬度設定 td(style='width:100px; min-width:100px;')-->
                            <article class="_article typeTable" data-aost data-aost-fade-up
                                {{ isset($DatalistArr['data_table_row_freeze']) || isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table=on' : '' }}
                                {{ isset($DatalistArr['data_table_row_freeze']) ? 'freeze-table-row=' . ($DatalistArr['data_table_row_freeze'] + 1) : '' }}
                                {{ isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table-col=' . ($DatalistArr['data_table_col_freeze'] + 1) : '' }}>
                                <div class="_contentWrap">
                                    <h4 class="_H">
                                        This is the title of the Form (有合併/拖拉/凍結的)
                                    </h4>
                                    <div class="_tableCover">
                                        <p class="_tipText">
                                            <i class="icon-drag"></i><span>左右托拉查看表格資訊</span>
                                        </p>
                                        <div class="_table">
                                            <table style="--minWidth: 400px">
                                                @if (count($DatalistArr['header_data_table'] ?? []) > 0)
                                                    <thead>
                                                        @foreach ($DatalistArr['header_data_table'] as $key => $row)
                                                            <tr data-row="{{ $key }}">
                                                                @foreach ($row as $key2 => $value2)
                                                                    @php
                                                                        $tempExpansionArr =
                                                                            $DatalistArr['expansionArr'][
                                                                                $key2 . '.' . $key
                                                                            ] ?? [];
                                                                    @endphp
                                                                    <th data-column="{{ toA1Notation($key2) }}"
                                                                        {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}

                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                        {{ $value2 }}
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </thead>
                                                @endif
                                                <tbody>
                                                    @foreach ($DatalistArr['content_data_table'] as $key => $row)
                                                        <tr
                                                            data-row="{{ $key + count($DatalistArr['header_data_table'] ?? []) }}">
                                                            @foreach ($row as $key2 => $value2)
                                                                @php
                                                                    $tempExpansionArr =
                                                                        $DatalistArr['expansionArr'][
                                                                            $key2 .
                                                                                '.' .
                                                                                $key +
                                                                                count(
                                                                                    $DatalistArr['header_data_table'] ??
                                                                                        [],
                                                                                )
                                                                        ] ?? [];
                                                                @endphp
                                                                <td data-column="{{ toA1Notation($key2) }}"
                                                                    {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}

                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                    {{ $value2 }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="_description">
                                            What would the museum in your imagination look like?
                                            It's a good idea to build your favorite museum in Mondo
                                            Museum, whether it's to be displayed in a sub-category,
                                            or to show it all at once and make a sensation in the
                                            world.
                                        </p>
                                    </div>
                                </div>
                            </article>
                            @php
                                $DatalistArr = [];
                                $DatalistArr['data_table'] = json_decode($Datalist_4['data_table'], true) ?? [];
                                $DatalistArr['data_table_merge'] =
                                    json_decode($Datalist_4['data_table_merge'], true) ?? [];
                                $DatalistArr['data_table_header'] =
                                    json_decode($Datalist_4['data_table_header'], true) ?? [];
                                $DatalistArr['data_table_freeze'] =
                                    json_decode($Datalist_4['data_table_freeze'], true) ?? [];
                                $DatalistArr['data_table_col_width'] =
                                    json_decode($Datalist_4['data_table_col_width'], true) ?? [];
                                $DatalistArr['data_table_header'] = $DatalistArr['data_table_header'][1] ?? null;
                                $DatalistArr['data_table_col_freeze'] = $DatalistArr['data_table_freeze'][0] ?? null;
                                $DatalistArr['data_table_row_freeze'] = $DatalistArr['data_table_freeze'][1] ?? null;

                                $DatalistArr['removeArr'] = [];
                                $DatalistArr['expansionArr'] = [];
                                foreach ($DatalistArr['data_table_merge'] as $A1Notation => $rangeArr) {
                                    $positionArr = fromA1Notation($A1Notation);
                                    for ($i = $positionArr[0]; $i < $positionArr[0] + $rangeArr[0]; $i++) {
                                        for ($j = $positionArr[1]; $j < $positionArr[1] + $rangeArr[1]; $j++) {
                                            if ($i != $positionArr[0] || $j != $positionArr[1]) {
                                                $DatalistArr['removeArr'][toA1Notation($i) . $j] = [$i, $j];
                                            }
                                        }
                                    }
                                    $DatalistArr['expansionArr'][$positionArr[0] . '.' . $positionArr[1]] = [
                                        $rangeArr[0],
                                        $rangeArr[1],
                                    ];
                                }

                                $DatalistArr['header_data_table'] = [];
                                if (isset($DatalistArr['data_table_header'])) {
                                    $DatalistArr['header_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        0,
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                    $DatalistArr['content_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                } else {
                                    $DatalistArr['content_data_table'] = $DatalistArr['data_table'];
                                }
                                foreach ($DatalistArr['removeArr'] as $key => $value) {
                                    if ($value[1] < count($DatalistArr['header_data_table'] ?? [])) {
                                        unset($DatalistArr['header_data_table'][$value[1]][$value[0]]);
                                    } else {
                                        unset(
                                            $DatalistArr['content_data_table'][
                                                $value[1] - count($DatalistArr['header_data_table'] ?? [])
                                            ][$value[0]],
                                        );
                                    }
                                }
                            @endphp
                            {{-- @dump($DatalistArr) --}}
                            <!-- 特例表格樣式 (TSC專用)--><!-- 凍結表格設定 freeze-table='on' 預設凍結 第一列/第一欄--><!-- 凍結行列設定 freeze-table-row='2' freeze-table-col='2'-->

                            <article class="_article typeTable" data-aost data-aost-fade-up
                                {{ isset($DatalistArr['data_table_row_freeze']) || isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table=on' : '' }}
                                {{ isset($DatalistArr['data_table_row_freeze']) ? 'freeze-table-row=' . ($DatalistArr['data_table_row_freeze'] + 1) : '' }}
                                {{ isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table-col=' . ($DatalistArr['data_table_col_freeze'] + 1) : '' }}>
                                <div class="_contentWrap">
                                    <h4 class="_H">
                                        This is the title of the Form (有合併/拖拉/凍結多欄多列的)
                                    </h4>
                                    <div class="_tableCover">
                                        <p class="_tipText">
                                            <i class="icon-drag"></i><span>左右托拉查看表格資訊</span>
                                        </p>
                                        <div class="_table">
                                            <table>
                                                @if (count($DatalistArr['header_data_table'] ?? []) > 0)
                                                    <thead>
                                                        @foreach ($DatalistArr['header_data_table'] as $key => $row)
                                                            <tr data-row="{{ $key }}">
                                                                @foreach ($row as $key2 => $value2)
                                                                    @php
                                                                        $tempExpansionArr =
                                                                            $DatalistArr['expansionArr'][
                                                                                $key2 . '.' . $key
                                                                            ] ?? [];
                                                                    @endphp
                                                                    <th data-column="{{ toA1Notation($key2) }}"
                                                                        {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}

                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                        {{ $value2 }}
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </thead>
                                                @endif
                                                <tbody>
                                                    @foreach ($DatalistArr['content_data_table'] as $key => $row)
                                                        <tr
                                                            data-row="{{ $key + count($DatalistArr['header_data_table'] ?? []) }}">
                                                            @foreach ($row as $key2 => $value2)
                                                                @php
                                                                    $tempExpansionArr =
                                                                        $DatalistArr['expansionArr'][
                                                                            $key2 .
                                                                                '.' .
                                                                                $key +
                                                                                count(
                                                                                    $DatalistArr['header_data_table'] ??
                                                                                        [],
                                                                                )
                                                                        ] ?? [];
                                                                @endphp
                                                                <td data-column="{{ toA1Notation($key2) }}"
                                                                    {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}

                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                    {{ $value2 }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="_description">
                                            What would the museum in your imagination look like?
                                            It's a good idea to build your favorite museum in Mondo
                                            Museum, whether it's to be displayed in a sub-category,
                                            or to show it all at once and make a sensation in the
                                            world.
                                        </p>
                                    </div>
                                </div>
                            </article>
                            @php
                                $DatalistArr = [];
                                $DatalistArr['data_table'] = json_decode($Datalist_5['data_table'], true) ?? [];
                                $DatalistArr['data_table_merge'] =
                                    json_decode($Datalist_5['data_table_merge'], true) ?? [];
                                $DatalistArr['data_table_header'] =
                                    json_decode($Datalist_5['data_table_header'], true) ?? [];
                                $DatalistArr['data_table_freeze'] =
                                    json_decode($Datalist_5['data_table_freeze'], true) ?? [];
                                $DatalistArr['data_table_col_width'] =
                                    json_decode($Datalist_5['data_table_col_width'], true) ?? [];
                                $DatalistArr['data_table_header'] = $DatalistArr['data_table_header'][1] ?? null;
                                $DatalistArr['data_table_col_freeze'] = $DatalistArr['data_table_freeze'][0] ?? null;
                                $DatalistArr['data_table_row_freeze'] = $DatalistArr['data_table_freeze'][1] ?? null;

                                $DatalistArr['removeArr'] = [];
                                $DatalistArr['expansionArr'] = [];
                                foreach ($DatalistArr['data_table_merge'] as $A1Notation => $rangeArr) {
                                    $positionArr = fromA1Notation($A1Notation);
                                    for ($i = $positionArr[0]; $i < $positionArr[0] + $rangeArr[0]; $i++) {
                                        for ($j = $positionArr[1]; $j < $positionArr[1] + $rangeArr[1]; $j++) {
                                            if ($i != $positionArr[0] || $j != $positionArr[1]) {
                                                $DatalistArr['removeArr'][toA1Notation($i) . $j] = [$i, $j];
                                            }
                                        }
                                    }
                                    $DatalistArr['expansionArr'][$positionArr[0] . '.' . $positionArr[1]] = [
                                        $rangeArr[0],
                                        $rangeArr[1],
                                    ];
                                }

                                $DatalistArr['header_data_table'] = [];
                                if (isset($DatalistArr['data_table_header'])) {
                                    $DatalistArr['header_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        0,
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                    $DatalistArr['content_data_table'] = array_slice(
                                        $DatalistArr['data_table'],
                                        $DatalistArr['data_table_header'] + 1,
                                    );
                                } else {
                                    $DatalistArr['content_data_table'] = $DatalistArr['data_table'];
                                }
                                foreach ($DatalistArr['removeArr'] as $key => $value) {
                                    if ($value[1] < count($DatalistArr['header_data_table'] ?? [])) {
                                        unset($DatalistArr['header_data_table'][$value[1]][$value[0]]);
                                    } else {
                                        unset(
                                            $DatalistArr['content_data_table'][
                                                $value[1] - count($DatalistArr['header_data_table'] ?? [])
                                            ][$value[0]],
                                        );
                                    }
                                }
                            @endphp
                            {{-- @dump($DatalistArr) --}}
                            <!-- 合併 : td/th 設定 colspan="2" / rowspan="2" --><!-- 個別表格設定最小寬度(非預設) table(style='--minWidth: 500px;')-->

                            <article class="_article typeTable" data-aost data-aost-fade-up
                                {{ isset($DatalistArr['data_table_row_freeze']) || isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table=on' : '' }}
                                {{ isset($DatalistArr['data_table_row_freeze']) ? 'freeze-table-row=' . ($DatalistArr['data_table_row_freeze'] + 1) : '' }}
                                {{ isset($DatalistArr['data_table_col_freeze']) ? 'freeze-table-col=' . ($DatalistArr['data_table_col_freeze'] + 1) : '' }}>
                                <div class="_contentWrap">
                                    <h4 class="_H">
                                        測試用表格
                                    </h4>
                                    <div class="_tableCover">
                                        <p class="_tipText">
                                            <i class="icon-drag"></i><span>左右托拉查看表格資訊</span>
                                        </p>
                                        <div class="_table">
                                            <table style="--minWidth: 500px">
                                                @if (count($DatalistArr['header_data_table'] ?? []) > 0)
                                                    <thead>
                                                        @foreach ($DatalistArr['header_data_table'] as $key => $row)
                                                            <tr data-row="{{ $key }}">
                                                                @foreach ($row as $key2 => $value2)
                                                                    @php
                                                                        $tempExpansionArr =
                                                                            $DatalistArr['expansionArr'][
                                                                                $key2 . '.' . $key
                                                                            ] ?? [];
                                                                    @endphp
                                                                    <th data-column="{{ toA1Notation($key2) }}"
                                                                        {{ isset($tempExpansionArr[0]) ? ('colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1]) : '' }}
                                                                        {{ isset($DatalistArr['data_table_col_width'][0]) ?('style="width: '. $DatalistArr['data_table_col_width'][$key2] .'px; min-width: '. $DatalistArr['data_table_col_width'][$key2] .'px'):'' }}>
                                                                        {{ $value2 }}
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </thead>
                                                @endif
                                                <tbody>
                                                    @foreach ($DatalistArr['content_data_table'] as $key => $row)
                                                        <tr
                                                            data-row="{{ $key + count($DatalistArr['header_data_table'] ?? []) }}">
                                                            @foreach ($row as $key2 => $value2)
                                                                @php
                                                                    $tempExpansionArr =
                                                                        $DatalistArr['expansionArr'][
                                                                            $key2 .
                                                                                '.' .
                                                                                $key +
                                                                                count(
                                                                                    $DatalistArr['header_data_table'] ??
                                                                                        [],
                                                                                )
                                                                        ] ?? [];
                                                                @endphp
                                                                <td data-column="{{ toA1Notation($key2) }}"
                                                                    {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}

                                                                    {{ isset($DatalistArr['data_table_col_width'][$key2]) ?('style=width:'. $DatalistArr['data_table_col_width'][$key2] .'px;min-width:'. $DatalistArr['data_table_col_width'][$key2] .'px;'):'' }}>
                                                                    {{ $value2 }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @dump('段落測試=>')
                            @include('article_v3', [
                                'articles' => $Datalist_set->Datalist_content,
                                'imageGroupKey' => 'Datalist_content_img',
                            ])
                            @dump('<=段落測試')
                        </div>
                    </div>
                </div>
            </section>
            <section class="section2" data-noContent>
                <div class="container">
                    <div class="noData">NO DATA</div>
                </div>
            </section>
        </main>
        <!-- 頁腳-->
        <footer>
            <div class="copyright">
                COPYRIGHT © DESIGN BY
                <a href="https://www.wddgroup.com/" title="網頁設計公司">WDD</a>
            </div>
        </footer>
        <modern-modal data-modal-id="my-modal" data-modal-animate="clip-right">
            <div class="close-btn" data-modal-close></div>
            <div class="title">Modal4</div>
        </modern-modal>
    </div>
</body>

</html>

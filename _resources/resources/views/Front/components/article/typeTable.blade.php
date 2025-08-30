{{--
    通用模板
--}}
{{-- @dump($tableTypeData) --}}
<div class="_contentWrap">

    @if(!empty($paragraph['article_title']))
        <h{{ $paragraph['h_heading_tag_num']!=0?$paragraph['h_heading_tag_num']:4 }} class="_H">
            {{ $paragraph['article_title'] }}
        </h{{ $paragraph['h_heading_tag_num']!=0?$paragraph['h_heading_tag_num']:4 }}>
    @endif

    @if(!empty($paragraph['article_sub_title']))
        <h{{ $paragraph['subh_heading_tag_num']!=0?$paragraph['subh_heading_tag_num']:5 }} class="_subH">
            {{ $paragraph['article_sub_title'] }}
        </h{{ $paragraph['subh_heading_tag_num']!=0?$paragraph['subh_heading_tag_num']:5 }}>
    @endif

    {!! $builder->buildImages() !!}

    <div class="_tableCover">
        <p class="_tipText">
            <i class="icon-drag"></i><span>左右托拉查看表格資訊</span>
        </p>
        <div class="_table">
            <table style="--minWidth: 500px">
                @if (count($tableTypeData['header_data_table'] ?? []) > 0)
                    <thead>
                        @foreach ($tableTypeData['header_data_table'] as $key => $row)
                            <tr data-row="{{ $key }}">
                                @foreach ($row as $key2 => $value2)
                                    @php
                                        $tempExpansionArr =
                                            $tableTypeData['expansionArr'][
                                                $key2 . '.' . $key
                                            ] ?? [];
                                    @endphp
                                    <th data-column="{{ toA1Notation($key2) }}"
                                        {{ isset($tempExpansionArr[0]) ? ('colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1]) : '' }}
                                        {{ isset($tableTypeData['data_table_col_width'][$key2]) ?('style=width:'. $tableTypeData['data_table_col_width'][$key2] .'px;min-width:'. $tableTypeData['data_table_col_width'][$key2] .'px;'):'' }}
                                        >
                                        <p>{!! nl2br(e($value2)) !!}</p>
                                    </th>
                                @endforeach
                            </tr>
                        @endforeach
                    </thead>
                @endif
                <tbody>
                    @foreach ($tableTypeData['content_data_table'] as $key => $row)
                        <tr
                            data-row="{{ $key + count($tableTypeData['header_data_table'] ?? []) }}">
                            @foreach ($row as $key2 => $value2)
                                @php
                                    $tempExpansionArr =
                                        $tableTypeData['expansionArr'][
                                            $key2 .
                                                '.' .
                                                $key +
                                                count(
                                                    $tableTypeData['header_data_table'] ??
                                                        [],
                                                )
                                        ] ?? [];
                                @endphp
                                <td data-column="{{ toA1Notation($key2) }}" @if ($key2 < $tableTypeData['col_header_data_table'] && $tableTypeData['col_header_data_table'] != 0) class="col_head" @endif
                                    {{ isset($tempExpansionArr[0]) ? 'colspan=' . $tempExpansionArr[0] . ' rowspan=' . $tempExpansionArr[1] : '' }}
                                    {{ isset($tableTypeData['data_table_col_width'][$key2]) ?('style=width:'. $tableTypeData['data_table_col_width'][$key2] .'px;min-width:'. $tableTypeData['data_table_col_width'][$key2] .'px;'):'' }}>
                                    <p>{!! nl2br(e($value2)) !!}</p>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="_P">
        {!! $builder->buildContext() !!}
    </div>
</div>

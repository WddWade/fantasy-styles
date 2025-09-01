<li class="inventory {!! $sontable ? '' : 'row_style' !!}">
    <div class="inner">
        @if(isset($set['pos']) && $set['pos'] == 'top' && $set['add']??0)
        <div class="edit_table_add" data-pos="top">
            <a><span class="icon-add"></span>新增一列</a>
        </div>
        @endif
        <table class="edit_table edit_table_drag">
            <thead>
                <tr>
                    <th class="_drag"></th>
                    @if($set['add']??0)
                    <th class="_delete">刪除</th>
                    @endif
                    <th class="_number">{{ $set['first_label'] ?? '編號' }}</th>
                    @foreach($set['label'] ?: [] as $val)
                    <th>{!!$val!!}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @for($index = 1;$index <= ( (isset($value[$set['field'][0]]) && count($value[$set['field'][0]]) >= $set['count']) ? count($value[$set['field'][0]]) : $set['count'] ) ;$index++)
                <tr>
                    <th class="drag"></th>
                    @if($set['add']??0)
                    <th class="delete"><span class="icon-delete edit_delete"></span></th>
                    @endif
                    @if(isset($set['last_label']) && $set['last_label'] != "" && $index == $set['count'])
                    <th>{{$set['last_label']}}</th>
                    @else
                    <th>{{$index}}</th>
                    @endif
                    @foreach($set['field'] ?: [] as $val)
                    <th><input class="normal_input" type="text" name="{{$name}}[{{$val}}][]" value="{{$value[$val][$index-1] ?? ''}}"></th>
                    @endforeach
                </tr>
                @endfor
            </tbody>
        </table>
        @if(isset($set['pos']) && $set['pos'] != 'top' && $set['add']??0)
        <div class="edit_table_add" data-pos="">
            <a><span class="icon-add"></span>新增一列</a>
        </div>
        @endif
        @if (!empty($tip))
            <div class="tips">
                <span class="title">TIPS</span>
                <p>{!! $tip !!}</p>
            </div>
        @endif
    </div>
</li>

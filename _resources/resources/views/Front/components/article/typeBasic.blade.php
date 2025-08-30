{{--
    通用模板
--}}

<div class="_contentWrap">

    @if(!empty($paragraph['article_title']))
        <h{{ $paragraph['h_heading_tag_num']!=0?$paragraph['h_heading_tag_num']:4 }} class="_H">
            {{ $paragraph['article_title'] }}
        </h{{ $paragraph['h_heading_tag_num']!=0?$paragraph['h_heading_tag_num']:4 }}>
    @endif

    {!! $builder->buildImages() !!}

    <div class="_wordCover">
        @if(!empty($paragraph['article_sub_title']))
            <h{{ $paragraph['subh_heading_tag_num']!=0?$paragraph['subh_heading_tag_num']:5 }} class="_subH">
                {{ $paragraph['article_sub_title'] }}
            </h{{ $paragraph['subh_heading_tag_num']!=0?$paragraph['subh_heading_tag_num']:5 }}>
        @endif
        <div class="_P">

            {!! $builder->buildContext() !!}

            {!! $builder->buildButton() !!}

        </div>
    </div>
</div>

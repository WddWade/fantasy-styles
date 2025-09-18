<div class="_backgroundWrap" data-aost data-aot-clip>

    @if ($paragraph['full_img'])
    <div class="_pc" style="background-image: url('{{ BaseFunction::RealFiles($paragraph['full_img'], false) }}')"></div>
    @endif

    @if ($paragraph['full_img_rwd'])
    <div class="_mobile" style="background-image: url('{{ BaseFunction::RealFiles($paragraph['full_img_rwd'], false) }}')"></div>
    @endif

</div>

<div class="_contentWrap">

    {!! $builder->buildImages() !!}

    <div class="_wordCover">

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
        <div class="_P">

            {!! $builder->buildContext() !!}

            {!! $builder->buildButton() !!}

        </div>
    </div>
</div>

{{--
    引言模板
--}}
<div class="_contentWrap">
    @if (!empty($paragraph['article_title']))
        <q class="_quote">{{ $paragraph['article_title'] }}</q>
    @endif
    <div class="_P">

        {!! $builder->buildContext() !!}

    </div>
</div>

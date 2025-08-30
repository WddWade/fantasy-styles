@if (! $imageGroup->isEmpty())

<div class="_imgCover">

    @if ($isSwiper)

    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach ($imageGroup as $key=>$item)
            <div class="_cover swiper-slide ">
                <div class="_photo" {{ (!empty($item['video']) && $item['video_type'] != '-' && !empty($item['video_type'])) ? 'video-autoplay=on video-ig="&nbsp;" video-target-route='.b_url('article/video/'.$item['video_type'].'/'.base64_encode($item['video'])).' video-type='.$item['video_type'].' video-id='.(($item['video_type'] != 'instagram') ? $item['video'] : '&nbsp;').' video-starttime='.$item['video_start_time'] . ' video-highquality='.($item['highquality'] ? 'on':'off') : '' }}>
                    <img src="{{ BaseFunction::RealFiles($item['image'],false) }}" alt="test">
                </div>
                @if(!empty($item['title']))
                <p class="_description">{{ $item['title'] }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <div class="swiper-button-cover"></div>

    @else

    @foreach ($imageGroup as $key=>$item)
    <div class="_cover flip-in-ver-right delay{{($key+1)*2}}" data-aost data-aost-clip>
        <div class="_photo" {{ (!empty($item['video']) && $item['video_type'] != '-' && !empty($item['video_type'])) ? 'video-autoplay=on video-ig="&nbsp;" video-target-route='.b_url('article/video/'.$item['video_type'].'/'.base64_encode($item['video'])).' video-type='.$item['video_type'].' video-id='.(($item['video_type'] != 'instagram') ? $item['video'] : '&nbsp;').' video-starttime='.$item['video_start_time'] . ' video-highquality='.($item['highquality'] ? 'on':'off') : '' }}>
            <img src="{{ BaseFunction::RealFiles($item['image'],false) }}" alt="test">
        </div>
        @if(!empty($item['title']))
        <p class="_description">{{ $item['title'] }}</p>
        @endif
    </div>
    @endforeach

    @endif
</div>

@endif

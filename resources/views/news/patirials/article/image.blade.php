
@php
    $thumb   = asset('images/article/' . $item['thumb']);
@endphp
<div class="entry-media">
    <div class="owl-stage-outer">
        <div class="owl-stage">
            <div class="owl-item cloned" style="width: 870px ; margin-right: 2px;"><img  src="{{ $thumb }}" alt="Post"></div>
        </div>
    </div>
</div> 
@php
    use App\Helpers\Template as Template ;
    use App\Helpers\URL as URL ;

    $name           = $item['name'];
    $content        = Template::showContent($item['content'],580);
    $created        = Template::showDatetimeFrontend($item['created']);
    $link           = URL::linkArticle($item['id'],$item['name']);
    $created_by     = $item['created_by'];

@endphp
    <div class="entry-body">
        <div class="entry-date">
            <span class="day">Bài viết</span>
            {{-- <span class="month"></span> --}}
        </div>
        <h2 class="entry-title">
            <a href="{{ $link }}">{{ $name }}</a>
        </h2>

        <div class="entry-content">
            <p>{!! $content !!}</p>

            <a href="{{ $link }}" class="read-more">Xem chi tiết <i class="icon-angle-double-right"></i></a>
        </div><!-- End .entry-content -->

        <div class="entry-meta">
            <span><i class="icon-calendar"></i>{{ $created  }}</span>
            <span><i class="icon-user"></i>By <a href="#">{{ $created_by  }}</a></span>
            {{-- <span><i class="icon-folder-open"></i>
                <a href="#">Haircuts &amp; hairstyles</a>,
                <a href="#">Fashion trends</a>,
                <a href="#">Accessories</a>
            </span> --}}
        </div>
    </div>



































@php
    // use App\Helpers\Template as Template ;

    // $name       = $item['name'];
    // $content    = $item['content'];
    // $created    = Template::showDatetimeFrontend($item['created']);
    // $created_by = $item['created_by'];

@endphp
{{-- <div class="entry-body"> --}}
    {{-- <div class="entry-date">
    <span class="day">22</span>
    <span class="month">Jun</span>
    </div>

    <h2 class="entry-title"> {{ $name }}</h2>
    <div class="entry-meta">
    <span><i class="icon-calendar"></i>{{ $created }}</span>
    <span><i class="icon-user"></i>By <a href="#">{{ $created_by }}</a></span> --}}
        {{-- <span><i class="icon-folder-open"></i>
            <a href="#">Haircuts &amp; hairstyles</a>,
            <a href="#">Fashion trends</a>,
            <a href="#">Accessories</a>
        </span> --}}
    {{-- </div> --}}

    {{-- <div class="entry-content" >
        {!! $content  !!}
    </div> --}}



{{-- </div> --}}

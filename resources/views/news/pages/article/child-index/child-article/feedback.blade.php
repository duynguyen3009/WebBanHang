@foreach ($itemsFeedback as $item)
<div class="entry-author">
    <h3><i class="icon-user"></i>Bình luận</h3>
    @php
        $name           = $item['name'];
        $description    = $item['description'];
        $item['thumb']  = isset($item['thumb']) ? $item['thumb'] : 'default.png';
        $thumb          =  "images/feedback/" . $item['thumb'];
    @endphp
        <figure>
            <a href="#">
            <img src="{{ asset($thumb) }}" alt="{{ $name }}">
            </a>
        </figure>
        <div class="author-content">
        <h4><a href="#">{{ $name }}</a></h4>
            {!! $description !!}
        </div>
    </div>
@endforeach

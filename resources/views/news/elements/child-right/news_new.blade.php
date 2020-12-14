@php 
 use App\Helpers\URL;
@endphp
<div class="widget">
    <h4 class="widget-title">Bài viết mới nhất</h4>

    <ul class="simple-entry-list">
         @foreach ($itemsArticleNew as $item)
            @php 
               $name       = substr($item['name'], 0, 35);
               $created    = $item['created'];
               $createdBy  = $item['created_by'];
               $thumb      = "images/article/" . $item['thumb'];
               $content    = substr($item['content'], 1, 100);
               $link        = URL::linkArticle($item['id'],$item['name']);
            @endphp
             <li style="border: 1px solid #ccc; padding: 5px">
             <div class="entry-media">
                <a href="{{ $link }}">
                      <img src="{{ asset($thumb) }}" alt="{{ $name }}" style="height: 80px">
                </a>
             </div><!-- End .entry-media -->
             <div class="entry-info">
                <a href="{{ $link }}">{{ $name }}</a>
                <div class="entry-meta">
                      {!! $content !!}
                </div><!-- End .entry-meta -->
             </div><!-- End .entry-info -->
          </li>
         @endforeach
         

    </ul>
 </div><!-- End .widget -->
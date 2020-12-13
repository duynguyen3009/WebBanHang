<div class="widget">
    <h4 class="widget-title">Thẻ Tag</h4>
    <div class="tagcloud" style="border: 1px solid #ccc; padding: 5px">
      @foreach ($itemsTag as $item)
            <a href="#">{{ $item['name'] }}</a>
      @endforeach
    </div><!-- End .tagcloud -->
 </div><!-- End .widget -->
@php 
 use App\Helpers\URL;
@endphp
    
<div class="widget">
    <h4 class="widget-title">Chi nhánh</h4>
    <ul class="simple-entry-list">
      @foreach ($itemsAgencies as $item)
      @php
         $name       = substr($item['name'], 0, 35);
         $address       = $item['address'];
         $thumb      = "images/agencies/" . $item['thumb'];
         $link       = null;
        
      @endphp
         <li style="border: 1px solid #ccc; padding: 5px">
            <div class="entry-media">
               <a href="single.html">
                     <img src="{{ asset($thumb) }}" alt="Post">
               </a>
            </div><!-- End .entry-media -->
            <div class="entry-info">
            <a href="single.html">{{ $name }}</a>
            <div class="entry-meta">
               {{ $address }}
               </div><!-- End .entry-meta -->
            </div><!-- End .entry-info -->
         </li>
      @endforeach

    </ul>
 </div><!-- End .widget -->
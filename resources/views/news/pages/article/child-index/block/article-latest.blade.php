@php
   use App\Helpers\Template as Template;
   use App\Helpers\URL as URL;
@endphp
@if(count($articleLastest) > 0)
<div class="widget">
   <h4 class="widget-title">Recent Posts</h4>

   <ul class="simple-entry-list">
       <li>
           <div class="entry-media">
               <a href="single.html">
                   <img src="assets/images/blog/widget/post-1.jpg" alt="Post">
               </a>
           </div><!-- End .entry-media -->
           <div class="entry-info">
               <a href="single.html">Post Format - Video</a>
               <div class="entry-meta">
                   April 08, 2018
               </div><!-- End .entry-meta -->
           </div><!-- End .entry-info -->
       </li>

       <li>
           <div class="entry-media">
               <a href="single.html">
                   <img src="assets/images/blog/widget/post-2.jpg" alt="Post">
               </a>
           </div><!-- End .entry-media -->
           <div class="entry-info">
               <a href="single.html">Post Format - Image</a>
               <div class="entry-meta">
                   March 23, 2016
               </div><!-- End .entry-meta -->
           </div><!-- End .entry-info -->
       </li>
   </ul>
</div><!-- End .widget -->
@endif
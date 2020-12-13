<?php
      $link = 'https://www.youtube.com/playlist?list=PLG62pynhogSy22VK43XxDI3DVVmsngD3G';
      parse_str(parse_url($link,PHP_URL_QUERY), $list) ;
      $api_key = 'AIzaSyAyqc3D8pAtgBBPsnneddcd75xDcCWru-w';
      $playlist_id =  isset($list["list"]) ?  $list["list"] : $list["v"]; 
      $api_url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId='.$playlist_id.'&key='. $api_key;
      $playlist = json_decode(file_get_contents($api_url));
?>


<div class="widget widget-banner">
   <div class="banner banner-image">
      @foreach ($playlist->items as $item)
      <iframe width="248px" height="290px" src="https://www.youtube.com/embed/<?php echo $item->snippet->resourceId->videoId ;?>" frameborder="0" allowfullscreen=""></iframe>
      @endforeach
      
   </div>
   <!-- End .banner -->
</div>
{{-- @if(count($linkVideo) > 0)
    @php
        parse_str(parse_url($linkVideo['link'],PHP_URL_QUERY), $list) ;
        $api_key = 'AIzaSyAyqc3D8pAtgBBPsnneddcd75xDcCWru-w';
        $playlist_id =  isset($list["list"]) ?  $list["list"] : $list["v"]; 
        $api_url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId='.$playlist_id.'&key='. $api_key;
        $playlist = json_decode(file_get_contents($api_url));
        $index =  0;
    @endphp
    <div class="info-section">
        <h2 class="h3 title mb-4 text-center">Video về cá</h2>
        <div class="container video-fish">
           <div class="row">
                @foreach($playlist->items as $item)
                    @php
                        if($index == 4) continue ;
                        $index ++;
                    @endphp
                    <div class="col-md-3">
                        <div class="feature-box feature-box-simple text-center">
                        <div>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $item->snippet->resourceId->videoId ;?>" frameborder="0" allowfullscreen=""></iframe>
                        </div>
                        </div>
                    </div>
                @endforeach   
           </div>
           <div class="xem-them">
              <a style="margin-top: 1em; background-color: deeppink; border-radius: 5em; border:none" href="http://truongdinh_xyz.com/thong-tin-va-ky-thuat-nuoi-ca-bay-mau-guppy-dep-va-hieu-qua-a-34.html" class="btn btn-dark">Xem thêm</a>
           </div>
        </div>
     </div>
@endif --}}
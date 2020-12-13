@php
    $images = \File::allFiles(public_path('storage/files/Images/home-content-top'));
    $arrImage = array_slice($images, 0, 2);
@endphp
<div class="widget">
    <h4 class="widget-title">Thư viện</h4>
    <ul class="list">
          <li>
                  <a href="#">Hình ảnh</a>
                  <ul>
                        @foreach ($arrImage as $image)
                        <li>
                              <div class="entry-media">
                                    <img  src="{{ asset('storage/files/Images/home-content-top/' . $image->getFilename()) }}">
                              </div><!-- End .entry-media -->
                        </li>
                        @endforeach
                       
                       
                  </ul>
                
          </li>
            <li>
                <a href="#">Videos</a>
                <ul>
                  <li>
                        <div class="entry-media">
                              Đang xây dựng
                        </div><!-- End .entry-media -->
                  </li>
            </ul>
            </li>
    </ul>
 </div><!-- End .widget -->
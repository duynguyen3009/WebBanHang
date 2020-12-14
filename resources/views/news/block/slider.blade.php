
@if (count($itemsSlider) > 0) 
    <div class="home-slider-container">
        <div class="home-slider owl-carousel owl-theme owl-theme-light">

            @foreach ($itemsSlider as $key => $val)
                @php
                    $name        = $val['name'];
                    $description = $val['description'];
                    $link        = $val['link'];
                    $thumb       = url("/images/slider") . '/' . $val['thumb'];
                @endphp
                <div class="home-slide">
                    <div class="slide-bg owl-lazy"  data-src="{{ $thumb }}"></div><!-- End .slide-bg -->
            
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-8 col-md-6 text-center slide-content-right">
                                <div class="home-slide-content">
                                    <h3>{{ $description }}</h3>
                                    <h1 style="color:rgb(72, 1, 236)">{{ $name }}</h1>
                                    <a href="category.html" class="btn btn-primary">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
           

          
        </div>
    </div>
@endif
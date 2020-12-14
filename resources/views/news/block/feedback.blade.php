@php
     use App\Helpers\Template as Template;
@endphp
@if(count($itemsFeedBack) > 0)
    <div class="info-section">
        <h2 class="h3 title mb-4 text-center">Cảm nhận khách hàng</h2>
        <div class="container">
            <div class="row">
                @foreach ($itemsFeedBack as $key => $val)
                    @php
                        $name        = $val['name'];
                        $description = substr($val['description'], 0, 150);
                        $combostar   = Template::getStarFeedBack($val['combostar'] ) ;
                        $thumb       = url("/images/feedback") . '/' . $val['thumb'];
                    @endphp
                    <div class="col-md-4">
                        <div class="feature-box feature-box-simple text-center">
                            <div>
                                <img style="display: initial; height:25em" src=" {{ $thumb }}" alt="">
                            </div>
                            <div class="feature-box-content">
                                <p style="font-family: cursive;color: #0a0a0a;line-height: 2em,;margin-top: 1em;"><span> {!! $name !!}</span> </p>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:{{ $combostar }}%;"></span><!-- End .ratings -->
                                    </div>
                                </div>
                                <p>{!! $description !!}...</p>
                        
                            </div>
                        </div>
                    </div>
                @endforeach     
            </div>
        </div>
    </div>
@endif
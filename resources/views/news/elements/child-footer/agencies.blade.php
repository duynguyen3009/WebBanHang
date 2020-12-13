@php 
use App\Helpers\Template;
@endphp
<div class="col-md-5">
    <div class="widget">
        <h4 class="widget-title">Hệ thống cửa hàng</h4>
    
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @if(count($listAgencies) > 0)
             
                    @foreach($listAgencies as $key => $value)
                        @php
                            
                            $numberShowroom = Template::numberShowroom($index) ;
                            $address        = $value['address'] ;
                            $hotline        = $value['hotline'] ;
                            $index ++;
                        @endphp
                        <h4 class="title title-showroom text-white">Showroom {{  $numberShowroom }}</h4>
                        <ul class="contact-info">
                            <li><div class="mb-1">{{ $address }}</div>
                                <div><a href="tel:{{$hotline}}">{{$hotline}}</a> </div>
                            </li>
                        </ul>  
                    @endforeach
                @endif    
            </div>
        </div>
    </div>
</div>
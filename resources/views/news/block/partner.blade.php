@php
    use App\Helpers\Template as Template ;
@endphp
@if(count($partnerThumb) > 0)
    <div class="partners-container">
        <div class="container">
        <h2 class="h3 title mb-4 text-center">Đối tác</h2>
            <div class="partners-carousel owl-carousel owl-theme">
                @foreach($partnerThumb as $key => $value)
                    @php
                        $link   = $value['link'];
                        $title  = $value['name'];
                        $thumb  = Template::showItemThumbPartner('partner' , $value['thumb'] , null)  ;
                    @endphp
                    <a href="{{ $link  }}" class="partner" title="{{ $title }} " target="_blank">
                       {!!  $thumb !!}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endif
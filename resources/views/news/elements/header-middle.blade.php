@php
    use App\Models\SettingModel ;

    $settingModel   = new SettingModel();
    $itemsSetting   = $settingModel->getItem('general', [ 'task' => 'get-item']); 
    $itemsSetting   = json_decode($itemsSetting['value']);

    $thumb    = url("/images/setting") . '/' . $itemsSetting->logo;
@endphp
<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{  $thumb  }}" alt="guppy-logo" style="width: 150px">
            </a>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div class="header-search">
                <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                <form action="{{route('productf/search')}}" method="post">
                    @csrf
                    <div class="header-search-wrapper">
                        <input type="search" class="form-control" name="search" id="search" placeholder="Tìm kiếm..." required>
                        <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div>
        </div>

        <div class="header-right">
            <button class="mobile-menu-toggler" type="button">
                <i class="icon-menu"></i>
            </button>
            <div class="header-contact">
                <span>Điện thoại tư vấn</span>
                <a href="tel:#"><strong>{{ $itemsSetting->hotline }}</strong></a>
            </div><!-- End .header-contact -->

            @include('news.elements.cart')
        </div>
    </div>
</div>
@php
    use App\Helpers\Template;  
    use App\Models\AgenciesModel ;
    use App\Models\SettingModel ;

    $agenciesModel  = new AgenciesModel() ;
    $settingModel   = new SettingModel();
    
    $itemsSetting           = $settingModel->getItem('general', [ 'task' => 'get-item']); 
    $itemsSetting           = json_decode($itemsSetting['value']);
    $itemsSettingSocial     = $settingModel->getItem('social', [ 'task' => 'get-item-social']); 
    $itemsSettingSocial     = json_decode($itemsSettingSocial['value'], true);
    $listAgencies   = $agenciesModel->listItems(null,   [ 'task'=> 'news-list-items']) ;
    $index =1 ;
@endphp
<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row">
               @include('news.elements.child-footer.subscribe')
               @include('news.elements.child-footer.icon-social')
            </div><!-- End .row -->
        </div><!-- End .footer-top -->
    </div><!-- End .container -->

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                @include('news.elements.child-footer.info')
              
                <div class="col-lg-8">
                    {{-- DANH SÁCH CÁC CỬA HÀNG  --}}
                    <div class="row">
                        @include('news.elements.child-footer.agencies')
                        @include('news.elements.child-footer.box-featured')
                    </div>
                    @include('news.elements.child-footer.copy-right')
                  
                </div>
            </div>
        </div>
    </div>
</footer>
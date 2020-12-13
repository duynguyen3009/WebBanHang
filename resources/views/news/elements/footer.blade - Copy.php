@php
    use App\Helpers\Template;  
    use App\Models\AgenciesModel ;
    use App\Models\SettingModel ;

    $agenciesModel  = new AgenciesModel() ;
    $settingModel   = new SettingModel();
    
    $itemsSetting   = $settingModel->getItem('general', [ 'task' => 'get-item']); 
    $itemsSetting   = json_decode($itemsSetting['value']);
    $listAgencies   = $agenciesModel->listItems(null,   [ 'task'=> 'news-list-items']) ;
    $index =1 ;
@endphp
<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-9">
                    <div class="widget widget-newsletter">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="widget-title">Subscribe newsletter</h4>
                                <p>Get all the latest information on Events,Sales and Offers. Sign up for newsletter today</p>
                            </div><!-- End .col-lg-6 -->

                            <div class="col-lg-6">
                                <form action="#">
                                    <input type="email" class="form-control" placeholder="Email address" required>

                                    <input type="submit" class="btn" value="Subscribe">
                                </form>
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .widget -->
                </div><!-- End .col-md-9 -->

                <div class="col-md-3 widget-social">
                    <div class="social-icons">
                        <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                        <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>
                    </div><!-- End .social-icons -->
                </div><!-- End .col-md-3 -->
            </div><!-- End .row -->
        </div><!-- End .footer-top -->
    </div><!-- End .container -->

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h4 class="widget-title">Liên hệ</h4>
                        <ul class="contact-info">
                            <li>
                                <span class="contact-info-label">Địa chỉ :</span> {{ $itemsSetting->address }}
                            </li>
                            <li>
                                <span class="contact-info-label">Điện thoại:</span>Tư vấn : <a href="tel:">{{ $itemsSetting->hotline }}</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Email:</span> <a href="mailto:mail@example.com">{{ $itemsSetting->email }}</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Thời gian làm việc:</span>{{ $itemsSetting->time_work }}
                            </li>
                        </ul>
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->
              
                <div class="col-lg-8">
                    {{-- DANH SÁCH CÁC CỬA HÀNG  --}}
                    <div class="row">
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

                        <div class="col-md-4">
                            <div class="widget">
                                <h4 class="widget-title">Main Features</h4>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="links">
                                            <li><a href="#">Super Fast Magento Theme</a></li>
                                            <li><a href="#">1st Fully working Ajax Theme</a></li>
                                            <li><a href="#">20 Unique Homepage Layouts</a></li>
                                        </ul>
                                    </div><!-- End .col-sm-6 -->
                                   
                                </div><!-- End .row -->
                            </div><!-- End .widget -->
                        </div>
                        <div class="col-md-3">
                            <div class="widget">
                                <h4 class="widget-title">Main Features</h4>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="links">
                                            <li><a href="#">Super Fast Magento Theme</a></li>
                                            <li><a href="#">1st Fully working Ajax Theme</a></li>
                                            <li><a href="#">20 Unique Homepage Layouts</a></li>
                                        </ul>
                                    </div><!-- End .col-sm-6 -->
                                   
                                </div><!-- End .row -->
                            </div><!-- End .widget -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom" >
                <p style="text-align: center" class="footer-copyright">{{ $itemsSetting->copyright }}</p>
            </div>
        </div>
        
    </div>
    
</footer>
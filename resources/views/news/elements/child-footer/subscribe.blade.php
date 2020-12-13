@php 
    $link          = route("subscribef/getSubscribe", [ 'subscribe' => "new_value"]);
@endphp
<div class="col-md-9">
    <div class="widget widget-newsletter">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="widget-title">Theo dõi chúng tôi</h4>
                <p>Bạn hãy theo dõi chúng tôi, bằng cách gửi email về và những thông tin cần thiết sẽ được gửi đến bạn qua Email đó.</p>
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6">
                <form action="#">
                <input required type="email" name="subscribe" class="form-control"  placeholder="Địa chỉ Email" >
                    <input type="button" class="btn btn-subscribe" value="Theo dõi" data-url="{{ $link }}">
                    <div class="alert-success btn-success"></div>
                </form>
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .widget -->
</div><!-- End .col-md-9 -->
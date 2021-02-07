@php
    $value      = json_decode($items['value'], true);
    $hotline    = $value['hotline'];
    $email      = $value['email'];
    $address    = $value['address'];
    $time_work  = $value['time_work'];
@endphp
<div class="col-md-4">
    <h2 class="light-title"> <strong>Thông tin liên hệ</strong></h2>

    <div class="contact-info">
        <div>
            <i class="icon-phone"></i>
            <p><a href="tel:">{{ $hotline }}</a></p>
        </div>
        <div>
            <i class="icon-mobile"></i>
            <p><a href="tel:">{{ $hotline }}</a></p>
        </div>
        <div>
            <i class="icon-mail-alt"></i>
            <p><a href="mailto:#">{{ $email }}</a></p>
        </div>
        <div>
            <i class="icon-skype"></i>
            <p>{{ $hotline }}</p>
        </div>
    </div><!-- End .contact-info -->
</div><!-- End .col-md-4 -->
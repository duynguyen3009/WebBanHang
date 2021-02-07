<div class="col-md-8">
    <h2 class="light-title"> <strong>Lời nhắn</strong></h2>

    <form action="{{ route("$controllerName/postContact")}}" method="post" id="contact-form">
        <div class="form-group required-field">
            <label for="contact-name">Tên của bạn</label>
            <input type="text" class="form-control" id="name" name="name" required >
        </div><!-- End .form-group -->

        <div class="form-group required-field">
            <label for="contact-email">Email của bạn</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="contact-phone">Số điện thoại của bạn</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div><!-- End .form-group -->

        <div class="form-group required-field">
            <label for="contact-message">Bạn đang nghĩ gì ?</label>
            <textarea cols="30" rows="1" id="message" class="form-control" name="message" required></textarea>
        </div><!-- End .form-group -->

        <div class="form-footer">
            <button type="submit" class="btn btn-primary">Gửi</button>
        </div><!-- End .form-footer -->
    </form>
</div><!-- End .col-md-8 -->
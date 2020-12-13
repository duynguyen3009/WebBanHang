<div class="comment-respond">
    <h3>Bạn đang nghĩ gì</h3>
    <p>Thông tin của bạn sẽ được chúng tôi giữ riêng tư*</p>

    <form action="{{ route("$controllerName/postComment")}}" method="post">
        @csrf
        <div class="form-group required-field">
            <label>Bình luận của bạn(*)</label>
            <textarea name="description" cols="30" rows="1" class="form-control" required></textarea>
        </div><!-- End .form-group -->

        <div class="form-group required-field">
            <label>Tên(*)</label>
            <input type="text" name="name" class="form-control" required>
        </div><!-- End .form-group -->

        <div class="form-group required-field">
            <label>Email(*)</label>
            <input type="email" name="email" class="form-control" required>
        </div><!-- End .form-group -->

        <div class="form-group required-field">
            <label>Số điện thoại</label>
            <input type="text" name="phone" class="form-control">
        </div><!-- End .form-group -->

        <div class="form-footer">
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </div><!-- End .form-footer -->
    </form>
</div><!-- End .comment-respond -->
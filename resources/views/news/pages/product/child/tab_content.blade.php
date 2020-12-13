@php
    $content = $item['content'];
@endphp
<div class="tab-content">
    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
       <div class="product-desc-content">
         {!! $content !!}
       </div>
    </div>
   
    <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
       <div class="product-reviews-content">
          <div class="collateral-box">
             <ul>
                <li>Cảm nhận về sản phẩm của bạn như thế nào.</li>
             </ul>
          </div>
          <!-- End .collateral-box -->
          <div class="add-product-review">
            <form action="{{ route("article/postComment")}}" method="post">
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
          </div>
          <!-- End .add-product-review -->
       </div>
       <!-- End .product-reviews-content -->
    </div>
    <!-- End .tab-pane -->
 </div>
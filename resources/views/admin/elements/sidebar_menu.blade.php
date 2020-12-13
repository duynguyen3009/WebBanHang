<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('admin/img/img.jpg') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Xin chào,</span>
        <h2>Duy Nguyễn</h2>
    </div>
</div>
<br/>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('dashboard')  }}"><i class="fa fa-home">          </i> Trang quản lý          </a></li>
            <li><a href="{{ route('intro')      }}"><i class="fa fa-info">          </i> Giới thiệu             </a></li>
            <li><a href="{{ route('menu')       }}"><i class="fa fa-th-list">       </i> Menu    </a></li>
            <li><a href="{{ route('slider')     }}"><i class="fa fa-sliders">       </i> Silders                </a></li>
            <li><a><i class="fa fa fa-building-o"></i> Danh mục bài viết <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('categoryArticle')}}"></i> Danh mục </a></li>
                    <li><a href="{{ route('article')}}"></i> Bài viết     </a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-product-hunt"></i> Danh mục sản phẩm <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('categoryProduct')}}"></i> Danh mục </a></li>
                    <li><a href="{{ route('product')}}"></i> Sản phẩm    </a></li>
                    <li><a href="{{ route('tag')}}">    </i> Tag    </a></li>
                    <li><a href="{{ route('attribute')}}">    </i> Thuộc tính    </a></li>
                    <li><a href="{{ route('attributeGroup')}}">    </i> Nhóm thuộc tính    </a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-question"></i> Danh mục câu hỏi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('categoryQuestion')}}"></i> Danh mục </a></li>
                    <li><a href="{{ route('question') }}"></i>Câu hỏi</a></li>
                </ul>
            </li>
            <li><a href="{{ route('contact')    }}"> <i class="fa fa-phone">        </i> Yêu cầu liên hệ        </a></li>
            <li><a href="{{ route('script')     }}"> <i class="fa fa-code">         </i> Thêm đoạn mã           </a></li>
            <li><a href="{{ route('setting')    }}"> <i class="fa fa-cogs">         </i> Cấu hình               </a></li>
            <li><a href="{{ route('feedback')   }}"> <i class="fa fa-commenting">   </i> Cảm nhận khách hàng    </a></li>
            <li><a href="{{ route('agencies')   }}"> <i class="fa fa-university">   </i> Chi nhánh              </a></li>
            <li><a href="{{ route('partner')   }}">  <i class="fa fa-american-sign-language-interpreting"></i> Đối tác              </a></li>
            <li><a><i class="fa fa-video-camera"></i> Thư viện <span class="fa fa-chevron-down"></span>         </a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('image')}}"></i> Hình ảnh  </a></li>
                    <li><a href="{{ route('video')}}"></i> Video     </a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-truck"></i> Giao hàng <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('shipping')}}"></i> Phí vận chuyển  </a></li>
                    <li><a href="{{ route('coupon')}}"></i> Mã  giảm giá    </a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

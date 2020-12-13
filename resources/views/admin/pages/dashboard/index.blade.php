@extends('admin.main')
@section('content')
    @php
        use App\Models\ContactModel ;

        $contactModel = new ContactModel() ;
        $items        = $contactModel->getItem(null,['task' => 'get-item-no-contact-yet']) ;

        $arrTable =[ 
            ['total' =>  $totalUser,     'name'  => 'Người dùng'            ,  'icon'      => 'fa-users'        , 'link'  => route('user'),],
            ['total' =>  $totalSlider,   'name'  => 'Slider'                ,  'icon'      => 'fa-sliders'      , 'link'  => route('slider'),],
            ['total' =>  $totalCategory, 'name'  => 'Thư mục'               ,  'icon'      => 'fa-folder-open'  , 'link'  => route('category'),],
            ['total' =>  $totalArticle,  'name'  => 'Bài viết'              ,  'icon'      => 'fa-newspaper-o'  , 'link'  => route('article'),],  
            ['total' =>  $totalQuestion, 'name'  => 'Câu hỏi'               ,  'icon'      => 'fa-question'     , 'link'  => route('question'),],
            ['total' =>  $totalFeedback, 'name'  => 'Cảm nhận khách hàng'   ,  'icon'      => 'fa-smile-o'      , 'link'  => route('feedback'),],
            ['total' =>  $totalContact,  'name'  => 'Yêu cầu liên hệ'       ,  'icon'      => 'fa-phone'        , 'link'  => route('contact'),],
            ['total' =>  $totalProduct,  'name'  => 'Tổng sản phẩm'         ,  'icon'      => 'fa-product-hunt' , 'link'  => route('product'),],
            ['total' =>  $totalAgencies, 'name'  => 'Cửa hàng'              ,  'icon'      => 'fa-university'   , 'link'  => route('agencies'),],
            ['total' =>  $totalPartner,  'name'  => 'Đối tác'               ,  'icon'      => 'fa-american-sign-language-interpreting"' , 'link'  => route('partner'),],
        ];
    @endphp
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Trang quản lý</h3>
        </div>
    </div>
    {{-- MANAGER TOTAL DASHBOARD  --}}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý danh sách</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row top_tiles">
                        @foreach($arrTable as $key => $value)
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                <div class="icon"><i class="fa {!! $value['icon'] !!}"></i></div>
                                <div class="count">{!! $value['total']->count !!}</div>
                                <h3>{!! $value['name'] !!}</h3>
                                <a href="{!! $value['link'] !!}"><p>Đi đến trang</p></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- MANAGER LIST REQUEST CONTACT --}}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Yêu cầu liên hệ'])
                @if(!empty($items))
                    @include('admin.pages.dashboard.list' , ['items' => $items])
                    <div style="text-align:center">
                        <a class="btn btn-round btn-primary" href="{!! route('contact')!!}?filter_contact=no"> Xem danh sách</a>
                    </div>
                @else
                    <h3 style="text-align:center;color:red;padding: 2vw;"> Chưa có yêu cầu liên hệ mới</h3>
                @endif
            </div>
        </div>
        
      
    </div>

@endsection
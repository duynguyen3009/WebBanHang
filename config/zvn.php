<?php

return [
    'url'              => [
        'prefix_admin' => 'admin123',
        'prefix_news'  => '',
    ],
    'format'           => [
        'long_time'    => 'H:m:s d/m/Y',
        'short_time'   => 'd/m/Y',
    ],
    'template'         => [
        'form_input' => [
            'class' => 'form-control col-md-6 col-xs-12' ,
        ],

        'form_input_tag' => [
            'class' => 'form-control col-md-6 col-xs-12 input-tags-attr' ,
        ],
        'form_input_tag_select2' => [
            'class'     => 'form-control col-md-6 col-xs-12 tag-select' ,
            'name'      => 'tags[]',
            'multiple'  => 'multiple',
        ],
        'form_input_code' => [
            'class' => 'form-control col-md-6 col-xs-12',
            'style' => 'width:78%',
        ],
        'form_label' => [
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ],
        'form_label_article' => [
            'class' => 'control-label col-md-2 col-sm-2 col-xs-12'
        ],
        'form_label_edit' => [
            'class' => 'control-label col-md-4 col-sm-3 col-xs-12'
        ],
      
        'form_ckeditor' => [
            'class' => 'form-control col-md-6 col-xs-12 ckeditor'
        ],
        'status'       => [
            'all'      => ['name' => 'Tất cả', 'class' => 'btn-success'],
            'active'   => ['name' => 'Kích hoạt', 'class'      => 'btn-success'],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-info'],
            'block'    => ['name' => 'Bị khóa', 'class' => 'btn-danger'],
            'yes'      => ['name' => 'Đã liên hệ',   'class' => 'btn-success'],
            'no'       => ['name' => 'Chưa liên hệ', 'class' => 'btn-info'],
            'default'  => ['name' => 'Chưa xác định','class' => 'btn-success'],
        ],
        'promotion'       => [
            'direct'      => ['name' => 'Trực tiếp'],
            'percent'     => ['name' => 'Phần trăm'],
        ],
        'sort'       => [
            'default'                   => ['name' => 'Chọn kiểu lọc'],
            'new_to_old'                => ['name' => 'Lọc từ: Mới đến Cũ'],
            'old_to_new'                => ['name' => 'Lọc từ: Cũ đến Mới'],
            'promotion'                 => ['name' => 'Lọc sản phẩm được khuyến mãi'],
            'price_hight_to_short'      => ['name' => 'Lọc giá từ: cao đến thấp'],
            'price_short_to_hight'      => ['name' => 'Lọc giá từ: thấp đến cao'],
        ],
        'type_menu'       => [
            'normal'                => ['name' => 'Hiển thị bình thường'],
            'category_article'      => ['name' => 'Hiển thị kiểu danh mục bài viết'],
            'category_product'      => ['name' => 'Hiển thị kiểu danh mục sản phẩm'],
        ],
        'contact'       => [
            'yes'       => ['name' => 'Đã liên hệ', 'class'    => 'btn-success'],
            'no'        => ['name' => 'Chưa liên hệ', 'class'  => 'btn-danger'],
            'default'   => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        ],
        'is_home'       => [
            'yes'      =>  ['name'=> 'Hiển thị', 'class'=> 'btn-primary'],
            'no'        => ['name'=> 'Không hiển thị', 'class'=> 'btn-warning']
        ],
        'display'       => [
            'list'      => ['name'=> 'Danh sách'],
            'grid'      => ['name'=> 'Lưới'],
        ],
        'type' => [
            'featured'   => ['name'=> 'Nổi bật'],
            'normal'     => ['name'=> 'Bình thường'],
        ],
        'coupon' => [
            'percent'   => ['name'=> 'Phần trăm'],
            'direct'     => ['name'=> 'Trực tiếp'],
        ],
        'level'          => [
            'admin'      => ['name'=> 'Quản trị hệ thống'],
            'member'     => ['name'=> 'Người dùng bình thường'],
        ],
        'price' => [
            '0'             => ['name' => 'Miễn phí'],
            '10000'         => ['name' => '10.000 VNĐ'],
            '20000'         => ['name' => '20.000 VNĐ'],
            '30000'         => ['name' => '30.000 VNĐ'],
            '50000'         => ['name' => '50.000 VNĐ'],
            '100000'        => ['name' => '100.000 VNĐ'],
        ],
        'search'       => [
            'all'           => ['name'=> 'Search by All'],
            'id'            => ['name'=> 'Search by ID'],
            'name'          => ['name'=> 'Search by Name'],
            'username'      => ['name'=> 'Search by Username'],
            'fullname'      => ['name'=> 'Search by Fullname'],
            'email'         => ['name'=> 'Search by Email'],
            'phone'         => ['name'=> 'Search by Phone'],
            'description'   => ['name'=> 'Search by Description'],
            'link'          => ['name'=> 'Search by Link'],
            'content'       => ['name'=> 'Search by Content'],
            'question'      => ['name'=> 'Search by Question'],
            'answer'        => ['name'=> 'Search by Answer'],
            
        ],
        'button' => [
            'edit'      => ['class'=> 'btn-success' , 'title'=> 'Edit'      , 'icon' => 'fa-pencil' , 'route-name' => '/form'],
            'delete'    => ['class'=> 'btn-danger btn-delete'  , 'title'=> 'Delete'    , 'icon' => 'fa-trash'  , 'route-name' => '/delete'],
            'info'      => ['class'=> 'btn-info'    , 'title'=> 'View'      , 'icon' => 'fa-pencil' , 'route-name' => '/delete'],
        ]
            
    ],
    'config' => [
        'search' => [
            'default'           => ['all', 'id', 'fullname'],
            'slider'            => ['all', 'id', 'name', 'description', 'link'],
            'category'          => ['all', 'name'],
            'article'           => ['all', 'name', 'content'],
            'user'              => ['all', 'username', 'email', 'fullname'],
            'question'          => ['all', 'question', 'answer',],
            'video'             => ['link'],
            'contact'           => ['name','phone','email'],
            'attributeGroup'    => ['name'],
            'attribute'         => ['name'],
            'product'           => ['name'],
            'tag'               => ['name'],
            'categoryProduct'   => ['name'],
        ],
        'button' => [
            'default'           => ['edit', 'delete'],
            'slider'            => ['edit', 'delete'],
            'category'          => ['edit', 'delete'],
            'article'           => ['edit', 'delete'],
            'user'              => ['edit'],
            'question'          => ['edit','delete'],
            'video'             => ['edit','delete'],
            'contact'           => ['delete'],
            'feedback'          => ['edit','delete'],
            'shipping'          => ['edit','delete'],
            'coupon'            => ['edit','delete'],
            'attributeGroup'    => ['edit','delete'],
            'attribute'         => ['edit','delete'],
            'product'           => ['edit','delete'],
            'tag'               => ['edit','delete'],
            'categoryProduct'   => ['edit','delete'],
            'categoryArticle'   => ['edit','delete'],
            'categoryQuestion'  => ['edit','delete'],
            'menu'              => ['edit','delete'],
            'agencies'          => ['edit','delete'],
            'partner'          => ['edit','delete'],
        ]
    ]
    
];
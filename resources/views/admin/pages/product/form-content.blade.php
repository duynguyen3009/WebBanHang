
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\CategoryProductModel;
    use App\Models\TagModel;
    
    $formInputAttr          = config('zvn.template.form_input');
    $formInputTagSelect2    = config('zvn.template.form_input_tag_select2');
    $formInputAttrDropzone  = config('zvn.template.form_input_dropzone');
    $formLabelAttr          = config('zvn.template.form_label');
    $formCkeditor           = config('zvn.template.form_ckeditor');

    //========= Danh mục sản phẩm =====================
    $categoryProductModel = new CategoryProductModel();
    $itemsCategoryProduct = $categoryProductModel->listItems(null, ['task' => 'admin-get-name-in-selectbox']);
    ksort($itemsCategoryProduct);

    //============== Trạng thái=========================
    $statusValue      = ['default' => 'Chọn trạng thái', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    //==============Kiểu hiển thị===========================
    $typeValue        = ['default' => 'Chọn kiểu hiển thị', 'normal' => config('zvn.template.type.normal.name'), 'featured' => config('zvn.template.type.featured.name')];
    $tagPromotion     = ['default' => 'Chọn kiểu giảm giá', 'direct' => config('zvn.template.promotion.direct.name'), 'percent' => config('zvn.template.promotion.percent.name')];
    //==============TAG===========================
    $tagModel = new TagModel();
    $itemsTag = $tagModel->listItems(null, ['task' => 'admin-get-name']);
    
    $inputHiddenID    = Form::hidden('id', $item['id']);
    $elements = [
        [
            'label'   => Form::label('name', 'Tên sản phẩm(*)', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr ),
            'type'    => 'article',
        ],
        [
            'label'   => Form::label('price', 'Giá sản phẩm(*)', $formLabelAttr),
            'element' => Form::text('price', $item['price'],  $formInputAttr ),
            'type'    => 'article',
        ],
        [
            'label'   => Form::label('category_product_id', 'Danh mục(*)', $formLabelAttr),
            'element' => Form::select('category_product_id', $itemsCategoryProduct, $item['category_product_id'], $formInputAttr),
            'type'    => 'article',
        ],
        [
            'label'   => Form::label('type', 'Kiểu hiển thị(*)', $formLabelAttr),
            'element' => Form::select('type', $typeValue, $item['type'], $formInputAttr),
            'type'    => 'article',
        ], [
            'label'   => Form::label('content', 'Nội dung(*)', $formLabelAttr),
            'element' => Form::textArea('content', $item['content'],  $formCkeditor ),
            'type'    => "article"
        ],
        [
            'label'   => Form::label('status', 'Trạng thái(*)', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'], $formInputAttr),
            'type'    => 'article',
        ],
        [
            'label'   => Form::label('tag', 'Tag', $formLabelAttr),
            'element' => Form::select('tag', $itemsTag, json_decode($item['tags']),  $formInputTagSelect2 ),
            'type'    => 'article',
        ],
        [
            'label'   => Form::label('status', 'Kiểu giảm giá', $formLabelAttr),
            'element' => Form::select('promotion', $tagPromotion, $item['promotion'], $formInputAttr),
            'type'    => 'article',
        ],[
            'label'   => Form::label('value', 'Giá trị', $formLabelAttr),
            'element' => Form::text( 'value_promotion', $item['value_promotion'], $formInputAttr),
            'type'    => 'article',
        ]
       
    ];
@endphp


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Quản lý sản phẩm'])
        <div class="x_content">
            {!! FormTemplate::show($elements)  !!}
        </div>
    </div>
</div>
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\AttributeGroupModel; 
    use App\Models\AttributeModel; 
    use App\Http\Controllers\Admin\ProductController; 


    $attributeModel = new AttributeModel();
    $attribute      = $attributeModel->getItem(null, ['task' => 'admin-get-name-attribute-group']);
    $formInputAttr  = config('zvn.template.form_input');
    $formLabelAttr  = config('zvn.template.form_label');
    $attributeGroup                 = new AttributeGroupModel();
    $itemsAttributeGroup            = $attributeGroup->listItems(null, ['task' => 'admin-list-items-in-selectbox']);
    $itemsAttributeGroup[0] = 'Chọn nhóm thuộc tính';
    ksort($itemsAttributeGroup);
    $link       = route($controllerName . '/getAttribute', ['id' => 'new_value']);
    $linkAddRow = route("$controllerName/addPriceRowNoChangePrice");
    $xhtml = null;
    $inputHiddenID    = Form::hidden('attribute_group_id', $item['attribute_group_id']);
   
    $elements = [
        [
            'label'   => Form::label('attribute_group_id', 'Nhóm thuộc tính', $formLabelAttr),
            'element' => Form::select('attribute_group_id', $itemsAttributeGroup, null, ['name' => 'attribute_group_id' ,'id' => 'attribute-attribute_group_id', 'class' => 'form-control col-md-6 col-xs-12 attribute_group', 'data-url' => $link ])
        ],
    ];
    // $attribute  =  json_decode(json_encode(json_decode($item['attribute']), true)); 
@endphp

<div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel ">
    @include('admin.templates.x_title', ['title' => 'Quản lý thuộc tính không thay đổi giá'])
   
    @if(!empty($item['id'])) 
        @if (!empty(json_decode($item['attribute'], true)))
            @php
                $attribute = json_decode($item['attribute'], true);
                
            @endphp
            @foreach($attribute as $key => $value)
            @php
                $valueAttr = implode(',', json_decode($value['value']));
                $item      = $attributeModel->getItem($value['name'], ['task' => 'admin-get-name-attribute']);
            @endphp
                    <div class="form-group new" id="attr">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" class="form-control" name="attribute[newattr][{{$item['id']}}][name]" value="{{$item['name']}}">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        <input class="form-control input-tags-attr" name="attribute[newattr][{{$item['id']}}][value]" type="text" value="{{$valueAttr}}" >
                    </div>
                    {!!$inputHiddenID !!}
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <a style="margin-left: 162px;" class="btn btn-sm btn-danger btn-rounded btn-delete-no-change-price-edit">X</a>
                    </div>
                    </div>
            @endforeach
        @else
            <div class="x_content_attribute" id="sortable">
                {!! FormTemplate::show($elements)!!} 
                    <div class="list-product-no-change-price"></div>
                    <button type="button" class="btn btn-success btn-add-attribute-no-change-price" style="margin-top: 10px; margin-left: 155px;" data-link = "{{$linkAddRow}}">Thêm thuộc tính</button>
            </div>
            {!!$inputHiddenID !!}
        @endif
    @else
        <div class="x_content_attribute" id="sortable">
            {!! FormTemplate::show($elements)!!} 
                <div class="list-product-no-change-price"></div>
                <button type="button" class="btn btn-success btn-add-attribute-no-change-price" style="margin-top: 10px; margin-left: 155px;" data-link = "{{$linkAddRow}}">Thêm thuộc tính</button>
        </div>
    @endif
    
</div>
</div>

<script>  
$(document).ready(function () {
    $('.input-tags-attr').tagsInput();
});
</script>
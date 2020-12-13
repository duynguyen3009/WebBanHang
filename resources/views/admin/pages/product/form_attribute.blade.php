@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\AttributeGroupModel; 
    use App\Models\AttributeModel; 
    $attributeModel = new AttributeModel();
    $attribute      = $attributeModel->getItem(null, ['task' => 'admin-get-name-attribute-group']);
    $formInputAttr  = config('zvn.template.form_input');
    $formLabelAttr  = config('zvn.template.form_label');
    $attributeGroup                 = new AttributeGroupModel();
    $itemsAttributeGroup            = $attributeGroup->listItems(null, ['task' => 'admin-list-items-in-selectbox']);
    $itemsAttributeChangePrice      = $attributeModel->listItems(null, ['task' => 'admin-list-items-in-selectbox-change-price']);
    $itemsAttributeGroup['default']              = 'Chọn nhóm thuộc tính';
    $itemsAttributeChangePrice['default']        = 'Chọn nhóm thuộc tính';
    ksort($itemsAttributeGroup);
    ksort($itemsAttributeChangePrice);
    $link       = route($controllerName . '/getAttribute', ['id' => 'attribute_new']);
    $linkAddRow = route("$controllerName/add-price-row");
    $xhtml = null;
   
    if (!isset($item['id'])) {
        $elements = [
            [
                'label'   => Form::label('attribute_group_id', 'Nhóm thuộc tính', $formLabelAttr),
                'element' => Form::select('attribute_group', $itemsAttributeGroup, $item['attribute_group_id'], ['id' => 'attribute-group' , 'class' => 'form-control col-md-6 col-xs-12 attribute_group', 'onchange' => "showName('$link')"])
            ],
            [
                'label'   => Form::label('attribute_group', 'Thuộc tính thay đổi giá', $formLabelAttr),
                'element' => Form::select('attribute_group_change_price', $itemsAttributeChangePrice, $item['attribute_group_id'], ['id' => 'attribute-group-change-price' , 'class' => 'form-control col-md-6 col-xs-12', 'data-link' => route("$controllerName/add-price-row")])
            ],
        ];
    }else{
        if (isset($item['attribute_name_price_custom'])) {
            $priceCustom                = json_decode($item['price_custom'], true);
            $xhtml = null;
            $xhtml .= sprintf('<label id="attribute_name_label" class="label label-success" style="font-size: 16px">%s</label>', $item['attribute_name_price_custom']);
            $nameAttr   = json_decode($priceCustom['name']);
            $valueAttr  = json_decode($priceCustom['value']);
            $arr[]      = array_combine($nameAttr, $valueAttr);
            foreach ($arr[0] as $key => $value) {
                $xhtml .= sprintf('
                        <div class="form-group price-row">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="price_custom_name[]" value="%s" placeholder="Tên">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="price_custom_value[]" value="%s" placeholder="Giá">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-sm btn-danger btn-rounded btn-delete-price-row">X</button>
                            </div>
                        </div>
                ', $key, $value);
            }
        }

        if (isset($item['attribute'])) {
            $attributeModel = new AttributeModel();
            $attributes = json_decode($item['attribute'], true);
            
            foreach ($attributes as $key => $value) {   
                $itemAttribute      = $attributeModel->getItem($value['name'], ['task' => 'admin-get-name-attribute']);
                $valueV = implode(',', json_decode($value['value']));
                $xhtml .= sprintf('<div class="form-group" id="attr">
                                    <label  class="control-label col-md-3 col-sm-3 col-xs-12">%s</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control input-tags-attr col-md-6 col-xs-12" name="attribute[%s][]" type="text" value="%s">
                                    </div>
                                    </div>',$itemAttribute[0]['name'], $itemAttribute[0]['id'], $valueV, $itemAttribute[0]['id']
                        );
            }
        }
        
    }
                
@endphp

<div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel ">
    @include('admin.templates.x_title', ['title' => 'Quản lý thuộc tính'])
    @if (!isset($item['id']))
        <div class="x_content_attribute" id="sortable">
            {!! FormTemplate::show($elements)  !!}
            <label id="attribute_name_label" class="label label-success" style="font-size: 16px"></label>
            <div class="price-list list-draggable" style="margin-top: 10px">

            </div>
            <button type="button" class="btn btn-success btn-add-attribute-price" style="margin-top: 10px; display: none">Thêm thuộc tính</button>
        </div>
    @else
        <div class="x_content_attribute attribute-group-change-price" id="sortable" data-link = "{{$linkAddRow}}">
            {!! $xhtml !!}
            <div class="price-list list-draggable" style="margin-top: 10px">

            </div>
            <button type="button" class="btn btn-success btn-add-attribute-price-edit" style="margin-top: 10px; ">Thêm thuộc tính</button>
        </div>
    @endif
    
</div>
</div>

<script>  
$(document).ready(function () {
    $('.input-tags-attr').tagsInput();
});
</script>
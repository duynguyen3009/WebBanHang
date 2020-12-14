@php

    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\AttributeGroupModel; 
    use App\Models\AttributeModel; 
    use App\Models\PriceProductModel; 
    $attributeModel = new AttributeModel();

    $formInputAttr  = config('zvn.template.form_input');
    $formLabelAttr  = config('zvn.template.form_label');
    $attributeGroup                 = new AttributeGroupModel();
    $priceProductModel              = new PriceProductModel();
    $itemsAttributeGroup            = $attributeGroup->listItems(null, ['task' => 'admin-list-items-in-selectbox']);
    $itemsAttributeGroup['default'] = 'Chọn nhóm thuộc tính';
    ksort($itemsAttributeGroup);
    $inputHiddenID          = Form::hidden('attribute_name_price_custom', $item['attribute_name_price_custom']);
    $link                   = route($controllerName . '/getAttributeChangePrice', ['id' => 'new_value']);
    $linkAddRow             = route("$controllerName/add-price-row");
    $xhtml = null;
    if (!isset($item['id'])) {
        $elements = [
            [
                'label'   => Form::label('attribute_group', 'Nhóm thuộc tính', $formLabelAttr),
                'element' => Form::select('attribute_name_price_custom', $itemsAttributeGroup, $item['attribute_group_id'], ['id' => 'attribute-group-change-price' , 'class' => 'form-control col-md-6 col-xs-12 attribute-group-change-price', 'data-url' => $link])
            ],
        ];
    }else{
     
        if (isset($item['attribute_name_price_custom'])) {
            $priceCustom            = json_decode($item['price_custom'], true);
            
            $nameAttrGroup          = $attributeGroup->getItem($item['attribute_name_price_custom'], ['task' => 'admin-get-item-in-product']);
            $xhtml  = null;
            $xhtml .= sprintf('<label id="attribute_name_label" class="label label-success" style="font-size: 16px">%s</label>', $nameAttrGroup['name']);
            $nameAttr   = json_decode($priceCustom['name']);
            $valueAttr  = json_decode($priceCustom['value']);
            // $arr        = array_combine($nameAttr, $valueAttr);
            foreach ($item['price_product_list'] as $itemPriceProduct) {
                $xhtml .= sprintf('
                            <div class="form-group price-row" style="margin-top: 21px">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="price_custom_name[]" value="%s" placeholder="Tên">
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control attribute_price" name="price_custom_value[]" value="%s" placeholder="Giá" data-id="%s" data-name="%s">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-sm btn-danger btn-rounded btn-delete-change-price-edit">X</button>
                                    </div>
                                    <input type="hidden" name="id_price_product" value="">
                            </div>
                    ', $itemPriceProduct['attr_value'], $itemPriceProduct['price'], $itemPriceProduct['id'],$itemPriceProduct['attr_value']);
            }
        }
    }
                
@endphp

<div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel ">
    @include('admin.templates.x_title', ['title' => 'Quản lý thuộc tính thay đổi giá'])
    @if (!isset($item['id']))
        <div class="x_content_attribute-change_price" id="sortable">
            {!! FormTemplate::show($elements)  !!}
            <div class="list-product-change-price"></div>
            <div class="price-list list-draggable" style="margin-top: 10px">
            </div>
            <button type="button" data-link = "{{$linkAddRow}}" class="btn btn-success btn-add-attribute-change-price" style="margin-top: 10px; display: unset; margin-left: 155px;">Thêm thuộc tính</button>
        </div>
    @else
        <div class="x_content_attribute-change_price attribute-group-change-price" id="sortable">
            {!! $xhtml !!}
            {!! $inputHiddenID !!}
            <div class="price-list list-draggable" style="margin-top: 10px">
            </div>
            <button type="button" class="btn btn-success btn-add-attribute-price-edit" style="margin-top: 10px; ">Thêm thuộc tính</button>
        </div>
    @endif
    <input type="hidden" name="csrf-token" value="{{ Session::token() }}" />
</div>
</div>

<script>  
$(document).ready(function () {
    $('.input-tags-attr').tagsInput();
    
    $('.attribute_price').blur(function() {
        var new_value = $(this).val();
		var old_value = $(this).attr('value');
        if(old_value != new_value) {
            let csrf_token = $("input[name=csrf-token]").val();
            var attr_price = {};
            attr_price['id'] = $(this).data('id');
            attr_price['price'] = new_value;

            var attr_product = [];
            $.each( $('.attribute_price'), function( key, value ) {
                    var tmp = {};
                    tmp['name'] = $(value).data('name');
                    tmp['value'] = $(value).val();
                    attr_product.push(tmp);
                });
            var product = Object.assign({}, attr_product);
            var product_id = $('input[name=id]').val();
            $.ajax({
				type: "POST",
				url: "{{route('product/updateAttrPrice')}}",
                data: {attr_price : attr_price, product: product, product_id : product_id},
                headers: {'X-CSRF-TOKEN': csrf_token},
				success: function(result) {
					if(result) alert('success');
				}
			});
		} 
    });
});
</script>
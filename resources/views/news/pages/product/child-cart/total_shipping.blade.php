@php
   use App\Models\ShippingModel;
   $shippingModel = new ShippingModel();
   $items = $shippingModel->listItems(null, ['task' => 'news-list-items']);
   $link  = route('productf/getPriceShipping', ['id' => 'new_value']);
@endphp
<div class="form-group form-group-sm">
    <label>Thành phố</label>
    <div class="select-custom">
         <select class="form-control form-control-sm shipping" data-url="{{ $link }}">
            <option value="default">Chọn thành phố</option>
            @foreach ($items as $item)
               <option value="{{ $item['id']}}">{{ $item['name']}}</option>
            @endforeach
         </select>
    </div>
</div>
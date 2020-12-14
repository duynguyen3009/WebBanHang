@php
    $sortValue      = [
                        'default'                   => config('zvn.template.sort.default.name'),
                        'new_to_old'                => config('zvn.template.sort.new_to_old.name'),
                        'old_to_new'                => config('zvn.template.sort.old_to_new.name'),
                        // 'promotion'                 => config('zvn.template.sort.promotion.name'),
                        'price_hight_to_short'      => config('zvn.template.sort.price_hight_to_short.name'),
                        'price_short_to_hight'      => config('zvn.template.sort.price_short_to_hight.name')
                    ];
    $link = route($controllerName . '/sort', ['sort' => 'new_value']);
@endphp
<nav class="toolbox">
    <div class="toolbox-left">
        <div class="toolbox-item toolbox-sort">
            <div class="select-custom">
            <select name="orderby" class="form-control btn-sort" style="width: 250px" data-url="{{ $link }}">
                    @foreach ($sortValue as $key => $item)
                        <option value="{{ $key }}" >{{ $item }}</option>
                    @endforeach
            </select>
            </div><!-- End .select-custom -->
        </div><!-- End .toolbox-item -->
    </div><!-- End .toolbox-left -->
</nav>
@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
    use App\Helpers\SelectBox as SelectBox;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên sản phẩm</th>
                    <th class="column-title">Hình ảnh</th>
                    <th class="column-title">Giá sản phẩm</th>
                    <th class="column-title">Danh mục sản phẩm</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Kiểu hiển thị</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $thumb                  = json_decode($val['thumb'], true);
                            $index                  = $key + 1;
                            $class                  = ($index % 2 == 0) ? "even" : "odd";
                            $id                     = $val['id'];
                            $name                   = Hightlight::show($val['name'], $params['search'], 'name');
                            $thumb                  = Template::showItemThumbUpload($thumb, $val['name']);
                            $price                  = number_format($val['price']) . ' VNĐ';
                            $categoryProductName    = SelectBox::showCategoryProductChangeAjax($controllerName, $val , $val['category_product_id'],'category');
                            $type                   = SelectBox::showItemSelect($controllerName, $id, $val['type'], 'type');
                            $status                 = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $createdHistory         = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory        = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction          = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="10%">{!! $name !!}</td>
                            <td>{!! $thumb !!}</td>
                            <td>{!! $price !!}</td>
                            <td>{!! $categoryProductName !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $type !!}</td>
                            <td class="last">{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
           
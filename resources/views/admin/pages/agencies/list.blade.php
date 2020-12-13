@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Thông tin cửa hàng</th>
                    <th class="column-title">Hình ảnh</th>
                    <th class="column-title">Sắp xếp</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index           = $key + 1;
                            $class           = ($index % 2 == 0) ? "even" : "odd";
                            $id              = $val['id'];
                            $address         = $val['address'];
                            $ordering        = Template::showItemOrdering($controllerName,$id,$val['ordering']);
                            $name            = Hightlight::show($val['name'], $params['search'], 'name');
                            $description     = Hightlight::show($val['description'], $params['search'], 'description');
                            $thumb           = Template::showItemThumb($controllerName, $val['thumb'], $val['name']);;
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="40%">
                                <p><strong>Tên:</strong> {!! $name !!}</p>
                                <p><strong>Mô tả:</strong> {!! $description!!}</p>
                                <p><strong>Địa chỉ:</strong> {!! $address !!}</p>
                            </td>
                            <td style="width:20em">{!! $thumb !!}</td>
                           
                            <td>{!! $ordering !!}</td>
                            <td>{!! $status !!}</td>
                 
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
           
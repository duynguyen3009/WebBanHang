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
                    <th class="column-title">Thông tin khách hàng</th>
                    <th class="column-title">Hình ảnh</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Đánh giá</th>
                    {{-- <th class="column-title">Tạo mới</th>
                    <th class="column-title">Chỉnh sửa</th> --}}
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
                            $star            = $val['combostar'];   
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
                                <p><strong>Cảm nhận:</strong> {!! $description!!}</p>
                                
                            </td>
                            <td style="width:250px; height:250px">{!! $thumb !!}</td>
                            <td>{!! $status !!}</td>
                            <td> 
                                @for($i = 1; $i <= $star ; $i++)
                                    <a href="#"><span class="fa fa-star"></span></a>                                   
                                @endfor
                            </td>
                            {{-- <td>{!! $createdHistory !!}</td> --}}
                            {{-- <td>{!! $modifiedHistory !!}</td> --}}
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
           
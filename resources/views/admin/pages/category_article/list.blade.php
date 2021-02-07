@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
    use App\Helpers\SelectBox as SelectBox;
    use App\Helpers\Nested as Nested;
@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên</th>
                    <th class="column-title">Sắp xếp</th>
                    <th class="column-title">Hiển thị trang chủ</th>
                    <th class="column-title">Trạng thái</th>
                    {{-- <th class="column-title">Đường dẫn</th> --}}
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $name            = Template::getName($val); 
                            $index           = $key + 1;
                            $class           = ($index % 2 == 0) ? "even" : "odd";
                            $id              = $val['id'];
                            $link            = $val['link'];
                            $isHome          = Template::showItemIsHome($controllerName, $id, $val['is_home']);
                            $ordering        = Nested::showIconOrderingNestedArticle($controllerName,$val,$prefix = '' , 'CategoryArticleModel'); 
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer" style="text-align: center">
                            <td>{{ $index }}</td>
                            <td> {!! $name !!}</td>
                            <td> {!! $ordering !!}</td>
                            <td>{!! $isHome !!}</td>
                            <td>{!! $status !!}</td>
                            {{-- <td>{!! $link !!}</td> --}}
                   
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
           
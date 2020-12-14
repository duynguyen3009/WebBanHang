@php
    use App\Helpers\Template as Template;
    use App\Helpers\SelectBox as SelectBox;
    use App\Helpers\Hightlight as Hightlight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Thông tin bài viết</th>
                    <th class="column-title">Hình ảnh</th>
                    <th class="column-title">Danh mục</th>
                    <th class="column-title">Kiểu bài viết</th>
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
                            $name            = Hightlight::show($val['name'], $params['search'], 'name');
                            $content         = Template::showContent(Hightlight::show($val['content'], $params['search'], 'content'),200) ;
                            $thumb           = Template::showItemThumb($controllerName, $val['thumb'], $val['name']);

                            $categoryName    = SelectBox::showCategoryArticleChangeAjax($controllerName, $val , $val['category_id'],'category');

                            $status          = Template::showItemStatus($controllerName, $id, $val['status']); 
                            $type            = SelectBox::showItemSelect($controllerName, $id, $val['type'], 'type');
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="30%">
                                <p><strong>Tên :</strong> {!! $name !!}</p>
                                <p><strong>Nội dung:</strong> {!! $content !!}</p>
                            </td>
                            <td width="14%">
                                <p>{!! $thumb !!}</p>
                            </td>
                            <td >{!! $categoryName !!}</td>
                            <td>{!! $type   !!}</td>
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

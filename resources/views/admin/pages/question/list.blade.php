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
                    <th class="column-title">Câu hỏi và trả lời</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Danh mục</th>
                    <th class="column-title">Sắp xếp</th>
                    <th class="column-title">Tạo mới</th>
                    <th class="column-title">Chỉnh sửa</th>
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
                            $ordering        = Template::showItemOrdering($controllerName,$id,$val['ordering']);
                            $categoryName    = SelectBox::showCategoryQuestionChangeAjax($controllerName, $val , $val['question_id'],'category');
                            $question        = Hightlight::show($val['question'], $params['search'], 'question') ;
                            $answer          = Template::showContent(Hightlight::show($val['answer'], $params['search'], 'answer'),300);
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp
                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="40%">
                                <p><strong>Câu hỏi:</strong> {!! $question !!}</p>
                                <p><strong>Trả lời:</strong> {!! $answer !!}</p>
                            </td>
                            <td>{!! $status !!}</td>
                            <td>{!! $categoryName !!}</td>
                            <td>{!! $ordering !!}</td>
                            <td>{!! $createdHistory !!}</td>
                            <td>{!! $modifiedHistory !!}</td>
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
           
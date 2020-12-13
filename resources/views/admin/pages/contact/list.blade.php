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
                    <th class="column-title">Tên</th>
                    <th class="column-title">Điện thoại</th>
                    <th class="column-title">Email</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Liên hệ bởi</th>
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
                            $name            = Hightlight::show($val['name'] , $params['search'], 'name');
                            $phone           = Hightlight::show($val['phone'], $params['search'], 'phone');
                            $email           = Hightlight::show($val['email'], $params['search'], 'email');
                            $status          = Template::showItemContact($controllerName, $id, $val['contact']); ;
                            $modifiedHistory = Template::showItemHistory($val['contact_by'], $val['created_date']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp
                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td >{!! $name !!}</td>
                            <td >{!! $phone !!}</td>
                            <td >{!! $email !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $modifiedHistory !!}</td>
                            <td>{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
           
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label_article');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    $statusValue          = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $elements = [
        [
            'label'   => Form::label('name', 'Tên', $formLabelAttr),
            'element' => Form::text('name', $item['name'],  $formInputAttr ),
            'type'    => "article"
        ],[
            'label'   => Form::label('content', 'Nội dung', $formLabelAttr),
            'element' => Form::textArea('content', $item['content'],  $formCkeditor ),
            'type'    => "article"
        ],[
            'label'   => Form::label('status', 'Trạng thái', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'],  $formInputAttr),
            'type'    => "article"
        ],[
            'label'   => Form::label('category_id', 'Danh mục', $formLabelAttr),
            'element' => Template::showSelectBoxProductNested($item,$itemsCategory,'category_id') ,
            'type'    => "article"
        ],[
            'label'   => Form::label('thumb', 'Hình ảnh', $formLabelAttr),
            'element' => Form::file('thumb', $formInputAttr ),
            'thumb'   => (!empty($item['id'])) ? Template::showItemThumb($controllerName, $item['thumb'], $item['name']) : null ,
            'type'    => "thumb"
        ]
    ];
@endphp
<div class="col-md-8 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Bài viết'])
            {!! FormTemplate::show($elements)  !!}
    </div>
</div>  
<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<script>
	  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
	    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
	  };
	  CKEDITOR.replace('content', options);
</script>
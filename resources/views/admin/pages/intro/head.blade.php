@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\ScriptModel ;

    $formInputAttr = config('zvn.template.form_input');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    $formLabelAttr = config('zvn.template.form_label');
   
    $idHideen      = Form::hidden('id'  , $items['id']) ;
   
  
    $elements = [
        [
            'label'   => "",
            'element' => Form::textArea('content', $items['content'], $formInputAttr ),
            'type'    => 'intro'
        ],[
            'element' => $idHideen .Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp
@include ('admin.templates.error')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                {{ Form::open([
                    'method'         => 'POST', 
                    'url'            => route("$controllerName/save"),
                    'accept-charset' => 'UTF-8',
                    'enctype'        => 'multipart/form-data',
                    'class'          => 'form-horizontal form-label-left',
                    'id'             => 'main-form' ])  }}
                    {!! FormTemplate::show($elements)  !!}
                {{ Form::close() }}
            </div>
        </div>
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
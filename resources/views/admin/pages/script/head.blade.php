@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\ScriptModel ;

    $scriptModel = new ScriptModel();
    $item        = $scriptModel->getItem( 'head' , ['task' => 'get-item']); 
    $formInputAttr = config('zvn.template.form_input');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    $formLabelAttr = config('zvn.template.form_label');
    $nameHideen    = Form::hidden('name', 'head') ;
    $idHideen      = Form::hidden('id'  , $item['id']) ;
    $elements = [
        [
            'label'   => Form::label('script', 'Script', $formLabelAttr),
            'element' => Form::textArea('script', $item['script'], $formInputAttr )
        ],[
            'element' => $idHideen . $nameHideen.Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp
@include('admin.pages.script.content') ;

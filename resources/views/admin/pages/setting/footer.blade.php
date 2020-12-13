@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\ScriptModel ;

    $scriptModel = new ScriptModel();
    $item        = $scriptModel->getItem( 'footer' , ['task' => 'get-item']); 

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $nameHideen    = Form::hidden('name', 'footer') ;
    $idHideen      = Form::hidden('id'  , $item['id']) ;
    $elements = [
        [
            'label'   => Form::label('script', 'Script', $formLabelAttr),
            'element' => Form::textarea('script', $item['script'], $formInputAttr )
        ],[
            'element' => $idHideen . $nameHideen . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp
@include('admin.pages.script.content') ;

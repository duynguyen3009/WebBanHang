@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\SettingModel ;

    $formInputAttr       = config('zvn.template.form_input');
    $formLabelAttr       = config('zvn.template.form_label');

    $settingModel        = new SettingModel();
    $itemEmail        = $settingModel->getItem( 'social' , ['task' => 'get-item']); 
    if(!empty($itemEmail )){
        $item                = json_decode(json_encode(json_decode($itemEmail['value'])), true); 
        $item['id']          = !empty($itemEmail['id']) ? $itemEmail['id'] : null;
    }else{
       $item = NULL ;
    }
    $inputHiddenID       = Form::hidden('id', $item['id']);
    $inputKeyValue       = Form::hidden('key_value','social');
    $inputHiddenRequest  = Form::hidden('socialHidden','social');
    $elements = [
        [
            'label'   => Form::label('facebook', 'Facebook', $formLabelAttr),
            'element' => Form::text('facebook', $item['facebook'], $formInputAttr),
        ],[
            'label'   => Form::label('youtube', 'Youtube', $formLabelAttr),
            'element' => Form::text('youtube',$item['youtube'],$formInputAttr),
        ],[
            'element' => $inputHiddenID.$inputKeyValue.$inputHiddenRequest. Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit-edit"
        ]
    ];
@endphp
@include('admin.pages.setting.content') ;

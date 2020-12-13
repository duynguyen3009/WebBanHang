@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\SettingModel ;

    $formInputAttr       = config('zvn.template.form_input');
    $formLabelAttr       = config('zvn.template.form_label');

    $settingModel        = new SettingModel();
    $itemEmail        = $settingModel->getItem( 'email' , ['task' => 'get-item']); 
    if(!empty($itemEmail )){
        $item                = json_decode(json_encode(json_decode($itemEmail['value'])), true); 
        $item['id']          = !empty($itemEmail['id']) ? $itemEmail['id'] : null;
    }else{
       $item = NULL ;
    }
    $inputHiddenID       = Form::hidden('id', $item['id']);
    $inputKeyValue       = Form::hidden('key_value','email');
    $inputHiddenRequest  = Form::hidden('emailHidden','email');
    $elements = [
        [
            'label'   => Form::label('email', 'Email', $formLabelAttr),
            'element' => Form::email('email', $item['email'], $formInputAttr),
        ],[
            'label'   => Form::label('password', 'Password', $formLabelAttr),
            'element' => Form::text('password',$item['password'],$formInputAttr),
        ],[
            'label'   => Form::label('bcc', 'BCC', $formLabelAttr),
            'element' => Form::text('bcc', $item['bcc'],$formInputAttr),
        ],[
            'element' => $inputHiddenID.$inputKeyValue.$inputHiddenRequest. Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit-edit"
        ]
    ];
@endphp
@include('admin.pages.setting.content') ;

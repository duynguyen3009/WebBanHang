
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;
    use App\Models\SettingModel ;

    $settingModel        = new SettingModel();
    $itemGeneral         = $settingModel->getItem( 'general' , ['task' => 'get-item']); 
    if(!empty($itemGeneral)){
        $item            = json_decode(json_encode(json_decode($itemGeneral['value'])), true); 
        $item['id']      = !empty($itemGeneral['id']) ? $itemGeneral['id'] : null;
    }else{
       $item = NULL ;
    }
 
    $formCkeditor        = config('zvn.template.form_ckeditor');
    $formInputAttr       = config('zvn.template.form_input');
    $formLabelAttr       = config('zvn.template.form_label');
    $inputHiddenAvatar   = Form::hidden('logo_current', $item['logo']);
    $inputKeyValue       = Form::hidden('key_value','general');
    $inputID             = Form::hidden('id',$item['id']);
    $inputHiddenRequest  = Form::hidden('generallHidden','general');

    $elements = [
        [
            'label'   => Form::label('logo','Logo', $formLabelAttr),
            'element' => Form::file('logo', $formInputAttr),
            'avatar'  => (!empty($item['id'])) ? Template::showItemThumb($controllerName, $item['logo'], null) : null ,
            'type'    => "avatar"
        ],[
            'label'   => Form::label('hotline','Hotline', $formLabelAttr),
            'element' => Form::text('hotline', $item['hotline'], $formInputAttr ),
        ],[
            'label'   => Form::label('email','Email', $formLabelAttr),
            'element' => Form::text('email', $item['email'], $formInputAttr ),
        ],[
            'label'   => Form::label('copyright', 'Copyright', $formLabelAttr),
            'element' => Form::text('copyright', $item['copyright'],  $formInputAttr )
        ],[
            'label'   => Form::label('time_work', 'Thơi gian làm việc', $formLabelAttr),
            'element' => Form::text('time_work', $item['time_work'],  $formInputAttr )
        ],[
            'label'   => Form::label('address', 'Địa chỉ', $formLabelAttr),
            'element' => Form::text('address', $item['address'], $formInputAttr)
        ],[
            'label'   => Form::label('introduce', 'Giới thiệu', $formLabelAttr),
            'element' => Form::textarea('introduce', $item['introduce'], $formCkeditor)
        ],
        [
            'element' =>  $inputID.$inputKeyValue.$inputHiddenRequest.$inputHiddenAvatar. Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
        ]
    ];
@endphp

@include('admin.pages.setting.content') ;
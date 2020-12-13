@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $elements = [
        [
            'label'   => Form::label('title', 'Tiêu đề ', $formLabelAttr),
            'element' => Form::textArea('title_seo', $item['title_seo'],  $formInputAttr ),
            'type'    => "article"
        ],[
            'label'   => Form::label('description', 'Mô tả', $formLabelAttr),
            'element' => Form::textArea('description_seo', $item['description_seo'],  $formInputAttr ),
            'type'    => "article"
        ]
    ];
@endphp
 
<div class="col-md-4 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'SEO'])
            {!! FormTemplate::show($elements)  !!}
    </div>
</div>
    



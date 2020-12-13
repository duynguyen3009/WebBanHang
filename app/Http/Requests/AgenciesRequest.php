<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenciesRequest extends FormRequest
{
    private $table            = 'agencies';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->id;

        $condName = "bail|required|between:5,100|unique:$this->table,name";
        $condThumb= 'bail|required|image|max:500';

        if(!empty($id)){
            $condName .= ",$id";
            $condThumb = 'bail|image|max:500';
        }

        return [
            'name'          => $condName,
            'description'   => 'bail|required|min:5',
            'status'        => 'bail|in:active,inactive',
            'thumb'         => $condThumb
        ];
    }
    public function messages()
    {
        return [
            
            'description_seo.required' => 'Mô tả không được rỗng',
            'description_seo.min'      => 'Mô tả ít nhất 5 ký tự',
            // 'name.min'      => 'Name :input chiều dài phải có ít nhất :min ký tứ',
        ];
    }
    public function attributes()
    {
        return [
            // 'description' => 'Field Description: ',
        ];
    }
}

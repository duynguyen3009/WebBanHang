<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    private $table            = 'attribute';
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

        // $condName       = "bail|required|between:1,100";
        // $condPrice      = "bail|required|between:1,100";
        // $condLink       = "bail|required|between:1,100";
        // $condTag        = "bail|required|between:1,100";
        // $condContent    = "bail|required|between:1,10000";
        // // $condThumb      = "bail|required|between:1,100";

        // if(!empty($id)){ // edit
        //     $condName  .= ",$id";
        // }
        return [
            // 'name'              => $condName,
            // 'price'             => $condPrice,
            // 'thumb'             => $condThumb,
            // 'link'              => $condLink,
            // // 'tag'               => $condTag,
            // 'content'           => $condContent,
            // 'status'            => 'bail|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Name không được rỗng',
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

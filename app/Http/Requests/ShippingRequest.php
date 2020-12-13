<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
{
    private $table            = 'shipping';
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

        return [
            'name'    => 'bail|required',
            'price'   => 'bail|integer',
            'status'  => 'bail|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'Tên không được rỗng',
            'price.integer'    => 'Vui lòng chọn giá tiền',
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

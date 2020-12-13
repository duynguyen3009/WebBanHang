<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    private $table            = 'setting';

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
     
        $id                      = $this->id;
        $task                    = $this->task;
        if(isset($this->generallHidden))       {$task = 'setting-general';} 
        if(isset($this->emailHidden))          {$task = 'setting-email';} 
        if(isset($this->sociallHidden))         {$task = 'setting-social';} 

        $condEmail     = '';
        $condPass      = '';
        $condBCC       = '';
        $condName      = '';
        $condLink      = '';
        $condLogo      = '';
        $condLogoGeneral       = '';
        $condHotline           = '';
        $condCopyRight         = '';
        $condTimeWord          = '';
        $condAddress           = '';
        $condSlogan            = '';
        $condIntroduce         = '';

      
       switch ($task) {
           case 'setting-email':
               $condEmail      = "bail|required|between:5,100|email";
               $condPass       = 'bail|required|between:5,100';
               $condBCC        = "bail|required|between:5,100|email";
               break;
           case 'setting-general':
               $condLogo   = 'bail|required|image|max:500';
               if(!empty($id)){ // edit
                   $condLogo = 'bail|image|max:500';
               }
               $condLogoGeneral       = 'bail|required|image|max:500';
               $condHotline           = "bail|required|between:5,100";
               $condCopyRight         = "bail|required|between:5,100";
               $condTimeWord          = "";
               $condAddress           = "bail|required|between:5,100";
               $condSlogan            = "bail|required|between:5,100";
               $condIntroduce         = "bail|required|between:5,1000";
               break;
           default:
               break;
       }

        return [
            'email'      => $condEmail,
            'password'   => $condPass,
            'bcc'        => $condBCC,
            'name'       => $condName,
            'link'       => $condLink,
            'logo'       => $condLogo,
            'hotline'    => $condHotline,
            'copyright'  => $condCopyRight,
            'time_word'  => $condTimeWord,
            'address'    => $condAddress,
            'introduce'  => $condIntroduce,
           
        ];
    }
    public function messages()
    {
        return [
            // 'title_seo.required'       => 'Tiêu đề không được rỗng',
            // 'title_seo.min'            => 'Tiêu đề ít nhất 5 ký tự',
            // 'description_seo.required' => 'Mô tả không được rỗng',
            // 'description_seo.min'      => 'Mô tả ít nhất 5 ký tự',
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

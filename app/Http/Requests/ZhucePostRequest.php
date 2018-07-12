<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ZhucePostRequest extends Request
{
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
           
            'pass'          => 'required|regex:/^[a-zA-Z0-9_]{6,18}$/',
            'repass'        => 'required|same:pass',
            'email'         =>  'required|regex:/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/',
         
        ];
        
    }
    public function messages()
    {
    
        return [
           
            'pass.required'         =>'密码不能为空',
            'pass.regex'            =>'密码不合法',
            'repass.required'       =>'确认密码必填',
            'repass.same'           =>'密码不一致',
            'email.required'        =>  '邮箱不能为空',
            'email.regex'           =>  '邮箱的格式不正确',
           
        ];

    }
}

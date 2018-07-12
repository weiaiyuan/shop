<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ZhucetowPostRequest extends Request
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
            'phone'         =>  'required|regex:/^[1][3,4,5,7,8][0-9]{9}$/',
         
        ];
        
    }
    public function messages()
    {
    
        return [
           
            'pass.required'         =>'密码不能为空',
            'pass.regex'            =>'密码不合法',
            'repass.required'       =>'确认密码必填',
            'repass.same'           =>'密码不一致',
            'phone.required'        =>  '手机号不能为空',
            'phone.regex'           =>  '手机号格式不正确'
           
        ];

    }
}

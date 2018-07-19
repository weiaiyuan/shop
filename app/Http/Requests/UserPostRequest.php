<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserPostRequest extends Request
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
            'uname'         =>  'required|unique:shop_users|regex: /^\w{8,20}$/',
            'pass'          => 'required|regex:/^[a-zA-Z0-9_]{6,18}$/',
            'repass'        => 'required|same:pass',
            'email'         =>  'required|regex:/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/',
            'phone'         =>  'required|regex:/^[1][3,4,5,7,8][0-9]{9}$/',
        ];
        
    }
    public function messages()
    {
    
        return [
            'uname.required'        =>  '用户名不能为空',
            'uname.unique'          =>  '用户名已经存在',
            'pass.required'         =>'密码不能为空',
            'pass.regex'            =>'密码不合法',
            'repass.required'       =>'确认密码必填',
            'repass.same'           =>'密码不一致',
            'uname.regex'           =>  '用户名格式不正确',
            'email.required'        =>  '邮箱不能为空',
            'email.regex'           =>  '邮箱的格式不正确',
            'phone.required'        =>  '手机号不能为空',
            'phone.regex'           =>  '手机号格式不正确'
        ];

    }
}

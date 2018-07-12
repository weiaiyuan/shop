<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BsPostRequest extends Request
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
            'user'         =>  'required',
            'pass'          => 'required|regex:/^[a-zA-Z0-9_]{6,18}$/',
          
        ];
        
    }
    public function messages()
    {
    
        return [
            'user.required'        =>  '用户名不能为空',
            'pass.required'         =>  '密码不能为空',
            'pass.regex'            =>  '用户名或密码错误',
           
        ];
    }
}

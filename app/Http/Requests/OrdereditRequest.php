<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrdereditRequest extends Request
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
            'phone' =>  'required|regex:/^[1][3,4,5,7,8][0-9]{9}$/',
        ];
    }

    public function messages()
    {
    
        return [
            'phone.required' =>  '手机号不能为空',
            'phone.regex'    =>  '手机号格式不正确'
        ];

    }    
}

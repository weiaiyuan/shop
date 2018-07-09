<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodInsertRequest extends Request
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
            //
            'gname' => 'required',
                'price' => 'required|regex:/[0-9]+/',
                'title' => 'required',
                'gpic' => 'required',
                'desc' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'gname.required'=>'名称未填写',
            'price.required'=>'价格未填写',
            'price.regex'=>'价格请输入数字',
            'title.required'=>'主题未填写',
            'gpic.required'=>'图片未提交',
            'desc.required'=>'描述未填写',
        ];
    }
}

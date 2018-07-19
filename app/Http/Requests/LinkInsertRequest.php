<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkInsertRequest extends Request
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
            'lname' => 'required|unique:shop_link',
            'url' => 'required|unique:shop_link',
            'limg' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'lname.required'=>'链接名称未填写',
            //正则限制：'cname.regex'=>'格式不正确',
            'lname.unique'=>'名称已存在',
            'url.unique' => '请输入正确的地址',
            'url.required'=>'链接地址未填写',
            'limg.required' => '链接图片未选中',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateInsertRequest extends Request
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
             'cname' => 'required|unique:shop_cates',
        'pid' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'cname.required'=>'名称未填写',
            //正则限制：'cname.regex'=>'格式不正确',
            'cname.unique'=>'名称已存在',
            'pid.required'=>'类别未选择',
        ];
    }
}

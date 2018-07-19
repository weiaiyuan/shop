<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class ActivityRequest extends Request
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
        'title'=>'required',
        'price'=>'required',
        'day'=>'required',
        'content'=>'required',
            //
        ];
    }
    public function messages()
    {
        return[
        'title.required'=>'名称未填写',
        'price.required'=>'图片未提交',
        'day.required'=>'过期时间未提交',
        'content.required'=>'缺少内容'
        ];
    }
}

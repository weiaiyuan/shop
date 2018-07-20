<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdInsertRuquest extends Request
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
     * 字段限定条件
     *
     * @return array
     */
    public function rules()
    {
         return [
            'gname' => 'required',
            'pid' => 'required',
            'gurl' => 'required',
            'start' => 'required',
            'end' => 'required',
            'file' => 'required',
        ];
    }

     /**
     * 限定提示信息
     *
     * @return array
     */
    public function messages()
    {
         return [
            'gname.required' => '名称必填',
            'pid.required' => '位置必填',
            'gurl.required' => '地址必填',
            'start.required' => '选择开始时间',
            'end.required' => '选择结束时间',
            'file.required' => '请选择图片',
        ];
    }
}

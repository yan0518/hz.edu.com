<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentsRequest extends Request
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

    public function rules()
    {
        return [
            'name' => 'required|max:20|alpha_dash',
            'school' => 'required',
            'birth_date' => 'nullable|Date|before_or_equal:today',
            'grade' => 'required',
            'p_name' => 'required',
            'p_contact' => 'required',
        ];
    }

   public function messages()
   {
       return [
            'name.required' => "请输入姓名",
            'name.max' => "姓名长度不超过20个字",
            'school.required' => "请输入学校",
            'grade.required' => "请输入年级",
            'p_name.required' => "请输入父母姓名",
            'p_contact.required' => "请输入父母联系方式",
       ];
   }
}

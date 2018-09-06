<?php

namespace App\Http\Requests;

use Couchbase\WildcardSearchQuery;
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

//    public function messages()
//    {
//        return [
//        ];
//    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validate_education extends FormRequest
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
            'university_name' => 'required',
            'graduation_date' => 'required',
            'country_institute' => 'required',
            'add_major' => 'required',
            'add_field' => 'required',
            'add_course' => 'required',
            'add_grade' => 'required',
            'add_qualification' => 'required',
        ];
    }
}

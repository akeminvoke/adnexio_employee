<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'position'  => 'required',
            'company_name'  => 'required',
            'jd-start-year'  => 'required',
            'jd_start_month'  => 'required',
            'jd_end_year'  => 'required',
            'jd_end_month'  => 'required',
            'specialization'  => 'required',
            'position_level'  => 'required',
            'salary'  => 'required',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validate_experience extends FormRequest
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

            'position' => 'required',
            'company_name' => 'required',
            'jd_start_year' => 'required',
            'jd_start_month' => 'required',
            'specialization' => 'required',
            //'position_level' => 'required',
            'salary' => 'required',
            'job_spec' => 'required',

        ];
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class educations extends Model
{
    use SoftDeletes;
    protected $table = 'educations';
    protected $fillable = ['id', 'user_id', 'university_name','countries_id','other_academic_field','other_course','states_id','courses_id','academic_fields_id','major','grade','cgpa','desc','graduation_date','qualifications_id'];
    protected $dates =['deleted_at'];



    public function saveEducation($request)
    {
        $user = Auth::user();

        $this->university_name = $request['university_name'];
        $this->graduation_date = $request['graduation_date'];
        $this->user_id = $user->id;
        $this->countries_id = $request['country_institute'];
        // $add_education->states_id = $request['state_institute'];
        $this->major = $request['add_major'];


        $this->grade = $request['add_grade'];
        $this->qualifications_id = $request['add_qualification'];
        $this->cgpa = $request['add_cgpa'];
        $this->other_uni = $request['add_others_uni'];
        $this->desc = $request['add_information'];
        if ($request['add_field'] ==='Others') {
            $this->other_academic_field = $request['add_oth_academic_field'];
            $this->other_course = $request['add_oth_course'];
         }
         else
        {
            $this->academic_fields_id = $request['add_field'];
            $this->courses_id = $request['add_course'];
        }
        $this->save();


    }

    public function updateEducation($request)
    {
        $education = educations::find($request['id']);
        $education->university_name = $request['institute_name'];
        $education->other_uni = $request['others_institute_name'];
        $education->qualifications_id = $request['qualification'];
        $education->graduation_date = $request['graduation_date'];
        $education->countries_id = $request['country_institute'];

        if($request['field']==='79')
        {
            $education->academic_fields_id = 79;
            $education->courses_id = 79 ;
            $education->other_academic_field = $request['oth_field'];
            $education->other_course = $request['oth_course'];
        }
        else
        {
            $education->other_academic_field = null;
                 $education->other_course = null;
            $education->academic_fields_id = $request['field'];
            $education->courses_id = $request['course'];
        }

        $education->major = $request['major'];
        $education->grade = $request['grade'];
        $education->cgpa = $request['cgpa'];
        $education->desc = $request['information'];

        $education->save();

    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class educations extends Model
{
    protected $fillable = ['id', 'user_id', 'university_name','countries_id','states_id','courses_id','academic_fields_id','major','grade','cgpa','desc','graduation_date','qualifications_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class educations extends Model
{
    use SoftDeletes;
    protected $table = 'educations';
    protected $fillable = ['id', 'user_id', 'university_name','countries_id','states_id','courses_id','academic_fields_id','major','grade','cgpa','desc','graduation_date','qualifications_id'];
    protected $dates =['deleted_at'];

}

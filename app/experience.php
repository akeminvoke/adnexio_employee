<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class experience extends Model
{
    use SoftDeletes;
    protected $table = 'experiences';

    protected $fillable = [
        'id','user_id','company_id','position','position_level','specialization_id','start_year','start_month','end_month','end_year','salary','industry_id','job_desc','job_specifications_id','pjs'
    ];

    protected $dates =['deleted_at'];


    public function company() {
        return $this->belongsTo('App\company');
    }

    public function industry() {
        return $this->hasone('App\industry');
    }

    public function user()
    {
        return $this->hasMany('App\User',experience_id,id);
    }
}


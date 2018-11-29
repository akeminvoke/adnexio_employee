<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    protected $fillable = [
        'id','user_id','company_id','position','position_level','specialization','start_year','start_month','end_month','end_year','salary','industry_id','industry_id',
    ];


    public function company() {
        return $this->belongsTo('App\company');
    }

    public function industry() {
        return $this->hasone('App\industry');
    }
}


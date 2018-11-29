<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = [
        'id','name','industry_id','type','address','description','logo'
    ];
}

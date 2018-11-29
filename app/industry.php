<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class industry extends Model
{
    protected $fillable = [
        'id','name',
    ];

//    public function experience() {
//        return $this->belongsTo('App\experience');
//    }

    public function experience() {
        return $this->belongsto('App\experience');
    }
}




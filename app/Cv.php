<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'id', 'user_id', 'filename'
    ];


    public function User()
    {
        return $this->belongsTo('App\User');
    }

}

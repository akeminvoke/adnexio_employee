<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'id', 'filename', 'User_id'
    ];


    public function User()
    {
        return $this->belongsTo('App\User');
    }

}

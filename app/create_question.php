<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class create_question extends Model
{
    protected $fillable = [
        'id', 'question',
    ];
}

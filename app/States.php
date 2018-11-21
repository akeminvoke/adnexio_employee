<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $fillable = [
        'id', 'name', 'country_id'
    ];
	
	
	public function user() {
		return $this->belongsTo('App\User');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $fillable = [
        'profile_id', 'user_id', 'ic_no', 'contact_no', 'address', 'address1', 'postal_code', 'city', 'state', 'country', 'dob', 'gender'
    ];
	
	
	public function user() {
		return $this->belongsTo('App\User');
	}
}

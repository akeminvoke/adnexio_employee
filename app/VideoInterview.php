<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoInterview extends Model
{
	
	protected $fillable = [
        'video_id','video_name', 'eye_blink'
    ];
	
	
    public function user() {
		return $this->belongsTo('App\User');
	}
}

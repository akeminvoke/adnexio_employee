<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoInterview extends Model
{
	
	protected $fillable = [
        'user_id', 'video_name', 'assessment_id', 'eye_blink', 'fidget_value', 'created_at'
    ];
	
	
	
    public function user() {
		return $this->belongsTo('App\User');
	}
}

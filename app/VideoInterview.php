<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoInterview extends Model
{
	
	protected $fillable = [
        'user_id', 'video_name', 'assessment_id', 'eye_blink', 'video_duration', 'fidget_value', 'text', 'created_at'
    ];
	
	
	
    public function user() {
		return $this->belongsTo('App\User');
	}
}

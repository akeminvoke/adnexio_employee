<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personality extends Model
{
	
	use SoftDeletes;
	//protected $primaryKey = 'user_id';
	
	
	protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('assessment_id', '=', $this->getAttribute('assessment_id'));
        return $query;
    }
	
    protected $fillable = [
        'personality_id', 'user_id', 'assessment_id', 'score'
    ];
	
	
	protected $dates = ['deleted_at' => 'date:hh:mm'];
	
	public function user() {
		return $this->belongsTo('App\User');
	}
	
}

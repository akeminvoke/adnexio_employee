<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'google_id', 'role_id', 'name', 'email', 'password', 'ic_no', 'contact_no', 'address', 'dob', 'gender', 'nationality', 'profile_images', 'is_activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role() {
        return $this->belongsTo('App\Role');
    }


    public function isAdmin() {

        if ($this->role->name == 'Administrator') {
            return true;
        }
        return false;
    }
	
	public function videos() {
        return $this->hasMany('App\VideoInterview');
    }

    public function Cvs() {
        return $this->hasMany('App\Cv');
    }

}

<?php

namespace App;



use App\Notifications\ResetPassword as ResetPasswordNotification;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','google_id','is_activated','profile_images','experience_id'
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

    public function experience(){
        return $this->hasMany('App\experience')->select(['id','salary','user_id']);

	}
	  public function personalities() {
        return $this->hasMany('App\Personality');

    }

}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fb_id',
        'role_id',
        'photo_id',
        'address',
        'city',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin(){
        if($this->role != NULL) {
            if ($this->role->name == "administrator") {
                return true;
            }
        }
        return false;
    }

    public function isAuthor(){
        if($this->role != NULL) {
            if ($this->role->name == "author" || $this->role->name == "administrator") {
                return true;
            }
        }
        return false;
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
    public function photo(){
        return $this->belongsTo('App\Models\Photo', 'photo_id');
    }
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    public function pages(){
        return $this->hasMany('App\Models\Page');
    }
    public function projects(){
        return $this->hasMany('App\Models\Project');
    }

}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function roles() {
        return $this->belongsToMany('App\Role', 'role_users');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeHasPostName(Builder $query, string $name)
    {
        $query->whereHas('posts', function (Builder $query) use ($name) {
            $query->where('name', $name);
        });
    }

    public function scopeIsAdmin(Builder $query, $user_id) {
        $query->whereHas('roles', function (Builder $query) use ($user_id){
            return $query->where('user_id', $user_id);
        });
    }
    
}


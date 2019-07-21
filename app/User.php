<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'active'
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

    public function getRole()
    {
        return $this->hasOne('App\Role', 'id', 'role_id')->first();
    }

    public function getPermissions()
    {
        $role = $this->getRole();
        if ($role) {
            return $role->getPermissions();
        }
        return [];
    }

    public function roleIs()
    {
        if ($role = $this->hasOne('App\Role', 'id', 'role_id')->first()) {
            return $role->role;
        }
        return false;
    }

    public function isAdmin()
    {
        $userRole = $this->hasOne('App\Role', 'id', 'role_id')->first();
        if ($userRole->role === 'admin') {
            return true;
        }
        return false;
    }
}

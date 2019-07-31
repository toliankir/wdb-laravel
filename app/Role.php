<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role', 'homepage'
    ];

    // public function getPermissions() {
    //     return $this->hasMany('App\Permission', 'role_id', 'id')->orderBy('order', 'asc')->get();
    // }

    public function getActions() {
        return $this->belongsToMany('App\Action', 'roles_actions');
    }
}

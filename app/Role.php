<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role'
    ];

    public function getPermissions() {
        return $this->hasMany('App\Permission', 'role_id', 'id')->orderBy('order', 'asc')->get();
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'body', 'created_by'
    ];

    public function creator(){
        return $this->hasOne('App\User', 'id', 'created_by')->first()->name;
    }
}

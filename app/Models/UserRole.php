<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = ['user_id', 'role_id', 'created_at','updated_at'];

    function  users(){
        return $this->hasMany('App\Models\User', 'users');
    }
    function  roles(){
        return $this->hasOne('App\Models\Role', 'roles');
    }
}

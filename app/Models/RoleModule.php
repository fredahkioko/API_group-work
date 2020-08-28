<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModule extends Model
{
    protected $fillable = ['role_id', 'module_id', 'created_at', 'updated_at'];

    function modules()
    {
        return $this->belongsTo('App\Models\Module', 'modules');
    }
    function roles()
    {
        return $this->belongsTo('App\Models\Role', 'roles');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Role;

class Resource extends Model
{
    public function role() {
        return $this->belongsToMany(Role::Class, 'permissions');
    }
}

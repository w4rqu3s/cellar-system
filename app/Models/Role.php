<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Resource;

class Role extends Model
{
    public function resource() {
        return $this->belongsToMany(Resource::class, 'permissions');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Role;
use App\Models\Resource;

class Permission extends Model
{
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function resource() {
        return $this->belongsTo(Resource::class);
    }
}

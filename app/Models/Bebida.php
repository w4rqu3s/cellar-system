<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Tipo;
use App\Models\User;

class Bebida extends Model
{
    use SoftDeletes;

    public function tipo() {
        return $this->belongsTo(Tipo::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

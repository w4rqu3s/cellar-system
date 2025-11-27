<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Bebida;

class Tipo extends Model
{
    use SoftDeletes;

    public function bebidas() {
        return $this->belongsToMany(Bebida::class);
    }
}

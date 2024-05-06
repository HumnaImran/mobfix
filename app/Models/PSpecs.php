<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PSpecs extends Model
{
    use HasFactory;

    public function ProductSpecs()
    {
        return $this->hasMany(ProductSpecs::class);
    }
}

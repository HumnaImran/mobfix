<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store_images extends Model
{
    protected $fillable = [
        'store_id',
        'image',
    ];
    use HasFactory;
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecs extends Model
{
    use HasFactory;
    protected $fillable = [
        'spec_id',
        'value',
        'product_id',
    ];
    public function pspecs()
    {
        return $this->belongsTo(PSpecs::class,'spec_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

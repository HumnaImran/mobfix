<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyClaim extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_names',
        'email',
        'phone_number',
        'claim_type',
        'store_id',
        'product_id',
        'user_id',
        'claim_information',
        'agree_to_receive_newsletters',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

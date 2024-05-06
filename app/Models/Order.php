<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[

        'user_id' ,
        'product_id' ,
        'store_id' ,
        'quantity' ,
        'status',
        'price',
        'address_id',
        'user_address_id'
    ];
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

  public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function address()
    {
        return $this->belongsTo(UserAddresses::class, 'address_id');
    }
    public function userAddress()
{
    return $this->belongsTo(UserAddresses::class, 'user_address_id');
}

public function adminAddress()
{
    return $this->belongsTo(UserAddresses::class, 'address_id');
}
}

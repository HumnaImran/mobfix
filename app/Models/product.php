<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'status',
        'category_id',
        'price','store_id',
    ];
    public $appends=['avg_rating'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getAvgRatingAttribute(){
        return [$this->reviews->avg('rating')??0,$this->reviews()->count()];
    }


    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function images()
    {
        return $this->hasMany(Product_images::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class,'product_id');
    }
        public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function ProductSpecs()
    {
        return $this->hasMany(ProductSpecs::class);
    }
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }


    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favourite_products')->withTimestamps();
    }
public function warrantyClaims()
    {
        return $this->hasMany(WarrantyClaim::class);
    }
}

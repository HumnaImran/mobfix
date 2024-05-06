<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairOrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'post_code',
        'phone_no',
        'device_code',
        'info',
        'store_id',
        'user_id',
        'repair_type_id',
        'shipmentdata'
    ];
    public function images()
    {
        return $this->hasMany(RepairOrderDetailsImages::class);
    }
    public function repairType()
    {
        return $this->belongsTo(RepairTypes::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

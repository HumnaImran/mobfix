<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairOrderDetailsImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'repair_order_details_id',
        'image',
    ];

    public function repairOrderDetails()
    {
        return $this->belongsTo(RepairOrderDetails::class);
    }

}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'store_id',
        'subject',
        'complaint_details',
    ];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}

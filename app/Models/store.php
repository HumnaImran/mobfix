<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'phone_no',
        'wa_number',
        'description',
        'status',
        'city',
        'joining_date',

        'taxPayer_number',
        'businessLicense',
        'proofOfIdentity',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Store_images::class);
    }
    public function orders()
    {
        return $this->hasMany(RepairOrderDetails::class,'store_id');
    }

    public function feedbackForms()
    {
        return $this->hasMany(FeedbackForm::class);
    }

    public function warrantyClaims()
    {
        return $this->hasMany(WarrantyClaim::class);
    }

}

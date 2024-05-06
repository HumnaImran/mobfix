<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'last_name',
        'date_of_birth',
        'gender',
        'address',
        'phone_number',
        'country',
        'city',
        'profile_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

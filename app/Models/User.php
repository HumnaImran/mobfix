<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;


use Spatie\Permission\Models\Permission;
use HPWebdeveloper\LaravelPayPocket\Models\WalletsLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use HPWebdeveloper\LaravelPayPocket\Traits\ManagesWallet;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use HPWebdeveloper\LaravelPayPocket\Interfaces\WalletOperations;

class User extends Authenticatable implements WalletOperations
{


    use HasApiTokens, HasFactory, Notifiable , HasRoles;
    use ManagesWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'facebook_id',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
    public function Productreviews()
    {
        return $this->hasMany(ProductReview::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function address()
    {
        return $this->hasOne(UserAddresses::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public function receivedMessages()
    {
        return $this->hasMany(ChMessage::class, 'to_id');
    }

    public function sentMessages()
    {
        return $this->hasMany(ChMessage::class, 'from_id');
    }
    public function chat()
    {

        return $this->hasMany(ChMessage::class, 'to_id')->orWhere('from_id', $this->id);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favourte_products')->withTimestamps();
    }
    public function warrantyClaims()
    {
        return $this->hasMany(WarrantyClaim::class);
    }
    public function Userprofile()
    {
        return $this->hasOne(UserProfile::class);
    }
    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'owner_id');
    }
    public function walletLogs(): HasManyThrough
    {
        return $this->hasManyThrough(WalletsLog::class, Wallet::class, 'owner_id', 'loggable_id' );
    }
    public function isAdmin()
    {

        return $this->hasRole('admin');
    }

    public function isVendor()
    {

        return $this->hasRole('vendor');
    }
}

<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Booking;
use App\Models\EventBooking;
use App\Traits\SendsVerificationCode;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, Notifiable, SendsVerificationCode;

    protected $fillable = [
        'full_name',
        'username',
        'email',
        'phone',
        'password',
        'email_verified_at',
        'profile_image',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'verification_code',
        'is_verified',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function reviews()
{
    return $this->hasMany(Review::class);
}

public function bookings(): HasMany
{
    return $this->hasMany(Booking::class);
}

// Define event bookings relationship
public function eventBookings(): HasMany
{
    return $this->hasMany(EventBooking::class);
}


}
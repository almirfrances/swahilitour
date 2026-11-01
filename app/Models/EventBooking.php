<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'booking_type',
        'discount_percentage', // Added to the fillable attributes
        'price',
        'status',
        'payment_proof'
    ];

    /**
     * Get the event associated with the booking.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user who made the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriceAfterDiscountAttribute()
    {
        return $this->price * (1 - $this->discount_percentage / 100);
    }
}
<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bookable_type',
        'bookable_id',
        'room_id',
        'start_date',
        'end_date',
        'guests',
        'guest_type',
        'children_count',
        'total_price',
        'status',
        'payment_proof',
        'tour_name',
        'destination',
        'discount',
        'discount_amount',
        'room_name',
        'room_type',
        'hotel_name',
        'room_price',
    ];

    /**
     * Get the user who made the booking.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the bookable model (hotel or tour) that the booking belongs to.
     */
    public function bookable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the room that was booked (only for hotel bookings).
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
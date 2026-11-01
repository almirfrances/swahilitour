<?php

namespace App\Models;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id',
        'room_name',
        'price',
        'capacity',
        'room_type',
        'is_available',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'decimal:2',        // Handles price with two decimal places
        'is_available' => 'boolean',   // Handles availability flag as boolean
    ];

    /**
     * Get the hotel that owns the room.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }


}
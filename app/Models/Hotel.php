<?php

namespace App\Models;

use App\Models\Amenity;
use App\Models\Destination;
use App\Models\Review;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hotel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'destination_id',
        'slug',
        'images',
        'overview',
        'amenities',
        'status',
        'starting_price',
        'featured',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',      // Handles images as an array
        // 'amenities' => 'array',   // Handles amenities as an array
        'featured' => 'boolean',  // Handles featured flag as boolean
        'starting_price' => 'decimal:2', // Handles starting price with two decimal places
    ];

    /**
     * Get the destination associated with the hotel.
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Get the rooms for the hotel.
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    /**
     * Accessor to retrieve Amenity models from the amenities array.
     *
     * This assumes that amenities are stored as an array of Amenity IDs.
     * If stored differently (e.g., names), adjust the query accordingly.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAmenitiesModelsAttribute()
    {
        if (is_array($this->amenities)) {
            return Amenity::whereIn('id', $this->amenities)->get();
        }

        return collect();
    }

    protected static function boot()
    {
        parent::boot();

        // Automatically generate slug when creating
        static::creating(function ($hotel) {
            if (empty($hotel->slug)) {
                $hotel->slug = Str::slug($hotel->name);
            }
        });

        // Automatically update slug when updating, if name changes
        static::updating(function ($hotel) {
            if ($hotel->isDirty('name')) {
                $hotel->slug = Str::slug($hotel->name);
            }
        });
    }

//     public function amenities()
//     {
//         return $this->belongsToMany(Amenity::class, 'amenity_hotel', 'hotel_id', 'amenity_id');
//     }

    public function amenities()
{
    return $this->belongsToMany(Amenity::class, 'amenity_hotel', 'hotel_id', 'amenity_id');
}

public function reviews()
{
    return $this->morphMany(Review::class, 'reviewable');
}
}
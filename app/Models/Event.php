<?php

namespace App\Models;

use App\Models\Amenity;
use App\Models\Destination;
use App\Models\Promo;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'destination_id',
        'images',
        'event_plan',
        'slug',
        'residential_price_single',
        'foreign_price_single',
        'couple_foreign_price',
        'couple_residential_price',
        'discount_percentage',
        'status',
        'amenities',
        'overview',
        'duration',
        'includes',
         'excludes'
    ];

    protected $casts = [
        'images' => 'array', // Automatically casts JSON to array
        'amenities' => 'array',
        'event_plan' => 'array', // Automatically casts JSON to array
        'amenities' => 'array', // Automatically casts JSON to array
        'includes' => 'array',
        'excludes' => 'array'
    ];

    // Automatically create/update slug when the name is set
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Define relationship with Type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Define relationship with Destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function event()
    {
        return $this->hasMany(Promo::class);
    }

    // Helper function to calculate the discounted price for single residential
    public function getDiscountedResidentialPriceSingleAttribute()
    {
        return $this->residential_price_single * (1 - $this->discount_percentage / 100);
    }

    // Helper function to calculate the discounted price for single foreign
    public function getDiscountedForeignPriceSingleAttribute()
    {
        return $this->foreign_price_single * (1 - $this->discount_percentage / 100);
    }

    // Helper function to calculate the discounted price for couple residential
    public function getDiscountedCoupleResidentialPriceAttribute()
    {
        return $this->couple_residential_price * (1 - $this->discount_percentage / 100);
    }

    // Helper function to calculate the discounted price for couple foreign
    public function getDiscountedCoupleForeignPriceAttribute()
    {
        return $this->couple_foreign_price * (1 - $this->discount_percentage / 100);
    }

    public function amenities()
{
    return $this->hasMany(Amenity::class);
}


}
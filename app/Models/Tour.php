<?php

namespace App\Models;

use App\Models\Review;
use App\Models\TourView;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'duration',
        'min_age',
        'type_id',
        'destination_id',
        'overview',
        'amenities',
        'includes',
        'excludes',
        'tour_plan',
        'images',
        'featured',
        'video_link',
    ];

    protected $casts = [
        'includes' => 'array',
        'excludes' => 'array',
        'tour_plan' => 'array',
        'images' => 'array',
    ];

    /**
     * Boot method to automatically generate slug from name.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tour) {
            $tour->slug = Str::slug($tour->name);
        });
    }

    /**
     * Get the type associated with the tour.
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the destination associated with the tour.
     */
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Get the amenities associated with the tour.
     */
    // public function amenities(): BelongsToMany
    // {
    //     return $this->belongsToMany(Amenity::class, 'amenity_tour');
    // }

    public function amenities()
{
    return $this->belongsToMany(Amenity::class, 'amenity_tour', 'tour_id', 'amenity_id');
}

    /**
     * Get the pricing associated with the tour.
     */
    public function pricing()
    {
        return $this->morphOne(Pricing::class, 'package');
    }

    /**
     * Accessor to get the formatted tour plan.
     *
     * @return array
     */
    public function getFormattedTourPlanAttribute()
    {
        return $this->tour_plan ? $this->tour_plan : [];
    }

    /**
     * Accessor to get the formatted images.
     *
     * @return array
     */
    public function getFormattedImagesAttribute()
    {
        return $this->images ? $this->images : [];
    }

    public function views()
    {
        return $this->hasMany(TourView::class);
    }

    public function reviews()
{
    return $this->morphMany(Review::class, 'reviewable');
}
}
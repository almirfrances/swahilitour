<?php

namespace App\Models;

use App\Models\Admin\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment',
        'service_rating',
        'location_rating',
        'amenities_rating',
        'price_rating',
        'admin_reply_id',
        'admin_reply'
    ];

    /**
     * Get the reviewable entity (Hotel or Tour).
     */
    public function reviewable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user who wrote the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the admin who replied to the review.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_reply_id');
    }

    // /**
    //  * Automatically calculate and set the average rating before saving the review.
    //  */
    // protected static function booted()
    // {
    //     static::saving(function ($review) {
    //         $review->average_rating = ($review->service_rating + $review->location_rating + $review->amenities_rating + $review->price_rating) / 4;
    //     });
    // }
}
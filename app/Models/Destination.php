<?php

namespace App\Models;

use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Promo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'country', 'visa_requirements', 'language_spoken', 'area', 'images', 'faq', 'currency_used'
    ];

    protected $casts = [
        'images' => 'array',
        'faq' => 'array'
    ];

    // Automatically create and update slug when name is changed
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

        // Define the relationship with tours
        public function tours()
        {
            return $this->hasMany(Tour::class, 'destination_id');
        }

        // Define the relationship with hotels
        public function hotels()
        {
            return $this->hasMany(Hotel::class, 'destination_id');
        }

        
}
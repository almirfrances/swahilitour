<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'short_description',
        'promo_image',
        'event_id',
        'popup',
        'status'
    ];

    // Relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    

}
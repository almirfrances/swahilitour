<?php

namespace App\Models;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TourView extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'ip_address'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
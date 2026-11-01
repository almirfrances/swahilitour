<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes if you want to allow soft deletion of tickets

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'priority', 'status', 'file_path'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'priority' => 'string',
        'status' => 'string',
        'file_path' => 'string'
    ];

    /**
     * Get the user that owns the ticket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor for Priority to ensure the first letter is always uppercase.
     */
    public function getPriorityAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Mutator for Title to ensure the first letter of each word is uppercase.
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }

    /**
     * Scope a query to only include tickets of a given status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Determine if the ticket is considered "urgent".
     *
     * @return bool
     */
    public function isUrgent()
    {
        return $this->priority === 'High';
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->orderBy('created_at', 'asc');
    }
}

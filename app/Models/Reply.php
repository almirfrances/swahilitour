<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'message',
        'attachment_path',
    ];

    /**
     * Get the ticket that owns the reply.
     */
           // Ticket Relationship
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    // User Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Admin Relationship (if replies can be from admins)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id'); // Adjust 'admin_id' as per your schema
    }
}

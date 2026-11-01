<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailRecipient extends Model
{
    use HasFactory;

    protected $fillable = ['email_campaign_id', 'recipientable_id', 'recipientable_type'];

    public function recipientable()
    {
        return $this->morphTo();
    }
}
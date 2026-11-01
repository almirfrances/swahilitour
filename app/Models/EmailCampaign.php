<?php

namespace App\Models;

use App\Models\EmailRecipient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCampaign extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'content', 'url'];

    public function recipients()
    {
        return $this->hasMany(EmailRecipient::class);
    }
}
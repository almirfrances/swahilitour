<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title', 'content', 'slug'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
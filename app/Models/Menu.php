<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'parent_id', 'type', 'page_id', 'position', 'order', 'link', 'category'];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
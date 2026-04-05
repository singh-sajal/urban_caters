<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected static function booted()
    {
        static::saving(function (self $category) {
            if (!$category->slug) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class);
    }
}

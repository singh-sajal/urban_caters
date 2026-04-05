<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_category_id',
        'title',
        'slug',
        'event_date',
        'location',
        'hero_image',
        'summary',
        'body',
        'is_featured'
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_featured' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::saving(function (self $event) {
            if (!$event->slug) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class);
    }
}

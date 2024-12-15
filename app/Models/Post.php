<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'meta_title',
        'meta_description',
        'is_active',
        'published_at'
    ];

    public $translatable = [
        'title',
        'excerpt',
        'content',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->withResponsiveImages();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $fillable = [
        'author_name',
        'company',
        'position',
        'content',
        'rating',
        'is_active',
        'sort_order'
    ];

    public $translatable = [
        'content'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'rating' => 'integer'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->withResponsiveImages();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'is_active',
        'sort_order'
    ];

    public $translatable = [
        'title',
        'description',
        'content',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->withResponsiveImages();

        $this->addMediaCollection('gallery')
            ->withResponsiveImages();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'sort_order'
    ];

    public $translatable = [
        'name',
        'description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'is_active'
    ];

    public $translatable = [
        'name'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}

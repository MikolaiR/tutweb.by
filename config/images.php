<?php

return [
    'sizes' => [
        'thumbnail' => [
            'width' => 150,
            'height' => 150,
            'quality' => 80,
        ],
        'medium' => [
            'width' => 600,
            'height' => 400,
            'quality' => 85,
        ],
        'large' => [
            'width' => 1200,
            'height' => 800,
            'quality' => 90,
        ],
        'portfolio' => [
            'width' => 1920,
            'height' => 1080,
            'quality' => 95,
        ],
    ],
    
    'formats' => ['webp', 'jpg'],
    
    'cache_time' => 60 * 60 * 24 * 7, // 7 days
    
    'optimization' => [
        'jpeg' => [
            'strip' => true,
            'quality' => 85,
        ],
        'png' => [
            'strip' => true,
            'quality' => 85,
        ],
        'webp' => [
            'strip' => true,
            'quality' => 85,
        ],
    ],
];

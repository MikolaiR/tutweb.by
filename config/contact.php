<?php

return [
    'email' => env('CONTACT_EMAIL', 'info@tutweb.by'),
    'phone' => env('CONTACT_PHONE', '+375 29 123-45-67'),
    'address' => env('CONTACT_ADDRESS', 'Minsk, Belarus'),
    'social' => [
        'facebook' => env('SOCIAL_FACEBOOK', '#'),
        'twitter' => env('SOCIAL_TWITTER', '#'),
        'instagram' => env('SOCIAL_INSTAGRAM', '#'),
        'linkedin' => env('SOCIAL_LINKEDIN', '#'),
    ],
];

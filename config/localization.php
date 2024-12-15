<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Locale
    |--------------------------------------------------------------------------
    |
    | This is the default locale that will be used by the application.
    |
    */
    'default' => 'ru',

    /*
    |--------------------------------------------------------------------------
    | Fallback Locale
    |--------------------------------------------------------------------------
    |
    | This is the locale that will be used when the current one is not available.
    |
    */
    'fallback' => 'ru',

    /*
    |--------------------------------------------------------------------------
    | Available Locales
    |--------------------------------------------------------------------------
    |
    | This is a list of available locales that can be set in the application.
    |
    */
    'available' => [
        'ru' => [
            'name' => 'Русский',
            'script' => 'Cyrl',
            'native' => 'Русский',
            'regional' => 'ru_RU',
        ],
        'en' => [
            'name' => 'English',
            'script' => 'Latn',
            'native' => 'English',
            'regional' => 'en_US',
        ],
    ],
];

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class TestTranslations extends Command
{
    protected $signature = 'test:translations';
    protected $description = 'Test translation functionality';

    public function handle()
    {
        $this->info('Testing translations...');
        
        // Test Russian translations
        App::setLocale('ru');
        $this->info("\nRussian translations:");
        $this->info('Current locale: ' . App::getLocale());
        $this->info('Locale path: ' . lang_path('ru/messages.php'));
        $this->info('File exists: ' . (file_exists(lang_path('ru/messages.php')) ? 'Yes' : 'No'));
        $this->info('Translation loaded: ' . (Lang::has('messages.home') ? 'Yes' : 'No'));
        $this->info('home: ' . trans('messages.home'));
        $this->info('services: ' . trans('messages.services'));
        $this->info('contact: ' . trans('messages.contact'));
        
        // Test file contents
        if (file_exists(lang_path('ru/messages.php'))) {
            $translations = require lang_path('ru/messages.php');
            $this->info("\nTranslation array contents:");
            $this->info(print_r($translations, true));
        }
        
        // Test English translations
        App::setLocale('en');
        $this->info("\nEnglish translations:");
        $this->info('Current locale: ' . App::getLocale());
        $this->info('Locale path: ' . lang_path('en/messages.php'));
        $this->info('File exists: ' . (file_exists(lang_path('en/messages.php')) ? 'Yes' : 'No'));
        $this->info('Translation loaded: ' . (Lang::has('messages.home') ? 'Yes' : 'No'));
        $this->info('home: ' . trans('messages.home'));
        $this->info('services: ' . trans('messages.services'));
        $this->info('contact: ' . trans('messages.contact'));
        
        // Test file contents
        if (file_exists(lang_path('en/messages.php'))) {
            $translations = require lang_path('en/messages.php');
            $this->info("\nTranslation array contents:");
            $this->info(print_r($translations, true));
        }
        
        return Command::SUCCESS;
    }
}

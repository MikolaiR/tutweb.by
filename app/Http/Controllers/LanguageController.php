<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        // Get available locales from config
        $available = array_keys(config('localization.available', ['en' => [], 'ru' => []]));
        if (!in_array($locale, $available)) {
            abort(400);
        }

        // Set the locale in session and app
        session()->put('locale', $locale);
        App::setLocale($locale);
        // For debugging
//        info('Switching language', [
//            'requested_locale' => $locale,
//            'session_locale' => session('locale'),
//            'app_locale' => App::getLocale(),
//            'available_locales' => $available
//        ]);

        return redirect()->back();
    }
}

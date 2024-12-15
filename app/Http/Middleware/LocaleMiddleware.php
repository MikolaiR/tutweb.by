<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Get available locales from config
        $locales = array_keys(config('localization.available', ['en' => [], 'ru' => []]));
        $defaultLocale = config('localization.default', 'ru');
        
        // Get locale from session or use browser preference
        $locale = Session::get('locale');
        
        if (!$locale || !in_array($locale, $locales)) {
            $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            $locale = in_array($browserLocale, $locales) ? $browserLocale : $defaultLocale;
            Session::put('locale', $locale);
        }

        // Set the application locale
        App::setLocale($locale);
        
        // For debugging
        info('Setting locale', [
            'session_locale' => Session::get('locale'),
            'app_locale' => App::getLocale(),
            'browser_locale' => $request->server('HTTP_ACCEPT_LANGUAGE'),
            'default_locale' => $defaultLocale
        ]);
        
        return $next($request);
    }
}

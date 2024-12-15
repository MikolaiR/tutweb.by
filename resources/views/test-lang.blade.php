<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Language Test</title>
</head>
<body>
    <h1>Current Language: {{ app()->getLocale() }}</h1>
    <p>Translation test:</p>
    <ul>
        <li>Home: {{ __('home') }}</li>
        <li>Services: {{ __('services') }}</li>
        <li>Blog: {{ __('blog') }}</li>
        <li>Contact: {{ __('contact') }}</li>
    </ul>
    
    <p>Switch Language:</p>
    <ul>
        <li><a href="{{ route('language.switch', 'ru') }}">Русский</a></li>
        <li><a href="{{ route('language.switch', 'en') }}">English</a></li>
    </ul>

    <p>Debug Info:</p>
    <pre>
    Session Locale: {{ session('locale') }}
    App Locale: {{ app()->getLocale() }}
    Fallback Locale: {{ config('app.fallback_locale') }}
    </pre>
</body>
</html>

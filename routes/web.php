<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController; // Added PageController
use Illuminate\Support\Facades\Route;

// Language switcher
Route::get('language/{locale}', [LanguageController::class, 'switch'])
    ->name('language.switch');

// Public routes
Route::get('/', HomeController::class)->name('home');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolio:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');

// Test route for language
Route::get('/test-lang', function() {
    return view('test-lang');
})->name('test.lang');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\ContactController;

Route::middleware('api')->group(function () {
    // Services
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{service:slug}', [ServiceController::class, 'show']);

    // Portfolio
    Route::get('/portfolio', [PortfolioController::class, 'index']);
    Route::get('/portfolio/{portfolio:slug}', [PortfolioController::class, 'show']);

    // Blog
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{post:slug}', [PostController::class, 'show']);

    // Testimonials
    Route::get('/testimonials', [TestimonialController::class, 'index']);

    // Contact
    Route::post('/contact', [ContactController::class, 'store']);
});

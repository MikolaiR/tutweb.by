<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $portfolioItems = Portfolio::where('is_active', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $posts = Post::where('is_active', true)
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', compact('services', 'portfolioItems', 'posts', 'testimonials'));
    }
}

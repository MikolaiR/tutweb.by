<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    public function index(): JsonResponse
    {
        $testimonials = Testimonial::with('media')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json($testimonials);
    }
}

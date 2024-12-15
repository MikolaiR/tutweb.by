<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PortfolioController extends Controller
{
    public function index(): JsonResponse
    {
        $portfolios = Portfolio::with(['media', 'services'])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json($portfolios);
    }

    public function show(Portfolio $portfolio): JsonResponse
    {
        if (!$portfolio->is_active) {
            abort(404);
        }

        $portfolio->load(['media', 'services']);
        
        return response()->json($portfolio);
    }
}
